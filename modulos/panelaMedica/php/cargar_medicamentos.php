<?php session_start();

  include('../../includes/conexion.php');

  $sql="SELECT * FROM medicamentos";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll();
  $i=0;
  foreach ($rows as $row) {
    $areas[$i]["id_medicamento"]=utf8_encode($row["id_medicamento"]);
    $areas[$i]["sustancia_activa"]=utf8_encode($row["sustancia_activa"]);
    $i++;
  }
  $valores= json_encode($areas);
  echo $valores;
  
?>