<?php 
	session_start();
    include("../../includes/conexion.php");

    $id_area=$_SESSION['id_area'];

    $sql="SELECT * FROM tickets WHERE id_area='$id_area'";
    $sq=$db->query($sql);
    $rows=$sq->fetchAll();
    $cont=0;
    foreach($rows as $row){
    	$id_tickets=$row['id_tickets'];
    	$sql_tickets="SELECT * FROM contenido_tickets WHERE estatus='1' and id_tickets='$id_tickets'";
    	$sq_tickets=$db->query($sql_tickets);
    	$rows_tickets=$sq_tickets->fetchAll();
    	foreach ($rows_tickets as $row_tickets) {
    		$cont++;
    	}
    }
    echo $cont;
 ?>