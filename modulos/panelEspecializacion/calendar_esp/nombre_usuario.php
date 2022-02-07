<?php 
 include("../../includes/conexion.php");
 $id=$_POST['responsable'];


 $sql ="SELECT id_datos,usuario FROM usuarios WHERE id_usuario='$id'";
 $sq = $db->query($sql);
 $rows= $sq->fetchAll();

 foreach ($rows as $row) {
 	$id_datos=$row['id_datos'];
 }

 $sql ="SELECT * FROM administrativos WHERE id_administrativo='$id_datos'";
 $sq = $db->query($sql);
 $rows= $sq->fetchAll();

 foreach ($rows as $row) {
 	echo $row['nombres']." ".$row['apaterno']." ".$row['amaterno'];
 }
 
?>
