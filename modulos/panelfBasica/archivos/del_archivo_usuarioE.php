<?php 
    session_start();
    require("../../includes/conexioncon.php");
    $id_archivos_usuario=$_POST['id_archivo_usuario'];
    $ruta=$_POST['ruta'];
    $consulta = mysqli_query($con,"DELETE FROM archivos_usuarios WHERE id_archivos_usuario='$id_archivos_usuario'");
    unlink("../../../archivos/".$ruta);

    if (!$consulta){
        echo "  error" . mysql_error();
    }else{
        echo 1;
    }
 ?>