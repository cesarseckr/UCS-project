
<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de Tickets");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport"></th>
        <th>Titulos</th>
        <th>Fecha/Hora</th>
        <th>Prioridad</th>
        <th>Estado</th>
        <th>Area al que se dirige</th>
      </tr>
    </thead>
    <tbody>
      <? 
        session_start();

        $id_usuario=$_SESSION["id_usuario"];
        $sql="SELECT * FROM tickets where fecha='$fecha' and id_origen='$id_usuario'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_tickets=utf8_encode($row["id_tickets"]);
         $titulo=utf8_encode($row["titulo"]);
         $fecha=utf8_encode($row["fecha"]);
         $fecha=date("d/m/Y",strtotime($fecha));
         $hora=utf8_encode($row["hora"]);
         $fecha=$fecha." ".$hora;
         $prioridad=utf8_encode($row["prioridad"]);
         $estado=utf8_encode($row["estado"]);
         $id_area=utf8_encode($row["id_area"]);

         $sql_area="SELECT * FROM areas WHERE id_area='$id_area'";
         $sq_area= $db->query($sql_area);
         $rows_area=$sq_area->fetchAll();
         foreach ($rows_area as $row_area) {
            $area=utf8_encode($row_area["area"]);
          }
         $ver_ticket='<button class="btn btn-secondary"
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
            $estado='<span class="btn btn-warning btn-xs">Pendiente</span>';
         }
         else if($estado==2){
            $estado='<span class="btn btn-info btn-xs">Atendiendo</span>';
         }else if($estado==3){
            $estado='<span class="btn btn-success btn-xs">Finalizado</span>';
         }

         echo "
                <tr>
                <td><center>".$ver_ticket."</center></td>
                <td>".$titulo."</td>
                <td>".$fecha."</td>
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
        <th class="noExport"></th>
        <th>Titulos</th>
        <th>Fecha/Hora</th>
        <th>Prioridad</th>
        <th>Estado</th>
        <th>Area al que se dirige</th>
      </tr>
    </tfoot>
  </table>
</div>  
