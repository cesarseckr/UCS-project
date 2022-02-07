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
      <th>Usuario</th>
      <th>Tipo</th>
      <th>Area</th>
      <th>Estatus</th>
    </tr>
  </thead>
  <tbody>
    <? 
      $sql="SELECT * FROM usuarios";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
       $id_usuario=$row["id_usuario"];
       $id_tipo=$row["id_tipo"];
       $id_datos=$row["id_datos"];
       $usuario=$row["usuario"];
       $pass=$row["pass"];
       $estatus=$row["estatus"];
       //Bloque estatus
       if($estatus==1){
          $estatus_act='<span class="btn btn-primary btn-xs">Activo</span>';
       }
       else{
          $estatus_act='<span class="btn btn-danger btn-xs">Baja</span>';
       }
       $ps=$row["ps"];
       $editar='<button id="modificar_usuario" type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#mod_usuarios"  data-whatever="@mdo"
            btn-id_usuario="'.$id_usuario.'"
            btn-id_tipo="'.$id_tipo.'"
            btn-id_datos="'.$id_datos.'"
            btn-usuario="'.$usuario.'"
            btn-token="'.$pass.'"
            btn-estatus="'.$estatus.'"
            btn-ps="'.$ps.'"
         >Modificar</button>';
        $area="No aplica";

       //Bloque tipo de usuario

        $sql="SELECT tipo FROM tipos where id_tipo='$id_tipo'";
          $sq= $db->query($sql);
          $rows=$sq->fetchAll();
          foreach ($rows as $row) {
              $nombre_tipo=$row["tipo"];
            }


       if($id_tipo==99 or $id_tipo==3){
          $sql="SELECT areas.area FROM administrativos, areas where areas.id_area=administrativos.id_area and administrativos.id_administrativo='$id_datos'";
          $sq= $db->query($sql);
          $rows=$sq->fetchAll();
          foreach ($rows as $row) {
              $area=$row["area"];
            }
          }
              
              echo'
              <tr>
                <td><center>'.$editar.'</center></td>
                <td>'.$usuario.'</td>
                <td>'.$nombre_tipo.'</td>
                <td>'.$area.'</td>
                <td><center>'.$estatus_act.'</center></td>
              </tr>';
     } 
     ?>
  </tbody>
  <tfoot>
    <tr>
      <th class="noExport">Editar</th>
      <th>Usuario</th>
      <th>Tipo</th>
      <th>Area</th>
      <th>Estatus</th>
    </tr>
  </tfoot>
</table>
<?  
$_SESSION['edo_con']=null;
$_SESSION['mun_con']=null;
?>