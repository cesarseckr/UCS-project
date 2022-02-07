<?php 
  include('../../includes/conexion.php');
  $id_datos = $_POST['id_datos'];
  $tipo = $_POST['tipo'];
  $sql= "SELECT * FROM consultas WHERE tipo_paciente='$tipo' and id_paciente='$id_datos' ORDER BY id_consulta DESC LIMIT 1";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll();
  if($rows!=null){
    foreach ($rows as $row) {
      $fecha=$row['fecha'];
      $id_consulta=$row['id_consulta'];
      $sql = "SELECT * FROM consulta_somatometria WHERE id_consulta='$id_consulta'";
      $sq = $db->query($sql);
      $rows = $sq->fetchAll();
      if($rows!=null){
        $i=0;
        foreach ($rows as $row) {
          $somatometria[$i]["fecha"]=$fecha;
          $somatometria[$i]["talla"]=utf8_encode($row["talla"]);
          $somatometria[$i]["peso"]=utf8_encode($row["peso"]);
          $somatometria[$i]["imc"]=utf8_encode($row["imc"]);
          $i++;
        }
        $somatometria= json_encode($somatometria);  
        echo $somatometria;
      }else{
        $sql= "SELECT * FROM historias_medicas WHERE tipo='$tipo' and id_datos='$id_datos'";
        $sq = $db->query($sql);
        $rows= $sq->fetchAll();
        foreach ($rows as $row) {
          $fecha=$row['fecha'];
          $id_historia_medica=$row['id_historia_medica'];
          $sql= "SELECT * FROM examen_medico WHERE id_historia_medica='$id_historia_medica'";
          $sq = $db->query($sql);
          $rows= $sq->fetchAll();
          $i=0;
          foreach ($rows as $row) {
            $somatometria[$i]["fecha"]=$fecha;
            $somatometria[$i]["talla"]=utf8_encode($row["talla"]);
            $somatometria[$i]["peso"]=utf8_encode($row["peso"]);
            $somatometria[$i]["imc"]=utf8_encode($row["imc"]);
            $i++;
          }
          $somatometria= json_encode($somatometria);
          echo $somatometria;
        }
      }
    }
  }else{
    $sql= "SELECT * FROM historias_medicas WHERE tipo='$tipo' and id_datos='$id_datos'";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll();
    foreach ($rows as $row) {
      $fecha=$row['fecha'];
      $id_historia_medica=$row['id_historia_medica'];
      $sql= "SELECT * FROM examen_medico WHERE id_historia_medica='$id_historia_medica'";
      $sq = $db->query($sql);
      $rows= $sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $somatometria[$i]["fecha"]=$fecha;
        $somatometria[$i]["talla"]=utf8_encode($row["talla"]);
        $somatometria[$i]["peso"]=utf8_encode($row["peso"]);
        $somatometria[$i]["imc"]=utf8_encode($row["imc"]);
        $i++;
      }
      $somatometria= json_encode($somatometria);
      echo $somatometria;
    }
  }
  
?>