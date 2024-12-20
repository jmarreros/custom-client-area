<?php

namespace dcms\customarea\backend\includes;

use dcms\customarea\helpers\State;

class User {

	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'hide_admin_bar' ] );

		// Add Filter links
		add_filter( 'views_users', [ $this, 'add_filter_pending_users' ] );
		add_action( 'pre_get_users', [ $this, 'query_filter_data_column_user' ] );

		// Add columns
		add_filter( 'manage_users_columns', [ $this, 'add_columns_user' ] );
		add_action( 'manage_users_custom_column', [ $this, 'show_data_colum_user' ], 10, 3 );

		// Sortable columns
		add_filter( 'manage_users_sortable_columns', [ $this, 'sort_data_column_user' ] );
		add_action( 'pre_get_users', [ $this, 'query_sort_data_column_user' ] );
	}

	public function add_filter_pending_users( $views ) {
		$db    = new Database();
		$count = $db->count_user_state( State::PENDING );

		$url = add_query_arg( array_merge( $_GET, [ 'approved_user' => State::PENDING ] ), admin_url( 'users.php' ) );

		// Add link to the list of views
		$views['pending'] = sprintf(
			'<a href="%s">%s <span class="count">(%d)</span></a>',
			esc_url( $url ),
			__( 'Pendientes', 'customarea' ),
			$count
		);

		return $views;
	}

	public function query_filter_data_column_user( $query ): void {
		if ( ! is_admin() ) {
			return;
		}

		if ( isset( $_GET['approved_user'] ) && $_GET['approved_user'] === State::PENDING ) {
			$query->set( 'meta_query', [
				[
					'key'     => DCMS_CUSTOMAREA_APPROVED_USER,
					'value'   => State::PENDING,
					'compare' => '=',
				],
			] );
		}
	}

	public function hide_admin_bar(): void {
		if ( ! current_user_can( 'administrator' ) && ! is_admin() ) {
			show_admin_bar( false );
		}
	}

	public function add_columns_user( $columns ): array {
		$columns['pdfs']          = 'PDF';
		$columns['approved_user'] = 'Estado';

		return $columns;
	}

	public function show_data_colum_user( $value, $column_name, $user_id ): string {
		if ( $column_name === 'pdfs' ) {
			return 'PDFs';
		}

		if ( $column_name === 'approved_user' ) {
			$approved = get_user_meta( $user_id, DCMS_CUSTOMAREA_APPROVED_USER, true );
			if ( $approved == State::REJECTED ) {
				return '<span class="tag tag-no-approved">Rechazado</span>';
			} elseif ( $approved == State::APPROVED ) {
				return '<span class="tag tag-approved">Aprobado</span>';
			} elseif ( $approved == State::PENDING ) {
				return '<span class="tag tag-pending">Pendiente</span>';
			} else {
				return '';
			}
		}

		return $value;
	}

	public function sort_data_column_user( $columns ): array {
		$columns['approved_user'] = 'approved_user';

		return $columns;
	}

	public function query_sort_data_column_user( $query ): void {
		if ( ! is_admin() || $query->get( 'orderby' ) !== 'approved_user' ) {
			return;
		}

		$query->set( 'meta_key', DCMS_CUSTOMAREA_APPROVED_USER );
		$query->set( 'orderby', 'meta_value' );
	}
}
