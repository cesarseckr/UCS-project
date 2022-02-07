<?php 
    require("../../includes/conexion.php");

    $siglas = $_POST["siglas"];
    $nombre = $_POST["nombres"];
    $direccion= $_POST["direccion"];
    $id_estado= $_POST["estado"];
    $id_municipio= $_POST["municipio"];
    $telefono= $_POST["telefono"];
    $tipo= $_POST["tipo"];
    $estatus= $_POST["estatus_a"];
    
  $sql ="INSERT INTO sedes (siglas, nombre, direccion, id_estado, id_municipio, telefono, tipo, estatus) VALUES ('$siglas','$nombre','$direccion','$id_estado','$id_municipio','$telefono','$tipo','$estatus')";
    $insertar = $db->query($sql);

    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
 ?>