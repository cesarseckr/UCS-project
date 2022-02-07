
<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de Tickets");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Ver</th>
        <th>Titulo</th>
        <th>Fecha</th>
        <th class="noExport"></th>
        <th class="noExport"></th>
      </tr>
    </thead>
    <tbody>
      <? 
        session_start();

        $id_area=$_SESSION["id_area"];
        $sql="SELECT * FROM archivos where id_area='$id_area'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_archivo=utf8_encode($row["id_archivo"]);
         $titulo=utf8_encode($row["titulo"]);
         $ruta=$row["ruta"];
         $fecha_format=utf8_encode($row["fecha"]);
         $fecha=date("d/m/Y h:iA",strtotime($fecha_format));
         $id_area=utf8_encode($row["id_area"]);

          $ver_archivos='<a class="btn btn-secondary"
           id="ver_archivos" 
           id_archivo="'.$id_archivo.'"
            href="../../archivos/'.$ruta.'" target="_blank"><i class="fas fa-eye"></i></a>';

          $sql="SELECT * FROM destinos where id_archivo_destino='$id_archivo'";
          $sq= $db->query($sql);
          $rows=$sq->fetchAll();
          foreach ($rows as $row) {

            $i=$row['id_area_destino'];
            $tipo=$row['id_tipo'];
            if($tipo=='1'){
              $chealm='1';
            }
            if($tipo=='2'){
              $chedoc='1';
            }

            if($tipo=='3'){
              if($i=='1'){
                $che1='1';
              }
              if($i=='2'){ 
                $che2='1';
              }
              if($i=='3'){ 
                $che3='1';
              }
              if($i=='4'){ 
                $che4='1';
              }
              if($i=='5'){ 
                $che5='1';
              }
              if($i=='6'){ 
                $che6='1';
              }
              if($i=='7'){ 
                $che7='1';
              }
              if($i=='9'){ 
                $che9='1';
              }
              if($i=='10'){ 
                $che10='1';
              }
              if($i=='99'){ 
                $che99='1';
              }
            }
          }

          $mod_archivos='<button class="btn btn-success"
           id="mod_archivos" 
           id_archivo="'.$id_archivo.'"
           titulo="'.$titulo.'"
           fecha="'.$fecha.'"
           ruta="'.$ruta.'"
           id_area="'.$id_area.'"
           checked_alumno="'.$chealm.'"
           checked_docente="'.$chedoc.'"
           checked_1="'.$che1.'"
           checked_2="'.$che2.'"
           checked_3="'.$che3.'"
           checked_4="'.$che4.'"
           checked_5="'.$che5.'"
           checked_6="'.$che6.'"
           checked_7="'.$che7.'"
           checked_9="'.$che9.'"
           checked_10="'.$che10.'"
           checked_99="'.$che99.'"
           data-toggle="modal"
           data-target="#modal_mod_archivo"
           data-whatever="@mdo"><i class="fas fa-pen-square"></i></button>';

           $chealm='';
            $chedoc='';
            $che1='';
            $che2='';
            $che3='';
            $che4='';
            $che5='';
            $che6='';
            $che7='';
            $che9='';
            $che10='';
            $che99='';

          $del_archivos='<button class="btn btn-danger"
           id="del_archivos" 
           id_archivo="'.$id_archivo.'"
           ><i class="fas fa-minus-circle"></i></button>';

         echo "
                <tr>
                <td><center>".$ver_archivos."</center></td>
                <td>".$titulo."</td>
                <td>".$fecha."</td>
                <td>".$mod_archivos."</td>
                <td>".$del_archivos."</td>
                </tr>
              ";
        } 
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th>Ver</th>
        <th>Titulo</th>
        <th>Fecha</th>
        <th class="noExport"></th>
        <th class="noExport"></th>
      </tr>
    </tfoot>
  </table>
</div>  