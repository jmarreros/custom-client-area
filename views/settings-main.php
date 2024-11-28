<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
if ( ! current_user_can( 'manage_options' ) ) {
	return;
} // only administrator


?>
<div class="wrap">

    <h1><?php _e( 'Configuration', 'customarea' ) ?></h1>
    <style>
        .dcms-shortcode,
        .dcms-path{
            background-color: #0073AA;
            border-radius:4px;
            Padding:10px 20px;
            color:white;
        }
        .dcms-path{
            background-color: #414141;
        }
    </style>

    <h2><?php _e( 'Qr images path', 'customarea' ) ?></h2>

    <section class="dcms-path">
        <strong><?php echo DCMS_CUSTOMAREA_UPLOAD_DIR ?></strong>
    </section>


    <h2>Shortcodes</h2>

    <section class="dcms-shortcode">
        <small><?php _e('You can use this shortcode to show the login section: ', 'customarea') ?></small>
        <strong>[<?php echo DCMS_CUSTOMAREA_SHORTCODE_LOGIN ?>]</strong>
    </section>

    <br>

    <section class="dcms-shortcode">
        <small><?php _e('You can use this shortcode to show logout button: ', 'customarea') ?></small>
        <strong>[<?php echo DCMS_CUSTOMAREA_SHORTCODE_LOGOUT ?>]</strong>
    </section>

    <br>
    <section class="dcms-shortcode">
        <small><?php _e('You can use this shortcode to show the register section: ', 'customarea') ?></small>
        <strong>[<?php echo DCMS_CUSTOMAREA_SHORTCODE_REGISTER ?>]</strong>
    </section>

    <br>
    <section class="dcms-shortcode">
        <small><?php _e('You can use this shortcode to show user data: ', 'customarea') ?></small>
        <strong>[<?php echo DCMS_CUSTOMAREA_SHORTCODE_CLIENT_EMERGENCY_DATA ?>]</strong>
    </section>

    <br>
    <section class="dcms-shortcode">
        <small><?php _e('You can use this shortcode to show the user data connection: ', 'customarea') ?></small>
        <strong>[<?php echo DCMS_CUSTOMAREA_SHORTCODE_CLIENT_CONNECTION_DATA ?>]</strong>
    </section>

    <br>
    <section class="dcms-shortcode">
        <small><?php _e('You can use this shortcode to show the user public page: ', 'customarea') ?></small>
        <strong>[<?php echo DCMS_CUSTOMAREA_SHORTCODE_PUBLIC_DATA ?>]</strong>
    </section>

    <br>
    <section class="dcms-shortcode">
        <small><?php _e('You can use this shortcode to show the user QR code: ', 'customarea') ?></small>
        <strong>[<?php echo DCMS_CUSTOMAREA_SHORTCODE_QR_CODE ?>]</strong>
    </section>

    <form action="options.php" method="post">
		<?php
		settings_fields('customarea_options_bd');
        do_settings_sections('customarea_product_fields');
		do_settings_sections('customarea_fields');
		submit_button();
		?>
    </form>

</div><!--wrap -->


