<?php  session_start();
 	include("../../includes/conexion.php");

 	$id_falta=$_POST['id_falta'];
 	$id_alumno=$_POST['id_alumno'];
 	$observaciones=$_POST['observaciones'];
 	$fecha=$_POST['fecha'];

  $sanciones = "SELECT * FROM faltas_disciplina WHERE id_faltas='$id_falta'";
  $carga_sanciones = $db->query($sanciones);
  $rows_sanciones = $carga_sanciones->fetchAll();
  foreach ($rows_sanciones as $row_sanciones) {
    $sancion1=$row_sanciones["sanciones"];
    $sancion2=$row_sanciones["primer"];
    $sancion3=$row_sanciones["segundo"];
    $sancion4=$row_sanciones["tercer"];
  }



 	$conteo = "SELECT COUNT(id_falta) AS reinc_rep FROM historial_disciplinario WHERE id_alumno='$id_alumno' AND id_falta='$id_falta'";
 	$conteo_reinc= $db->query($conteo);
  $rows_conteo=$conteo_reinc->fetchAll();
  foreach ($rows_conteo as $row_conteo) {
    $conteo_final=$row_conteo["reinc_rep"];
  }
    
  if ($conteo_final==1) {
    $nueva_reincidencia=2;
    $sancion_final=$sancion2;
  }else  if ($conteo_final==2) {
    $nueva_reincidencia=3;
    $sancion_final=$sancion3;
  }else  if ($conteo_final==3) {
    $nueva_reincidencia=4;
    $sancion_final=$sancion4;
  }else  if ($conteo_final>=4) {
    $nueva_reincidencia="Se alcanzo el limite de reincidencias";
    $sancion_final="BAJA";
  }else{
    $nueva_reincidencia=1;
    $sancion_final=$sancion1;
  }


  require("../../includes/conexioncon.php");
 	$consulta = mysqli_query($con,"INSERT INTO historial_disciplinario (id_falta, id_alumno,fecha,reincidencias,sanciones,observaciones) VALUES ('$id_falta','$id_alumno','$fecha','$nueva_reincidencia','$sancion_final','$observaciones')");

 	if (!$consulta){
      echo "error al registrar en la base de datos" . mysql_error();
    }else{
    echo"1";
    }

?>