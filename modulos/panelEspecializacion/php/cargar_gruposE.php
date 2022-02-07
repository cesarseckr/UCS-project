<?php session_start();
  
  include('../../includes/conexion.php');

  if(isset($_POST['id_curso'])){
     $id_curso=$_POST['id_curso'];
  $sql="SELECT * FROM grupo WHERE id_curso='$id_curso'";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
              $id_ciclo=$row["id_ciclo"];
      $sql="SELECT * FROM ciclo where id_ciclo='$id_ciclo'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowe) {
      	$clave=$rowe["clave"];
        $fecha=$clave." del ".date("d-m-Y",strtotime($rowe["fecha_inicio"]))." al ".date("d-m-Y",strtotime($rowe["fecha_fin"]));
      }
        $areas[$i]["id_grupo"]=$row["id_grupo"];
        $areas[$i]["nombre"]=$row["nombre"]." (".$fecha.")";
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
   }
   else{
 $sql="SELECT * FROM grupo WHERE estatus=1 ORDER BY id_grupo DESC";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
              $id_ciclo=$row["id_ciclo"];
      $sql="SELECT * FROM ciclo where id_ciclo='$id_ciclo'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowe) {
        $fecha="Del ".date("d-m-Y",strtotime($rowe["fecha_inicio"]))." al ".date("d-m-Y",strtotime($rowe["fecha_fin"]));
      }
        $areas[$i]["id_grupo"]=$row["id_grupo"];
        $areas[$i]["nombre"]=$row["nombre"]." (".$fecha.")";
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
   }
?>