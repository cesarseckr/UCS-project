<?php 
    session_start();
    $id_tickets=$_POST['id_tickets'];

    require("../../includes/conexioncon.php");

    $consulta = mysqli_query($con,"UPDATE tickets SET estado='2' WHERE id_tickets='$id_tickets'");

    if (!$consulta){
            echo "  error" . mysql_error();
        }else{
            echo"1";  
        }
 ?>