<?php 
  session_start();
  require("../../includes/conexion.php");
  $conta=$_POST['conta'];
  $id_hist_disc=$_POST['id_hist_disc'.$conta];
  $ultimo=$id_hist_disc;

$fechames=date("mY");
  $ruta="cartas/".$fechames;
  $ruta_c="../../../archivos/cartas/".$fechames;
  if(!is_dir($ruta_c)){
    mkdir($ruta_c);
  }
  if (($_FILES['add_carta'.$conta]["size"] < 6100000)) {
    
    if ($_FILES['add_carta'.$conta]["type"] == "image/png") {
      $archivo=$ruta."/".$ultimo.".png";
      $archivo_c=$ruta_c."/".$ultimo.".png";
    }else if($_FILES['add_carta'.$conta]["type"] == "image/bmp"){
      $archivo=$ruta."/".$ultimo.".bmp";
      $archivo_c=$ruta_c."/".$ultimo.".bmp";
    }else if($_FILES['add_carta'.$conta]["type"] == "image/gif"){
      $archivo=$ruta."/".$ultimo.".gif";
      $archivo_c=$ruta_c."/".$ultimo.".gif";
    }else if($_FILES['add_carta'.$conta]["type"] == "image/jpeg"){
      $archivo=$ruta."/".$ultimo.".jpg";
      $archivo_c=$ruta_c."/".$ultimo.".jpg";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/pdf"){
      $archivo=$ruta."/".$ultimo.".pdf";
      $archivo_c=$ruta_c."/".$ultimo.".pdf";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/msword"){
      $archivo=$ruta."/".$ultimo.".doc";
      $archivo_c=$ruta_c."/".$ultimo.".doc";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
      $archivo=$ruta."/".$ultimo.".docx";
      $archivo_c=$ruta_c."/".$ultimo.".docx";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.template"){
      $archivo=$ruta."/".$ultimo.".dotx";
      $archivo_c=$ruta_c."/".$ultimo.".dotx";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/vnd.ms-word.document.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".docm";
      $archivo_c=$ruta_c."/".$ultimo.".docm";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/vnd.ms-word.template.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".dotm";
      $archivo_c=$ruta_c."/".$ultimo.".dotm";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/vnd.ms-excel"){
      $archivo=$ruta."/".$ultimo.".xls";
      $archivo_c=$ruta_c."/".$ultimo.".xls";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
      $archivo=$ruta."/".$ultimo.".xlsx";
      $archivo_c=$ruta_c."/".$ultimo.".xlsx";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/vnd.ms-excel.sheet.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".xltm";
      $archivo_c=$ruta_c."/".$ultimo.".xltm";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/vnd.ms-excel.template.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".xltm";
      $archivo_c=$ruta_c."/".$ultimo.".xltm";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/vnd.ms-excel.addin.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".xlam";
      $archivo_c=$ruta_c."/".$ultimo.".xlam";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/vnd.ms-excel.sheet.binary.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".xlsb";
      $archivo_c=$ruta_c."/".$ultimo.".xlsb";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/vnd.ms-powerpoint"){
      $archivo=$ruta."/".$ultimo.".ppt";
      $archivo_c=$ruta_c."/".$ultimo.".ppt";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/vnd.openxmlformats-officedocument.presentationml.presentation"){
      $archivo=$ruta."/".$ultimo.".pptx";
      $archivo_c=$ruta_c."/".$ultimo.".pptx";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/vnd.openxmlformats-officedocument.presentationml.template"){
      $archivo=$ruta."/".$ultimo.".potx";
      $archivo_c=$ruta_c."/".$ultimo.".potx";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/vnd.openxmlformats-officedocument.presentationml.slideshow"){
      $archivo=$ruta."/".$ultimo.".ppsx";
      $archivo_c=$ruta_c."/".$ultimo.".ppsx";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/vnd.ms-powerpoint.addin.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".ppam";
      $archivo_c=$ruta_c."/".$ultimo.".ppam";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/vnd.ms-powerpoint.presentation.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".pptm";
      $archivo_c=$ruta_c."/".$ultimo.".pptm";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/vnd.ms-powerpoint.template.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".potm";
      $archivo_c=$ruta_c."/".$ultimo.".potm";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/vnd.ms-powerpoint.slideshow.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".ppsm";
      $archivo_c=$ruta_c."/".$ultimo.".ppsm";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/zip"){
      $archivo=$ruta."/".$ultimo.".zip";
      $archivo_c=$ruta_c."/".$ultimo.".zip";
    }else if($_FILES['add_carta'.$conta]["type"] == "application/x-rar-compressed"){
      $archivo=$ruta."/".$ultimo.".rar";
      $archivo_c=$ruta_c."/".$ultimo.".rar";
    }

    move_uploaded_file($_FILES['add_carta'.$conta]["tmp_name"],$archivo_c);
     $sql = "INSERT INTO cartas_compromiso(id_hist_disc,ruta) VALUES ('$id_hist_disc','$archivo')";
  $insertar = $db->query($sql);
  }
  if (!$insertar){
    echo $db->errorInfo()[2];
  }else{
    echo 1;
  }


 ?>