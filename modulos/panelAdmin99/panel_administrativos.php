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
         <!-- CONTENIDO PRINCIPAL --> 
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    <i class="fa fa-users"></i> Panel de Administrativos
                  </h4>
                  <hr>
                  <style type="text/css">
                    #iframe-tablas{
                      width: 100%;
                      height: 750px;
                      border: 0px none #ffffff;
                    }
                  </style>
                  <? include("php/add_administrativos.php"); ?>
                  <? include("php/mod_administrativos.php"); ?>
                  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#add_administrativos" id="boton" data-whatever="@mdo"><i class="mdi mdi-account-plus"></i>&nbsp; Agregar</button>
                  <? include("php/tabla_Administrativos.php"); ?> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body> 
        

<? include("../includes/footer.php");?>