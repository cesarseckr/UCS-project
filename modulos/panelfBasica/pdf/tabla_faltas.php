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
        <th>Falta</th>
        <th>No. de reincidencias</th>
        <th>Sanciones</th>
        <th>Fecha</th>
        <th>Observaciones</th>
        </tr>
    </thead>
    <tbody>
      <? 
      if(isset($_SESSION['filtro'])){
      $ffecha_ini=$_SESSION['ffecha_ini'];
      $ffecha_fin=$_SESSION['ffecha_fin'];

      if($ffecha_ini!="" and $ffecha_fin==""){
      $ffecha="and fecha='$ffecha_ini'";
      }
      else if($ffecha_fin!="" and $ffecha_ini==""){
      $ffecha="and fecha='$ffecha_fin'";
      }
      else if($ffecha_fin!="" and $ffecha_ini!=""){
      $ffecha="and fecha BETWEEN '$ffecha_ini' AND '$ffecha_fin'";
      }
      $_SESSION['ffecha_ini']=null;
      $_SESSION['ffecha_fin']=null;
      }
      $sql="SELECT * FROM historial_disciplinario WHERE id_hist_disc<>0 ".$ffecha." ORDER BY fecha DESC LIMIT 500";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_falta=$row["id_falta"];
         $id_alumno=$row["id_alumno"];
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

          $sql="SELECT * FROM alumnos WHERE id_alumno='$id_alumno'";
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
        <td><? echo $faltas; ?></td>
        <td><? echo $reincidencias; ?></td>
        <td><? echo $sanciones; ?></td>
        <td><? echo $fecha; ?></td>
        <td><? echo $observaciones; ?></td>
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
        <th>Falta</th>
        <th>No. de reincidencias</th>
        <th>Sanciones</th>
        <th>Fecha</th>
        <th>Observaciones</th>
      </tr>
    </tfoot>
  </table>
</div>