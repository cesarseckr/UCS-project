<?php 
    require("../../includes/conexioncon.php");
    
    $id_sede = $_POST["id_m"];
    $siglas = $_POST["siglas_m"];
    $nombre = $_POST["nombres_m"];
    $direccion= $_POST["direccion_m"];
    $id_estado= $_POST["estado_m"];
    $id_municipio= $_POST["municipio_m"];
    $telefono= $_POST["telefono_m"];
    $tipo= $_POST["tipo_m"];
    $estatus= $_POST["estatus_a_m"];

    $consulta = mysqli_query($con,"UPDATE sedes SET siglas='$siglas', nombre='$nombre', direccion='$direccion', id_estado='$id_estado', id_municipio='$id_municipio',telefono='$telefono',tipo='$tipo',estatus='$estatus' WHERE id_sede='$id_sede'");

    if (!$consulta){
        echo "error al registrar en la base de datos" . mysql_error();
    }else{
        echo 1;
    }
 ?>