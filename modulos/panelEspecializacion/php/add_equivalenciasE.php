<?php 
    require("../../includes/conexion.php");

    $nombres = $_POST["nombres"];
    $estatus= $_POST["estatus_a"];
    $clave = $_POST["clave"];

  $sql ="INSERT INTO equivalencia (nombre, estatus) VALUES ('$nombres', '$estatus')";
    $insertar = $db->query($sql);

    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
?>