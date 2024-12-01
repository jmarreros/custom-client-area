<?php
/** @var string $url_register */
?>
<section class="customarea-container customarea-login">

    <h3><?= __('Introduce tus datos para acceder', 'customarea') ?></h3>

    <form id="customarea-login" class="customarea-form" action="" method="post">

        <div class="form-controls">
            <div>
                <label for="username"><?= __('Correo', 'customarea') ?> <span>*</span></label>
                <input id="username" type="text" name="username" maxlength="120" required>
            </div>

            <div>
                <label for="password"><?= __('Clave', 'customarea') ?> <span>*</span></label>
                <input id="password" type="password" name="password" maxlength="120" required>
            </div>
        </div>

        <div class="form-message hide"></div>

        <div class="form-footer">
            <div>
                <input class = "button" type="submit" value="Ingresar">
                <div class="lds-ring hide"><div></div><div></div><div></div><div></div></div>
            </div>

            <div class="form-link">
                <span><?= __('No tienes cuenta?', 'customarea') ?></span>
	            <a class="link" href="<?= $url_register ?>"  ><?= __('Solicítala', 'customarea') ?></a>
            </div>
        </div>

    </form>

</section>