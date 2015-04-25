<?php
class form_handler {
  function hooks(){
    add_action('wp_ajax_enquiry', array($this, 'handle_enquiry'));
    add_action('wp_ajax_nopriv_enquiry', array($this, 'handle_enquiry'));
    add_action('wp_ajax_newsletter', array($this, 'handle_newsletter'));
    add_action('wp_ajax_nopriv_newsletter', array($this, 'handle_newsletter'));
  }

  function handle_enquiry() {
    if( ! wp_verify_nonce( $_REQUEST['nonce'], 'xe' ) ){
      wp_send_json_error();
    }

    wp_send_json_success( array(
      'script_response' => 'AJAX Request Received - Enquiry',
      'nonce'           => wp_create_nonce('xe'),
    ) );
  }

  function handle_newsletter() {
    if( ! wp_verify_nonce( $_REQUEST['nonce'], 'xe' ) ){
      wp_send_json_error();
    }

    wp_send_json_success( array(
      'script_response' => 'AJAX Request Received - Newsletter',
      'nonce'           => wp_create_nonce('xe'),
    ) );
  }  
}
$form_handler = new form_handler();
$form_handler->hooks();