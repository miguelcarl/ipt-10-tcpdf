<?php
require "vendor/autoload.php";

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
$pdf->setFontSubsetting(true);
$pdf->SetFont('freeserif', '', 12);
$pdf->AddPage();

$utf8text = file_get_contents('chapter1.txt', false);
$pdf->Write(5, $utf8text, '', 0, '', false, 0, false, false, 0);
$pdf->AddPage();

$utf8text = file_get_contents('chapter2.txt', false);
$pdf->Write(5, $utf8text, '', 0, '', false, 0, false, false, 0);
$pdf->AddPage();

$utf8text = file_get_contents('chapter3.txt', false);
$pdf->Write(5, $utf8text, '', 0, '', false, 0, false, false, 0);

$pdf->Output('example_008.pdf', 'I');