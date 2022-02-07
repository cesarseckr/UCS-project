
<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de Tickets");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Categorias</th>
        <th class="noExport">Editar</th>
        <th class="noExport">Borrar</th>
      </tr>
    </thead>
    <tbody>
      <? 
        session_start();

        $id_usuario=$_SESSION["id_usuario"];
        $sql="SELECT * FROM blog_categorias";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_categoria=$row["id_categoria"];
         $categoria=$row["categoria"];

          $del_categoria='<button class="btn btn-danger btn-icons"
           id="del_categoria" 
           id_categoria="'.$id_categoria.'"
           categoria="'.$categoria.'"><i class="fas fa-minus-circle"></i></button>';

          $mod_categoria='<button class="btn btn-success btn-icons"
           id="mod_categoria" 
           id_categoria="'.$id_categoria.'"
           categoria="'.$categoria.'"
           data-toggle="modal"
           data-target="#modal_mod_categoria"
           data-whatever="@mdo"><i class="fas fa-edit"></i></button>';

         echo "
                <tr>
                <td>".$categoria."</td>
                <td><center>".$del_categoria."</center></td>
                <td><center>".$mod_categoria."</center></td>
                </tr>
              ";
        } 
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th>Categorias</th>
        <th class="noExport">Editar</th>
        <th class="noExport">Borrar</th>
      </tr>
    </tfoot>
  </table>
</div>  
