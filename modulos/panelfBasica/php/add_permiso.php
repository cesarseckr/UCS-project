<?php  session_start();
 	require("../../includes/conexioncon.php");

 	  $id_datos=$_POST['id_datos'];
    $tipo=$_POST['tipo'];
 	  $fecha_inicio_perm=$_POST['fecha_inicio_perm'];
  	$fecha_fin_perm=$_POST['fecha_fin_perm'];
  	$causas=$_POST['causas'];
  	$especificacion=$_POST['especificacion'];

  	if($causas == '1'){
  		$causas="Consulta servicio Isssteleon";
  	}else if($causas == '2'){
  		$causas="Consulta servicio Médico";
  	}else if($causas == '3'){
  		$causas="Trámites de titulación";
  	}else if($causas == '4'){
  		$causas="Trámites personales";
  	}else if($causas == '5'){
  		$causas="Causas de fuerza mayor";
  	}else if($causas == '6'){
  		$causas="Otros";
  	}

 	$consulta = mysqli_query($con,"INSERT INTO permisos(fecha_inicio, fecha_fin, causas, especificacion, id_datos, tipo) VALUES ('$fecha_inicio_perm','$fecha_fin_perm','$causas','$especificacion','$id_datos', '$tipo')");

 	if (!$consulta){
      echo "error al registrar en la base de datos" . mysql_error();
    }else{
    echo"1";
    }

?>