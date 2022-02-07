<?php session_start(); 
  require("../../includes/conexion.php");
  $id_usuario= $_POST["id_usuario"];
  $pass= base64_encode($_POST["pass"]);

$sql = "UPDATE usuarios SET pass='$pass' WHERE id_usuario='$id_usuario'";
   $insertar = $db->query($sql);
    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
    	$_SESSION['pass']=$pass;
        echo 1;
          }
 ?>