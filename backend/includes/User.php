<?php

namespace dcms\customarea\backend\includes;

class User {

	public function __construct() {
//		add_action( 'show_user_profile', [ $this, 'add_fields_profile' ] );
//		add_action( 'edit_user_profile', [ $this, 'add_fields_profile' ] );
//		add_action( 'personal_options_update', [ $this, 'save_fields_profile' ] );
//		add_action( 'edit_user_profile_update', [ $this, 'save_fields_profile' ] );
	}

	// Show profile fields in admin
	public function add_fields_profile( $user ): void {
		include_once DCMS_CUSTOMAREA_PATH . 'views/profile-show-fields.php';
	}

	// Edit profile fields in admin
	public function save_fields_profile( $user_id ): void {
		$fieldsText = [
			'birthday',
			'contacto1',
			'contacto2',
			'alergias',
			'enfermedades',
			'medicacion',
			'grupoSanguineo',
			'otros',
		];

		$fieldsCheckbox = [
			'tabaco',
			'alcohol',
			'drogas',
			'hipertencion',
			'arritmia',
			'colesterol',
			'diabetis',
			'marcapasos',
		];

		if ( ! current_user_can( 'edit_user', $user_id ) ) {
			return;
		}

		foreach ( $fieldsText as $field ) {
			if ( isset( $_POST[ $field ] ) ) {
				update_user_meta( $user_id, $field, sanitize_text_field( $_POST[ $field ] ) );
			}
		}

		foreach ( $fieldsCheckbox as $field ) {
			if ( isset( $_POST[ $field ] ) ) {
				update_user_meta( $user_id, $field, 1 );
			} else {
				update_user_meta( $user_id, $field, 0 );
			}
		}


	}

}



