<?php 
  require("../../includes/conexion.php");
  $id_estado= $_POST["id_estado"];

$sql="SELECT * FROM municipios where id_estado='$id_estado'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $municipios[$i]["id_municipio"]=$row["id_municipio"];
        $municipios[$i]["municipio"]=$row["municipio"];
        $i++;
      }

     $valores= json_encode($municipios);
     echo $valores;
 ?>