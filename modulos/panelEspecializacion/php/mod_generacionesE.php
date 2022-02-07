<?php 
    require("../../includes/conexioncon.php");
    
    $id = $_POST["id_m"];
    $nombres = $_POST["nombres_m"];
    $academia = $_POST["academia_m"];
    $estatus= $_POST["estatus_a_m"];

    $consulta = mysqli_query($con,"UPDATE generacion SET nombre='$nombres', id_academia='$academia', estatus='$estatus' WHERE id_generacion='$id'");

    if (!$consulta){
        echo "error al registrar en la base de datos" . mysql_error();
    }else{
        echo 1;
    }
 ?>