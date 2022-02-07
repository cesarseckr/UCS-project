<?php 
	require("../../includes/conexioncon.php");

    $referido = $_POST["referido"];

    $consulta = mysqli_query($con,"INSERT INTO referido_medica (nombre) VALUES ('$referido')");

    if (!$consulta){
      echo "error al registrar en la base de datos" . mysql_error();
    }else{
    echo "1";
    }
?>