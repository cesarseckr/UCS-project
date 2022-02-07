<?php 
  require("../../includes/conexion.php");
  	$titulo=$_POST['titulo_mod_articulo'];
    $descripcion=$_POST['desc_mod_articulo'];
    $contenido=$_POST['contenido_mod_articulo'];
    $categoria=$_POST['categoria_mod_articulo'];
    $estatus=$_POST['estatus_mod_articulo'];
    $id_categoria=$_POST['categoria_mod_articulo'];
    $fecha=date('Y-m-d', time())." ".date('H:i:s', time());
    $ultimo=$_POST['id_mod_articulo'];
    $ruta="blog";
    $ruta_c="../../../archivos/blog";
    if(!is_dir($ruta_c)){
    	mkdir($ruta_c);
    }

    if (($_FILES['img_mod_articulo']["size"] < 3000000)) { 
	  $archivo=$ruta."/".$ultimo.".png";
	  $archivo_c=$ruta_c."/".$ultimo.".png";
	  move_uploaded_file($_FILES['img_mod_articulo']["tmp_name"],$archivo_c);
	  $sql = "UPDATE blog_articulo SET titulo='$titulo',descripcion='$descripcion',contenido='$contenido',imagen='$archivo',fecha_hora='$fecha',estatus='$estatus',id_categoria='$id_categoria' WHERE id_articulo='$ultimo'";
	   $insertar = $db->query($sql);
	}

	if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
    }

    
 ?>