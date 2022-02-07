<? session_start();?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
  <title>Panel de historial medico</title>
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

    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">
                <i class="fa fa-calendar"></i>&nbsp; Historia Medica
              </h4>
              <hr>
              <div class="fluid-container">
                <div class="form-group">
                  <label>Tipo</label>
                  <SELECT type="text" class="form-control" name="TipoUsuario_hist" id="TipoUsuario_hist" placeholder="Tipo de Paciente" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Selecciona un tipo de paciente</p>">
                  </SELECT>
                </div>
                
                <div id="seccion_alumno_hist">
                  <div class="form-row">
                    <div class="form-group col-4">
                      <label>Plan de estudios</label>
                      <select name='plan_hist' id='plan_hist' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un plan de estudios" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccione un plan de estudios</p>"></select>
                    </div>
                     <div class="form-group col-4" >
                      <label>Modalidad</label>
                      <select name='academia_d_hist' id='academia_d_hist' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona modalidad" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccione una modalidad</p>"></select>
                    </div>
                    <div class="form-group col-4">
                      <label>Escalón o Generación</label>
                      <select name='generacion_d_hist' id='generacion_d_hist' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona una generación" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccione una generación</p>"></select>
                    </div>
                    <div class="form-group col-12">
                      <label>Nombre</label>
                      <select name='nombre_alum_hist' id='nombre_alum_hist' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un Alumno" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccione un Alumno</p>"></select>
                    </div>
                  </div>
                </div>

                <div class="form-group" id="NombreUsuario-div_hist">
                  <label>Nombre de paciente</label>
                  <SELECT name="NombreUsuario_hist" id="NombreUsuario_hist" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un paciente" data-validation="required" data-validation-error-msg="<p style='color:red;'>Selecciona un paciente</p>">
                  </SELECT>
                  <br>
                  <br>
                </div>
                
                <br>
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#d_paciente" role="tab" aria-controls="d_paciente">Datos del paciente</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#a_nopat" role="tab" aria-controls="a_nopat">Antecedentes personales no patológicos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#a_pat" role="tab" aria-controls="a_pat">Antecedentes personales patológicos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#a_gin" role="tab" aria-controls="a_gin">Antecedentes ginecológicos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#hosp" role="tab" aria-controls="hosp">Hospitalizaciones</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#a_les" role="tab" aria-controls="a_les">Antecedentes de lesiones musculo-esqueleticas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#examen" role="tab" aria-controls="examen">Exámen médico</a>
                  </li>
                </ul>
                <form id="form-exmn" action="php/mod_exmE.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                <div class="tab-content col-12" id="myTabContent">
                  <div class="tab-pane active col-12" id="d_paciente" role="d_paciente" aria-labelledby="d_paciente">
                    <br>
                    <h1>Datos del paciente</h1>
                    <br>
                    <? include("php/frm-d_pacinente.php"); ?>
                  </div>

                  <div class="tab-pane" id="a_nopat" role="a_nopat" aria-labelledby="a_nopat">
                    <br>
                    <h1>Antecedentes personales no patológicos</h1>
                    <br>
                    <? include("php/frm-a_nopat.php"); ?>
                  </div>

                  <div class="tab-pane" id="a_pat" role="a_pat" aria-labelledby="a_pat">
                    <br>
                    <h1>Antecedentes personales patológicos</h1>
                    <br>
                    <? include("php/frm-a_pat.php"); ?>
                  </div>

                  <div class="tab-pane" id="a_gin" role="a_gin" aria-labelledby="a_gin">
                    <br>
                    <h1>Antecedentes ginecológicos</h1>
                    <br>
                    <? include("php/frm-a_gin.php"); ?>
                  </div>

                  <div class="tab-pane" id="hosp" role="hosp" aria-labelledby="hosp">
                    <br>
                    <h1>Hospitalizaciones</h1>
                    <br>
                    <? include("php/frm-hosp.php"); ?>
                  </div>

                  <div class="tab-pane" id="a_les" role="a_les" aria-labelledby="a_les">
                    <br>
                    <h1>Antecedentes de lesiones musculo-esqueleticas</h1>
                    <br>
                    <? include("php/frm-a_les.php"); ?>
                  </div>

                  <div class="tab-pane" id="examen" role="examen" aria-labelledby="examen">
                    <br>
                    <h1>Exámen médico</h1>
                    <br>
                    <? include("php/frm-examen.php"); ?>
                  </div>
                  <button class="btn-dark">Guardar</button>
                </div>
                </form>
                <script>
                  $successMsg = $(".alert");
                  $.validate({
                    form : '#form-exmn',
                    errorMessageClass: "error",
                    onSuccess: function(){
                      add_exmn("#form-exmn");
                      $successMsg.show();
                      return false; 
                    }
                  });
                </script>  
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
