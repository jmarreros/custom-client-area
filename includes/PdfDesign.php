<?php

namespace dcms\customarea\includes;

use Dompdf\Dompdf;
use JetBrains\PhpStorm\NoReturn;

class PdfDesign {

	public function generate_design($username, $design = 1): void {
		return;
		// ob_start();

		// $img_qr_user = sanitize_url( DCMS_CUSTOMAREA_UPLOAD_URL . $username . '.svg' );

		// switch ( $design ) {
		// 	case '2':
		// 		include( DCMS_CUSTOMAREA_PATH . '/views/qr-design/design-2.php' );
		// 		break;
		// 	default:
		// 		include( DCMS_CUSTOMAREA_PATH . '/views/qr-design/design-1.php' );
		// }

		// $html = ob_get_clean();

		// $dompdf = new Dompdf();

		// $options = $dompdf->getOptions();
		// $options->set( 'isRemoteEnabled', true );

		// $dompdf->setOptions( $options );
		// $dompdf->loadHtml( $html );
		// $dompdf->render();

		// ob_end_clean();
		// $dompdf->stream();
		// exit();
	}
}