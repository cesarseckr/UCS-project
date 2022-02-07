<?php 
	require("../../includes/conexioncon.php");

    $sistema = $_POST["sistema"];

    $consulta = mysqli_query($con,"INSERT INTO lista_sistemas (nombre) VALUES ('$sistema')");

    if (!$consulta){
      echo "error al registrar en la base de datos" . mysql_error();
    }else{
    echo "1";
    }
?>