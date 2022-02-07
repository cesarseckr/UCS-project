<?php 
  require("../../includes/conexioncon.php");
  $id_materialm= $_POST["idmat-m"];
  $marca= $_POST["marcamat-m"];
  $material= $_POST["mat-mat-m"];
  $cantidad_total= $_POST["cantidadmat-m"];
  $presentacion= $_POST["presentacionmat-m"];

    $consulta = mysqli_query($con,"UPDATE material_medico SET marca='$marca', material='$material', cantidad_total='$cantidad_total', presentacion='$presentacion' WHERE id_materialm='$id_materialm'");

     if (!$consulta){
        echo "error".mysql_error($consulta);
    }else{
        echo"1";
          }
 ?>