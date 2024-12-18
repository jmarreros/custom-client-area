<?php

namespace dcms\customarea\frontend\includes;

// To manage fields in the form
use dcms\customarea\helpers\State;
use JetBrains\PhpStorm\NoReturn;

class Form {

	public function __construct() {
		add_action( 'wp_ajax_dcms_save_affiliation', [ $this, 'process_form_affiliate' ] );
	}

	#[NoReturn]
	public function process_form_affiliate(): void {
		$fields  = $this->get_fields_affiliation();
		$data    = [];
		$user_id = get_current_user_id();

		foreach ( $fields as $key => $field ) {
			$data[ $key ] = $_POST[ $key ] ?? '';
		}

		// Save data
		foreach ( $data as $key => $value ) {
			update_user_meta( $user_id, $key, $value );
		}

		// Add metadata state
		update_user_meta( $user_id, DCMS_CUSTOMAREA_APPROVED_USER, State::PENDING );

		$res = [
			'success' => true,
			'message' => 'Datos guardados correctamente',
		];

		wp_send_json( $res );
	}

	public function get_fields_affiliation(): array {

		return [
			'first_name'       => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Nombres', 'customarea' ),
				'required' => 'required',
			],
			'last_name'        => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Apellidos', 'customarea' ),
				'required' => 'required',
			],
			'address'          => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Dirección', 'customarea' ),
				'required' => 'required',
			],
			'población'        => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Población', 'customarea' ),
				'required' => 'required',
			],
			'cod-postal'       => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'C. Postal', 'customarea' ),
				'required' => 'required',
			],
			'phone-1'          => [
				'group' => 'personal',
				'type'  => 'text',
				'label' => __( 'Teléfono Fijo', 'customarea' ),
			],
			'phone-2'          => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Celular', 'customarea' ),
			],
			'email'            => [
				'group'    => 'personal',
				'type'     => 'email',
				'label'    => __( 'Email', 'customarea' ),
				'required' => 'required',
			],
			'fecha-nacimiento' => [
				'group'    => 'personal',
				'type'     => 'date',
				'label'    => __( 'Fecha de Nacimiento', 'customarea' ),
				'required' => 'required',
			],
			'dni'              => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'DNI', 'customarea' ),
				'required' => 'required',
			],
			'año-licenciatura' => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Año Licenciatura', 'customarea' ),
				'required' => 'required',
			],
			'año-mir'          => [
				'group' => 'personal',
				'type'  => 'text',
				'label' => __( 'Año Licenciatura', 'customarea' ),
			],
			'titulación'       => [
				'group'    => 'personal',
				'type'     => 'text',
				'label'    => __( 'Titulación', 'customarea' ),
				'required' => 'required',
			],
			'cónyuge'          => [
				'group' => 'personal',
				'type'  => 'text',
				'label' => __( 'Cónyuge', 'customarea' ),
			],
			'centro-trabajo-1' => [
				'group'    => 'profesional',
				'type'     => 'text',
				'label'    => __( 'Centro de Trabajo', 'customarea' ),
				'required' => 'required',
			],
			'centro-trabajo-2' => [
				'group' => 'profesional',
				'type'  => 'text',
				'label' => __( 'Centro de Trabajo', 'customarea' ),
			],
			'especialidad'     => [
				'group'    => 'profesional',
				'type'     => 'text',
				'label'    => __( 'Especialidad', 'customarea' ),
				'required' => 'required',
			],
			'categoría'        => [
				'group'    => 'profesional',
				'type'     => 'text',
				'label'    => __( 'Categoría', 'customarea' ),
				'required' => 'required',
			],
			'ejercicio-profesional'        => [
				'group'    => 'profesional',
				'type'     => 'text',
				'label'    => __( 'Ejercicio profesional', 'customarea' ),
				'required' => 'required',
				'options' => 'público,privado,mixto',
			],
			'dedicación-exclusiva' => [
				'group' => 'profesional',
				'type'  => 'checkbox',
				'label' => __( 'Dedicación Exclusiva', 'customarea' ),
				'options' => 'si,no',
			],
			'publico-grupo-profesional' => [
				'group' => 'profesional',
				'type'  => 'text',
				'label' => __( 'Grupo Profesional', 'customarea' ),
				'options' => 'estatuario,funcionario,laboral',
			],
			'publico-contrato' => [
				'group' => 'profesional',
				'type'  => 'text',
				'label' => __( 'Tipo de Contrato', 'customarea' )
			],
			'privado-grupo-profesional' => [
				'group' => 'profesional',
				'type'  => 'text',
				'label' => __( 'Grupo Profesional', 'customarea' ),
				'options' => 'laboral,autónomo,mixto',
			],
			'privado-contrato' => [
				'group' => 'profesional',
				'type'  => 'text',
				'label' => __( 'Tipo de Contrato', 'customarea' )
			],
			'puesto-trabajo' => [
				'group' => 'profesional',
				'type'  => 'text',
				'label' => __( 'Puesto de Trabajo', 'customarea' )
			],
			'situación-administrativa' => [
				'group' => 'profesional',
				'type'  => 'text',
				'label' => __( 'Situación Administrativa', 'customarea' )
			],
			'motivo-situación' => [
				'group' => 'profesional',
				'type'  => 'text',
				'label' => __( 'Motivo Situación', 'customarea' )
			],
		];
	}

}

