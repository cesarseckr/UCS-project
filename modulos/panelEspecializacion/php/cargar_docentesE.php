<?php session_start();
  
  include('../../includes/conexion.php');
  
  $sql="SELECT * FROM docentes WHERE estatus=1 ORDER BY tipo ASC";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_docente"]=$row["id_docente"];
        $areas[$i]["nombre"]=$row["apaterno"]." ".$row["amaterno"]." ".$row["nombres"];
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
?>