<?php 
  require("../../includes/conexioncon.php");

  $id_diagnostico = $_POST['id_diagnostico'];
  $diagnostico = $_POST['diagnostico'];
  $sistema = $_POST['sistema'];
  $observaciones = $_POST['observaciones'];
  $tipo = $_POST['tipo'];
  $tiempo = $_POST['tiempo'];

 $consulta = mysqli_query($con,"UPDATE diagnostico SET diagnostico='$diagnostico',sistema='$sistema',tipo_incapacidad='$tipo',tiempo_incapacidad='$tiempo',observaciones='$observaciones' WHERE id_diagnostico='$id_diagnostico'");

  if (!$consulta){
    echo "error al registrar en la base de datos" . mysql_error();
  }else{
    ini_set('date.timezone', 'America/Mexico_City');
    $id_consulta=$_POST['id_consulta'];
    $hora_fin = date('H:i:s', time());
    $estatus = '2';
    $consulta = mysqli_query($con,"UPDATE consultas SET hora_fin='$hora_fin', estatus='$estatus' where id_consulta='$id_consulta'");
    if (!$consulta){
    echo "error al registrar en la base de datos" . mysql_error();
    }else{
    echo "1";
    }
  }
  

?>