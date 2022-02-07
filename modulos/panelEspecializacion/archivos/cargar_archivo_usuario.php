<? include("../../includes/conexion.php");
if(isset($_POST['id_usuario'])){
$id_usuario=$_POST['id_usuario'];
$sql="SELECT * FROM archivos_usuarios where id_usuario='$id_usuario'";
  $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $id_archivo_usuario=$row["id_archivos_usuario"];
        $nombre=$row["nombre"];
        $ruta=$row["ruta"];
  echo "<p><a href='../../archivos/".$ruta."' target='_blank'><i class='fa fa-file-alt'></i> ".$nombre."</a> <a id='eliminar_archivo_usr' id_archivo_usuario='".$id_archivo_usuario."' ruta='".$ruta."' href='#archivos_usr' style='color:red;'> <small>(Eliminar)</small></a></p>";
      }
      }
?>