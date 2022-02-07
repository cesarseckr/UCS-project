<?php session_start();

  include('../../includes/conexion.php');

  $sql="SELECT * FROM referido_medica";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll();
  $i=0;
  foreach ($rows as $row) {
    $areas[$i]["id_referido"]=utf8_encode($row["id_referido"]);
    $areas[$i]["nombre"]=utf8_encode($row["nombre"]);
    $i++;
  }
  $valores= json_encode($areas);
  echo $valores;
  
?>