<?php
require "vendor/autoload.php";

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}


$pdf->AddPage();

$pdf->setFontSubsetting(false);

$pdf->SetFont('times', 'B', 45);

$pdf->Write(0, 'Font Types', '', 0, 'C', 1, 0, false, false, 0);

$pdf->Ln(10);

$pdf->SetFont('courier', '', 28);
$html = <<<EOD
<h3>Tell me and I forget. Teach me and I remember. Involve me and I learn.</h3>
<p>- Benjamin Franklin</p>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->Ln(20);


$pdf->SetFont('helvetica', 'I', 18);
$html = <<<EOD
<h3>Spread love everywhere you go. Let no one ever come to you without leaving happier.</h3>
<p>- Mother Teresa</p>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Output();
