<?php session_start();
  
  include('../../includes/conexion.php');
  $id_plan= $_POST["id_plan"];
  
  $sql="SELECT * FROM planes WHERE estado=1 ORDER BY id_plan DESC";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_plan"]=$row["id_plan"];
        $areas[$i]["nombre"]=$row["clave"]." - ".$row["nombre"];
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
?>