<?php

namespace dcms\customarea\frontend\includes;

// To manage fields in the form
class Form {

	private array $fields = [];
	private array $fields_simpa = [];
	private array $fields_mir = [];

	public function __construct() {

		$this->fields_simpa = [
			'first_name'             => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Nombre', 'customarea' ),
				'required' => 'required',
			],
			'last_name'              => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Apellidos', 'customarea' ),
				'required' => 'required',
			],
			'address'                => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Dirección', 'customarea' ),
				'required' => 'required',
			],
			'poblacion'              => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Población', 'customarea' ),
				'required' => 'required',
			],
			'cod-postal'             => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'C. Postal', 'customarea' ),
				'required' => 'required',
			],
			'phone'                  => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Teléfonos', 'customarea' ),
				'required' => 'required',
			],
			'email'                  => [
				'group'    => 'personal',
				'type'     => 'email',
				'label'    => __( 'Email', 'customarea' ),
				'required' => 'required',
			],
			'fecha-nacimiento'       => [
				'group'    => 'personal',
				'type'     => 'date',
				'label'    => __( 'Fecha de Nacimiento', 'customarea' ),
				'required' => 'required',
			],
			'nif'                    => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'NIF', 'customarea' ),
				'required' => 'required',
			],
			'año-licenciatura'       => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Año Licenciatura', 'customarea' ),
				'required' => 'required',
			],
			'profesion'              => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Profesión', 'customarea' ),
				'required' => 'required',
			],
			'centro-trabajo'         => [
				'group'    => 'profesional',
				'type'     => 'text',
				'label'    => __( 'Centro de Trabajo', 'customarea' ),
				'required' => 'required',
			],
			'especialidad'           => [
				'group'    => 'profesional',
				'type'     => 'text',
				'label'    => __( 'Especialidad', 'customarea' ),
				'required' => 'required',
			],
			'categoria'              => [
				'group'    => 'profesional',
				'type'     => 'text',
				'label'    => __( 'Categoría', 'customarea' ),
				'required' => 'required',
			],
			'atencion-primaria'      => [
				'group' => 'profesional',
				'type'  => 'checkbox',
				'label' => __( 'Atención Primaria', 'customarea' ),
			],
			'atencion-especializada' => [
				'group' => 'profesional',
				'type'  => 'checkbox',
				'label' => __( 'Atención Especializada', 'customarea' ),
			],
			'privada'                => [
				'group' => 'profesional',
				'type'  => 'checkbox',
				'label' => __( 'Privada', 'customarea' ),
			],
			'dessarrolla-docencia'   => [
				'group' => 'profesional',
				'type'  => 'text',
				'label' => __( 'Desarrolla Función Docente', 'customarea' ),
			],
			'realizo-mir'            => [
				'group' => 'profesional',
				'type'  => 'text',
				'label' => __( 'Realizó el MIR', 'customarea' ),
			],
			'dedicacion-exclusiva'   => [
				'group' => 'profesional',
				'type'  => 'checkbox',
				'label' => __( 'Dedicación Exclusiva', 'customarea' ),
			],
			'propietario'            => [
				'group' => 'profesional',
				'type'  => 'checkbox',
				'label' => __( 'Propietario', 'customarea' ),
			],
			'interino'               => [
				'group' => 'profesional',
				'type'  => 'checkbox',
				'label' => __( 'Interino', 'customarea' ),
			],
			'eventual'               => [
				'group' => 'profesional',
				'type'  => 'checkbox',
				'label' => __( 'Eventual', 'customarea' ),
			],
			'sustituto'              => [
				'group' => 'profesional',
				'type'  => 'checkbox',
				'label' => __( 'Sustituto', 'customarea' ),
			],
			'sac'                    => [
				'group' => 'profesional',
				'type'  => 'checkbox',
				'label' => __( 'SAC', 'customarea' ),
			],
			'contrato-guardias'      => [
				'group' => 'profesional',
				'type'  => 'checkbox',
				'label' => __( 'Contrato Guardias', 'customarea' ),
			],
			'mir'                    => [
				'group' => 'profesional',
				'type'  => 'checkbox',
				'label' => __( 'MIR', 'customarea' ),
			],
			'paro'                   => [
				'group' => 'profesional',
				'type'  => 'checkbox',
				'label' => __( 'Paro', 'customarea' ),
			],
			'otros'                  => [
				'group' => 'profesional',
				'type'  => 'text',
				'label' => __( 'Otros', 'customarea' ),
			],
			'estatuario'             => [
				'group' => 'profesional',
				'type'  => 'checkbox',
				'label' => __( 'Estatuario', 'customarea' ),
			],
			'laboral'                => [
				'group' => 'profesional',
				'type'  => 'checkbox',
				'label' => __( 'Laboral', 'customarea' ),
			],
			'funcionario'            => [
				'group' => 'profesional',
				'type'  => 'checkbox',
				'label' => __( 'Funcionario', 'customarea' ),
			],
			'billing_first_name'     => [
				'group'    => 'billing',
				'type'     => 'text',
				'label'    => __( 'Nombre', 'customarea' ),
				'required' => 'required',
			],
			'billing_last_name'      => [
				'group'    => 'billing',
				'type'     => 'text',
				'label'    => __( 'Apellidos', 'customarea' ),
				'required' => 'required',
			],
			'banco'                  => [
				'group'    => 'billing',
				'type'     => 'text',
				'label'    => __( 'Banco o Caja', 'customarea' ),
				'required' => 'required',
			],
			'iban'                   => [
				'group'    => 'billing',
				'type'     => 'text',
				'label'    => __( 'IBAN', 'customarea' ),
				'required' => 'required',
			],
		];

		$this->fields_mir = [
			'first_name'                    => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Nombre', 'customarea' ),
				'required' => 'required',
			],
			'last_name'                     => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Apellidos', 'customarea' ),
				'required' => 'required',
			],
			'address'                       => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Dirección', 'customarea' ),
				'required' => 'required',
			],
			'poblacion'                     => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Población', 'customarea' ),
				'required' => 'required',
			],
			'cod-postal'                    => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'C. Postal', 'customarea' ),
				'required' => 'required',
			],
			'phone'                         => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Teléfonos', 'customarea' ),
				'required' => 'required',
			],
			'movil'                         => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Móvil', 'customarea' ),
				'required' => 'required',
			],
			'Whatsapp'                      => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'WhatsApp', 'customarea' ),
				'required' => 'required',
			],
			'phone2'                        => [
				'group' => 'personal',
				'type'  => 'text',
				'label' => __( 'Otro Teléfono', 'customarea' ),
			],
			'email'                         => [
				'group'    => 'personal',
				'type'     => 'email',
				'label'    => __( 'Email', 'customarea' ),
				'required' => 'required',
			],
			'fecha-nacimiento'              => [
				'group'    => 'personal',
				'type'     => 'date',
				'label'    => __( 'Fecha de Nacimiento', 'customarea' ),
				'required' => 'required',
			],
			'nif'                           => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'NIF', 'customarea' ),
				'required' => 'required',
			],
			'año-licenciatura'              => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Año Licenciatura', 'customarea' ),
				'required' => 'required',
			],
			'profesion'                     => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Profesión', 'customarea' ),
				'required' => 'required',
			],
			'especialidad'                  => [
				'group'    => 'profesional',
				'type'     => 'text',
				'label'    => __( 'Especialidad', 'customarea' ),
				'required' => 'required',
			],
			'centro-docente'                => [
				'group'    => 'profesional',
				'type'     => 'text',
				'label'    => __( 'Centro Docente', 'customarea' ),
				'required' => 'required',
			],
			'año-residencia-actual'         => [
				'group'    => 'profesional',
				'type'     => 'text',
				'label'    => __( 'Año de Residencia Actual', 'customarea' ),
				'required' => 'required',
			],
			'fecha-inicio-residencia'       => [
				'group'    => 'profesional',
				'type'     => 'date',
				'label'    => __( 'Fecha de Inicio de Residencia', 'customarea' ),
				'required' => 'required',
			],
			'fecha-finalizacion-residencia' => [
				'group'    => 'profesional',
				'type'     => 'date',
				'label'    => __( 'Fecha de Finalización de Residencia', 'customarea' ),
				'required' => 'required',
			],
			'otras-especialidades-mir'      => [
				'group' => 'profesional',
				'type'  => 'text',
				'label' => __( 'Otras especialidades Via MIR', 'customarea' ),
			],
			'recibir-informacion-sindical'  => [
				'group' => 'profesional',
				'type'  => 'checkbox',
				'label' => __( 'Recibir Información Sindical', 'customarea' ),
			],
			'billing_first_name'            => [
				'group'    => 'billing',
				'type'     => 'text',
				'label'    => __( 'Nombre', 'customarea' ),
				'required' => 'required',
			],
			'billing_last_name'             => [
				'group'    => 'billing',
				'type'     => 'text',
				'label'    => __( 'Apellidos', 'customarea' ),
				'required' => 'required',
			],
			'banco'                         => [
				'group'    => 'billing',
				'type'     => 'text',
				'label'    => __( 'Banco o Caja', 'customarea' ),
				'required' => 'required',
			],
			'iban'                          => [
				'group'    => 'billing',
				'type'     => 'text',
				'label'    => __( 'IBAN', 'customarea' ),
				'required' => 'required',
			],
		];

	}

}


//	public function get_fields_client_area() :array{
//		return $this->fields;
//	}
//
//	public function get_fields_public_area() :array{
//		$fields = $this->fields;
//
//		// Add disabled to all fields
//		foreach ( $fields as $key => $field ) {
//			$fields[ $key ]['disabled'] = 'disabled';
//		}
//
//		return $fields;
//	}
//
//	public function get_fields_order_checkout() :array{
//		$fields = $this->fields;
//
//		unset( $fields['first_name'] );
//		unset( $fields['last_name'] );
//
//		$fields['contacto1']['required'] = '';
//
//		return $fields;
//	}