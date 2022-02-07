
<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de Tickets");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Titulo</th>
        <th>Categoría</th>
        <th>Estatus</th>
        <th>Fecha y Hora</th>
        <th class="noExport"></th>
      </tr>
    </thead>
    <tbody>
      <? 
        session_start();

        $id_usuario=$_SESSION["id_usuario"];
        $sql="SELECT * FROM blog_articulo";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_articulo=$row["id_articulo"];
         $titulo=$row["titulo"];
         $descripcion=$row["descripcion"];
         $contenido=$row["contenido"];
         $imagen=$row["imagen"];
         $fecha_hora=$row["fecha_hora"];
         $estatus=$row["estatus"];
         $id_categoria=$row["id_categoria"];

          $mod_articulo='<button class="btn btn-success"
           id="mod_articulo" 
           id_articulo="'.$id_articulo.'"
           titulo="'.$titulo.'"
           descripcion="'.$descripcion.'"
           contenido="'.$contenido.'"
           imagen="'.$imagen.'"
           fecha_hora="'.$fecha_hora.'"
           estatus="'.$estatus.'"
           id_categoria="'.$id_categoria.'"
           data-toggle="modal"
           data-target="#modal_mod_articulo"
           data-whatever="@mdo"><i class="fas fa-pen-square"></i></button>'; 

           $sql_categoria="SELECT * FROM blog_categorias WHERE id_categoria = '$id_categoria' ";
           $sq_categoria= $db->query($sql_categoria);
           $rows_categoria=$sq_categoria->fetchAll();
           foreach ($rows_categoria as $row_categoria) {
              $categoria=utf8_encode($row_categoria["categoria"]);
           }

           if($estatus==1){
              $estatus='<span class="btn btn-primary btn-xs">Activo</span>';
           }else if($estatus==2){
              $estatus='<span class="btn btn-danger btn-xs">Inactivo</span>';
           }


         echo "
                <tr>
                <td>".$titulo."</td>
                <td>".$categoria."</td>
                <td>".$estatus."</td>
                <td>".$fecha_hora."</td>
                <td><center>".$mod_articulo."</center></td>
                </tr>
              ";
        } 
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th>Titulo</th>
        <th>Categoría</th>
        <th>Estatus</th>
        <th>Fecha y Hora</th>
        <th class="noExport"></th>
      </tr>
    </tfoot>
  </table>
</div>  
