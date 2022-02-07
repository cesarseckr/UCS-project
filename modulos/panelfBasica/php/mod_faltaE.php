<?php 
	require("../../includes/conexioncon.php");
    
    $id_falta=$_POST["id_falta"];
    $falta=$_POST["mod-falta"];
    $sancion=$_POST["mod-sancion"]; 
    $primer= $_POST["mod-primer"];
    $sugunda= $_POST["mod-segunda"];
    $tercer= $_POST["mod-tercer"];
    $nivel= $_POST["mod-nivel"];
    $estatus= $_POST["estatus_a_m"];

    $consulta = mysqli_query($con,"UPDATE faltas_disciplina SET faltas='$falta',sanciones='$sancion',primer='$primer',segundo='$sugunda',tercer='$tercer',nivel_falta='$nivel',estatus='$estatus' WHERE id_faltas='$id_falta'");

     if (!$consulta){
        echo "error".mysql_error($consulta);
    }else{
        echo"1";
          }
 ?>