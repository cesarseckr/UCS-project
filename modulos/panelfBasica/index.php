<? session_start();?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <!-- HEADER -->
   <?php include ("../includes/header.php"); ?>
</head>
<body>
  <? include ("../includes/conexion.php"); ?>
 <? include ("restricciones.php"); ?>
  <div class="container-scroller">
    <!-- PANEL DE NAVEGACIÓN -->

    <? include('menus/navBar.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- BARRA LATERAL -->
      <? include('menus/sideBar.php'); ?>
      <!-- partial --> 
      <div class="main-panel">
         <!-- CONTENIDO PRINCIPAL --> 
        <div class="content-wrapper">

        <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <i class="fa fa-tachometer-alt"></i><p>&nbsp;&nbsp;Bienvenido <b><? echo $nombre."</b> (".$area_admin; ?>) al Sistema de integral de administración academica.</p> <br>&nbsp;&nbsp;
                <button type="button" id="imp_calendario" class="btn btn-dark btn-sm btn-rounded noprint" onclick="javascript:window.print();">
        Imprimir Dashboard</button>
                <i class="fa ml-auto fa-times popup-dismiss d-none d-md-block"></i>
              </span>
            </div>
          </div>

          <script type="text/javascript">
        $(document).ready(function() {
          $('*[media="screen"],*[media="print"]').attr('media', '');
       });
        </script>
        <style type="text/css">
          @media print 
          {
          @page {
          size: landscape;
          margin: 0mm;
          margin-top:-10mm;
          }
          body {zoom: 85%;}
          .noprint {display:none;}
          }
          table {
            table-layout: fixed !important;
          }
          td, th {
            white-space: normal !important;
            padding: 10px !important;
            height: 10px !important;
          }
        </style>
        <? 
       $sql="SELECT count(id_alumno) as conta FROM alumnos where id_estatus=2";
                $sq = $db->query($sql);
        $rows= $sq->fetchAll(); 
          foreach ($rows as $row) {
            $alumnos_activos=$row['conta'];
          }
        $sql="SELECT count(id_alumno) as conta FROM alumnos where id_estatus=8";
                $sq = $db->query($sql);
        $rows= $sq->fetchAll(); 
          foreach ($rows as $row) {
            $alumnos_egresados=$row['conta'];
          }

          $sql="SELECT count(id_alumno) as conta FROM alumnos where id_estatus<>1 and id_estatus<>2 and id_estatus<>3 and id_estatus<>8";
                $sq = $db->query($sql);
        $rows= $sq->fetchAll(); 
          foreach ($rows as $row) {
            $alumnos_bajas=$row['conta'];
          }

          $por_activos=round(($alumnos_activos/$totales_al)*100,2);
          $por_egresados=round(($alumnos_egresados/$totales_al)*100,2);
          $por_bajas=round(($alumnos_bajas/$totales_al)*100,2);

      $sql="SELECT count(id_docente) as conta FROM docentes where tipo=1";
                $sq = $db->query($sql);
        $rows= $sq->fetchAll(); 
          foreach ($rows as $row) {
            $docentes_internos=$row['conta'];
          }

        $sql="SELECT count(id_docente) as conta FROM docentes where tipo=2";
                $sq = $db->query($sql);
        $rows= $sq->fetchAll(); 
          foreach ($rows as $row) {
            $docentes_especialidad=$row['conta'];
          }

          $sql="SELECT count(id_docente) as conta FROM docentes where tipo=3";
                $sq = $db->query($sql);
        $rows= $sq->fetchAll(); 
          foreach ($rows as $row) {
            $docentes_municipales=$row['conta'];
          }

           $por_internos=round(($docentes_internos/$totales_d)*100,2);
          $por_especialidad=round(($docentes_especialidad/$totales_d)*100,2);
          $por_municipales=round(($docentes_municipales/$totales_d)*100,2);
        ?>
          <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="fa fa-user-check text-dark icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Alumnos Activos</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><? echo number_format($alumnos_activos); ?></h3>
                      </div>
                    </div>
                  </div>
                  <div class="progress">
                  <? $bar_todos="width:".number_format($por_activos)."%"; 
                  ?><div class="progress-bar bg-dark progress-bar-striped progress-bar-animated" role="progressbar" style="<? echo $bar_todos; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> <? echo $por_activos; ?>% del alumnado total. 
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="fa fa-user-graduate text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Alumnos Egresados</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><? echo number_format($alumnos_egresados); ?></h3>
                      </div>
                    </div>
                  </div>
                  <div class="progress">
                  <? $bar_todos="width:".number_format($por_egresados)."%"; 
                  ?><div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="<? echo $bar_todos; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  <p class="text-muted mt-3 mb-0">
                          <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> <? echo $por_egresados; ?>% del alumnado total.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="fa fa-user-alt-slash text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Alumnos en baja</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><? echo number_format($alumnos_bajas); ?></h3>
                      </div>
                    </div>
                  </div>
                  <div class="progress">
                  <? $bar_todos="width:".number_format($por_bajas)."%"; 
                  ?><div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="<? echo $bar_todos; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> <? echo $por_bajas; ?>% del alumnado total.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                       <i class="fa fa-chalkboard-teacher text-dark icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Docentes de la institución</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><? echo number_format($docentes_internos); ?></h3>
                      </div>
                    </div>
                  </div>
                  <div class="progress">
                  <? $bar_todos="width:".number_format($por_internos)."%"; 
                  ?><div class="progress-bar bg-dark progress-bar-striped progress-bar-animated" role="progressbar" style="<? echo $bar_todos; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-checkbox-marked-circle-outline mr-1" aria-hidden="true"></i> <? echo $por_internos; ?>%  del total de los docentes.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                       <i class="fa fa-chalkboard-teacher text-dark icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Docentes de especialidad</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><? echo number_format($docentes_especialidad); ?></h3>
                      </div>
                    </div>
                  </div>
                  <div class="progress">
                  <? $bar_todos="width:".number_format($por_especialidad)."%"; 
                  ?><div class="progress-bar bg-dark progress-bar-striped progress-bar-animated" role="progressbar" style="<? echo $bar_todos; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-checkbox-marked-circle-outline mr-1" aria-hidden="true"></i> <? echo $por_especialidad; ?>%  del total de los docentes.
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                       <i class="fa fa-chalkboard-teacher text-dark icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Docentes de Municipales</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><? echo number_format($docentes_municipales); ?></h3>
                      </div>
                    </div>
                  </div>
                  <div class="progress">
                  <? $bar_todos="width:".number_format($por_municipales)."%"; 
                  ?><div class="progress-bar bg-dark progress-bar-striped progress-bar-animated" role="progressbar" style="<? echo $bar_todos; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-checkbox-marked-circle-outline mr-1" aria-hidden="true"></i><? echo $por_municipales; ?>%  del total de los docentes
                  </p>
                </div>
              </div>
            </div>
          </div>
          <?
    $sql="SELECT count(id_calificacion) as conta FROM calificaciones";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    foreach ($rows as $row) {
    $conta_total=$row['conta'];
    }

    $sql="SELECT count(id_calificacion) as conta FROM calificaciones where calificacion=10";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    foreach ($rows as $row) {
    $conta10=$row['conta'];
    $porcentaje10=round(($conta10/$conta_total)*100,2);
    }

    $sql="SELECT count(id_calificacion) as conta FROM calificaciones where calificacion<10 and calificacion>8.9";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    foreach ($rows as $row) {
    $conta9=$row['conta'];
    $porcentaje9=round(($conta9/$conta_total)*100,2);
    }

    $sql="SELECT count(id_calificacion) as conta FROM calificaciones where calificacion<9 and calificacion>7.9";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    foreach ($rows as $row) {
    $conta8=$row['conta'];
    $porcentaje8=round(($conta8/$conta_total)*100,2);
    }

    $sql="SELECT count(id_calificacion) as conta FROM calificaciones where calificacion<8 and calificacion>6.9";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    foreach ($rows as $row) {
    $conta7=$row['conta'];
    $porcentaje7=round(($conta7/$conta_total)*100,2);
    }

    $sql="SELECT count(id_calificacion) as conta FROM calificaciones where calificacion<7";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    foreach ($rows as $row) {
    $conta6=$row['conta'];
    $porcentaje6=round(($conta6/$conta_total)*100,2);
    }

          ?>
          <div class="row">
             <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  Porcentaje de calificaciones generales<hr>
                  <div class="row d-sm-flex mb-12">
                    <div class="col-1"></div>
                    <div class="col-2">
                      <h5 class="text-primary">De 10</h5>
                      <p><b><? echo number_format($conta10); ?></b> 
                        <i class="fa fa-caret-right text-success"></i> <? echo $porcentaje10; ?>%</p>
                        <div class="progress">
                  <? $bar_todos="width:".number_format($porcentaje10)."%"; 
                  ?><div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="<? echo $bar_todos; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    </div>
                    <div class="col-2">
                      <h5 class="text-primary">De 9 a 9.9</h5>
                      <p><b><? echo number_format($conta9); ?></b> 
                        <i class="fa fa-caret-right text-success"></i> <? echo $porcentaje9; ?>%</p>
                        <div class="progress">
                  <? $bar_todos="width:".number_format($porcentaje9)."%"; 
                  ?><div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="<? echo $bar_todos; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    </div>
                    <div class="col-2">
                      <h5 class="text-primary">De 8 a 8.9</h5>
                      <p><b><? echo number_format($conta8); ?></b> 
                        <i class="fa fa-caret-right text-warning"></i> <? echo $porcentaje8; ?>%</p>
                        <div class="progress">
                  <? $bar_todos="width:".number_format($porcentaje8)."%"; 
                  ?><div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="<? echo $bar_todos; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    </div>
                    <div class="col-2">
                      <h5 class="text-primary">De 7 a 7.9</h5>
                      <p><b><? echo number_format($conta7); ?></b> 
                        <i class="fa fa-caret-right text-warning"></i> <? echo $porcentaje7; ?>%</p>
                        <div class="progress">
                  <? $bar_todos="width:".number_format($porcentaje7)."%"; 
                  ?><div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="<? echo $bar_todos; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    </div>
                    <div class="col-2">
                      <h5 class="text-primary">Menor a 7</h5>
                      <p><b><? echo number_format($conta6); ?></b> 
                        <i class="fa fa-caret-right text-danger"></i> <? echo $porcentaje6; ?>%</p>
                        <div class="progress">
                  <? $bar_todos="width:".number_format($porcentaje6)."%"; 
                  ?><div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="<? echo $bar_todos; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    </div>
                  </div>
                <div id="chart-calificaciones"></div>
               
                <script type="text/javascript">
new Chartist.Line('#chart-calificaciones', {
  labels: ['De 10','De 9 a 9.9', 'De 8 a 8.9', 'De 7 a 7.9', 'Menor a 7'],
  series: [
    [<? echo $conta10; ?>,<? echo $conta9; ?>,<? echo $conta8; ?>,<? echo $conta7; ?>,<? echo $conta6; ?>]
  ]
},
{
height: "300px",
low: 0,
showArea: true

});
                </script>
                </div>
              </div>
            </div>
          </div>
<?
$sql="SELECT count(id_alumno) as conta FROM alumnos where sexo='M'";
                $sq = $db->query($sql);
        $rows= $sq->fetchAll(); 
          foreach ($rows as $row) {
            $hombres=$row['conta'];
          $por_hombres=round(($hombres/$totales_al)*100,2);
          }
          $sql="SELECT count(id_alumno) as conta FROM alumnos where sexo='F'";
                $sq = $db->query($sql);
        $rows= $sq->fetchAll(); 
          foreach ($rows as $row) {
            $mujeres=$row['conta'];
          $por_mujeres=round(($mujeres/$totales_al)*100,2);
          }

?>
          <div class="row">
             <div class="col-md-6 grid-margin">
              <div class="card">
                <div class="card-body">
                  Porcentaje de alumnos por género<hr>
                <div id="chart-genero"></div>
               <script type="text/javascript">
new Chartist.Bar('#chart-genero', {
  labels: ["Hombres "+<? echo $por_hombres; ?>+"%","Mujeres "+<? echo $por_mujeres; ?>+"%"],
  series: [
    [<? echo $hombres; ?>,""],
    ["",<? echo $mujeres; ?>]
  ]
}, 
{
height: "300px",
horizontalBars: true,
chartPadding: 40
},
{
}).on('draw', function(data) {
  if(data.type === 'bar') {
    data.element.attr({
      style: 'stroke-width: 40px'
    });
  }
});
                </script>
<?
$sql="SELECT count(id_grupo) as conta FROM grupo";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    foreach ($rows as $row) {
    $totales_grupos=$row['conta'];
    }

    $sql="SELECT count(id_grupo) as conta FROM grupo where estatus=1";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    foreach ($rows as $row) {
    $grupos_activos=$row['conta'];
    $por_grupos_activos=round(($grupos_activos/$totales_grupos)*100,2);
    }

    $sql="SELECT count(id_grupo) as conta FROM grupo where estatus=2";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    foreach ($rows as $row) {
    $grupos_cancelados=$row['conta'];
    $por_grupos_cancelados=round(($grupos_cancelados/$totales_grupos)*100,2);
    }
      
       $sql="SELECT count(id_grupo) as conta FROM grupo where estatus=3";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    foreach ($rows as $row) {
    $grupos_terminados=$row['conta'];
    $por_grupos_terminados=round(($grupos_terminados/$totales_grupos)*100,2);
    }

?>
                </div>
              </div>
            </div>
             <div class="col-md-6 grid-margin">
              <div class="card">
                <div class="card-body">
                  Porcentaje de alumnos por género<hr>
                  <div id="chart-grupos"></div>
               <script type="text/javascript">
new Chartist.Bar('#chart-grupos', {
  labels: ["Grupos Activos "+<? echo $por_grupos_activos; ?>+"%", "Grupos Cancelados "+<? echo $por_grupos_cancelados; ?>+"%" , "Grupos Finalizados "+<? echo $por_grupos_terminados; ?>+"%"],
  series: [
    [<? echo $grupos_activos; ?>,"",""],
    ["",<? echo $grupos_cancelados; ?>,""],
    ["","",<? echo $grupos_terminados; ?>]
  ]
}, 
{
height: "300px",
chartPadding: 40
},
{
}).on('draw', function(data) {
  if(data.type === 'bar') {
    data.element.attr({
      style: 'stroke-width: 40px'
    });
  }
});
                </script>

                </div>
              </div>
            </div>
          </div>

            <div class="row">
             <div class="col-md-6 grid-margin">
              <div class="card">
                <div class="card-body">
                  Últimas Noticias<hr>
                  <? include("noticias/cargar_tabla_noticias_dashboard.php"); ?>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin">
              <div class="card table-responsive">
                <div class="card-body table-responsive">
                  Últimos Archivos importantes<hr>
                  <? include("archivos/tabla_archivos_dashboard.php"); ?>
                </div>
              </div>
            </div>
          </div>

        </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
  <? include("../includes/footer.php");?>