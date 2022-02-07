<? 
if($tipo==1){
$tipo_ev="REGULAR";
}
else if($tipo==2){
$tipo_ev="EXTRAORDINARIA";
}
else{
$tipo_ev="ADICIONAL";
}
$fecha_hoy=date("Y-m-d");
$fecha_hoy=strftime("%A, %d de %B de %Y", strtotime($fecha_hoy));
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

      $sql="SELECT * FROM materia WHERE id_materia='$folio2'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_materia=$row["id_materia"];
         $materia=$row["nombre"];
       }

       $sql="SELECT * FROM carrera WHERE id_carrera='$id_carrera'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $carrera=$row["nombre"];
       }

          $sql="SELECT * FROM ciclo where id_ciclo='$id_ciclo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $id_plan=$row["id_plan"];
        $ciclo=$row["clave"]." - ".$row["nombre"]."<br><center>(DEL ".date("d/m/Y",strtotime($row["fecha_inicio"]))." al ".date("d/m/Y",strtotime($row["fecha_fin"])).")</center>";
                
        $sql="SELECT * FROM planes where id_plan='$id_plan'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $plan=$row["clave"];
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
        $suma=0;
        $sqle="SELECT calificaciones.id_calificacion as id_calificacion, calificaciones.fecha as fecha, materia.nombre as materia, alumnos.matricula as matricula, CONCAT(apaterno,' ',amaterno,' ',nombres) as alumno, calificaciones.calificacion as calificacion, calificaciones.faltas as faltas, calificaciones.periodo as periodo FROM calificaciones INNER JOIN alumnos ON calificaciones.id_alumno = alumnos.id_alumno INNER JOIN materia ON calificaciones.id_materia = materia.id_materia where calificaciones.id_grupo='$id_grupo' and calificaciones.id_materia='$id_materia' and calificaciones.periodo='$tipo' GROUP BY alumno ORDER BY alumno ASC";
        $sq= $db->query($sqle);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $matricula=$row["matricula"];
        $alumno=$row["alumno"];
        $calificacion=$row["calificacion"];
        $faltas=$row["faltas"];
        $periodo=$row["periodo"];
        $materia=$row["materia"];
        $fecha_aplicacion=date("Y-m-d",strtotime($row["fecha"]));

        $suma=$suma+$calificacion;
        $cont++;
        $tabla_alumnos=$tabla_alumnos.
         "<tr>
         <td>".$cont."</td>
         <td>".strtoupper($matricula)."</td>
         <td>".strtoupper($alumno)."</td>
         <td><center><b>".round($calificacion,1)."</b></center></td>
         </tr>";
        }
        if($suma>0 and $cont>0){
        $total=$suma/$cont;
         $tabla_alumnos=$tabla_alumnos."<tr>
         <td colspan='3'><center><b>PROMEDIO GENERAL</b></center></td>
         <td><center><b>".round($total,1)."</b></center></td>
         </tr>";   
        }
        if(!empty($fecha_aplicacion)){
        $fecha_aplicacion=strftime("%A, %d de %B de %Y", strtotime($fecha_aplicacion));
        }
        else{
        $fecha_aplicacion="NO REGISTRADA";
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

.azul {background-color:#424964 !important; color:#FFFFFF !important; font-size: 10px !important; font-weight: bold !important;}

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
<b class="t2">BITÁCORA DE CALIFICACIONES</b><br>
<b class="t3">SANTA CATARINA, NUEVO LEÓN</b><br>
<b class="t3">'.mb_strtoupper($fecha_hoy,"utf-8").'</b>
</center></td>
<td style="width:100px;"><center><img src="../../../images/logo-ucs.png" width="130"></center></td>
</tr>
</table>
<table>
<thead>
<tr class="azul">
<th>PROGRAMA</th>
<th>CARRERA</th>
<th>MÓDULO</th>
<th>MATERIA</th>
</tr>
</thead>
<tbody>
<tr>
<td>'.mb_strtoupper($plan,"utf-8").'</td>
<td>'.mb_strtoupper($carrera,"utf-8").'</td>
<td>'.mb_strtoupper($curso,"utf-8").'</td>
<td>'.mb_strtoupper($materia,"utf-8").'</td>
</tr>
</tbody>
</table>
<table>
<thead>
<tr>
<th class="azul">PERIODO ESCOLAR</th>
<td>'.mb_strtoupper($ciclo,"utf-8").'</td>
<th class="azul">GRUPO</th>
<td>'.mb_strtoupper($grupo,"utf-8").'</td>
</tr>
</thead>
</table>
<table>
<thead>
<tr>
<th class="azul">EVALUACIÓN</th>
<td>'.mb_strtoupper($tipo_ev,"utf-8").'</td>
<th class="azul">FECHA DE APLICACIÓN</th>
<td>'.mb_strtoupper($fecha_aplicacion,"utf-8").'</td>
</tr>
</thead>
</table>
<br>
<table>
<thead>
<tr class="azul">
<th style="width:20px;">#</th>
<th style="width:50px;">MATRÍCULA</th>
<th style="width:350px;">NOMBRE DEL ALUMNO</th>
<th style="width:40px;">CALIFICACIÓN</th>
</tr>
</thead>
<tbody>
'.$tabla_alumnos.'
</tbody>
</table>
<br><br><br>
<center>
<b class="t3">
_________________________________________________<br>
'.mb_strtoupper($docente,"utf-8").'<br>
<small>DOCENTE</small>
</b>
</center>
</div>
         </body> 
           </html>'; 
                     ?>