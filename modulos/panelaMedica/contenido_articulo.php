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
                <div class="card-body">
                  <div class="fluid-container">
                    <div class="col-md-12">
                      
                      <?php 
                        include('../includes/conexion.php');
                        $id_articulo = $_GET['id_articulo'];
                        $sql="SELECT * FROM blog_articulo where id_articulo='$id_articulo' and estatus=1";
                        $sq = $db->query($sql);
                        $rows= $sq->fetchAll();
                        foreach ($rows as $row){
                          $id_articulo=$row['id_articulo'];
                          $titulo=$row['titulo'];
                          $descripcion=$row['descripcion'];
                          $contenido=$row['contenido'];
                          $imagen=$row['imagen'];
                          $fecha_hora=$row['fecha_hora'];
                          $estatus=$row['estatus'];
                          $id_categoria=$row['id_categoria'];

                          $sql="SELECT * FROM blog_categorias where id_categoria='$id_categoria'";
                          $sq = $db->query($sql);
                          $rows= $sq->fetchAll();
                          foreach ($rows as $row){
                            $categoria=utf8_encode($row['categoria']);
                          }
                          echo "
                                <h1>".$titulo."</h1>
                                <br>
                                <img class='img-thumbnail' src='../../archivos/".$imagen."'>
                                <br>
                                <br>
                                <div class='panel panel-default'>
                                  <div class='panel-body'>
                                    <label>Descripcion breve</label>
                                    <p>".$descripcion."</p>
                                    <label>Contenido</label>
                                    <p>".$contenido."</p>
                                    <label>Categoria</label>
                                    <p>".$categoria."</p>  
                                  </div>
                                </div>
                                ";
                        }
                       ?>

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