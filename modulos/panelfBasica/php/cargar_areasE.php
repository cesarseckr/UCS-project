<?php session_start();
  
  include('../../includes/conexion.php');
$area=$_POST['area'];
  $sql="SELECT * FROM areas";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_area"]=$row["id_area"];
        $areas[$i]["area"]=$row["area"];
        $i++;
      }

     $valores= json_encode($areas);
     echo $valores;
?>