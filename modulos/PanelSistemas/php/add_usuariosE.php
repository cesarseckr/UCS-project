<?php 
    require("../../includes/conexioncon.php");

    $id_u=$_POST["id_u"];
    $id_datos=$_POST["id_datos"]; 
    $tipo= $_POST["tipo"];
    $area_admin= $_POST["area_admin"];
    $usuario= $_POST["usuario"];
    $pass= base64_encode($_POST["pass"]);
    $estatus= $_POST["estatus"];

    $query="SELECT * FROM usuarios where usuario='$usuario'";
    $registro = $con-> query($query);

    if($registro->num_rows >0){
        echo"Nombre de usuario ya esta registrado, intenta con otro";
    }else{
        $consulta = mysqli_query($con,"INSERT INTO usuarios (id_usuario, id_datos, tipo, area_admin, usuario, pass, estatus) VALUES ('','$id_datos','$tipo','$area_admin','$usuario','$pass','$estatus')");
    if (!$consulta){
        echo "  error" . mysql_error();
    }else{
        echo"1";
    }
  }
 ?>