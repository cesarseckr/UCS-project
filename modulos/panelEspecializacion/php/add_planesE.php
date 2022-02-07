<?php 
    require("../../includes/conexion.php");

    $nombres = $_POST["nombres"];
    $estatus= $_POST["estatus_a"];
    $clave = $_POST["clave"];
    $calif= $_POST["calif"];
    $asistencia = $_POST["asistencia"];
    $per_evaluacion = $_POST["per_evaluacion"];
    $per_extra = $_POST["per_extra"];
    $per_especial = $_POST["per_especial"];
  
  $dup=0;
    $sql="SELECT * FROM planes where clave='$clave'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $dup=1;
      }
if($dup==0){
  $sql ="INSERT INTO planes (clave, nombre, per_evaluacion, per_extra, per_especial, calif_minima, asistencia_minima, estado) VALUES ('$clave','$nombres','$per_evaluacion','$per_extra','$per_especial','$calif','$asistencia','$estatus')";
    $insertar = $db->query($sql);

    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
        }
        else{
          echo 5;
        }
 ?>