  <div id="fdesc">
  <small><b>Ningún filtro aplicado</b> realiza una busqueda para encontrar más datos - Mostrando últimos <b>300</b> registros (<b>Filtros aplicables:</b> Nombre, Ciclo, Carrera, Curso)</small>
  </div>
 <div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de grupos");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Reporte de calificaciones</th>
        <th>Matrícula</th>
        <th>Alumno</th>
        <th>Promedio</th>
        <th>Grupo</th>
        <th>Plan de estudios</th>
        <th>Ciclo</th>
        <th>Módulo</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
      if(isset($_SESSION['filtro'])){
      $fgrupo=$_SESSION['fgrupo'];
      if($fgrupo!=""){
      $fgrupo="and calificaciones.id_grupo='$fgrupo'";
      }
      $_SESSION['fgrupo']=null;
      $_SESSION['filtro']=null;
      $sql="SELECT calificaciones.id_calificacion as id_calificacion, alumnos.matricula as matricula, calificaciones.id_alumno as id_alumno, AVG(calificaciones.calificacion) as promedio, CONCAT(apaterno,' ',amaterno,' ',nombres) as alumno, grupo.nombre as grupo, grupo.id_grupo as id_grupo, grupo.id_curso as id_curso, grupo.id_ciclo as id_ciclo, grupo.estatus as estatus, calificaciones.periodo as periodo FROM calificaciones INNER JOIN alumnos ON calificaciones.id_alumno = alumnos.id_alumno INNER JOIN grupo ON calificaciones.id_grupo = grupo.id_grupo where calificaciones.id_calificacion<> 0 ".$fgrupo." GROUP BY alumno ORDER BY id_calificacion DESC LIMIT 300";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_grupo=$row["id_grupo"];
         $id_alumno=$row["id_alumno"];
         $grupo=$row["grupo"];
         $id_ciclo=$row["id_ciclo"];
         $id_curso=$row["id_curso"];
         $alumno=$row["alumno"];
         $estatus=$row["estatus"];
         $matricula=$row["matricula"];
         $promedio=round($row["promedio"],1);

         $sql="SELECT * FROM ciclo where id_ciclo='$id_ciclo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $id_plan=$row["id_plan"];
        $clave_ciclo=$row["clave"];
        $nombre_ciclo=$row["nombre"];

        $sql="SELECT * FROM planes where id_plan='$id_plan'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $clave_plan=$row["clave"];
        $nombre_plan=$row["nombre"];
          }
          }

         $sql="SELECT * FROM curso where id_curso='$id_curso'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $nombre_curso=$row["nombre"];
          }

         $per="Sin fechas de evaluación registradas";
          $sql="SELECT * FROM periodos where id_grupo='$id_grupo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_periodo=$row["id_periodo"];
         $observaciones=$row["observaciones"];
         $fecha_in_f= date("Y-m-d\TH:i",strtotime($row["fecha_in"]));
         $fecha_fin_f= date("Y-m-d\TH:i",strtotime($row["fecha_fin"]));
         $fecha_in=date("d-m-Y (h:iA)",strtotime($row["fecha_in"]));
         $fecha_fin=date("d-m-Y (h:iA)", strtotime($row["fecha_fin"]));
         $per="Del ".$fecha_in." al ".$fecha_fin;
          }

       $pdf='<form action="pdf/lgrupocalificacion_alumno.php" method="post" enctype="multipart/form-data" target="_blank">
         <button type="submit" class="btn btn-rounded btn-danger btn-sm"><i class="fa fa-file-pdf"></i> PDF</button>
         <input value="'.$id_grupo.'" name="id" style="display:none;">
         <input value="'.$id_alumno.'" name="id2" style="display:none;">
         </form>';

    if($estatus==1){ 
      $estatus_t="<center><span class='btn btn-success btn-sm'>Activo</span></center>";
    } else if($estatus==3){
      $estatus_t="<center><span class='btn btn-primary btn-sm'>Finalizado</span></center>";
    } else{
      $estatus_t="<center><span class='btn btn-danger btn-sm'>Desactivado</span></center>";
    }
      ?>
      <tr>
        <td><center><? echo $pdf; ?></center></td>
        <td><? echo $matricula; ?></td>
        <td><? echo $alumno; ?></td>
        <td><? echo $promedio; ?></td>
        <td><? echo $grupo; ?></td>
        <td><? echo $clave_plan." - ".$nombre_plan; ?></td>
        <td><? echo $clave_ciclo." - ".$nombre_ciclo; ?></td>
        <td><? echo $nombre_curso; ?></td>
        <td><? echo $estatus_t; ?></td>  
      </tr>
      <? 
      $id_periodo="";
         $fecha_in="";
         $fecha_fin="";
         $fecha_in_f="";
         $fecha_fin_f="";
         $observaciones="";
      }
            }
     ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Reporte de calificaciones</th>
        <th>Matrícula</th>
        <th>Alumno</th>
        <th>Promedio</th>
        <th>Grupo</th>
        <th>Plan de estudios</th>
        <th>Ciclo</th>
        <th>Módulo</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>