<?php 
  require("../../includes/conexion.php");
  $eseleccionado= $_POST["eseleccionado"];

if(isset($eseleccionado)){
 $sql="SELECT * FROM estados where estado='$eseleccionado'";
}
else{
$sql="SELECT * FROM estados";
}
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $estados[$i]["id_estado"]=$row["id_estado"];
        $estados[$i]["estado"]=$row["estado"];
        $i++;
      }
     $valores= json_encode($estados);
     echo $valores;
 ?>