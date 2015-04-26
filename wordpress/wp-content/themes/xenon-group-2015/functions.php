<?php

require_once('lib/post-types.php'); // Custom PostTypes
require_once('lib/classes/mailchimp.class.php'); // Mailchimp API Wrapper
require_once('lib/classes/form_handler.class.php'); // AJAX Form Handler

$xe_settings = array(
  'mailchimp_api_key' => '9f6c2963925975453cffb64c9678a0c0-us3',
  'mailchimp_list_id' => '6f61c225f0'
);

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

  // wp_enqueue_script('modernizr');     
  wp_enqueue_script('xe-jquery');  
  wp_enqueue_script('app');
  wp_localize_script( 'app', 'xe', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'nonce'    => wp_create_nonce('xe'),
  ) );  
}

// Echo post type string
function post_type( $echo = true ) {
  if( $echo ) echo get_post_type( get_the_ID() );
}

////
// Insert to MailChimp
////
function save_to_mailchimp( $email, $user_array ) {

  global $xe_settings;

  $mc = new \Drewm\MailChimp($xe_settings['mailchimp_api_key']);

  $result = $mc->call('lists/subscribe', array(
    'id'                => $xe_settings['mailchimp_list_id'],
    'email'             => array('email'=>$email),
    'merge_vars'        => $user_array,
    'double_optin'      => false,
    'update_existing'   => true,
    'replace_interests' => false,
    'send_welcome'      => false,
  ));

  return $result;
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
////
// Browser-safe slug
////
function make_slug($string) {
  //Lower case everything
  $string = strtolower($string);
  //Make alphanumeric (removes all other characters)
  $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
  //Clean up multiple dashes or whitespaces
  $string = preg_replace("/[\s-]+/", " ", $string);
  //Convert whitespaces and underscore to dash
  $string = preg_replace("/[\s_]/", "-", $string);
  return $string;
}