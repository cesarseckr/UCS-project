<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <br>
  <script>
    $(document).ready(function() {
      tabla("Listado de Administrativos");
    });
  </script>
  <table id="tabla-1" class="display nowrap" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="noExport">Editar</th>
      <th>Nombre</th>
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
      $sql="SELECT * FROM docentes";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
       $id_docente=$row["id_docente"];
       $nombre=$row["apaterno"]." ".$row["amaterno"]." ".$row["nombres"];
       $domicilio=$row["domicilio"]." ".$row["colonia"].", ".$row["municipio"]." CP".$row["cp"];
       $estado=$row["estado"];
       $municipio=$row["municipio"];
       $telefono=$row["telefono"];
       $celular=$row["celular"];
       $email=$row["email"];
       $rfc=$row["rfc"];
       $cedula=$row["cedula"];
       $academia=$row["academica"];
       $_SESSION["prueba"]='adasdasd';
       $editar='<button id="modificar_Docente" type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#mod_docentes" id="boton" data-whatever="@mdo"
            btn-id_docente="'.$id_docente.'"
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
            btn-observaciones="'.$row["observaciones"].'"
         >Modificar</button>';
      
    ?>
    <tr>
      <td><center><? echo $editar; ?></center></td>
      <td><? echo $nombre; ?></td>
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