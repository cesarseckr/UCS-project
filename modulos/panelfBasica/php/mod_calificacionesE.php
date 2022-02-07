<?php session_start();
    require("../../includes/conexion.php");
    
    $_SESSION['filtro']=true;
    $_SESSION['fgrupo']=$_POST['id_grupo'];
    
    $id = $_POST["id_m"];
    $calif = $_POST["calif"];
    $asistencia = $_POST["asistencia"];

     $sql ="UPDATE calificaciones SET calificacion='$calif', faltas='$asistencia' WHERE id_calificacion='$id'";
    $insertar = $db->query($sql);
    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
 ?>