<?php session_start();
  
  include('../../includes/conexion.php');
  if(isset($_POST['id_plan'])){
  $id_plan=$_POST['id_plan'];
  $sql="SELECT * FROM academia WHERE estatus=1 and id_plan='$id_plan' ORDER BY id_academia DESC";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_academia"]=$row["id_academia"];
        $areas[$i]["nombre"]=$row["nombre"];
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
   }
   else{
    $sql="SELECT * FROM academia WHERE estatus=1 ORDER BY id_academia DESC";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_academia"]=$row["id_academia"];
        $areas[$i]["nombre"]=$row["nombre"];
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
   }
?>