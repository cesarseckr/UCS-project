<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <br>
  <script>
    $(document).ready(function() {
      tabla("Listado de módulos");
    });
  </script>
  <table id="tabla-1" class="table table-bordered">
    <thead>
      <tr>
        <th class="noExport">Editar</th>
        <th>Nombre</th>
        <th>Carrera</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM curso ORDER BY id_curso DESC";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_curso=$row["id_curso"];
         $nombre=$row["nombre"];
         $estatus=$row["estatus"];
         $id_carrera=$row["id_carrera"];
        
        $sql="SELECT * FROM carrera WHERE id_carrera='$id_carrera'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_carrera=$row["id_carrera"];
         $nombre_carrera=$row["nombre"];
         $clave_carrera=$row["clave"];
       }

      $editar='<button id="btn_cursos" type="button" class="btn btn-dark btn-block btn-sm" data-toggle="modal" data-target="#mod_cursos" data-whatever="@mdo"
            btn-id_curso="'.$id_curso.'"
            btn-id_carrera="'.$id_carrera.'"
            btn-nombre="'.$nombre.'"
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
        <td><? echo $nombre; ?></td>
        <td><? echo $clave_carrera." - ".$nombre_carrera; ?></td>
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
        <th>Carrera</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>