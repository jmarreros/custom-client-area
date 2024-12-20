<?php

namespace dcms\customarea\frontend\includes;

use dcms\customarea\backend\includes\Database;

class User {

	public function __construct() {

		add_action( 'wp_ajax_nopriv_dcms_register_user', [ $this, 'custom_register_user_ajax' ] );
		add_action( 'wp_ajax_nopriv_dcms_login_user', [ $this, 'custom_login_user_ajax' ] );

//		add_action( 'wp_ajax_dcms_save_data_connection', [ $this, 'custom_save_data_connection' ] );
//		add_action( 'wp_ajax_dcms_save_data_emergency', [ $this, 'custom_save_data_emergency' ] );

	}

	public function custom_register_user_ajax(): void {

		dcms_validate_nonce( $_POST['nonce'], 'ajax-nonce' );

		$user_login = sanitize_user( $_POST['username'] ?? '' );
		$user_email = sanitize_email( $_POST['email'] ?? '' );

		if ( is_user_logged_in() ) {
			$res = [
				'success' => false,
				'message' => __( 'Ya estás logueado', 'customarea' )
			];
			wp_send_json( $res );
		}

		// Search for user in pre-register
		$db              = new Database();
		$pre_register_id = $db->get_id_email_pre_register( $user_email );

		if ( ! $pre_register_id ) {
			$res = [
				'success' => false,
				'message' => __( 'Tienes que usar algún correo que tengamos pre registrado', 'customarea' )
			];
			wp_send_json( $res );
		}

		$res = [
			'success' => true,
			'message' => __( 'Usuario registrado, revisa tu correo <strong>te debe llegar un enlace para establecer tu contraseña</strong>', 'customarea' )
		];

		$user_id = register_new_user( $user_login, $user_email );

		// Update user_id in pre-register
		$db->update_user_id_email_pre_register( $pre_register_id, $user_id );

		if ( is_wp_error( $user_id ) ) {
			$res = [
				'success' => false,
				'message' => $user_id->get_error_message()
			];
		}

		wp_send_json( $res );
	}


	public function custom_login_user_ajax(): void {

		dcms_validate_nonce( $_POST['nonce'], 'ajax-nonce' );

		// First
		$info                  = [];
		$info['user_login']    = $_POST['username'] ?? '';
		$info['user_password'] = $_POST['password'] ?? '';
		$info['remember']      = false;

		$user_signon = wp_signon( $info, false );

		if ( ! is_wp_error( $user_signon ) ) {
			wp_set_current_user( $user_signon->ID );
			wp_set_auth_cookie( $user_signon->ID );

			if ( dcms_is_user_approved() ) {
				$url_redirect = dcms_get_url_client_area();
			} else {
				$url_redirect = dcms_get_url_affiliate_form();
			}

			// All is ok
			$res = [
				'success'      => true,
				'message'      => __( 'Redireccionando...', 'customarea' ),
				'url_redirect' => $url_redirect,
			];

		} else {
			$res = [
				'status'  => false,
				'message' => $user_signon->get_error_message(),
			];
		}

		wp_send_json( $res );
	}


	function update_user_email( $user_id, $new_email ) :array {

		$user_info = get_userdata( $user_id );
		if ( $user_info->user_email == $new_email ) {
			return [
				'status'  => true,
				'message' => __( 'El correo es el mismo.', 'customarea' ),
			];
		}

		if ( ! $this->is_email_unique( $user_id, $new_email ) ) {
			return [
				'status'  => false,
				'message' => __( 'El correo ya esta siendo usado por otro usuario.', 'customarea' ),
			];
		}

		// Update the user's email
		$user_data = array(
			'ID'         => $user_id,
			'user_email' => $new_email,
		);

		$user_id = wp_update_user( $user_data );

		if ( is_wp_error( $user_id ) ) {
			return [
				'status'  => false,
				'message' => $user_id->get_error_message(),
			];
		}

		return [
			'status'  => true,
			'message' => __( 'Correo actualizado correctamente.', 'customarea' ),
		];
	}


	function is_email_unique( $user_id, $new_email ): bool {
		$email_exists = email_exists( $new_email );

		if ( $email_exists && $email_exists != $user_id ) {
			return false; // Email is already in use by another user
		}

		return true; // Email is unique or belongs to the current user
	}

}



