<?php
include("../../includes/conexion.php");
require_once("../../../dompdf/autoload.inc.php");
error_reporting(E_ALL ^ E_NOTICE);
$id_consulta = $_GET["id_consulta"];
  function pdf_create($html, $filename, $paper, $orientation, $stream=TRUE)
  {
    $dompdf = new Dompdf\Dompdf();
    $dompdf->set_paper($paper,$orientation);
    $dompdf->load_html($html);
    $dompdf->render(); 
    $dompdf->stream($filename.".pdf",array('Attachment'=>0));
    $pdf = $dompdf->output(); 
  }
    $sql="SELECT * FROM consultas where id_consulta = '$id_consulta'";
    $sq= $db->query($sql);
    $rows=$sq->fetchAll();
    foreach ($rows as $row){
        $id_paciente=$row["id_paciente"];
        $tipo=$row["tipo_paciente"];
        $fecha=$row["fecha"];
        $hora_inicio=$row["hora_inicio"];
        $dirigir=$row["dirigir"];
        if($dirigir=='1'){
            $dirigir='Consulta Médica';
        }else if($dirigir=='2'){
            $dirigir='Acciones en enfermería';
        }

        if ($tipo==1) {
            $sql_alumnos="SELECT * FROM alumnos where id_alumno = '$id_paciente'";
            $sq_alumnos= $db->query($sql_alumnos);
            $rows_alumnos=$sq_alumnos->fetchAll();
            foreach ($rows_alumnos as $row_alumnos){
                $nombre=$row_alumnos['nombres'].' '.$row_alumnos['apaterno'].' '.$row_alumnos['amaterno'];
            }
        }else if($tipo==2){
            $sql_docente="SELECT * FROM docentes where id_docente = '$id_paciente'";
            $sq_docente= $db->query($sql_docente);
            $rows_docente=$sq_docente->fetchAll();
            foreach ($rows_docente as $row_docente){
                $nombre=$row_docente['nombres'].' '.$row_docente['apaterno'].' '.$row_docente['amaterno'];
            }
        }
        else if($tipo==3){
            $sql_administrativos="SELECT * FROM administrativos where id_administrativo = '$id_paciente'";
            $sq_administrativos= $db->query($sql_administrativos);
            $rows_administrativos=$sq_administrativos->fetchAll();
            foreach ($rows_administrativos as $row_administrativos){
                $nombre=$row_administrativos['nombres'].' '.$row_administrativos['apaterno'].' '.$row_administrativos['amaterno'];
            }
        }
    }

    $sql_somatometria="SELECT * FROM consulta_somatometria where id_consulta = '$id_consulta'";
    $sq_somatometria= $db->query($sql_somatometria);
    $rows_somatometria=$sq_somatometria->fetchAll();
    foreach ($rows_somatometria as $row_somatometria){
        $talla=$row_somatometria["talla"];
        $peso=$row_somatometria["peso"];
        $imc=$row_somatometria["imc"];
    }

    $sql_svitales="SELECT * FROM consulta_svitales where id_consulta = '$id_consulta'";
    $sq_svitales= $db->query($sql_svitales);
    $rows_svitales=$sq_svitales->fetchAll();
    foreach ($rows_svitales as $row_svitales){
        $presion_arterial=$row_svitales["presion_arterial"];
        $f_cardiaca=$row_svitales["f_cardiaca"];
        $f_respiratoria=$row_svitales["f_respiratoria"];
        $temp=$row_svitales["temp"];
    }

  $filename = 'Kardex de alumno';
  $html='
    <html> 
        <head> 
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
            <title></title> 
        </head> 
        <STYLE type="text/css">
            body { font: Helvetica, Verdana, Calibri, Arial, Sans-serif; }
             p{ font-size: 10px; }

            .t1{ font-size: 25px; }

            .t2{ font-size: 18px; }

            .t3{ font-size: 13px; }

            .just{ text-align: justify; }

            .derecha {text-align: right}

            .izquierda {text-align: left}

            .tabla2 { width: 700px;
              border: 1px groove;
              background: #DBDBDBD;
              padding: 0px 0px 0px 20px; }

            .tabla{ width: 700px; } 

            td{ padding: 0px 1px 0px 1px; }

            h4{ font-size: 14px; }

            table { border-collapse: collapse; text-align: left; width: 100%; }

            {background: #fff; overflow: hidden; border-radius:25px;}

            table td, table th { padding: 5px 9px;}

            table thead th {font-size: 12px; font-weight: bold; border: 1px solid #424964;}

            .azul {background-color:#424964 !important; color:#FFFFFF !important; font-size: 15px !important; font-weight: bold !important;}

            table thead th:first-child { border: none; }
            
            .titulo td{border: 0px solid #424964; font-weight: normal; }
            td{font-size: 10px;border: 1px solid #424964; font-weight: normal; }

            .pagina{width: 675px; border-radius: 5px 5px 5px 5px; padding: 1em; border: 0px solid #B6A618;}
        </STYLE>
        <body> 
            <center>
                <div class="pagina"> 
                    <table class="titulo">
                        <tr>
                            <td style="width:50px;">
                                <center>
                                    <img src="../../../images/logonl.png" width="110">
                                </center>
                            </td>
                            <td>
                                <center>
                                    <b class="t1">Consulta</b><br>
                                    <b class="t2">Turno: '.$id_consulta.'</b><br>
                                    <b class="t3">Fecha: '.$fecha.'</b><br>
                                    <b class="t3">Hora de llegada: '.$hora_inicio.'</b><br>
                                </center>
                            </td>
                            <td style="width:50px;">
                                <center>
                                    <img src="../../../images/logo-ucs.png" width="130">
                                </center>
                            </td>
                        </tr>
                    </table>

                    <table class="titulo">
                        <tr>
                            <td style="width:100px;">
                               <b class="t3">Nombre del paciente:</b>
                            </td>
                            <td>
                               '.$nombre.'
                            </td>
                            <td style="width:100px;">
                               <b class="t3">Dirigir a:</b>
                            </td>
                            <td>
                               '.$dirigir.'
                            </td>
                        </tr>
                    </table>

                    <table class="titulo">
                        <tr>
                            <td><h3>Signos Vitales</h3></td>
                        </tr>
                        <tr>
                            <td style="width:100px;">
                               <b class="t4">Presión Arterial:</b>
                            </td>
                            <td>
                               '.$presion_arterial.'
                            </td>
                            <td style="width:100px;">
                               <b class="t4">Frecuencia Cardiaca:</b>
                            </td>
                            <td>
                               '.$f_cardiaca.'
                            </td>
                            <td style="width:100px;">
                               <b class="t4">Frecuencia Respiratoria:</b>
                            </td>
                            <td>
                               '.$f_respiratoria.'
                            </td>
                            <td style="width:100px;">
                               <b class="t4">Temperatura:</b>
                            </td>
                            <td>
                               '.$temp.'
                            </td>
                        </tr>
                    </table>

                    <table class="titulo">
                        <tr>
                            <td><h3>Somatometria</h3></td>
                        </tr>
                        <tr>
                            <td style="width:100px;">
                               <b class="t4">Talla:</b>
                            </td>
                            <td>
                               '.$talla.'
                            </td>
                            <td style="width:100px;">
                               <b class="t4">Peso:</b>
                            </td>
                            <td>
                               '.$peso.'
                            </td>
                            <td style="width:100px;">
                               <b class="t4">IMC:</b>
                            </td>
                            <td>
                               '.$imc.'
                            </td>
                        </tr>
                    </table>

                </div>
            </center>
        </body> 
    </html>'; 
pdf_create($html,$filename,'A4','portrait');
?>