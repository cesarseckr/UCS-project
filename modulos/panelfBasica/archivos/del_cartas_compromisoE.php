<?php 
    session_start();
    require("../../includes/conexioncon.php");
    $id_cartas_compromiso=$_POST['id_cartas_compromiso'];
    $ruta=$_POST['ruta'];
    $consulta = mysqli_query($con,"DELETE FROM cartas_compromiso WHERE id_cartas_compromiso='$id_cartas_compromiso'");
    unlink("../../../archivos/".$ruta);

    if (!$consulta){
        echo "  error" . mysql_error();
    }else{
        echo 1;
    }
            
 ?>