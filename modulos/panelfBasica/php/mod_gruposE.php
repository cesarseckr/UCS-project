<?php 
    require("../../includes/conexion.php");
    
    $id = $_POST["id_m"];
    $ciclo = $_POST["ciclo_d_m"];
    $carrera = $_POST["carrera_m"];
    $curso = $_POST["curso_d_m"];
    $nombre = $_POST["nombre_m"];
    $sede = $_POST["sede_m"];
    $estatus = $_POST["estatus_a_m"];

     $sql ="UPDATE grupo SET id_ciclo='$ciclo', id_carrera='$carrera', id_curso='$curso', nombre='$nombre', sede='$sede', estatus='$estatus' WHERE id_grupo='$id'";
    $insertar = $db->query($sql);
    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
 ?>