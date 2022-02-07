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
                    <i class="fa fa-bezier-curve"></i> materias
                  </h4>
                  <hr>
                  <? include("php/add_materias.php"); ?>
                  <? include("php/mod_materias.php"); ?>
                  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#add_materias" id="boton" data-whatever="@mdo"><i class="fa fa-plus"></i>&nbsp; Agregar</button>
                  <form><div class="form-row">
                  <div class="form-group col-sm-12">
                  <hr><b>Busqueda de materias</b><br>
                  <small><i>Selecciona uno o varios valores para realizar una busqueda, "Registros máximos mostrados <b>300</b>"</i></small></div>
                  <div class="form-group col-sm-12">
                  <label>Equivalencia: </label>
                  <select name='equivalencia_f' id='equivalencia_f' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Todas las equivalencias">
                  </select>
                  </div>
                                  <div class="form-group col-sm-6">
                <label>Carrera:</label>
                <select name='carrera_f' id='carrera_f' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona carrera">
                </select>
                 </div>
                <div class="form-group col-sm-6">
                <label>Módulo:</label>
                <select name='curso_f_d' id='curso_f_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un módulo">
                </select>
                 </div>
                  <div class="form-group col-sm-12">
                  <button id="filtro_materias" type="button" class="btn btn-primary btn-sm">
                  <i class="fa fa-search"></i>Buscar</button>
                  <button type="reset" id="reset_materias" class="btn btn-secondary btn-sm">
                  <i class="fa fa-eraser"></i></button>
                  </div>
                </form>
                  <? include("php/tabla_materias.php"); ?> 
                </div>
              </div>
            </div>
          </div>
        </div>        

<? include("../includes/footer.php");?>