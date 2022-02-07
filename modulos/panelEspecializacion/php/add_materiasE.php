<?php 
    require("../../includes/conexion.php");

    $equivalencia = $_POST["equivalencia"];
    $clave= $_POST["clave"];
    $claveDGETI = $_POST["claveDGETI"];
    $nombre = $_POST["nombre"];
    $creditos= $_POST["creditos"];
    $curso= $_POST["curso_d"];
    $horas_total = $_POST["horas_t"];
    $estatus= $_POST["estatus_a"];
  
  $dup=0;
    $sql="SELECT * FROM materia where clave='$clave'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $dup=1;
      }
if($dup==0){
  $sql ="INSERT INTO materia (id_curso, clave, nombre, creditos, horas_semana, id_equivalencia, estatus) VALUES ('$curso', '$clave','$nombre','$creditos','$horas_total','$equivalencia','$estatus')";
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