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
                    <i class="fa fa-clipboard-list"></i> Generar bitácoras
                  </h4>
                  <form><div class="form-row">
                  <div class="form-group col-sm-12">
                  <hr><b>Busqueda de Materias</b><br>
                  <small><i>Selecciona uno o varios valores para realizar una busqueda, "Registros máximos mostrados <b>300</b>"</i></small></div>                
                <div class="form-group col-sm-12">
                <label>Docente:</label>
                <select name='docente_f' id='docente_f' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Seleccion un Docente">
                </select>
                 </div>  
                <div class="form-group col-sm-4">
                <label>Carrera:</label>
                <select name='carrera_f' id='carrera_f' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona carrera">
                </select>
                 </div>
                <div class="form-group col-sm-4">
                <label>Módulo:</label>
                <select name='curso_f_d' id='curso_f_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un módulo">
                </select>
                 </div>
                  <div class="form-group col-sm-4">
                <label>Grupo:</label>
                <select name='grupo_f_d' id='grupo_f_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un grupo">
                </select>
                 </div>
                 <div class="form-group col-sm-6">
                <label>Plan de estudios:</label>
                <select name='plan_f' id='plan_f' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un plan de estudios">
                </select>
                 </div>
                <div class="form-group col-sm-6">
                <label>Ciclo:</label>
                <select name='ciclo_f_d' id='ciclo_f_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona una academia">
                </select>
                 </div>
                  <div class="form-group col-sm-12">
                  <button id="filtro_listas" type="button" class="btn btn-primary btn-sm">
                  <i class="fa fa-search"></i>Buscar</button>
                  <button type="reset" id="reset_grupos" class="btn btn-secondary btn-sm">
                  <i class="fa fa-eraser"></i></button>
                  </div>
                </form>
                  <? include("pdf/tabla_grupos_bitacoras.php"); ?> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>        

<? include("../includes/footer.php");?>