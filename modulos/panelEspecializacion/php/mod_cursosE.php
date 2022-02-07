<?php 
    require("../../includes/conexion.php");
    
    $id = $_POST["id_m"];
    $nombres = $_POST["nombres_m"];
    $estatus= $_POST["estatus_a_m"];
    $carrera = $_POST["carrera_m"];

     $sql ="UPDATE curso SET nombre='$nombres', id_carrera='$carrera',  estatus='$estatus' WHERE id_curso='$id'";
    $insertar = $db->query($sql);
    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
 ?>