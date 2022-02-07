<?php 
  include('../../includes/conexion.php');
  $sql="SELECT * FROM tipos";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll(); 
  echo '<option value="">Seleccione tipo de Usuario</option>';
  foreach ($rows as $row) {
    $id=$row['id_tipo'];
    $tipo= $row['tipo'];
    if ($id!=99) {
      echo "<option value='".$id."' tipo='".$tipo."'>".$tipo."</option>";
    }          
   
  }
?>