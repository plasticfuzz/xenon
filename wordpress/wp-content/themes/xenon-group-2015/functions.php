<?php

require_once('lib/post-types.php');

function init() {
  add_theme_support('post-thumbnails', array( 'post', 'page', 'xe-staff'));
  add_theme_support( 'menus' );

  register_nav_menu('header-nav',__( 'Header Nav' ));
  register_nav_menu('footer-nav',__( 'Footer Nav' ));

  register_post_types();
  register_image_sizes();  

  if(!is_admin()) {
    register_scripts();
  }
}
add_action('init', 'init');

// Asset URI
function asset_uri($path, $echo = false) {
  $uri = get_stylesheet_directory_uri() . "/dist/$path";
  if ($echo)
    echo $uri;
  return $uri;
}

// Image sizes
function register_image_sizes() {
  add_image_size('staff-thumb', 200, 200, true);  
}

function register_scripts() {
  // wp_register_script('modernizr',
  //   $bower . 'modernizr/modernizr.js', array(), false);  

  wp_register_script('app',
    asset_uri('scripts/main.min.js'), array('xe-jquery'),'1.0.0', true );

  wp_register_script('xe-jquery',
    asset_uri('scripts/jquery-1.11.2.min.js'), array(),'1.0.0', true );

  // // Enqueue scripts
  // wp_enqueue_script('modernizr');     
  wp_enqueue_script('xe-jquery');  
  wp_enqueue_script('app');
}

// Echo post type string
function post_type( $echo = true ) {
  if( $echo ) echo get_post_type( get_the_ID() );
}

////
// Creates an array of labels suitable for use with register_post_type.
////
function make_post_type_labels($singular, $plural) {
  $plural_lower = strtolower($plural);
  return array(
    'name' => $plural,
    'singular_name' => $singular,
    'add_new' => "Add New",
    'add_new_item' => "Add New $singular",
    'edit_item' => "Edit $singular",
    'new_item' => "New $singular",
    'all_items' => "All $plural",
    'view_item' => "View $singular",
    'search_items' => "Search $plural",
    'not_found' => "No $plural_lower found",
    'not_found_in_trash' => "No $plural_lower found in Trash",
    'parent_item_colon' => "Parent $singular",
    'menu_name' => $plural
  );
}