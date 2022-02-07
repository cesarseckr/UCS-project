<div id="fdesc">
  <small><b>Ningún filtro aplicado</b> realiza una busqueda para encontrar más datos - Mostrando últimos <b>300</b> registros (<b>Filtros aplicables:</b> Rango de fechas)</small>
  </div>
<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de Tickets");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Ver ticket</th>
        <th>Folio</th>
        <th>Titulo</th>
        <th>Fecha</th>
        <th>Prioridad</th>
        <th>Estado</th>
        <th>Área dirigida</th>
      </tr>
    </thead>
    <tbody>
      <? 
              if(isset($_SESSION['filtro'])){
      $ffecha_ini=$_SESSION['ffecha_ini'];
      $ffecha_fin=$_SESSION['ffecha_fin'];

      if($ffecha_ini!="" and $ffecha_fin==""){
      $ffecha="and fecha='$ffecha_ini'";
      }
      else if($ffecha_fin!="" and $ffecha_ini==""){
      $ffecha="and fecha_inicio='$ffecha_fin'";
      }
      else if($ffecha_fin!="" and $ffecha_ini!=""){
      $ffecha="and fecha BETWEEN '$ffecha_ini' AND '$ffecha_fin'";
      }
      $_SESSION['ffecha_ini']=null;
      $_SESSION['ffecha_fin']=null;
      }

        $sql="SELECT * FROM tickets where id_origen='$id_usuario' $ffecha order by id_tickets DESC";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_tickets=$row["id_tickets"];
         $titulo=$row["titulo"];
         $fecha=$row["fecha"];
         $fecha=date("d/m/Y",strtotime($fecha));
         $hora=$row["hora"];
         $hora_f=date("h:i A",strtotime($row["hora"]));
         $fecha_f=$fecha." ".$hora_f;
         $fecha=$fecha." ".$hora;         
         $prioridad=$row["prioridad"];
         $estado=$row["estado"];
         $id_area=$row["id_area"];

         $sql_area="SELECT * FROM areas WHERE id_area='$id_area'";
         $sq_area= $db->query($sql_area);
         $rows_area=$sq_area->fetchAll();
         foreach ($rows_area as $row_area) {
            $area=$row_area["area"];
          }
         $ver_ticket='<button type="button" class="btn btn-dark"
           id="ver_ticket" 
           id_tickets="'.$id_tickets.'"
           titulo="'.$titulo.'"
           fecha="'.$fecha.'"
           prioridad="'.$prioridad.'"
           estado="'.$estado.'"
           id_area="'.$id_area.'"
           data-toggle="modal"
           data-target="#modal_ver_tickets"
           data-whatever="@mdo"><i class="fas fa-sign-out-alt"></i>&nbsp;Ver ticket</button>';

         if($prioridad==1){
            $prioridad='<span class="btn btn-success btn-xs">Baja</span>';
         }
         else if($prioridad==2){
            $prioridad='<span class="btn btn-warning btn-xs">Media</span>';
         }else if($prioridad==3){
            $prioridad='<span class="btn btn-danger btn-xs">Alta</span>';
         }

         if($estado==1){
            $estado='<span class="btn btn-warning btn-xs btn-group">Pendiente</span>';
         }
         else if($estado==2){
            $estado='<span class="btn btn-info btn-xs">Atendiendo</span>';
         }else if($estado==3){
            $estado='<span class="btn btn-success btn-xs">Finalizado</span>';
         }

         echo "
                <tr>
                <td><center>".$ver_ticket."</center></td>
                <td>".$id_tickets."</td>
                <td>".$titulo."</td>
                <td>".$fecha_f."</td>
                <td>".$prioridad."</td>
                <td>".$estado."</td>
                <td>".$area."</td>
                </tr>
              ";
        } 
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Ver ticket</th>
        <th>Folio</th>
        <th>Titulo</th>
        <th>Fecha</th>
        <th>Prioridad</th>
        <th>Estado</th>
        <th>Área dirigida</th>
      </tr>
    </tfoot>
  </table>
</div>  
