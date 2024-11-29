<?php

namespace dcms\customarea\frontend\includes;

class Enqueue {
	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
	}

	// Register scripts frontend
	public function register_scripts(): void {
		wp_register_style( 'customarea-style', DCMS_CUSTOMAREA_URL . 'frontend/assets/style.css', [], DCMS_CUSTOMAREA_VERSION );
		wp_register_script( 'customarea-script', DCMS_CUSTOMAREA_URL . 'frontend/assets/script.js', [ 'jquery' ], DCMS_CUSTOMAREA_VERSION, true );

		wp_localize_script( 'customarea-script',
			'customarea_vars',
			[
				'ajaxurl'         => admin_url( 'admin-ajax.php' ),
				'nonce'           => wp_create_nonce( 'ajax-nonce' ),
			] );
	}
}