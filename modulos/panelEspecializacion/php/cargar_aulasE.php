<?php session_start();
  
  include('../../includes/conexion.php');
  if($_POST['tipo']==1){
  $sql="SELECT * FROM aulas WHERE estatus=1 and tipo=1";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_aula"]=$row["id_aula"];
        $areas[$i]["nombre"]=$row["nombre"];
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
     }
     else{
        $sql="SELECT * FROM aulas WHERE estatus=1 and tipo=2";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_aula"]=$row["id_aula"];
        $areas[$i]["nombre"]=$row["nombre"];
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
     }
?>