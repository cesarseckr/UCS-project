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

 $sql="SELECT * FROM alumnos WHERE id_alumno='$folio2'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
                 $id_alumno=$row["id_alumno"];
         $matricula=$row["matricula"];
         $nombre=$row["apaterno"]." ".$row["amaterno"]." ".$row["nombres"];
         $sexo=$row["sexo"];
         $fecha_nac=$row["fechanac"];
         $fechanac=date("d-m-Y",strtotime($row["fechanac"]));
         $fechaing=date("d-m-Y",strtotime($row["fechaing"]));
         $domicilio=$row["domicilio"];
         $colonia=$row["colonia"];
         $cp=$row["cp"];
         $estado=$row["estado"];
         $estado_t=$row["estado"];
         $municipio=$row["municipio"];
         $municipio_t=$row["municipio"];
         $telefono=$row["telefono"];
         $celular=$row["celular"];
         $email=$row["email"];
         $url=$row["img"];

        $fecha_act= date ('Y-m-d');
        $fecha1 = new DateTime($fecha_nac); 
        $fecha2 = new DateTime($fecha_act);
        $fecha = $fecha1->diff($fecha2);
        $edad = $fecha->y;

         $id_generacion=$row["id_generacion"];

         $ult_grado=$row["ult_grado"];
         $est_prev=$row["est_prev"];

         $apaterno=$row["apaterno"];
         $amaterno=$row["amaterno"];
         $nombres=$row["nombres"];
         $sexo=$row["sexo"];
         $curp=$row["curp"];
         $observaciones=$row["observaciones"];

        $id_estatus=$row["id_estatus"];
        $id_esc_origen=$row["id_esc_origen"];

        $sql="SELECT * FROM grupo where id_grupo='$id_grupo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $grupo_nombre=$row["nombre"];
        $id_curso=$row["id_curso"];
        $id_carrera=$row["id_carrera"];
        }
        $sql="SELECT * FROM generacion where id_generacion='$id_generacion'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $generacion_nombre=$row["nombre"];
        $id_academia=$row["id_academia"];
        }
        $sql="SELECT * FROM academia where id_academia='$id_academia'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $id_plan=$row["id_plan"];
        }

         $sql="SELECT * FROM estatus_alumnos where id_estatus_alumno='$id_estatus'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowes) {
        $nombre_estatus=$rowes["nombre"];
      }

         $sql="SELECT * FROM estados where id_estado='$estado'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowe) {
        $estado_t=strtoupper($rowe["estado"]);
      }

$sql="SELECT * FROM municipios where id_municipio='$municipio'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowm) {
        $municipio_t=strtoupper($rowm["municipio"]);
      }
       }

       $domicilio=$domicilio." ".$colonia." CP.".$cp." ".$estado_t.", ".$municipio;

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
        $cont=0;
        $sql="SELECT calificaciones.id_calificacion as id_calificacion, materia.nombre as materia, alumnos.matricula as matricula, CONCAT(apaterno,' ',amaterno,' ',nombres) as alumno, calificaciones.calificacion as calificacion, calificaciones.faltas as faltas, calificaciones.periodo as periodo FROM calificaciones INNER JOIN alumnos ON calificaciones.id_alumno = alumnos.id_alumno INNER JOIN materia ON calificaciones.id_materia = materia.id_materia where calificaciones.id_grupo='$id_grupo' and calificaciones.id_alumno='$id_alumno' GROUP BY id_calificacion ORDER BY `alumno` ASC";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $matricula=$row["matricula"];
        $alumno=$row["alumno"];
        $calificacion=$row["calificacion"];
        $faltas=$row["faltas"];
        $periodo=$row["periodo"];
        $materia=$row["materia"];
        $cont++;
        $total=$total+$calificacion;
        $sqle="SELECT * FROM estatus_alumnos where id_estatus_alumno='$estatus'";
      $sq= $db->query($sqle);
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
         <td>".$materia."</td>
         <td><b>".round($calificacion,1)."</b></td>
         <td>".$faltas."%</td>
         <td>".$aprobado."</td>
         </tr>";
        }
        if($cont!=0){ 
        $total=($total/$cont);
        $tabla_alumnos=$tabla_alumnos.
         "<tr>
         <td>Promedio</td>
         <td colspan='3'><b>".round(($total),1)."</b></td>
         </tr>";
         }

         $url="../../../archivos/".$url;
         if(!is_file($url)){ 
        $url="../../../archivos/alumno-generica.png";
        }
         $datos_alumno='<tr><td rowspan="6" style="width:200px;">
         <center><img src="'.$url.'" width="150" height="200"></center></td>
         <td><b>ALUMNO: '.$nombre.'</b></td></tr>
         <tr><td><b>MATRÍCULA: '.$matricula.'</b></td></tr>
         <tr><td><b>DOMICILIO: '.$domicilio.'</b></td></tr>
         <tr><td><b>CURP: '.$curp.'</b></td></tr>
         <tr><td><b>FECHA DE NACIMIENTO: '.$fechanac.' EDAD: '.$edad.' AÑOS</b></td></tr>
         <tr><td><b>FECHA DE INGRESO: '.$fechaing.'</b></td></tr>';

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
<b class="t1">CALIFICACIONES DE ALUMNO</b><br>
<b class="t2">'.$plan.'</b><br>
<b class="t3">'.$grupo.' '.$curso.'</b><br>
<b class="t3">'.$ciclo.'</b>
</center></td>
<td style="width:100px;"><center><img src="../../../images/logo-ucs.png" width="130"></center></td>
</tr>
</table>
<br>
<table>
<thead>
<tr class="azul">
<th colspan="2"><center>Datos Personales</center></th>
</tr>
</thead>
<tbody>
'.$datos_alumno.'
</tbody>
</table>
<br>
<table>
<thead>
<tr class="azul">
<th style="width:180px;">Materia</th>
<th>Calificación</th>   
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