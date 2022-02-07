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
                                <img class='img-thumbnail' width='400' src='../../archivos/".$imagen."'>
                                <br>
                                <br>
                                <div class='panel panel-default'>
                                  <div class='panel-body'>
                                    <label><b>Descripcion breve</b></label>
                                    <p>".$descripcion."</p>
                                    <label><b>Contenido</b></label>
                                    <p>".$contenido."</p>
                                    <label><b>Categoria</b></label>
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