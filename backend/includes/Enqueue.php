<?php

namespace dcms\customarea\backend\includes;

class Enqueue {
	public function __construct() {
		add_action( 'admin_enqueue_scripts', [ $this, 'register_scripts' ] );
	}

	// Register scripts frontend
	public function register_scripts( $hook ): void {
		wp_register_style( 'customarea-admin-style', DCMS_CUSTOMAREA_URL . 'backend/assets/style.css', [], DCMS_CUSTOMAREA_VERSION );
		wp_register_script( 'customarea-admin-script', DCMS_CUSTOMAREA_URL . 'backend/assets/script.js', [ 'jquery' ], DCMS_CUSTOMAREA_VERSION, true );

		wp_localize_script( 'customarea-admin-script',
			'customarea_admin_vars',
			[
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'nonce'   => wp_create_nonce( 'ajax-nonce' ),
			] );


		if ( $hook === 'users.php' || $hook === 'user-edit.php' || $hook === 'profile.php' ) {
			wp_enqueue_style( 'customarea-admin-style' );
		}
	}
}