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
        <th class="noExport">Editar</th>
         <th class="noExport">Materias</th>
        <th class="noExport">Editar período</th>
        <th>Nombre</th>
        <th>Módulo</th>
        <th>Carrera</th>
        <th>Período de evaluación regular</th>
        <th>Período de evaluación extraordinaria</th>
        <th>Período de evaluación adicional</th>
        <th>Sede</th>
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
      $sql="SELECT * FROM grupo WHERE id_grupo<>0 ".$fciclo." ".$fcarrera." ".$fcurso." ".$fnombre." ORDER BY id_grupo DESC LIMIT 300";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_grupo=$row["id_grupo"];
         $id_carrera=$row["id_carrera"];
         $id_ciclo=$row["id_ciclo"];
         $id_curso=$row["id_curso"];
         $nombre=$row["nombre"];
         $estatus=$row["estatus"];
         $id_sede=$row["sede"];

         $sql="SELECT * FROM sedes where id_sede='$id_sede'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowe) {
        $sede_t=$rowe["siglas"]." - ".$rowe["nombre"];
      }

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
         $per_extra="Sin fechas de evaluación registradas";
         $per_ad="Sin fechas de evaluación registradas";
         $id_periodo=0;
         $id_periodo_extra=0;
         $id_periodo_ad=0;
         
        $sql="SELECT * FROM periodos where id_grupo='$id_grupo'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $observaciones=$row["observaciones"];
         $tipo=$row["tipo"];
         if($tipo==1){ 
         $id_periodo=$row["id_periodo"];
         $fecha_in_f= date("Y-m-d\TH:i",strtotime($row["fecha_in"]));
         $fecha_fin_f= date("Y-m-d\TH:i",strtotime($row["fecha_fin"]));
         $fecha_in=date("d-m-Y (h:iA)",strtotime($row["fecha_in"]));
         $fecha_fin=date("d-m-Y (h:iA)", strtotime($row["fecha_fin"]));
         $per="Del ".$fecha_in." al ".$fecha_fin;
         }
         else if($tipo==2){ 
         $id_periodo_extra=$row["id_periodo"];
         $fecha_in_f_extra= date("Y-m-d\TH:i",strtotime($row["fecha_in"]));
         $fecha_fin_f_extra= date("Y-m-d\TH:i",strtotime($row["fecha_fin"]));
         $fecha_in_extra=date("d-m-Y (h:iA)",strtotime($row["fecha_in"]));
         $fecha_fin_extra=date("d-m-Y (h:iA)", strtotime($row["fecha_fin"]));
         $per_extra="Del ".$fecha_in_extra." al ".$fecha_fin_extra;
         }
         else{
         $id_periodo_ad=$row["id_periodo"];
         $fecha_in_f_ad= date("Y-m-d\TH:i",strtotime($row["fecha_in"]));
         $fecha_fin_f_ad= date("Y-m-d\TH:i",strtotime($row["fecha_fin"]));
         $fecha_in_ad=date("d-m-Y (h:iA)",strtotime($row["fecha_in"]));
         $fecha_fin_ad=date("d-m-Y (h:iA)", strtotime($row["fecha_fin"]));
         $per_ad="Del ".$fecha_in_ad." al ".$fecha_fin_ad;
         }
         }

         $editar='<button id="btn_grupos" type="button" class="btn btn-dark btn-block btn-sm" data-toggle="modal" data-target="#mod_grupos" data-whatever="@mdo"
            btn-id_grupo="'.$id_grupo.'"
            btn-id_curso="'.$id_curso.'"
            btn-id_ciclo="'.$id_ciclo.'"
            btn-id_plan="'.$id_plan.'"
            btn-id_carrera="'.$id_carrera.'"
            btn-nombre="'.$nombre.'"
            btn-estatus="'.$estatus.'"
            btn-sede="'.$id_sede.'"
         ><i class="fa fa-edit"></i> Editar</button>';

         $materias='<button id="btn_materias_grupos" type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#materias_grupos" data-whatever="@mdo"
            btn-id_grupo="'.$id_grupo.'"
            btn-id_curso="'.$id_curso.'"
            btn-id_ciclo="'.$id_ciclo.'"
            btn-nombre="'.$nombre.'"
            btn-carrera="'.$clave_carrera." - ".$nombre_carrera.'"
            btn-curso="'.$nombre_curso.'"
         ><i class="fa fa-edit"></i> Materias</button>';

           $periodos='<button id="btn_periodos" type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#add_periodos" data-whatever="@mdo"
            btn-id_grupo="'.$id_grupo.'"
            btn-id_periodo="'.$id_periodo.'"
            btn-id_periodo_extra="'.$id_periodo_extra.'"
            btn-id_periodo_ad="'.$id_periodo_ad.'"
            btn-fecha_in="'.$fecha_in_f.'"
            btn-fecha_fin="'.$fecha_fin_f.'"
            btn-fecha_in_extra="'.$fecha_in_f_extra.'"
            btn-fecha_fin_extra="'.$fecha_fin_f_extra.'"
            btn-fecha_in_ad="'.$fecha_in_f_ad.'"
            btn-fecha_fin_ad="'.$fecha_fin_f_ad.'"
            btn-nombre="'.$nombre.'"
            btn-carrera="'.$clave_carrera." - ".$nombre_carrera.'"
            btn-curso="'.$nombre_curso.'"
            btn-observaciones="'.$observaciones.'"
         ><i class="fa fa-edit"></i> Períodos</button>';

    if($estatus==1){ 
      $estatus_t="<center><span class='btn btn-success btn-sm'>Activo</span></center>";
    } else if($estatus==3){
      $estatus_t="<center><span class='btn btn-primary btn-sm'>Finalizado</span></center>";
    } else{
      $estatus_t="<center><span class='btn btn-danger btn-sm'>Desactivado</span></center>";
    }
      ?>
      <tr>
        <td><center><? echo $editar; ?></center></td>
        <td><? echo $materias; ?></td>
        <td><? echo $periodos; ?></td>
        <td><? echo $nombre; ?></td>
        <td><? echo $nombre_curso; ?></td>
        <td><? echo $clave_carrera." - ".$nombre_carrera; ?></td>
        <td><? echo $per; ?></td>
        <td><? echo $per_extra; ?></td>
        <td><? echo $per_ad; ?></td>
        <td><? echo $sede_t; ?></td>
        <td><? echo $estatus_t; ?></td>  
      </tr>
      <? 
         $id_periodo="";
         $fecha_in="";
         $fecha_fin="";
         $id_periodo_extra="";
         $fecha_in_extra="";
         $fecha_fin_extra="";
         $id_periodo_ad="";
         $fecha_in_ad="";
         $fecha_fin_ad="";
         $fecha_in_f="";
         $fecha_fin_f="";
         $fecha_in_f_extra="";
         $fecha_fin_f_extra="";
         $fecha_in_f_ad="";
         $fecha_fin_f_ad="";
         $observaciones="";
      }
     ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Editar</th>
        <th class="noExport">Materias</th>
        <th class="noExport">Editar período</th>
        <th>Nombre</th>
        <th>Módulo</th>
        <th>Carrera</th>
        <th>Período de evaluación regular</th>
        <th>Período de evaluación extraordinaria</th>
        <th>Período de evaluación adicional</th>
        <th>Sede</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>