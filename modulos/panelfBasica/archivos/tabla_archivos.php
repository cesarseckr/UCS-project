<div id="tabla-archivos_usr" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de Tickets");
    });
  </script>
  <table id="tabla-1" class="table table-bordered">
    <thead>
      <tr>
        <th>Ver</th>
        <th>Titulo</th>
        <th>Tipo</th>
        <th>Fecha</th>
        <th>Área</th>
      </tr>
    </thead>
    <tbody>
      <? 
        session_start();

        $id_area=$_SESSION["id_area"];
        $id_tipo=$_SESSION["tipo"];
        if($id_tipo==3){ 
        $sql="SELECT * FROM archivos INNER JOIN destinos WHERE archivos.id_archivo= destinos.id_archivo_destino and destinos.id_tipo='$id_tipo' and destinos.id_area_destino='$id_area'";
        }
        else if($id_tipo==2 or $id_tipo==1){
          $sql="SELECT * FROM archivos INNER JOIN destinos WHERE archivos.id_archivo= destinos.id_archivo_destino and destinos.id_tipo='$id_tipo'";
        }
        else{
          $sql="SELECT * FROM archivos INNER JOIN destinos WHERE archivos.id_archivo= destinos.id_archivo_destino and destinos.id_area_destino='$id_area'";
        }
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_archivo=$row["id_archivo"];
         $titulo=$row["titulo"];
         $ruta=$row["ruta"];
         $tipo_a=$row["tipo"];
         $fecha_format=$row["fecha"];
         $fecha=date("d/m/Y h:iA",strtotime($fecha_format));
         $id_area=$row["id_area"];

         $sql_area="SELECT * FROM areas WHERE id_area='$id_area'";
         $sq_area= $db->query($sql_area);
         $rows_area=$sq_area->fetchAll();
         foreach ($rows_area as $row_area) {
            $area=$row_area["area"];
          }

          $ver_archivos='<a class="btn btn-dark"
           id="ver_archivos" 
           id_archivo="'.$id_archivo.'"
            href="../../archivos/'.$ruta.'" target="_blank"><i class="fas fa-eye"></i> Ver archivo</a>';
             if($tipo_a==1){
            $tipo_t="Reglamentación";
           }
           else if($tipo_a==2){
            $tipo_t="Circulares";
           }
           else if($tipo_a==4){
            $tipo_t="Políticas y formatos";
           }
           else{
            $tipo_t="Otros";
           }

         echo "<tr>
                <td><center>".$ver_archivos."</center></td>
                <td>".$titulo."</td>
                <td>".$tipo_t."</td>
                <td>".$fecha."</td>
                <td>".$area."</td>
                </tr>";
        } 
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th>Ver</th>
        <th>Titulo</th>
        <th>Tipo</th>
        <th>Fecha</th>
        <th>Área</th>
      </tr>
    </tfoot>
  </table>
</div>  