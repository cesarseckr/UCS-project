<?php 
    require("../../includes/conexion.php");

    $id_horario = $_POST["id_m"];
    $hora = $_POST["hora"];
    $dia = $_POST["dia"];
    $aula = $_POST["aula"];
    $mat_doc = $_POST["mat_doc"];
    $id_grupo = $_POST["id_grupo"];
    $id_ciclo = $_POST["id_ciclo"];
    
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
    $sql="SELECT * FROM horarios where id_grupo='$id_grupo_comp'";
    $sq= $db->query($sql);
    $rows=$sq->fetchAll();
    foreach ($rows as $row) {
    $id_horario_comp=$row['id_horario'];
    if($aula!=0){
    $sql="SELECT * FROM horarios_asignacion WHERE id_horario='$id_horario_comp' and id_hora='$hora' and id_dia='$dia' and id_aula='$aula'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        if($id_horario!=$id_horario_comp){       
          $comp=1;
        }
    }
    }
      } 
    }
  }
if($comp==0){
    $exist=0;
   $sql="SELECT * FROM horarios_asignacion WHERE id_horario='$id_horario' and id_hora='$hora' and id_dia='$dia'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $id_horario_asignacion=$row['id_horario_asignacion'];
        $exist=1;
    $sql ="UPDATE horarios_asignacion SET id_materia_asignacion='$mat_doc', id_aula='$aula' WHERE id_horario_asignacion='$id_horario_asignacion'";
    $insertar = $db->query($sql);
      }
      if($exist==0){ 
$sql ="INSERT INTO horarios_asignacion (id_horario, id_materia_asignacion, id_hora, id_dia, id_aula) VALUES ('$id_horario','$mat_doc','$hora','$dia','$aula')";
    $insertar = $db->query($sql);  
    }

      if (!$insertar){
       echo $db->errorInfo()[2];
    }
    else{
        echo 20;
          }
 }
else{
 echo 21; 
}
  ?>