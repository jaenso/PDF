<?php
require __DIR__ . '/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();
ob_start();
include('data.php');
$htmlcode = ob_get_clean();
$html2pdf->writeHTML($htmlcode);
$html2pdf->output();
