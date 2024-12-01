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

function dcms_is_user_approved(): bool {
	$user_id  = get_current_user_id();
	$approved = get_user_meta( $user_id, DCMS_CUSTOMAREA_APPROVED_USER, true );

	return $approved === '1';
}

function dcms_user_fill_form_affiliation(): bool {
	$user_id   = get_current_user_id();
	$fill_form = get_user_meta( $user_id, DCMS_CUSTOMAREA_FILL_FORM_AFFILIATION, true );

	return $fill_form === '1';
}

function dcms_get_url_client_area(): string {
	$id_page = get_option( 'customarea_options' )['client_area_page'];

	return get_url_by_id( $id_page );
}

function dcms_get_url_affiliate_form(): string {
	$id_page = get_option( 'customarea_options' )['affiliate_form_page'];

	return get_url_by_id( $id_page );
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

