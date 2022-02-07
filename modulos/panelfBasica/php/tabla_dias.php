<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <br>
  <script>
    $(document).ready(function() {
      tabla("Listado de dias");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
      <th class="noExport">Editar</th>
        <th>Día</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM dias";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_dia=$row["id_dia"];
         $dia=$row["dia"];
         $estatus=$row["estatus"];

      $editar='<button id="btn_dias" type="button" class="btn btn-dark btn-block btn-sm" data-toggle="modal" data-target="#mod_dias" data-whatever="@mdo"
            btn-id_dia="'.$id_dia.'"
            btn-dia="'.$dia.'"
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
        <td><? echo $dia; ?></td>
        <td><? echo $estatus_t; ?></td>
      </tr>
      <? 
      }
     ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Editar</th>
        <th>Día</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>