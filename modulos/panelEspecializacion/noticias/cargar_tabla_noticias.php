<?php 
  include('../../includes/conexion.php');

  $id_categoria = $_POST['id_categoria'];

  if ($id_categoria==1000) {
    $sql="SELECT * FROM blog_articulo where estatus=1";
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
            <img class='img-thumbnail' src='../../archivos/".$imagen."'>
          </td>
          <td>
            <h4>".$titulo."</h4>
            <p>".$descripcion."</p>
            <a href='contenido_articulo.php?id_articulo=".$id_articulo."' class='btn btn-dark'>Leer Artículo...</a>
          </td>
        </tr>
      ";
    }
  }else{
    $sql="SELECT * FROM blog_articulo where id_categoria = '$id_categoria' and estatus=1";
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
            <img class='img-thumbnail' src='../../archivos/".$imagen."'>
          </td>
          <td>
            <h4>".$titulo."</h4>
            <p>".$descripcion."</p>
            <a href='contenido_articulo.php?id_articulo=".$id_articulo."' class='btn btn-dark'>Leer Artículo...</a>
          </td>
        </tr>
      ";
    }
  }
  
?>