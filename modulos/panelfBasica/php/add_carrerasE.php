<?php 
    require("../../includes/conexion.php");

    $nombres = $_POST["nombres"];
    $estatus= $_POST["estatus_a"];
    $clave = $_POST["clave"];
    $academia = $_POST["academia"];
    $tipo = $_POST["tipo_area"];
  
  $dup=0;
    $sql="SELECT * FROM carrera where clave='$clave'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $dup=1;
      }
if($dup==0){
  $sql ="INSERT INTO carrera (nombre, id_academia, clave, tipo, estatus) VALUES ('$nombres', '$academia', '$clave', '$tipo', '$estatus')";
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