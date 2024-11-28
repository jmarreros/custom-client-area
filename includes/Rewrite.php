<?php

namespace dcms\customarea\includes;

class Rewrite {

	// public function __construct() {
	// 	add_filter( 'query_vars', [ $this, 'add_query_vars' ] );
	// 	add_action( 'init', [ $this, 'add_rewrite_rules' ] );
	// }

	// public function add_rewrite_rules(): void {
	// 	$page = basename( dcms_get_url_public_area() );
	// 	add_rewrite_rule( '^' . $page . '/([^/]*)/?$', 'index.php?pagename=' . $page . '&customarea_username=$matches[1]', 'top' );
	// }

	// public function add_query_vars( $vars ): array {
	// 	$vars[] = 'customarea_username';

	// 	return $vars;
	// }

}