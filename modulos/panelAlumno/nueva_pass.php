<?php 
  session_start();
	require("conexioncon.php");
  $pass=base64_encode($_POST["pass"]);
  $id=$_POST["id"];

  $consulta = mysqli_query($con,"UPDATE usuarios SET pass = '$pass', PS = 1 WHERE id_usuario = '$id'");

  	 if (!$consulta){
  	   	echo "error" . mysqli_error();

  	  }else{
  	   	echo"contraseña actualizada correctamente";
        session_destroy();
  	  }
      
 
 ?>