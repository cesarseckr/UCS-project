<?php session_start();
  
  include('../../includes/conexion.php');
  $sql="SELECT * FROM sedes WHERE estatus=1";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_sede"]=$row["id_sede"];
        $areas[$i]["nombre"]=$row["siglas"]." - ".$row["nombre"];
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
?>