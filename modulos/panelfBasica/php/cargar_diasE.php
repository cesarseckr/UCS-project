<?php session_start();
  
  include('../../includes/conexion.php');
  
  $sql="SELECT * FROM dias WHERE estatus=1";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_dia"]=$row["id_dia"];
        $areas[$i]["nombre"]=$row["dia"];
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
?>