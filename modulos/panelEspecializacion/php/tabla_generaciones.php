<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <br>
  <script>
    $(document).ready(function() {
      tabla("Listado de generaciones");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Editar</th>
        <th>Nombre</th>
        <th>Modalidad</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM generacion ORDER BY id_generacion DESC";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_generacion=$row["id_generacion"];
         $id_academia=$row["id_academia"];
         $nombre=$row["nombre"];
         $estatus=$row["estatus"];

          $sql="SELECT * FROM academia WHERE id_academia='$id_academia' ORDER BY id_academia DESC";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_academia=$row["id_academia"];
         $nombre_academia=$row["nombre"];
       }
      
      $editar='<button id="btn_generaciones" type="button" class="btn btn-dark btn-block btn-sm" data-toggle="modal" data-target="#mod_generaciones" data-whatever="@mdo"
            btn-id_generacion="'.$id_generacion.'"
            btn-id_academia="'.$id_academia.'"
            btn-nombre="'.$nombre.'"
            btn-estatus="'.$estatus.'"
         ><i class="fa fa-edit"></i> Editar</button>';

      if($estatus==1){ 
      $estatus_t="<center><span class='btn btn-success btn-sm'>Activa</span></center>";
    } else{
      $estatus_t="<center><span class='btn btn-danger btn-sm'>Desactivada</span></center>";
    }
      ?>
      <tr>
        <td><center><? echo $editar; ?></center></td>
        <td><? echo $nombre; ?></td>
        <td><? echo $nombre_academia; ?></td>
        <td><? echo $estatus_t; ?></td>
      </tr>
      <? 
      }
     ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Editar</th>
        <th>Nombre</th>
        <th>Modalidad</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>