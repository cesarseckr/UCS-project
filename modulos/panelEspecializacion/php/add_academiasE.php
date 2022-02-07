<?php 
    require("../../includes/conexion.php");

    $nombres = $_POST["nombres"];
    $plan= $_POST["plan"];
    $estatus= $_POST["estatus_a"];
    
  $sql ="INSERT INTO academia (nombre, id_plan, estatus) VALUES ('$nombres','$plan','$estatus')";
    $insertar = $db->query($sql);

    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
 ?>