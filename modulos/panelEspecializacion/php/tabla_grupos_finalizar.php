  <div id="fdesc">
  <small><b>Ningún filtro aplicado</b> realiza una busqueda para encontrar más datos - Mostrando últimos <b>300</b> registros (<b>Filtros aplicables:</b> Nombre, Ciclo, Carrera, Curso)</small>
  </div>
 <div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de grupos");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Avanzar alumnos</th>
        <th class="noExport">Finalizar grupo</th>
        <th>Nombre</th>
        <th>Período de evaluación</th>
        <th>Plan de estudios</th>
        <th>Ciclo</th>
        <th>Carrera</th>
        <th>Módulo</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
      if(isset($_SESSION['filtro'])){
      $fnombre=$_SESSION['fnombre'];
      $fcurso=$_SESSION['fcurso'];
      $fciclo=$_SESSION['fciclo'];
      $fcarrera=$_SESSION['fcarrera'];

      if($fnombre!=""){
      $fnombre="and nombre='$fnombre'";
      }
      if($fcurso!=""){
      $fcurso="and id_curso='$fcurso'";
      }
      if($fciclo!=""){
      $fciclo="and id_ciclo='$fciclo'";
      }
      if($fcarrera!=""){
      $fcarrera="and id_carrera='$fcarrera'";
      }
      $_SESSION['fnombre']=null;
      $_SESSION['fcurso']=null;
      $_SESSION['fciclo']=null;
      $_SESSION['fcarrera']=null;
      $_SESSION['filtro']=null;
      }
      $sql="SELECT * FROM grupo WHERE id_grupo<>0 ".$fciclo." ".$fcarrera." ".$fcurso." ".$fnombre." and estatus=1 ORDER BY id_grupo DESC LIMIT 300";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_grupo=$row["id_grupo"];
         $id_carrera=$row["id_carrera"];
         $id_ciclo=$row["id_ciclo"];
         $id_curso=$row["id_curso"];
         $nombre=$row["nombre"];
         $estatus=$row["estatus"];

         $sql="SELECT * FROM ciclo where id_ciclo='$id_ciclo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $id_plan=$row["id_plan"];
        $clave_ciclo=$row["clave"];
        $nombre_ciclo=$row["nombre"];

        $sql="SELECT * FROM planes where id_plan='$id_plan'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
        $clave_plan=$row["clave"];
        $nombre_plan=$row["nombre"];
          }
          }

         $sql="SELECT * FROM curso where id_curso='$id_curso'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $nombre_curso=$row["nombre"];
          }

         $sql="SELECT * FROM carrera where id_carrera='$id_carrera'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $clave_carrera=$row["clave"];
         $nombre_carrera=$row["nombre"];
          }
         $per="Sin fechas de evaluación registradas";
          $sql="SELECT * FROM periodos where id_grupo='$id_grupo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_periodo=$row["id_periodo"];
         $observaciones=$row["observaciones"];
         $fecha_in_f= date("Y-m-d\TH:i",strtotime($row["fecha_in"]));
         $fecha_fin_f= date("Y-m-d\TH:i",strtotime($row["fecha_fin"]));
         $fecha_in=date("d-m-Y (h:iA)",strtotime($row["fecha_in"]));
         $fecha_fin=date("d-m-Y (h:iA)", strtotime($row["fecha_fin"]));
         $per="Del ".$fecha_in." al ".$fecha_fin;
          }

         $avanzar='<button id="btn_avanzar_alumnos" type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#avanzar_alumnos" data-whatever="@mdo"
            btn-id_grupo="'.$id_grupo.'"
            btn-id_curso="'.$id_curso.'"
            btn-id_ciclo="'.$id_ciclo.'"
            btn-nombre="'.$nombre.'"
            btn-carrera="'.$clave_carrera." - ".$nombre_carrera.'"
            btn-curso="'.$nombre_curso.'"
         ><i class="fa fa-sign-out-alt"></i> Avanzar</button>';

           $finalizar='<button id="btn_finalizar_grupo" type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#finalizar_grupo" data-whatever="@mdo"
            btn-id_grupo="'.$id_grupo.'"
            btn-id_curso="'.$id_curso.'"
            btn-id_ciclo="'.$id_ciclo.'"
            btn-nombre="'.$nombre.'"
            btn-carrera="'.$clave_carrera." - ".$nombre_carrera.'"
            btn-curso="'.$nombre_curso.'"
         ><i class="fa fa-external-link-alt"></i> Finalizar</button>';

    if($estatus==1){ 
      $estatus_t="<center><span class='btn btn-success btn-sm'>Activo</span></center>";
    } else if($estatus==3){
      $estatus_t="<center><span class='btn btn-primary btn-sm'>Finalizado</span></center>";
    } else{
      $estatus_t="<center><span class='btn btn-danger btn-sm'>Desactivado</span></center>";
    }
      ?>
      <tr>
        <td><? echo $avanzar; ?></td>
        <td><? echo $finalizar; ?></td>
        <td><? echo $nombre; ?></td>
        <td><? echo $per; ?></td>
        <td><? echo $clave_plan." - ".$nombre_plan; ?></td>
        <td><? echo $clave_ciclo." - ".$nombre_ciclo; ?></td>
        <td><? echo $clave_carrera." - ".$nombre_carrera; ?></td>
        <td><? echo $nombre_curso; ?></td>
        <td><? echo $estatus_t; ?></td>  
      </tr>
      <? 
      $id_periodo="";
         $fecha_in="";
         $fecha_fin="";
         $fecha_in_f="";
         $fecha_fin_f="";
         $observaciones="";
      }
     ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Avanzar alumnos</th>
        <th class="noExport">Finalizar grupo</th>
        <th>Nombre</th>
        <th>Período de evaluación</th>
        <th>Plan de estudios</th>
        <th>Ciclo</th>
        <th>Carrera</th>
        <th>Módulo</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>