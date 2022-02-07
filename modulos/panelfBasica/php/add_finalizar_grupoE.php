<?php 
    require("../../includes/conexion.php");

    $grupo_pos = $_POST["id_grupo_fin"];

    $sql ="INSERT INTO avances_grupos (id_grupo_pre, id_grupo_pos, tipo) VALUES ('$grupo_pos', '$grupo_pos', 2)";
    $insertar = $db->query($sql);

    $sql ="UPDATE grupo SET estatus=3 WHERE id_grupo='$grupo_pos'";
    $insertar = $db->query($sql);

      $sql="SELECT id_alumno FROM alumnos WHERE id_grupo='$grupo_pos'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
      
      $alumno=$_POST["alu_f-".$i];
      $check=$_POST["alu_f_check-".$i];

      // ESTATUS DE EGRESADO = 8 SIEMPRE BUSCAR EL ESTATUS DE EGRESADO //

    if (isset($check)){ 
    $sql ="UPDATE alumnos SET id_grupo='$grupo_pos', id_estatus=8 WHERE id_alumno='$alumno'";
    $insertar = $db->query($sql);
    }    
    $i++;
    }

    if (!$insertar){
        echo $db->errorInfo()[2];
    }else{
        echo 12;
          }

          
 ?>