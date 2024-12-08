<?php

namespace dcms\customarea\backend\includes;

use wpdb;

/**
 * Class for creating a dashboard submenu
 */
class Database {
	private wpdb $wpdb;
	private string $table_pre_register;
	private string $table_approval_log;

	public function __construct() {
		global $wpdb;
		$this->wpdb               = $wpdb;
		$this->table_pre_register = $wpdb->prefix . 'customarea_pre_register';
		$this->table_approval_log = $wpdb->prefix . 'customarea_approval_log';
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

	public function create_table_approval_log(): void {
		$sql = "CREATE TABLE IF NOT EXISTS $this->table_approval_log (
			id INT(11) NOT NULL AUTO_INCREMENT,
			user_id bigint(20) unsigned NULL,
			state smallint(1) NOT NULL,
			approval_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			modified_by bigint(20) unsigned NULL,
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
		$sql = "SELECT u.*, um.meta_value user_state, umd.meta_value modification_date 
				FROM {$this->wpdb->users} u 
				INNER JOIN {$this->wpdb->usermeta} um ON u.ID = um.user_id AND um.meta_key = '" . DCMS_CUSTOMAREA_APPROVED_USER . "' 
				LEFT JOIN {$this->wpdb->usermeta} umd ON u.ID = umd.user_id AND umd.meta_key = '" . DCMS_CUSTOMAREA_APPROVED_USER_DATE . "'
                WHERE 
                    um.meta_value = " . $state . " 
                    ORDER BY STR_TO_DATE(umd.meta_value, '%Y-%m-%d %H:%i:%s') DESC
                    LIMIT $limit OFFSET $offset";

		$users = $this->wpdb->get_results( $sql );

		return $users ?? [];
	}

	public function get_user_metadata_fields( $user_id, $fields ): array {
		$meta = get_user_meta( $user_id, '', true );

		// All user meta data
		$data = array_map( function ( $meta ) {
			return $meta[0];
		}, $meta );

		$user_data = [];
		foreach ( $fields as $field ) {
			$user_data[ $field ] = $data[ $field ] ?? '';
		}

		return $user_data;
	}

	public function insert_approval_log( $user_id, $state, $modified_by ): void {
		$this->wpdb->insert( $this->table_approval_log, [
			'user_id'     => $user_id,
			'state'       => $state,
			'modified_by' => $modified_by,
		] );
	}
}