<?php 
    session_start();
    require("../../includes/conexion.php");

    $id_material=$_POST['id_material'];
    $cantidad=$_POST['cantidad'];

    $sql="SELECT * FROM material_medico where id_materialm='$id_material'";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    foreach ($rows as $row){
        $cantidad_total=$row['cantidad_total'];
        $cantidad_fianl=$cantidad+$cantidad_total;
        $sql_sumar = "UPDATE material_medico SET cantidad_total='$cantidad_fianl' WHERE id_materialm='$id_material'";
         $sumar = $db->query($sql_sumar);
         if (!$sumar){
            echo "error ".mysql_error($sumar);
         }else{
            echo "1";
         }
    }
 ?>