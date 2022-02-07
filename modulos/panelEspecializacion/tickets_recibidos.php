<? session_start();?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <!-- HEADER -->
   <?php include ("../includes/header.php"); ?>
      <script type="text/javascript" src="tickets/funciones.js"></script>
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
    
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body"><h4 class="card-title"><i class="fas fa-sign-in-alt"></i> Tickets recibidos<hr>
                  <div class="fluid-container">
                    <div class="form-row">
                      <div class="form-group col-3">                        
                      </div>
                    </div>
                    <form>
                      <div class="form-row">
                  <div class="form-group col-sm-12">
                  <b>Busqueda por fechas</b><br>
                  <small><i>Selecciona uno o varios valores para realizar una busqueda</i></small></div>
                <div class="form-group col-sm-6">
                <label>Fecha de inicio:</label>
                <input type="date" name='fecha_ini_f' id='fecha_ini_f' class="form-control">
                 </div>
                <div class="form-group col-sm-6">
                <label>Fecha de fin:</label>
                <input type="date" name='fecha_fin_f' id='fecha_fin_f' class="form-control">
                 </div>
                  <div class="form-group col-sm-12">
                  <button id="filtro_fechas" type="button" class="btn btn-primary btn-sm">
                  <i class="fa fa-search"></i>Buscar</button>
                  <button type="reset" id="reset_grupos" class="btn btn-secondary btn-sm">
                  <i class="fa fa-eraser"></i></button>
                  </div>
                </form>
                    <? include("tickets/mod_ticket.php");?>
                    <? include("tickets/tabla_tickets_recibidos.php"); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

  <? include("../includes/footer.php");?>