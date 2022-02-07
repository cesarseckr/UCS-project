<?php 
    require("../../includes/conexion.php");
    
    $id = $_POST["id_m"];
    $nombres = $_POST["nombres_m"];
    $estatus= $_POST["estatus_a_m"];
    $clave = $_POST["clave_m"];
    $tipo = $_POST["tipo_area_m"];
    $academia = $_POST["academia_m"];

  $dup=0;
    $sql="SELECT * FROM carrera where clave='$clave' and id_carrera<>'$id'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $dup=1;
      }
      if($dup==0){
     $sql ="UPDATE carrera SET nombre='$nombres', id_academia='$academia', clave='$clave', tipo='$tipo', estatus='$estatus' WHERE id_carrera='$id'";
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