<?php 
    require("../../includes/conexioncon.php");
    
    $id_aula = $_POST["id_m"];
    $id_edificio = $_POST["edificio_m"];
    $capacidad= $_POST["capacidad_m"];
    $nombres = $_POST["nombres_m"];
    $ideal= $_POST["ideal_m"];
    $estatus= $_POST["estatus_a_m"];
    $tipo= $_POST["tipo_m"];

    $consulta = mysqli_query($con,"UPDATE aulas SET id_edificio='$id_edificio', nombre='$nombres', capacidad='$capacidad', ideal='$ideal', tipo='$tipo', estatus='$estatus' WHERE id_aula='$id_aula'");

    if (!$consulta){
        echo "error al registrar en la base de datos" . mysql_error();
    }else{
        echo 1;
    }
 ?>