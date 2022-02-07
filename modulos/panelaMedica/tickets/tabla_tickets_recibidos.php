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
        <th>Area de origen</th>
      </tr>
    </thead>
    <tbody>
      <? 
        session_start();

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

        $sql="SELECT * FROM tickets WHERE id_area='$id_area_adm'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_tickets=utf8_encode($row["id_tickets"]);
         $titulo=utf8_encode($row["titulo"]);
         $fecha_format=utf8_encode($row["fecha"]);
         $fecha=date("d/m/Y h:iA",strtotime($fecha_format));
         $prioridad=utf8_encode($row["prioridad"]);
         $estado=utf8_encode($row["estado"]);
         $id_area=utf8_encode($row["id_area_origen"]);

         $sql_area="SELECT * FROM areas WHERE id_area='$id_area'";
         $sq_area= $db->query($sql_area);
         $rows_area=$sq_area->fetchAll();
         foreach ($rows_area as $row_area) {
            $area=utf8_encode($row_area["area"]);
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
              if ($cont!=0) {
                $notif='<span class="badge badge-danger">'.$cont.'</span>';
              }

           $ver_ticket='<a class="btn btn-secondary nav-link"
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
            </a>';

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
        <th>Area de origen</th>
      </tr>
    </tfoot>
  </table>
</div>  
