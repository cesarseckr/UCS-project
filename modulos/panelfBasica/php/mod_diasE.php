<?php 
    require("../../includes/conexioncon.php");

    $id_dia= $_POST["id_m"];
    $estatus= $_POST["estatus_a_m"];

    $consulta = mysqli_query($con,"UPDATE dias SET estatus='$estatus' WHERE id_dia='$id_dia'");

    if (!$consulta){
        echo "error al registrar en la base de datos" . mysql_error();
    }else{
        echo 1;
    }
 ?>