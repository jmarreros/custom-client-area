<?php
/** @var string $url_login */
?>
<section class="customarea-container customarea-register">

    <h3><?= __('Registro desde correo', 'customarea') ?></h3>

    <form id="customarea-register" class="customarea-form" action="" method="post">

        <small>Para el registro nos basamos en una lista de correos,<br> por lo que si no te puedes registrar <a href="/contacto">contáctanos.</a></small>
        <div class="form-controls">
            <div>
                <label for="username"><?= __('Usuario', 'clientqr') ?> <span>*</span></label>
                <input id="username" type="text" name="username" maxlength="120" required>
            </div>
            <div>
                <label for="email"><?= __('Correo', 'customarea') ?> <span>*</span></label>
                <input class="input" type="email" id="email" name="email" maxlength="80" required>
            </div>
        </div>

        <div class="form-message hide"></div>

        <div class="form-footer">
            <div>
                <input class = "button" type="submit" value="Registrame">
                <div class="lds-ring hide"><div></div><div></div><div></div><div></div></div>
            </div>

            <div class="form-link">
                <span><?= __('Ya tienes cuenta?', 'customarea') ?></span>
	            <a class="link" href="<?= $url_login ?>"  ><?= __('Inicia sesión', 'customarea') ?></a>
            </div>
        </div>

    </form>
</section>