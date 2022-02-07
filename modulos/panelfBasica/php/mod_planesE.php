<?php 
    require("../../includes/conexion.php");
    
    $id = $_POST["id_m"];
    $nombres = $_POST["nombres_m"];
    $estatus= $_POST["estatus_a_m"];
    $clave = $_POST["clave_m"];
    $calif= $_POST["calif_m"];
    $asistencia = $_POST["asistencia_m"];
    $per_evaluacion = $_POST["per_evaluacion_m"];
    $per_extra = $_POST["per_extra_m"];
    $per_especial = $_POST["per_especial_m"];

  $dup=0;
    $sql="SELECT * FROM planes where clave='$clave' and id_plan<>'$id'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $dup=1;
      }
      if($dup==0){
     $sql ="UPDATE planes SET clave='$clave', nombre='$nombres', per_evaluacion='$per_evaluacion', per_extra='$per_extra', per_especial='$per_especial', calif_minima='$calif', asistencia_minima='$asistencia', estado='$estatus' WHERE id_plan='$id'";
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