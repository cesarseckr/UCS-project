<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <br>
  <script>
    $(document).ready(function() {
      tabla("Listado de sedes");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Editar</th>
        <th>Siglas</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Tipo</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM sedes";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_sede=$row["id_sede"];
         $siglas = $row["siglas"];
    $nombre = $row["nombre"];
    $direccion= $row["direccion"];
    $id_estado= $row["id_estado"];
    $id_municipio= $row["id_municipio"];
    $telefono= $row["telefono"];
    $tipo= $row["tipo"];
    $estatus= $row["estatus"];

    $sql="SELECT * FROM municipios where id_municipio='$id_municipios'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowe) {
        $municipio=$rowe["municipio"];
      }
    
    $sql="SELECT * FROM estados where id_estado='$id_estados'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowe) {
        $estado=$rowe["estado"];
      }

      $direccion=$direccion." ".$estado." ".$municipio;
      $editar='<button id="btn_sedes" type="button" class="btn btn-dark btn-block btn-sm" data-toggle="modal" data-target="#mod_sedes" data-whatever="@mdo"
            btn-id_sede="'.$id_sede.'"
            btn-siglas="'.$siglas.'"
            btn-nombre="'.$nombre.'"
            btn-direccion="'.$direccion.'"
            btn-id_estado="'.$id_estado.'"
            btn-id_municipio="'.$id_municipio.'"
            btn-telefono="'.$telefono.'"
            btn-tipo="'.$tipo.'"
            btn-estatus="'.$estatus.'"
         ><i class="fa fa-edit"></i> Editar</button>';


      if($tipo==1){ 
      $tipo_t="<center><span class='btn btn-success btn-sm'>Interna</span></center>";
    } else{
      $tipo_t="<center><span class='btn btn-primary btn-sm'>Externa</span></center>";
    }

      if($estatus==1){ 
      $estatus_t="<center><span class='btn btn-success btn-sm'>Activado</span></center>";
    } else{
      $estatus_t="<center><span class='btn btn-danger btn-sm'>Desactivado</span></center>";
    }
      ?>
      <tr>
        <td><center><? echo $editar; ?></center></td>
        <td><? echo $siglas; ?></td>
        <td><? echo $nombre; ?></td>
        <td><? echo $direccion; ?></td>
        <td><? echo $telefono; ?></td>
        <td><? echo $tipo_t; ?></td>
        <td><? echo $estatus_t; ?></td>
      </tr>
      <? 
      }
     ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Editar</th>
        <th>Siglas</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Tipo</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>