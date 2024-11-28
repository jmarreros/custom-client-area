<?php

// Validate security nonce
if ( ! function_exists( 'dcms_validate_nonce' ) ) {
	function dcms_validate_nonce( $nonce, $nonce_name ): void {
		if ( ! wp_verify_nonce( $nonce, $nonce_name ) ) {
			$res = [
				'success'  => false,
				'message' => '✋ Error nonce validation!!'
			];
			wp_send_json( $res );
		}
	}
}

// Get current qr designs keys
function dcms_get_current_qr_designs():array {
	return 	$designs = [
		1 => '_design_qr_1',
	];
}

function dcms_get_products_ids():array{
	$ids = get_option( 'customarea_options' )['products_ids'] ?? '';
	return explode( ',', $ids );
}
function dcms_get_url_client_area(): string {
	return get_permalink( get_page_by_path( get_option( 'customarea_options' )['client_area_page'] ?? 'area-cliente' ) );
}

function dcms_get_url_register(): string {
	return get_permalink( get_page_by_path( get_option( 'customarea_options' )['register_page'] ?? 'registro-usuario' ) );
}

function dcms_get_url_login(): string {
	return get_permalink( get_page_by_path( get_option( 'customarea_options' )['login_page'] ?? 'login' ) );
}

function dcms_get_url_public_area(): string {
	return get_permalink( get_page_by_path( get_option( 'customarea_options' )['client_public_page'] ?? 'emergencia' ) );
}
