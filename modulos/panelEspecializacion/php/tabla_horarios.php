<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <br>
  <script>
    $(document).ready(function() {
      tabla("Listado de Horarios");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" >
    <thead>
      <tr>
        <th class="noExport">Editar</th>
        <th class="noExport">Seleccionar</th>
        <th>Grupo</th>
        <th>Generación</th>
        <th>Ciclo</th>
        <th>Aula</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM horarios";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_horario=$row["id_horario"];
         $id_grupo=$row["id_grupo"];
         $id_generacion=$row["id_generacion"];
         $id_aula=$row["id_aula"];

         $sql="SELECT * FROM aulas where id_aula='$id_aula'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowe) {
        $aula_t=$rowe["nombre"];
      }

      $sql="SELECT * FROM grupo where id_grupo='$id_grupo'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowe) {
        $grupo_t=$rowe["nombre"];
        $id_ciclo=$rowe["id_ciclo"];
        $id_carrera=$rowe["id_carrera"];
        $id_curso=$rowe["id_curso"];
      }

      $sql="SELECT * FROM ciclo where id_ciclo='$id_ciclo'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowe) {
        $fecha="Del ".date("d-m-Y",strtotime($rowe["fecha_inicio"]))." al ".date("d-m-Y",strtotime($rowe["fecha_fin"]));
      }
      
      $sql="SELECT * FROM generacion where id_generacion='$id_generacion'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowe) {
        $generacion_t=$rowe["nombre"];
      $id_academia=$rowe["id_academia"];
      }

      $sql="SELECT * FROM academia where id_academia='$id_academia'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowe) {
        $id_plan=$rowe["id_plan"];
      }

      $editar='<button id="btn_horarios" type="button" class="btn btn-dark btn-block btn-sm" data-toggle="modal" data-target="#mod_horarios" data-whatever="@mdo"
            btn-id_horario="'.$id_horario.'"
            btn-id_grupo="'.$id_grupo.'"
            btn-id_id_ciclo="'.$id_ciclo.'"
            btn-id_carrera="'.$id_carrera.'"
            btn-id_curso="'.$id_curso.'"
            btn-id_aula="'.$id_aula.'"
            btn-id_academia="'.$id_academia.'"
            btn-id_plan="'.$id_plan.'"
            btn-id_generacion="'.$id_generacion.'"
         ><i class="fa fa-edit"></i> Editar</button>';

      $seleccionar='<form action="calendario_horarios.php" method="post" enctype="multipart/form-data">
            <input type="text" name="id_horario" value="'.$id_horario.'" style="display:none;">
            <input type="text" name="id_grupo" value="'.$id_grupo.'" style="display:none;">
            <input type="text" name="id_aula" value="'.$id_aula.'" style="display:none;">
            <input type="text" name="id_generacion" value="'.$id_generacion.'" style="display:none;">
         <button type="input" class="btn btn-primary btn-block btn-sm"><i class="fa fa-sign-out-alt"></i> Seleccionar</button></form>';
      ?>
      <tr>
        <td><center><? echo $editar; ?></center></td>
        <td><center><? echo $seleccionar; ?></center></td>
        <td><? echo $grupo_t; ?></td>
        <td><? echo $generacion_t; ?></td>
        <td><? echo $fecha; ?></td>
        <td><? echo $aula_t; ?></td>
      </tr>
      <? 
      }
     ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Editar</th>
        <th class="noExport">Seleccionar</th>
        <th>Grupo</th>
        <th>Generación</th>
        <th>Ciclo</th>
        <th>Aula</th>
      </tr>
    </tfoot>
  </table>
</div>