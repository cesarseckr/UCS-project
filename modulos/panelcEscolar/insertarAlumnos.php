<?php 
	require("../includes/conexioncon.php");

	$apaterno = $_POST["apaterno"];
    $amaterno= $_POST["amaterno"];
    $nombres = $_POST["nombres"];
    $sexo= $_POST["sexo"];
    $fNac = $_POST["fNac"];
    $CURP = $_POST["CUR"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $callenumero = $_POST["callenumero"];
    $colonia = $_POST["colonia"];
    $estado = $_POST["estado"];
    $estado2 = $_POST["estado2"];
    $municipio= $_POST["municipio"];
    $CP = $_POST["CP"];
    $fIns = $_POST["fIns"];
    $grupo = $_POST["grupo"];
    $estatus = $_POST["estatus"];
    $generacion = $_POST["generacion"];
    $eProced= $_POST["eProced"];
    $uGrado= $_POST["uGrado"];
    $ePrev= $_POST["ePrev"];
    $observaciones = $_POST["observaciones"];

    $consulta = mysqli_query($con,"INSERT INTO alumnos ( matricula, apaterno, amaterno, nombres, domicilio, colonia, municipio, estado, telefono, cp, email, fechanac, curp, sexo, fechaing, id_grupo, ult_grado, est_prev, observaciones, id_estatus, id_generacion, id_esc_origen) VALUES ('MATRICULA','$apaterno','$amaterno','$nombres','$callenumero','$colonia','$municipio','$estado','$telefono','$CP','$email','$fNac','$CURP','$sexo','$fIns','$grupo','$uGrado','$ePrev','$observaciones','$estatus','$generacion',' $eProced')");
    if (!$consulta){
  		echo "error al registrar en la base de datos" . mysql_error();
  	}else{
		echo"Datos ingresados correctamente";
  	}

 ?>