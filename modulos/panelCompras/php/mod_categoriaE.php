<?php 
  require("../../includes/conexioncon.php");
  $id_categoria= utf8_encode($_POST["id_categoria_mod"]);
  $categoria= utf8_encode($_POST["categoria_mod"]);

    $consulta = mysqli_query($con,"UPDATE blog_categorias SET categoria='$categoria' WHERE id_categoria='$id_categoria'");

     if (!$consulta){
        echo "error".mysql_error($consulta);
    }else{
        echo"1";
          }
 ?>