<? session_start();?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
  <title>Panel de consultas medicas</title>
  <!-- HEADER -->
   <?php include ("../includes/header.php"); ?>
</head>
<body>
  <? include ("../includes/conexion.php"); ?>
  <? include ("../includes/restricciones_administrativo.php");?>
  <div class="container-scroller">
    <!-- PANEL DE NAVEGACIÓN -->
    <? include('menus/navBar.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
    <!-- BARRA LATERAL -->
    <? include('menus/sideBar.php'); ?>
    <!-- partial --> 
    <div class="main-panel">
    <?php 
		  // MODALS //
      include("php/add_diagnostico.php");
      include("php/mod_consultas.php");
    ?>

    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin">
          <div class="card">
            <div class="card-body"><h4 class="card-title"><i class="fa fa-user-md"></i>&nbsp; LISTADO DE CONSULTAS</h4><hr>
              <div class="fluid-container">
                <div class="form-row">
                  <div class="form-group col-8">  
                  </div>
                  <div class="form-group col-4">
                    <form id="formE" method="GET">
                      <? 
                        $fecha=date('Y-m-d');
                        if(isset($_GET['fecha'])){
                          $fecha=$_GET['fecha'];
                        } 
                      ?>
                      <input type="date" value="<? echo $fecha; ?>" class="form-control" name="fecha" id="filtroFech" onchange="this.form.submit()">
                    </form>
                  </div>
                </div>  
                <? include("php/tabla_consultas.php"); ?>                 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

  <? include("../includes/footer.php");?>
