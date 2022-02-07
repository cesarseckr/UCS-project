<?php 
    require("../../includes/conexioncon.php");

    $falta=$_POST["falta"];
    $sancion=$_POST["sancion"]; 
    $primer= $_POST["primer"];
    $sugunda= $_POST["sugunda"];
    $tercer= $_POST["tercer"];
    $nivel= $_POST["nivel"];

    $consulta = mysqli_query($con,"INSERT INTO faltas_disciplina(faltas, sanciones, primer, segundo, tercer, nivel_falta, estatus) VALUES ('$falta','$sancion','$primer','$sugunda','$tercer','$nivel','1')");

    if (!$consulta){
            echo "  error" . mysql_error();
        }else{
            echo"1";
        }
 ?>