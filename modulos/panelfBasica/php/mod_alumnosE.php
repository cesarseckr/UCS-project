<?php 
    require("../../includes/conexion.php");

    $id_m = $_POST["id_m"];
    $apaterno = $_POST["apaterno_m"];
    $amaterno= $_POST["amaterno_m"];
    $nombres = $_POST["nombres_m"];
    $sexo= $_POST["sexo_m"];
    $fNac = $_POST["fNac_m"];
    $callenumero = $_POST["callenumero_m"];
    $colonia = $_POST["colonia_m"];
    $estado = $_POST["estado_m"];
    $municipio= $_POST["municipio_m"];
    $CP = $_POST["CP_m"];
    $CURP = $_POST["curp_m"];
    $fIng = $_POST["fIng_m"];
    $telefono = $_POST["telefono_m"];
    $email = $_POST["email_m"];
    $observaciones = $_POST["observaciones_m"];
    $esc_origen = $_POST["esc_origen_m"];
    $estatus = $_POST["estatus_m"];
    $ult_grado = $_POST["ult_grado_m"];
    $est_prev = $_POST["est_prev_m"];

    $grupo = $_POST["grupo_m_d"];
    $generacion = $_POST["generacion_m_d"];
    
    $matricula = $_POST["matricula_m"];

    $sql="SELECT * FROM alumnos where id_alumno='$id_m'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $url_img=$row['img'];
      }

    $dup=0;
    $sql="SELECT * FROM alumnos where matricula='$matricula' and id_alumno<>'$id_m'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $dup=1;
      }
if($dup==0){
  $sql ="UPDATE alumnos SET matricula='$matricula',apaterno='$apaterno',amaterno='$amaterno',nombres='$nombres',domicilio='$callenumero',colonia='$colonia',municipio='$municipio',estado='$estado',telefono='$telefono',cp='$CP',email='$email',fechanac='$fNac',curp='$CURP', sexo='$sexo',fechaing='$fIng',id_grupo='$grupo',ult_grado='$ult_grado',est_prev='$est_prev',observaciones='$observaciones',id_estatus='$estatus',id_generacion='$generacion',id_esc_origen='$esc_origen' WHERE id_alumno='$id_m'";
    $insertar = $db->query($sql);

  $fechames=date("mY"); 
  $carpeta_mes="../../../archivos/alumnos/".$fechames;

  $ruta="alumnos/".$fechames."/".$id_m;
  $ruta_n="../../../archivos/alumnos/".$fechames."/".$id_m;

    if(!is_dir($carpeta_mes)){
    mkdir($carpeta_mes);
    }
    if(!is_dir($ruta_n)){
    mkdir($ruta_n);
    }

$comp_img=0;
if (($_FILES["foto_usr_m"]["size"] < 1500000)) { 

    $archivo=$ruta."/foto.png";
  $archivo_c=$ruta_n."/foto.png";
  move_uploaded_file($_FILES["foto_usr_m"]["tmp_name"],$archivo_c);
  $sql = "UPDATE alumnos SET img='$archivo' WHERE id_alumno='$id_m'";
   $insertar = $db->query($sql);
   $comp_img=1;
      }
    if (!$insertar){
       echo $db->errorInfo()[2];
    }else{
      if($comp_img==1){
        echo 1;
      }
      else{
        echo 2;
      }
          }
      }
      else{
        echo 3;
      }
 ?>
