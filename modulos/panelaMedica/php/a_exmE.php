<?php
  include("../../includes/conexion.php");
  $id_historia = $_POST['id_historia'];


  $sql="SELECT * FROM examen_medico WHERE id_historia_medica='$id_historia'"; 
  $sq = $db->query($sql); 
  $rows= $sq->fetchAll();
  $comp=0;
  foreach ($rows as $row) { 
    $comp=1; 
    $id_examenm=$row["id_examenm"];
    $presion_arterial=$row["presion_arterial"];
    $f_cardiaca=$row["f_cardiaca"];
    $f_respiratoria=$row["f_respiratoria"];
    $temp=$row["temp"];
    $sat=$row["sat"];
    $auditivo_d=$row["auditivo_d"];
    $auditivo_i=$row["auditivo_i"];
    $gluc=$row["gluc"];  
    $visual_d=$row["visual_d"]; 
    $visual_i=$row["visual_i"]; 
    $pterigion=$row["pterigion"]; 
    $lentes=$row["lentes"]; 
    $talla=$row["talla"]; 
    $peso=$row["peso"]; 
    $imc=$row["imc"]; 
    $clasificacion=$row["clasificacion"]; 
    $cardiopulmonar=$row["cardiopulmonar"]; 
    $musculoesqueletico=$row["musculoesqueletico"]; 
    $piel_exmn=$row["piel_exmn"]; 
    $vascular_p=$row["vascular_p"]; 
    $digestivo=$row["digestivo"]; 
    $nervioso=$row["nervioso"]; 
    $urinario=$row["urinario"]; 
    $reproductor=$row["reproductor"];
    $observaciones=$row["observaciones"]; 

  }

  if($comp == 0){
    require("../../includes/conexioncon.php");
    $consulta = mysqli_query($con,"INSERT INTO examen_medico(id_historia_medica) VALUES ('$id_historia')");
    if (!$consulta){
        echo "  error" . mysql_error();
    }else{
      $sql="SELECT * FROM examen_medico WHERE id_historia_medica='$id_historia'"; 
      $sq = $db->query($sql); 
      $rows= $sq->fetchAll();
      foreach ($rows as $row) {  
        $id_examenm=$row["id_examenm"];
        $presion_arterial=$row["presion_arterial"];
        $f_cardiaca=$row["f_cardiaca"];
        $f_respiratoria=$row["f_respiratoria"];
        $temp=$row["temp"];
        $sat=$row["sat"];
        $auditivo_d=$row["auditivo_d"];
        $auditivo_i=$row["auditivo_i"];
        $gluc=$row["gluc"];  
        $visual_d=$row["visual_d"]; 
        $visual_i=$row["visual_i"]; 
        $pterigion=$row["pterigion"]; 
        $lentes=$row["lentes"]; 
        $talla=$row["talla"]; 
        $peso=$row["peso"]; 
        $imc=$row["imc"]; 
        $clasificacion=$row["clasificacion"]; 
        $cardiopulmonar=$row["cardiopulmonar"]; 
        $musculoesqueletico=$row["musculoesqueletico"]; 
        $piel_exmn=$row["piel_exmn"]; 
        $vascular_p=$row["vascular_p"]; 
        $digestivo=$row["digestivo"]; 
        $nervioso=$row["nervioso"]; 
        $urinario=$row["urinario"]; 
        $reproductor=$row["reproductor"];
        $observaciones=$row["observaciones"]; 
      }
      $arreglo= array('id_examenm' => $id_examenm,
        'presion_arterial' => $presion_arterial,
        'f_cardiaca' => $f_cardiaca,
        'f_respiratoria' => $f_respiratoria,
        'temp' => $temp,
        'sat' => $sat,
        'auditivo_d' => $auditivo_d,
        'auditivo_i' => $auditivo_i,
        'gluc' => $gluc,
        'visual_d' => $visual_d,
        'visual_i' => $visual_i,
        'pterigion' => $pterigion,
        'lentes' => $lentes,
        'talla' => $talla,
        'peso' => $peso,
        'imc' => $imc,
        'clasificacion' => $clasificacion,
        'cardiopulmonar' => $cardiopulmonar,
        'musculoesqueletico' => $musculoesqueletico,
        'piel_exmn' => $piel_exmn,
        'vascular_p' => $vascular_p,
        'digestivo' => $digestivo,
        'nervioso' => $nervioso,
        'urinario' => $urinario,
        'reproductor' => $reproductor,
        'observaciones' => $observaciones);
      echo json_encode($arreglo);
    }
  }else{ 
      $arreglo= array('id_examenm' => $id_examenm,
        'presion_arterial' => $presion_arterial,
        'f_cardiaca' => $f_cardiaca,
        'f_respiratoria' => $f_respiratoria,
        'temp' => $temp,
        'sat' => $sat,
        'auditivo_d' => $auditivo_d,
        'auditivo_i' => $auditivo_i,
        'gluc' => $gluc,
        'visual_d' => $visual_d,
        'visual_i' => $visual_i,
        'pterigion' => $pterigion,
        'lentes' => $lentes,
        'talla' => $talla,
        'peso' => $peso,
        'imc' => $imc,
        'clasificacion' => $clasificacion,
        'cardiopulmonar' => $cardiopulmonar,
        'musculoesqueletico' => $musculoesqueletico,
        'piel_exmn' => $piel_exmn,
        'vascular_p' => $vascular_p,
        'digestivo' => $digestivo,
        'nervioso' => $nervioso,
        'urinario' => $urinario,
        'reproductor' => $reproductor,
        'observaciones' => $observaciones);
      echo json_encode($arreglo);
  }   
?>