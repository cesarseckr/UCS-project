<? 

 $sql="SELECT * FROM alumnos WHERE id_alumno='$folio'";
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
         $id_grupo=$row["id_grupo"];

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

        $sql="SELECT * FROM curso where id_curso='$id_curso'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $curso=$row["nombre"];
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

              $sqle="SELECT * FROM estatus_alumnos where id_estatus_alumno='$estatus'";
      $sq= $db->query($sqle);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowes) {
        $estatus_alumno=$rowes["nombre"];
      }
       }

       $domicilio=$domicilio." ".$colonia." CP.".$cp." ".$estado_t.", ".$municipio;

        $sql="SELECT id_grupo FROM calificaciones WHERE id_alumno='$id_alumno' GROUP BY id_grupo";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $grupo_comp=$row['id_grupo'];
        $sqll="SELECT AVG(calificaciones.calificacion) as promedio, AVG(calificaciones.faltas) as faltas, calificaciones.periodo as periodo, grupo.nombre as grupo, grupo.id_ciclo as id_ciclo, grupo.id_curso as id_curso FROM calificaciones 
INNER JOIN grupo ON calificaciones.id_grupo = grupo.id_grupo 
INNER JOIN materia ON calificaciones.id_materia = materia.id_materia 
WHERE calificaciones.id_alumno='$id_alumno' and calificaciones.id_grupo='$grupo_comp' GROUP BY grupo";

        $sq= $db->query($sqll);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $id_ciclo=$row["id_ciclo"];
        $grupo_t=$row["grupo"];
        $id_curso=$row["id_curso"];
        $promedio=$row["promedio"];
        $faltas=$row["faltas"];
        $periodo=$row["periodo"];

         if($periodo==1){
        $aprobado="REGULAR";
        }
        else if($periodo==2){
        $aprobado="EXTRA";
        }
        else{
        $aprobado="ADICIONAL";
        }

        $sql="SELECT * FROM ciclo where id_ciclo='$id_ciclo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $id_plan=$row["id_plan"];
        $fecha_t="Del ".date("d-m-Y",strtotime($row["fecha_inicio"]))." al ".date("d-m-Y",strtotime($row["fecha_fin"]));
                
        $sql="SELECT * FROM planes where id_plan='$id_plan'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $plan_t=$row["nombre"];
          }
          }
          $sql="SELECT * FROM curso where id_curso='$id_curso'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $curso_t=$row["nombre"];
          }

        $tabla_cursos=$tabla_cursos.
        "<tr>
         <td>".$plan_t."</td>
         <td>".$grupo_t." (".$curso_t.")</td>
         <td>".$fecha_t."</td>
         <td><b>".round($promedio,1)."</b></td>
         <td>".round($faltas,0)."%</td>
         <td>".$aprobado."</td>
         </tr>";
            }
        }

        $sql="SELECT * FROM historial_disciplinario where id_alumno='$id_alumno'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_falta=$row["id_falta"];
         $reincidencias=$row["reincidencias"];
         $sanciones=$row["sanciones"];
         $fecha=date("d-m-Y", strtotime($row["fecha"]));
         $observaciones=$row["observaciones"];
        
        $sql="SELECT * FROM faltas_disciplina where id_faltas='$id_falta'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $faltas=$row["faltas"];
          }

          $tabla_faltas=$tabla_faltas.
        "<tr>
         <td>".$faltas."</td>
         <td>".$reincidencias."</td>
         <td>".$sanciones."</td>
         <td><b>".$fecha."</b></td>
         <td>".$observaciones."</td>
         </tr>";
          }

    $sql="SELECT * FROM permisos where id_datos='$id_alumno' and tipo=1";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $fecha_inicio=date("d-m-Y h:iA", strtotime($row["fecha_inicio"]));
         $fecha_fin=date("d-m-Y h:iA", strtotime($row["fecha_fin"]));
         $causas=$row['causas'];
         $especificacion=$row['especificacion'];
         if($causas == 1){
      $causas="Consulta servicio Isssteleon";
    }else if($causas == 2){
      $causas="Consulta servicio Médico";
    }else if($causas == 3){
      $causas="Trámites de titulación";
    }else if($causas == 4){
      $causas="Trámites personales";
    }else if($causas == 5){
      $causas="Causas de fuerza mayor";
    }else if($causas == 6){
      $causas="Otros";
    }

          $tabla_permisos=$tabla_permisos.
        "<tr>
         <td>".$causas."</td>
         <td>".$especificacion."</td>
         <td>".$fecha_inicio."</td>
         <td>".$fecha_fin."</td>
         </tr>";
          }

           $sql="SELECT * FROM servicio_social where id_alumno='$id_alumno'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $fecha_inicio=date("d-m-Y h:iA", strtotime($row["fecha_in"]));
         $fecha_fin=date("d-m-Y h:iA", strtotime($row["fecha_fin"]));
         $duracion=$row['duracion'];
         $detalles=$row['detalles'];
         $total=$total+$duracion;
          $tabla_servicio=$tabla_servicio.
        "<tr>
         <td>".$detalles."</td>
         <td>".$fecha_inicio."</td>
         <td>".$fecha_fin."</td>
         <td>".$duracion." Horas</td>
         </tr>";
          }
           $tabla_servicio=$tabla_servicio.
        "<tr>
         <td colspan='3'>Horas totales acumuladas</td>
         <td>".$total." Horas</td>
         </tr>";

         $url="../../../archivos/".$url;
         if(!is_file($url)){ 
        $url="../../../archivos/alumno-generica.png";
        }
         $datos_alumno='<tr><td rowspan="7" style="width:200px;">
         <center><img src="'.$url.'" width="150" height="200"></center></td>
         <td><b>ALUMNO: '.$nombre.'</b></td></tr>
         <tr><td><b>MATRÍCULA: '.$matricula.'</b></td></tr>
         <tr><td><b>DOMICILIO: '.$domicilio.'</b></td></tr>
         <tr><td><b>CURP: '.$curp.'</b></td></tr>
         <tr><td><b>FECHA DE NACIMIENTO: '.$fechanac.' EDAD: '.$edad.' AÑOS</b></td></tr>
         <tr><td><b>FECHA DE INGRESO: '.$fechaing.'</b></td></tr>
         <tr><td><b>GRUPO ACTUAL : '.$generacion_nombre.' - '.$grupo_nombre.' '.$curso.' ('.$nombre_estatus.')</b></td></tr>';

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
<b class="t1">KARDEX DE ALUMNO</b><br>

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
<h3>Cursos del alumno</h3>
<table>
<thead>
<tr class="azul">
<th>Plan</th>
<th>Grupo</th> 
<th>Ciclo</th>
<th>Calificación</th>
<th>Asistencia</th>
<th>Estatus</th> 
</tr>
</thead>
<tbody>
'.$tabla_cursos.'
</tbody>
</table>
<br>
<h3>Faltas a la disciplina</h3>
<table>
<thead>
<tr class="azul">
<th>Falta</th>
<th>Reincidencia</th> 
<th>Sanción aplicada</th>
<th>Fecha</th>
<th>Observaciones</th>
</tr>
</thead>
<tbody>
'.$tabla_faltas.'
</tbody>
</table>
<br>
<h3>Permisos solicitados</h3>
<table>
<thead>
<tr class="azul">
<th>Causas</th>
<th>Especificaciones</th> 
<th>Fecha de inicio</th>
<th>Fecha de fin</th>
</tr>
</thead>
<tbody>
'.$tabla_permisos.'
</tbody>
</table>
<br>
<h3>Servicio Social</h3>
<table>
<thead>
<tr class="azul">
<th>Detalles</th>
<th>Fecha de inicio</th>
<th>Fecha de fin</th> 
<th>Duración</th>
</tr>
</thead>
<tbody>
'.$tabla_servicio.'
</tbody>
</table>
<br>
<h3>Consultas médicas</h3>
<table>
<thead>
<tr class="azul">
<th>Fecha</th>
<th>Observaciones</th> 
<th>Medicamento administrado</th>
<th>Traslado</th>
</tr>
</thead>
<tbody>
'.$tabla_permisos.'
</tbody>
</table>
<br>
</div>
         </body> 
           </html>'; 
                     ?>