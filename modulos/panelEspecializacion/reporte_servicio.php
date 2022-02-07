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
                    <i class="fa fa-list-ol"></i> Listado de Servicio Social
                  </h4>
                  <form><div class="form-row">
                  <div class="form-group col-sm-12">
                  <hr><b>Busqueda de Servicio Social</b><br>
                  <small><i>Selecciona uno o varios valores para realizar una busqueda, "Registros máximos mostrados <b>500</b>"</i></small></div>
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
                  <? include("pdf/tabla_servicio.php"); ?> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>        

<? include("../includes/footer.php");?>