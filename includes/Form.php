<?php

namespace dcms\customarea\includes;

// To manage fields in the form
class Form {

	private array $fields = [];

	public function __construct() {

		$this->fields = [
			'first_name'     => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Nombres', 'customarea' ),
				'required' => 'required',
			],
			'last_name'      => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Apellidos', 'customarea' ),
				'required' => 'required',
			],
			'birthday'       => [
				'group' => 'personal',
				'type'  => 'date',
				'label' => __( 'Fecha Nacimiento', 'customarea' ),
			],
			'contacto1'      => [
				'group'    => 'contact',
				'type'     => 'text',
				'label'    => __( 'Número de contacto', 'customarea' ),
				'required' => 'required'
			],
			'contacto2'      => [
				'group'    => 'contact',
				'type'     => 'text',
				'label'    => __( 'Número de contacto alterno', 'customarea' ),
			],
			'tabaco'         => [
				'group' => 'habits',
				'type'  => 'checkbox',
				'label' => __( 'Tabaco', 'customarea' ),
			],
			'alcohol'        => [
				'group' => 'habits',
				'type'  => 'checkbox',
				'label' => __( 'Alcohol', 'customarea' ),
			],
			'drogas'         => [
				'group' => 'habits',
				'type'  => 'checkbox',
				'label' => __( 'Drogas', 'customarea' ),
			],
			'hipertension'   => [
				'group' => 'cardiovascular',
				'type'  => 'checkbox',
				'label' => __( 'Hipertensión', 'customarea' ),
			],
			'arritmia'       => [
				'group' => 'cardiovascular',
				'type'  => 'checkbox',
				'label' => __( 'Arritmia', 'customarea' ),
			],
			'colesterol'     => [
				'group' => 'cardiovascular',
				'type'  => 'checkbox',
				'label' => __( 'Colesterol', 'customarea' ),
			],
			'diabetes'       => [
				'group' => 'cardiovascular',
				'type'  => 'checkbox',
				'label' => __( 'Diabetes', 'customarea' ),
			],
			'marcapasos'     => [
				'group' => 'cardiovascular',
				'type'  => 'checkbox',
				'label' => __( 'Marca Pasos', 'customarea' ),
			],
			'alergias'       => [
				'group' => 'various',
				'type'  => 'text',
				'label' => __( 'Alergias', 'customarea' ),
			],
			'enfermedades'   => [
				'group' => 'various',
				'type'  => 'text',
				'label' => __( 'Enfermedades importantes', 'customarea' ),
			],
			'medicacion'     => [
				'group' => 'various',
				'type'  => 'text',
				'label' => __( 'Medicación', 'customarea' ),
			],
			'grupoSanguineo' => [
				'group' => 'various',
				'type'  => 'select',
				'label' => __( 'Grupo Sanguíneo', 'customarea' ),
				'options' => [
					'desconocido' => 'Lo desconozco',
					'A+' => 'A positivo (A +)',
					'A-' => 'A negativo (A-)',
					'B+' => 'B positivo (B +)',
					'B-' => 'B negativo (B-)',
					'AB+' => 'AB positivo (AB+)',
					'AB-' => 'AB negativo (AB-)',
					'O+' => 'O positivo (O+)',
					'O-' => 'O negativo (O-)',
				],
			],
			'otros'          => [
				'group' => 'various',
				'type'  => 'textarea',
				'label' => __( 'Otros datos relevantes', 'customarea' ),
			],
		];
	}


	public function get_fields_client_area() :array{
		return $this->fields;
	}

	public function get_fields_public_area() :array{
		$fields = $this->fields;

		// Add disabled to all fields
		foreach ( $fields as $key => $field ) {
			$fields[ $key ]['disabled'] = 'disabled';
		}

		return $fields;
	}

	public function get_fields_order_checkout() :array{
		$fields = $this->fields;

		unset( $fields['first_name'] );
		unset( $fields['last_name'] );

		$fields['contacto1']['required'] = '';

		return $fields;
	}
}