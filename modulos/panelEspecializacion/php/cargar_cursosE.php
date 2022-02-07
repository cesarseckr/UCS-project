<?php session_start();
  
  include('../../includes/conexion.php');
  
  if(isset($_POST['id_carrera'])){
  $id_carrera=$_POST['id_carrera'];
  $sql="SELECT * FROM curso WHERE id_carrera='$id_carrera'";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_curso"]=$row["id_curso"];
        $areas[$i]["nombre"]=$row["nombre"];
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
    }
    else{
  $sql="SELECT * FROM curso WHERE estatus=1";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_curso"]=$row["id_curso"];
        $areas[$i]["nombre"]=$row["nombre"];
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
      
    }
?>