<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de consultas");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Ver</th>
        <th>Nombre</th>
        <th>Referido</th>
        <th>Fecha</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM traslado";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
          $id_traslado=$row["id_traslado"];
          $id_referido=$row["id_referido"];
          $razon=$row["razon"];
          $fecha=$row["fecha"];
          $id_datos=$row["id_datos"];
          $tipo=$row["tipo"];
          $ver='<a class="btn btn-secondary"
           id="ver_archivos" 
           iid_consulta="'.$id_traslado.'
            href="" target="_blank"><i class="fas fa-eye"></i></a>';

          $sql_referido="SELECT * FROM referido_medica WHERE id_referido='$id_referido'";
          $sq_referido= $db->query($sql_referido);
          $rows_referido=$sq_referido->fetchAll();
          foreach ($rows_referido as $row_referido) {
            $nombre_referido=$row_referido["nombre"];
          }

          if($tipo==1){
            $sql_nombre="SELECT * FROM alumnos WHERE id_alumno = '$id_datos'";
          }else if($tipo==2){
            $sql_nombre="SELECT * FROM docentes WHERE id_docente = '$id_datos'";
          }else if($tipo==3){
            $sql_nombre="SELECT * FROM administrativos WHERE id_administrativo = '$id_datos'";
          }
          $sq_nombre= $db->query($sql_nombre);
          $rows_nombre=$sq_nombre->fetchAll();
          foreach ($rows_nombre as $row_nombre) {
            $nombre=$row_nombre["apaterno"]." ".$row_nombre["amaterno"] ." ".$row_nombre["nombres"];
          }
            echo "
              <tr>
              <td><center>".$ver."</center></td>
              <td>".$nombre."</td>
              <td>".$nombre_referido."</td>
              <td>".$fecha."</td>
              </tr>
            ";
        } 
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Ver</th>
        <th>Nombre</th>
        <th>Referido</th>
        <th>Fecha</th>
      </tr>
    </tfoot>
  </table>
</div>  
