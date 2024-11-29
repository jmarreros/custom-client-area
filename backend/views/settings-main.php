<div class="wrap">

    <h1><?php _e( 'Configuration', 'customarea' ) ?></h1>

    <form action="options.php" method="post">
		<?php
		settings_fields('customarea_options_bd');
        do_settings_sections('customarea_product_fields');
		do_settings_sections('customarea_fields');
		submit_button();
		?>
    </form>

</div>


