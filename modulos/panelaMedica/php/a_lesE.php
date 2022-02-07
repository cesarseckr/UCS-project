<?php
  include("../../includes/conexion.php");
  $id_historia = $_POST['id_historia'];


  $sql="SELECT * FROM antecedentes_lesiones WHERE id_historia_medica='$id_historia'"; 
  $sq = $db->query($sql); 
  $rows= $sq->fetchAll();
  $comp=0;
  foreach ($rows as $row) { 
    $comp=1; 
    $id_ant_les=$row["id_ant_les"];
    $esg_cervical=$row["esg_cervical"];
    $esg_tobillo=$row["esg_tobillo"];
    $esg_rodilla=$row["esg_rodilla"];
    $lux_rodilla=$row["lux_rodilla"];
    $fracturas=$row["fracturas"];
    $hernia=$row["hernia"];
    $otras=$row["otras"];
    $lux_hombro=$row["lux_hombro"];  
    $lumbalgias=$row["lumbalgias"]; 
  }

  if($comp == 0){
    require("../../includes/conexioncon.php");
    $consulta = mysqli_query($con,"INSERT INTO antecedentes_lesiones(id_historia_medica) VALUES ('$id_historia')");
    if (!$consulta){
        echo "  error" . mysql_error();
    }else{
      $sql="SELECT * FROM antecedentes_lesiones WHERE id_historia_medica='$id_historia'"; 
      $sq = $db->query($sql); 
      $rows= $sq->fetchAll();
      foreach ($rows as $row) {  
        $id_ant_les=$row["id_ant_les"];
        $esg_cervical=$row["esg_cervical"];
        $esg_tobillo=$row["esg_tobillo"];
        $esg_rodilla=$row["esg_rodilla"];
        $lux_rodilla=$row["lux_rodilla"];
        $fracturas=$row["fracturas"];
        $hernia=$row["hernia"];
        $otras=$row["otras"];
        $lux_hombro=$row["lux_hombro"];  
        $lumbalgias=$row["lumbalgias"]; 
      }
      $arreglo= array('id_ant_les' => $id_ant_les,
        'esg_cervical' => $esg_cervical,
        'esg_tobillo' => $esg_tobillo,
        'esg_rodilla' => $esg_rodilla,
        'lux_rodilla' => $lux_rodilla,
        'fracturas' => $fracturas,
        'hernia' => $hernia,
        'otras' => $otras,
        'lux_hombro' => $lux_hombro,
        'lumbalgias' => $lumbalgias);
      echo json_encode($arreglo);
    }
  }else{ 
    $arreglo= array('id_ant_les' => $id_ant_les,
      'esg_cervical' => $esg_cervical,
      'esg_tobillo' => $esg_tobillo,
      'esg_rodilla' => $esg_rodilla,
      'lux_rodilla' => $lux_rodilla,
      'fracturas' => $fracturas,
      'hernia' => $hernia,
      'otras' => $otras,
      'lux_hombro' => $lux_hombro,
      'lumbalgias' => $lumbalgias);
    echo json_encode($arreglo);
  }   
?>