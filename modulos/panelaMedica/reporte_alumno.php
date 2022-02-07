<? session_start();?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <!-- HEADER -->
   <?php include ("../includes/header.php"); ?>
</head>
<body>
    <? include ("../includes/conexion.php"); ?>
  <!-- PANEL DE NAVEGACIÓN -->
  <div class="container-scroller">
    <? include('menus/navBar.php'); ?>
    <!-- BARRA LATERAL -->
    <div class="container-fluid page-body-wrapper">
      <? include('menus/sideBar.php'); ?>
      <div class="main-panel">
        <!-- CONTENIDO PRINCIPAL --> 
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    <i class="fa fa-users"></i> Kardex de alumnos
                  </h4>
                  <div class="form-row">
                    <div class="form-group col-4">
                      <form id="formE" method="GET">
                        <? 
                          $fecha_inicio=date('Y-m-d');
                          if(isset($_GET['fecha_ini_f'])){
                            $fecha_inicio=$_GET['fecha_ini_f'];
                          } 
                        ?>
                        <label class="form-control">Fecha Inicio</label>
                        <input type="date" class="form-control" name="fecha_ini_f" id="fecha_ini_f">
                      </form>
                    </div>
                    <div class="form-group col-4">  
                    </div>
                    <div class="form-group col-4">
                      <form id="formE" method="GET">
                        <? 
                          $fecha_fin=date('Y-m-d');
                          if(isset($_GET['fecha_fin_f'])){
                            $fecha_fin=$_GET['fecha_fin_f'];
                          } 
                        ?>
                        <label class="form-control">Fecha Fin</label>
                        <input type="date" class="form-control" name="fecha_fin_f" id="fecha_fin_f">
                      </form>
                    </div>
                    <a href="pdf/lkardex_alumno.php" id="filt_reporte_alumno" class="btn btn-rounded btn-danger btn-sm">
                      <i class="fa fa-file-pdf"></i>Generar Reporte
                    </a>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>

  <? include("../includes/footer.php");?>