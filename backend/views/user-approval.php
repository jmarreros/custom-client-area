<?php
    $users = get_users( [ 'role' => 'pending' ] );
?>
<div class="wrap">
    <h2>Usuarios Pendientes de Aprobación</h2>

    <ul class="subsubsub">
        <li><a href="#" class="current" >Pendientes <span class="count">(1)</span></a> |</li>
        <li><a href="#">Aprobados <span class="count">(4)</span></a></li>
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
                        <a href="<?php echo admin_url( 'admin.php?page=customarea-user-approval&approve=' . $user->ID ) ?>" class="button button-primary">Aprobar</a>
                        <a href="<?php echo admin_url( 'admin.php?page=customarea-user-approval&reject=' . $user->ID ) ?>" class="button button-secondary">Rechazar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>