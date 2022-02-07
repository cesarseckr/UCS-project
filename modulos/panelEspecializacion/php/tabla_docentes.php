<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <br>
  <script>
    $(document).ready(function() {
      tabla("Listado de Docentes");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Editar</th>
        <th class="noExport">Editar usuario</th>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Domicilio</th>
        <th>Telefono</th>
        <th>Celular</th>
        <th>Tipo</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM docentes ORDER BY id_docente DESC";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_docente=$row["id_docente"];
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
         $rfc=$row["rfc"];
         $cedula=$row["cedula"];
         $academia=$row["academica"];
         $apaterno=$row["apaterno"];
         $amaterno=$row["amaterno"];
         $nombres=$row["nombres"];
         $sexo=$row["sexo"];
         $curp=$row["curp"];
         $estatus=$row["estatus"];
         $id_tipo_area=$row["tipo"];
         $observaciones=$row["observaciones"];

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

      $sql="SELECT * FROM tipo_area where id_tipo_area='$id_tipo_area'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowm) {
        $tipo_area_t=strtoupper($rowm["nombre"]);
      }

$boton_txt='<i class="fa fa-user-edit"></i> Modificar';
      $id_tipo=2;
      $sql="SELECT * FROM usuarios where id_tipo='$id_tipo' and id_datos='$id_docente'";
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
            btn-id_datos="'.$id_docente.'"
            btn-id_tipo="'.$id_tipo.'"
            btn-usuario="'.$usuario_e.'"
            btn-pass="'.$pass_e.'"
            btn-estatus="'.$estatus_usr_e.'"
         >'.$boton_txt.'</button>';

      $dom=$domicilio." ".$colonia.", ".$municipio_t.",".$estado_t." CP".$cp;

         $editar='<button id="modificar_doc" type="button" class="btn btn-dark  btn-sm" data-toggle="modal" data-target="#mod_docentes" id="boton" data-whatever="@mdo"
            btn-id_docente="'.$id_docente.'"
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
            btn-rfc="'.$rfc.'"
            btn-cedula="'.$cedula.'"
            btn-telefono="'.$telefono.'"
            btn-celular="'.$celular.'"
            btn-email="'.$email.'"
            btn-academia="'.$academia.'"
            btn-estatus="'.$estatus.'"
            btn-id_tipo_area="'.$id_tipo_area.'"
            btn-observaciones="'.$observaciones.'"
         >Modificar</button>';

               if($estatus==1){ 
      $estatus_t="<center><span class='btn btn-success btn-sm'>Activo</span></center>";
    } else{
      $estatus_t="<center><span class='btn btn-danger btn-sm'>Desactivado</span></center>";
    }
      ?>
      <tr>
        <td><center><? echo $editar; ?></center></td>
        <td><? echo $editar_usuario; ?></td>
        <td><? echo $usuario_texto; ?></td>
        <td><? echo $nombre; ?></td>
        <td><? echo $dom; ?></td>
        <td><? echo $telefono; ?></td>
        <td><? echo $celular; ?></td>
        <td><? echo $tipo_area_t; ?></td>
        <td><? echo $estatus_t; ?></td>
      </tr>
      <? 
        $id_usuario_e=null;
        $usuario_e=null;
        $usuario_texto=null;
        $pass_e=null;
        $estatus_usr_e=null;
    } ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Editar</th>
        <th class="noExport">Editar usuario</th>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Domicilio</th>
        <th>Telefono</th>
        <th>Celular</th>
        <th>Tipo</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>