<?php 
    require("../../includes/conexion.php");

    $id_edificio = $_POST["edificio"];
    $capacidad= $_POST["capacidad"];
    $nombres = $_POST["nombres"];
    $ideal= $_POST["ideal"];
    $tipo= $_POST["tipo"];
    $estatus= $_POST["estatus_a"];
    
  $sql ="INSERT INTO aulas (id_edificio, nombre, capacidad, ideal, tipo, estatus) VALUES ('$id_edificio','$nombres','$capacidad','$ideal','$tipo','$estatus')";
    $insertar = $db->query($sql);

    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
 ?>