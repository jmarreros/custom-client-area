<?php
$users          = $users ?? [];
$count_rejected = $count_rejected ?? 0;
$count_pending  = $count_pending ?? 0;
$count_approval = $count_approval ?? 0;
?>
<div class="wrap">
    <h2>Usuarios Pendientes de Aprobación</h2>

    <ul class="subsubsub">
        <li><a href="#" class="current">Pendientes <span class="count">(<?= $count_pending ?>)</span></a> |</li>
        <li><a href="#">Aprobados <span class="count">(<?= $count_approval ?>)</span></a></li>
        <li><a href="#">Rechazados <span class="count">(<?= $count_rejected ?>)</span></a></li>
    </ul>


    <table class="wp-list-table widefat fixed striped users">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha de Registro</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
		<?php foreach ( $users as $user ) : ?>
            <tr>
                <td><?php echo $user->display_name ?></td>
                <td><?php echo $user->user_email ?></td>
                <td><?php echo $user->user_registered ?></td>
                <td>
                    <a href="<?php echo admin_url( 'admin.php?page=customarea' ) ?>"
                       class="button button-primary">Aprobar</a>
                    <a href="<?php echo admin_url( 'admin.php?page=customarea' ) ?>"
                       class="button button-secondary">Rechazar</a>
                </td>
            </tr>
		<?php endforeach; ?>
        </tbody>
    </table>