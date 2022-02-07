<?php
  include("../../includes/conexion.php");
  $tipo = $_POST['tipo'];
  $id_datos = $_POST['id_datos'];
  $fecha = date('Y-m-d', time());

  $sql="SELECT * FROM historias_medicas WHERE tipo='$tipo' AND id_datos='$id_datos'"; 
  $sq = $db->query($sql); 
  $rows= $sq->fetchAll();
  $comp=0;
  foreach ($rows as $row) { 
    $comp=1; 
    $id_historia_medica=$row["id_historia_medica"];
    $id_datos=$row["id_datos"];
    $tipo=$row["tipo"];
    $fecha=$row["fecha"]; 
    $hospitalizacion=$row["hospitalizacion"];
    $fecha_motivo_hosp=$row["fecha_motivo_hosp"];
    $edo_civil=$row["edo_civil"];
    $ser_m=$row["servicio_medico"]; 
    $estado_m=$row["estado"];
  }

  if($comp == 0){
    require("../../includes/conexioncon.php");
    $consulta = mysqli_query($con,"INSERT INTO historias_medicas(id_datos, tipo, fecha) VALUES ('$id_datos','$tipo', '$fecha')");
    if (!$consulta){
        echo "  error" . mysql_error();
    }else{
      $sql="SELECT * FROM historias_medicas WHERE tipo='$tipo' AND id_datos='$id_datos'"; 
      $sq = $db->query($sql); 
      $rows= $sq->fetchAll();
      foreach ($rows as $row) {  
        $id_historia_medica=$row["id_historia_medica"];
        $id_datos=$row["id_datos"];
        $tipo=$row["tipo"];
        $fecha=$row["fecha"];
        $hospitalizacion=$row["hospitalizacion"];
        $fecha_motivo_hosp=$row["fecha_motivo_hosp"];
        $edo_civil=$row["edo_civil"];
        $ser_m=$row["servicio_medico"];
        $estado_m=$row["estado"]; 
      }
      $arreglo= array(
      'id_historia_medica' => $id_historia_medica,
      'fecha' => $fecha,
      'id_datos' => $id_datos,
      'tipo' => $tipo,
      'hospitalizacion' => $hospitalizacion,
      'fecha_motivo_hosp' => $fecha_motivo_hosp,
      'edo_civil' => $edo_civil,
      'ser_m' => $ser_m,
      'estado_m' => $estado_m);
      echo json_encode($arreglo);
    }
  }else{ 
    $arreglo= array(
      'id_historia_medica' => $id_historia_medica,
      'fecha' => $fecha,
      'id_datos' => $id_datos,
      'tipo' => $tipo,
      'hospitalizacion' => $hospitalizacion,
      'fecha_motivo_hosp' => utf8_encode($fecha_motivo_hosp),
      'edo_civil' => $edo_civil,
      'ser_m' => $ser_m,
      'estado_m' => $estado_m);
      echo json_encode($arreglo);
  }   
?>