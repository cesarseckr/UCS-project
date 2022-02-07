<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <br>
  <script>
    $(document).ready(function() {
      tabla("Listado de planes");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Editar</th>
        <th>Clave</th>
        <th>Nombre</th>
        <th>Calificación mínima</th>
        <th>Asistencia mínima</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM planes ORDER BY id_plan DESC";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_plan=$row["id_plan"];
         $clave=$row["clave"];
         $nombre=$row["nombre"];
         $per_evaluacion=$row["per_evaluacion"];
         $per_extra=$row["per_extra"];
         $per_especial=$row["per_especial"];
		 $calif_minima=$row["calif_minima"];
		 $asistencia_minima=$row["asistencia_minima"];
         $estatus=$row["estado"];
            
      $editar='<button id="btn_planes" type="button" class="btn btn-dark btn-block btn-sm" data-toggle="modal" data-target="#mod_planes" data-whatever="@mdo"
            btn-id_plan="'.$id_plan.'"
            btn-clave="'.$clave.'"
            btn-nombre="'.$nombre.'"
            btn-estatus="'.$estatus.'"
            btn-per_evaluacion="'.$per_evaluacion.'"
            btn-calif_minima="'.$calif_minima.'"
            btn-asistencia_minima="'.$asistencia_minima.'"
            btn-per_extra="'.$per_extra.'"
            btn-per_especial="'.$per_especial.'"
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
        <td><? echo $calif_minima; ?></td>
        <td><? echo $asistencia_minima; ?>%</td>
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
        <th>Calificación mínima</th>
        <th>Asistencia mínima</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>