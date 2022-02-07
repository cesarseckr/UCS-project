<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#add-materiales" data-whatever="@mdo"><i class="menu-icon far fa-clipboard"></i>&nbsp; Nuevo Material Médico</button>
<br>
<br>
<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de medicamentos");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Aumentar</th>
        <th>Modificar</th>
        <th>Marca</th>
        <th>Material</th>
        <th>Cantidad</th>
        <th>Presentación</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM material_medico";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {

         $id_materialm=$row["id_materialm"];
         $marca=$row["marca"];
         $material=$row["material"];
         $cantidad_total=$row["cantidad_total"];
         $presentacion=$row["presentacion"];
         $editar='<button class="btn btn-secondary" id="modificar_material" 
         id_material="'.$id_materialm.'"
         marca="'.$marca.'"
         material="'.$material.'"
         cantidad="'.$cantidad_total.'"
         presentacion="'.$presentacion.'"
         data-toggle="modal" data-target="#mod-material" data-whatever="@mdo"
         >Modificar</button>';

         $sumar='<button class="btn btn-icons btn-rounded  btn-success" id="sumar_material" 
         id_material="'.$id_materialm.'"
         marca="'.$marca.'"
         sustancia="'.$sustancia.'"
         mg="'.$mg.'"
         contenido="'.$contenido.'"
         presentacion="'.$presentacion.'" data-toggle="modal" data-target="#sumar-material" data-whatever="@mdo"><i class="fa fa-plus"></i></button>';

            echo "
              <tr>
                  <td>".$sumar."</td>
                  <td>".$editar."</td>
                  <td><center>".$marca."</center></td>
                  <td><center>".$material."</center></td>
                  <td>".$cantidad_total."</td>
                  <td>".$presentacion."</td>
              </tr>
            ";
        } 
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th>Aumentar</th>
        <th>Modificar</th>
        <th>Marca</th>
        <th>Material</th>
        <th>Cantidad</th>
        <th>Presentación</th>
      </tr>
    </tfoot>
  </table>
</div> 