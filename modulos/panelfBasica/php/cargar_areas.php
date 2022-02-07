<?php 
  include('../../includes/conexion.php');

  $sql="SELECT * FROM areas";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll(); 
  echo '<option value="">Seleccione Area Administrativa</option>';
  foreach ($rows as $row) {
    $id_area=utf8_encode($row['id_area']);
    $area=utf8_encode($row['area']);           
    echo "<option value='".$id_area."' 
            area='".$area."
            '>".$area."
          </option>";
  }
?>