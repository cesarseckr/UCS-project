<?php session_start();
  
  include('../../includes/conexion.php');
  $sql="SELECT * FROM escuela_procedencia";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_escuela_procedencia"]=$row["id_escuela_procedencia"];
        $areas[$i]["nombre"]=$row["nombre"];
        $i++;
      }

     $valores= json_encode($areas);
     echo $valores;
?>