<?php 
    require("../../includes/conexion.php");
    
    $id_horario = $_POST["id_m"];
    $id_grupo = $_POST["grupo_m_d"];
    $id_generacion= $_POST["generacion_m_d"];
    $id_aula= $_POST["aula_m"];

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
    $sql="SELECT * FROM horarios where id_grupo='$id_grupo_comp' and id_horario<>'$id_horario'";
    $sq= $db->query($sql);
    $rows=$sq->fetchAll();
    foreach ($rows as $row) {
    $comp=1;
      } 
    }
  }
if($comp==0){
    $sql="UPDATE horarios SET id_grupo='$id_grupo', id_generacion='$id_generacion', id_aula='$id_aula' WHERE id_horario='$id_horario'";

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