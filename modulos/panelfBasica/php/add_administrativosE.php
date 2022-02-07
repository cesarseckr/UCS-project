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
    $observaciones = $_POST["observaciones"];

/*$sql="SELECT * FROM estados where id_estado='$estado'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $estado=$row["estado"];
      }

$sql="SELECT * FROM municipios where id_municipio='$municipio'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $municipio=$row["municipio"];
      }
      */

  $sql ="INSERT INTO administrativos(apaterno, amaterno, nombres, domicilio, colonia, municipio, estado, telefono, celular, cp, email, fechanac, rfc, curp, cedula, sexo, fechaing, academica, id_area, observaciones) VALUES ('$apaterno','$amaterno','$nombres','$callenumero','$colonia','$municipio','$estado','$telefono', '$celular','$CP','$email','$fNac','$RFC','$CURP', '$cedula', '$sexo','$fIng','$academia','$area', '$observaciones')";
    $insertar = $db->query($sql);
    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }

 ?>