<?php 
	session_start();
	require("../../includes/conexioncon.php");
    $id_usuario= $_SESSION["id_usuario"];
    $fecha=date('Y-m-d', time())." ".date('H:i:s', time());
    $id_tickets=$_POST['id_tickets'];
    $mensaje=$_POST['mensaje'];

    $consulta = mysqli_query($con,"INSERT INTO contenido_tickets(id_usuario_respuesta,estatus,fecha_hora_origen,mensaje_origen, id_tickets) VALUES ('$id_usuario','1','$fecha','$mensaje','$id_tickets')");
    if (!$consulta){
        echo "  error" . mysql_error();
    }else{
        $consulta = mysqli_query($con,"UPDATE `contenido_tickets` SET estatus='2' WHERE id_tickets='$id_tickets'");
    	if (!$consulta){
        echo "  error" . mysql_error();
        }else{
            echo"1";
        }
    }

 ?>