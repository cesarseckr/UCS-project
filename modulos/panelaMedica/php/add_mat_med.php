<?php 
  include("../../includes/conexion.php");
  require("../../includes/conexioncon.php");

  $tipo_contenido = $_POST['tipo_contenido'];
  $mat_med = $_POST['mat_med'];
  $cantidad = $_POST['cantidad'];
  $presentacion = $_POST['presentacion'];
  $tiempo = $_POST['tiempo'];
  $id_diagnostico = $_POST['id_diagnostico'];

  if($tipo_contenido=='1'){
    $sql="SELECT * FROM medicamentos where id_medicamento='$mat_med'";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    foreach ($rows as $row){
      $cantidad_total=$row['contenido'];
      $cantidad_fianl=$cantidad_total-$cantidad;
      $sql_restar=mysqli_query($con,"UPDATE medicamentos SET contenido='$cantidad_fianl' WHERE id_medicamento='$mat_med'");
    } 
  }else if ($tipo_contenido=='2') {
    $sql="SELECT * FROM material_medico where id_materialm='$mat_med'";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    foreach ($rows as $row){
      $cantidad_total=$row['cantidad_total'];
      $cantidad_fianl=$cantidad_total-$cantidad;
      $sql_restar=mysqli_query($con,"UPDATE material_medico SET cantidad_total='$cantidad_fianl' WHERE id_materialm='$mat_med'");
    } 
  }
  

 $consulta = mysqli_query($con,"INSERT INTO tratamientos( tipo_contenido, mat_med, presentacion, tiempo, cantidad,id_diagnostico) VALUES ('$tipo_contenido','$mat_med','$presentacion', '$tiempo','$cantidad','$id_diagnostico')");

  if (!$consulta AND !$sql_restar){
    echo "error al registrar en la base de datos" . mysql_error();
  }else{
     echo "1";
  }

?>