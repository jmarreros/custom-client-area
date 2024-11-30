<?php

namespace dcms\customarea\frontend\includes;

use dcms\customarea\backend\includes\Database;

class User {

	public function __construct() {

		add_action( 'wp_ajax_nopriv_dcms_register_user', [ $this, 'custom_register_user_ajax' ] );
//		add_action( 'wp_ajax_nopriv_dcms_login_user', [ $this, 'custom_login_user_ajax' ] );
		// add_filter( 'after_password_reset', [ $this, 'custom_redirect' ] );

//		add_action( 'wp_ajax_dcms_save_data_connection', [ $this, 'custom_save_data_connection' ] );
//		add_action( 'wp_ajax_dcms_save_data_emergency', [ $this, 'custom_save_data_emergency' ] );

	}

	public function custom_register_user_ajax(): void {

		dcms_validate_nonce( $_POST['nonce'], 'ajax-nonce' );

		$user_login = sanitize_email( $_POST['email'] ?? '' );

		if ( is_user_logged_in() ) {
			$res = [
				'success' => false,
				'message' => __( 'Ya estás logueado', 'customarea' )
			];
			wp_send_json( $res );
		}

		// Search for user in pre-register
		$db = new Database();
		$pre_register_id = $db->get_id_email_pre_register( $user_login );

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

		$user_id = register_new_user( $user_login, $user_login );

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

			// All is ok
			$res = [
				'success'      => true,
				'message'      => __( 'Redireccionando...', 'customarea' ),
				'url_redirect' => dcms_get_url_client_area(),
			];

		} else {
			$res = [
				'status'  => false,
				'message' => $user_signon->get_error_message(),
			];
		}

		wp_send_json( $res );
	}

	// #[NoReturn]
	// public function custom_redirect(): void {
	// 	$url_login = dcms_get_url_login();
	// 	wp_redirect( $url_login );
	// 	exit;
	// }

	public function custom_save_data_connection(): void {

		dcms_validate_nonce( $_POST['nonce'], 'ajax-nonce' );

		$user_id   = get_current_user_id();
		$email     = $_POST['email'] ?? '';
		$password  = $_POST['password'] ?? '';
		$password2 = $_POST['password2'] ?? '';

		$data = [
			'ID'         => $user_id,
			'user_email' => $email
		];

		$res = [
			'success' => true,
			'message' => __( 'Los datos se guardaron correctamente', 'customarea' ),
		];

		if ( ! is_email( $email ) ) {
			$res = [
				'success' => false,
				'message' => __( 'Email no válido', 'customarea' ),
			];
			wp_send_json( $res );
		}

		if ( ! empty( $password ) ) {
			if ( $password !== $password2 ) {
				$res = [
					'success' => false,
					'message' => __( 'Las contraseñas no coinciden', 'customarea' ),
				];
				wp_send_json( $res );
			}
			$data['user_pass'] = $_POST['password'];
		}

		$user_id = wp_update_user( $data );

		if ( is_wp_error( $user_id ) ) {
			$res = [
				'success' => false,
				'message' => $user_id->get_error_message(),
			];
		}

		wp_send_json( $res );
	}


	public function custom_save_data_emergency(): void {

		dcms_validate_nonce( $_POST['nonce'], 'ajax-nonce' );

		$user_id = get_current_user_id();

		// Assign all items to $items without nonce and action
		$items = $_POST;
		unset( $items['nonce'] );
		unset( $items['action'] );

		// Save all items in user meta
		foreach ( $items as $key => $value ) {
			update_user_meta( $user_id, $key, $value );
		}


		$res = [
			'success' => true,
			'message' => __( 'Los datos se guardaron correctamente', 'customarea' ),
		];

		wp_send_json( $res );
	}



}



