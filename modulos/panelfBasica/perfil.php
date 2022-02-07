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
        
        <? include ("php/datos_personales.php"); ?>
        <div class="row">
            <div class="col-lg-3 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="fluid-container">
                        <span id="perfil_act">
                       <img id="fp" class="img-thumbnail rounded-circle" src="<? echo $dir_foto; ?>" alt="Perfil"><br><br>
                        </span>                  
        <div class="box"><center>
         <form id="form-foto" action="php/foto_perfil.php" method="post" enctype="multipart/form-data"> 
          <input id="id_usuario" name="id_usuario" value="<? echo $id_usuario; ?>" style="display:none;">
          <input type="file" id="foto" name="foto" style="display:none;" class="inputfile inputfile-1" accept="image/png, image/jpeg, image/jpg">
          <label for="foto"><i class="fa fa-camera"></i> <span>Cambiar foto&hellip;</span></label><hr></form></center>
        </div>
                  </div>
                </div>
              </div>

            </div>
      
              <div class="col-md-9 grid-margin">
              <div class="card">
                <div class="card-body"><h4 class="card-title"><i class="fa fa-user"></i>&nbsp; MI PERFIL</h4><hr>
                  <div class="fluid-container">
                  <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-usuario-tab" data-toggle="tab" href="#nav-usuario" role="tab" aria-controls="nav-usuario" aria-selected="true">Usuario</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-personales" role="tab" aria-controls="nav-personales" aria-selected="false">Personales</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contacto" role="tab" aria-controls="nav-contacto" aria-selected="false">Contacto</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-usuario" role="tabpanel" aria-labelledby="nav-usuario-tab">
<br><h4>Datos de usuario:</h4>
    <form id="mod_pass" action="php/mod_passE.php" method="post" enctype="multipart/form-data">
    <input name="id_usuario" value="<? echo $id_usuario; ?>" style="display: none;">
           <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <p>Nombre de usuario</p>
                        <div class="input-group">
                          <div class="input-group-prepend bg-dark">
                            <span class="input-group-text bg-transparent">
                              <i class="fa fa-user text-white"></i>
                            </span>
                          </div>
                         
                          <input type="text" class="form-control" disabled aria-label="Usuario" name="usuario"  value="<? echo $usuario; ?>" >
                        </div>
                      </div>
                    </div>
                   <div class="col-md-6">
                      <div class="form-group">
                        <p>Tipo de usuario</p>
                        <div class="input-group">
                          <div class="input-group-prepend bg-dark">
                            <span class="input-group-text bg-transparent">
                              <i class="fa fa-users text-white"></i>
                            </span>
                          </div>
                          <input type="text" class="form-control" disabled aria-label="Usuario" name="tipo_usr" value="<? echo $area_admin; ?>" >
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <h4> Cambiar tu contraseña:</h4>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <p>Ingresa tu contraseña</p>
                        <div class="input-group">
                          <div class="input-group-prepend bg-dark">
                            <span class="input-group-text bg-transparent">
                              <i class="fa fa-unlock text-white"></i>
                            </span>
                          </div>
                          <input type="password" class="form-control" name="pass_confirmation" value="<? echo base64_decode($pass); ?>"
                          data-validation="length" data-validation-length="min8"
                          data-validation-error-msg="<p style='color:red;'>* Ingrese al menos 8 caracteres</p>">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <p>Repite tu contraseña</p>
                        <div class="input-group">
                          <div class="input-group-prepend bg-dark">
                            <span class="input-group-text bg-transparent">
                              <i class="fa fa-unlock text-white"></i>
                            </span>
                          </div>
                          <input type="password" class="form-control" 
                          name="pass" value="<? echo base64_decode($pass); ?>" 
                          data-validation="confirmation"
                          data-validation-error-msg="<p style='color:red;'>* La contraseña no coincide</p>">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                    <hr><button class="btn btn-dark">Cambiar Contraseña</button>
                    </div>
                  </div>
                </form>
         <script>
         $successMsg = $(".alert");
         $.validate({
         form:'#mod_pass',
         modules : 'security',
         errorMessageClass: "error",
         onSuccess: function(){
         mod("#mod_pass"); 
         $successMsg.show();
         return false; 
                }
              });
         </script>
  </div>
 
  <div class="tab-pane fade" id="nav-personales" role="tabpanel" aria-labelledby="nav-profile-tab">
<br><h4>Datos de personales:</h4>
<div class="row">
                    <div class="col-md-12">
                        <p><b>Nombre: </b> <? echo $nombre; ?><br>
                        <b>Genero: </b> <? echo $sexo; ?><br>
                        <b>Edad: </b> <? echo $edad." años"; ?><br>
                        <b>Domicilio: </b> <? echo $domicilio.", ".$colonia.", ".$municipio." ".$estado; ?><br>
                        <b>CURP: </b> <? echo $curp; ?><br>
                        <b>RFC: </b> <? echo $rfc; ?><br>
                        <b>Información académica: </b> <? echo $academia; ?></p>
                    </div>
                  </div>

  </div>
  <div class="tab-pane fade" id="nav-contacto" role="tabpanel" aria-labelledby="nav-contact-tab">
    <form id="mod_contacto" action="php/mod_contactoE.php" method="post" enctype="multipart/form-data">
      <input name="id_datos" value="<? echo $datos; ?>" style="display: none;">
      <input name="tipo_datos" value="<? echo $tipo; ?>" style="display: none;">
<br><h4> Datos de contacto:</h4>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <p>Teléfono</p>
                        <div class="input-group">
                          <div class="input-group-prepend bg-dark">
                            <span class="input-group-text bg-transparent">
                              <i class="fa fa-phone text-white"></i>
                            </span>
                          </div>
                          <input type="text" class="form-control" name="telefono" id="telefono" value="<? echo $telefono; ?>" data-validation="required" data-validation-error-msg="<p style='color:red;'>* Ingrese una Teléfono</p>">
                        </div>
                      </div>
                    </div>
                        <? if($tipo!=1){ ?>
                        <div class="col-md-6">
                      <div class="form-group">
                        <p>Celular</p>
                        <div class="input-group">
                          <div class="input-group-prepend bg-dark">
                            <span class="input-group-text bg-transparent">
                              <i class="fa fa-phone text-white"></i>
                            </span>
                          </div>
                          <input type="text" class="form-control" name="celular" id="celular" value="<? echo $celular; ?>" data-validation="required" data-validation-error-msg="<p style='color:red;'>* Ingrese un Celular</p>">
                        </div>
                      </div>
                    </div>
                  <? } ?>
                    <div class="col-md-6">
                      <div class="form-group">
                        <p>E-mail</p>
                        <div class="input-group">
                          <div class="input-group-prepend bg-dark">
                            <span class="input-group-text bg-transparent">
                              <i class="fa fa-envelope text-white"></i>
                            </span>
                          </div>
                          <input type="text" class="form-control" name="email" id="email" value="<? echo $email; ?>" data-validation="required" data-validation-error-msg="<p style='color:red;'>* Ingrese un E-mail valido</p>">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                       <button class="btn btn-dark">Actualizar datos</button>
                    </div>
                  </div>
                </form>
         <script>
         $successMsg = $(".alert");
         $.validate({
         form:'#mod_contacto',
         errorMessageClass: "error",
         onSuccess: function(){
         mod("#mod_contacto"); 
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
        </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
  <? include("../includes/footer.php");?>