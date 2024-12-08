<?php
/*
Plugin Name: Custom Client area
Plugin URI: https://webservi.es
Description: Plugin that create custom client area
Version: 1.0
Author: Jhon Marreros Guzmán
Author URI: https://webservi.es
Text Domain: customarea
Domain Path: languages
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

namespace dcms\customarea;

require __DIR__ . '/vendor/autoload.php';

use dcms\customarea\backend\includes\Plugin;
use dcms\customarea\backend\includes\Submenu;
use dcms\customarea\backend\includes\PreRegister;
use dcms\customarea\backend\includes\Settings;
use dcms\customarea\backend\includes\Enqueue as EnqueueBackend;
use dcms\customarea\backend\includes\User as UserBackend;
use dcms\customarea\backend\includes\Approval;

use dcms\customarea\frontend\includes\Shortcode;
use dcms\customarea\frontend\includes\Redirect;
use dcms\customarea\frontend\includes\Enqueue as EnqueueFrontend;
use dcms\customarea\frontend\includes\User as UserFrontend;
use dcms\customarea\frontend\includes\Form;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Plugin class to handle settings constants and loading files
 **/
final class Loader {

	// Define all the constants we need
	public function define_constants(): void {
		define( 'DCMS_CUSTOMAREA_VERSION', '1.2' );
		define( 'DCMS_CUSTOMAREA_PATH', plugin_dir_path( __FILE__ ) );
		define( 'DCMS_CUSTOMAREA_URL', plugin_dir_url( __FILE__ ) );
		define( 'DCMS_CUSTOMAREA_BASE_NAME', plugin_basename( __FILE__ ) );
		define( 'DCMS_CUSTOMAREA_SUBMENU', 'tools.php' );

		// User metadata
		define( 'DCMS_CUSTOMAREA_FILL_FORM_AFFILIATION', 'dcms_fill_form_affiliation' );
		define( 'DCMS_CUSTOMAREA_APPROVED_USER', 'dcms_approved_user' );
		define( 'DCMS_CUSTOMAREA_APPROVED_USER_DATE', 'dcms_approved_user_date' );
		define( 'DCMS_CUSTOMAREA_ROL', 'affiliate_role' );

		// Shortcodes
		define( 'DCMS_CUSTOMAREA_SHORTCODE_LOGIN', 'customarea_login' );
		define( 'DCMS_CUSTOMAREA_SHORTCODE_LOGOUT', 'customarea_logout' );
		define( 'DCMS_CUSTOMAREA_SHORTCODE_REGISTER', 'customarea_register' );
		define( 'DCMS_CUSTOMAREA_SHORTCODE_AFFILIATION_FORM', 'customarea_affiliation' );

//		define( 'DCMS_CUSTOMAREA_SHORTCODE_CLIENT_EMERGENCY_DATA', 'customarea_client_data_emergency' );
//		define( 'DCMS_CUSTOMAREA_SHORTCODE_CLIENT_CONNECTION_DATA', 'customarea_client_data_connection' );
//		define( 'DCMS_CUSTOMAREA_SHORTCODE_QR_CODE', 'customarea_code' );

//		define( 'DCMS_CUSTOMAREA_SHORTCODE_PUBLIC_DATA', 'customarea_public_data' );
//		define( 'DCMS_CUSTOMAREA_UPLOAD_DIR', wp_upload_dir()['basedir'] . '/users-qr-code/' );
//		define( 'DCMS_CUSTOMAREA_UPLOAD_URL', wp_upload_dir()['baseurl'] . '/users-qr-code/' );
	}

	// Load tex domain
	public function load_domain(): void {
		add_action( 'plugins_loaded', function () {
			$path_languages = dirname( DCMS_CUSTOMAREA_BASE_NAME ) . '/languages/';
			load_plugin_textdomain( 'customarea', false, $path_languages );
		} );
	}

	// Add link to plugin list
	public function add_link_plugin(): void {
		add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), function ( $links ) {
			return array_merge( array(
				'<a href="' . esc_url( admin_url( DCMS_CUSTOMAREA_SUBMENU . '?page=customarea' ) ) . '">' . __( 'Settings', 'customarea' ) . '</a>'
			), $links );
		} );
	}

	// Initialize all
	public function init(): void {
		$this->define_constants();
		$this->load_domain();
		$this->add_link_plugin();

		new Plugin();
		new SubMenu();
		new PreRegister();
		new Settings();
		new EnqueueBackend();
		new UserBackend();
		new Approval();

		new Shortcode();
		new Redirect();
		new EnqueueFrontend();
		new UserFrontend();
		new Form();
	}
}

$dcms_process = new Loader();
$dcms_process->init();