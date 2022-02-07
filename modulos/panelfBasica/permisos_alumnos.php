
<? session_start();?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <title>GP - Panel de Check-IN</title>
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
                <div class="card-body"><h4 class="card-title"><i class="fa fa-calendar-check"></i> Permisos</h4><hr>
                  <div class="fluid-container">
                     <div class="form-group col-md-6 col-sm-12">
                      <label>Tipo:</label>
                       <select name="tipo_permisos" id="tipo_permisos" class="form-control">
                         <option>Seleccione Tipo</option>
                         <option value="1">Alumnos</option>
                         <option value="2">Profesores</option>
                       </select> 
                    </div>
                    <? include("php/tabla_permisos_alumnos.php"); ?>
                    <? include("php/historial_faltas_permisos.php"); ?>
                    <? include("php/historial_permisos.php"); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

  <? include("../includes/footer.php");?>