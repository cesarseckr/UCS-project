<?php session_start();
  
  include('../../includes/conexion.php');
  
  $sql="SELECT * FROM carrera WHERE estatus=1 ORDER BY id_carrera DESC";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_carrera"]=$row["id_carrera"];
        $areas[$i]["nombre"]=$row["clave"]." - ".$row["nombre"];
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
?>