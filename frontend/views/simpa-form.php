<table class="form-table">
    <tr>
        <th>
            <label for="birthday"><?php _e( 'Fecha Nacimiento', 'customarea' ); ?></label>
        </th>
        <td>
            <input type="date" name="birthday" class="regular-text"
                   value="<?= get_user_meta( $user->ID, 'birthday', true ) ?>"/>
        </td>
    </tr>
</table>