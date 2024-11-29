<div class="wrap">
    <h1>Pre Registro</h1>


    <?php
    $success = filter_input( INPUT_GET, 'success', FILTER_VALIDATE_INT );
    if( $success ){
        ?>
        <div class="notice notice-success">
            <p>Los cambios se guardaron correctamente</p>
        </div>
        <?php
    }
    ?>

    <strong>Ingresa la lista de correos que se pueden registrar y convertir en usuarios</strong>


    <p>
        <small>Ingresa la lista de correos uno por línea</small>
    </p>

    <form method="post" action="<?php echo admin_url( 'admin-post.php' ) ?>">
        <div>
            <textarea name="pre-login" id="pre-login" cols="30" rows="10"><?= $emails ?></textarea>
        </div>

        <input type="hidden" name="action" value="process_pre_register_form">
        <?php wp_nonce_field( 'pre_register_action', 'pre_register_nonce' ); ?>

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Guardar cambios">
        </p>
    </form>

</div>