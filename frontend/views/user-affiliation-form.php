<?php
$fields = $fields ?? [];
$values = $values ?? [];
?>
<section class="customarea-form">

    <form id="affiliation-form" method="post" action="<?= admin_url( 'admin-post.php' ) ?>">

        <table class="form-table">
			<?php foreach ( $fields as $name => $field ): ?>
                <tr>
                    <td><?php
                        $field['value'] = $values[ $name ] ?? '';
                        echo create_control_HTML( $name, $field )
                        ?></td>
                </tr>
			<?php endforeach; ?>
        </table>

        <p>Pendiente otros campos adicionales...</p>

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