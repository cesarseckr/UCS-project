<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <br>
  <script>
    $(document).ready(function() {
      tabla("Listado de edificios");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Editar</th>
        <th>Nombre</th>
        <th>Sede</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM edificios";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_edificio=$row["id_edificio"];
         $nombre=$row["nombre"];
         $id_sede=$row["sede"];
         $estatus=$row["estatus"];

         $sql="SELECT * FROM sedes where id_sede='$id_sede'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowe) {
        $sede_t=$rowe["siglas"]." - ".$rowe["nombre"];
      }
      
      $editar='<button id="btn_edificios" type="button" class="btn btn-dark btn-block btn-sm" data-toggle="modal" data-target="#mod_edificios" data-whatever="@mdo"
            btn-id_edificio="'.$id_edificio.'"
            btn-id_sede="'.$id_sede.'"
            btn-nombre="'.$nombre.'"
            btn-estatus="'.$estatus.'"
         ><i class="fa fa-edit"></i> Editar</button>';

      if($estatus==1){ 
      $estatus_t="<center><span class='btn btn-success btn-sm'>Activado</span></center>";
    } else{
      $estatus_t="<center><span class='btn btn-danger btn-sm'>Desactivado</span></center>";
    }
      ?>
      <tr>
        <td><center><? echo $editar; ?></center></td>
        <td><? echo $nombre; ?></td>
        <td><? echo $sede_t; ?></td>
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
        <th>Sede</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>