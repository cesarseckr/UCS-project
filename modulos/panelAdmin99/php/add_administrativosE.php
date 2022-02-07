<?php 
	require("../../includes/conexioncon.php");

	$apaterno = $_POST["apaternoAdm"];
    $amaterno= $_POST["amaternoAdm"];
    $nombres = $_POST["nombresAdm"];
    $sexo= $_POST["sexoAdm"];
    $fNac = $_POST["fNacAdm"];
    $callenumero = $_POST["callenumeroAdm"];
    $colonia = $_POST["coloniaAdm"];
    $estado = $_POST["estadoAdm"];
    $municipio= $_POST["municipioAdm"];
    $CP = $_POST["CPAdm"];
    $CURP = $_POST["curpAdm"];
    $RFC = $_POST["rfcAdm"];
    $cedula = $_POST["cedulaAdm"];
    $fIng = $_POST["fIngAdm"];
    $telefono = $_POST["telefonoAdm"];
    $celular = $_POST["celularAdm"];
    $email = $_POST["emailAdm"];
    $academia = $_POST["academiaAdm"];
    $area = $_POST["areaAdm"];
    $observaciones = $_POST["observacionesAdm"];

    $consulta = mysqli_query($con,"INSERT INTO administrativos(apaterno, amaterno, nombres, domicilio, colonia, municipio, estado, telefono, celular, cp, email, fechanac, rfc, curp, cedula, sexo, fechaing, academica, id_area, observaciones) VALUES ('$apaterno','$amaterno','$nombres','$callenumero','$colonia','$municipio','$estado','$telefono', '$celular','$CP','$email','$fNac','$RFC','$CURP', '$cedula', '$sexo','$fIng','$academia','$area', '$observaciones')");
    if (!$consulta){
  		echo "error al registrar en la base de datos" . mysql_error();
  	}else{
		echo"1";
  	}

 ?>