<?php  session_start();
 include("../includes/conexion.php");

$accion=(isset($_GET['accion']))?$_GET['accion']:'leer';

$id=$_POST['id'];
$title = $_POST['title'];
$descripcion = $_POST['descripcion'];
$color = $_POST['color'];
$textColor = $_POST['textColor'];
$start = $_POST['start'];
$end = $_POST['end'];
$id_usuario=$_SESSION['id_usuario'];

 switch ($accion) {
 	case 'agregar':
 		$sql ="INSERT INTO eventos(id_eventos, title, descripcion, color, textColor, start, end, id_encargado) values ('', '$title', '$descripcion', '$color', '$textColor', '$start', '$end',$id_usuario)";
 		$sq = $db->query($sql);
 		echo "registros realizados";
 		break;
 	case 'eliminar':
 		$sql ="DELETE FROM eventos WHERE id_eventos='$id'";
 		$sq = $db->query($sql);
 		echo "registros eliminados";
 		break;
 	case 'modificar':
 		$sql ="UPDATE eventos SET title='$title', descripcion='$descripcion', color='$color', textColor='$textColor', start='$start', end='$end' WHERE id_eventos='$id'";
 		$sq = $db->query($sql);
 		echo "registros modificados";
 		break;
 	default:
 		$sql ="SELECT * FROM eventos";
 		$sq = $db->query($sql);
 		$rows= $sq->fetchAll();
		echo json_encode($rows);
 		break;
 }


?> 
