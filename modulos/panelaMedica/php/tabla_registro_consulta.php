<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de consultas");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Imprimir</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Hora Inicio</th>
        <th>Hora Fin</th>
        <th>Area</th>
        <th>estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM consultas WHERE fecha = '$fecha'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_paciente=$row["id_paciente"];
         $id_consulta=$row["id_consulta"];
         $fecha_inicio=$row["fecha"];
         $hora_inicio=$row["hora_inicio"];
         $hora_fin=$row["hora_fin"];
         $estatus=$row["estatus"];
         $dirigir=$row["dirigir"];

         if ($dirigir ==1) {
           $dirigir='<div class="text-primary"><i class="menu-icon fas fa-user-md"></i>
            <span class="menu-title">Consultas</span></div>';
         }else if($dirigir ==2){
            $dirigir='<div class="text-info"><i class="menu-icon fas fa-laptop-medical"></i>
                  <span class="menu-title">A.Enfermería</span></div>';
         }

         if ($estatus=='1') {
           $estatus='<center><p class="btn btn-primary btn-sm">Espera</p></center>';
           $editar='<button class="btn btn-danger" id="modificar_consulta" id_consulta="'.$id_consulta.'"> <i class="fa fa-ban"></i> Cancelar</button>';
           $tomar='<button id="btn_diagnostico" id_consulta="'.$id_consulta.'" type="button" class="btn btn-dark" data-toggle="modal" data-target="#add_diagnostico" data-whatever="@mdo"><i class="mdi mdi-account-plus"></i>&nbsp; Tomar</button>';
           $imprimir='<a class="btn btn-secondary"
           id="ver_archivos" 
           id_consulta="'.$id_consulta.'"
            href="pdf/reporte_consulta.php?id_consulta='.$id_consulta.'" target="_blank"><i class="fas fa-print"></i></a>';
         }elseif ($estatus=='2') {
           $estatus='<center><p class="btn btn-success btn-sm">Finalizada</p></center>';
           $editar='<button class="btn btn-danger" disabled> <i class="fa fa-ban"></i> Cancelar</button>';
           $tomar='<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#add_diagnostico" data-whatever="@mdo" disabled><i class="mdi mdi-account-plus" id_consulta="'.$id_consulta.'"></i>&nbsp; Tomar</button>';
           $imprimir='<a class="btn btn-secondary"
           id="ver_archivos" 
           id_consulta="'.$id_consulta.'"
            href="pdf/reporte_consulta.php?id_consulta='.$id_consulta.'" target="_blank"><i class="fas fa-print"></i></a>';
         }elseif ($estatus=='3') {
           $estatus='<center><p class="btn btn-danger btn-sm">Cancelada</p></center>';
           $editar='<button class="btn btn-danger"disabled> <i class="fa fa-ban"></i> Cancelar</button>';
           $tomar='<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#add_diagnostico" data-whatever="@mdo" disabled><i class="mdi mdi-account-plus" id_consulta="'.$id_consulta.'"></i>&nbsp; Tomar</button>';
           $imprimir='<a class="btn btn-secondary"
           id="ver_archivos" 
           id_consulta="'.$id_consulta.'"
            href="pdf/reporte_consulta.php?id_consulta='.$id_consulta.'" target="_blank"><i class="fas fa-print"></i></a>';
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
                <td>".$imprimir."</td>
                <td>".$nombre."</td>
                <td>".$tipo."</td>
                <td>".$hora_inicio."</td>
                <td>".$hora_fin."</td>
                <td>".$dirigir."</td>
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
                <td>".$imprimir."</td>
                <td>".$nombre."</td>
                <td>".$tipo."</td>
                <td>".$hora_inicio."</td>
                <td>".$hora_fin."</td>
                <td>".$dirigir."</td>
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
                <td>".$imprimir."</td>
                <td>".$nombre."</td>
                <td>".$tipo."</td>
                <td>".$hora_inicio."</td>
                <td>".$hora_fin."</td>
                <td>".$dirigir."</td>
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
                <td>".$imprimir."</td>
                <td>".$nombre."</td>
                <td>".$tipo."</td>
                <td>".$hora_inicio."</td>
                <td>".$hora_fin."</td>
                <td>".$dirigir."</td>
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
        <th>Imprimir</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Hora Inicio</th>
        <th>Hora Fin</th>
        <th>Area</th>
        <th>estatus</th>
      </tr>
    </tfoot>
  </table>
</div>  
