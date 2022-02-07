<?php session_start();

  include('../../includes/conexion.php');

  $sql="SELECT * FROM material_medico";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll();
  $i=0;
  foreach ($rows as $row) {
    $areas[$i]["id_materialm"]=utf8_encode($row["id_materialm"]);
    $areas[$i]["material"]=utf8_encode($row["material"]);
    $i++;
  }
  $valores= json_encode($areas);
  echo $valores;
  
?>