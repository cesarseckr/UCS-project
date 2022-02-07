<? session_start();?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
  <title>Panel de inventario de material medico</title>
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
      include("php/add_materiales.php");
      include("php/mod_materiales.php");
      include("php/sumar_materiales.php");
    ?>

    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"><i class="menu-icon far fa-clipboard"></i>&nbsp; Inventario material médico</h4><hr>
              <div class="fluid-container">
                <br>
                <h1>Inventario de material médico</h1>
                <br>
                <? include("php/tablaMateriales.php"); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

  <? include("../includes/footer.php");?>
