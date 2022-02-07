<?php
include("../../includes/conexion.php");
require_once("../../../dompdf/autoload.inc.php");
error_reporting(E_ALL ^ E_NOTICE);

  function pdf_create($html, $filename, $paper, $orientation, $stream=TRUE)
  {
    $dompdf = new Dompdf\Dompdf();
    $dompdf->set_paper($paper,$orientation);
    $dompdf->load_html($html);
    $dompdf->render(); 
    $dompdf->stream($filename.".pdf",array('Attachment'=>0));
    $pdf = $dompdf->output(); 
  }
  $filename = 'Kardex de alumno';
  include("lreporte_consultaE.php");
pdf_create($html,$filename,'A4','portrait');
?>