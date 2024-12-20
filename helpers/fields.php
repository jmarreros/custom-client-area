<?php

function get_form_fields_structure() :array{
	$list_centros_trabajo = [
		[ 'value' => 'Área I – Jarrio', 'text' => 'Área I – Jarrio' ],
		[ 'value' => 'Área II – Cangas', 'text' => 'Área II – Cangas' ],
		[ 'value' => 'Área III – Avilés', 'text' => 'Área III – Avilés' ],
		[ 'value' => 'Área VI – Oviedo', 'text' => 'Área VI – Oviedo' ],
		[ 'value' => 'Área V – Gijón', 'text' => 'Área V – Gijón' ],
		[ 'value' => 'Área VI – Arriondas', 'text' => 'Área VI – Arriondas' ],
		[ 'value' => 'Área VII – Mieres', 'text' => 'Área VII – Mieres' ],
		[ 'value' => 'Área VIII – Langreo', 'text' => 'Área VIII – Langreo' ],
	];

	$especialidad = [
		[ 'value' => 'Alergología', 'text' => 'Alergología' ],
		[ 'value' => 'Análisis Clínicos', 'text' => 'Análisis Clínicos' ],
		[ 'value' => 'Anatomía Patológica', 'text' => 'Anatomía Patológica' ],
		[ 'value' => 'Anestesiología y Reanimación', 'text' => 'Anestesiología y Reanimación' ],
		[ 'value' => 'Angiología y Cirugía Vascular', 'text' => 'Angiología y Cirugía Vascular' ],
		[ 'value' => 'Aparato Digestivo', 'text' => 'Aparato Digestivo' ],
		[ 'value' => 'Bioquímica Clínica', 'text' => 'Bioquímica Clínica' ],
		[ 'value' => 'Cardiología', 'text' => 'Cardiología' ],
		[ 'value' => 'Cirugía Cardiovascular', 'text' => 'Cirugía Cardiovascular' ],
		[
			'value' => 'Cirugía General y del Aparato Digestivo',
			'text'  => 'Cirugía General y del Aparato Digestivo'
		],
		[ 'value' => 'Cirugía Oral y Maxilofacial', 'text' => 'Cirugía Oral y Maxilofacial' ],
		[ 'value' => 'Cirugía Pediátrica', 'text' => 'Cirugía Pediátrica' ],
		[ 'value' => 'Cirugía Plástica y Reparadora', 'text' => 'Cirugía Plástica y Reparadora' ],
		[ 'value' => 'Cirugía Torácica', 'text' => 'Cirugía Torácica' ],
		[
			'value' => 'Dermatología Medicoquirúrgica y Venereología',
			'text'  => 'Dermatología Medicoquirúrgica y Venereología'
		],
		[ 'value' => 'Endocrinología y Nutrición', 'text' => 'Endocrinología y Nutrición' ],
		[ 'value' => 'Farmacología Clínica', 'text' => 'Farmacología Clínica' ],
		[ 'value' => 'Farmacia Hospitalaria', 'text' => 'Farmacia Hospitalaria' ],
		[ 'value' => 'Geriatría', 'text' => 'Geriatría' ],
		[ 'value' => 'Hematología y Hemoterapia', 'text' => 'Hematología y Hemoterapia' ],
		[ 'value' => 'Ingeniero Superior', 'text' => 'Ingeniero Superior' ],
		[ 'value' => 'Inmunología', 'text' => 'Inmunología' ],
		[ 'value' => 'Médico de Familia', 'text' => 'Médico de Familia' ],
		[ 'value' => 'Médico de Urgencias y Emergencias', 'text' => 'Médico de Urgencias y Emergencias' ],
		[ 'value' => 'Medicina del Trabajo', 'text' => 'Medicina del Trabajo' ],
		[ 'value' => 'Medicina Física y Rehabilitación', 'text' => 'Medicina Física y Rehabilitación' ],
		[ 'value' => 'Medicina Intensiva', 'text' => 'Medicina Intensiva' ],
		[ 'value' => 'Medicina Interna', 'text' => 'Medicina Interna' ],
		[ 'value' => 'Medicina Preventiva y Salud Pública', 'text' => 'Medicina Preventiva y Salud Pública' ],
		[ 'value' => 'Microbiología y Parasitología', 'text' => 'Microbiología y Parasitología' ],
		[ 'value' => 'Nefrología', 'text' => 'Nefrología' ],
		[ 'value' => 'Neumología', 'text' => 'Neumología' ],
		[ 'value' => 'Neurocirugía', 'text' => 'Neurocirugía' ],
		[ 'value' => 'Neurofisiología Clínica', 'text' => 'Neurofisiología Clínica' ],
		[ 'value' => 'Neurología', 'text' => 'Neurología' ],
		[ 'value' => 'Obstetricia y Ginecología', 'text' => 'Obstetricia y Ginecología' ],
		[ 'value' => 'Odontoestomatología', 'text' => 'Odontoestomatología' ],
		[ 'value' => 'Oftalmología', 'text' => 'Oftalmología' ],
		[ 'value' => 'Oncología Médica', 'text' => 'Oncología Médica' ],
		[ 'value' => 'Oncología Radioterápica', 'text' => 'Oncología Radioterápica' ],
		[ 'value' => 'Otorrinolaringología', 'text' => 'Otorrinolaringología' ],
		[ 'value' => 'Pediatría y sus Áreas Específicas', 'text' => 'Pediatría y sus Áreas Específicas' ],
		[ 'value' => 'Psicología Clínica', 'text' => 'Psicología Clínica' ],
		[ 'value' => 'Psiquiatría', 'text' => 'Psiquiatría' ],
		[ 'value' => 'Radiodiagnóstico', 'text' => 'Radiodiagnóstico' ],
		[ 'value' => 'Radiofarmacia', 'text' => 'Radiofarmacia' ],
		[ 'value' => 'Radiofísica Hospitalaria', 'text' => 'Radiofísica Hospitalaria' ],
		[ 'value' => 'Reumatología', 'text' => 'Reumatología' ],
		[ 'value' => 'Traumatología y Cirugía Ortopédica', 'text' => 'Traumatología y Cirugía Ortopédica' ],
		[ 'value' => 'Urología', 'text' => 'Urología' ],
	];

	$categories = [
		[
			'value' => 'Facultativo Especialista de Área en la Especialidad',
			'text'  => 'Facultativo Especialista de Área en la Especialidad'
		],
		[ 'value' => 'Médico de Familia', 'text' => 'Médico de Familia' ],
		[ 'value' => 'Médico General', 'text' => 'Médico General' ],
		[
			'value' => 'Médico de urgencias de Atención Primaria (SUAP)',
			'text'  => 'Médico de urgencias de Atención Primaria (SUAP)'
		],
		[ 'value' => 'Médico de Urgencia Hospitalaria', 'text' => 'Médico de Urgencia Hospitalaria' ],
		[ 'value' => 'Médico de Emergencias/SAMU/CCU', 'text' => 'Médico de Emergencias/SAMU/CCU' ],
		[ 'value' => 'Médico de Admisión y Documentación', 'text' => 'Médico de Admisión y Documentación' ],
		[ 'value' => 'Pediatra de Atención Primaria', 'text' => 'Pediatra de Atención Primaria' ],
		[ 'value' => 'Farmacéutico de Atención Primaria', 'text' => 'Farmacéutico de Atención Primaria' ],
		[ 'value' => 'Técnico de Salud Pública', 'text' => 'Técnico de Salud Pública' ],
		[ 'value' => 'Odontólogo/Estomatólogo', 'text' => 'Odontólogo/Estomatólogo' ],
		[ 'value' => 'Veterinario', 'text' => 'Veterinario' ],
		[ 'value' => 'Ingeniero Superior', 'text' => 'Ingeniero Superior' ],
		[ 'value' => 'Técnico Titulado Superior', 'text' => 'Técnico Titulado Superior' ],
	];

	// Retornamos el array con la estructura de los campos
	return [
		'first_name'                => [
			'group'    => 'personal',
			'type'     => 'text',
			'label'    => __( 'Nombres', 'customarea' ),
			'required' => '',
		],
		'last_name'                 => [
			'group'    => 'personal',
			'type'     => 'text',
			'label'    => __( 'Apellidos', 'customarea' ),
			'required' => '',
		],
		'address'                   => [
			'group'    => 'personal',
			'type'     => 'text',
			'label'    => __( 'Dirección', 'customarea' ),
			'required' => '',
		],
		'poblacion'                 => [
			'group'    => 'personal',
			'type'     => 'text',
			'label'    => __( 'Población', 'customarea' ),
			'required' => '',
		],
		'cod-postal'                => [
			'group'    => 'personal',
			'type'     => 'text',
			'label'    => __( 'C. Postal', 'customarea' ),
			'required' => '',
		],
		'phone-1'                   => [
			'group' => 'personal',
			'type'  => 'text',
			'label' => __( 'Teléfono Fijo', 'customarea' ),
		],
		'phone-2'                   => [
			'group' => 'personal',
			'type'  => 'text',
			'label' => __( 'Celular', 'customarea' ),
		],
		'email'                     => [
			'group'    => 'personal',
			'type'     => 'email',
			'label'    => __( 'Email', 'customarea' ),
			'required' => '',
		],
		'fecha-nacimiento'          => [
			'group'    => 'personal',
			'type'     => 'date',
			'label'    => __( 'Fecha de Nacimiento', 'customarea' ),
			'required' => '',
		],
		'dni'                       => [
			'group'    => 'personal',
			'type'     => 'text',
			'label'    => __( 'DNI/NIF', 'customarea' ),
			'required' => '',
		],
		'anio-licenciatura'          => [
			'group'    => 'personal',
			'type'     => 'text',
			'label'    => __( 'Año Licenciatura', 'customarea' ),
			'required' => '',
		],
		'anio-mir'                   => [
			'group' => 'personal',
			'type'  => 'text',
			'label' => __( 'Año Licenciatura', 'customarea' ),
		],
		'titulacion'                => [
			'group'       => 'personal',
			'type'        => 'text',
			'label'       => __( 'Titulación', 'customarea' ),
			'required'    => '',
			'description' => '(indicar licenciatura: médico, farmacéutico, etc.)',
		],
		'conyuge'                   => [
			'group' => 'personal',
			'type'  => 'text',
			'label' => __( 'Cónyuge', 'customarea' ),
		],
		'centro-trabajo-1-tipo'     => [
			'group'    => 'profesional',
			'type'     => 'radio',
			'label'    => __( 'Tipo', 'customarea' ),
			'options'  => [
				[ 'value' => 'publico', 'text' => 'Público' ],
				[ 'value' => 'privado', 'text' => 'Privado' ],
				[ 'value' => 'otros', 'text' => 'Otros' ],
			],
			'required' => '',
		],
		'centro-trabajo-1'          => [
			'group'    => 'profesional',
			'type'     => 'datalist',
			'label'    => __( 'Centro de Trabajo', 'customarea' ),
			'required' => '',
			'options'  => $list_centros_trabajo,
		],
		'centro-trabajo-2-tipo'     => [
			'group'    => 'profesional',
			'type'     => 'radio',
			'label'    => __( 'Tipo', 'customarea' ),
			'options'  => [
				[ 'value' => 'publico', 'text' => 'Público' ],
				[ 'value' => 'privado', 'text' => 'Privado' ],
				[ 'value' => 'otros', 'text' => 'Otros' ],
			],
			'required' => '',
		],
		'centro-trabajo-2'          => [
			'group'   => 'profesional',
			'type'    => 'datalist',
			'label'   => __( 'Centro de Trabajo', 'customarea' ),
			'options' => $list_centros_trabajo,
		],
		'especialidad'              => [
			'group'    => 'profesional',
			'type'     => 'datalist',
			'label'    => __( 'Especialidad', 'customarea' ),
			'required' => '',
			'options'  => $especialidad,
		],
		'categoria'                 => [
			'group'    => 'profesional',
			'type'     => 'datalist',
			'label'    => __( 'Categoría', 'customarea' ),
			'required' => '',
			'options'  => $categories,
		],
		'ejercicio-profesional'     => [
			'group'    => 'profesional',
			'type'     => 'radio',
			'label'    => __( 'Ejercicio profesional', 'customarea' ),
			'required' => '',
			'options'  => [
				[ 'value' => 'publico', 'text' => 'Público' ],
				[ 'value' => 'privado', 'text' => 'Privado' ],
				[ 'value' => 'ambos', 'text' => 'Ambos' ],
			]
		],
		'dedicación-exclusiva'      => [
			'group'   => 'profesional',
			'type'    => 'radio',
			'label'   => __( 'Dedicación Exclusiva', 'customarea' ),
			'options' => [
				[ 'value' => 'si', 'text' => 'si' ],
				[ 'value' => 'no', 'text' => 'no' ],
			]
		],
		'publico-grupo-profesional' => [
			'group'   => 'profesional',
			'type'    => 'radio',
			'label'   => __( 'Grupo Profesional Público', 'customarea' ),
			'options' => [
				[ 'value' => 'estatuario', 'text' => 'Estatuario' ],
				[ 'value' => 'funcionario', 'text' => 'Funcionario' ],
				[ 'value' => 'laboral', 'text' => 'Laboral' ],
			]
		],
		'publico-contrato'          => [
			'group'   => 'profesional',
			'type'    => 'datalist',
			'label'   => __( 'Contrato Público', 'customarea' ),
			'options' => [
				[ 'value' => 'Propietario', 'text' => 'Propietario' ],
				[ 'value' => 'Interino', 'text' => 'Interino' ],
				[ 'value' => 'Sustituto', 'text' => 'Sustituto' ],
				[ 'value' => 'Vinculado', 'text' => 'Vinculado' ],
				[ 'value' => 'SAC', 'text' => 'SAC' ],
				[ 'value' => 'Guardias', 'text' => 'Guardias' ],
				[ 'value' => 'Residente', 'text' => 'Residente' ],
				[ 'value' => 'Paro', 'text' => 'Paro' ],
			]

		],
		'privado-grupo-profesional' => [
			'group'   => 'profesional',
			'type'    => 'radio',
			'label'   => __( 'Grupo Profesional Privado', 'customarea' ),
			'options' => [
				[ 'value' => 'laboral', 'text' => 'Laboral' ],
				[ 'value' => 'autónomo', 'text' => 'Autónomo' ],
				[ 'value' => 'mixto', 'text' => 'Mixto' ],
			]
		],
		'privado-contrato'          => [
			'group'   => 'profesional',
			'type'    => 'datalist',
			'label'   => __( 'Contrato Privado', 'customarea' ),
			'options' => [
				[ 'value' => 'Fijo', 'text' => 'Fijo' ],
				[ 'value' => 'Indefinido', 'text' => 'Indefinido' ],
				[ 'value' => 'Temporal', 'text' => 'Temporal' ],
				[ 'value' => 'Mercantil', 'text' => 'Mercantil' ],
				[ 'value' => 'Sustituto', 'text' => 'Sustituto' ],
				[ 'value' => 'Guardias', 'text' => 'Guardias' ],
				[ 'value' => 'Paro', 'text' => 'Paro' ],
			]
		],
		'puesto-trabajo'            => [
			'group' => 'profesional',
			'type'  => 'text',
			'label' => __( 'Puesto de Trabajo', 'customarea' )
		],
		'situacion-administrativa'  => [
			'group'   => 'profesional',
			'type'    => 'select',
			'label'   => __( 'Situación Administrativa', 'customarea' ),
			'options' => [
				[ 'value' => 'activo', 'text' => 'Activo' ],
				[ 'value' => 'jubilado', 'text' => 'Jubilado' ],
				[ 'value' => 'jubilación activa', 'text' => 'Jubilación Activa' ],
				[ 'value' => 'excedencia', 'text' => 'Excedencia' ],
				[ 'value' => 'servicios especiales', 'text' => 'Servicios Especiales' ],
			]
		],
		'motivo-situacion'          => [
			'group' => 'profesional',
			'type'  => 'text',
			'label' => __( 'Motivo Situación', 'customarea' )
		],
	];
}