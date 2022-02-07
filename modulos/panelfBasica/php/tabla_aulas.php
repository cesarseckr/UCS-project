<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <br>
  <script>
    $(document).ready(function() {
      tabla("Listado de Aulas");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Editar</th>
        <th>Nombre</th>
        <th>Edificio</th>
        <th>Capacidad</th>
        <th>Recomendada</th>
        <th>Tipo</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM aulas";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_aula=$row["id_aula"];
         $id_edificio=$row["id_edificio"];
         $nombre=$row["nombre"];
         $capacidad=$row["capacidad"];
         $ideal=$row["ideal"];
         $tipo=$row["tipo"];
         $estatus=$row["estatus"];

         $sql="SELECT * FROM edificios where id_edificio='$id_edificio'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowe) {
        $nombre_e=strtoupper($rowe["nombre"]);
      }
      
      $editar='<button id="btn_aulas" type="button" class="btn btn-dark btn-block btn-sm" data-toggle="modal" data-target="#mod_aulas" data-whatever="@mdo"
            btn-id_aula="'.$id_aula.'"
            btn-id_edificio="'.$id_edificio.'"
            btn-nombre="'.$nombre.'"
            btn-capacidad="'.$capacidad.'"
            btn-ideal="'.$ideal.'"
            btn-tipo="'.$tipo.'"
            btn-estatus="'.$estatus.'"
         ><i class="fa fa-edit"></i> Editar</button>';

      if($estatus==1){ 
      $estatus_t="<center><span class='btn btn-success btn-sm'>Activada</span></center>";
    } else{
      $estatus_t="<center><span class='btn btn-danger btn-sm'>Desactivada</span></center>";
    }

    if($tipo==1){ 
      $tipo_t="<center><span class='btn btn-primary btn-sm'>Aula</span></center>";
    } else{
      $tipo_t="<center><span class='btn btn-primary btn-sm'>Otros</span></center>";
    }
      ?>
      <tr>
        <td><center><? echo $editar; ?></center></td>
        <td><? echo $nombre; ?></td>
        <td><? echo $nombre_e; ?></td>
        <td><? echo $capacidad; ?></td>
        <td><? echo $ideal; ?></td>
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
        <th>Nombre</th>
        <th>Edificio</th>
        <th>Capacidad</th>
        <th>Recomendada</th>
        <th>Tipo</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>