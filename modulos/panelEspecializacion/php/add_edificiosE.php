<?php 
    require("../../includes/conexion.php");

    $nombre = $_POST["nombres"];
    $estatus= $_POST["estatus_a"];
    $sede= $_POST["sede"];
    
  $sql ="INSERT INTO edificios (nombre, sede, estatus) VALUES ('$nombre','$sede','$estatus')";
    $insertar = $db->query($sql);

    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
 ?>