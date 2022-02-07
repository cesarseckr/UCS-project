<?php 
  require("../../includes/conexioncon.php");

    $tipo = $_POST["tipo"];
    $nom_usuario= $_POST["nom_usuario"];
    $nom_alum = $_POST["nom_alum"];
    $referido = $_POST["referido"];
    $razon = $_POST["razon"];
    $fecha = $_POST["fecha"];

    if($tipo==1){
        $id_datos=$nom_alum;
    }else if($tipo==2 or $tipo==3){
        $id_datos=$nom_usuario;
    }

    $consulta = mysqli_query($con,"INSERT INTO traslado(id_referido, razon, fecha, id_datos, tipo) VALUES ('$referido','$razon','$fecha','$id_datos','$tipo')");

    if (!$consulta){
      echo "error al registrar en la base de datos" . mysql_error();
    }else{
    echo"1";
    }

 ?>