<?php 
    require("../../includes/conexion.php");

    $id_grupo = $_POST["grupo_d"];
    $id_generacion= $_POST["generacion_d"];
    $id_aula= $_POST["aula"];

    $comp=0;
    $sql="SELECT * FROM grupo where id_grupo='$id_grupo'";
    $sq= $db->query($sql);
    $rows=$sq->fetchAll();
    foreach ($rows as $row) {
    $id_ciclo=$row['id_ciclo'];
    $sql="SELECT * FROM ciclo where id_ciclo='$id_ciclo'";
    $sq= $db->query($sql);
    $rows=$sq->fetchAll();
    foreach ($rows as $row) {
    $fecha_inicio=$row['fecha_inicio'];
    $fecha_fin=$row['fecha_fin'];
      } 
    }

$sql="SELECT * FROM ciclo where fecha_inicio between '$fecha_inicio' and '$fecha_fin' or fecha_fin between '$fecha_inicio' and '$fecha_fin'";
    $sq= $db->query($sql);
    $rows=$sq->fetchAll();
    foreach ($rows as $row) {
    $id_ciclo=$row["id_ciclo"];
    $sql="SELECT * FROM grupo where id_ciclo='$id_ciclo'";
    $sq= $db->query($sql);
    $rows=$sq->fetchAll();
    foreach ($rows as $row) {
    $id_grupo_comp=$row['id_grupo'];
    $sql="SELECT * FROM horarios where id_grupo='$id_grupo_comp' and id_aula='$id_aula'";
    $sq= $db->query($sql);
    $rows=$sq->fetchAll();
    foreach ($rows as $row) {
    $comp=1;
      } 
    }
  }
if($comp==0){
  $sql ="INSERT INTO horarios (id_grupo, id_generacion, id_aula) VALUES ('$id_grupo','$id_generacion','$id_aula')";
    $insertar = $db->query($sql);
  if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
 }
else{
 echo 6; 
}
  ?>