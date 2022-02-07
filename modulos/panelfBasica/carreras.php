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
                    <i class="fa fa-certificate"></i> Carreras
                  </h4>
                  <hr>
                  <? include("php/add_carreras.php"); ?>
                  <? include("php/mod_carreras.php"); ?>
                  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#add_carreras" id="boton" data-whatever="@mdo"><i class="fa fa-plus"></i>&nbsp; Agregar</button>
                  <? include("php/tabla_carreras.php"); ?> 
                </div>
              </div>
            </div>
          </div>
        </div>        

<? include("../includes/footer.php");?>