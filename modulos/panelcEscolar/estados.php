<?php 
  include('../includes/conexion.php');
  $sql="SELECT * FROM estados";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll(); 
  echo '<option value="">Seleccione un estado</option>';
  foreach ($rows as $row) {
    $id=$row['id_estado'];
    $estado= $row['estado'];          
    echo "<option value='".$id."' estado='".$estado."'>".$estado."</option>";
  }
  
?>