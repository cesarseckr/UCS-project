<?php 
    session_start();
    require("../../includes/conexioncon.php");
    $categoria=$_POST['categoria_add'];

    $consulta = mysqli_query($con,"INSERT INTO blog_categorias(categoria) VALUES ('$categoria')");
    
    if (!$consulta){
        echo "  error" . mysql_error();
    }else{
        echo"1";
    }
            
 ?>