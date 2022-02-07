<?php 
    require("../../includes/conexion.php");

    $nombres = $_POST["nombres"];
    $estatus= $_POST["estatus_a"];
    $academia = $_POST["academia"];
    
  $sql ="INSERT INTO generacion (nombre, id_academia, estatus) VALUES ('$nombres','$academia','$estatus')";
    $insertar = $db->query($sql);

    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
 ?>