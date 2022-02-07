<?php 
  session_start();
  require("../../includes/conexion.php");

$id_usuario=$_POST['id_usuario'];
$nombre=$_POST['nombre'];

$sql="SELECT * FROM usuarios where id_usuario='$id_usuario'";
  $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $tipo=$row["id_tipo"];
        $datos=$row["id_datos"];
        $usuario=$row["usuario"];
        $url_img=$row["url_img"]; 
      }

  $fechames=date("mY"); 
  $carpeta_mes="../../../archivos/alumnos/".$fechames;
  
if($tipo==1){ 
  if($url_img!=""){ 
  $ruta=$url_img;
  $ruta_c="../../../archivos/".$url_img;
  }
  else{
$fechames=date("mY"); 
$ruta="alumnos/".$fechames."/".$datos;
$ruta_c="../../../archivos/alumnos/".$fechames."/".$datos;
  }
  }
  else if ($tipo==2) {
$ruta="docentes/".$usuario;    
$ruta_c="../../../archivos/docentes/".$usuario; 
  }
  else {
$ruta="administrativos/".$usuario;
$ruta_c="../../../archivos/administrativos/".$usuario; 
  }

    if(!is_dir($carpeta_mes)){
    mkdir($carpeta_mes);
    }
  if(!is_dir($ruta_c)){
    mkdir($ruta_c);
  }

  $sql="SELECT COUNT(id_archivos_usuario) as conta FROM archivos_usuarios where id_usuario='$id_usuario'";
  $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $ultimo=$row["conta"];
      }

      if($ultimo>11){
        echo 7;
      }
      else{
  if (($_FILES['archivo']["size"] < 6100000)) {
    
    if ($_FILES['archivo']["type"] == "image/png") {
      $archivo=$ruta."/".$ultimo.".png";
      $archivo_c=$ruta_c."/".$ultimo.".png";
    }else if($_FILES['archivo']["type"] == "image/bmp"){
      $archivo=$ruta."/".$ultimo.".bmp";
      $archivo_c=$ruta_c."/".$ultimo.".bmp";
    }else if($_FILES['archivo']["type"] == "image/gif"){
      $archivo=$ruta."/".$ultimo.".gif";
      $archivo_c=$ruta_c."/".$ultimo.".gif";
    }else if($_FILES['archivo']["type"] == "image/jpeg"){
      $archivo=$ruta."/".$ultimo.".jpg";
      $archivo_c=$ruta_c."/".$ultimo.".jpg";
    }else if($_FILES['archivo']["type"] == "application/pdf"){
      $archivo=$ruta."/".$ultimo.".pdf";
      $archivo_c=$ruta_c."/".$ultimo.".pdf";
    }else if($_FILES['archivo']["type"] == "application/msword"){
      $archivo=$ruta."/".$ultimo.".doc";
      $archivo_c=$ruta_c."/".$ultimo.".doc";
    }else if($_FILES['archivo']["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
      $archivo=$ruta."/".$ultimo.".docx";
      $archivo_c=$ruta_c."/".$ultimo.".docx";
    }else if($_FILES['archivo']["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.template"){
      $archivo=$ruta."/".$ultimo.".dotx";
      $archivo_c=$ruta_c."/".$ultimo.".dotx";
    }else if($_FILES['archivo']["type"] == "application/vnd.ms-word.document.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".docm";
      $archivo_c=$ruta_c."/".$ultimo.".docm";
    }else if($_FILES['archivo']["type"] == "application/vnd.ms-word.template.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".dotm";
      $archivo_c=$ruta_c."/".$ultimo.".dotm";
    }else if($_FILES['archivo']["type"] == "application/vnd.ms-excel"){
      $archivo=$ruta."/".$ultimo.".xls";
      $archivo_c=$ruta_c."/".$ultimo.".xls";
    }else if($_FILES['archivo']["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
      $archivo=$ruta."/".$ultimo.".xlsx";
      $archivo_c=$ruta_c."/".$ultimo.".xlsx";
    }else if($_FILES['archivo']["type"] == "application/vnd.ms-excel.sheet.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".xltm";
      $archivo_c=$ruta_c."/".$ultimo.".xltm";
    }else if($_FILES['archivo']["type"] == "application/vnd.ms-excel.template.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".xltm";
      $archivo_c=$ruta_c."/".$ultimo.".xltm";
    }else if($_FILES['archivo']["type"] == "application/vnd.ms-excel.addin.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".xlam";
      $archivo_c=$ruta_c."/".$ultimo.".xlam";
    }else if($_FILES['archivo']["type"] == "application/vnd.ms-excel.sheet.binary.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".xlsb";
      $archivo_c=$ruta_c."/".$ultimo.".xlsb";
    }else if($_FILES['archivo']["type"] == "application/vnd.ms-powerpoint"){
      $archivo=$ruta."/".$ultimo.".ppt";
      $archivo_c=$ruta_c."/".$ultimo.".ppt";
    }else if($_FILES['archivo']["type"] == "application/vnd.openxmlformats-officedocument.presentationml.presentation"){
      $archivo=$ruta."/".$ultimo.".pptx";
      $archivo_c=$ruta_c."/".$ultimo.".pptx";
    }else if($_FILES['archivo']["type"] == "application/vnd.openxmlformats-officedocument.presentationml.template"){
      $archivo=$ruta."/".$ultimo.".potx";
      $archivo_c=$ruta_c."/".$ultimo.".potx";
    }else if($_FILES['archivo']["type"] == "application/vnd.openxmlformats-officedocument.presentationml.slideshow"){
      $archivo=$ruta."/".$ultimo.".ppsx";
      $archivo_c=$ruta_c."/".$ultimo.".ppsx";
    }else if($_FILES['archivo']["type"] == "application/vnd.ms-powerpoint.addin.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".ppam";
      $archivo_c=$ruta_c."/".$ultimo.".ppam";
    }else if($_FILES['archivo']["type"] == "application/vnd.ms-powerpoint.presentation.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".pptm";
      $archivo_c=$ruta_c."/".$ultimo.".pptm";
    }else if($_FILES['archivo']["type"] == "application/vnd.ms-powerpoint.template.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".potm";
      $archivo_c=$ruta_c."/".$ultimo.".potm";
    }else if($_FILES['archivo']["type"] == "application/vnd.ms-powerpoint.slideshow.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".ppsm";
      $archivo_c=$ruta_c."/".$ultimo.".ppsm";
    }else if($_FILES['archivo']["type"] == "application/zip"){
      $archivo=$ruta."/".$ultimo.".zip";
      $archivo_c=$ruta_c."/".$ultimo.".zip";
    }else if($_FILES['archivo']["type"] == "application/x-rar-compressed"){
      $archivo=$ruta."/".$ultimo.".rar";
      $archivo_c=$ruta_c."/".$ultimo.".rar";
    }

    move_uploaded_file($_FILES['archivo']["tmp_name"],$archivo_c);
      $sql = "INSERT INTO archivos_usuarios(id_usuario, nombre, ruta) VALUES ('$id_usuario','$nombre','$archivo')";
  $insertar = $db->query($sql);

  if (!$insertar){
    echo $db->errorInfo()[2];
  }else{
    echo 1;
  }
  }
  else{
    echo 8;
  }
}
 ?>