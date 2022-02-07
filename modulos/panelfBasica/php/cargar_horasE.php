<?php session_start();
  
  include('../../includes/conexion.php');
  
  $sql="SELECT * FROM horas WHERE estatus=1";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_hora"]=$row["id_hora"];
        $areas[$i]["nombre"]=date("h:iA",strtotime($row["hora_in"]))." - ".date("h:iA",strtotime($row["hora_fin"]));
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
?>