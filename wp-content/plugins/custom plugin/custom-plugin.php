<?php

/**

 * Plugin Name: My custom plugin 

 * Plugin URI: http://www.cinema.theskate.com

 * Description: This plugin adds more menu options.

 * Version: 1.0

 * Author: Oltean alexandru Florin

 * Author URI: http://www.wp-oltean.com

 */



// Registering aditional menus :

function register_my_menus() {

    register_nav_menus(

      array(

        'menu-2' => __( 'meniu 2' ),

        'menu-3' => __( 'meniu 3' ),

        'menu-4' => __( 'meniu 4' )

      )

    );

  }

  add_action( 'init', 'register_my_menus' );