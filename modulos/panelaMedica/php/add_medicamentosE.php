<?php 
	require("../../includes/conexioncon.php");

    $marca = $_POST["marcaMed"];
    $sustancia= $_POST["sact-Med"];
    $mg = $_POST["mgMed"];
    $cantidad = $_POST["cantidadMed"];
    $presentacion = $_POST["presentacionMed"];



    $consulta = mysqli_query($con,"INSERT INTO medicamentos ( marca, sustancia_activa, mg, contenido, presentacion) VALUES ('$marca','$sustancia','$mg','$cantidad', '$presentacion')");

    if (!$consulta){
      echo "error al registrar en la base de datos" . mysql_error();
    }else{
    echo "1";
    }

 ?>