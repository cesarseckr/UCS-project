<? session_start();?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <title>GP - Panel de Check-IN</title>
  <!-- HEADER -->
   <?php include ("../includes/header.php"); ?>
   <script type="text/javascript" src="tickets/funciones.js"></script>
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
                <div class="card-body"><h4 class="card-title"><i class="fas fa-sign-out-alt"></i> Tickets enviados<hr>
                  <div class="fluid-container">
                    <div class="form-row">
                      <div class="form-group col-3">
                        <button type="button" id="nuevo_ticket" class="btn btn-dark" data-toggle="modal" data-target="#modal_add_tickets" data-whatever="@mdo"><i class="fas fa-sign-out-alt"></i>&nbsp; Nuevo Ticket</button>
                      </div>
                      <div class="form-group col-5">  
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
                    <? include("tickets/add_ticket.php");?>
                    <? include("tickets/mod_ticket.php");?>
                    <? include("tickets/tabla_tickets_enviados.php"); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

  <? include("../includes/footer.php");?>