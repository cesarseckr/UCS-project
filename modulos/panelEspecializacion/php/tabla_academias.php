<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <br>
  <script>
    $(document).ready(function() {
      tabla("Listado de Modalidades");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Editar</th>
        <th>Nombre</th>
        <th>Plan de estudios</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM academia ORDER BY id_academia DESC";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_academia=$row["id_academia"];
         $nombre=$row["nombre"];
         $id_plan=$row["id_plan"];
         $estatus=$row["estatus"];
         
         $sql="SELECT * FROM planes WHERE id_plan='$id_plan'";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $nombre_plan=$row["nombre"];
        $clave_plan=$row["clave"];
         $id_plan=$row["id_plan"];
      }

      $editar='<button id="btn_academias" type="button" class="btn btn-dark btn-block btn-sm" data-toggle="modal" data-target="#mod_academias" data-whatever="@mdo"
            btn-id_academia="'.$id_academia.'"
            btn-nombre="'.$nombre.'"
            btn-id_plan="'.$id_plan.'"
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
        <td><? echo $clave_plan." - ".$nombre_plan; ?></td>
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
        <th>Plan de estudios</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>