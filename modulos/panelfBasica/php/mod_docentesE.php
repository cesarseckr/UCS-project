<?php 
    require("../../includes/conexioncon.php");
    
    $id_docente=$_POST["id_m"];
    $apaterno = $_POST["apaterno_m"];
    $amaterno= $_POST["amaterno_m"];
    $nombres = $_POST["nombres_m"];
    $sexo= $_POST["sexo_m"];
    $fNac = $_POST["fNac_m"];
    $callenumero = $_POST["callenumero_m"];
    $colonia = $_POST["colonia_m"];
    $estado =  $_POST["estado_m"];
    $municipio= $_POST["municipio_m"];
    $CP = $_POST["CP_m"];
    $CURP = $_POST["curp_m"];
    $RFC = $_POST["rfc_m"];
    $cedula = $_POST["cedula_m"];
    $fIng = $_POST["fIng_m"];
    $telefono = $_POST["telefono_m"];
    $celular = $_POST["celular_m"];
    $email = $_POST["email_m"];
    $academia = $_POST["academia_m"];
    $id_area = $_POST["area_m"];
    $observaciones = $_POST["observaciones_m"];
    $estatus = $_POST["estatus_a_m"];
    $tipo_area = $_POST["tipo_area_m"];

    $consulta = mysqli_query($con,"UPDATE docentes SET apaterno='$apaterno', amaterno='$amaterno', nombres='$nombres', domicilio='$callenumero', colonia='$colonia', municipio='$municipio', estado='$estado', telefono='$telefono', celular='$celular', cp='$CP', email='$email', fechanac='$fNac', rfc='$RFC', curp='$CURP', cedula='$cedula', sexo='$sexo', fechaing='$fIng', academica='$academia', observaciones='$observaciones', estatus='$estatus', tipo='$tipo_area' WHERE id_docente='$id_docente'");

    if (!$consulta){
        echo "error al registrar en la base de datos" . mysql_error();
    }else{
        echo 1;
    }
 ?>