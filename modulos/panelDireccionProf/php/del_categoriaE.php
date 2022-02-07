<?php 
    session_start();
    require("../../includes/conexioncon.php");
    $id_categoria=$_POST['id_categoria'];

    $consulta = mysqli_query($con,"DELETE FROM blog_categorias WHERE id_categoria='$id_categoria'");

    $consulta2 = mysqli_query($con,"UPDATE blog_articulo SET estatus='2', id_categoria='0' WHERE id_categoria='$id_categoria'");
    
    if (!$consulta OR !$consulta2){
        echo "  error" . mysql_error();
    }else{
        echo"1";
    }
            
 ?>