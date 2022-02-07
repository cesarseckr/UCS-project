<?php
  include("../../includes/conexion.php");
  $id_historia = $_POST['id_historia'];


  $sql="SELECT * FROM antecedentes_nopatologicos WHERE id_historia_medica='$id_historia'"; 
  $sq = $db->query($sql); 
  $rows= $sq->fetchAll();
  $comp=0;
  foreach ($rows as $row) { 
    $comp=1; 
    $id_nopat=$row["id_nopat"];
    $alcoholismo=$row["alcoholismo"];
    $tabaquismo=$row["tabaquismo"];
    $alergias=$row["alergias"]; 
    $toxicomanias=$row["toxicomanias"];
    $medicamentos=$row["medicamentos"];
    $especificacion=$row["especificacion"];
    $cicatrices=$row["cicatrices"];
    $tatuajes=$row["tatuajes"];  
    $amputaciones=$row["amputaciones"]; 
  }

  if($comp == 0){
    require("../../includes/conexioncon.php");
    $consulta = mysqli_query($con,"INSERT INTO antecedentes_nopatologicos(id_historia_medica) VALUES ('$id_historia')");
    if (!$consulta){
        echo "  error" . mysql_error();
    }else{
      $sql="SELECT * FROM antecedentes_nopatologicos WHERE id_historia_medica='$id_historia'"; 
      $sq = $db->query($sql); 
      $rows= $sq->fetchAll();
      foreach ($rows as $row) {  
        $id_nopat=$row["id_nopat"];
        $alcoholismo=$row["alcoholismo"];
        $tabaquismo=$row["tabaquismo"];
        $alergias=$row["alergias"]; 
        $toxicomanias=$row["toxicomanias"];
        $medicamentos=$row["medicamentos"];
        $especificacion=$row["especificacion"];
        $cicatrices=$row["cicatrices"];
        $tatuajes=$row["tatuajes"];  
        $amputaciones=$row["amputaciones"]; 
      }
      $arreglo= array('id_nopat' => $id_nopat,
      'alcoholismo' => $alcoholismo,
      'tabaquismo' => $tabaquismo,
      'alergias' => $alergias,
      'toxicomanias' => $toxicomanias,
      'medicamentos' => $medicamentos,
      'especificacion' => $especificacion,
      'cicatrices' => $cicatrices,
      'tatuajes' => $tatuajes,
      'amputaciones' => $amputaciones);
      echo json_encode($arreglo);
    }
  }else{ 
    $arreglo= array('id_nopat' => $id_nopat,
    'alcoholismo' => $alcoholismo,
    'tabaquismo' => $tabaquismo,
    'alergias' => $alergias,
    'toxicomanias' => $toxicomanias,
    'medicamentos' => $medicamentos,
    'especificacion' => $especificacion,
    'cicatrices' => $cicatrices,
    'tatuajes' => $tatuajes,
    'amputaciones' => $amputaciones);
    echo json_encode($arreglo);
  }   
?>