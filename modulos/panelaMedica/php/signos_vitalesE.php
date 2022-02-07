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
      $sql = "SELECT * FROM consulta_svitales WHERE id_consulta='$id_consulta'";
      $sq = $db->query($sql);
      $rows = $sq->fetchAll();
      if($rows!=null){
        $i=0;
        foreach ($rows as $row) {
          $svitales[$i]["fecha"]=$fecha;
          $svitales[$i]["presion_arterial"]=utf8_encode($row["presion_arterial"]);
          $svitales[$i]["f_cardiaca"]=utf8_encode($row["f_cardiaca"]);
          $svitales[$i]["f_respiratoria"]=utf8_encode($row["f_respiratoria"]);
          $svitales[$i]["temp"]=utf8_encode($row["temp"]);
          $i++;
        }
        $svitales= json_encode($svitales);
        echo $svitales;
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
            $svitales[$i]["fecha"]=$fecha;
            $svitales[$i]["presion_arterial"]=utf8_encode($row["presion_arterial"]);
            $svitales[$i]["f_cardiaca"]=utf8_encode($row["f_cardiaca"]);
            $svitales[$i]["f_respiratoria"]=utf8_encode($row["f_respiratoria"]);
            $svitales[$i]["temp"]=utf8_encode($row["temp"]);
            $i++;
          }
          $svitales= json_encode($svitales);
          echo $svitales;
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
        $svitales[$i]["fecha"]=$fecha;
        $svitales[$i]["presion_arterial"]=utf8_encode($row["presion_arterial"]);
        $svitales[$i]["f_cardiaca"]=utf8_encode($row["f_cardiaca"]);
        $svitales[$i]["f_respiratoria"]=utf8_encode($row["f_respiratoria"]);
        $svitales[$i]["temp"]=utf8_encode($row["temp"]);
        $i++;
      }
      $svitales= json_encode($svitales);
      echo $svitales;
    }
  }
  
?>