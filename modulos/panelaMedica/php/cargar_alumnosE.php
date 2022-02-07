<?php session_start();
  
include('../../includes/conexion.php');

$id_generacion=$_POST['id_generacion'];
$sql="SELECT * FROM alumnos WHERE id_generacion='$id_generacion' ORDER BY id_alumno DESC";
$sq= $db->query($sql);
$rows=$sq->fetchAll();
$i=0;
foreach ($rows as $row) {
  $alumnos[$i]["id_alumno"]=utf8_encode($row["id_alumno"]);
  $alumnos[$i]["nombre"]=utf8_encode($row["nombres"]." ".$row["apaterno"]." ".$row["amaterno"]."-".$row["curp"]);
  $i++;
}
$valores= json_encode($alumnos);
echo $valores;
?>