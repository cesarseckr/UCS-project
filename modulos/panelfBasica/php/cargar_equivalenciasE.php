<?php session_start();
  
  include('../../includes/conexion.php');
  $sql="SELECT * FROM equivalencia WHERE estatus=1 ORDER BY id_equivalencia DESC";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_equivalencia"]=$row["id_equivalencia"];
        $areas[$i]["nombre"]=$row["nombre"];
        $i++;
      }

     $valores= json_encode($areas);
     echo $valores;
?>