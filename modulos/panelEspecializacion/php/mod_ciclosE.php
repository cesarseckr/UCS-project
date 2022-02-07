<?php 
    require("../../includes/conexion.php");
    
    $id = $_POST["id_m"];
    $nombres = $_POST["nombres_m"];
    $estatus= $_POST["estatus_a_m"];
    $plan= $_POST["plan_m"];
    $clave = $_POST["clave_m"];
    $fecha_inicio= $_POST["fecha_inicio_m"];
    $fecha_fin = $_POST["fecha_fin_m"];

  $dup=0;
    $sql="SELECT * FROM ciclo where clave='$clave' and id_ciclo<>'$id'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $dup=1;
      }
      if($dup==0){
     $sql ="UPDATE ciclo SET clave='$clave', nombre='$nombres', fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin', id_plan='$plan', estatus='$estatus' WHERE id_ciclo='$id'";
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