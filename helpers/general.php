<?php

// Validate security nonce
if ( ! function_exists( 'dcms_validate_nonce' ) ) {
	function dcms_validate_nonce( $nonce, $nonce_name ): void {
		if ( ! wp_verify_nonce( $nonce, $nonce_name ) ) {
			$res = [
				'success' => false,
				'message' => '✋ Error nonce validation!!'
			];
			wp_send_json( $res );
		}
	}
}

// Get current qr designs keys

function dcms_get_products_ids(): array {
	$ids = get_option( 'customarea_options' )['products_ids'] ?? '';

	return explode( ',', $ids );
}

function dcms_get_url_client_area(): string {
	return get_permalink( get_page_by_path( get_option( 'customarea_options' )['client_area_page'] ?? 'area-cliente' ) );
}

function dcms_get_url_register(): string {
	$id_page = get_option( 'customarea_options' )['register_page'];
	return get_url_by_id( $id_page );
}

function dcms_get_url_login(): string {
	$id_page = get_option( 'customarea_options' )['login_page'];
	return get_url_by_id( $id_page );
}


function get_url_by_id( $id ): string {
	$url = get_permalink( $id );
	if ( ! $url ) {
		$url = home_url();
	}

	return $url;
}

