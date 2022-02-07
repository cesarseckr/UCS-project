<?php session_start();
  
  include('../../includes/conexion.php');
  
  $sql="SELECT * FROM planes WHERE estado=1 ORDER BY id_plan DESC";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_plan"]=utf8_encode($row["id_plan"]);
        $areas[$i]["nombre"]=utf8_encode($row["clave"])." - ".utf8_encode($row["nombre"]);
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
?>