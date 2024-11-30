<?php

namespace dcms\customarea\frontend\includes;

class Shortcode {

	public function __construct() {
		add_action( 'init', [ $this, 'create_shortcodes' ] );
	}

	public function create_shortcodes(): void {
		add_shortcode( DCMS_CUSTOMAREA_SHORTCODE_REGISTER, [ $this, 'create_register_form' ] );
		add_shortcode( DCMS_CUSTOMAREA_SHORTCODE_LOGIN, [ $this, 'create_login_form' ] );
		add_shortcode( DCMS_CUSTOMAREA_SHORTCODE_LOGOUT, [ $this, 'create_logout' ] );

		// add_shortcode( DCMS_CUSTOMAREA_SHORTCODE_CLIENT_EMERGENCY_DATA, [ $this, 'create_client_data_emergency_form' ] );
		// add_shortcode( DCMS_CUSTOMAREA_SHORTCODE_CLIENT_CONNECTION_DATA, [
		// 	$this,
		// 	'create_client_data_connection_form'
		// ] );
		// add_shortcode( DCMS_CUSTOMAREA_SHORTCODE_QR_CODE, [ $this, 'create_client_qr_code' ] );

		// add_shortcode( DCMS_CUSTOMAREA_SHORTCODE_PUBLIC_DATA, [ $this, 'create_public_data_form' ] );
	}

	public function create_register_form(): string {
		// Validate user is not logged in
		if ( is_user_logged_in() ) {
			return __( 'Ya estás logueado', 'customarea' );
		}

		wp_enqueue_script( 'customarea-script' );
		wp_enqueue_style( 'customarea-style' );

		$url_login = dcms_get_url_login();

		ob_start();
		include_once( DCMS_CUSTOMAREA_PATH . '/frontend/views/register-form.php' );

		return ob_get_clean();
	}


	public function create_login_form(): string {
		wp_enqueue_script( 'customarea-script' );
		wp_enqueue_style( 'customarea-style' );

		if ( is_user_logged_in() ) {
			ob_start();
			include_once( DCMS_CUSTOMAREA_PATH . '/frontend/views/logout-form.php' );

			return ob_get_clean();
		}

		$url_register = dcms_get_url_register();

		ob_start();
		include_once( DCMS_CUSTOMAREA_PATH . '/frontend/views/login-form.php' );

		return ob_get_clean();
	}

	public function create_logout() {
		if ( is_user_logged_in() ) {
			ob_start();
			include_once( DCMS_CUSTOMAREA_PATH . '/views/logout-form.php' );

			return ob_get_clean();
		}
	}


	public function create_client_data_emergency_form(): string {
		wp_enqueue_script( 'customarea-script' );
		wp_enqueue_style( 'customarea-style' );

		if ( ! is_user_logged_in() ) {
			return __( 'No tienes permisos para acceder a esta sección', 'customarea' );
		}

		$user_id = get_current_user_id();
		$meta    = get_user_meta( $user_id, '', true );

		// All user meta data
		$data = array_map( function ( $meta ) {
			return $meta[0];
		}, $meta );


		// Get fields for the form
		$form             = new Form();
		$fields           = $form->get_fields_client_area();
		$show_save_button = true;
		$show_title       = true;

		ob_start();
		include_once( DCMS_CUSTOMAREA_PATH . '/views/client-data-emergency.php' );

		return ob_get_clean();
	}

	public function create_client_data_connection_form(): string {
		wp_enqueue_script( 'customarea-script' );
		wp_enqueue_style( 'customarea-style' );

		if ( ! is_user_logged_in() ) {
			return __( 'No tienes permisos para acceder a esta sección', 'customarea' );
		}

		$user = wp_get_current_user();

		ob_start();
		include_once( DCMS_CUSTOMAREA_PATH . '/views/client-data-connection.php' );

		return ob_get_clean();
	}

	public function create_public_data_form(): string {
		wp_enqueue_script( 'customarea-script' );
		wp_enqueue_style( 'customarea-style' );

		$username = get_query_var( 'customarea_username' );
		$user     = get_user_by( 'login', urldecode( $username ) );

		if ( $user === false ) {
			return __( 'Usuario no encontrado', 'customarea' );
		}


		$allow_products = dcms_get_products_ids();

		$bought = false;
		// foreach ( $allow_products as $allow_product ) {
		// 	if ( wc_customer_bought_product( '', $user->ID, $allow_product ) ) {
		// 		$bought = true;
		// 		break;
		// 	}
		// }

		if ( ! $bought ) {
			$options         = get_option( 'customarea_options' );
			$not_bought_page = $options['client_public_page_not_bought'] ?? '';

			if ( $not_bought_page ) {
				$page = get_page_by_path( $not_bought_page );

				return $page->post_content;
			} else {
				return __( 'Tienes que comprar un producto para acceder a esta sección', 'customarea' );
			}
		}

		$user_id = $user->ID;
		$meta    = get_user_meta( $user_id, '', true );

		// All user meta data
		$data = array_map( function ( $meta ) {
			return $meta[0];
		}, $meta );


		// Get fields for the form
		$form       = new Form();
		$fields     = $form->get_fields_public_area();
		$is_public  = true;
		$show_title = true;

		ob_start();
		include_once( DCMS_CUSTOMAREA_PATH . '/views/client-data-emergency.php' );

		return ob_get_clean();
	}

	public function create_client_qr_code() {
		wp_enqueue_script( 'customarea-script' );
		wp_enqueue_style( 'customarea-style' );

		if ( ! is_user_logged_in() ) {
			return __( 'No tienes permisos para acceder a esta sección', 'customarea' );
		}

		$user     = wp_get_current_user();
		$username = $user->user_login;


		$img_qr = DCMS_CUSTOMAREA_UPLOAD_URL . $username . '.svg';

		ob_start();
		include_once( DCMS_CUSTOMAREA_PATH . '/views/client-qr-code.php' );

		return ob_get_clean();
	}
}
