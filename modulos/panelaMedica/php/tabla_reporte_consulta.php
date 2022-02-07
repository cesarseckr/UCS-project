<div id="fdesc">
  <small><b>Ningún filtro aplicado</b> realiza una busqueda para encontrar más datos - Mostrando últimos <b>300</b> registros (<b>Filtros aplicables:</b> Rango de fechas)</small>
</div>
<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de consultas");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Tipo</th>
        <th>Nombre</th>
        <th>Diagnostico</th>
        <th>Sistema</th>
        <th>Fecha</th>
        <th>Duracion</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
        if(isset($_SESSION['filtro'])){
            $ffecha_ini=$_SESSION['ffecha_ini'];
            $ffecha_fin=$_SESSION['ffecha_fin'];
          if($ffecha_ini!="" and $ffecha_fin==""){
            $ffecha="and fecha = '$ffecha_ini'";
          }
          else if($ffecha_ini=="" and $ffecha_fin!=""){
            $ffecha="and fecha = '$ffecha_fin'";
          }
          else if($ffecha_ini!="" and $ffecha_fin!=""){
            $ffecha="and fecha BETWEEN '$ffecha_ini' and '$ffecha_fin'";
          }
            $_SESSION['ffecha_ini']=null;
            $_SESSION['ffecha_fin']=null;
            $_SESSION['filtro']=null;
        }
        $sql="SELECT * FROM consultas WHERE id_consulta<>0 ".$ffecha." and dirigir = '1'";
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
         $tipo_paciente=$row["tipo_paciente"];
         $duracion=$hora_inicio."-".$hora_fin;
         if($estatus==1){
            $estatus="En espera";
         }else if($estatus==2){
            $estatus="Finalizada";
         }else if($estatus==3){
            $estatus="Cancelada";
         }

          $sql_diagnostico="SELECT * FROM diagnostico WHERE id_consulta='$id_consulta'";
          $sq_diagnostico= $db->query($sql_diagnostico);
          $rows_diagnostico=$sq_diagnostico->fetchAll();
          foreach ($rows_diagnostico as $row_diagnostico){
            $diagnostico=$row_diagnostico['diagnostico'];
            $sistema=$row_diagnostico['sistema'];
            $sql_diag="SELECT * FROM lista_diagnosticos WHERE id_lista_diagnosticos='$diagnostico'";
            $sq_diag= $db->query($sql_diag);
            $rows_diag=$sq_diag->fetchAll();
            foreach ($rows_diag as $row_diag){
              $diagnostico=$row_diag['nombre'];
            }

            $sql_sist="SELECT * FROM lista_sistemas WHERE id_lista_sistemas='$sistema'";
            $sq_sist= $db->query($sql_sist);
            $rows_sist=$sq_sist->fetchAll();
            foreach ($rows_sist as $row_sist){
              $sistema=$row_sist['nombre'];
            }
          }


         if ($tipo_paciente==1) {
            $sql_tipo="SELECT * FROM alumnos WHERE id_alumno = '$id_paciente'";
            $sq_tipo= $db->query($sql_tipo);
            $rows_alumno=$sq_tipo->fetchAll();
            foreach ($rows_alumno as $row_alumno) {
              $tipo="Alumno";
              $nombre=$row_alumno["apaterno"]." ".$row_alumno["amaterno"] ." ".$row_alumno["nombres"];
              echo "
                <tr>
                  <td><center>".$tipo."</center></td>
                  <td><center>".$nombre."</center></td>
                  <td>".$diagnostico."</td>
                  <td>".$sistema."</td>
                  <td>".$fecha_inicio."</td>
                  <td>".$duracion."</td>
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
                  <td><center>".$tipo."</center></td>
                  <td><center>".$nombre."</center></td>
                  <td>".$diagnostico."</td>
                  <td>".$sistema."</td>
                  <td>".$fecha_inicio."</td>
                  <td>".$duracion."</td>
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
                  <td><center>".$tipo."</center></td>
                  <td><center>".$nombre."</center></td>
                  <td>".$diagnostico."</td>
                  <td>".$sistema."</td>
                  <td>".$fecha_inicio."</td>
                  <td>".$duracion."</td>
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
                  <td><center>".$tipo."</center></td>
                  <td><center>".$nombre."</center></td>
                  <td>".$diagnostico."</td>
                  <td>".$sistema."</td>
                  <td>".$fecha_inicio."</td>
                  <td>".$duracion."</td>
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
        <th>Tipo</th>
        <th>Nombre</th>
        <th>Diagnostico</th>
        <th>Sistema</th>
        <th>Fecha</th>
        <th>Duracion</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>  
