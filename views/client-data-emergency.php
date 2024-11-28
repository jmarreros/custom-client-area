<?php
/** @var array $data */
/** @var array $fields */
/** @var string $additional_class */
/** @var bool $show_save_button */
?>

<?php

$is_public = $is_public ?? false;

// Return true if at least one field of the group are checked
function show_group_field( $group_name, $fields, $data, $is_public ): bool {
	if ( ! $is_public ) {
		return true;
	}

	$group = array_filter( $fields, function ( $field ) use ( $group_name ) {
		return $field['group'] === $group_name;
	} );

	$group_checked = array_filter( array_keys( $group ), function ( $field ) use ( $data ) {
		return $data[ $field ] == 1;
	} );

	return count( $group_checked ) > 0;
}


function create_fields( $group_name, $fields, $data, $is_public ): void {
	foreach ( $fields ?? [] as $key => $field ) {
		if ( $field['group'] === $group_name ) {
			if ( $field['type'] === 'checkbox' ) {
				if ( $is_public && $data[ $key ] != 1 ) {
					continue;
				}
				?>
                <p>
                    <label>
                        <input
                                class="input"
                                type="checkbox"
                                id="<?= $key ?>"
                                name="<?= $key ?>"
							<?php checked( $data[ $key ], 1 ); ?>
							<?= $field['disabled'] ?? '' ?>
                        >
						<?= $key ?>
                    </label>
                </p>
			<?php } elseif ( $field['type'] === 'text' || $field['type'] === 'date' ) {
				?>
                <p>
                    <label for="<?= $key ?>">
						<?= $field['label'] ?>
						<?php if ( $field['required'] ?? false ): ?>
                            <span>*</span>
						<?php endif; ?>
                    </label>
                    <input
                            class="input"
                            type="<?= $field['type'] ?>"
                            id="<?= $key ?>"
                            name="<?= $key ?>"
                            value="<?= $data[ $key ] ?? '' ?>"
						<?= $field['required'] ?? '' ?>
						<?= $field['disabled'] ?? '' ?>
                    >
                </p>
				<?php
			} elseif ( $field['type'] === 'select' ) {
				?>
                <p>
                    <label for="<?= $key ?>">
						<?= $field['label'] ?>
						<?php if ( $field['required'] ?? false ): ?>
                            <span>*</span>
						<?php endif; ?>
                    </label>
                    <select class="input" id="<?= $key ?>" name="<?= $key ?>">
						<?php foreach ( $field['options'] as $option_key => $option_value ): ?>
                            <option value="<?= $option_key ?>" <?php selected( $data[ $key ], $option_key ); ?>>
								<?= $option_value ?>
                            </option>
						<?php endforeach; ?>
                    </select>
                </p>
				<?php
			} elseif ( $field['type'] === 'textarea' ) {
				?>
                <p>
                    <label for="<?= $key ?>">
						<?= $field['label'] ?>
						<?php if ( $field['required'] ?? false ): ?>
                            <span>*</span>
						<?php endif; ?>
                    </label>
                    <textarea
                            class="input"
                            id="<?= $key ?>"
                            name="<?= $key ?>"
                            <?= $field['disabled'] ?? '' ?>
                    ><?= $data[ $key ] ?? '' ?></textarea>
                </p>
				<?php
			}
		}
	}
}

?>

<section class="customarea-container customarea-data">

	<?php if ( $show_title ?? false ): ?>
        <h3><?= __( 'Datos usuario', 'customarea' ) ?></h3>
	<?php endif; ?>

	<?php
	$additional_class = isset( $is_public ) && $is_public ? 'public' : '';

	if ( $show_save_button ?? false ) {
		echo '<form id="customarea-data" class="customarea-form" action="" method="post">';
	} else {
		echo '<div id="customarea-data" class="customarea-form ' . $additional_class . '">';
	}
	?>

    <div class="form-controls">
        <fieldset class="row-controls">
            <legend><?= __( 'Datos personales', 'customarea' ) ?></legend>
			<?php create_fields( 'personal', $fields, $data, $is_public ) ?>
        </fieldset>

        <fieldset class="row-controls">
            <legend><?= __( 'Números de contactos', 'customarea' ) ?></legend>
			<?php create_fields( 'contact', $fields, $data, $is_public ) ?>
        </fieldset>


		<?php if ( show_group_field( 'habits', $fields, $data, $is_public ) ): ?>
            <fieldset class="row-controls">
                <legend><?= __( 'Hábitos relevantes', 'customarea' ) ?></legend>
				<?php create_fields( 'habits', $fields, $data, $is_public ) ?>
            </fieldset>
		<?php endif; ?>

		<?php if ( show_group_field( 'cardiovascular', $fields, $data, $is_public ) ): ?>
            <fieldset class="row-controls">
                <legend><?= __( 'Riesgo cardiovascular', 'customarea' ) ?></legend>
				<?php create_fields( 'cardiovascular', $fields, $data , $is_public) ?>
            </fieldset>
		<?php endif; ?>


        <fieldset class="row-controls one-column">
            <legend><?= __( 'Factores varios', 'customarea' ) ?></legend>
			<?php create_fields( 'various', $fields, $data, $is_public ) ?>
        </fieldset>
    </div>

	<?php if ( $show_save_button ?? false ): ?>
        <div class="form-message hide"></div>
        <div class="form-footer">
            <div>
                <input class="button" type="submit" value="Guardar">
                <div class="lds-ring hide">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
	<?php endif; ?>


	<?php
	if ( $show_save_button ?? false ) {
		echo '</form>';
	} else {
		echo '</div>';
	}
	?>

</section>
