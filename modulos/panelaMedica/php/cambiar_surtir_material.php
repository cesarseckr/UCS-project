<?php 
  require("../../includes/conexioncon.php");

    $id_consulta=$_POST['id_consulta'];

    $consulta = mysqli_query($con,"UPDATE consultas SET surtir_material='1' where id_consulta='$id_consulta'");
    
    if (!$consulta){
    echo "error al registrar en la base de datos" . mysql_error();
    }else{
    echo "1";
    }

?>