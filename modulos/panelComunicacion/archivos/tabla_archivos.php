
<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de Tickets");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Ver</th>
        <th>Titulo</th>
        <th>Fecha</th>
        <th>Area</th>
      </tr>
    </thead>
    <tbody>
      <? 
        session_start();

        $id_area=$_SESSION["id_area"];
        $id_tipo=$_SESSION["tipo"];

        $sql="SELECT * FROM archivos INNER JOIN destinos WHERE archivos.id_archivo= destinos.id_archivo_destino and destinos.id_tipo='$id_tipo' and destinos.id_area_destino='$id_area'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_archivo=utf8_encode($row["id_archivo"]);
         $titulo=utf8_encode($row["titulo"]);
         $ruta=utf8_encode($row["ruta"]);
         $fecha_format=utf8_encode($row["fecha"]);
         $fecha=date("d/m/Y h:iA",strtotime($fecha_format));
         $id_area=utf8_encode($row["id_area"]);

         $sql_area="SELECT * FROM areas WHERE id_area='$id_area'";
         $sq_area= $db->query($sql_area);
         $rows_area=$sq_area->fetchAll();
         foreach ($rows_area as $row_area) {
            $area=utf8_encode($row_area["area"]);
          }

          $ver_archivos='<a class="btn btn-secondary"
           id="ver_archivos" 
           id_archivo="'.$id_archivo.'"
            href="../../archivos/'.$ruta.'" target="_blank"><i class="fas fa-eye"></i></a>';


         echo "
                <tr>
                <td><center>".$ver_archivos."</center></td>
                <td>".$titulo."</td>
                <td>".$fecha."</td>
                <td>".$area."</td>
                </tr>
              ";
        } 
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th>Ver</th>
        <th>Titulo</th>
        <th>Fecha</th>
        <th>Area</th>
      </tr>
    </tfoot>
  </table>
</div>  