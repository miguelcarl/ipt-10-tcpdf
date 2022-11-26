<?php
require "vendor/autoload.php";

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);


$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->setFontSubsetting(true);

$pdf->SetFont('times', '', 14, '', true);

$pdf->AddPage('L');

$bMargin = $pdf->getBreakMargin();

$auto_page_break = $pdf->getAutoPageBreak();

$pdf->SetAutoPageBreak(false, 0);

$img_file = K_PATH_IMAGES.'jan1.jpg';
$pdf->Image($img_file, 17, 76, 35, 18, '', '', '', false, 300, '', false, false, 0);

$img_file = K_PATH_IMAGES.'jan2.jpg';
$pdf->Image($img_file, 54, 76, 35, 18, '', '', '', false, 300, '', false, false, 0);

$pdf->SetAutoPageBreak($auto_page_break, $bMargin);

$pdf->setPageMark();


$tbl = <<<EOD
<table border="1" cellpadding="20" cellspacing="10" align="center">
 <tr nobr="true">
  <th width="900" align="center" style="font-size:28; color:#000000;">January</th>
 </tr>
 <tr nobr="true">
  <td width="120" align="center"><b>SUN</b></td>
  <td width="120" align="center"><b>MON</b></td>
  <td width="120" align="center"><b>TUES</b></td>
  <td width="120" align="center"> <b>WED</b></td>
  <td width="120" align="center"><b>THURS</b></td>
  <td width="120" align="center"><b>FRI</b></td>
  <td width="120" align="center"><b>SAT</b></td>
 </tr>
 <tr nobr="true" >
  <td width="120"><FONT COLOR="#ffffff"><b>1</b></FONT></td>
  <td width="120"><FONT COLOR="#ffffff"><b>2</b></FONT></td>
  <td width="120">3</td>
  <td width="120">4</td>
  <td width="120">5</td>
  <td width="120">6</td>
  <td width="120">7</td>
 </tr>
 <tr nobr="true">
  <td width="120">8</td>
  <td width="120">9</td>
  <td width="120">10</td>
  <td width="120">11</td>
  <td width="120">12</td>
  <td width="120">13</td>
  <td width="120">14</td>
 </tr>
 <tr nobr="true">
 <td width="120">15</td>
 <td width="120">16</td>
 <td width="120">17</td>
 <td width="120">18</td>
 <td width="120">19</td>
 <td width="120">20</td>
 <td width="120">21</td>
</tr>
<tr nobr="true">
<td width="120">22</td>
<td width="120">23</td>
<td width="120">24</td>
<td width="120">25</td>
<td width="120">26</td>
<td width="120">27</td>
<td width="120">28</td>
</tr>
<tr nobr="true">
<td width="120">29</td>
<td width="120">30</td>
<td width="120">31</td>
</tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->Output();