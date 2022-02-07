<?php 
	require("../../includes/conexioncon.php");

    $diagnostico = $_POST["diagnostico"];

    $consulta = mysqli_query($con,"INSERT INTO lista_diagnosticos (nombre) VALUES ('$diagnostico')");

    if (!$consulta){
      echo "error al registrar en la base de datos" . mysql_error();
    }else{
    echo "1";
    }
?>