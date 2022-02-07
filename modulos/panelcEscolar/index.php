<? session_start();?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <title>UCS Control - Dashboard</title>
  <!-- HEADER -->
   <?php include ("../includes/header.php"); ?>
   <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/css/bootstrap-select.min.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/js/bootstrap-select.min.js"></script>

  <!-- validator -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>


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
                <div class="card-body"><h1 class="card-title"><i class="fa fa-users"></i> Inscripcion de Alumno</h1><hr>


                <div class="fluid-container">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item active" id="li-infGeneral">
                        <a class="nav-link" data-toggle="tab" href="#InfGeneral" role="tab" aria-controls="InfGeneral">Información General</a>
                      </li>
                      <li class="nav-item" id="li-infEscolar">
                        <a class="nav-link" data-toggle="tab" href="#InfEscolar" role="tab" aria-controls="InfEscolar">Información Escolar</a>
                      </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane active" id="InfGeneral" role="InfGeneral" aria-labelledby="InfGeneral">
                        <h3>Informacion General</h3>
                        
                          <form>
                            <div class="from-group">      
                              <div class="form-row">
                                <div class="col-md-4 col-xs-12">
                                  <label>Apellido Paterno:</label>
                                  <input type="text" class="form-control" placeholder="Apellido Paterno" id="apaterno">
                                </div>
                                <div class="col-md-4 col-xs-12">
                                  <label>Apellido Materno:</label>
                                  <input type="text" class="form-control" placeholder="Apellido Materno" id="amaterno">
                                </div>
                                <div class="col-md-4 col-xs-12">
                                  <label>Nombre(s):</label>
                                  <input type="text" class="form-control" placeholder="Nombre(s)" id="nombres">
                                </div>
                              </div>

                              <br>

                              <div class="form-row">
                                <div class="col-md-2 col-xs-6">
                                  <label>Sexo:</label>
                                  <select id="sexo" class="form-control" id="sexo">
                                    <option selected value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                  </select>
                                </div>
                                <div class="col-md-5 col-xs-6">
                                  <label>F. Nacimiento:</label>
                                  <input type="date" id="fNac" class="form-control">
                                </div>
                                <div class="col-md-5 col-xs-12">
                                  <label>CURP:</label>
                                  <input type="text" class="form-control" placeholder="CURP" id="curp">
                                </div>
                              </div>

                              <br>

                              <div class="form-row">
                                <div class="col-md-6 col-xs-6">
                                  <label>Telefono:</label>
                                  <input type="text" class="form-control" placeholder="Telefomo" id="telefono">
                                </div>
                                <div class="col-md-6 col-xs-6">
                                  <label>Email:</label>
                                  <input type="text" class="form-control" placeholder="Email" id="email">
                                </div>
                              </div>

                              <br>

                              <div class="form-row">
                                <div class="col-md-6 col-xs-12">
                                  <label>Calle y Número:</label>
                                  <input type="text" class="form-control" placeholder="Calle y Número" id="calle-numero">
                                </div>
                                <div class="col-md-6 col-xs-12">
                                  <label>Colonia:</label>
                                  <input type="text" class="form-control" placeholder="Colonia" id="colonia">
                                </div>
                              </div>

                              <br>

                              <div class="form-row">
                                <div class="col-md-4 col-xs-12">
                                  <script src="funciones.js"></script>
                                  <label>Estado:</label>
                                  <select class="form-control" name='estado' id='estado'>
                                    <option value="">Seleccione un estado</option>'
                                  </select>
                                </div>
                                <div class="col-md-4 col-xs-12">
                                  <label>Municipio:</label>
                                  <select name='municipio' id='municipio' class="form-control">
                                    <option value="">Seleccione un municipio</option>'
                                  </select>
                                </div>
                                
                                <div class="col-md-4 col-xs-12">
                                  <label>Código Postal:</label>
                                  <input type="text" class="form-control" placeholder="Código Postal" id="CP">
                                </div>
                              </div>  
                            </div>
                          </form>
                          <br>
                           <button class="nav-link btn btn-lg btn-primary" type="button" data-toggle="tab" href="#InfEscolar" role="tab" aria-controls="InfEscolar" id="btnIE">Siguiente</button>
                           <script>
                             $( "#btnIE" ).click(function() {
                                $('#li-infGeneral').removeClass("active");
                                $('#li-infEscolar').addClass('active');
                              });
                           </script>


                      </div>
                      


                      <div class="tab-pane" id="InfEscolar" role="InfEscolar" aria-labelledby="InfEscolar">
                        <h3>Informacion Escolar</h3>
                        <form>
                          <div class="form-row">
                            <div class="col-md-4 col-xs-12"> 
                              <label>F. Inscripcion</label>
                              <input type="date" id="fIns" class="form-control">
                            </div>
                            <div class="col-md-4 col-xs-12"> 
                              <label>Grupo</label>
                              <select id="grupo" class="form-control">
                                  <option selected>grupo</option>
                              </select>
                            </div>
                            <div class="col-md-4 col-xs-12"> 
                              <label>Estatus</label>
                              <select id="estatus" class="form-control">
                                  <option selected>estatus</option>
                              </select>
                            </div>
                          </div>

                          <br>

                          <div class="form-row">
                             <div class="col-md-6 col-xs-12"> 
                              <label>Generacion</label>
                              <select id="generacion" class="form-control">
                                  <option selected>Generacion</option>
                              </select>
                            </div>
                            <div class="col-md-6 col-xs-12"> 
                              <label>Escuela de procedencia</label>
                              <input type="text" id="eProced" class="form-control">
                            </div>
                          </div>

                          <br>

                           <div class="form-row">
                            <div class="col-md-6 col-xs-12"> 
                              <label>Ultimo grado de estudios</label>
                              <input type="text" id="uGrado" class="form-control">
                            </div>
                            <div class="col-md-6 col-xs-12"> 
                              <label>Estudios Previos</label>
                              <input type="text" id="ePrev" class="form-control">
                            </div>
                            <div class="col-md-12 col-xs-12"> 
                              <label>Observaciones</label>
                              <textarea id="observaciones" class="form-control"></textarea>
                            </div>
                          </div>
                        </form>
                        <br>

                        <button type="button" class="btn btn-lg btn-primary" id="Inscribir">Inscribir</button>
                        <button type="button" class="btn btn-secondary btn-lg">Cancelar</button>
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
