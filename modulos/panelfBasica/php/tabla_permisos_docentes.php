<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de alumnos");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Permisos</th>
        <th>Nombre</th>
        <th>Curp</th>
        <th>Teléfono</th>
        <th>E-mail</th>
        <th>Tipo</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM docentes ORDER BY id_docente DESC";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_docente=$row["id_docente"];
         $nombre=$row["apaterno"]." ".$row["amaterno"]." ".$row["nombres"];
         $sexo=$row["sexo"];
         $fechanac=date("Y-m-d",strtotime($row["fechanac"]));
         $fechaing=date("Y-m-d",strtotime($row["fechaing"]));
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
         $rfc=$row["rfc"];
         $cedula=$row["cedula"];
         $academia=$row["academica"];
         $apaterno=$row["apaterno"];
         $amaterno=$row["amaterno"];
         $nombres=$row["nombres"];
         $sexo=$row["sexo"];
         $curp=$row["curp"];
         $estatus=$row["estatus"];
         $id_tipo_area=$row["tipo"];
         $observaciones=$row["observaciones"];

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

      $sql="SELECT * FROM tipo_area where id_tipo_area='$id_tipo_area'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowm) {
        $tipo_area_t=strtoupper($rowm["nombre"]);
      }
          $historial_permisos='<button class="btn btn-dark"
            id="historial_permisos" 
            tipo_datos="2"
            id_datos="'.$id_docente.'"
            nombre="'.$nombre.'"
            curp="'.$curp.'"
            data-toggle="modal"
            data-target="#modal_historial_permisos"
            data-whatever="@mdo"> <i class="fa fa-calendar-check"></i>Permisos</button>';

          echo "<tr>
            <td><center>".$historial_permisos."</center></td>
            <td>".$nombre."</td>
            <td>".$curp."</td>
            <td>".$telefono."</td>
            <td>".$email."</td>
            <td>".$tipo_area_t."</td>
            </tr>";
        } 
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Permisos</th>
        <th>Nombre</th>
        <th>Curp</th>
        <th>Teléfono</th>
        <th>E-mail</th>
        <th>Tipo</th>
      </tr>
    </tfoot>
  </table>
</div>  
