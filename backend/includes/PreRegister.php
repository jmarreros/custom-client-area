<?php

namespace dcms\customarea\backend\includes;

use JetBrains\PhpStorm\NoReturn;

class PreRegister {

	public function __construct() {
		add_action( 'admin_post_nopriv_process_pre_register_form', [ $this, 'process_pre_register_form' ] );
		add_action( 'admin_post_process_pre_register_form', [ $this, 'process_pre_register_form' ] );
	}

	#[NoReturn] public function process_pre_register_form():void{
		// Check nonce
		if( !isset( $_POST['pre_register_nonce'] ) || !wp_verify_nonce( $_POST['pre_register_nonce'], 'pre_register_action' ) ){
			wp_die( 'Error de seguridad' );
		}

		// Get emails from textarea
		$emails = explode( "\n", $_POST['pre-login'] );
		$emails = array_map( 'trim', $emails );

		$db = new Database();
		$db->save_table_pre_register( $emails );

		$redirect = add_query_arg( 'success', '1', wp_get_referer() );
		wp_redirect( $redirect );
		exit;
	}

}

