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
        <th>Nombre</th>
        <th>Area</th>
        <th>Domicilio</th>
        <th>Telefono</th>
        <th>Celular</th>
        <th>Email</th>
        <th>RFC</th>
        <th>cédula</th>
        <th>Academia</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM administrativos";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_administrativo=$row["id_administrativo"];
         $nombre=$row["apaterno"]." ".$row["amaterno"]." ".$row["nombres"];
         $sexo=$row["sexo"];
         $fechanac=$row["fechanac"];
         $domicilio=$row["domicilio"]." ".$row["colonia"].", ".$row["municipio"]." CP".$row["cp"];
         $estado=$row["estado"];
         $municipio=$row["municipio"];
         $telefono=$row["telefono"];
         $celular=$row["celular"];
         $email=$row["email"];
         $rfc=$row["rfc"];
         $cedula=$row["cedula"];
         $academia=$row["academica"];
         $id_area=$row["id_area"];
         $editar='<button id="modificar_Admin" type="button" class="btn btn-dark  btn-sm" data-toggle="modal" data-target="#mod_administrativos" id="boton" data-whatever="@mdo"
            btn-id_administrativo="'.$id_administrativo.'"
            btn-app="'.$row["apaterno"].'"
            btn-apm="'.$row["amaterno"].'"
            btn-nombres="'.$row["nombres"].'"
            btn-sexo="'.$row["sexo"].'"
            btn-fechanac="'.$row["fechanac"].'"
            btn-callenumero="'.$row["domicilio"].'"
            btn-colonia="'.$row["colonia"].'"
            btn-estado="'.$estado.'"
            btn-municipio="'.$municipio.'"
            btn-cp="'.$row["cp"].'"
            btn-fechaing="'.$row["fechaing"].'"
            btn-curp="'.$row["curp"].'"
            btn-rfc="'.$rfc.'"
            btn-cedula="'.$cedula.'"
            btn-telefono="'.$telefono.'"
            btn-celular="'.$celular.'"
            btn-email="'.$email.'"
            btn-academia="'.$academia.'"
            btn-id_area="'.$id_area.'"
            btn-observaciones="'.$row["observaciones"].'"
         >Modificar</button>';
        if($id_area==1){
          $area="Control Escolar";
        }else if($id_area==2){
          $area="Formación básica";
        }else if($id_area==3){
          $area="Médica";
        }else if($id_area==4){
          $area="Especialización";
        }else if($id_area==5){
          $area="Control Interno";
        }else if($id_area==6){
          $area="Comunicación e imagén institucional";
        }else if($id_area==7){
          $area="Comandancia y Disciplina";
        }else if($id_area==8){
          $area="Compras";
        }else if($id_area==9){
          $area="Sistemas";
        }else if($id_area==10){
          $area="Dirección de Profecionalización";
        }else if($id_area==99){
          $area="Administrador General";
        }else if($id_area==0){
          $area="Sin definir";
        }

      ?>
      <tr>
        <td><center><? echo $editar; ?></center></td>
        <td><? echo $nombre; ?></td>
        <td><? echo $area; ?></td>
        <td><? echo $domicilio; ?></td>
        <td><? echo $telefono; ?></td>
        <td><? echo $celular; ?></td>
        <td><? echo $email; ?></td>
        <td><? echo $rfc; ?></td>
        <td><? echo $cedula; ?></td>
        <td><? echo $academia; ?></td>
        

        <!--<td><center><? /*echo $estatus_act;*/ ?></center></td>-->
      </tr>
      <? } ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Editar</th>
        <th>Nombre</th>
        <th>Area</th>
        <th>Domicilio</th>
        <th>Telefono</th>
        <th>Celular</th>
        <th>Email</th>
        <th>RFC</th>
        <th>Cédula</th>
        <th>Academia</th>
      </tr>
    </tfoot>
  </table>
<?  
$_SESSION['edo_con']=null;
$_SESSION['mun_con']=null;

?>
</div>