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


function create_space_HTML(): string {
	return "<div class='form-group'></div>";
}

function create_control_HTML( $name, $field ): string {
	$type        = $field['type'] ?? '';
	$value       = $field['value'] ?? '';
	$label       = $field['label'] ?? '';
	$required    = $field['required'] ?? false;
	$options     = $field['options'] ?? [];
	$description = $field['description'] ?? '';

	$required = $required ? 'required' : '';
	$control  = '';
	switch ( $type ) {
		case 'text':
			$control = "<input type='text' name='$name' id='$name' value='$value' class='form-control' $required>";
			break;
		case 'date':
			$control = "<input type='date' name='$name' id='$name' value='$value' class='form-control' $required>";
			break;
		case 'email':
			$control = "<input type='email' name='$name' id='$name' value='$value' class='form-control' $required>";
			break;
		case 'password':
			$control = "<input type='password' name='$name' id='$name' value='$value' class='form-control' $required>";
			break;
		case 'textarea':
			$control = "<textarea name='$name' id='$name' class='form-control' $required>$value</textarea>";
			break;
		case 'select':
			$control = "<select name='$name' id='$name' class='form-control' $required>";
			foreach ( $options as $option ) {
				$selected = $option['value'] === $value ? 'selected' : '';
				$control  .= "<option value='{$option['value']}' $selected>{$option['text']}</option>";
			}
			$control .= '</select>';
			break;
		case 'radio':
			$control = '<div class="options">';
			foreach ( $options as $option ) {
				$checked = $option['value'] === $value ? 'checked' : '';
				$control .= "<label><input type='radio' name='$name' id='$name' value='{$option['value']}' $checked> {$option['text']}</label>";
			}
			$control .= '</div>';
			break;
		case 'checkbox':
			$checked = $value === '1' ? 'checked' : '';
			$control = "<input type='checkbox' name='$name' value='1' $checked>";
			break;
		case 'datalist':
			$control = "<input list='$name-options' id='$name' name='$name' class='form-control datalist' $required'>";
			$control .= "<datalist id='$name-options'>";
			foreach ( $options as $option ) {
				$control .= "<option value='{$option['value']}'>";
			}
			$control .= '</datalist>';
			break;
	}

	if ( $description ) {
		$description = "<div class='description'>$description</div>";
	}

	return "<div class='form-group'>
				<label for='$name'>$label: </label>
				$control
				$description
			</div>";
}

