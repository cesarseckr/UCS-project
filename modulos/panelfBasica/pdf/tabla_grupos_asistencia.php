  <div id="fdesc">
  <small><b>Ningún filtro aplicado</b> realiza una busqueda para encontrar más datos - Mostrando últimos <b>300</b> registros (<b>Filtros aplicables:</b> Grupo, Ciclo, Docente)</small>
  </div>
 <div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de materias");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Generar reporte</th>
        <th>Docente</th>
        <th>Materia</th>
        <th>Alumnos</th>
        <th>Grupo</th>
        <th>Módulo</th>
        <th>Período de evaluación</th>
        <th>Ciclo</th>
        </tr>
    </thead>
    <tbody>
      <? 
      if(isset($_SESSION['filtro'])){
      $fdocente=$_SESSION['fdocente'];
      $fgrupo=$_SESSION['fgrupo'];
      $fciclo=$_SESSION['fciclo'];

      if($fgrupo!=""){
      $fgrupo="and id_grupo='$fgrupo'";
      }
      if($fdocente!=""){
      $fdocente="and id_docente='$fdocente'";
      }
      if($fciclo!=""){
      $fciclo="and id_ciclo='$fciclo'";
      }
      $_SESSION['fgrupo']=null;
      $_SESSION['fdocente']=null;
      $_SESSION['fciclo']=null;
      $_SESSION['filtro']=null;
      }
      $sql="SELECT * FROM materias_asignacion WHERE id_materia_asignacion<>0 and id_materia<>0 and id_docente<>0 ".$fgrupo." ".$fdocente." ".$fciclo." ORDER BY id_materia_asignacion DESC LIMIT 300";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $id_materia_asignacion=$row['id_materia_asignacion'];
        $id_grupo=$row['id_grupo'];
        $id_ciclo=$row['id_ciclo'];
        $id_materia=$row['id_materia'];
        $id_docente=$row['id_docente'];
        
        $sql="SELECT COUNT(id_alumno) as conta FROM alumnos WHERE id_grupo='$id_grupo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $alumnos=$row['conta'];
       }

      $sql="SELECT * FROM materia WHERE id_materia='$id_materia'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $materia=$row["clave"]." - ".$row["nombre"];
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
        $id_plan=$row["id_plan"];
        $clave_ciclo=$row["clave"];
        $fecha="Del ".date("d-m-Y",strtotime($row["fecha_inicio"]))." al ".date("d-m-Y",strtotime($row["fecha_fin"]));
                $nombre_ciclo=$row["nombre"]." (".$fecha.")";
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

         $sql="SELECT * FROM carrera where id_carrera='$id_carrera'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $clave_carrera=$row["clave"];
         $nombre_carrera=$row["nombre"];
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

         $pdf='<form action="pdf/lasistencia.php" method="post" enctype="multipart/form-data" target="_blank">
         <button type="submit" class="btn btn-rounded btn-danger btn-sm"><i class="fa fa-file-pdf"></i> PDF</button>
         <input value="'.$id_materia_asignacion.'" name="id" style="display:none;">
         </form>';
      ?>
      <tr>
        <td><center><? echo $pdf; ?></center></td>
        <td><? echo $docente; ?></td>
        <td><? echo $materia; ?></td>
        <td><? echo $alumnos; ?></td>
        <td><? echo $grupo; ?></td>
        <td><? echo $nombre_curso; ?></td>
        <td><? echo $per; ?></td>
        <td><? echo $clave_ciclo." - ".$nombre_ciclo; ?></td>
        </tr>
      <? 
      $docente="";
         $materia="";
         $grupo="";
         $nombre_curso="";
         $per="";
         $clave_ciclo="";
         $nombre_ciclo="";
      }
     ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Generar reporte</th>
        <th>Docente</th>
        <th>Materia</th>
        <th>Alumnos</th>
        <th>Grupo</th>
        <th>Módulo</th>
        <th>Período de evaluación</th>
        <th>Ciclo</th>
      </tr>
    </tfoot>
  </table>
</div>