<?php 
  include('../includes/conexion.php');
  $sql="SELECT * FROM grupo";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll(); 
  echo '<option value="">Seleccione un grupo</option>';
  foreach ($rows as $row) {
    $id=$row['id_grupo'];
    $nombre= $row['nombre'];          
    echo "<option value='".$id."'>".$nombre."</option>";
  }
?>