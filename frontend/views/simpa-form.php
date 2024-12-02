<header>
    <h2>HOJA DE AFILIACIÓN AL SINDICATO MÉDICO PROFESIONAL DE ASTURIAS (SIMPA)</h2>
    <h3>FACULTATIVO INTERNO RESIDENTE</h3>
    <div>C/ Ingeniero Marquina 3, 1ºizqda. 33004 Oviedo. Telf. 985 25 33 62. Fax: 985 25 35 88</div>
    <div><span>Correo electrónico: info@simpa.es</span> <span>www.simpa.es</span></div>
</header>
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