<?php 
	require("../../includes/conexioncon.php");

	$apaterno = $_POST["apaternoDoc"];
    $amaterno= $_POST["amaternoDoc"];
    $nombres = $_POST["nombresDoc"];
    $sexo= $_POST["sexoDoc"];
    $fNac = $_POST["fNacDoc"];
    $callenumero = $_POST["callenumeroDoc"];
    $colonia = $_POST["coloniaDoc"];
    $estado = $_POST["estadoDoc"];
    $municipio= $_POST["municipioDoc"];
    $CP = $_POST["CPDoc"];
    $CURP = $_POST["curpDoc"];
    $RFC = $_POST["rfcDoc"];
    $cedula = $_POST["cedulaDoc"];
    $fIng = $_POST["fIngDoc"];
    $telefono = $_POST["telefonoDoc"];
    $celular = $_POST["celularDoc"];
    $email = $_POST["emailDoc"];
    $academia = $_POST["academiaDoc"];
    $observaciones = $_POST["observacionesDoc"];

    $consulta = mysqli_query($con,"INSERT INTO docentes(apaterno, amaterno, nombres, domicilio, colonia, municipio, estado, telefono, celular, cp, email, fechanac, rfc, curp, cedula, sexo, fechaing, academica, observaciones) VALUES ('$apaterno','$amaterno','$nombres','$callenumero','$colonia','$municipio','$estado','$telefono', '$celular','$CP','$email','$fNac','$RFC','$CURP', '$cedula', '$sexo','$fIng','$academia','$observaciones')");
    if (!$consulta){
  		echo "error al registrar en la base de datos" . mysql_error();
  	}else{
		echo"1";
  	}

 ?>