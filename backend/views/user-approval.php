<?php

use dcms\customarea\helpers\State;

$users          = $users ?? [];
$count_rejected = $count_rejected ?? 0;
$count_pending  = $count_pending ?? 0;
$count_approval = $count_approval ?? 0;
$state          = $state ?? 1;
$paged          = $paged ?? 1;
$total_pages    = $total_pages ?? 1;

$base_url        = admin_url( 'admin.php?page=customarea&state_user=' );
$pagination_args = array(
	'base'      => add_query_arg( 'paged_user', '%#%', $base_url . $state ),
	'format'    => '',
	'current'   => $paged,
	'total'     => $total_pages,
	'prev_text' => __( '&laquo; Anterior' ),
	'next_text' => __( 'Siguiente &raquo;' ),
);

?>
    <div class="wrap">
    <h2>Usuarios Pendientes de Aprobación</h2>

    <ul class="subsubsub">
        <li>
            <a href="<?= $base_url . State::PENDING ?>" class="<?= $state == State::PENDING ? 'current' : '' ?>">
                Pendientes <span class="count">(<?= $count_pending ?>)</span>
            </a> |
        </li>
        <li>
            <a href="<?= $base_url . State::APPROVED ?>" class="<?= $state == State::APPROVED ? 'current' : '' ?>">
                Aprobados <span class="count">(<?= $count_approval ?>)</span>
            </a>
        </li>
        <li>
            <a href="<?= $base_url . State::REJECTED ?>" class="<?= $state == State::REJECTED ? 'current' : '' ?>">
                Rechazados <span class="count">(<?= $count_rejected ?>)</span>
            </a>
        </li>
    </ul>

    <table class="wp-list-table widefat fixed striped users">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha de Registro</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
		<?php foreach ( $users as $user ) : ?>
            <tr>
                <td><?php echo $user->ID ?></td>
                <td><?php echo $user->display_name ?: $user->user_login ?></td>
                <td><?php echo $user->user_email ?></td>
                <td><?php echo $user->user_registered ?></td>
                <td>
                    <?php
                    if ( $state == State::PENDING ) {
                        ?>
                        <a href="<?= admin_url( 'admin.php?page=customarea-user-approval&state_user=' . State::APPROVED . '&user_id=' . $user->ID ) ?>"
                           class="button button-primary">Aprobar</a>
                        <a href="<?= admin_url( 'admin.php?page=customarea-user-approval&state_user=' . State::REJECTED . '&user_id=' . $user->ID ) ?>"
                           class="button button-secondary">Rechazar</a>
                        <?php
                    } else if ( $state == State::APPROVED ) {
                        ?>
                        <a href="<?= admin_url( 'admin.php?page=customarea-user-approval&state_user=' . State::PENDING . '&user_id=' . $user->ID ) ?>"
                           class="button button-secondary">Poner en Pendiente</a>
                        <?php
                    } else if ( $state == State::REJECTED ) {
                        ?>
                        <a href="<?= admin_url( 'admin.php?page=customarea-user-approval&state_user=' . State::PENDING . '&user_id=' . $user->ID ) ?>"
                           class="button button-secondary">Poner en Pendiente</a>
                        <?php
                    }

                    ?>
                </td>
            </tr>
		<?php endforeach; ?>
        </tbody>
    </table>

<?php
echo '<div class="tablenav"><div class="tablenav-pages">';
echo paginate_links( $pagination_args );
echo '</div></div>';