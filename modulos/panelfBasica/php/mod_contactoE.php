<?php 
  require("../../includes/conexion.php");
  $id_datos= $_POST["id_datos"];
  $tipo_datos= $_POST["tipo_datos"];
  $telefono= $_POST["telefono"];
  $celular= $_POST["celular"];
  $email= $_POST["email"];
  $datos="";
  $datos_id="";
switch ($tipo_datos){
case 1:
$datos="alumnos";
$datos_id="id_alumno";
break;
case 2:
$datos="docentes";
$datos_id="id_docente";
break;
case 3:
$datos="administrativos";
$datos_id="id_administrativo";
break;
case 99:
$datos="administrativos";
$datos_id="id_administrativo";
break;
} 
$sql = "UPDATE $datos SET telefono='$telefono', celular='$celular', email
='$email' WHERE $datos_id='$id_datos'";
   $insertar = $db->query($sql);
    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
 ?>