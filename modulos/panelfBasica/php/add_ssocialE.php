<?php  session_start();
 require("../../includes/conexioncon.php");

  $id_alumno=$_POST['id_alumno'];
  $fecha_inicio=$_POST['fecha_inicio'];
  $fecha_fin=$_POST['fecha_fin'];
  $detalles=$_POST['detalles'];
  $duracion=$_POST['duracion'];

 	$consulta = mysqli_query($con,"INSERT INTO servicio_social(id_alumno, detalles, duracion, fecha_in, fecha_fin) VALUES ('$id_alumno','$detalles','$duracion','$fecha_inicio','$fecha_fin')");

 	if (!$consulta){
      echo "error al registrar en la base de datos" . mysql_error();
    }else{
    echo"1";
    }

?>