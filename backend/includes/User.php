<?php

namespace dcms\customarea\backend\includes;

class User {

	public function __construct() {
		add_action ('after_setup_theme', [$this, 'hide_admin_bar']);

		add_filter('manage_users_columns', [$this, 'add_columns_user']);
		add_action('manage_users_custom_column', [$this, 'show_data_colum_user'], 10, 3);
	}

	public function hide_admin_bar():void{
		if (!current_user_can('administrator') && !is_admin()) {
			show_admin_bar(false);
		}
	}

	public function add_columns_user($columns): array {
		$columns['pdfs'] = 'PDF';
		$columns['approved'] = 'Aprobado';
		return $columns;
	}

	public function show_data_colum_user($value, $column_name, $user_id): string {
		if ($column_name === 'pdfs') {
			return 'PDFs';
		}

		if ($column_name === 'approved') {
			return 'Aprobado';
		}
		return $value;
	}
}


//		add_action( 'show_user_profile', [ $this, 'add_fields_profile' ] );
//		add_action( 'edit_user_profile', [ $this, 'add_fields_profile' ] );
//		add_action( 'personal_options_update', [ $this, 'save_fields_profile' ] );
//		add_action( 'edit_user_profile_update', [ $this, 'save_fields_profile' ] );

//	// Show profile fields in admin
//	public function add_fields_profile( $user ): void {
//		include_once DCMS_CUSTOMAREA_PATH . 'views/profile-show-fields.php';
//	}
//
//	// Edit profile fields in admin
//	public function save_fields_profile( $user_id ): void {
//		$fieldsText = [
//			'birthday',
//			'contacto1',
//			'contacto2',
//			'alergias',
//			'enfermedades',
//			'medicacion',
//			'grupoSanguineo',
//			'otros',
//		];
//
//		$fieldsCheckbox = [
//			'tabaco',
//			'alcohol',
//			'drogas',
//			'hipertencion',
//			'arritmia',
//			'colesterol',
//			'diabetis',
//			'marcapasos',
//		];
//
//		if ( ! current_user_can( 'edit_user', $user_id ) ) {
//			return;
//		}
//
//		foreach ( $fieldsText as $field ) {
//			if ( isset( $_POST[ $field ] ) ) {
//				update_user_meta( $user_id, $field, sanitize_text_field( $_POST[ $field ] ) );
//			}
//		}
//
//		foreach ( $fieldsCheckbox as $field ) {
//			if ( isset( $_POST[ $field ] ) ) {
//				update_user_meta( $user_id, $field, 1 );
//			} else {
//				update_user_meta( $user_id, $field, 0 );
//			}
//		}
//
//
//	}