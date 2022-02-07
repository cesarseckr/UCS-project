<?php 
	require("conexioncon.php");
	$salida="";

	$q = $con -> real_escape_string($_POST['consulta']);
	$query="SELECT concat(nombres,' ', apaterno,' ',amaterno) as Nombre FROM alumnos WHERE matricula LIKE '".$q."' or curp LIKE '".$q."'"; 


	$resultado = $con->query($query);

	if ($resultado->num_rows >0 ) {
		while ($fila = $resultado->fetch_assoc()){
			$salida.=
			"<p>".$fila['Nombre']."</p>
			";
		}

	}else{
		$salida.="Clave no valida";
	}

	echo $salida;
	$con->close();

?>