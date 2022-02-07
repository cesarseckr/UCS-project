<?php 
    require("../../includes/conexion.php");

    $nombres = $_POST["nombres"];
    $plan = $_POST["plan"];
    $estatus= $_POST["estatus_a"];
    $clave = $_POST["clave"];
    $fecha_inicio= $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];
  
  $dup=0;
    $sql="SELECT * FROM ciclo where clave='$clave'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $dup=1;
      }
if($dup==0){
  $sql ="INSERT INTO ciclo (clave, nombre, fecha_inicio, fecha_fin, id_plan, estatus) VALUES ('$clave','$nombres','$fecha_inicio','$fecha_fin','$plan','$estatus')";
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