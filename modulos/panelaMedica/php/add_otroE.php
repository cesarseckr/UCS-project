<?php 
	require("../../includes/conexioncon.php");

	  $nombre = $_POST["nombre"];
    $edad= $_POST["edad"];
    $sexo = $_POST["sexo"];

    $consulta = mysqli_query($con,"INSERT INTO otro (nombre, edad, sexo) VALUES ('$nombre','$edad','$sexo')");

    if (!$consulta){
  		echo "error al registrar en la base de datos" . mysql_error();
  	}else{
      require("../../includes/conexion.php");
      $recuperar="SELECT * FROM otro WHERE nombre = '$nombre' AND edad='$edad' AND sexo='$sexo' LIMIT 1";
      $sq= $db->query($recuperar);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $id=$row["id_otro"];  
      }
      echo $id;
  	}

 ?>