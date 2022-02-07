<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <br>
  <script>
    $(document).ready(function() {
      tabla("Listado de equivalencias");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Editar</th>
        <th>Nombre</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM equivalencia ORDER BY id_equivalencia DESC";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_equivalencia=$row["id_equivalencia"];
         $nombre=$row["nombre"];
         $estatus=$row["estatus"];
            
      $editar='<button id="btn_equivalencias" type="button" class="btn btn-dark btn-block btn-sm" data-toggle="modal" data-target="#mod_equivalencias" data-whatever="@mdo"
            btn-id_equivalencia="'.$id_equivalencia.'"
            btn-nombre="'.$nombre.'"
            btn-estatus="'.$estatus.'"
         ><i class="fa fa-edit"></i> Editar</button>';

         $materias='<button id="btn_materias" type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#materias" data-whatever="@mdo"
            btn-id_equivalencia="'.$id_equivalencia.'"
            btn-nombre="'.$nombre.'"
         ><i class="fa fa-list"></i> Materias</button>';

      if($estatus==1){ 
      $estatus_t="<center><span class='btn btn-success btn-sm'>Activo</span></center>";
    } else{
      $estatus_t="<center><span class='btn btn-danger btn-sm'>Desactivado</span></center>";
    }
      ?>
      <tr>
        <td><center><? echo $editar; ?></center></td>
        <td><? echo $nombre; ?></td>
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
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>