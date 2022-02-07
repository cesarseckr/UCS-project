<?php 
  include('../includes/conexion.php');
  $sql="SELECT * FROM estatus_alumnos";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll(); 
  echo '<option value="">Seleccione un estatus</option>';
  foreach ($rows as $row) {
    $id=$row['id_estatus_alumno'];
    $nombre= $row['nombre'];          
    echo "<option value='".$id."'>".$nombre."</option>";
  }
?>