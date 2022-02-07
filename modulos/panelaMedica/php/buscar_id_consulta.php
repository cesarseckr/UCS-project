<?php 
	require("../../includes/conexion.php");
  $dirigir = $_POST["dirigir"];

  if ($dirigir == 1) {
    if(isset($_POST["id_consulta"])){
      $id_consulta = $_POST["id_consulta"];
      $recuperar="SELECT * FROM diagnostico WHERE id_consulta = '$id_consulta' LIMIT 1";
      
      $sq= $db->query($recuperar);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $id=$row["id_diagnostico"];  
      }
      echo $id;
    } 
  }else if ($dirigir == 2) {
    if(isset($_POST["id_consulta"])){
      $id_consulta = $_POST["id_consulta"];
      $recuperar="SELECT * FROM acciones_enfermeria WHERE id_consulta = '$id_consulta' LIMIT 1";
      
      $sq= $db->query($recuperar);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $id=$row["id_accion_enf"];  
      }
      echo $id;
    }
  }

 ?>