<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de consultas");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Ver</th>
        <th class="noExport">Tomar</th>
        <th class="noExport">Cancelar</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Hora Inicio</th>
        <th>Hora Fin</th>
        <th>estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM consultas WHERE fecha = '$fecha' and dirigir = '2'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_consulta=$row["id_consulta"];
         $dirigir=$row["dirigir"];

         $sql_soma="SELECT * FROM consulta_somatometria WHERE id_consulta='$id_consulta'";
          $sq_soma= $db->query($sql_soma);
          $rows_soma=$sq_soma->fetchAll();
          foreach ($rows_soma as $row_soma) {
            $talla=$row_soma['talla'];
            $peso=$row_soma['peso'];
            $imc=$row_soma['imc'];
          }

          $sql_vita="SELECT * FROM consulta_svitales WHERE id_consulta='$id_consulta'";
          $sq_vita= $db->query($sql_vita);
          $rows_vita=$sq_vita->fetchAll();
          foreach ($rows_vita as $row_vita) {
            $presion_arterial=$row_vita['presion_arterial'];
            $f_cardiaca=$row_vita['f_cardiaca'];
            $f_respiratoria=$row_vita['f_respiratoria'];
            $temp=$row_vita['temp'];
          }

         $id_paciente=$row["id_paciente"];
         $fecha_inicio=$row["fecha"];
         $hora_inicio=$row["hora_inicio"];
         $hora_fin=$row["hora_fin"];
         $estatus=$row["estatus"];
         if ($estatus=='1') {
           $estatus='<center><p class="btn btn-primary btn-sm">Espera</p></center>';
           $editar='<button class="btn btn-danger" id="modificar_consulta" id_consulta="'.$id_consulta.'"> <i class="fa fa-ban"></i> Cancelar</button>';
           $tomar='<button id="btn_diagnostico" id_consulta="'.$id_consulta.'" 
             talla="'.$talla.'"
             peso="'.$peso.'"
             imc="'.$imc.'"
             presion_arterial="'.$presion_arterial.'"
             f_cardiaca="'.$f_cardiaca.'"
             f_respiratoria="'.$f_respiratoria.'"
             temp="'.$temp.'"
             dirigir="'.$dirigir.'"
             type="button" class="btn btn-dark"
             data-toggle="modal"
             data-target="#add_diagnostico"
             data-whatever="@mdo"><i class="menu-icon fas fa-laptop-medical"></i>&nbsp;
             Tomar</button>';
           $ver='<a class="btn btn-secondary"
           id="ver_archivos" 
           iid_consulta="'.$id_consulta.'
            href="../../archivos/'.$ruta.'" target="_blank"><i class="fas fa-eye"></i></a>';
         }elseif ($estatus=='2') {
           $estatus='<center><p class="btn btn-success btn-sm">Finalizada</p></center>';
           $editar='<button class="btn btn-danger" disabled> <i class="fa fa-ban"></i> Cancelar</button>';
           $tomar='<button type="button" class="btn btn-dark"
           id_consulta="'.$id_consulta.'"
            talla="'.$talla.'"
             peso="'.$peso.'"
             imc="'.$imc.'"
             presion_arterial="'.$presion_arterial.'"
             f_cardiaca="'.$f_cardiaca.'"
             f_respiratoria="'.$f_respiratoria.'"
             temp="'.$temp.'" 
             dirigir="'.$dirigir.'"
             data-toggle="modal" 
             data-target="#add_diagnostico" 
             data-whatever="@mdo" 
             disabled><i class="menu-icon fas fa-laptop-medical"></i>&nbsp; Tomar</button>';
           $ver='<a class="btn btn-secondary"
           id="ver_archivos" 
           iid_consulta="'.$id_consulta.'
            href="../../archivos/'.$ruta.'" target="_blank"><i class="fas fa-eye"></i></a>';
         }elseif ($estatus=='3') {
           $estatus='<center><p class="btn btn-danger btn-sm">Cancelada</p></center>';
           $editar='<button class="btn btn-danger"disabled> <i class="fa fa-ban"></i> Cancelar</button>';
           $tomar='<button type="button"
           id_consulta="'.$id_consulta.'"
             talla="'.$talla.'"
             peso="'.$peso.'"
             imc="'.$imc.'"
             presion_arterial="'.$presion_arterial.'"
             f_cardiaca="'.$f_cardiaca.'"
             f_respiratoria="'.$f_respiratoria.'"
             temp="'.$temp.'"
             dirigir="'.$dirigir.'" class="btn btn-dark" data-toggle="modal" data-target="#add_diagnostico" data-whatever="@mdo" disabled>
           <i class="menu-icon fas fa-laptop-medical"></i>&nbsp; Tomar</button>';
           $ver='<a class="btn btn-secondary"
           id="ver_archivos" 
           iid_consulta="'.$id_consulta.'
            href="../../archivos/'.$ruta.'" target="_blank"><i class="fas fa-eye"></i></a>';
         }
         $tipo_paciente=$row["tipo_paciente"];
         if ($tipo_paciente==1) {
            $sql_tipo="SELECT * FROM alumnos WHERE id_alumno = '$id_paciente'";
            $sq_tipo= $db->query($sql_tipo);
            $rows_alumno=$sq_tipo->fetchAll();
            foreach ($rows_alumno as $row_alumno) {
              $tipo="Alumno";
              $nombre=$row_alumno["apaterno"]." ".$row_alumno["amaterno"] ." ".$row_alumno["nombres"];
              echo "
                <tr>
                <td><center>".$ver."</center></td>
                <td><center>".$tomar."</center></td>
                <td><center>".$editar."</center></td>
                <td>".$nombre."</td>
                <td>".$tipo."</td>
                <td>".$hora_inicio."</td>
                <td>".$hora_fin."</td>
                <td>".$estatus."</td>
                </tr>
              ";
            }
          }elseif($tipo_paciente==2) {
            $sql_tipo="SELECT * FROM docentes WHERE id_docente = '$id_paciente'";
            $sq_tipo= $db->query($sql_tipo);
            $rows_docente=$sq_tipo->fetchAll();
            foreach ($rows_docente as $row_docente) {
              $tipo="Docente";
              $nombre=$row_docente["apaterno"]." ".$row_docente["amaterno"] ." ".$row_docente["nombres"];
              echo "
                <tr>
                <td><center>".$ver."</center></td>
                <td><center>".$tomar."</center></td>
                <td><center>".$editar."</center></td>
                <td>".$nombre."</td>
                <td>".$tipo."</td>
                <td>".$hora_inicio."</td>
                <td>".$hora_fin."</td>
                <td>".$estatus."</td>
                </tr>
              ";
            }
          }elseif($tipo_paciente==3) {
            $sql_tipo="SELECT * FROM administrativos WHERE id_administrativo = '$id_paciente'";
            $sq_tipo= $db->query($sql_tipo);
            $rows_administrativo=$sq_tipo->fetchAll();
            foreach ($rows_administrativo as $row_administrativo) {
              $tipo="Administrativo";
              $nombre=$row_administrativo["apaterno"]." ".$row_administrativo["amaterno"] ." ".$row_administrativo["nombres"];
              echo "
               <tr>
               <td><center>".$ver."</center></td>
                <td><center>".$tomar."</center></td>
                <td><center>".$editar."</center></td>
                <td>".$nombre."</td>
                <td>".$tipo."</td>
                <td>".$hora_inicio."</td>
                <td>".$hora_fin."</td>
                <td>".$estatus."</td>
                </tr>
              ";
            }
          }elseif($tipo_paciente==55) {
            $sql_tipo="SELECT * FROM otro WHERE id_otro = '$id_paciente'";
            $sq_tipo= $db->query($sql_tipo);
            $rows_otro=$sq_tipo->fetchAll();
            foreach ($rows_otro as $row_otro) {
              $tipo="Otro";
              $nombre=$row_otro["nombre"];
              echo "
               <tr>
                <td><center>".$ver."</center></td>
                <td><center>".$tomar."</center></td>
                <td><center>".$editar."</center></td>
                <td>".$nombre."</td>
                <td>".$tipo."</td>
                <td>".$hora_inicio."</td>
                <td>".$hora_fin."</td>
                <td>".$estatus."</td>
                </tr>
              ";
            }
          }
        } 
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Ver</th>
        <th class="noExport">Tomar</th>
        <th class="noExport">Cancelar</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Hora Inicio</th>
        <th>Hora Fin</th>
        <th>estatus</th>
      </tr>
    </tfoot>
  </table>
</div>  
