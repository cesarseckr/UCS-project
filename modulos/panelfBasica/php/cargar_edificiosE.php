<?php session_start();
  
  include('../../includes/conexion.php');
$area=$_POST['area'];
  $sql="SELECT * FROM edificios WHERE estatus=1";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_edificio"]=$row["id_edificio"];
        $areas[$i]["nombre"]=$row["nombre"];
        $i++;
      }

     $valores= json_encode($areas);
     echo $valores;
?>