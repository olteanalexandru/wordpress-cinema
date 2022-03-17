<?php 

function wp_customize_register ($wp_customize) {

    $wp_customize->add_settings('header_textcolor',array(

        'default' => '#000000',

        'transport'=>'refresh',

    ));

    $wp_customize->add_section('th_color_theme_sections',array(

        'Title' => _('Max Cinema Colors', 'MaxCinema'),

        'priority'=>30

    ));

    $wp_customize->add_control(new WP_Customize_color_Control($wp_customize,'theme_colors' ,array(

        'label' => _('Header BG Color(working only under png background image)' , 'MaxCinema'),

        'section'=>'th_color_theme_sections',

        'settings'=>'header_bg_color',

    )));

}

add_action('customize_register' , 'wp_customize_register');


/*Customizer Code HERE*/
add_action('customize_register', 'theme_footer_customizer');
function theme_footer_customizer($wp_customize){
 //adding section in wordpress customizer   
$wp_customize->add_section('footer_settings_section', array(
  'title'          => 'Footer Text Section'
 ));
//adding setting for footer text area
$wp_customize->add_setting('text_setting', array(
 'default'        => 'Default Text For Footer Section',
 ));
$wp_customize->add_control('text_setting', array(
 'label'   => 'Footer Text Here',
  'section' => 'footer_settings_section',
 'type'    => 'textarea',
));