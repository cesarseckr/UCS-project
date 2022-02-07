<?php session_start();
  
  include('../../includes/conexion.php');
  
  if(isset($_POST['id_grupo'])){
    $id_grupo=$_POST['id_grupo'];
      $i=0;
  $sql="SELECT * FROM materias_asignacion WHERE id_grupo='$id_grupo'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
      $id_materia_asignacion=$row['id_materia_asignacion'];
      $id_docente=$row['id_docente'];
      $id_materia=$row['id_materia'];
  
      $sql="SELECT * FROM materia WHERE id_materia='$id_materia'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
      $materia=$row['clave']." - ".$row['nombre'];
      }

      $sql="SELECT * FROM docentes WHERE id_docente='$id_docente'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
      $docente=$row['apaterno']." ".$row['amaterno']." ".$row['nombres'];
      }
        $areas[$i]["id_mat_doc"]=$id_materia_asignacion;
        $areas[$i]["nombre"]=$docente;
        $areas[$i]["materia"]=$materia;
        $i++;
        }
     $valores= json_encode($areas);
     echo $valores;
     }
?>