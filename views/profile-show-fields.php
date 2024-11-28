<h3><?php _e('Datos Emergencia', 'customarea'); ?></h3>

<table class="form-table">
	<tr>
		<th>
			<label for="birthday"><?php _e('Fecha Nacimiento', 'customarea'); ?></label>
		</th>
		<td>
			<input type="date" name="birthday" class="regular-text"
			       value="<?= get_user_meta($user->ID, 'birthday' ,true) ?>" />
		</td>
	</tr>

    <tr>
        <th>
            <label for="contacto1"><?php _e('Contacto', 'customarea'); ?></label>
        </th>
        <td>
            <input type="text" name="contacto1" class="regular-text"
                   value="<?= get_user_meta($user->ID, 'contacto1' ,true) ?>" />
        </td>
    </tr>

    <tr>
        <th>
            <label for="contacto2"><?php _e('Contacto alterno', 'customarea'); ?></label>
        </th>
        <td>
            <input type="text" name="contacto2" class="regular-text"
                   value="<?= get_user_meta($user->ID, 'contacto1' ,true) ?>" />
        </td>
    </tr>

    <tr>
        <th>
            <label><?php _e('Hábitos relevantes', 'customarea'); ?></label>
        </th>
        <td>
            <label>
                <input class="input" type="checkbox" name="tabaco" <?php checked( get_user_meta($user->ID, 'tabaco' ,true), 1 ); ?>>
		        <?= __( 'Tabaco', 'customarea' ) ?>
            </label>&nbsp;
            <label>
                <input class="input" type="checkbox" name="alcohol" <?php checked( get_user_meta($user->ID, 'alcohol' ,true), 1 ); ?>>
		        <?= __( 'Alcohol', 'customarea' ) ?>
            </label>&nbsp;
            <label>
                <input class="input" type="checkbox" name="drogas" <?php checked( get_user_meta($user->ID, 'drogas' ,true), 1 ); ?>>
		        <?= __( 'Drogas', 'customarea' ) ?>
            </label>
        </td>
    </tr>

    <tr>
        <th>
            <label><?php _e('Riesgo cardiovascular', 'customarea'); ?></label>
        </th>
        <td>
            <label>
                <input class="input" type="checkbox" name="hipertencion" <?php checked( get_user_meta($user->ID, 'hipertencion' ,true), 1 ); ?>>
				<?= __( 'Hipertencion', 'customarea' ) ?>
            </label>&nbsp;

            <label>
                <input class="input" type="checkbox" name="arritmia" <?php checked( get_user_meta($user->ID, 'arritmia' ,true), 1 ); ?>>
		        <?= __( 'Arritmia', 'customarea' ) ?>
            </label>&nbsp;

            <label>
                <input class="input" type="checkbox" name="colesterol" <?php checked( get_user_meta($user->ID, 'colesterol' ,true), 1 ); ?>>
		        <?= __( 'Colesterol', 'customarea' ) ?>
            </label>&nbsp;

            <label>
                <input class="input" type="checkbox" name="diabetis" <?php checked( get_user_meta($user->ID, 'diabetis' ,true), 1 ); ?>>
		        <?= __( 'Diabetis', 'customarea' ) ?>
            </label>&nbsp;

            <label>
                <input class="input" type="checkbox" name="marcapasos" <?php checked( get_user_meta($user->ID, 'marcapasos' ,true), 1 ); ?>>
		        <?= __( 'Marcapasos', 'customarea' ) ?>
            </label>&nbsp;

        </td>
    </tr>

    <tr>
        <th>
            <label for="alergias"><?php _e('Alergias', 'customarea'); ?></label>
        </th>
        <td>
            <input type="text" name="alergias" class="regular-text"
                   value="<?= get_user_meta($user->ID, 'alergias' ,true) ?>" />
        </td>
    </tr>
    <tr>
        <th>
            <label for="enfermedades"><?php _e('Enfermedades importantes', 'customarea'); ?></label>
        </th>
        <td>
            <input type="text" name="enfermedades" class="regular-text"
                   value="<?= get_user_meta($user->ID, 'enfermedades' ,true) ?>" />
        </td>
    </tr>
    <tr>
        <th>
            <label for="medicacion"><?php _e('Medicación actualizada', 'customarea'); ?></label>
        </th>
        <td>
            <input type="text" name="medicacion" class="regular-text"
                   value="<?= get_user_meta($user->ID, 'medicacion' ,true) ?>" />
        </td>
    </tr>
    <tr>
        <th>
            <label for="grupoSanguineo"><?php _e('Grupo sanguíneo', 'customarea'); ?></label>
        </th>
        <td>
            <input type="text" name="grupoSanguineo" class="regular-text"
                   value="<?= get_user_meta($user->ID, 'grupoSanguineo' ,true) ?>" />
            <p class="description">Valores permitidos: A+,A-,B+,B-,AB+,AB-,O+,O-</p>
        </td>
    </tr>
    <tr>
        <th>
            <label for="otros"><?php _e('Otros datos relevantes', 'customarea'); ?></label>
        </th>
        <td>
            <textarea class="input" id="otros" disabled><?= get_user_meta($user->ID, 'otros' ,true) ?></textarea>
        </td>
    </tr>
</table>