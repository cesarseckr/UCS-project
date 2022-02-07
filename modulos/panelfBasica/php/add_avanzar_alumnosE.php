<?php 
    require("../../includes/conexion.php");

    $grupo_pre = $_POST["id_grupo_av"];
    $grupo_pos = $_POST["grupo_d"];

    $sql ="INSERT INTO avances_grupos (id_grupo_pre, id_grupo_pos, tipo) VALUES ('$grupo_pre', '$grupo_pos', 1)";
    $insertar = $db->query($sql);
    
        $sql ="UPDATE grupo SET estatus=3 WHERE id_grupo='$grupo_pre'";
    $insertar = $db->query($sql);

      $sql="SELECT id_alumno FROM alumnos WHERE id_grupo=$grupo_pre";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
      
      $alumno=$_POST["alu-".$i];
      $check=$_POST["alu_check-".$i];

    if (isset($check)){ 
    $sql ="UPDATE alumnos SET id_grupo='$grupo_pos' WHERE id_alumno='$alumno'";
    $insertar = $db->query($sql);
    }    
    $i++;
    }

    if (!$insertar){
        echo $db->errorInfo()[2];
    }else{
        echo 11;
          }

          
 ?>