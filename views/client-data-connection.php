<?php
/** @var object $user */
?>
<section class="customarea-container customarea-data-connection">

    <h3><?= __( 'Datos conexión', 'customarea' ) ?></h3>

    <form id="customarea-data-connection" class="customarea-form" action="" method="post">

        <div class="form-controls">

            <label for="username"><?= __( 'Usuario', 'customarea' ) ?></label>
	        <input class="input" type="text" id="username" value="<?= $user->user_login ?>" disabled>

            <label for="email"><?= __( 'Correo', 'customarea' ) ?> <span>*</span></label>
            <input class="input" type="email" id="email" name="email" maxlength="80" value="<?= $user->user_email ?>" required>

                <fieldset>
                    <p>
                        <small><?= __('Dejar los campos en blanco sino quieres cambiarla', 'customarea') ?></small>
                    </p>

                    <label for="password"><?= __( 'Contraseña', 'customarea' ) ?> <span>*</span></label>
                    <input class="input" type="password" id="password" name="password" minlength="6" maxlength="120">

                    <label for="password2"><?= __( 'Repite contraseña', 'customarea' ) ?> <span>*</span></label>
                    <input class="input" type="password" id="password2" name="password2" minlength="6" maxlength="120">
                </fieldset>
        </div>

        <div class="form-message hide"></div>

        <div class="form-footer">
            <div>
                <input class="button" type="submit" value="Guardar">
                <div class="lds-ring hide"><div></div><div></div><div></div><div></div></div>            </div>
        </div>

    </form>
</section>
