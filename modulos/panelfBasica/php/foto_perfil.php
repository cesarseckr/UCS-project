<? session_start();
include ("../../includes/conexion.php");
$id_usuario=$_POST['id_usuario'];
$foto=$_FILE['foto'];
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
$ruta="alumnos/".$fechames."/".$datos;
$ruta_c="../../../archivos/alumnos/".$fechames."/".$datos;
  }
  elseif ($tipo==2) {
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

if (($_FILES["foto"]["size"] < 3000000)) { 
$archivo=$ruta."/perfil.png";
$archivo_c=$ruta_c."/perfil.png";

move_uploaded_file($_FILES["foto"]["tmp_name"],$archivo_c);
$sql = "UPDATE usuarios SET url_img='$archivo' WHERE id_usuario='$id_usuario'";
   $insertar = $db->query($sql);
      echo 1;
      }
      else{
        echo 2;
      }    

 ?>