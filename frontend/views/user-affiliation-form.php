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
				<?= create_space_HTML(); ?>
            </div>


            <!--            <table class="form-table">-->
            <!--		        --><?php //foreach ( $fields as $name => $field ): ?>
            <!--                    <tr>-->
            <!--                        <td>--><?php
			//					        $field['value'] = $values[ $name ] ?? '';
			//					        echo create_control_HTML( $name, $field )
			//					        ?><!--</td>-->
            <!--                    </tr>-->
            <!--		        --><?php //endforeach; ?>
            <!--            </table>-->

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