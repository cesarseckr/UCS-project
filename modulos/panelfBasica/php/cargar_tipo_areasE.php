<?php session_start();
  
  include('../../includes/conexion.php');
  $sql="SELECT * FROM tipo_area WHERE estatus=1";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_tipo_area"]=$row["id_tipo_area"];
        $areas[$i]["nombre"]=$row["nombre"];
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
?>