<?php 
    session_start();
    require("../../includes/conexion.php");

    $titulo=$_POST['titulo_add_articulo'];
    $descripcion=$_POST['desc_add_articulo'];
    $contenido=$_POST['contenido_add_articulo'];
    $categoria=$_POST['categoria_add_articulo'];
    $fecha=date('Y-m-d', time())." ".date('H:i:s', time());

    $sql = "INSERT INTO blog_articulo(titulo, descripcion, contenido, fecha_hora, estatus, id_categoria) VALUES ('$titulo','$descripcion','$contenido','$fecha','1','$categoria')";
    $insertar = $db->query($sql);
    $ultimo = $db->lastInsertId();

    $ruta="blog";
    $ruta_c="../../../archivos/blog";
    if(!is_dir($ruta_c)){
    mkdir($ruta_c);
    }

	if (($_FILES['img_add_articulo']["size"] < 3000000)) { 
	  $archivo=$ruta."/".$ultimo.".png";
	  $archivo_c=$ruta_c."/".$ultimo.".png";
	  move_uploaded_file($_FILES['img_add_articulo']["tmp_name"],$archivo_c);
	  $sql = "UPDATE blog_articulo SET imagen='$archivo' WHERE id_articulo='$ultimo'";
	   $insertar = $db->query($sql);
	}

	if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
    }
?>





 