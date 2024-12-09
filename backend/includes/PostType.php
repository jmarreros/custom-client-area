<?php

namespace dcms\customarea\backend\includes;

class PostType {

	public function __construct() {
		add_action( 'add_meta_boxes', [ $this, 'add_meta_box' ] );
		add_action( 'save_post', [ $this, 'save_meta_box' ] );
		add_filter( 'the_content', [ $this, 'show_content' ] );
	}

	public function add_meta_box(): void {
		add_meta_box(
			'show_content_affiliate',
			__( 'Contenido restringido', 'dcms-custom-client-area' ),
			[ $this, 'render_meta_box' ],
			'page',
			'normal',
			'high'
		);
	}

	public function render_meta_box(): void {
		global $post;
		$show_content = get_post_meta( $post->ID, 'show_content_affiliate', true );
		?>
        <label>
            <input type="checkbox" name="show_content_affiliate" id="show_content_affiliate"
                   value="1" <?php checked( $show_content, 1 ); ?>>
			<?php _e( 'Mostrar este contenido sólo a usuarios afiliados', 'dcms-custom-client-area' ); ?>
        </label>
		<?php
	}

	public function save_meta_box( $post_id ): void {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$value = isset( $_POST['show_content_affiliate'] ) ? 1 : 0;
		update_post_meta( $post_id, 'show_content_affiliate', $value );
	}

	public function show_content( $content ) {
		global $post;
		$show_content = get_post_meta( $post->ID, 'show_content_affiliate', true );

		if ( ! $show_content == 1 ) {
			return $content;
		}

		//Validate user is logged in
		if ( ! is_user_logged_in() ) {
			return __( 'Debes iniciar sesión para ver este contenido', 'dcms-custom-client-area' );
		}

		//Validate user has role affiliate
		if ( ! current_user_can( 'affiliate_role' ) ) {
			return __( 'No tienes permisos para ver este contenido', 'dcms-custom-client-area' );
		}

		return $content;
	}

}