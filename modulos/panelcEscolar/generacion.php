<?php 
  include('../includes/conexion.php');
  $sql="SELECT * FROM generacion";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll(); 
  echo '<option value="">Seleccione una generacion</option>';
  foreach ($rows as $row) {
    $id=$row['id_generacion'];
    $nombre= $row['nombre'];          
    echo "<option value='".$id."'>".$nombre."</option>";
  }
?>