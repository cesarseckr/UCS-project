<?php 
    require("../../includes/conexion.php");

    $apaterno = $_POST["apaterno"];
    $amaterno= $_POST["amaterno"];
    $nombres = $_POST["nombres"];
    $sexo= $_POST["sexo"];
    $fNac = $_POST["fNac"];
    $callenumero = $_POST["callenumero"];
    $colonia = $_POST["colonia"];
    $estado = $_POST["estado"];
    $municipio= $_POST["municipio"];
    $CP = $_POST["CP"];
    $CURP = $_POST["curp"];
    $fIng = $_POST["fIng"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $observaciones = $_POST["observaciones"];
    $esc_origen = $_POST["esc_origen"];
    $estatus = $_POST["estatus"];
    $ult_grado = $_POST["ult_grado"];
    $est_prev = $_POST["est_prev"];
    $grupo = $_POST["grupo_d"];
    $generacion = $_POST["generacion_d"];
    $matricula = $_POST["matricula"];

    $dup=0;
    $sql="SELECT * FROM alumnos where matricula='$matricula'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $dup=1;
      }
if($dup==0){
  $sql ="INSERT INTO alumnos(matricula, apaterno, amaterno, nombres, domicilio, colonia, municipio, estado, telefono,  cp, email, fechanac, curp, sexo, fechaing, id_grupo, ult_grado, est_prev, observaciones, id_estatus, id_generacion, id_esc_origen) VALUES ('$matricula','$apaterno','$amaterno','$nombres','$callenumero','$colonia','$municipio','$estado','$telefono','$CP','$email','$fNac','$CURP', '$sexo','$fIng','$grupo','$ult_grado','$est_prev','$observaciones','$estatus','$generacion','$esc_origen')";
    $insertar = $db->query($sql);
    $ultimo = $db->lastInsertId();
    
    $fechames=date("mY"); 
    $ruta="alumnos/".$fechames."/".$ultimo."/";
    $ruta_c="../../../archivos/alumnos/".$fechames;
    if(!is_dir($ruta_c)){
    mkdir($ruta_c);
    }
    $ruta_c="../../../archivos/alumnos/".$fechames."/".$ultimo;
    if(!is_dir($ruta_c)){
    mkdir($ruta_c);
    }

$comp_img=0;
if (($_FILES["foto_usr"]["size"] < 1500000)) { 
  $archivo=$ruta."/foto.png";
  $archivo_c=$ruta_c."/foto.png";
  move_uploaded_file($_FILES["foto_usr"]["tmp_name"],$archivo_c);
  $sql = "UPDATE alumnos SET img='$archivo' WHERE id_alumno='$ultimo'";
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