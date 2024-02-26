<?php

if (!function_exists('generate_pdf')) {
  function generate_pdf($html, $filename = 'document', $paper_size = 'A4', $orientation = 'portrait') {
    require_once APPPATH . 'ThirdParty/dompdf/autoload.inc.php';
    $pdf = new \Dompdf\Dompdf();
    $pdf->loadHtml($html);
    $pdf->setPaper($paper_size, $orientation);
    $pdf->render();
    // Set font metrics
    $canvas = $pdf->getCanvas();
    $fontMetrics = $canvas->getFontMetrics();
    $pdf->getContainer()->setFontMetrics($fontMetrics);
    // Render PDF (second pass to generate actual PDF)
    $pdf->render();
    // Output the generated PDF
    $pdf->stream($filename . '.pdf', array('Attachment' => 0));
  }
}
