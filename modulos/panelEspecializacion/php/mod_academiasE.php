<?php 
    require("../../includes/conexioncon.php");
    
    $id = $_POST["id_m"];
    $nombres = $_POST["nombres_m"];
    $plan= $_POST["plan_m"];
    $estatus= $_POST["estatus_a_m"];

    $consulta = mysqli_query($con,"UPDATE academia SET nombre='$nombres', id_plan='$plan', estatus='$estatus' WHERE id_academia='$id'");

    if (!$consulta){
        echo "error al registrar en la base de datos" . mysql_error();
    }else{
        echo 1;
    }
 ?>