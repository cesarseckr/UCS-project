<?php 
  require("../../includes/conexioncon.php");

    $marca = $_POST["marcaMed"];
    $material= $_POST["material"];
    $cantidad = $_POST["cantidadMed"];
    $presentacion = $_POST["presentacionMed"];



    $consulta = mysqli_query($con,"INSERT INTO material_medico (marca, material, cantidad_total, presentacion) VALUES ('$marca','$material', '$cantidad','$presentacion')");

    if (!$consulta){
      echo "error al registrar en la base de datos" . mysql_error();
    }else{
    echo"1";
    }

 ?>