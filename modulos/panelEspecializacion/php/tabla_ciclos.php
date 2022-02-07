<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <br>
  <script>
    $(document).ready(function() {
      tabla("Listado de ciclos");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Editar</th>
        <th>Clave</th>
        <th>Nombre</th>
        <th>Plan de estudios</th>
        <th>Fecha de inicio</th>
        <th>Fecha de fin</th>
        <th>Duración</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM ciclo ORDER BY id_ciclo DESC";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_ciclo=$row["id_ciclo"];
         $id_plan=$row["id_plan"];
         $clave=$row["clave"];
         $nombre=$row["nombre"];
         $fecha_inicio=date("Y-m-d", strtotime($row["fecha_inicio"]));
         $fecha_fin=date("Y-m-d", strtotime($row["fecha_fin"]));
         $estatus=$row["estatus"];

    $fecha_inicio_f=date("d/m/Y", strtotime($row["fecha_inicio"]));
    $fecha_fin_f=date("d/m/Y", strtotime($row["fecha_fin"]));
    
    $fecha1 = new DateTime($fecha_fin);
    $fecha2 = new DateTime($fecha_inicio);
    $fecha = $fecha1->diff($fecha2);
    $duracion = $fecha->days;
        
         $sql="SELECT * FROM planes WHERE id_plan='$id_plan'";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $nombre_plan=$row["nombre"];
        $clave_plan=$row["clave"];
         $id_plan=$row["id_plan"];
      }

      $editar='<button id="btn_ciclos" type="button" class="btn btn-dark btn-block btn-sm" data-toggle="modal" data-target="#mod_ciclos" data-whatever="@mdo"
            btn-id_ciclo="'.$id_ciclo.'"
            btn-clave="'.$clave.'"
            btn-nombre="'.$nombre.'"
            btn-id_plan="'.$id_plan.'"
            btn-estatus="'.$estatus.'"
            btn-fecha_inicio="'.$fecha_inicio.'"
            btn-fecha_fin="'.$fecha_fin.'"
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
        <td><? echo $clave_plan." - ".$nombre_plan; ?></td>
        <td><? echo $fecha_inicio_f; ?></td>
        <td><? echo $fecha_fin_f; ?></td>
        <td><? echo $duracion; ?> días</td>
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
        <th>Plan de estudios</th>
        <th>Fecha de inicio</th>
        <th>Fecha de fin</th>
        <th>Duración</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>