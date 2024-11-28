<?php

namespace dcms\customarea\includes;

/**
 * Class for creating a dashboard submenu
 */
class Submenu {

	// Constructor
	public function __construct() {
		add_action( 'admin_menu', [ $this, 'register_submenu' ] );
	}

	// Register submenu
	public function register_submenu(): void {
		add_submenu_page(
			DCMS_CUSTOMAREA_SUBMENU,
			__( 'Custom area QR', 'customarea' ),
			__( 'Custom area QR', 'customarea' ),
			'manage_options',
			'customarea',
			[ $this, 'submenu_page_callback' ]
		);
	}

	// Callback, show view
	public function submenu_page_callback(): void {
		$username = $_GET['user'] ?? '';
		$design     = $_GET['design'] ?? '1';

		if ( empty( $username ) ) {
			include_once( DCMS_CUSTOMAREA_PATH . '/views/settings-main.php' );
		} else {
			$pdf_design = new PdfDesign();
			$pdf_design->generate_design( $username, $design );
		}
	}
}
