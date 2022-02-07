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
                <div class="card-body"><h4 class="card-title"><i class="fa fa-car"></i> BIENVENIDO</h4><hr>
                  <div class="fluid-container">
                    
                      <div class="row">
                        <div class="form-group col-sm-6">
                          <a href="../panelcEscolar" class="col-11 btn btn-dark">Control Escolar</a>
                        </div>  
                        <div class="form-group col-sm-6">
                          <a href="../panelfBasica" class="col-11 btn btn-dark">Formacion Básica</a>
                       </div>  
                        <div class="form-group col-sm-6">
                          <a href="../panelaMedica" class="col-11 btn btn-dark">Médica</a>
                       </div>  
                        <div class="form-group col-sm-6">
                          <a href="../panelEspecializacion" class="col-11 btn btn-dark">Especialización</a>
                        </div>  
                        <div class="form-group col-sm-6">
                          <a href="../panelcInterno" class="col-11 btn btn-dark">Control Interno</a>
                        </div>  
                        <div class="form-group col-sm-6">
                          <a href="../panelComunicacion" class="col-11 btn btn-dark">Comunicación e imagen institucional</a>
                        </div>  
                        <div class="form-group col-sm-6">
                          <a href="../panelcDisciplina" class="col-11 btn btn-dark">Comandancia y disciplina</a>
                        </div>  
                        <div class="form-group col-sm-6">
                          <a href="../panelSistemas" class="col-11 btn btn-dark">Sistemas</a>
                        </div>  
                        <div class="form-group col-sm-6">
                          <a href="../panelDireccionProf" class="col-11 btn btn-dark">Dirección de profesionalización</a>
                        </div>
                        <div class="form-group col-sm-6">  
                          <a href="../panelAdmin99" class="col-11 btn btn-dark">Administración General</a>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

  <? include("../includes/footer.php");?>
