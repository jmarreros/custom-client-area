<?php

namespace dcms\customarea\backend\includes;

class Plugin {

	public function __construct() {
		register_activation_hook( DCMS_CUSTOMAREA_BASE_NAME, [ $this, 'dcms_activation_plugin' ] );
		register_deactivation_hook( DCMS_CUSTOMAREA_BASE_NAME, [ $this, 'dcms_deactivation_plugin' ] );
	}

	// Activate plugin - create options and database table
	public function dcms_activation_plugin(): void {
		$db = new Database();
		$db->create_table_pre_register();

		$rol = new Rol();
		$rol->create_rol_afiliate();
	}

	// Deactivate plugin
	public function dcms_deactivation_plugin() {
	}
}
