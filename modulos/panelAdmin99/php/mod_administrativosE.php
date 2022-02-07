<?php 
	require("../../includes/conexioncon.php");
    
    $id_Administrativo=$_POST["idAdm_m"];
	$apaterno = $_POST["apaternoAdm_m"];
    $amaterno= $_POST["amaternoAdm_m"];
    $nombres = $_POST["nombresAdm_m"];
    $sexo= $_POST["sexoAdm_m"];
    $fNac = $_POST["fNacAdm_m"];
    $callenumero = $_POST["callenumeroAdm_m"];
    $colonia = $_POST["coloniaAdm_m"];
    $estado =  ltrim($_POST["estadoAdm_m"]);
    $municipio= $_POST["municipioAdm_m"];
    $CP = $_POST["CPAdm_m"];
    $CURP = $_POST["curpAdm_m"];
    $RFC = $_POST["rfcAdm_m"];
    $cedula = $_POST["cedulaAdm_m"];
    $fIng = $_POST["fIngAdm_m"];
    $telefono = $_POST["telefonoAdm_m"];
    $celular = $_POST["celularAdm_m"];
    $email = $_POST["emailAdm_m"];
    $academia = $_POST["academiaAdm_m"];
    $id_area = $_POST["areaAdm_m"];
    $observaciones = $_POST["observacionesAdm_m"];


    $consulta = mysqli_query($con,"UPDATE  administrativos SET apaterno='$apaterno', amaterno='$amaterno', nombres='$nombres', domicilio='$callenumero', colonia='$colonia', municipio='$municipio', estado='$estado', telefono='$telefono', celular='$celular', cp='$CP', email='$email', fechanac='$fNac', rfc='$RFC', curp='$CURP', cedula='$cedula', sexo='$sexo', fechaing='$fIng', academica='$academia', id_area='$id_area', observaciones='$observaciones' WHERE id_administrativo='$id_Administrativo'");

    if (!$consulta){
  		echo "error al registrar en la base de datos" . mysql_error();
  	}else{
		echo"1";
  	}

    

 ?>

