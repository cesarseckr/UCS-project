<?php 
    session_start();
    require("../../includes/conexioncon.php");
    $id_archivo=$_POST['id_archivo'];

    $consulta = mysqli_query($con,"DELETE FROM archivos WHERE id_archivo='$id_archivo'");

    $consulta2 = mysqli_query($con,"DELETE FROM destinos WHERE id_archivo_destino='$id_archivo'");
    
    if (!$consulta OR !$consulta2){
        echo "  error" . mysql_error();
    }else{
        echo"1";
    }
            
 ?>