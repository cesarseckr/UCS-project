<?php 
  require("../../includes/conexioncon.php");

  $id_permiso = $_POST['id_permiso'];
  
  $consulta = mysqli_query($con,"DELETE FROM permisos WHERE id_permiso='$id_permiso'");

  if (!$consulta){
    echo "error al registrar en la base de datos" . mysql_error();
  }else{
     echo "1";
  }

?>