<?php

namespace dcms\customarea\includes;

class Plugin {

	public function __construct() {
		register_activation_hook( DCMS_CUSTOMAREA_BASE_NAME, [ $this, 'dcms_activation_plugin' ] );
		register_deactivation_hook( DCMS_CUSTOMAREA_BASE_NAME, [ $this, 'dcms_deactivation_plugin' ] );
	}

	// Activate plugin - create options and database table
	public function dcms_activation_plugin(): void {
		wp_mkdir_p( DCMS_CUSTOMAREA_UPLOAD_DIR );
	}

	// Deactivate plugin
	public function dcms_deactivation_plugin() {
	}
}
