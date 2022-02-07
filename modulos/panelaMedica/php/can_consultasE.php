<?php 
	require("../../includes/conexioncon.php");
  		$id_m= $_POST["id_m"];
    	$consulta = mysqli_query($con,"UPDATE consultas SET estatus=3
       		WHERE id_consulta='$id_m'");

    	 if (!$consulta){
        	echo "error ".mysql_error($consulta);
    	}else{
        	echo"OK";
        }
 ?>