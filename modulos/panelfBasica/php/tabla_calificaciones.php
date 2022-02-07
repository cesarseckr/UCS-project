  <div id="fdesc">
  <small><b>Seleccione un grupo para filtrar</b></small>
  </div>
 <div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de grupos");
    });
  </script>
  <table id="tabla-1" class="table table-bordered">
    <thead>
      <tr>
        <th class="noExport">Editar</th>
        <th>Alumno</th>
        <th>Profesor</th>
        <th>Materia</th>
        <th>Calificación</th>
        <th>Asistencia</th>
        <th>Estatus</th>
        <th>Tipo</th>
        <th>Fecha</th>
      </tr>
    </thead>
    <tbody>
      <? 
      if(isset($_SESSION['filtro'])){
      $fgrupo=$_SESSION['fgrupo'];
      if($fgrupo!=""){
      $fgrupo="id_grupo='$fgrupo'";
      }
      $_SESSION['fgrupo']=null;
      $_SESSION['filtro']=null;
      $sql="SELECT * FROM grupo WHERE ".$fgrupo;
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_grupo=$row["id_grupo"];
         $id_ciclo=$row["id_ciclo"];
         
         $sql="SELECT * FROM ciclo where id_ciclo='$id_ciclo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $id_plan=$row["id_plan"];

        $sql="SELECT * FROM planes where id_plan='$id_plan'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $calif_minima=$row["calif_minima"];
        $asistencia_minima=$row["asistencia_minima"];
          }
          }

        $sql="SELECT * FROM calificaciones where id_grupo='$id_grupo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $id_calificacion=$row["id_calificacion"];
        $id_alumno=$row["id_alumno"];
        $id_materia=$row["id_materia"];
        $periodo=$row["periodo"];
        $calificacion=$row["calificacion"];
        $faltas=$row["faltas"];
        $fecha=date("d-m-Y h:iA",strtotime($row["fecha"]));

        $sql="SELECT * FROM materias_asignacion where id_materia='$id_materia' and id_grupo='$id_grupo' and id_ciclo='$id_ciclo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $id_docente=$row["id_docente"];
        
         $sql="SELECT * FROM docentes where id_docente='$id_docente'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $nombre_docente=$row["apaterno"]." ".$row["amaterno"]." ".$row["nombres"];
        }

        }

        if($periodo==1 and $faltas>=$asistencia_minima and $calificacion>=$calif_minima){
        $aprobado="<center><span class='btn btn-success btn-sm'>APROBADO</span></center>";
        }
        else if($periodo!=1 and $calificacion>=$calif_minima){
        $aprobado="<center><span class='btn btn-success btn-sm'>APROBADO</span></center>";
        }
        else{
        $aprobado="<center><span class='btn btn-danger btn-sm'>REPROBADO</span></center>";
        }

        $sql="SELECT * FROM alumnos where id_alumno='$id_alumno'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $nombre_alumno=$row["apaterno"]." ".$row["amaterno"]." ".$row["nombres"];
      }

      $sql="SELECT * FROM materia where id_materia='$id_materia'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $materia=$row["clave"]." - ".$row["nombre"];
        $creditos=$row["nombre"];
      }
         $editar='<button id="btn_mod_calificaciones" type="button" class="btn btn-dark btn-block btn-sm" data-toggle="modal" data-target="#mod_calificaciones" data-whatever="@mdo"
            btn-id_calificacion="'.$id_calificacion.'"
            btn-calificacion="'.$calificacion.'"
            btn-faltas="'.$faltas.'"
            btn-id_grupo="'.$id_grupo.'"
            btn-alumno="'.$nombre_alumno.'"
            btn-materia="'.$materia.'"
         ><i class="fa fa-edit"></i> Editar</button>';

    if($periodo==1){ 
      $estatus_t="<center><span class='btn btn-success btn-sm'>REGULAR</span></center>";
    } else if($periodo==2){
      $estatus_t="<center><span class='btn btn-warning btn-sm'>EXTRA</span></center>";
    } else{
      $estatus_t="<center><span class='btn btn-danger btn-sm'>ESPECIAL</span></center>";
    }
      ?>
      <tr>
        <td><center><? echo $editar; ?></center></td>
        <td><? echo $nombre_alumno; ?></td>
        <td><? echo $nombre_docente; ?></td>
        <td><? echo $materia; ?></td>
        <td><? echo $calificacion; ?></td>
        <td><? echo $faltas; ?>%</td>
        <td><? echo $aprobado; ?></td>
        <td><? echo $estatus_t; ?></td>
        <td><? echo $fecha; ?></td>  
      </tr>
      <? 
      }
      }
            }
     ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Editar</th>
        <th>Alumno</th>
        <th>Profesor</th>
        <th>Materia</th>
        <th>Calificación</th>
        <th>Asistencia</th>
        <th>Estatus</th>
        <th>Tipo</th>
        <th>Fecha</th>
      </tr>
    </tfoot>
  </table>
</div>