<?php

if (!function_exists('generate_pdf')) {
  function generate_pdf($html, $filename = 'document', $paper_size = 'A4', $orientation = 'portrait') {
    require_once APPPATH . 'ThirdParty/dompdf/autoload.inc.php';
    $dompdf = new \Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper_size, $orientation);
    $dompdf->render();
    // Set font metrics
    $canvas = $dompdf->getCanvas();
    $fontMetrics = $canvas->getFontMetrics();
    $dompdf->getContainer()->setFontMetrics($fontMetrics);
    // Render PDF (second pass to generate actual PDF)
    $dompdf->render();
    // Output the generated PDF
    $dompdf->stream($filename . '.pdf', array('Attachment' => 0));
  }
}
