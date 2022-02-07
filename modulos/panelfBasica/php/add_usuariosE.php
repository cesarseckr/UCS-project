<?php 
    require("../../includes/conexion.php");
    $id_usuario = $_POST["id_usuario_m"];
    $id_datos= $_POST["id_datos_m"];
    $id_tipo = $_POST["id_tipo_m"];
    $usuario= $_POST["usuario_m"];
    $estatus= $_POST["estatus_usuario_m"];
    $pass= base64_encode($_POST["pass"]);

    $dup=0;
    $sql="SELECT * FROM usuarios where usuario='$usuario' and id_usuario<>'$id_usuario'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $dup=1;
      }
if($dup==0){

    if(empty($id_usuario)){
      $sql ="INSERT INTO usuarios(id_tipo, id_datos, usuario, pass, estatus, ps) VALUES ('$id_tipo','$id_datos','$usuario','$pass','$estatus',0)";
    $insertar = $db->query($sql);
    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
    }
    else{
      $sql ="UPDATE usuarios SET usuario='$usuario', pass='$pass', estatus='$estatus' WHERE id_usuario='$id_usuario'";
    $insertar = $db->query($sql);
    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
        echo 1;
          }
    }

  }
  else{
    echo 4;
  }
 ?>