<?php 
	require("conexioncon.php");
  $pass=$_POST["pass"];
  $id=base64_encode($_POST["id"];);

  $consulta = mysqli_query($con,"UPDATE usuarios SET pass = '$id_datos' WHERE id_usuario = '$id'");

  	 if (!$consulta){
  	   	echo "error" . mysqli_error();

  	  }else{
  	   	echo"contraseña actualizada correctamente";
  	  }
      
 
 ?>