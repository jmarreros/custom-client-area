<?php


namespace dcms\customarea\backend\includes;

class Rol {

	public function __construct() {
	}

	public function create_rol_afiliate(): void {
		$name = DCMS_CUSTOMAREA_ROL;

		if ( ! get_role( $name ) ) {
			add_role(
				$name,
				__( 'Afiliado', 'customarea' ),
				array(
					'read'         => true,
					'edit_posts'   => false,
					'delete_posts' => false,
				)
			);

			remove_role( 'rol_afiliate' );
			remove_role( 'um_afiliado' );
		}
	}

}



//
//function crear_rol_personalizado() {
//	// Nombre del rol
//	$name = 'rol_personalizado';
//
//	// Comprobar si el rol ya existe
//	if (!get_role($name)) {
//		// Añadir el rol con capacidades personalizadas
//		add_role(
//			$nombre_rol,
//			__('Rol Personalizado', 'tu-textdomain'), // Nombre visible del rol
//			array(
//				'read'         => true,  // Permitir leer
//				'edit_posts'   => false, // No permitir editar publicaciones
//				'delete_posts' => false, // No permitir borrar publicaciones
//			)
//		);
//	}
//}
//add_action('init', 'crear_rol_personalizado');