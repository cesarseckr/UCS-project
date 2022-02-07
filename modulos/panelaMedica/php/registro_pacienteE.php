<?php
	include("../../includes/conexion.php");
	require("../../includes/conexioncon.php");

	ini_set('date.timezone', 'America/Mexico_City');

	$id_datos=$_POST['NombreUsuario'];
    $id_alumno=$_POST['nombre_alum'];
    $tipo=$_POST['TipoUsuario'];
    $nombre_otro=$_POST['NombreUsuario-Otro'];
    $edad_otro=$_POST['EdadUsuario-Otro'];
	$sexo_otro=$_POST['SexoUsuario-Otro'];
	$talla=$_POST['altura_consu'];
	$peso=$_POST['peso_consu'];
	$imc=$_POST['imc_consu'];
	$pres=$_POST['presion_art_consu'];
	$frec_car=$_POST['frec_card_consu'];
	$frec_resp=$_POST['frec_resp_consu'];
	$temp=$_POST['temp_consu'];
	$fecha = date('Y-m-d', time());
    $hora_inicio= date('H:i:s', time());
    $direccion_paciente = $_POST['direccion_paciente'];




	if ($tipo==1) {
		$sql_alumno= "INSERT INTO consultas (fecha, hora_inicio, estatus, id_paciente, tipo_paciente, dirigir) VALUES ('$fecha','$hora_inicio','1','$id_alumno','1','$direccion_paciente')";
  		$insertar_alumno = $db->query($sql_alumno);
  		$ultimo_alumno = $db->lastInsertId();

  		$sql_vitales= "INSERT INTO consulta_svitales (id_consulta, presion_arterial, f_cardiaca, f_respiratoria, temp) VALUES ('$ultimo_alumno','$pres','$frec_car','$frec_resp','$temp')";
  		$insertar_vitales = $db->query($sql_vitales);

  		$sql_soma= "INSERT INTO consulta_somatometria (id_consulta, talla, peso, imc) VALUES ('$ultimo_alumno','$talla','$peso','$imc')";
  		$insertar_soma = $db->query($sql_soma);

  		if(!$insertar_alumno && !$insertar_vitales && !$insertar_soma){
  			echo "error al registrar en la base de datos" . mysql_error();
  		}else{
  			echo "1";
  		}
	}else if($tipo==2 || $tipo==3){
		$sql_datos= "INSERT INTO consultas (fecha, hora_inicio, estatus, id_paciente, tipo_paciente, dirigir) VALUES ('$fecha','$hora_inicio','1','$id_datos','$tipo','$direccion_paciente')";
  		$insertar_datos = $db->query($sql_datos);
  		$ultimo_datos = $db->lastInsertId();

  		$sql_vitales= "INSERT INTO consulta_svitales (id_consulta, presion_arterial, f_cardiaca, f_respiratoria, temp) VALUES ('$ultimo_datos','$pres','$frec_car','$frec_resp','$temp')";
  		$insertar_vitales = $db->query($sql_vitales);

  		$sql_soma= "INSERT INTO consulta_somatometria (id_consulta, talla, peso, imc) VALUES ('$ultimo_datos','$talla','$peso','$imc')";
  		$insertar_soma = $db->query($sql_soma);

  		if(!$insertar_datos && !$insertar_vitales && !$insertar_soma){
  			echo "error al registrar en la base de datos" . mysql_error();
  		}else{
  			echo "1";
  		}

	}else if($tipo==55){
		$ultimo_otro="";
		$ultimo_id_otro="";
		$sql_otro="INSERT INTO otro (nombre, edad, sexo) VALUES ('$nombre_otro','$edad_otro','$sexo_otro')";
		$insertar_otro = $db->query($sql_otro);
  		$ultimo_otro = $db->lastInsertId();

  		$sql_id_otro="INSERT INTO consultas (fecha, hora_inicio, estatus, id_paciente, tipo_paciente, dirigir) VALUES ('$fecha','$hora_inicio','1','$ultimo_otro','$tipo','$direccion_paciente')";
  		$insertar_id_otro = $db->query($sql_id_otro);
  		$ultimo_id_otro = $db->lastInsertId();

  		$sql_vitales= "INSERT INTO consulta_svitales (id_consulta, presion_arterial, f_cardiaca, f_respiratoria, temp) VALUES ('$ultimo_id_otro','$pres','$frec_car','$frec_resp','$temp')";
  		$insertar_vitales = $db->query($sql_vitales);

  		$sql_soma= "INSERT INTO consulta_somatometria (id_consulta, talla, peso, imc) VALUES ('$ultimo_id_otro','$talla','$peso','$imc')";
  		$insertar_soma = $db->query($sql_soma);

  		if(!$insertar_otro && !$insertar_id_otro && !$insertar_vitales && !$insertar_soma){
  			echo "error al registrar en la base de datos" . mysql_error();
  		}else{
  			echo "1";
  		}


	}




 ?>