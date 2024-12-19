<?php
$fields = $fields ?? [];
?>

<section class="customarea-form affiliation-form">
    <header>
        <h2>HOJA DE AFILIACIÓN AL SINDICATO MÉDICO PROFESIONAL DE ASTURIAS (SIMPA)</h2>
        <div>C/ Ingeniero Marquina 3, 1ºizqda. 33004 Oviedo. Telf. 985 25 33 62. Fax: 985 25 35 88</div>
    </header>

    <form id="affiliation-form" method="post" action="<?= admin_url( 'admin-post.php' ) ?>">

        <section class="personal-info">
            <h3>Datos Personales</h3>

            <div class="row col2">
				<?= create_control_HTML( 'first_name', $fields['first_name'] ); ?>
				<?= create_control_HTML( 'last_name', $fields['last_name'] ); ?>
            </div>

            <div class="row col1">
				<?= create_control_HTML( 'address', $fields['address'] ); ?>
            </div>

            <div class="row col2">
				<?= create_control_HTML( 'población', $fields['población'] ); ?>
				<?= create_control_HTML( 'cod-postal', $fields['cod-postal'] ); ?>
            </div>

            <div class="row col2">
				<?= create_control_HTML( 'phone-1', $fields['phone-1'] ); ?>
				<?= create_control_HTML( 'phone-2', $fields['phone-2'] ); ?>
            </div>

            <div class="row col2">
				<?= create_control_HTML( 'email', $fields['email'] ); ?>
				<?= create_control_HTML( 'fecha-nacimiento', $fields['fecha-nacimiento'] ); ?>
            </div>

            <div class="row col2">
				<?= create_control_HTML( 'dni', $fields['dni'] ); ?>
				<?= create_control_HTML( 'año-licenciatura', $fields['año-licenciatura'] ); ?>
            </div>

            <div class="row col1">
				<?= create_control_HTML( 'titulación', $fields['titulación'] ); ?>
            </div>

        </section>


        <section class="professional-info">
            <h3>Datos Profesionales</h3>

            <div>
                <h4>Centro de Trabajo - 1</h4>
                <div class="row col2">
					<?= create_control_HTML( 'centro-trabajo-1-tipo', $fields['centro-trabajo-1-tipo'] ); ?>
					<?= create_control_HTML( 'centro-trabajo-1', $fields['centro-trabajo-1'] ); ?>
                </div>
            </div>

            <div>
                <h4>Centro de Trabajo - 2</h4>
                <div class="row col2">
					<?= create_control_HTML( 'centro-trabajo-2-tipo', $fields['centro-trabajo-2-tipo'] ); ?>
					<?= create_control_HTML( 'centro-trabajo-2', $fields['centro-trabajo-2'] ); ?>
                </div>
            </div>

            <div class="row col2">
				<?= create_control_HTML( 'especialidad', $fields['especialidad'] ); ?>
				<?= create_control_HTML( 'categoría', $fields['categoría'] ); ?>
            </div>

            <br>

            <div class="row col1">
				<?= create_control_HTML( 'dedicación-exclusiva', $fields['dedicación-exclusiva'] ); ?>
            </div>

            <div class="row col1">
				<?= create_control_HTML( 'ejercicio-profesional', $fields['ejercicio-profesional'] ); ?>
            </div>

            <div class="row col2 public-group hide">
				<?= create_control_HTML( 'publico-grupo-profesional', $fields['publico-grupo-profesional'] ); ?>
				<?= create_control_HTML( 'publico-contrato', $fields['publico-contrato'] ); ?>
                <!-- Datalist options alternativas a las por defecto, se cambia por js -->
                <datalist id="publico-contrato-options-alt">
                    <option value="Fijo"></option>
                    <option value="Indefinido"></option>
                    <option value="Temporal"></option>
                    <option value="Mercantil"></option>
                    <option value="Sustituto"></option>
                    <option value="Guardias"></option>
                    <option value="Residente"></option>
                    <option value="Paro">
                </datalist>
            </div>

            <div class="row col2 private-group hide">
				<?= create_control_HTML( 'privado-grupo-profesional', $fields['privado-grupo-profesional'] ); ?>
				<?= create_control_HTML( 'privado-contrato', $fields['privado-contrato'] ); ?>
            </div>

            <div class="row col1 puesto">
				<?= create_control_HTML( 'puesto-trabajo', $fields['puesto-trabajo'] ); ?>
            </div>

            <div class="row col2 situation">
				<?= create_control_HTML( 'situación-administrativa', $fields['situación-administrativa'] ); ?>
				<?= create_control_HTML( 'motivo-situación', $fields['motivo-situación'] ); ?>
            </div>

        </section>

        <div class="form-message hide"></div>

        <div class="form-footer">
            <div>
                <input class="button" type="submit" value="Grabar">
                <div class="lds-ring hide">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>

        </div>


    </form>

</section>

<style>
    .entry-title {
        display: none;
    }
</style>