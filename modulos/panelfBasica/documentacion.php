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
         <!-- CONTENIDO PRINCIPAL --> 
        <div class="content-wrapper">
        
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body"><h4 class="card-title"><i class="fa fa-question-circle"></i>&nbsp;BIENVENIDO A LA SECCIÓN DE DOCUMENTACIÓN</h4><hr>
                  <div class="fluid-container">
                   <h4>Bienvenido a la sección de documentación.</h4>
                   <p>Puedes consultar todos los documentos relacionados con la administración del sistema, circulares, reglamentación y documentos importantes para tu área.<br>
                  Además puedes subir documentación que se te sea requerida "Máximo de 10 documentos".<br>
                  <small><i> *Recuerda que el sistema cuenta con solicitudes por medio de tickets a diferentes áreas de la institución.</i></small>
                 </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6 grid-margin">
              <div class="card">
                <div class="card-body"><h4 class="card-title"><i class="fa fa-book"></i>&nbsp; MIS ARCHIVOS</h4><hr>
                  <div class="fluid-container">
                   <p>Selecciona un archivo, máximo 6Mb
          <form id="form-archivos" action="archivos/add_archivos_usuarioE.php" method="post" enctype="multipart/form-data">
          <input value="<? echo $id_usuario; ?>" name="id_usuario" id="id_usuario" style="display: none;">
            <div class="form-row">
            <div class="form-group col-md-12">
              <div class="row">
              <div class="form-group col-sm-12">
                <label>* Nombre del documento:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese un nombre de documento</p>">
                </div>
                 <div class="form-group col-sm-12">
                  <label>* Selecciona un archivo:</label>
                <input type="file" class="form-control" name="archivo" id="archivo" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccione un archivo</p>">
                  </div>
                <div class="form-group col-sm-12">
                    <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-upload"></i>Subir archivo</button>
                    </form>
                  </div>
                   </div>
                 </div>
               </div>
               
                    <script>
  $successMsg = $(".alert");
  $.validate({
    form : '#form-archivos',
    modules: 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-archivos","Listado de documentos");
      $successMsg.show();
      return false; 
    }
  });
</script>
<h5>Listado de documentos</h5><hr>
<div id="tabla">
<?
$sql="SELECT * FROM archivos_usuarios where id_usuario='$id_usuario'";
  $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
        $id_archivo_usuario=$row["id_archivos_usuario"];
        $nombre=$row["nombre"];
        $ruta=$row["ruta"];
  echo "<p><a href='../../archivos/".$ruta."' target='_blank'><i class='fa fa-file-alt'></i> ".$nombre."</a> <a id='eliminar_archivo_usuario' id_archivo_usuario='".$id_archivo_usuario."' ruta='".$ruta."' href='#tabla' style='color:red;'><small>(Eliminar)</small></a></p>";
      }
?>
</div>

                   </p>
                   <h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin">
              <div class="card">
                <div class="card-body"><h4 class="card-title"><i class="fa fa-book"></i>&nbsp; MANUALES</h4><hr>
                  <div class="fluid-container">
                   <h4>Consulta la documentación relacionada con el sistema:
                   </h4>
                  <a href="../../archivos/manuales/control_escolar/manual.pdf" target="_blank"><i class="fa fa-file-pdf"></i> Ver manual del sistema para Control Escolar</a>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body"><h4 class="card-title"><i class="fa fa-bug"></i>&nbsp; BUGS O ERRORES</h4><hr>
                  <div class="fluid-container">
                   <h5>¿No pudiste solucionar tus dudas en esta sección? 
                   </h5>
                   <p><b>Si encontraste un error en el sistema no dudes en comunicarlo.</b><br>
                   Contacta al <b>área de sistemas</b> por medio de un ticket de soporte desde la siguiente sección:
                    <br>
                    <a href="tickets"><i class="fa fa-ticket-alt"></i> Ir a la sección de tickets</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body"><h4 class="card-title"><i class="fa fa-book"></i>&nbsp; DOCUMENTACIÓN</h4><hr>
                  <div class="fluid-container">
                   <p>A continuación puedes consultar todos los documentos importantes para tu área, se encuentra dividido en la siguintes secciones:</p>
                   <h5>
                    <? include("archivos/tabla_archivos.php"); ?>
                  </div>
                </div>
              </div>
            </div>

          </div>


        </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->


  <? include("../includes/footer.php");?>