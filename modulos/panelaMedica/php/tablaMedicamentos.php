<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#add-medicamento"data-whatever="@mdo"><i class="menu-icon far fa-clipboard"></i>&nbsp; Nuevo Medicamento</button>
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
        <th>Sustancia Activa</th>
        <th>MG</th>
        <th>Contenido</th>
        <th>Presentación</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM medicamentos";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {

         $id_medicamento=$row["id_medicamento"];
         $marca=$row["marca"];
         $sustancia=$row["sustancia_activa"];
         $mg=$row["mg"];
         $contenido=$row["contenido"];
         $presentacion=$row["presentacion"];

         $editar='<button class="btn btn-secondary" id="modificar_medicamento" 
         id_medicamento="'.$id_medicamento.'"
         marca="'.$marca.'"
         sustancia="'.$sustancia.'"
         mg="'.$mg.'"
         contenido="'.$contenido.'"
         presentacion="'.$presentacion.'" data-toggle="modal" data-target="#mod-medicamento" data-whatever="@mdo">Modificar</button>';

         $sumar='<button class="btn btn-icons btn-rounded  btn-success"
         id="sumar_medicamento" 
         id_medicamento ="'.$id_medicamento.'"
         marca="'.$marca.'"
         sustancia="'.$sustancia.'"
         mg="'.$mg.'"
         contenido="'.$contenido.'"
         presentacion="'.$presentacion.'" data-toggle="modal" data-target="#sumar-medicamento" data-whatever="@mdo"><i class="fa fa-plus"></i></button>';
            
            echo "
	            <tr>
                  <td>".$sumar."</td>
	                <td>".$editar."</td>
	                <td><center>".$marca."</center></td>
	                <td><center>".$sustancia."</center></td>
	                <td>".$mg."</td>
	                <td>".$contenido."</td>
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
        <th>Sustancia Activa</th>
        <th>MG</th>
        <th>Contenido</th>
        <th>Presentación</th>
      </tr>
    </tfoot>
  </table>
</div>  