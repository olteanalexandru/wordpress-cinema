<?php
/**
 * cinematograf functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cinematograf
 */

if ( ! function_exists( 'cinematograf_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function cinematograf_setup() {

		load_theme_textdomain( 'cinematograf', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'cinematograf' ),
		) );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'custom-background', apply_filters( 'cinematograf_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'cinematograf_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function cinematograf_content_width() {
	// This variable is intended to be overruled from themes.
	$GLOBALS['content_width'] = apply_filters( 'cinematograf_content_width', 640 );
}
add_action( 'after_setup_theme', 'cinematograf_content_width', 0 );

/**
 * Register widget area.
 */
function cinematograf_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cinematograf' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cinematograf' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cinematograf_widgets_init' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//enqueue_scripts
add_action( 'wp_enqueue_scripts', 'add_my_script' );
function add_my_script() {
    wp_enqueue_script(
        'meniu', // name your script so that you can attach other scripts and de-register, etc.
        get_template_directory_uri() . '/js/meniu.js', // this is the location of your script file
        array('jquery') // this array lists the scripts upon which your script depends
    );
}
add_action( 'wp_enqueue_script2', 'add_my_script' );
function add_my_script2() {
    wp_enqueue_script2(
        'Custombtn', // name your script so that you can attach other scripts and de-register, etc.
        get_template_directory_uri() . '/js/Custombtn.js', // this is the location of your script file
        array('jquery') // this array lists the scripts upon which your script depends
    );
}









    

/**
 * Enqueue scripts and styles.
 */
function cinematograf_scripts() {
	wp_enqueue_style( 'cinematograf-style', get_stylesheet_uri() );

	wp_enqueue_script( 'cinematograf-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'cinematograf-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cinematograf_scripts' );

	function add_theme_styles() {
        // Enqueue the style
        wp_enqueue_style('my-script-slug',  get_template_directory_uri() . '/css/gglfont.css',false,'1.1','all');
		wp_enqueue_style('my-script-slug',  get_template_directory_uri() . '/css/bootstrap-reboot.min.css',false,'1.1','all');
		wp_enqueue_style('my-script-slug2',  get_template_directory_uri() . '/css/bootstrap-grid.min.css',false,'1.1','all');
		wp_enqueue_style('my-script-slug3',  get_template_directory_uri() . '/css/owl.carousel.min.css',false,'1.1','all');
		wp_enqueue_style('my-script-slug4',  get_template_directory_uri() . '/css/jquery.mCustomScrollbar.min.css',false,'1.1','all');
		wp_enqueue_style('my-script-slug5',  get_template_directory_uri() . '/css/nouislider.min.css',false,'1.1','all');
		wp_enqueue_style('my-script-slug6',  get_template_directory_uri() . '/css/ionicons.min.css',false,'1.1','all');
		wp_enqueue_style('my-script-slug7',  get_template_directory_uri() . '/css/plyr.css',false,'1.1','all');
		wp_enqueue_style('my-script-slug8',  get_template_directory_uri() . '/css/photoswipe.css',false,'1.1','all');
		wp_enqueue_style('my-script-slug9',  get_template_directory_uri() . '/css/default-skin.css',false,'1.1','all');
		wp_enqueue_style('my-script-slug10',  get_template_directory_uri() . '/css/main.css',false,'1.1','all');
		wp_enqueue_style('my-script-slug11',  get_template_directory_uri() . '/css/plyr.css',false,'1.1','all');
		wp_enqueue_style('my-script-slug12',  get_template_directory_uri() . '/style.css',false,'1.1','all');
		wp_enqueue_script('my-script-slug13',  get_template_directory_uri() . '/css/bootstrap.min.css',false,'1.1','all');
        wp_enqueue_script('my-script-slug14',  get_template_directory_uri() . '/css/gglfont.css',false,'1.1','all');
	}
	add_action( 'wp_enqueue_scripts', 'add_theme_styles' );

	function add_theme_scripts() {
		// Enqueue the scripts
	
		wp_enqueue_script('1my-script-slug',  get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array ( 'jquery' ), 1.1, false);
		wp_enqueue_script('2my-script-slug',  get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array ( 'jquery' ), 1.1, false);
		wp_enqueue_script('3my-script-slug',  get_template_directory_uri() . '/js/owl.carousel.min.js', array ( 'jquery' ), 1.1, false);
		wp_enqueue_script('4my-script-slug',  get_template_directory_uri() . '/js/jquery.mousewheel.min.js', array ( 'jquery' ), 1.1, false);
		wp_enqueue_script('5my-script-slug',  get_template_directory_uri() . '/js/jquery.mCustomScrollbar.min.js', array ( 'jquery' ), 1.1, false);
		wp_enqueue_script('6my-script-slug',  get_template_directory_uri() . '/js/wNumb.js', array ( 'jquery' ), 1.1, false);
		wp_enqueue_script('7my-script-slug',  get_template_directory_uri() . '/js/nouislider.min.js', array ( 'jquery' ), 1.1, false);
		wp_enqueue_script('8my-script-slug',  get_template_directory_uri() . '/js/plyr.min.js', array ( 'jquery' ), 1.1, false);
		wp_enqueue_script('9my-script-slug',  get_template_directory_uri() . '/js/jquery.morelines.min.js', array ( 'jquery' ), 1.1, false);
		wp_enqueue_script('10my-script-slug',  get_template_directory_uri() . '/js/photoswipe.min.js', array ( 'jquery' ), 1.1, false);
		wp_enqueue_script('11my-script-slug',  get_template_directory_uri() . '/js/photoswipe-ui-default.min.js', array ( 'jquery' ), 1.1, false);
		wp_enqueue_script('12my-script-slug',  get_template_directory_uri() . '/js/main.js', array ( 'jquery' ), 1.1, false);
		wp_enqueue_script('13my-script-slug',  get_template_directory_uri() . '/js/fontaws.js', array ( 'jquery' ), 1.1, false);
		


	}
	add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


/* Add bootstrap support to the Wordpress theme*/

function theme_add_bootstrap() {
	
	wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.0.0', true );
	}
	
	add_action( 'wp_enqueue_scripts', 'theme_add_bootstrap' );















    // Register sidebar
    if (function_exists('register_sidebar')) {
        register_sidebar(
            array(
            'name' => 'banner_widget_sidebar',
            'id' => 'banner_widget_sidebar',
            'description' => 'Custom sidebar for banner display ' ,
            'before_widget' => '<div id="banner_widget_sidebar" class="banner_widget_sidebar">',
            'after_widget' => '</div>',
            )
        );
    }
    





    // Register widget
    add_action('widgets_init', 'CustomWidgetfnction');
    function CustomWidgetfnction() {
        register_widget( 'CustomBannerWidget' );
    }
    
    // Enqueue additional admin scripts
    add_action('admin_enqueue_scripts', 'ctup_wdscript');
    function ctup_wdscript() {
        wp_enqueue_media();
        wp_enqueue_script('ads_script', get_template_directory_uri() . '/js/Custombtn.js', false, '1.0.0', true);
    }
    
    //  custom Widget
    class CustomBannerWidget extends WP_Widget {
    
	function	__construct() {
            $widget_ops = array('classname' => 'CustomBannerWidget');
            $this->WP_Widget('CustomBannerWidget-widget', 'CustomBannerWidget', $widget_ops);
        }
    
        function widget($args, $instance) {
            echo $before_widget;
    ?>

<h1><?php echo apply_filters('widget_title', $instance['text'] ); ?></h1>
<img src="<?php echo esc_url($instance['image_uri']); ?>" />

<?php
            echo $after_widget;
    
        }
    
        function update($new_instance, $old_instance) {
            $instance = $old_instance;
            $instance['text'] = strip_tags( $new_instance['text'] );
            $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
            return $instance;
        }
    
        function form($instance) {
    ?>

<p>
    <label for="<?php echo $this->get_field_id('text'); ?>">Info</label><br />
    <input type="text" name="<?php echo $this->get_field_name('text'); ?>"
        id="<?php echo $this->get_field_id('text'); ?>" value="<?php echo $instance['text']; ?>" class="widefat" />
</p>
<p>
    <label for="<?= $this->get_field_id( 'image_uri' ); ?>">Banner</label>
    <img class="<?= $this->id ?>_img" src="<?= (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>"
        style="margin:0;padding:0;max-width:100%;display:block" />
    <input type="text" class="widefat <?= $this->id ?>_url" name="<?= $this->get_field_name( 'image_uri' ); ?>"
        value="<?= $instance['image_uri']; ?>" style="margin-top:5px;" />
    <input type="button" id="<?= $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image"
        style="margin-top:5px;" />
</p>

<?php
        }
    }




add_action('customize_register','mytheme_customizer_options');
/*
 * Add in our custom Accent Color setting and control to be used in the Customizer in the Colors section
 *
 */
function mytheme_customizer_options( $wp_customize ) {

$wp_customize->add_setting(
      'mytheme_accent_color', //give it an ID
      array(
          'default' => 'b4ae9f', // Give it a default
      )
  );
  $wp_customize->add_control(
     new WP_Customize_Color_Control(
         $wp_customize,
         'mytheme_custom_accent_color', //give it an ID
         array(
             'label'      => __( 'Custom: Page Template Text Color ', 'MaxCinema' ), //set the label to appear in the Customizer
             'section'    => 'colors', //select the section for it to appear under  
             'settings'   => 'mytheme_accent_color' //pick the setting it applies to
         )
     )
  );

}


add_action( 'wp_head', 'mytheme_customize_css' );
/*
 * Output our custom Accent Color setting CSS Style
 *
 */
function mytheme_customize_css() {
    ?>
<style type="text/css">
    .page {
        color: <?php echo get_theme_mod('mytheme_accent_color', 'default'); // add in your add_settings ID and default value ?>!important; }
</style>
<?php
}







add_action('customize_register','mytheme_customizer_options_backgound');
/*
 * Add in our custom Accent Color setting and control to be used in the Customizer in the Colors section
 *
 */
function mytheme_customizer_options_backgound( $wp_customize ) {

$wp_customize->add_setting(
      'mytheme_accent_backgound', //give it an ID
      array(
          'default' => 'none', // Give it a default
      )
  );
  $wp_customize->add_control(
     new WP_Customize_Color_Control(
         $wp_customize,
         'mytheme_custom_accent_backgroundcolor', //give it an ID
         array(
             'label'      => __( 'Custom: container backgroung-color ', 'MaxCinema' ), //set the label to appear in the Customizer
             'section'    => 'colors', //select the section for it to appear under  
             'settings'   => 'mytheme_accent_backgound' //pick the setting it applies to
         )
     )
  );

}


add_action( 'wp_head', 'mytheme_customize_css2' );
/*
 * Output our custom Accent Color setting CSS Style
 *
 */
function mytheme_customize_css2() {
    ?>
<style type="text/css">
    .col-md-6.marg0 {
        background-color: <?php echo get_theme_mod('mytheme_accent_backgound', 'none'); // add in your add_settings ID and default value ?>; }
</style>
<?php
}


