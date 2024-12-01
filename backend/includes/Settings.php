<?php

namespace dcms\customarea\backend\includes;

class Settings {

	public function __construct() {
		add_action( 'admin_init', [ $this, 'init_configuration' ] );
		add_action( 'update_option', [ $this, 'update_option' ], 10, 1 );
	}

	// Register sections and fields
	public function init_configuration(): void {
		register_setting( 'customarea_options_bd', 'customarea_options' );

		add_settings_section( 'form_pages_section',
			__( 'Páginas', 'customarea' ),
			[ $this, 'customarea_section' ],
			'customarea_fields' );

		add_settings_field( 'customarea_register_page',
			__( 'Página de registro', 'customarea' ),
			[ $this, 'client_area_select' ],
			'customarea_fields',
			'form_pages_section',
			[
				'label_for' => 'register_page',
				'required'  => true
			]
		);

		add_settings_field( 'customarea_login_page',
			__( 'Página de login', 'customarea' ),
			[ $this, 'client_area_select' ],
			'customarea_fields',
			'form_pages_section',
			[
				'label_for' => 'login_page',
				'required'  => true
			]
		);

		add_settings_field( 'customarea_public_page',
			__( 'Página de afiliación', 'customarea' ),
			[ $this, 'client_area_select' ],
			'customarea_fields',
			'form_pages_section',
			[
				'label_for'   => 'affiliate_form_page',
				'description' => __( 'Se mostrará el formulario de afiliación', 'customarea' ),
				'required'    => true
			]
		);


		add_settings_field( 'customarea_area_page',
			__( 'Página de área de cliente', 'customarea' ),
			[ $this, 'client_area_select' ],
			'customarea_fields',
			'form_pages_section',
			[
				'label_for' => 'client_area_page',
				'required'  => true
			]
		);

	}

	// Callback section
	public function customarea_section(): void {
		echo '<hr/>';
	}


	// Callback checkbox field callback
	public function client_area_checkbox( $args ): void {
		$id    = $args['label_for'];
		$class = isset( $args['class'] ) ? "class='" . $args['class'] . "'" : '';
		$desc  = $args['description'] ?? '';
		$text  = $args['text'] ?? '';

		$options = get_option( 'customarea_options' );
		$val     = $options[ $id ] ?? '';

		printf( "<input id='%s' name='customarea_options[%s]' class='regular-text' type='checkbox' value='1' %s %s> %s",
			$id, $id, checked( 1, $val, false ), $class, $text );

		if ( $desc ) {
			printf( "<p class='description'>%s</p> ", $desc );
		}

	}

	// Call back select field callback, select based in all published pages
	public function client_area_select( $args ): void {
		$id    = $args['label_for'];
		$req   = isset( $args['required'] ) ? 'required' : '';
		$class = isset( $args['class'] ) ? "class='" . $args['class'] . "'" : '';
		$desc  = $args['description'] ?? '';

		$options = get_option( 'customarea_options' );
		$val     = $options[ $id ] ?? '';

		$pages = get_pages();
		?>
        <select id="<?php echo $id; ?>"
                name="customarea_options[<?php echo $id; ?>]" <?php echo $req; ?> <?php echo $class; ?>>
            <option value=""><?php _e( 'Selecciona una página', 'customarea' ); ?></option>
			<?php
			foreach ( $pages as $page ) {
				$selected = selected( $val, $page->ID, false );
				printf( "<option value='%s' %s>%s</option>", $page->ID, $selected, $page->post_title );
			}
			?>
        </select>
		<?php
		if ( $desc ) {
			printf( "<p class='description'>%s</p> ", $desc );
		}
	}


	public function update_option( $option ): void {
		if ( $option === 'customarea_options' ) {
			flush_rewrite_rules( false );
		}
	}


	//	// Callback input field callback
//	public function client_area_input( $args ): void {
//		$id    = $args['label_for'];
//		$req   = isset( $args['required'] ) ? 'required' : '';
//		$class = isset( $args['class'] ) ? "class='" . $args['class'] . "'" : '';
//		$desc  = $args['description'] ?? '';
//
//		$options = get_option( 'customarea_options' );
//		$val     = $options[ $id ] ?? '';
//
//		printf( "<input id='%s' name='customarea_options[%s]' class='regular-text' type='text' value='%s' %s %s>",
//			$id, $id, $val, $req, $class );
//
//		if ( $desc ) {
//			printf( "<p class='description'>%s</p> ", $desc );
//		}
//
//	}
}