<?php

namespace dcms\customarea\backend\includes;

class PostType {

	public function __construct() {
		add_action( 'add_meta_boxes', [ $this, 'add_meta_box' ] );
		add_action( 'save_post', [ $this, 'save_meta_box' ] );
	}

	public function add_meta_box() :void{
		add_meta_box(
			'show_content_affiliate',
			__( 'Contenido restringido', 'dcms-custom-client-area' ),
			[ $this, 'render_meta_box' ],
			'page',
			'normal',
			'high'
		);
	}

	public function render_meta_box() :void{
		global $post;
		$show_content = get_post_meta( $post->ID, 'show_content_affiliate', true );
		?>
		<label>
			<input type="checkbox" name="show_content_affiliate" id="show_content_affiliate" value="1" <?php checked( $show_content, 1 ); ?>>
			<?php _e( 'Mostrar este contenido sólo a usuarios afiliados', 'dcms-custom-client-area' ); ?>
		</label>
		<?php
	}

	public function save_meta_box( $post_id ) :void{
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
		if ( ! isset( $_POST['show_content_affiliate'] ) ) {
			return;
		}
		update_post_meta( $post_id, 'show_content_affiliate', 1 );
	}


}