<?php

namespace dcms\customarea\backend\includes;

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
		wp_enqueue_script( 'customarea-admin-script' );
		wp_enqueue_style( 'customarea-admin-style' );

		add_menu_page(
			__( 'Area de cliente', 'customarea' ),
			__( 'Area de cliente', 'customarea' ),
			'manage_options',
			'customarea',
			[ $this, 'submenu_page_settings_callback' ],
			'dashicons-admin-users',
			70
		);

		add_submenu_page(
			'customarea',
			__( 'Configuración', 'customarea' ),
			__( 'Configuración', 'customarea' ),
			'manage_options',
			'customarea',
			[ $this, 'submenu_page_settings_callback' ]
		);

		add_submenu_page(
			'customarea',
			__( 'Pre Logins', 'customarea' ),
			__( 'Pre Logins', 'customarea' ),
			'manage_options',
			'customarea-pre-logins',
			[ $this, 'submenu_page_pre_register_callback' ]
		);


		add_submenu_page(
			'customarea',
			__( 'Shortcodes', 'customarea' ),
			__( 'Shortcodes', 'customarea' ),
			'manage_options',
			'customarea-shortcodes',
			[ $this, 'submenu_page_shortcodes_callback' ]
		);
	}

	public function submenu_page_settings_callback(): void {
		include_once( DCMS_CUSTOMAREA_PATH . '/backend/views/settings-main.php' );
	}

	public function submenu_page_shortcodes_callback(): void {
		include_once( DCMS_CUSTOMAREA_PATH . '/backend/views/shortcodes.php' );
	}

	public function submenu_page_pre_register_callback(): void {
		$db = new Database();
		$emails = $db->get_emails_pre_register();
		$emails = implode( "\n", $emails );

		include_once( DCMS_CUSTOMAREA_PATH . '/backend/views/pre-register.php' );
	}
}
