<?php
  include("../../includes/conexion.php"); 
  require("../../includes/conexioncon.php");

  $id_accion_mat = $_POST['id_accion_mat'];
  $id_accion_enf=$_POST['id_accion_enf'];
	$tipo_contenido=$_POST['tipo_contenido'];
	$mat_med=$_POST['mat_med'];
	$presentacion=$_POST['presentacion'];
	$cantidad=$_POST['cantidad'];

  if($tipo_contenido=='1'){
    $sql="SELECT * FROM medicamentos where id_medicamento='$mat_med'";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    foreach ($rows as $row){
      $cantidad_total=$row['contenido'];
      $cantidad_fianl=$cantidad_total+$cantidad;
      $sql_sumar=mysqli_query($con,"UPDATE medicamentos SET contenido='$cantidad_fianl' WHERE id_medicamento='$mat_med'");
    } 
  }else if ($tipo_contenido=='2') {
    $sql="SELECT * FROM material_medico where id_materialm='$mat_med'";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    foreach ($rows as $row){
      $cantidad_total=$row['cantidad_total'];
      $cantidad_fianl=$cantidad_total+$cantidad;
      $sql_sumar=mysqli_query($con,"UPDATE material_medico SET cantidad_total='$cantidad_fianl' WHERE id_materialm='$mat_med'");
    } 
  }
  
  $consulta = mysqli_query($con,"DELETE FROM acciones_materiales WHERE id_accion_mat='$id_accion_mat'");

  if (!$consulta AND !$sql_sumar){
    echo "error al registrar en la base de datos" . mysql_error();
  }else{
     echo "1";
  }

?>