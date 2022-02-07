<?php 
	require("../../includes/conexioncon.php");

	$id_docente=$_POST["idDoc_m"];
    $apaterno = $_POST["apaternoDoc_m"];
    $amaterno= $_POST["amaternoDoc_m"];
    $nombres = $_POST["nombresDoc_m"];
    $sexo= $_POST["sexoDoc_m"];
    $fNac = $_POST["fNacDoc_m"];
    $callenumero = $_POST["callenumeroDoc_m"];
    $colonia = $_POST["coloniaDoc_m"];
    $estado =  ltrim($_POST["estadoDoc_m"]);
    $municipio= $_POST["municipioDoc_m"];
    $CP = $_POST["CPDoc_m"];
    $CURP = $_POST["curpDoc_m"];
    $RFC = $_POST["rfcDoc_m"];
    $cedula = $_POST["cedulaDoc_m"];
    $fIng = $_POST["fIngDoc_m"];
    $telefono = $_POST["telefonoDoc_m"];
    $celular = $_POST["celularDoc_m"];
    $email = $_POST["emailDoc_m"];
    $academia = $_POST["academiaDoc_m"];
    $observaciones = $_POST["observacionesDoc_m"];

    $consulta = mysqli_query($con,"UPDATE docentes SET apaterno='$apaterno', amaterno='$amaterno', nombres='$nombres', domicilio='$callenumero', colonia='$colonia', municipio='$municipio', estado='$estado', telefono='$telefono', celular='$celular', cp='$CP', email='$email', fechanac='$fNac', rfc='$RFC', curp='$CURP', cedula='$cedula', sexo='$sexo', fechaing='$fIng', academica='$academia', observaciones='$observaciones' WHERE id_docente='$id_docente'");

    if (!$consulta){
  		echo "error al registrar en la base de datos" . mysql_error();
  	}else{
		echo"1";
  	}

 ?>