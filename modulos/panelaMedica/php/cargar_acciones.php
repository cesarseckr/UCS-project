<?php session_start();

  include('../../includes/conexion.php');

  $sql="SELECT * FROM lista_accion";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll();
  $i=0;
  foreach ($rows as $row) {
    $areas[$i]["id_lista_accion"]=utf8_encode($row["id_lista_accion"]);
    $areas[$i]["nombre"]=utf8_encode($row["nombre"]);
    $i++;
  }
  $valores= json_encode($areas);
  echo $valores;
  
?>