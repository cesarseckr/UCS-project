<? session_start();?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <title>UCS Control - Dashboard</title>
  <!-- HEADER -->
   <?php include ("../includes/header.php"); ?>
</head>
<body>
  <? include ("../includes/conexion.php"); ?>
  <? include ("../includes/restricciones_administrativo.php"); ?>
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
                <div class="card-body"><h4 class="card-title">
                  <i class="fa fa-users"></i> TITULO DE LA SECCIÓN
                </h4>
                <hr>
                  <div class="fluid-container">
                    <br>
                    <style type="text/css">
                      #iframe-tablas{
                        width: 100%;
                        height: 750px;
                        border: 0px none #ffffff;
                      }
                    </style>
                    <? include("php/add_usuarios.php"); ?>
                    <? include("php/mod_usuarios.php"); ?>
                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#add_usuarios"  id="add_usuarios" data-whatever="@mdo"><i class="mdi mdi-account-plus"></i>&nbsp; Agregar</button>
                    <? include("php/tabla_usuarios.php"); ?> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

  <? include("../includes/footer.php");?>
