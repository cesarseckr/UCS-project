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
    
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body"><h4 class="card-title"><i class="menu-icon fa fa-th-list"></i> Categorías<hr>
                  <div class="fluid-container">
                    <div class="form-row">
                      <div class="form-group col-3">
                        <button type="button" id="nueva_categoria" class="btn btn-dark" data-toggle="modal" data-target="#modal_add_categoria" data-whatever="@mdo"><i class="menu-icon fa fa-th-list"></i>&nbsp;Nueva Categoría</button>
                      </div>
                    </div>
                    <? include("php/add_categoria.php");?>
                    <? include("php/mod_categoria.php");?>
                    <? include("php/tabla_categorias.php"); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

  <? include("../includes/footer.php");?>