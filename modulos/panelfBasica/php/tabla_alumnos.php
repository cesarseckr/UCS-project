  <div id="fdesc">
  <small><b>Ningún filtro aplicado</b> realiza una busqueda para encontrar más datos - Mostrando últimos <b>300</b> registros (<b>Filtros aplicables:</b> Matrícula, Nombre, Apellidos, Estatus, Grupo y Generación)</small>
  </div>
<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de alumnos");
    });
  </script>
  <table id="tabla-1" class="table table-bordered">
    <thead>
      <tr>
        <th class="noExport">Editar datos</th>
        <th class="noExport">Editar usuario</th>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Matricula</th>
        <th>Estatus</th>
        <th>Grupo</th>
        <th>Generación</th>
      </tr>
    </thead>
    <tbody>
      <? 
      if(isset($_SESSION['filtro'])){
      $fmatricula=$_SESSION['fmatricula'];
      $fnombre=$_SESSION['fnombre'];
      $fapaterno=$_SESSION['fapaterno'];
      $famaterno=$_SESSION['famaterno'];
      $fgrupo=$_SESSION['fgrupo'];
      $fgeneracion=$_SESSION['fgeneracion'];
      $festatus=$_SESSION['festatus'];
      
      if($fmatricula!=""){
      $fmatricula="and matricula LIKE '%$fmatricula%'";
      }
      if($fnombre!=""){
      $fnombre="and nombres LIKE '%$fnombre%'";
      }
      if($fapaterno!=""){
      $fapaterno="and apaterno LIKE '%$fapaterno%'";
      }
      if($famaterno!=""){
      $famaterno="and amaterno LIKE '%$famaterno%'";
      }
      if($fgrupo!=""){
      $fgrupo="and id_grupo='$fgrupo'";
      }
      if($fgeneracion!=""){
      $fgeneracion="and id_generacion='$fgeneracion'";
      }
      if($festatus!=""){
      $festatus="and id_estatus='$festatus'";
      }
      $_SESSION['fmatricula']=null;
      $_SESSION['fnombre']=null;
      $_SESSION['fapaterno']=null;
      $_SESSION['famaterno']=null;
      $_SESSION['fgrupo']=null;
      $_SESSION['fgeneracion']=null;
      $_SESSION['fcarrera']=null;
      $_SESSION['fcurso']=null;
      $_SESSION['fplan']=null;
      $_SESSION['facademia']=null;
      $_SESSION['filtro']=null;
      }
      $sql="SELECT * FROM alumnos WHERE id_alumno<>0 ".$fmatricula." ".$fnombre." ".$fapaterno." ".$famaterno." ".$fgrupo." ".$festatus." ".$fgeneracion." ORDER BY id_alumno DESC LIMIT 300";
      
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_alumno=$row["id_alumno"];
         $matricula=$row["matricula"];
         $nombre=$row["apaterno"]." ".$row["amaterno"]." ".$row["nombres"];
         $sexo=$row["sexo"];
         $fechanac=date("Y-m-d",strtotime($row["fechanac"]));
         $fechaing=date("Y-m-d",strtotime($row["fechaing"]));
         $domicilio=$row["domicilio"];
         $colonia=$row["colonia"];
         $cp=$row["cp"];
         $estado=$row["estado"];
         $estado_t=$row["estado"];
         $municipio=$row["municipio"];
         $municipio_t=$row["municipio"];
         $telefono=$row["telefono"];
         $celular=$row["celular"];
         $email=$row["email"];
         $url=$row["img"];

         $id_grupo=$row["id_grupo"];
         $id_generacion=$row["id_generacion"];

         $ult_grado=$row["ult_grado"];
         $est_prev=$row["est_prev"];

         $apaterno=$row["apaterno"];
         $amaterno=$row["amaterno"];
         $nombres=$row["nombres"];
         $sexo=$row["sexo"];
         $curp=$row["curp"];
         $observaciones=$row["observaciones"];

        $id_estatus=$row["id_estatus"];
        $id_esc_origen=$row["id_esc_origen"];

        $sql="SELECT * FROM grupo where id_grupo='$id_grupo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $grupo_nombre=$row["nombre"];
        $id_curso=$row["id_curso"];
        $id_carrera=$row["id_carrera"];
        }
        $sql="SELECT * FROM generacion where id_generacion='$id_generacion'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $generacion_nombre=$row["nombre"];
        $id_academia=$row["id_academia"];
        }
        $sql="SELECT * FROM academia where id_academia='$id_academia'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $id_plan=$row["id_plan"];
        }

         $sql="SELECT * FROM estatus_alumnos where id_estatus_alumno='$id_estatus'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowes) {
        $nombre_estatus=$rowes["nombre"];
      }

         $sql="SELECT * FROM estados where id_estado='$estado'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowe) {
        $estado_t=strtoupper($rowe["estado"]);
      }

$sql="SELECT * FROM municipios where id_municipio='$municipio'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowm) {
        $municipio_t=strtoupper($rowm["municipio"]);
      }
$boton_txt='<i class="fa fa-user-edit"></i> Modificar';
      $id_tipo=1;
      $sql="SELECT * FROM usuarios where id_tipo='$id_tipo' and id_datos='$id_alumno'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowu) {
        $id_usuario_e=$rowu["id_usuario"];
        $usuario_e=$rowu["usuario"];
        $usuario_texto=$rowu["usuario"];
        $pass_e=base64_decode($rowu["pass"]);
        $estatus_usr_e=$rowu["estatus"];
      }
      if(!isset($usuario_texto)){
      $usuario_texto="SIN USUARIO";
      $boton_txt='<i class="fa fa-user-plus"></i> Agregar';
      }
      
      $editar_usuario='<button id="abrir_usuario" type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#usuario" data-whatever="@mdo"
            btn-id_usuario="'.$id_usuario_e.'"
            btn-id_datos="'.$id_alumno.'"
            btn-id_tipo="'.$id_tipo.'"
            btn-usuario="'.$usuario_e.'"
            btn-pass="'.$pass_e.'"
            btn-estatus="'.$estatus_usr_e.'"
         >'.$boton_txt.'</button>';

      $dom=$domicilio." ".$colonia.", ".$municipio_t.",".$estado_t." CP".$cp;

         $editar='<button id="modificar_alumno" type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#mod_alumno" data-whatever="@mdo"
            btn-id_alumno="'.$id_alumno.'"
            btn-app="'.$apaterno.'"
            btn-apm="'.$amaterno.'"
            btn-nombres="'.$nombres.'"
            btn-sexo="'.$sexo.'"
            btn-fechanac="'.$fechanac.'"
            btn-callenumero="'.$domicilio.'"
            btn-colonia="'.$colonia.'"
            btn-estado="'.$estado.'"
            btn-municipio="'.$municipio.'"
            btn-cp="'.$cp.'"
            btn-fechaing="'.$fechaing.'"
            btn-curp="'.$curp.'"
            btn-telefono="'.$telefono.'"
            btn-email="'.$email.'"
            btn-id_estatus="'.$id_estatus.'"
            btn-id_esc_origen="'.$id_esc_origen.'"
            btn-id_grupo="'.$id_grupo.'"
            btn-id_generacion="'.$id_generacion.'"
            btn-id_curso="'.$id_curso.'"
            btn-id_carrera="'.$id_carrera.'"
            btn-id_academia="'.$id_academia.'"
            btn-id_plan="'.$id_plan.'"
            btn-observaciones="'.$observaciones.'"
            btn-matricula="'.$matricula.'"
            btn-est_prev="'.$est_prev.'"
            btn-url="'.$url.'"
            btn-ult_grado="'.$ult_grado.'"
         ><i class="far fa-edit"></i>Modificar</button>';

      ?>
      <tr>
        <td><center><? echo $editar; ?></center></td>
        <td><? echo $editar_usuario; ?></td>
        <td><? echo $usuario_texto; ?></td>
        <td><? echo $nombre; ?></td>
        <td><? echo $matricula; ?></td>
        <td><? echo $nombre_estatus; ?></td>
        <td><? echo $grupo_nombre; ?></td>
        <td><? echo $generacion_nombre; ?></td>
      </tr>
      <? 
  		$id_usuario_e=null;
        $usuario_e=null;
        $usuario_texto=null;
        $pass_e=null;
        $estatus_usr_e=null;
  		}
  	  ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Editar datos</th>
        <th class="noExport">Editar usuario</th>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Matricula</th>
        <th>Estatus</th>
        <th>Grupo</th>
        <th>Generación</th>
      </tr>
    </tfoot>
  </table>
</div>