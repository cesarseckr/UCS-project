<? session_start();?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
  <title>Panel de consultas medicas</title>
  <!-- HEADER -->
   <?php include ("../includes/header.php"); ?>
   <script src="pdf/filtros.js"></script>
</head>
<body>
  <? include ("../includes/conexion.php"); ?>
  <? include ("../includes/restricciones_administrativo.php");?>
  <div class="container-scroller">
    <!-- PANEL DE NAVEGACIÓN -->
    <? include('menus/navBar.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
    <!-- BARRA LATERAL -->
    <? include('menus/sideBar.php'); ?>
    <!-- partial --> 
    <div class="main-panel">
    <?php 
		  // MODALS //
      include("php/add_consultas.php");
      include("php/add_diagnostico.php");
      include("php/mod_consultas.php");
    ?>

    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin">
          <div class="card">
            <div class="card-body"><h4 class="card-title"><i class="menu-icon fa fa-file-pdf"></i>&nbsp; REPORTE DE CITAS</h4><hr>
              <div class="fluid-container">
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
                      <input type="date" value="<? echo $fecha; ?>" class="form-control" name="fecha_ini_f" id="fecha_ini_f">
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
                      <input type="date" value="<? echo $fecha; ?>" class="form-control" name="fecha_fin_f" id="fecha_fin_f">
                    </form>
                  </div>
                  <button id="filtro_fechas" type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-search"></i>Buscar
                    </button>
                    <button type="reset" id="reset_grupos" class="btn btn-secondary btn-sm"><i class="fa fa-eraser"></i></button>
                </div>
                <br>  
                <? include("php/tabla_reporte_consulta.php"); ?>                 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

  <? include("../includes/footer.php");?>