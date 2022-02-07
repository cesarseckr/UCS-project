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
  $filename = 'Receta Medica';

  $id_consulta=$_GET['id_consulta'];


  $tabla_prueba="";

  $sql="SELECT * FROM consultas WHERE id_consulta='$id_consulta'";
  $sq= $db->query($sql);
  $rows=$sq->fetchAll();

    foreach ($rows as $row){
        
        $fecha=$row['fecha'];
        $hora_inicio=$row['hora_inicio'];
        $hora_fin=$row['hora_fin'];
        $estatus=$row['estatus'];
        $id_paciente=$row['id_paciente'];
        $tipo_paciente=$row['tipo_paciente'];
        $dirigir=$row['dirigir'];

        if ($dirigir == 1) {
            $dirigir="Consulta Médica";
        }else if ($dirigir==2) {
            $dirigir = "Acciones de enfermeria";
        }

        if($tipo_paciente == 1){
             $sql_alumno="SELECT * FROM alumnos WHERE id_alumno='$id_paciente'";
             $sq_alumno = $db -> query($sql_alumno);
             $rows_alumno=$sq_alumno-> fetchAll();
             foreach ($rows_alumno as $row_alumno) {
                $nombre=$row_alumno['nombres']." ".$row_alumno['apaterno']." ".$row_alumno['amaterno'];
             }
        }else if($tipo_paciente == 2){
            $sql_docente="SELECT * FROM docentes WHERE id_docente='$id_paciente'";
             $sq_docente = $db -> query($sql_docente);
             $rows_docente=$sq_docente-> fetchAll();
             foreach ($rows_docente as $row_docente) {
                $nombre=$row_docente['nombres']." ".$row_docente['apaterno']." ".$row_docente['amaterno'];
             }
        }else if($tipo_paciente == 3){
            $sql_administrativo="SELECT * FROM administrativos WHERE id_administrativo='$id_paciente'";
             $sq_administrativo = $db -> query($sql_administrativo);
             $rows_administrativo=$sq_administrativo-> fetchAll();
             foreach ($rows_administrativo as $row_administrativo) {
                $nombre=$row_administrativo['nombres']." ".$row_administrativo['apaterno']." ".$row_administrativo['amaterno'];
             }
        }

        $tabla_prueba=$tabla_prueba.
        "<tr>
            <td>".$row['nombre']."</td>
            <td>".$row['conta']."</td>
         </tr>";  
    }



  $html= '
    <html> 
        <head> 
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
            <title>Kardex de alumno</title> 
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
                            <td style="width:100px;">
                                <center>
                                    <img src="../../../images/logonl.png" width="110">
                                </center>
                            </td>
                            <td>
                                <center>
                                    <b class="t1">Reporte de Mobilidad</b><br>
                                    <b class="t2">Incidencia por Diagnóstico</b><br>
                                    <b class="t2">Área Médica</b><br>
                                </center>
                            </td>
                            <td style="width:100px;">
                                <center>
                                    <img src="../../../images/logo-ucs.png" width="130">
                                </center>
                            </td>
                        </tr>
                    </table>

                    <br>
                    <h3>('.$fecha_inicio.' - '.$fecha_fin.')</h3>
                    <table>
                        <thead>
                            <tr class="azul">
                                <td>Diagnostico</td>
                                <td>Cantidad</td>
                            </tr>
                        </thead>
                        <tbody>
                            '.$tabla_prueba.'
                        </tbody>
                    </table>
                    <br>
                </div>
            </center>
        </body> 
    </html>';



  pdf_create($html,$filename,'A4','portrait');
?>