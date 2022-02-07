
<? session_start();?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <!-- HEADER -->
   <?php include ("../includes/header.php"); ?>
   <script src="calendar_esp/funciones.js"></script>
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
    
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body"><h4 class="card-title"><i class="fa fa-calendar"></i>&nbsp; Calendario de eventos programa do por Educación Continua</h4><hr>
                  <div class="fluid-container">
                    <br>
                    <div class="container">
                      <div class="row">
                        <div class="col"></div> 
                        <div class="col-12">
                          <div id="CalendarioWeb">
                          </div>
                        </div>
                        <div class="col"></div>
                      </div>
                    </div>
                  </div>
                  <? include('calendar_esp/add_eventos.php'); ?>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

  <? include("../includes/footer.php");?>