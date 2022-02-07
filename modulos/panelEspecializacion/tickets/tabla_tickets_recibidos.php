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
        <th class="noExport">Ver Ticket</th>
        <th>Folio</th>
        <th>Prioridad</th>
        <th>Descripción</th>
        <th>Fecha</th>
        <th>Área de origen</th>
        <th>Tipo</th>
        <th>Estado</th>
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

        $id_usuario=$_SESSION["id_usuario"];
        $id_datos=$_SESSION["id_datos"];
        $id_tipo=$_SESSION["tipo"];
        if ($id_tipo==1) {
          # code...
        }else if ($id_tipo==2) {
          # code...
        }else if ($id_tipo==3) {
          $sql_administrativo="SELECT * FROM administrativos WHERE id_administrativo='$id_datos'";
          $sq_administrativo= $db->query($sql_administrativo);
          $rows_administrativo=$sq_administrativo->fetchAll();
          foreach ($rows_administrativo as $row_administrativo) {
              $id_area_adm=$row_administrativo['id_area'];
          }
        }else if ($id_tipo==99) {
          # code...
        } 

        $sql="SELECT * FROM tickets WHERE id_area='$id_area_adm' $ffecha";
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
         $id_area=$row["id_area_origen"];
         $id_tipo_origen=$row["id_tipo_origen"];
         $sql_area="SELECT * FROM areas WHERE id_area='$id_area'";
         $sq_area= $db->query($sql_area);
         $rows_area=$sq_area->fetchAll();
         foreach ($rows_area as $row_area) {
            $area=$row_area["area"];
          }
          if($id_area==0){
            $area="NA";
          }

          $sql="SELECT * FROM tipos WHERE id_tipo='$id_tipo_origen'";
         $sq= $db->query($sql);
         $rows=$sq->fetchAll();
         foreach ($rows as $row) {
            $tipo=$row["tipo"];
          }

          if($id_area==0){
            $area="NA";
          }
          

          $sql="SELECT * FROM tickets WHERE id_area='$id_area'";
              $sq=$db->query($sql);
              $rows=$sq->fetchAll();
              foreach($rows as $row){
               $cont=0;
               $sql_tickets="SELECT * FROM contenido_tickets WHERE estatus='1' and id_tickets='$id_tickets'";
                $sq_tickets=$db->query($sql_tickets);
                $rows_tickets=$sq_tickets->fetchAll();
                foreach ($rows_tickets as $row_tickets) {
                  $cont++;
                }
              }
              $notif='';
              if($estado==1){
              if ($cont!=0) {
                $notif='<span class="badge badge-danger">'.$cont.'</span>';
              }
              }

            $ver_ticket='<button type="button" class="btn btn-dark nav-link"
               id="ver_ticket" 
               id_tickets="'.$id_tickets.'"
               titulo="'.$titulo.'"
               fecha="'.$fecha.'"
               prioridad="'.$prioridad.'"
               estado="'.$estado.'"
               id_area="'.$id_area.'"
               id_area_adm="'.$id_area_adm.'"
               id_tipo="'.$id_tipo.'"
               id_datos="'.$id_datos.'"
               data-toggle="modal"
               data-target="#modal_ver_tickets"
               data-whatever="@mdo">
                <i class="fas fa-sign-out-alt"></i>&nbsp;Ver ticket 
                 '.$notif.'
                <i class="menu-arrow"></i>
              </button>';

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
                  <td>".$prioridad."</td>
                  <td>".$titulo."</td>
                  <td>".$fecha_f."</td>
                  <td>".$area."</td>
                  <td>".$tipo."</td>
                  <td>".$estado."</td>
                </tr>
              ";
        } 
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Ver Ticket</th>
        <th>Folio</th>
        <th>Prioridad</th>
        <th>Descripción</th>
        <th>Fecha/Hora</th>
        <th>Área de origen</th>
        <th>Tipo</th>
        <th>Estado</th>
      </tr>
    </tfoot>
  </table>
</div>  
