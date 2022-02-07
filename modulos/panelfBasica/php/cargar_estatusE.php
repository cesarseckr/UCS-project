<?php session_start();
  
  include('../../includes/conexion.php');

  $sql="SELECT * FROM estatus_alumnos";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_estatus_alumno"]=$row["id_estatus_alumno"];
        $areas[$i]["nombre"]=$row["nombre"];
        $i++;
      }

     $valores= json_encode($areas);
     echo $valores;
?>