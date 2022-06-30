<?php

require get_template_directory() . '/inc/init.php';

function add_favicon()
{
    echo '<link rel="shortcut icon" type="image/png" href="' . get_theme_mod('html_favicon_icon') . '" />';
}
add_action('wp_head', 'add_favicon');

add_action( 'wp_login_failed', 'front_end_login_fail' );
function front_end_login_fail( $username ) {

// Getting URL of the login page
$referrer = $_SERVER['HTTP_REFERER'];    
// if there's a valid referrer, and it's not the default log-in screen
if( !empty( $referrer ) && !strstr( $referrer,'wp-login' ) && !strstr( $referrer,'wp-admin' ) ) {
    wp_redirect( get_permalink( 289 ) . "?account=failed" ); 
    exit;
}

}

/**
 * Function Name: check_username_password.
 * Description: This redirects to the custom login page if user name or password is   empty with a modified url
**/
add_action( 'authenticate', 'check_username_password', 1, 3);
function check_username_password( $login, $username, $password ) {

// Getting URL of the login page
$referrer = $_SERVER['HTTP_REFERER'];

// if there's a valid referrer, and it's not the default log-in screen
if( !empty( $referrer ) && !strstr( $referrer,'wp-login' ) && !strstr( $referrer,'wp-admin' ) ) { 
    if( $username == "" || $password == "" ){
        wp_redirect( get_permalink( 289 ) . "?account=empty" );
        exit;
    }
}

}
// Replace my constant '289' with your custom login page id.

add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
  wp_safe_redirect( home_url() );
  exit();
}