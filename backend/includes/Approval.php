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
				update_user_meta( $user_id, DCMS_CUSTOMAREA_APPROVED_USER, $new_state );
			}

			wp_redirect( admin_url( 'admin.php?page=customarea' ) );
		}
	}

}