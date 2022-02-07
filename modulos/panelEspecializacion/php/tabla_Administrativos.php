<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <br>
  <script>
    $(document).ready(function() {
      tabla("Listado de Administrativos");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Editar</th>
        <th class="noExport">Editar usuario</th>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Area</th>
        <th>Domicilio</th>
        <th>Telefono</th>
        <th>Celular</th>
        <th>Email</th>
        <th>Academia</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM administrativos ORDER BY id_administrativo DESC";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_administrativo=$row["id_administrativo"];
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
         $id_area=$row["id_area"];
         $apaterno=$row["apaterno"];
         $amaterno=$row["amaterno"];
         $nombres=$row["nombres"];
         $sexo=$row["sexo"];
         $curp=$row["curp"];
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

      $boton_txt='<i class="fa fa-user-edit"></i> Modificar';
      $id_tipo=3;
      $sql="SELECT * FROM usuarios where id_tipo='$id_tipo' and id_datos='$id_administrativo'";
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
            btn-id_datos="'.$id_administrativo.'"
            btn-id_tipo="'.$id_tipo.'"
            btn-usuario="'.$usuario_e.'"
            btn-pass="'.$pass_e.'"
            btn-estatus="'.$estatus_usr_e.'"
         >'.$boton_txt.'</button>';

      $dom=$domicilio." ".$colonia.", ".$municipio_t.",".$estado_t." CP".$cp;

         $editar='<button id="modificar_admin" type="button" class="btn btn-dark  btn-sm" data-toggle="modal" data-target="#mod_administrativos" id="boton" data-whatever="@mdo"
            btn-id_administrativo="'.$id_administrativo.'"
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
            btn-id_area="'.$id_area.'"
            btn-observaciones="'.$observaciones.'"
         >Modificar</button>';
          $sql="SELECT * FROM areas WHERE id_area='$id_area'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
          $area=$row["area"];
        }

      $estatus_t="<center><span class='btn btn-secondary btn-sm'>".$area."</span></center>";
      ?>
      <tr>
        <td><center><? echo $editar; ?></center></td>
        <td><? echo $editar_usuario; ?></td>
        <td><? echo $usuario_texto; ?></td>
        <td><? echo $nombre; ?></td>
        <td><? echo $estatus_t; ?></td>
        <td><? echo $dom; ?></td>
        <td><? echo $telefono; ?></td>
        <td><? echo $celular; ?></td>
        <td><? echo $email; ?></td>
        <td><? echo $academia; ?></td>
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
        <th>Area</th>
        <th>Domicilio</th>
        <th>Telefono</th>
        <th>Celular</th>
        <th>Email</th>
        <th>Academia</th>
      </tr>
    </tfoot>
  </table>
</div>