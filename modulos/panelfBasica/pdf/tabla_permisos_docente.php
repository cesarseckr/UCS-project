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
        <th>Alumno</th>
        <th>Fecha de inicio</th>
        <th>Fecha de fin</th>
        <th>Causas</th>
        <th>Especificaciones</th>
        </tr>
    </thead>
    <tbody>
      <? 
      if(isset($_SESSION['filtro'])){
      $ffecha_ini=$_SESSION['ffecha_ini'];
      $ffecha_fin=$_SESSION['ffecha_fin'];

      if($ffecha_ini!="" and $ffecha_fin==""){
      $ffecha="and fecha_inicio='$ffecha_ini' OR fecha_fin='$ffecha_ini'";
      }
      else if($ffecha_fin!="" and $ffecha_ini==""){
      $ffecha="and fecha_inicio='$ffecha_fin' OR fecha_fin='$ffecha_fin'";
      }
      else if($ffecha_fin!="" and $ffecha_ini!=""){
      $ffecha="and fecha_inicio BETWEEN '$ffecha_ini' AND '$ffecha_fin' OR fecha_fin BETWEEN '$ffecha_ini' AND '$ffecha_fin'";
      }
      $_SESSION['ffecha_ini']=null;
      $_SESSION['ffecha_fin']=null;
      }
          $sql="SELECT * FROM permisos where id_permiso<>0 ".$ffecha." and tipo=2";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
          $id_dato=$row['id_datos'];
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
      
          $sql="SELECT * FROM docentes WHERE id_docente='$id_dato'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
                 $id_alumno=$row["id_alumno"];
         $nombre=$row["apaterno"]." ".$row["amaterno"]." ".$row["nombres"];
       }
        
      ?>
      <tr>
        <td><? echo $nombre; ?></td>
        <td><? echo $fecha_inicio; ?></td>
        <td><? echo $fecha_fin; ?></td>
        <td><? echo $causas; ?></td>
        <td><? echo $especificacion; ?></td>
        </tr>
      <? 
      $especificaciones="";
      }
     ?>
    </tbody>
    <tfoot>
      <tr>
        <th>Alumno</th>
        <th>Fecha de inicio</th>
        <th>Fecha de fin</th>
        <th>Causas</th>
        <th>Especificaciones</th>
      </tr>
    </tfoot>
  </table>
</div>