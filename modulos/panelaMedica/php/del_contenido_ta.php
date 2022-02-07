<?php
  include("../../includes/conexion.php"); 
  require("../../includes/conexioncon.php");

  $id_contenido_ta = $_POST['id_contenido_ta'];
  
  $consulta = mysqli_query($con,"DELETE FROM contenido_ta WHERE id_contenido_ta='$id_contenido_ta'");

  if (!$consulta){
    echo "error al registrar en la base de datos" . mysql_error();
  }else{
     echo "1";
  }

?>