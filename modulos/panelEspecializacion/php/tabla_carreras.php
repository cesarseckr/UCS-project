<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <br>
  <script>
    $(document).ready(function() {
      tabla("Listado de carreras");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Editar</th>
        <th>Clave</th>
        <th>Nombre</th>
        <th>Modalidad</th>
        <th>Tipo</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM carrera ORDER BY id_carrera DESC";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_carrera=$row["id_carrera"];
         $clave=$row["clave"];
         $nombre=$row["nombre"];
         $tipo=$row["tipo"];
         $estatus=$row["estatus"];
         $id_academia=$row["id_academia"];
         $id_tipo=$row["tipo"];
        
        $sql="SELECT * FROM academia WHERE id_academia='$id_academia' ORDER BY id_academia DESC";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_academia=$row["id_academia"];
         $nombre_academia=$row["nombre"];
       }

       $sql="SELECT * FROM tipo_area WHERE id_tipo_area='$id_tipo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $nombre_tipo=$row["nombre"];
       }

      $editar='<button id="btn_carreras" type="button" class="btn btn-dark btn-block btn-sm" data-toggle="modal" data-target="#mod_carreras" data-whatever="@mdo"
            btn-id_carrera="'.$id_carrera.'"
            btn-clave="'.$clave.'"
            btn-id_academia="'.$id_academia.'"
            btn-nombre="'.$nombre.'"
            btn-id_tipo="'.$id_tipo.'"
            btn-estatus="'.$estatus.'"
         ><i class="fa fa-edit"></i> Editar</button>';

      if($estatus==1){ 
      $estatus_t="<center><span class='btn btn-success btn-sm'>Activo</span></center>";
    } else{
      $estatus_t="<center><span class='btn btn-danger btn-sm'>Desactivado</span></center>";
    }
      ?>
      <tr>
        <td><center><? echo $editar; ?></center></td>
        <td><? echo $clave; ?></td>
        <td><? echo $nombre; ?></td>
        <td><? echo $nombre_academia; ?></td>
        <td><? echo $nombre_tipo; ?></td>
        <td><? echo $estatus_t; ?></td>
      </tr>
      <? 
      }
     ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Editar</th>
        <th>Clave</th>
        <th>Nombre</th>
        <th>Modalidad</th>
        <th>Tipo</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>