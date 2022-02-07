<?php 
    require("../../includes/conexion.php");
    
    $id = $_POST["id_m"];
    $nombres = $_POST["nombres_m"];
    $estatus= $_POST["estatus_a_m"];

     $sql ="UPDATE equivalencia SET nombre='$nombres', estatus='$estatus' WHERE id_equivalencia='$id'";
    $insertar = $db->query($sql);
    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
 ?>