<?php
  include("../../includes/conexion.php");
  $id_historia = $_POST['id_historia'];


  $sql="SELECT * FROM antecedentes_patologicos WHERE id_historia_medica='$id_historia'"; 
  $sq = $db->query($sql); 
  $rows= $sq->fetchAll();
  $comp=0;
  foreach ($rows as $row) { 
    $comp=1; 
    $id_pat=$row["id_pat"];
    $hipertension=$row["hipertension"];
    $cardiacas=$row["cardiacas"];
    $respiratorias=$row["respiratorias"];
    $tiroides=$row["tiroides"];
    $diabetes=$row["diabetes"];
    $digestivas=$row["digestivas"];
    $piel_pat=$row["piel"];
    $onicomicosis=$row["onicomicosis"];  
    $convulsiones=$row["convulsiones"]; 
    $transfusiones=$row["transfusiones"];
    $renales=$row["renales"];  
  }

  if($comp == 0){
    require("../../includes/conexioncon.php");
    $consulta = mysqli_query($con,"INSERT INTO antecedentes_patologicos(id_historia_medica) VALUES ('$id_historia')");
    if (!$consulta){
        echo "  error" . mysql_error();
    }else{
      $sql="SELECT * FROM antecedentes_patologicos WHERE id_historia_medica='$id_historia'"; 
      $sq = $db->query($sql); 
      $rows= $sq->fetchAll();
      foreach ($rows as $row) {  
        $id_pat=$row["id_pat"];
        $hipertension=$row["hipertension"];
        $cardiacas=$row["cardiacas"];
        $respiratorias=$row["respiratorias"];
        $tiroides=$row["tiroides"];
        $diabetes=$row["diabetes"];
        $digestivas=$row["digestivas"];
        $piel_pat=$row["piel"];
        $onicomicosis=$row["onicomicosis"];  
        $convulsiones=$row["convulsiones"]; 
        $transfusiones=$row["transfusiones"];
        $renales=$row["renales"]; 
      }
      $arreglo= array('id_pat' => $id_pat,
        'hipertension' => $hipertension,
        'cardiacas' => $cardiacas,
        'respiratorias' => $respiratorias,
        'tiroides' => $tiroides,
        'diabetes' => $diabetes,
        'digestivas' => $digestivas,
        'piel_pat' => $piel_pat,
        'onicomicosis' => $onicomicosis,
        'convulsiones' => $convulsiones,
        'transfusiones' => utf8_encode($transfusiones),
        'renales' => utf8_encode($renales));
      echo json_encode($arreglo);
    }
  }else{ 
    $arreglo= array('id_pat' => $id_pat,
    'hipertension' => $hipertension,
    'cardiacas' => $cardiacas,
    'respiratorias' => $respiratorias,
    'tiroides' => $tiroides,
    'diabetes' => $diabetes,
    'digestivas' => $digestivas,
    'piel_pat' => $piel_pat,
    'onicomicosis' => $onicomicosis,
    'convulsiones' => $convulsiones,
    'transfusiones' => $transfusiones,
    'renales' => $renales);
    echo json_encode($arreglo);
  }   
?>