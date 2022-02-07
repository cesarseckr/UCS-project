<? 
$sql="SELECT * FROM materias_asignacion WHERE id_materia_asignacion='$folio'";
      $sq = $db->query($sql);
        $rows= $sq->fetchAll(); 
          foreach ($rows as $row) {
            $id_grupo=$row["id_grupo"];
            $id_materia=$row["id_materia"];
            $id_docente=$row["id_docente"];
            $id_ciclo=$row["id_ciclo"];
          }

      $sql="SELECT * FROM materia WHERE id_materia='$id_materia'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $materia=$row["nombre"];
       }

       $sql="SELECT * FROM docentes WHERE id_docente='$id_docente'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $docente=$row["apaterno"]." ".$row["amaterno"]." ".$row["nombres"];
       }

      $sql="SELECT * FROM grupo WHERE id_grupo='$id_grupo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_carrera=$row["id_carrera"];
         $id_curso=$row["id_curso"];
         $grupo=$row["nombre"];
         $estatus=$row["estatus"];
         $id_sede=$row["sede"];
       }

         $sql="SELECT * FROM ciclo where id_ciclo='$id_ciclo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $fecha="Del ".date("d-m-Y",strtotime($row["fecha_inicio"]))." al ".date("d-m-Y",strtotime($row["fecha_fin"]));
                $ciclo=" (".$fecha.")";
          }

         $sql="SELECT * FROM curso where id_curso='$id_curso'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $curso=$row["nombre"];
          }

        $sql="SELECT matricula, apaterno, amaterno, nombres FROM alumnos WHERE id_grupo='$id_grupo' ORDER BY apaterno ASC";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $matricula=$row["matricula"];
         $alumno=$row["apaterno"]." ".$row["amaterno"]." ".$row["nombres"];
         $tabla_alumnos=$tabla_alumnos.
         "<tr>
         <td>".$matricula."</td>
         <td>".$alumno."</td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td></td>
          </tr>";
       }

$html= '<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<title>Listado de Asistencia</title> 
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

.pagina{width: 1000px; border-radius: 5px 5px 5px 5px; padding: 1em; border: 0px solid #B6A618;}

 </STYLE>
<body> 
<center>
<div class="pagina"> 
<table class="titulo">
<tr>
<td style="width:100px;"><center><img src="../../../images/logonl.png" width="110"></center></td>
<td><center>
<b class="t1">LISTA DE ASISTENCIAS</b><br>
<b class="t2">'.$materia.'</b><br>
<b class="t2">'.$docente.'</b><br>
<b class="t3">GRUPO '.$grupo.' '.$curso.' '.$ciclo.'</b><br><br>
</center></td>
<td style="width:100px;"><center><img src="../../../images/logo-ucs.png" width="130"></center></td>
</tr>
</table>
<p class="derecha"><b class="t3">MES: _________________________</b></p>
<table>
<thead>
<tr class="azul">
<th>Matrícula</th>
<th>Alumno</th>
<th colspan="6">Semana 1</th>
<th colspan="6">Semana 2</th>
<th colspan="6">Semana 3</th>
<th colspan="6">Semana 4</th>
<th>Cal</th>
</tr>

<tr>
<th><center>Matrícula</center></th>
<th style="width:210px;"><center>Apellidos y Nombres</center></th>
<th>L</th>
<th>M</th>
<th>M</th>
<th>J</th>
<th>V</th>
<th>S</th>
<th>L</th>
<th>M</th>
<th>M</th>
<th>J</th>
<th>V</th>
<th>S</th>
<th>L</th>
<th>M</th>
<th>M</th>
<th>J</th>
<th>V</th>
<th>S</th>
<th>L</th>
<th>M</th>
<th>M</th>
<th>J</th>
<th>V</th>
<th>S</th>
<th></th>
</tr>
</thead>
<tbody>
'.$tabla_alumnos.'
</tbody>
</table>
<br>
</div>
         </body> 
           </html>'; 
                     ?>