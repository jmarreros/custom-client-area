<?php
$fields = $fields ?? [];
?>
<section class="affiliation-form">

    <form method="post" action="<?= admin_url( 'admin-post.php' ) ?>">
        <table class="form-table">
			<?php foreach ( $fields as $field ): ?>
                <tr>
                    <td><?= create_control_HTML( $field ) ?></td>
                </tr>
			<?php endforeach; ?>
        </table>
        <p>Pendiente otros campos adicionales...</p>

        <input type="hidden" name="action" value="process_form_affiliate">
        <button type="submit" class="btn btn-primary">Grabar</button>
    </form>

</section>