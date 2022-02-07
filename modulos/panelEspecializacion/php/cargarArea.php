<?php session_start();
  
  include('../../includes/conexion.php');

  $area_con=$_SESSION["area_con"];
  if($area_con==""){ 
echo '<option value="">Seleccione area</option>';
}

  $sql="SELECT * FROM areas";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll();
  foreach ($rows as $row) {
    $id=$row['id_area'];
    $area= $row['area']; 
    if($area_con!=$id){         
    echo "<option value='".$id."'>".$area."</option>";
    }else{
      echo "<option value='".$id."' selected>".$area."</option>";
    }
  }
?>