<?php 
    session_start();
    require("../../includes/conexion.php");

    $id_medicamento=$_POST['id_medicamento'];
    $cantidad=$_POST['cantidad'];

    $sql="SELECT * FROM medicamentos where id_medicamento='$id_medicamento'";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    foreach ($rows as $row){
        $cantidad_total=$row['contenido'];
        $cantidad_fianl=$cantidad+$cantidad_total;
        $sql_sumar = "UPDATE medicamentos SET contenido='$cantidad_fianl' WHERE id_medicamento='$id_medicamento'";
         $sumar = $db->query($sql_sumar);
         if (!$sumar){
            echo "error ".mysql_error($sumar);
         }else{
            echo "1";
         }
    }
 ?>