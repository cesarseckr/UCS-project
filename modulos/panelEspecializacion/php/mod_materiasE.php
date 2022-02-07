<?php 
    require("../../includes/conexion.php");
    
    $id = $_POST["id_m"];
    $equivalencia = $_POST["equivalencia_m"];
    $clave= $_POST["clave_m"];
    $nombre = $_POST["nombre_m"];
    $creditos= $_POST["creditos_m"];
    $curso = $_POST["curso_m_d"];
    $horas_total = $_POST["horas_t_m"];
    $estatus= $_POST["estatus_a_m"];

  $dup=0;
    $sql="SELECT * FROM materia where clave='$clave' and id_materia<>'$id'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $dup=1;
      }
      if($dup==0){
     $sql ="UPDATE materia SET id_curso='$curso', clave='$clave', nombre='$nombre', creditos='$creditos', horas_semana='$horas_total', id_equivalencia='$equivalencia', estatus='$estatus' WHERE id_materia='$id'";
    $insertar = $db->query($sql);
    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
    }
    else{
          echo 5;
        }
 ?>