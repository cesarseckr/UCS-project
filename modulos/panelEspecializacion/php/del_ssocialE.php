<?php 
  require("../../includes/conexioncon.php");

  $id_servicio_social = $_POST['id_servicio_social'];
  
  $consulta = mysqli_query($con,"DELETE FROM servicio_social WHERE id_servicio_social='$id_servicio_social'");

  if (!$consulta){
    echo "error al registrar en la base de datos" . mysql_error();
  }else{
     echo "1";
  }

?>