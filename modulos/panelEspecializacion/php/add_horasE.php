<?php 
    require("../../includes/conexion.php");

    $hora_in = $_POST["hora_in"];
    $estatus= $_POST["estatus_a"];
    $hora_fin= $_POST["hora_fin"];
    
  $sql ="INSERT INTO horas (hora_in, hora_fin, estatus) VALUES ('$hora_in','$hora_fin','$estatus')";
    $insertar = $db->query($sql);

    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
 ?>