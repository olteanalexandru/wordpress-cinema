<?php

/**

 * Plugin Name: Custom admin backend plugin

 * Plugin URI: http://www.wp-oltean.com

 * Description: This plugin increases the Admin Colour Scheme options and ads a logo in admin backend you’ll need to upload your custom logo to your theme’s images folder as custom-logo.png.".

 * Version: 1.0

 * Author: Oltean alexandru Florin

 * Author URI: http://www.wp-oltean.com

 */
function additional_admin_color_schemes() {
  //Get the theme directory
  $theme_dir = get_template_directory_uri();
 
  //Ocean
  wp_admin_css_color( 'ocean', __( 'Ocean' ),
    $theme_dir . '/admin-colors/ocean/colors.min.css',
    array( '#aa9d88', '#9ebaa0', '#738e96', '#f2fcff' )
  );
}
add_action('admin_init', 'additional_admin_color_schemes');




// setting default color 
function set_default_admin_color($user_id) {
  $args = array(
    'ID' => $user_id,
    'admin_color' => 'midnight'
  );
  wp_update_user( $args );
}
add_action('user_register', 'set_default_admin_color');

// rename fresh color scheme
function rename_fresh_color_scheme() {
  global $_wp_admin_css_colors;
  $color_name = $_wp_admin_css_colors['fresh']->name;
 
  if( $color_name == 'Default' ) {
    $_wp_admin_css_colors['fresh']->name = 'Fresh';
  }
  return $_wp_admin_css_colors;
}
add_filter('admin_init', 'rename_fresh_color_scheme');















function wpb_custom_logo() {
echo '
<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
background-image: url(' . get_bloginfo('stylesheet_directory') . '/img/custom-logo.png) !important;
background-position: 0 0;
color:rgba(0, 0, 0, 0);
background:white;
}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
background-position: 0 0;
background:transparent;
}
</style>
';
}
//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');