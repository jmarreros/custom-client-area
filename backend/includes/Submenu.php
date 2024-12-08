<?php

namespace dcms\customarea\backend\includes;

use dcms\customarea\helpers\State;

/**
 * Class for creating a dashboard submenu
 */
class Submenu {

	// Constructor
	public function __construct() {
		add_action( 'admin_menu', [ $this, 'register_submenu' ] );
		add_action( 'admin_bar_menu', [ $this, 'add_toolbar_items' ], 100 );
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
			[ $this, 'submenu_page_user_approval_callback' ],
			'dashicons-admin-users',
			70
		);

		add_submenu_page(
			'customarea',
			__( 'Aprobación Usuarios', 'customarea' ),
			__( 'Aprobación Usuarios', 'customarea' ),
			'manage_options',
			'customarea',
			[ $this, 'submenu_page_user_approval_callback' ]
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
			__( 'Configuración', 'customarea' ),
			__( 'Configuración', 'customarea' ),
			'manage_options',
			'customarea-configuration',
			[ $this, 'submenu_page_settings_callback' ]
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
		$db     = new Database();
		$emails = $db->get_emails_pre_register();
		$emails = implode( "\n", $emails );

		include_once( DCMS_CUSTOMAREA_PATH . '/backend/views/pre-register.php' );
	}

	public function submenu_page_user_approval_callback(): void {

		$state = $_GET['state_user'] ?? State::PENDING;

		$db = new Database();

		$count_rejected = $db->count_user_state( State::REJECTED );
		$count_pending  = $db->count_user_state( State::PENDING );
		$count_approval = $db->count_user_state( State::APPROVED );

		switch ( $state ) {
			case State::REJECTED:
				$count_items = $count_rejected;
				break;
			case State::PENDING:
				$count_items = $count_pending;
				break;
			case State::APPROVED:
				$count_items = $count_approval;
				break;
			default:
				$count_items = 0;
		}

		// Pagination
		$paged       = abs( $_GET['paged_user'] ?? 1 );
		$limit       = get_option( 'posts_per_page' ) ?? 10;
		$offset      = ( $paged - 1 ) * $limit;
		$total_pages = ceil( $count_items / $limit );

		// state parameter
		$db    = new Database();
		$users = $db->get_users_per_state( $state, $limit, $offset );

		include_once( DCMS_CUSTOMAREA_PATH . '/backend/views/user-approval.php' );
	}

	public function add_toolbar_items( $admin_bar ): void {
		$admin_bar->add_menu( array(
			'id'    => 'customarea',
			'title' => '<span class="dashicons-before dashicons-admin-users">' . __( 'Aprobación Usuarios', 'customarea' ) . '</span>',
			'href'  => admin_url( 'admin.php?page=customarea' ),
		) );
	}
}
