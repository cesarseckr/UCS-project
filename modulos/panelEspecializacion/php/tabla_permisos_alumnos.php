<div id="fdesc">
  <small><b>Ningún filtro aplicado</b> realiza una busqueda para encontrar más datos - Mostrando últimos <b>300</b> registros (<b>Filtros aplicables:</b> Matrícula, Nombre, Apellidos, Estatus, Grupo y Generación)</small>
  </div>
<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de alumnos");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Faltas</th>
        <th class="noExport">Permisos</th>
        <th>Nombre</th>
        <th>Matricula</th>
        <th>Curp</th>
        <th>Grupo</th>
        <th>Generacion</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
       if(isset($_SESSION['filtro'])){
      $fmatricula=$_SESSION['fmatricula'];
      $fnombre=$_SESSION['fnombre'];
      $fapaterno=$_SESSION['fapaterno'];
      $famaterno=$_SESSION['famaterno'];
      $fgrupo=$_SESSION['fgrupo'];
      $fgeneracion=$_SESSION['fgeneracion'];
      $festatus=$_SESSION['festatus'];
      
      if($fmatricula!=""){
      $fmatricula="and matricula LIKE '%$fmatricula%'";
      }
      if($fnombre!=""){
      $fnombre="and nombres LIKE '%$fnombre%'";
      }
      if($fapaterno!=""){
      $fapaterno="and apaterno LIKE '%$fapaterno%'";
      }
      if($famaterno!=""){
      $famaterno="and amaterno LIKE '%$famaterno%'";
      }
      if($fgrupo!=""){
      $fgrupo="and id_grupo='$fgrupo'";
      }
      if($fgeneracion!=""){
      $fgeneracion="and id_generacion='$fgeneracion'";
      }
      if($festatus!=""){
      $festatus="and id_estatus='$festatus'";
      }
      $_SESSION['fmatricula']=null;
      $_SESSION['fnombre']=null;
      $_SESSION['fapaterno']=null;
      $_SESSION['famaterno']=null;
      $_SESSION['fgrupo']=null;
      $_SESSION['fgeneracion']=null;
      $_SESSION['fcarrera']=null;
      $_SESSION['fcurso']=null;
      $_SESSION['fplan']=null;
      $_SESSION['facademia']=null;
      $_SESSION['filtro']=null;
      }
      $sql="SELECT * FROM alumnos WHERE id_alumno<>0 ".$fmatricula." ".$fnombre." ".$fapaterno." ".$famaterno." ".$fgrupo." ".$festatus." ".$fgeneracion." ORDER BY id_alumno DESC LIMIT 300";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
$id_alumno=$row["id_alumno"];
         $matricula=$row["matricula"];
         $nombre=$row["apaterno"]." ".$row["amaterno"]." ".$row["nombres"];
         $sexo=$row["sexo"];
         $fechanac=date("Y-m-d",strtotime($row["fechanac"]));
         $fechaing=date("Y-m-d",strtotime($row["fechaing"]));
         $domicilio=$row["domicilio"];
         $colonia=$row["colonia"];
         $cp=$row["cp"];
         $estado=$row["estado"];
         $estado_t=$row["estado"];
         $municipio=$row["municipio"];
         $municipio_t=$row["municipio"];
         $telefono=$row["telefono"];
         $celular=$row["celular"];
         $email=$row["email"];
         $url=$row["img"];

         $id_grupo=$row["id_grupo"];
         $id_generacion=$row["id_generacion"];

         $ult_grado=$row["ult_grado"];
         $est_prev=$row["est_prev"];

         $apaterno=$row["apaterno"];
         $amaterno=$row["amaterno"];
         $nombres=$row["nombres"];
         $sexo=$row["sexo"];
         $curp=$row["curp"];
         $observaciones=$row["observaciones"];

        $id_estatus=$row["id_estatus"];
        $id_esc_origen=$row["id_esc_origen"];

        $sql="SELECT * FROM grupo where id_grupo='$id_grupo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $grupo_nombre=$row["nombre"];
        $id_curso=$row["id_curso"];
        $id_carrera=$row["id_carrera"];
        }
        $sql="SELECT * FROM generacion where id_generacion='$id_generacion'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $generacion_nombre=$row["nombre"];
        $id_academia=$row["id_academia"];
        }
        $sql="SELECT * FROM academia where id_academia='$id_academia'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $id_plan=$row["id_plan"];
        }

         $sql="SELECT * FROM estatus_alumnos where id_estatus_alumno='$id_estatus'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowes) {
        $nombre_estatus=$rowes["nombre"];
      }

         $sql="SELECT * FROM estados where id_estado='$estado'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowe) {
        $estado_t=strtoupper($rowe["estado"]);
      }

$sql="SELECT * FROM municipios where id_municipio='$municipio'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowm) {
        $municipio_t=strtoupper($rowm["municipio"]);
      }

          $historial_disciplinario='<button class="btn btn-dark"
            id="historial_faltas_permisos" 
            id_alumno="'.$id_alumno.'"
            nombre="'.$nombre.'"
            matricula="'.$matricula.'"
            curp="'.$curp.'"
            grupo="'.$grupo.'"
            generacion="'.$generacion.'"
            estatus="'.$estatus.'"
            data-toggle="modal"
            data-target="#modal_historial_disc"
            data-whatever="@mdo"> <i class="fa fa-history"></i> Historial Disciplinario</button>';

          $historial_permisos='<button class="btn btn-dark"
            id="historial_permisos" 
            tipo_datos="1"
            id_datos="'.$id_alumno.'"
            nombre="'.$nombre.'"
            matricula="'.$matricula.'"
            curp="'.$curp.'"
            data-toggle="modal"
            data-target="#modal_historial_permisos"
            data-whatever="@mdo"> <i class="fa fa-calendar-check"></i>Permisos</button>';

          echo "<tr>
            <td><center>".$historial_disciplinario."</center></td>
            <td><center>".$historial_permisos."</center></td>
            <td>".$nombre."</td>
            <td>".$matricula."</td>
            <td>".$curp."</td>
            <td>".$grupo_nombre."</td>
            <td>".$generacion_nombre."</td>
            <td>".$nombre_estatus."</td>
            </tr>";
        } 
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Faltas</th>
        <th class="noExport">Permisos</th>
        <th>Nombre</th>
        <th>Matricula</th>
        <th>Curp</th>
        <th>Grupo</th>
        <th>Generacion</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>  
