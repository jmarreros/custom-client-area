<?php

namespace dcms\customarea\includes;

class Redirect {

	public function __construct() {
//		add_action( 'template_redirect', [ $this, 'redirect_client_area' ] );
//		add_action( 'template_redirect', [ $this, 'redirect_show_design_pdf' ] );
	}

	// Redirect client area from my account page WooCommerce
	public function redirect_client_area(): void {
		if ( ! is_user_logged_in() ) {
			return;
		}

		$options          = get_option( 'customarea_options' );
		$redirect         = intval( $options['client_area_page_redirect'] ?? 0 );
		$client_area_slug = $options['client_area_page'] ?? '';

		if ( ! $redirect ) {
			return;
		}

		$url_redirect = get_page_link( get_page_by_path( $client_area_slug ) );

		wp_redirect( $url_redirect );
		exit;
	}

	// public function redirect_show_design_pdf(): void {
	// 	$username = $_GET['username'] ?? '';
	// 	$design   = $_GET['design'] ?? '';

	// 	if ( ! empty( $username ) && ! empty( $design ) ) {
	// 		$pdf_design = new PdfDesign();
	// 		$pdf_design->generate_design( $username, $design );
	// 	}
	// }
}
