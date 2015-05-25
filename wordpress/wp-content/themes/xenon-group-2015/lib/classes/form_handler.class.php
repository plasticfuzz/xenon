<?php
class form_handler {
  function hooks(){
    add_action('wp_ajax_contact', array($this, 'handle_contact'));
    add_action('wp_ajax_nopriv_contact', array($this, 'handle_contact'));
    add_action('wp_ajax_newsletter', array($this, 'handle_newsletter'));
    add_action('wp_ajax_nopriv_newsletter', array($this, 'handle_newsletter'));
  }

  function handle_contact() {
    if( ! wp_verify_nonce( $_REQUEST['nonce'], 'xe' ) ){
      wp_send_json_error( array(
        'message' => 'Security Error'      
      ) );    
    }

    parse_str($_POST["data"], $_POST);

    $email = trim($_POST['xe_contact_email']);
    $name  = trim($_POST['xe_contact_name']);
    $tel   = trim($_POST['xe_contact_tel']);    
    $msg   = trim($_POST['xe_contact_message']);    

    if( !empty($name) && !empty($email) ) {

      $to = get_option( 'admin_email' );
      $subject = '[XE Website Enquiry]';
      $body = 
        'Email: $email' . '\r\n' . 
        'Name: $name' . '\r\n' .
        'Tel: $tel' . '\r\n' .      
        'Message:' . '\r\n' .  ' $msg';             

      $headers[] = 'Bcc: Mark Shahid <markshahid@gmail.com>';

      if( !wp_mail( $to, $subject, $body, $headers ) ) {
        wp_send_json_error( array(
          'message' => 'Transmission failed, try again'      
        ) );           
      } else {
        wp_send_json_success( array(
          'message' => 'Message sent',
          'nonce'    => wp_create_nonce('xe'),
        ) );         
      }

    } else {
      wp_send_json_error( array(
        'message' => 'Server Error, try again'      
      ) );    
    }
  }

  function handle_newsletter() {

    if( ! wp_verify_nonce( $_REQUEST['nonce'], 'xe' ) ){
      wp_send_json_error( array(
        'message' => 'Security Error'      
      ) );  
    }

    parse_str($_POST["data"], $_POST);

    $email = trim($_POST['xe_newsletter_email']);
    $name  = trim($_POST['xe_newsletter_name']);

    if( !empty($name) && !empty($email) ) {

      $parts = explode( ' ', $name, 2 );
      if ( count( $parts ) > 1 ) {
        list( $first_name, $last_name ) = explode( ' ', $name );
      } else {
        $first_name = $name;
        $last_name = null;
      }

      $user_arr = array(
        'fname' => $first_name,
        'lname' => $last_name,
      );

      if(in_array("error", save_to_mailchimp( $email, $user_arr ))) {
        wp_send_json_error( array(
          'message' => 'Invalid Email, try again'      
        ) );           
      } else {
        wp_send_json_success( array(
          'message' => 'Subscription complete',
          'nonce'    => wp_create_nonce('xe'),
        ) );         
      }

    } else {
      wp_send_json_error( array(
        'message' => 'Server Error, try again'      
      ) );    
    }
  }  
}

$form_handler = new form_handler();
$form_handler->hooks();