<?php 
    require("../../includes/conexioncon.php");
    
    $id_hora = $_POST["id_m"];
    $hora_in = $_POST["hora_in_m"];
    $estatus= $_POST["estatus_a_m"];
    $hora_fin= $_POST["hora_fin_m"];

    $consulta = mysqli_query($con,"UPDATE horas SET hora_in='$hora_in',
    hora_fin='$hora_fin', estatus='$estatus' WHERE id_hora='$id_hora'");

    if (!$consulta){
        echo "error al registrar en la base de datos" . mysql_error();
    }else{
        echo 1;
    }
 ?>