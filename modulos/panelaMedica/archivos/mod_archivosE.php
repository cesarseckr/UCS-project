<?php 
  session_start();
  require("../../includes/conexion.php");

  $titulo=$_POST['titulo_mod_archivos'];
  $ruta_mod_archivos=$_POST['ruta_mod_archivos'];
  $id_archivo=$_POST['id_archivo_mod_archivos'];
  $fecha=date('Y-m-d', time())." ".date('H:i:s', time());
  $id_area=$_SESSION['id_area'];
  $ultimo = $id_archivo;

  $ruta="documentos";
  $ruta_c="../../../archivos/documentos";
  if(!is_dir($ruta_c)){
    mkdir($ruta_c);
  }

  if($_FILES['arch_mod_archivos']!="" and $_FILES['arch_mod_archivos']['type']!="" and $_FILES['arch_mod_archivos']["size"] < 6100000) {  
    if ($_FILES['arch_mod_archivos']["type"] == "image/png") {
      $archivo=$ruta."/".$ultimo.".png";
      $archivo_c=$ruta_c."/".$ultimo.".png";
    }else if($_FILES['arch_mod_archivos']["type"] == "image/bmp"){
      $archivo=$ruta."/".$ultimo.".bmp";
      $archivo_c=$ruta_c."/".$ultimo.".bmp";
    }else if($_FILES['arch_mod_archivos']["type"] == "image/gif"){
      $archivo=$ruta."/".$ultimo.".gif";
      $archivo_c=$ruta_c."/".$ultimo.".gif";
    }else if($_FILES['arch_mod_archivos']["type"] == "image/jpeg"){
      $archivo=$ruta."/".$ultimo.".jpg";
      $archivo_c=$ruta_c."/".$ultimo.".jpg";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/pdf"){
      $archivo=$ruta."/".$ultimo.".pdf";
      $archivo_c=$ruta_c."/".$ultimo.".pdf";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/msword"){
      $archivo=$ruta."/".$ultimo.".doc";
      $archivo_c=$ruta_c."/".$ultimo.".doc";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
      $archivo=$ruta."/".$ultimo.".docx";
      $archivo_c=$ruta_c."/".$ultimo.".docx";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.template"){
      $archivo=$ruta."/".$ultimo.".dotx";
      $archivo_c=$ruta_c."/".$ultimo.".dotx";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/vnd.ms-word.document.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".docm";
      $archivo_c=$ruta_c."/".$ultimo.".docm";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/vnd.ms-word.template.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".dotm";
      $archivo_c=$ruta_c."/".$ultimo.".dotm";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/vnd.ms-excel"){
      $archivo=$ruta."/".$ultimo.".xls";
      $archivo_c=$ruta_c."/".$ultimo.".xls";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
      $archivo=$ruta."/".$ultimo.".xlsx";
      $archivo_c=$ruta_c."/".$ultimo.".xlsx";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/vnd.ms-excel.sheet.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".xltm";
      $archivo_c=$ruta_c."/".$ultimo.".xltm";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/vnd.ms-excel.template.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".xltm";
      $archivo_c=$ruta_c."/".$ultimo.".xltm";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/vnd.ms-excel.addin.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".xlam";
      $archivo_c=$ruta_c."/".$ultimo.".xlam";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/vnd.ms-excel.sheet.binary.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".xlsb";
      $archivo_c=$ruta_c."/".$ultimo.".xlsb";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/vnd.ms-powerpoint"){
      $archivo=$ruta."/".$ultimo.".ppt";
      $archivo_c=$ruta_c."/".$ultimo.".ppt";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/vnd.openxmlformats-officedocument.presentationml.presentation"){
      $archivo=$ruta."/".$ultimo.".pptx";
      $archivo_c=$ruta_c."/".$ultimo.".pptx";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/vnd.openxmlformats-officedocument.presentationml.template"){
      $archivo=$ruta."/".$ultimo.".potx";
      $archivo_c=$ruta_c."/".$ultimo.".potx";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/vnd.openxmlformats-officedocument.presentationml.slideshow"){
      $archivo=$ruta."/".$ultimo.".ppsx";
      $archivo_c=$ruta_c."/".$ultimo.".ppsx";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/vnd.ms-powerpoint.addin.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".ppam";
      $archivo_c=$ruta_c."/".$ultimo.".ppam";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/vnd.ms-powerpoint.presentation.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".pptm";
      $archivo_c=$ruta_c."/".$ultimo.".pptm";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/vnd.ms-powerpoint.template.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".potm";
      $archivo_c=$ruta_c."/".$ultimo.".potm";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/vnd.ms-powerpoint.slideshow.macroEnabled.12"){
      $archivo=$ruta."/".$ultimo.".ppsm";
      $archivo_c=$ruta_c."/".$ultimo.".ppsm";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/zip"){
      $archivo=$ruta."/".$ultimo.".zip";
      $archivo_c=$ruta_c."/".$ultimo.".zip";
    }else if($_FILES['arch_mod_archivos']["type"] == "application/x-rar-compressed"){
      $archivo=$ruta."/".$ultimo.".rar";
      $archivo_c=$ruta_c."/".$ultimo.".rar";
    }
    move_uploaded_file($_FILES['arch_mod_archivos']["tmp_name"],$archivo_c);
  }else{
    $archivo=$ruta_mod_archivos;
  }
  
  $sql = "UPDATE  archivos SET titulo='$titulo', ruta='$archivo', fecha='$fecha', id_area='$id_area' WHERE id_archivo='$ultimo'";
        $insertar = $db->query($sql);
  


  if (!$insertar){
    echo $db->errorInfo()[2];
  }else{
    $sql="SELECT * FROM areas";
    $sq= $db->query($sql);
    $rows=$sq->fetchAll();
    
    foreach ($rows as $row) {
      $i=$row['id_area'];
      $areas=$_POST[$i."_mod_archivos"];
      if(isset($areas)){
        $comp=0;
        $sql="SELECT * FROM destinos WHERE id_tipo='3' and id_area_destino='$i' and id_archivo_destino='$ultimo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        
        foreach ($rows as $row) {
          $comp=1;
        } 
        
        if($comp==0){
          $sql ="INSERT INTO destinos (id_archivo_destino, id_tipo,id_area_destino) VALUES ('$ultimo', '3','$i')";
          $insertar = $db->query($sql);
        }
      }else{
        $sql="SELECT * FROM destinos WHERE id_tipo='3' and id_area_destino='$i' and id_archivo_destino='$ultimo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
          $id_destino=$row['id_destino'];
          $sql ="DELETE FROM destinos WHERE id_destino='$id_destino'";
          $insertar = $db->query($sql);
        } 
      }
    }

    $areas=$_POST["alumnos_mod_archivos"];
    if(isset($areas)){
      $comp=0;
      $sql="SELECT * FROM destinos WHERE id_tipo='1' and id_archivo_destino='$ultimo'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      
      foreach ($rows as $row) {
        $comp=1;
      } 

      if($comp==0){
        $sql ="INSERT INTO destinos (id_archivo_destino, id_tipo, id_area_destino) VALUES ('$ultimo', '1','0')";
        $insertar = $db->query($sql);
      }
    }else{
      $sql="SELECT * FROM destinos WHERE id_tipo='1' and id_archivo_destino='$ultimo'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $id_destino=$row['id_destino'];
        $sql ="DELETE FROM destinos WHERE id_destino='$id_destino'";
        $insertar = $db->query($sql);
      } 
    } 

    $areas=$_POST["docentes_mod_archivos"];
    if(isset($areas)){
      $comp=0;
      $sql="SELECT * FROM destinos WHERE id_tipo='2' and id_archivo_destino='$ultimo'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      
      foreach ($rows as $row) {
        $comp=1;
      } 

      if($comp==0){
        $sql ="INSERT INTO destinos (id_archivo_destino, id_tipo,id_area_destino) VALUES ('$ultimo', '2','0')";
        $insertar = $db->query($sql);
      }
    }else{
      $sql="SELECT * FROM destinos WHERE id_tipo='2' and id_archivo_destino='$ultimo'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $id_destino=$row['id_destino'];
        $sql ="DELETE FROM destinos WHERE id_destino='$id_destino'";
        $insertar = $db->query($sql);
      } 
    }
    echo 1;
  }


 ?>