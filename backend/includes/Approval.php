<?php

namespace dcms\customarea\backend\includes;

use dcms\customarea\helpers\State;

class Approval {

	public function __construct() {
		add_action( 'admin_init', [ $this, 'approval_user' ] );
	}

	public function approval_user(): void {
		if ( isset( $_GET['change_state_user'] ) ) {
			$new_state = (int) $_GET['change_state_user'];
			$user_id   = (int) $_GET['user_id'];
			$user      = get_user_by( 'ID', $user_id );

			if ( $user && in_array( $new_state, [ State::PENDING, State::APPROVED, State::REJECTED ] ) ) {
				// User meta table
				update_user_meta( $user_id, DCMS_CUSTOMAREA_APPROVED_USER, $new_state );
				update_user_meta( $user_id, DCMS_CUSTOMAREA_APPROVED_USER_DATE, current_time( 'mysql' ) );

				// Change user role
				$rol = new Rol();
				if ( $new_state === State::APPROVED ) {
					$rol->add_rol_afiliate( $user_id );
				} else {
					$rol->remove_rol_afiliate( $user_id );
				}

				// Log table
				$db = new Database();
				$db->insert_approval_log( $user_id, $new_state, get_current_user_id() );
			}

			wp_redirect( admin_url( 'admin.php?page=customarea' ) );
		}
	}

}