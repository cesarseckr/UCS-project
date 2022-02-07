<?php 
  require("../../includes/conexioncon.php");
  $id_medicamento= $_POST["idMed-m"];
  $marca= $_POST["marcaMed-m"];
  $sustancia_activa= $_POST["sact-Med-m"];
  $mg= $_POST["mgMed-m"];
  $contenido= $_POST["cantidadMed-m"];
  $presentacion= $_POST["presentacionMed-m"];

    $consulta = mysqli_query($con,"UPDATE medicamentos SET marca='$marca',sustancia_activa='$sustancia_activa',mg='$mg',contenido='$contenido',presentacion='$presentacion' WHERE id_medicamento='$id_medicamento'");

     if (!$consulta){
        echo "error".mysql_error($consulta);
    }else{
        echo"1";
          }
 ?>