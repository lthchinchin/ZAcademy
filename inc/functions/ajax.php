<?php
add_action('wp_ajax_loadColor', 'get_colors');
add_action('wp_ajax_nopriv_loadColor', 'get_colors');
function get_colors()
{
    echo json_encode(get_field('colors', 26));
    die();
}

add_action( 'wp_ajax_nopriv_register_user', 'landvn_ajax_register_handle' );
function landvn_ajax_register_handle() {
	$form_data = $_POST['data'];
	parse_str( $form_data, $data_array );

	$form_nonce = $data_array['_wpnonce'];
	$full_name  = $data_array['fullname'];
	$user_name  = $data_array['username'];
	$password   = $data_array['password'];
	$phone      = $data_array['phone'];

	if ( wp_verify_nonce( $form_nonce, 'registed_user' ) ) {
		if ( username_exists( $user_name ) ) {
			wp_send_json_error( 'username' );
		} else {
			$userdata = array(
				'user_login'   => $user_name,
				'user_pass'    => $password,
				'first_name'   => $full_name,
				'display_name' => $full_name,
				'role'         => 'subscriber',
			);
			$user_id = wp_insert_user( wp_slash( $userdata ) );
            update_field( 'user_phone', $phone, 'user_' . $user_id );
            wp_set_current_user( $user_id );
            wp_set_auth_cookie( $user_id );
            wp_send_json_success( true );
        }
	}else {
        wp_send_json_error();
    }

	die();
}

