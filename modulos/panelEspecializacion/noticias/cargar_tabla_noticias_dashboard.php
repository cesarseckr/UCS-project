<table class="table" width="100%">
    <tbody>
<?php 
    $sql="SELECT * FROM blog_articulo where estatus=1 LIMIT 5";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    foreach ($rows as $row) {
      $id_articulo=$row['id_articulo'];
      $titulo=$row['titulo'];
      $descripcion=$row['descripcion'];
      $contenido=$row['contenido'];
      $imagen=$row['imagen'];
      $fecha_hora=$row['fecha_hora'];
      $estatus=$row['estatus'];
      $id_categoria=$row['id_categoria'];

      echo "
        <tr>
          <td style='width: 200px;'>
            <img class='img-thumbnail' src='../../archivos/".$imagen."'><br><br>
          </td>
          <td>
            <h4>".$titulo."</h4>
            <p>".$descripcion."</p>
            <a href='contenido_articulo.php?id_articulo=".$id_articulo."' class='btn btn-dark'>Leer artículo...</a>
          </td>
        </tr>
      ";
    }  
?>
</table>