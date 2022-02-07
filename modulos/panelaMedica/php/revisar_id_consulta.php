<?php 
	require("../../includes/conexioncon.php");
	$dirigir = $_POST["dirigir"];

	if ($dirigir == 1) {
		if (isset($_POST["id_consulta"])) {
	  		$id_consulta = $_POST["id_consulta"];
	  		$consulta = mysqli_query($con,"SELECT count(*) as resultado from diagnostico WHERE id_consulta ='$id_consulta'");
	  		$row = mysqli_fetch_assoc($consulta);
	  		$resultado = $row['resultado'];
	    	echo $resultado;
    	}
	}else if($dirigir == 2){
		if (isset($_POST["id_consulta"])) {
	  		$id_consulta = $_POST["id_consulta"];
	  		$consulta = mysqli_query($con,"SELECT count(*) as resultado from acciones_enfermeria WHERE id_consulta ='$id_consulta'");
	  		$row = mysqli_fetch_assoc($consulta);
	  		$resultado = $row['resultado'];
	    	echo $resultado;
    	}
	}	
 ?>