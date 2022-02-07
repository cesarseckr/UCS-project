<?php 
	require("../../includes/conexioncon.php");

    $accion = $_POST["accion"];

    $consulta = mysqli_query($con,"INSERT INTO lista_accion (nombre) VALUES ('$accion')");

    if (!$consulta){
      echo "error al registrar en la base de datos" . mysql_error();
    }else{
    echo "1";
    }
?>