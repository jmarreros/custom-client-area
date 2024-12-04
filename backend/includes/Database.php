<?php

namespace dcms\customarea\backend\includes;

use wpdb;

/**
 * Class for creating a dashboard submenu
 */
class Database {
	private wpdb $wpdb;
	private string $table_pre_register;

	public function __construct() {
		global $wpdb;
		$this->wpdb               = $wpdb;
		$this->table_pre_register = $wpdb->prefix . 'customarea_pre_register';
	}

	public function create_table_pre_register(): void {
		$sql = "CREATE TABLE IF NOT EXISTS $this->table_pre_register (
			id INT(11) NOT NULL AUTO_INCREMENT,
			email VARCHAR(250) NOT NULL UNIQUE,
			created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			user_id bigint(20) unsigned NULL,
			PRIMARY KEY (id)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}

	public function save_table_pre_register( array $emails ): void {
		foreach ( $emails as $email ) {
			$email = sanitize_email( $email );
			if ( ! is_email( $email ) ) {
				continue;
			}
			$this->wpdb->insert( $this->table_pre_register, [ 'email' => $email ] );
		}
	}

	public function get_emails_pre_register(): array {
		return $this->wpdb->get_col( "SELECT email FROM $this->table_pre_register WHERE user_id IS NULL ORDER BY email" );
	}

	public function get_id_email_pre_register( $email ): int {
		return $this->wpdb->get_var( $this->wpdb->prepare( "SELECT id FROM $this->table_pre_register WHERE email = %s", $email ) ) ?? 0;
	}

	public function update_user_id_email_pre_register( $id, $user_id ): void {
		$this->wpdb->update( $this->table_pre_register, [ 'id' => $id ], [ 'user_id' => $user_id ] );
	}

	public function count_user_state( $state ): int {
		return $this->wpdb->get_var( "SELECT COUNT(user_id) FROM {$this->wpdb->usermeta} WHERE meta_key = '" . DCMS_CUSTOMAREA_APPROVED_USER . "' AND meta_value = " . $state );
	}

	public function get_users_per_state( $state, $limit, $offset ): array {
		$users = $this->wpdb->get_results( "SELECT * FROM {$this->wpdb->users} u 
													INNER JOIN {$this->wpdb->usermeta} um ON u.ID = um.user_id
  													WHERE um.meta_key = '" . DCMS_CUSTOMAREA_APPROVED_USER . "' AND um.meta_value = " . $state . " LIMIT $limit OFFSET $offset" );

		return $users ?? [];
	}
}