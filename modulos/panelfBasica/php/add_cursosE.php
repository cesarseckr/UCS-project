<?php 
    require("../../includes/conexion.php");

    $nombres = $_POST["nombres"];
    $estatus= $_POST["estatus_a"];
    $carrera = $_POST["carrera"];
  
  $sql ="INSERT INTO curso (nombre, id_carrera, estatus) VALUES ('$nombres', '$carrera', '$estatus')";
    $insertar = $db->query($sql);

    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }

 ?>