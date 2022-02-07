<?php session_start();
  
  include('../../includes/conexion.php');

  $sql="SELECT * FROM generacion";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_generacion"]=utf8_encode($row["id_generacion"]);
        $areas[$i]["nombre"]=utf8_encode($row["nombre"]);
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
?>