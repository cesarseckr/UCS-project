<?php 
    require("../../includes/conexioncon.php");
    
    $id_edificio = $_POST["id_m"];
    $nombre = $_POST["nombres_m"];
    $sede = $_POST["sede_m"];
    $estatus= $_POST["estatus_a_m"];

    $consulta = mysqli_query($con,"UPDATE edificios SET nombre='$nombre',
    sede='$sede', estatus='$estatus' WHERE id_edificio='$id_edificio'");

    if (!$consulta){
        echo "error al registrar en la base de datos" . mysql_error();
    }else{
        echo 1;
    }
 ?>