<?php
  include("../../includes/conexion.php");
  $id_historia = $_POST['id_historia'];


  $sql="SELECT * FROM antecedentes_ginecologicos WHERE id_historia_medica='$id_historia'"; 
  $sq = $db->query($sql); 
  $rows= $sq->fetchAll();
  $comp=0;
  foreach ($rows as $row) { 
    $comp=1; 
    $id_ant_gin=$row["id_ant_gin"];
    $embarazos=$row["embarazos"];
    $partos=$row["partos"];
    $cesareas=$row["cesareas"];
    $abortos=$row["abortos"];
    $fum=$row["fum"];
    $salpingoclasia=$row["salpingoclasia"];
    $histerectomia=$row["histerectomia"];
    $quistes=$row["quistes"];  
    $hemorragias=$row["hemorragias"]; 
    $observaciones=$row["observaciones"];
  }

  if($comp == 0){
    require("../../includes/conexioncon.php");
    $consulta = mysqli_query($con,"INSERT INTO antecedentes_ginecologicos(id_historia_medica) VALUES ('$id_historia')");
    if (!$consulta){
        echo "  error" . mysql_error();
    }else{
      $sql="SELECT * FROM antecedentes_ginecologicos WHERE id_historia_medica='$id_historia'"; 
      $sq = $db->query($sql); 
      $rows= $sq->fetchAll();
      foreach ($rows as $row) {  
        $id_ant_gin=$row["id_ant_gin"];
        $embarazos=$row["embarazos"];
        $partos=$row["partos"];
        $cesareas=$row["cesareas"];
        $abortos=$row["abortos"];
        $fum=$row["fum"];
        $salpingoclasia=$row["salpingoclasia"];
        $histerectomia=$row["histerectomia"];
        $quistes=$row["quistes"];  
        $hemorragias=$row["hemorragias"];
        $observaciones=$row["observaciones"]; 
      }
      $arreglo= array('id_ant_gin' => $id_ant_gin,
        'embarazos' => $embarazos,
        'partos' => $partos,
        'cesareas' => $cesareas,
        'abortos' => $abortos,
        'fum' => $fum,
        'salpingoclasia' => $salpingoclasia,
        'histerectomia' => $histerectomia,
        'quistes' => $quistes,
        'observaciones' => $observaciones,
        'hemorragias,' => $hemorragias);
      echo json_encode($arreglo);
    }
  }else{ 
    $arreglo= array('id_ant_gin' => $id_ant_gin,
        'embarazos' => $embarazos,
        'partos' => $partos,
        'cesareas' => $cesareas,
        'abortos' => $abortos,
        'fum' => $fum,
        'salpingoclasia' => $salpingoclasia,
        'histerectomia' => $histerectomia,
        'quistes' => $quistes,
        'observaciones' => $observaciones,
        'hemorragias,' => $hemorragias);
    echo json_encode($arreglo);
  }   
?>