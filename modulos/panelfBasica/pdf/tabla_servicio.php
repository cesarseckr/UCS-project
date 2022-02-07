  <div id="fdesc">
  <small><b>Ningún filtro aplicado</b> realiza una busqueda para encontrar más datos - Mostrando últimos <b>500</b> registros (<b>Filtros aplicables:</b> Rango de fechas)</small>
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
        <th>Matricula</th>
        <th>Alumno</th>
        <th>Fecha de inicio</th>
        <th>Fecha de fin</th>
        <th>Duración</th>
        <th>Actividades</th>
        </tr>
    </thead>
    <tbody>
      <? 
      if(isset($_SESSION['filtro'])){
      $ffecha_ini=$_SESSION['ffecha_ini'];
      $ffecha_fin=$_SESSION['ffecha_fin'];

      if($ffecha_ini!="" and $ffecha_fin==""){
      $ffecha="and fecha_in='$ffecha_ini' OR fecha_fin='$ffecha_ini'";
      }
      else if($ffecha_fin!="" and $ffecha_ini==""){
      $ffecha="and fecha_in='$ffecha_fin' OR fecha_fin='$ffecha_fin'";
      }
      else if($ffecha_fin!="" and $ffecha_ini!=""){
      $ffecha="and fecha_in BETWEEN '$ffecha_ini' AND '$ffecha_fin' OR fecha_fin BETWEEN '$ffecha_ini' AND '$ffecha_fin'";
      }
      $_SESSION['ffecha_ini']=null;
      $_SESSION['ffecha_fin']=null;
      }
      $sql="SELECT * FROM servicio_social where id_servicio_social<>0 ".$ffecha;
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
          $id_dato=$row['id_alumno'];
         $fecha_inicio=date("d-m-Y h:iA", strtotime($row["fecha_in"]));
         $fecha_fin=date("d-m-Y h:iA", strtotime($row["fecha_fin"]));
         $duracion=$row['duracion'];
         $detalles=$row['detalles'];
      
          $sql="SELECT * FROM alumnos WHERE id_alumno='$id_dato'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_alumno=$row["id_alumno"];
         $matricula=$row["matricula"];
         $nombre=$row["apaterno"]." ".$row["amaterno"]." ".$row["nombres"];
       }
        
      ?>
      <tr>
        <td><? echo $matricula; ?></td>
        <td><? echo $nombre; ?></td>
        <td><? echo $fecha_inicio; ?></td>
        <td><? echo $fecha_fin; ?></td>
        <td><? echo $duracion; ?> Horas</td>
        <td><? echo $detalles; ?></td>
        </tr>
      <? 
      $especificaciones="";
      }
     ?>
    </tbody>
    <tfoot>
      <tr>
        <th>Matricula</th>
        <th>Alumno</th>
        <th>Fecha de inicio</th>
        <th>Fecha de fin</th>
        <th>Duración</th>
        <th>Actividades</th>
      </tr>
    </tfoot>
  </table>
</div>