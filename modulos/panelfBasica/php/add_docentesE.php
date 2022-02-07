<?php 
    require("../../includes/conexion.php");

    $apaterno = $_POST["apaterno"];
    $amaterno= $_POST["amaterno"];
    $nombres = $_POST["nombres"];
    $sexo= $_POST["sexo"];
    $fNac = $_POST["fNac"];
    $callenumero = $_POST["callenumero"];
    $colonia = $_POST["colonia"];
    $estado = $_POST["estado"];
    $municipio= $_POST["municipio"];
    $CP = $_POST["CP"];
    $CURP = $_POST["curp"];
    $RFC = $_POST["rfc"];
    $cedula = $_POST["cedula"];
    $fIng = $_POST["fIng"];
    $telefono = $_POST["telefono"];
    $celular = $_POST["celular"];
    $email = $_POST["email"];
    $academia = $_POST["academia"];
    $area = $_POST["area"];
    $estatus = $_POST["estatus_a"];
    $tipo_area = $_POST["tipo_area"];
    $observaciones = $_POST["observaciones"];

  $sql ="INSERT INTO docentes(apaterno, amaterno, nombres, domicilio, colonia, municipio, estado, telefono, celular, cp, email, fechanac, rfc, curp, cedula, sexo, fechaing, academica, observaciones,estatus,tipo) VALUES ('$apaterno','$amaterno','$nombres','$callenumero','$colonia','$municipio','$estado','$telefono', '$celular','$CP','$email','$fNac','$RFC','$CURP', '$cedula', '$sexo','$fIng','$academia', '$observaciones', '$estatus', '$tipo_area')";
    $insertar = $db->query($sql);
    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }

 ?>