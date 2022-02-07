<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <br>
  <script>
    $(document).ready(function() {
      tabla("Listado de horas");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
      <th class="noExport">Editar</th>
        <th>Hora de inicio</th>
        <th>Hora de fin</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM horas";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_hora=$row["id_hora"];
         $hora_in=$row["hora_in"];
         $hora_fin=$row["hora_fin"];
         $estatus=$row["estatus"];

         $hora_in_t=date("h:i A",strtotime($row["hora_in"]));
         $hora_fin_t=date("h:i A",strtotime($row["hora_fin"]));

      $editar='<button id="btn_horas" type="button" class="btn btn-dark btn-block btn-sm" data-toggle="modal" data-target="#mod_horas" data-whatever="@mdo"
            btn-id_hora="'.$id_hora.'"
            btn-hora_in="'.$hora_in.'"
            btn-hora_fin="'.$hora_fin.'"
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
        <td><? echo $hora_in_t; ?></td>
        <td><? echo $hora_fin_t; ?></td>
        <td><? echo $estatus_t; ?></td>
      </tr>
      <? 
      }
     ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Editar</th>
        <th>Hora de inicio</th>
        <th>Hora de fin</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>