<?php 
  require("../../includes/conexioncon.php");

    ini_set('date.timezone', 'America/Mexico_City');

    $tipo = $_POST["TipoUsuario"];
    $id_paciente= $_POST["NombreUsuario"];
    $fecha = date('Y-m-d', time());
    $hora_inicio= date('H:i:s', time());


    $consulta = mysqli_query($con,"INSERT INTO consultas (fecha, hora_inicio, id_paciente, tipo_paciente, estatus) VALUES ('$fecha','$hora_inicio','$id_paciente','$tipo','1')");

    if (!$consulta){
      echo "error al registrar en la base de datos" . mysql_error();
    }else{
    echo "1";
    }
?>