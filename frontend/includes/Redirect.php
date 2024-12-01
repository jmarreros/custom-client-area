<?php

namespace dcms\customarea\frontend\includes;

use JetBrains\PhpStorm\NoReturn;

class Redirect {

	public function __construct() {
		add_filter( 'after_password_reset', [ $this, 'redirect_after_password_reset' ] );
	}

	#[NoReturn] public function redirect_after_password_reset(): void {
		$url_login = dcms_get_url_login();
		wp_redirect( $url_login );
		exit;
	}

}


//		add_action( 'init', [ $this, 'redirect_client_area_from_backend' ] );
//	public function redirect_client_area_from_backend():void{
//		if (is_admin() && !current_user_can('administrator') && !(defined('DOING_AJAX') && DOING_AJAX)) {
//			wp_redirect(home_url());
//			exit;
//		}
//	}


//		add_action( 'template_redirect', [ $this, 'redirect_client_area' ] );
//		add_action( 'template_redirect', [ $this, 'redirect_show_design_pdf' ] );

// Redirect client area from my account page WooCommerce
//	public function redirect_client_area(): void {
//		if ( ! is_user_logged_in() ) {
//			return;
//		}
//
//		$options          = get_option( 'customarea_options' );
//		$redirect         = intval( $options['client_area_page_redirect'] ?? 0 );
//		$client_area_slug = $options['client_area_page'] ?? '';
//
//		if ( ! $redirect ) {
//			return;
//		}
//
//		$url_redirect = get_page_link( get_page_by_path( $client_area_slug ) );
//
//		wp_redirect( $url_redirect );
//		exit;
//	}
//
// public function redirect_show_design_pdf(): void {
// 	$username = $_GET['username'] ?? '';
// 	$design   = $_GET['design'] ?? '';

// 	if ( ! empty( $username ) && ! empty( $design ) ) {
// 		$pdf_design = new PdfDesign();
// 		$pdf_design->generate_design( $username, $design );
// 	}
// }