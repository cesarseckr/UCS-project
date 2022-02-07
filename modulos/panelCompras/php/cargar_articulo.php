<?php 
  include('../../includes/conexion.php');

  $sql="SELECT * FROM blog_categorias";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll(); 
  echo '<option value="">Seleccione Categoria</option>';
  foreach ($rows as $row) {
    $id_categoria=utf8_encode($row['id_categoria']);
    $categoria=utf8_encode($row['categoria']);           
    echo "<option value='".$id_categoria."' 
            categoria='".$categoria."
            '>".$categoria."
          </option>";
  }
?>