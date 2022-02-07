<?php 
  include('../../includes/conexion.php');
  $tipo = $_POST['tipo'];
  $id_datos = $_POST['id_datos'];
  $sql="SELECT * FROM control_ta where id_datos='$id_datos' and tipo='$tipo'";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll(); 
  foreach ($rows as $row) {
    $id_control_ta=$row["id_control_ta"];
    echo $id_control_ta;
  }
?>