<?php 
    require("../../includes/conexion.php");
if(!empty($_POST["fecha_in"]) and !empty($_POST["fecha_fin"])){   
$grupo = $_POST["id_grupo_per"];
    $fecha_in= $_POST["fecha_in"];
    $fecha_fin= $_POST["fecha_fin"];
    $observaciones= $_POST["observaciones_per"];
    $id=0;
 $sql="SELECT * FROM periodos where id_grupo='$grupo' and tipo=1";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id=$row["id_periodo"];
       }
       if($id!=0){
   $sql ="UPDATE periodos SET fecha_in='$fecha_in', fecha_fin='$fecha_fin', observaciones='$observaciones' WHERE id_periodo='$id'";
    $insertar = $db->query($sql);
      }
else { 
  $sql ="INSERT INTO periodos (id_grupo, fecha_in, fecha_fin, observaciones, tipo) VALUES ('$grupo','$fecha_in','$fecha_fin','$observaciones',1)";
    $insertar = $db->query($sql);
          }
}

if(!empty($_POST["fecha_in_extra"]) and !empty($_POST["fecha_fin_extra"])){     
    $id=0;
    $grupo = $_POST["id_grupo_per"];
    $fecha_in= $_POST["fecha_in_extra"];
    $fecha_fin= $_POST["fecha_fin_extra"];
    $observaciones= $_POST["observaciones_per"];
 $sql="SELECT * FROM periodos where id_grupo='$grupo' and tipo=2";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id=$row["id_periodo"];
       }
       if($id!=0){
   $sql ="UPDATE periodos SET fecha_in='$fecha_in', fecha_fin='$fecha_fin', observaciones='$observaciones' WHERE id_periodo='$id'";
    $insertar = $db->query($sql);
      }
else { 
  $sql ="INSERT INTO periodos (id_grupo, fecha_in, fecha_fin, observaciones, tipo) VALUES ('$grupo','$fecha_in','$fecha_fin','$observaciones',2)";
    $insertar = $db->query($sql);
          }
}
if(!empty($_POST["fecha_in_ad"]) and !empty($_POST["fecha_fin_ad"])){     
    $id = 0;
    $grupo = $_POST["id_grupo_per"];
    $fecha_in= $_POST["fecha_in_ad"];
    $fecha_fin= $_POST["fecha_fin_ad"];
    $observaciones= $_POST["observaciones_per"];
 $sql="SELECT * FROM periodos where id_grupo='$grupo' and tipo=3";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id=$row["id_periodo"];
       }
       if($id!=0){
   $sql ="UPDATE periodos SET fecha_in='$fecha_in', fecha_fin='$fecha_fin', observaciones='$observaciones' WHERE id_periodo='$id'";
    $insertar = $db->query($sql);
      }
else { 
  $sql ="INSERT INTO periodos (id_grupo, fecha_in, fecha_fin, observaciones, tipo) VALUES ('$grupo','$fecha_in','$fecha_fin','$observaciones',3)";
    $insertar = $db->query($sql);
          }
}
    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
 ?>