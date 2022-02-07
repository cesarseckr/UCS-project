<?php session_start();
  include('../../includes/conexion.php');

 $edo_con=$_SESSION['edo_con'];
  if($edo_con==""){ 
echo '<option value="">Seleccione un estado</option>';
}


  $sql="SELECT * FROM estados";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll(); 
  foreach ($rows as $row) {
    $id=$row['id_estado'];
    $estado= $row['estado'];  
    if($edo_con!=$estado){ 
      echo "<option value='".$id."' estado='".$estado."'>".$estado."</option>";
    }
    else { 
    echo "<option value='".$id."' estado='".$estado."' selected>".$estado."</option>";
    }
  }

?>