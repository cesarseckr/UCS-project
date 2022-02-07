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
                <div class="card-body"><h4 class="card-title"><i class="fa fa-user"></i>&nbsp; MI PERFIL</h4><hr>
                  <div class="fluid-container">
                   
                    

                       <script type="text/javascript">

                       </script>
                      

                  </div>
                </div>
              </div>
            </div>
          </div>

        </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->


  <? include("../includes/footer.php");?>