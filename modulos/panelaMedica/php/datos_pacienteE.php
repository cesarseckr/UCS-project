<?php 
  include("../../includes/conexion.php");
  
  $tipo = $_POST['tipo'];
  $id_datos = $_POST['id_datos'];

  if ($tipo == 1) {
    $sql="SELECT * FROM alumnos WHERE id_alumno='$id_datos'";
    $sq = $db->query($sql); 
    $rows= $sq->fetchAll();
    foreach ($rows as $row) { 
      $nombre_pac=$row["apaterno"]." ".$row["amaterno"]." ".$row["nombres"];
      $fecha1 = new DateTime($row["fechanac"]); 
      $fecha2 = new DateTime(date('Y-m-d'));
      $fecha = $fecha1->diff($fecha2);
      $edad_pac = $fecha->y;
      $sexo_pac=$row["sexo"];
      $dom_pac=$row["domicilio"].", ".$row["colonia"];
      $mun_pac=$row["municipio"];
      $edo_pac=$row["estado"];
      $cp_pac=$row["cp"];
    }
    $arreglo= array(
      'nombre_pac' => $nombre_pac,
      'edad_pac' => $edad_pac,
      'sexo_pac' => $sexo_pac,
      'dom_pac' => $dom_pac,
      'mun_pac' => $mun_pac,
      'edo_pac' => $edo_pac,
      'cp_pac' => $cp_pac);
    echo json_encode($arreglo);
  } elseif($tipo == 2) {
    $sql="SELECT * FROM docentes WHERE id_docente='$id_datos'";
    $sq = $db->query($sql); 
    $rows= $sq->fetchAll();
    foreach ($rows as $row) { 
      $nombre_pac=$row["apaterno"]." ".$row["amaterno"]." ".$row["nombres"];
      $fecha1 = new DateTime($row["fechanac"]); 
      $fecha2 = new DateTime(date('Y-m-d'));
      $fecha = $fecha1->diff($fecha2);
      $edad_pac = $fecha->y;
      $sexo_pac=$row["sexo"];
      $dom_pac=$row["domicilio"].", ".$row["colonia"];
      $mun_pac=$row["municipio"];
      $edo_pac=$row["estado"];
      $cp_pac=$row["cp"];
    }
    $arreglo= array(
      'nombre_pac' => $nombre_pac,
      'edad_pac' => $edad_pac,
      'sexo_pac' => $sexo_pac,
      'dom_pac' => $dom_pac,
      'mun_pac' => $mun_pac,
      'edo_pac' => $edo_pac,
      'cp_pac' => $cp_pac);
    echo json_encode($arreglo);
  } elseif($tipo == 3) {
    $sql="SELECT * FROM administrativos WHERE id_administrativo='$id_datos'";
    $sq = $db->query($sql); 
    $rows= $sq->fetchAll();
    foreach ($rows as $row) { 
      $nombre_pac=$row["apaterno"]." ".$row["amaterno"]." ".$row["nombres"];
      $fecha1 = new DateTime($row["fechanac"]); 
      $fecha2 = new DateTime(date('Y-m-d'));
      $fecha = $fecha1->diff($fecha2);
      $edad_pac = $fecha->y;
      $sexo_pac=$row["sexo"];
      $dom_pac=$row["domicilio"].", ".$row["colonia"];
      $mun_pac=$row["municipio"];
      $edo_pac=$row["estado"];
      $cp_pac=$row["cp"];
    }
    $arreglo= array(
      'nombre_pac' => $nombre_pac,
      'edad_pac' => $edad_pac,
      'sexo_pac' => $sexo_pac,
      'dom_pac' => $dom_pac,
      'mun_pac' => $mun_pac,
      'edo_pac' => $edo_pac,
      'cp_pac' => $cp_pac);
    echo json_encode($arreglo);
  }
 ?>