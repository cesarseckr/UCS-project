<?php 
    require("../../includes/conexion.php");

    $ciclo = $_POST["id_ciclo_m"];
    $grupo = $_POST["id_grupo_m"];
    $curso = $_POST["id_curso_m"];
    
      $sql="SELECT id_materia,nombre FROM materia WHERE id_curso=$curso";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
      $id_materia=$row["id_materia"];
      $materia=$row["nombre"];
      $id_materia_asignacion=null;

      $sql="SELECT id_materia_asignacion FROM materias_asignacion WHERE id_grupo='$id_grupo' and id_materia='$id_materia'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
      $id_materia_asignacion=$row['id_materia_asignacion'];
      }

      $materia=$_POST["mat-".$i];
      $docente=$_POST["doc-".$i];

      if($id_materia_asignacion!=null){ 
    $sql ="UPDATE materias_asignacion SET id_docente='$docente' WHERE id_materia_asignacion='$id_materia_asignacion'";
    $insertar = $db->query($sql);
    }
    else{
      $sql ="INSERT INTO materias_asignacion (id_grupo, id_materia, id_docente, id_ciclo) VALUES ('$grupo', '$materia','$docente','$ciclo')";
    $insertar = $db->query($sql);
      }
    $i++;
    }

    if (!$insertar){
        echo $db->errorInfo()[2];
    }else{
        echo 10;
          }

          
 ?>