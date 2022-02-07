<?php 
    require("../../includes/conexion.php");

    $ciclo = $_POST["ciclo_d"];
    $carrera = $_POST["carrera"];
    $curso = $_POST["curso_d"];
    $nombre = $_POST["nombre"];
    $estatus = $_POST["estatus_a"];
    $sede = $_POST["sede"];

  $sql ="INSERT INTO grupo (id_ciclo, id_carrera, id_curso, nombre, sede, estatus) VALUES ('$ciclo', '$carrera','$curso','$nombre','$sede','$estatus')";
    $insertar = $db->query($sql);

    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
 ?>