<?php

namespace dcms\customarea\backend\includes;

use JetBrains\PhpStorm\NoReturn;

class User {

	public function __construct() {

		add_action( 'wp_ajax_nopriv_dcms_register_user', [ $this, 'custom_register_user_ajax' ] );
		add_action( 'wp_ajax_nopriv_dcms_login_user', [ $this, 'custom_login_user_ajax' ] );
		// add_filter( 'after_password_reset', [ $this, 'custom_redirect' ] );

//		add_action( 'wp_ajax_dcms_save_data_connection', [ $this, 'custom_save_data_connection' ] );
//		add_action( 'wp_ajax_dcms_save_data_emergency', [ $this, 'custom_save_data_emergency' ] );

//		add_action( 'show_user_profile', [ $this, 'add_fields_profile' ] );
//		add_action( 'edit_user_profile', [ $this, 'add_fields_profile' ] );
//		add_action( 'personal_options_update', [ $this, 'save_fields_profile' ] );
//		add_action( 'edit_user_profile_update', [ $this, 'save_fields_profile' ] );
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

		$res = [
			'success' => true,
			'message' => __( 'Usuario registrado', 'customarea' )
		];

		$user_id = register_new_user( $user_login, $user_email );

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


	// Show profile fields in admin
	public function add_fields_profile( $user ): void {
		include_once DCMS_CUSTOMAREA_PATH . 'views/profile-show-fields.php';
	}

	// Edit profile fields in admin
	public function save_fields_profile( $user_id ): void {
		$fieldsText = [
			'birthday',
			'contacto1',
			'contacto2',
			'alergias',
			'enfermedades',
			'medicacion',
			'grupoSanguineo',
			'otros',
		];

		$fieldsCheckbox = [
			'tabaco',
			'alcohol',
			'drogas',
			'hipertencion',
			'arritmia',
			'colesterol',
			'diabetis',
			'marcapasos',
		];

		if ( ! current_user_can( 'edit_user', $user_id ) ) {
			return;
		}

		foreach ( $fieldsText as $field ) {
			if ( isset( $_POST[ $field ] ) ) {
				update_user_meta( $user_id, $field, sanitize_text_field( $_POST[ $field ] ) );
			}
		}

		foreach ( $fieldsCheckbox as $field ) {
			if ( isset( $_POST[ $field ] ) ) {
				update_user_meta( $user_id, $field, 1 );
			} else {
				update_user_meta( $user_id, $field, 0 );
			}
		}


	}

}



