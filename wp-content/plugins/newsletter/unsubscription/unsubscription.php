<?php

defined('ABSPATH') || exit;

class NewsletterUnsubscription extends NewsletterModule {

    static $instance;

    /**
     * @return NewsletterUnsubscription
     */
    static function instance() {
        if (self::$instance == null) {
            self::$instance = new NewsletterUnsubscription();
        }
        return self::$instance;
    }

    function __construct() {
        parent::__construct('unsubscription', '1.0.2');

        add_filter('newsletter_replace', array($this, 'hook_newsletter_replace'), 10, 3);
        add_filter('newsletter_page_text', array($this, 'hook_newsletter_page_text'), 10, 3);
        add_filter('newsletter_message_headers', array($this, 'hook_add_unsubscribe_headers_to_email'), 10, 3);

        add_action('newsletter_action', array($this, 'hook_newsletter_action'));
    }

    function hook_newsletter_action($action) {
        global $wpdb;

        switch ($action) {
            case 'u':
                $user = $this->get_user_from_request();
                $email = $this->get_email_from_request();
                if ($user == null) {
                    $url = $this->build_message_url(null, 'unsubscription_error', $user);
                } else {
                    $url = $this->build_message_url(null, 'unsubscribe', $user, $email);
                }
                wp_redirect($url);
                die();
                break;

            case 'uc':
                if ($this->antibot_form_check()) {
                    $user = $this->unsubscribe();
                    $email = $this->get_email_from_request();
                    if ($user->status == 'E') {
                        $url = $this->build_message_url(null, 'unsubscription_error', $user);
                    } else {
                        $url = $this->build_message_url(null, 'unsubscribed', $user, $email);
                    }
                    wp_redirect($url);
                } else {
                    $this->request_to_antibot_form('Unsubscribe');
                }
                die();
                break;

            case 'lu': //List Unsubscribe - action from oneclick unsubscribe header
                if ($this->one_click_list_unsubscribe_check()) {
                    $this->unsubscribe();
                }
                die();
                break;

            case 'reactivate':
                if ($this->antibot_form_check()) {
                    $user = $this->reactivate();
                    $url = $this->build_message_url(null, 'reactivated', $user);
                    wp_redirect($url);
                } else {
                    $this->request_to_antibot_form('Reactivate');
                }
                die();
                break;
        }
    }

    /**
     * Unsubscribes the subscriber from the request. Die on subscriber extraction failure.
     *
     * @return TNP_User
     */
    function unsubscribe() {
        $user = $this->get_user_from_request(true);

        if ($user->status == TNP_User::STATUS_UNSUBSCRIBED) {
            return $user;
        }

        $user = $this->refresh_user_token($user);
        $user = $this->set_user_status($user, TNP_User::STATUS_UNSUBSCRIBED);

        $this->add_user_log($user, 'unsubscribe');

        do_action('newsletter_unsubscribed', $user);

        global $wpdb;

        $email = $this->get_email_from_request();
        if ($email) {
            $wpdb->update(NEWSLETTER_USERS_TABLE, array('unsub_email_id' => (int) $email->id, 'unsub_time' => time()), array('id' => $user->id));
        }

        $this->send_unsubscribed_email($user);

        $this->notify_admin_on_unsubscription($user);

        return $user;
    }

    function send_unsubscribed_email($user, $force = false) {
        $options = $this->get_options('', $this->get_user_language($user));
        if (!$force && !empty($options['unsubscribed_disabled'])) {
            return true;
        }

        $message = $options['unsubscribed_message'];
        $subject = $options['unsubscribed_subject'];

        return NewsletterSubscription::instance()->mail($user, $subject, $message);
    }

    function notify_admin_on_unsubscription($user) {

        if (empty($this->options['notify_admin_on_unsubscription'])) {
            return;
        }

        $message = $this->generate_admin_notification_message($user);
        $email = trim(get_option('admin_email'));
        $subject = $this->generate_admin_notification_subject('Newsletter unsubscription');

        Newsletter::instance()->mail($email, $subject, array('text' => $message));
    }

    /**
     * Reactivate the subscriber extracted from the request setting his status
     * to confirmed and logging. No email are sent. Dies on subscriber extraction failure.
     *
     * @return TNP_User
     */
    function reactivate() {
        $user = $this->get_user_from_request(true);

        $user = $this->set_user_status($user, TNP_User::STATUS_CONFIRMED);
        $this->add_user_log($user, 'reactivate');

        return $user;
    }

    function hook_newsletter_replace($text, $user, $email) {

        if ($user) {
            $text = $this->replace_url($text, 'UNSUBSCRIPTION_CONFIRM_URL', $this->build_action_url('uc', $user, $email));
            $text = $this->replace_url($text, 'UNSUBSCRIPTION_URL', $this->build_action_url('u', $user, $email));
            $text = $this->replace_url($text, 'REACTIVATE_URL', $this->build_action_url('reactivate', $user, $email));
        } else {
            $text = $this->replace_url($text, 'UNSUBSCRIPTION_CONFIRM_URL', '#');
            $text = $this->replace_url($text, 'UNSUBSCRIPTION_URL', '#');
        }

        return $text;
    }

    function hook_newsletter_page_text($text, $key, $user = null) {

        $options = $this->get_options('', $this->get_current_language($user));
        if ($key == 'unsubscribe') {
            if (!$user) {
                return 'Subscriber not found.';
            }
            return $options['unsubscribe_text'];
        }
        if ($key == 'unsubscribed') {
            if (!$user) {
                return $options['error_text'];
            }
            return $options['unsubscribed_text'];
        }
        if ($key == 'reactivated') {
            if (!$user) {
                return $options['error_text'];
            }
            return $options['reactivated_text'];
        }
        if ($key == 'unsubscription_error') {
            return $options['error_text'];
        }
        return $text;
    }

    function upgrade() {
        global $wpdb, $charset_collate;

        parent::upgrade();

        // Migration code
        if (empty($this->options) || empty($this->options['unsubscribe_text'])) {
            // Options of the subscription module (worng name, I know)
            $options = get_option('newsletter');
            $this->options['unsubscribe_text'] = $options['unsubscription_text'];

            $this->options['reactivated_text'] = $options['reactivated_text'];

            $this->options['unsubscribed_text'] = $options['unsubscribed_text'];
            $this->options['unsubscribed_message'] = $options['unsubscribed_message'];
            $this->options['unsubscribed_subject'] = $options['unsubscribed_subject'];

            $this->save_options($this->options);
        }
    }

    function admin_menu() {
        $this->add_admin_page('index', 'Unsubscribe');
    }

    /**
     * @param array $headers
     * @param TNP_Email $email
     * @param TNP_User $user
     *
     * @return array
     */
    function hook_add_unsubscribe_headers_to_email($headers, $email, $user) {

        if (isset($this->options['disable_unsubscribe_headers']) && $this->options['disable_unsubscribe_headers'] == 1) {
            return $headers;
        }

        $list_unsubscribe_values = [];
        if (!empty($this->options['list_unsubscribe_mailto_header'])) {
            $unsubscribe_address = $this->options['list_unsubscribe_mailto_header'];
            $list_unsubscribe_values[] = "<mailto:$unsubscribe_address?subject=unsubscribe>";
        }

        $unsubscribe_action_url = $this->build_action_url('lu', $user, $email);
        $list_unsubscribe_values[] = "<$unsubscribe_action_url>";

        $headers['List-Unsubscribe-Post'] = 'List-Unsubscribe=One-Click';
        $headers['List-Unsubscribe'] = implode(', ', $list_unsubscribe_values);
        return $headers;
    }

    /**
     * @return bool
     */
    function one_click_list_unsubscribe_check() {
        if (isset($_POST['List-Unsubscribe']) && 'One-Click' === $_POST['List-Unsubscribe'] || 'List-Unsubscribe=One-Click' === file_get_contents('php://input')) {
            return true;
        }

        return false;
    }

}

NewsletterUnsubscription::instance();
