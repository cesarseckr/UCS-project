<?php 
    session_start();
    require("../../includes/conexion.php");


    $tipo=$_POST['tipo'];
    $id_datos=$_POST['id_datos'];
    $sys=$_POST['sys'];
    $dia=$_POST['dia'];
    $pulse=$_POST['pulse'];
    $fecha=date('Y-m-d', time())." ".date('H:i:s', time());

    $sql="SELECT * FROM control_ta WHERE id_datos='$id_datos' AND tipo='$tipo'"; 
    $sq = $db->query($sql); 
    $rows= $sq->fetchAll();
    $comp=0;        
    foreach ($rows as $row) { 
        $comp=1;
        $id_control_ta=$row["id_control_ta"];
        $sql_contenido = "INSERT INTO contenido_ta( sys, dia, pulse, fecha_hora, id_control_ta) VALUES ('$sys','$dia','$pulse','$fecha','$id_control_ta')";
        $contenido = $db->query($sql_contenido);
        if (!$contenido){
            echo $db->errorInfo()[2];
        }else{
            echo 1;
        }
    }
    if($comp==0){
        $ultimo=0;
        $sql_insertar = "INSERT INTO control_ta(id_datos, tipo) VALUES ('$id_datos','$tipo')";
        $insertar = $db->query($sql_insertar);
        $ultimo = $db->lastInsertId();
        $sql_contenido = "INSERT INTO contenido_ta( sys, dia, pulse, fecha_hora, id_control_ta) VALUES ('$sys','$dia','$pulse','$fecha','$ultimo')";
        $contenido = $db->query($sql_contenido);
        if (!$contenido and !$insertar){
            echo $db->errorInfo()[2];
        }else{
            echo 1;
        }
    }
?>