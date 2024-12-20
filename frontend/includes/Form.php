<?php

namespace dcms\customarea\frontend\includes;

// To manage fields in the form
use dcms\customarea\helpers\State;
use JetBrains\PhpStorm\NoReturn;

class Form {

	public function __construct() {
		add_action( 'wp_ajax_dcms_save_affiliation', [ $this, 'process_form_affiliate' ] );
	}

	#[NoReturn]
	public function process_form_affiliate(): void {
		$fields  = $this->get_fields_affiliation();
		$data    = [];
		$user_id = get_current_user_id();

		$user = new User();

		foreach ( $fields as $key => $field ) {
			$data[ $key ] = $_POST[ $key ] ?? '';
		}

		// Save data
		foreach ( $data as $key => $value ) {

			if ( $key === 'email' && $value !== '' ) {
				$res = $user->update_user_email( $user_id, $value );

				if ( $res['status'] === false ) {
					wp_send_json( $res );
					exit();
				}
			}

			error_log( print_r( $key . ' - ' . $value, true ) );

			update_user_meta( $user_id, $key, $value );
		}

		// Add metadata state
		update_user_meta( $user_id, DCMS_CUSTOMAREA_APPROVED_USER, State::PENDING );

		$res = [
			'success' => true,
			'message' => 'Datos guardados correctamente',
		];

		wp_send_json( $res );
	}

	public function get_fields_affiliation(): array {
		return get_form_fields_structure();
	}

}

