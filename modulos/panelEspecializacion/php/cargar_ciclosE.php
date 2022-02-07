<?php session_start();
  
  include('../../includes/conexion.php');

  if(isset($_POST['id_plan'])){
     $id_plan=$_POST['id_plan'];
  $sql="SELECT * FROM ciclo WHERE id_plan='$id_plan'";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_ciclo"]=$row["id_ciclo"];
        $areas[$i]["nombre"]=$row["clave"]." - ".$row["nombre"];
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
   }
   else{
 $sql="SELECT * FROM ciclo WHERE estatus=1 ORDER BY id_ciclo DESC";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_ciclo"]=$row["id_ciclo"];
        $areas[$i]["nombre"]=$row["clave"]." - ".$row["nombre"];
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
   }
?>