<?php 
	require("conexioncon.php");
  $id_usuario=$_POST["id_usuario"];
  $id_datos=$_POST["id_datos"];
  $area_admin=$_POST["area_admin"]; 
  $usuario=$_POST["usuario"];
  $pass=$_POST["pass"];
  $estatus=$_POST["estatus"];

  

  $consulta = mysqli_query($con,"UPDATE usuarios SET id_datos = '$id_datos', area_admin='$area_admin', usuario='$usuario', pass='$pass', estatus='$estatus' WHERE id_usuario = '$id_usuario'");

  	 if (!$consulta){
  	   	echo "error" . mysqli_error();

  	  }else{
  	   	echo"Datos actualizados correctamente";
  	  }
      
 
 ?>