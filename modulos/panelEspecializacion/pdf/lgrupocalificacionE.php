<? 
 $sql="SELECT * FROM grupo WHERE id_grupo='$folio'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_carrera=$row["id_carrera"];
         $id_curso=$row["id_curso"];
         $grupo=$row["nombre"];
         $estatus=$row["estatus"];
         $id_sede=$row["sede"];
         $id_grupo=$row["id_grupo"];
         $id_ciclo=$row["id_ciclo"];
       }

      $sql="SELECT * FROM materia WHERE id_materia='$id_materia'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $materia=$row["nombre"];
       }

          $sql="SELECT * FROM ciclo where id_ciclo='$id_ciclo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $id_plan=$row["id_plan"];
        $fecha="Del ".date("d-m-Y",strtotime($row["fecha_inicio"]))." al ".date("d-m-Y",strtotime($row["fecha_fin"]));
                $ciclo=" (".$fecha.")";

        $sql="SELECT * FROM planes where id_plan='$id_plan'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $plan=$row["nombre"];
        $calif_minima=$row["calif_minima"];
        $asistencia_minima=$row["asistencia_minima"];
          }
          }

        $sql="SELECT * FROM curso where id_curso='$id_curso'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $curso=$row["nombre"];
          }

        $sql="SELECT alumnos.matricula as matricula, alumnos.id_estatus as estatus, CONCAT(apaterno,' ',amaterno,' ',nombres) as alumno, AVG(calificaciones.calificacion) as promedio, calificaciones.faltas as faltas, MAX(calificaciones.periodo) as periodo FROM calificaciones INNER JOIN alumnos ON calificaciones.id_alumno = alumnos.id_alumno where calificaciones.id_grupo='$id_grupo' GROUP BY alumno HAVING count(*)>1";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $matricula=$row["matricula"];
        $alumno=$row["alumno"];
        $promedio=$row["promedio"];
        $faltas=$row["faltas"];
        $periodo=$row["periodo"];
        $estatus=$row["estatus"];
        
        $sql="SELECT * FROM estatus_alumnos where id_estatus_alumno='$estatus'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowes) {
        $estatus_alumno=$rowes["nombre"];
      }

         if($periodo==1){
        $aprobado="REGULAR";
        }
        else if($periodo==2){
        $aprobado="EXTRA";
        }
        else{
        $aprobado="ADICIONAL";
        }
               $tabla_alumnos=$tabla_alumnos.
         "<tr>
         <td>".$matricula."</td>
         <td>".$alumno."</td>
         <td><b>".round($promedio,1)."</b></td>
         <td>".$faltas."%</td>
         <td>".$estatus_alumno."</td>
         </tr>";
        }

$html= '<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<title>Listado de Calificaciones</title> 
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
<td style="width:100px;"><center><img src="../../../images/logonl.png" width="110"></center></td>
<td><center>
<b class="t1">CALIFICACIONES GENERALES</b><br>
<b class="t2">'.$plan.'</b><br>
<b class="t3">GRUPO '.$grupo.' '.$curso.'</b><br>
<b class="t3">'.$ciclo.'</b>
</center></td>
<td style="width:100px;"><center><img src="../../../images/logo-ucs.png" width="130"></center></td>
</tr>
</table>
<br>
<table>
<thead>
<tr class="azul">
<th>Matrícula</th>
<th style="width:250px;">Alumno</th>
<th>Promedio</th>   
<th>Asistencia</th>
<th>Estatus</th>
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