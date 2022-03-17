<?php

/**

 * Plugin Name: My_movies post/functionalities

 * Plugin URI: http://www.cinema.theskate.com

 * Description: This plugin Creates the custom Post for movies , enables comments and registers taxonomy for post tag".

 * Version: 1.0

 * Author: Oltean alexandru Florin

 * Author URI: http://www.wp-oltean.com

 */



// registering the custom post
function movie_post_type() {

$labels = array(
    'name'                  => _x( 'Movies', 'Post Type General Name', 'text_domain' ),
    'singular_name'         => _x( 'Movie', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'             => __( 'Movie archive', 'text_domain' ),
    'name_admin_bar'        => __( 'Movie archive', 'text_domain' ),
    'archives'              => __( 'Movie archive', 'text_domain' ),
    'attributes'            => __( 'Item Attributes', 'text_domain' ),
    'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
    'all_items'             => __( 'All Movies', 'text_domain' ),
    'add_new_item'          => __( 'Add New Movie', 'text_domain' ),
    'add_new'               => __( 'Add New', 'text_domain' ),
    'new_item'              => __( 'New Item', 'text_domain' ),
    'edit_item'             => __( 'Edit Item', 'text_domain' ),
    'update_item'           => __( 'Update Item', 'text_domain' ),
    'view_item'             => __( 'View Item', 'text_domain' ),
    'view_items'            => __( 'View Items', 'text_domain' ),
    'search_items'          => __( 'Search Item', 'text_domain' ),
    'not_found'             => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
    'featured_image'        => __( 'Featured Image', 'text_domain' ),
    'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
    'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
    'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
    'items_list'            => __( 'Items list', 'text_domain' ),
    'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
    'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
);
$args = array(
    'label'                 => __( 'Movie', 'text_domain' ),
    'description'           => __( 'Here we add movies in the archive with our custom fields.', 'text_domain' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor','thumbnail', 'custom-fields','page-attributes','taxonomy' , 'comments'),
    'taxonomies'            => array( 'category', 'post_tag' ),
    'hierarchical'          => true,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 3,
    'menu_icon'             => 'dashicons-media-video',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    'show_in_rest'          => false,
);
register_post_type( 'my_movies', $args );

}
add_action( 'init', 'movie_post_type',0 );

// Enable comments for custom post
function enable_comments_custom_post_type() {
add_post_type_support( 'my_movies', 'comments' );
}
add_action( 'init', 'enable_comments_custom_post_type', 11 );

// Register taxonomy tags in for custom post

add_action( 'init', 'gp_register_taxonomy_for_object_type' );
function gp_register_taxonomy_for_object_type() {
   register_taxonomy_for_object_type( 'post_tag', 'my_movies' );
};