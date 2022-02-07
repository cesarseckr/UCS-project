<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de consultas");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Tomar</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM consultas WHERE fecha = '$fecha' and dirigir = '1' and estatus='2'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_consulta=$row["id_consulta"];
         $dirigir=$row["dirigir"];
         $id_paciente=$row["id_paciente"];
         $fecha_inicio=$row["fecha"];
         $hora_inicio=$row["hora_inicio"];
         $hora_fin=$row["hora_fin"];
         $estatus=$row["estatus"];
         $surtir_material=$row["surtir_material"];
         $sql_diagnostico="SELECT * FROM diagnostico WHERE id_consulta='$id_consulta'";
         $sq_diagnostico= $db->query($sql_diagnostico);
         $rows_diagnostico=$sq_diagnostico->fetchAll();
         foreach($rows_diagnostico as $row_diagnostico){
            $id_diagnostico=$row_diagnostico['id_diagnostico'];
            $observaciones=$row_diagnostico['observaciones'];
         }
         if ($estatus=='1') {
           $estatus='<center><p class="btn btn-primary btn-sm">Espera</p></center>';
         }elseif ($estatus=='2') {
           $estatus='<center><p class="btn btn-success btn-sm">Finalizada</p></center>';
         }elseif ($estatus=='3') {
           $estatus='<center><p class="btn btn-danger btn-sm">Cancelada</p></center>';
         }
         if ($surtir_material=='1') {
              $tomar='<button id="diagnostico_farmacia" id_consulta="'.$id_consulta.'" id_diagnostico="'.$id_diagnostico.'" talla="'.$talla.'" peso="'.$peso.'" imc="'.$imc.'" presion_arterial="'.$presion_arterial.'" f_cardiaca="'.$f_cardiaca.'" f_respiratoria="'.$f_respiratoria.'" temp="'.$temp.'" dirigir="'.$dirigir.'" observaciones="'.$observaciones.'" type="button" class="btn btn-dark" data-toggle="modal" data-target="#add_farmacia" data-whatever="@mdo" disabled><i class="menu-icon fas fa-first-aid"></i>&nbsp;surtir</button>';
         }else{
            $tomar='<button id="diagnostico_farmacia" id_consulta="'.$id_consulta.'" id_diagnostico="'.$id_diagnostico.'" talla="'.$talla.'" peso="'.$peso.'" imc="'.$imc.'" presion_arterial="'.$presion_arterial.'" f_cardiaca="'.$f_cardiaca.'" f_respiratoria="'.$f_respiratoria.'" temp="'.$temp.'" dirigir="'.$dirigir.'" observaciones="'.$observaciones.'" type="button" class="btn btn-dark" data-toggle="modal" data-target="#add_farmacia" data-whatever="@mdo"><i class="menu-icon fas fa-first-aid"></i>&nbsp;Surtir</button>';
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
                <td><center>".$tomar."</center></td>
                <td>".$nombre."</td>
                <td>".$tipo."</td>
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
                <td><center>".$tomar."</center></td>
                <td>".$nombre."</td>
                <td>".$tipo."</td>
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
               <td><center>".$tomar."</center></td>
                <td>".$nombre."</td>
                <td>".$tipo."</td>
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
                <td><center>".$tomar."</center></td>
                <td>".$nombre."</td>
                <td>".$tipo."</td>
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
        <th class="noExport">Tomar</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>estatus</th>
      </tr>
    </tfoot>
  </table>
</div>  
