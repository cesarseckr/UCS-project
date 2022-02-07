<? session_start();?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
  <title>Panel de consultas medicas</title>
  <!-- HEADER -->
   <?php include ("../includes/header.php"); ?>
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
      include("php/add_control_ta.php");
    ?>

    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin">
          <div class="card">
            <div class="card-body"><h4 class="card-title"><i class="menu-icon fas fa-heartbeat"></i>&nbsp;CONTROL T/A</h4><hr>
              <div class="fluid-container">
                <div class="form-row">
                  <div class="form-group col-3">
                    <button type="button" id="add_registro_traslados" class="btn btn-dark" data-toggle="modal" data-target="#add_control_ta" data-whatever="@mdo"><i class="menu-icon fas fa-heartbeat"></i>&nbsp; Agregar</button>
                  </div>
                </div>  
                <? include("php/tabla_control_ta.php"); ?>                 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

  <? include("../includes/footer.php");?>
