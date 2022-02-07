<div class="modal fade" id="add_alumnos" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-plus"></i>&nbsp; Nuevo Alumno
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
            <h3>Información General</h3><hr>
            <form id="form-alumno" action="php/add_alumnosE.php" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="form-group col-sm-5">
                <center>
              <div id="act_alumno">
              <img id="perfil" class="img-thumbnail rounded-circle" src="../../archivos/alumno-generica.png" width="230" alt="fotografía de alumno">
              </div>
              <br>
              <input type="file" id="foto_usr" name="foto_usr" style="display:none;" class="inputfile inputfile-1" accept="image/png, image/jpeg, image/jpg">
          <label for="foto_usr"><big><i class="fa fa-camera"></i> <span>Cambiar fotografía&hellip;</span></big></label>
            </center>
              </div>
              <div class="form-group col-sm-7">
               <div class="form-group col-sm-12">
                <label>* Apellido Paterno:</label>
                <input type="text" class="form-control" placeholder="Apellido Paterno" name="apaterno" id="apaterno" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Apellido Paterno</p>">
              </div>
              <div class="form-group col-sm-12">
                <label>* Apellido Materno:</label>
                <input type="text" class="form-control" placeholder="Apellido Materno" name="amaterno" id="amaterno" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Apellido Materno</p>">
              </div>
              <div class="form-group col-sm-12">
                <label>* Nombre(s):</label>
                <input type="text" class="form-control" placeholder="Nombre(s)" name="nombres" id="nombres" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Nombre</p>">
              </div>
             <div class="form-group col-sm-12">
                <label>Sexo:</label>
                <select name="sexo" id="sexo" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccione sexo</p>">
                  <option selected value="M">Masculino</option>
                  <option value="F">Femenino</option>
                </select>
              </div>
              <div class="form-group col-sm-12">
                <label>* Fecha de nacimiento:</label>
                <input type="date" name="fNac"id="fNac" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese fecha de Nacimiento</p>">
              </div>
              </div>
              <div class="form-group col-sm-12">
                            <center><small><i>
            <b>Importante:</b> Formatos soportados <b>(JPG, PNG, GIF)</b>, las imágenes no deben de superar <b>1024 Kb</b></i></small></center>
              <hr>
            </div>
              
              <div class="form-group col-sm-4">
                <label>Código Postal:</label>
                <input type="number" class="form-control" placeholder="Código Postal" name="CP" id="CP">
              </div>
              <div class="form-group col-sm-8">
                <label>Calle y Número:</label>
                <input type="text" class="form-control" placeholder="Calle y Número" name="callenumero" id="callenumero">
              </div>
              <div class="form-group col-sm-6">
                <label>Colonia:</label>
                <input type="text" class="form-control" placeholder="Colonia" name="colonia" id="colonia">
              </div>
               <div class="form-group col-sm-6">
                  <label>* CURP:</label>
                  <input type="text" class="form-control" placeholder="CURP" name="curp" id="curp" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese CURP</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>Telefono:</label>
                <input type="text" class="form-control" placeholder="Telefono" name="telefono" id="telefono">
              </div>
             <div class="form-group col-sm-6">
                <label>* Email:</label>
                <input type="email" class="form-control" placeholder="email@dominio.com" name="email" id="email" data-validation="email" data-validation-error-msg="<p style='color:red;'>Ingrese un email correcto</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>* Estado:</label>
                <select name='estado' id='estado' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona Estado" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una Estado</b>">
                </select>
              </div>
             <div class="form-group col-sm-6">
                <label>* Municipio:</label>
                <select name='municipio' id='municipio' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona Municipio" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una Municipio</b>">
                </select>
              </div>
            
              <div class="form-group col-md-12">
            <h3>Información Academica</h3><hr>
          </div>
                        <div class="form-group col-sm-6">
                <label>* Matricula:</label>
                <input type="text" class="form-control" placeholder="Matricula" name="matricula" id="matricula" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese una matricula</p>">
              </div>
            <div class="form-group col-sm-6"> 
                <label>* Fecha de Ingreso</label>
                <input type="date" name="fIng" id="fIng" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese fecha de ingreso</p>">
              </div>
              
              <div class="form-group col-sm-6">
                <label>* Estatus:</label>
                <select name='estatus' id='estatus' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona Estatus" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una Estatus</b>">
                </select>
              </div>
              <div class="form-group col-sm-6">
                <label>* Escuela de origen:</label>
                <select name='esc_origen' id='esc_origen' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona una Escuela de origen" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una Escuela de origen</b>">
                </select>
              </div>
              <div class="form-group col-sm-6">
                <label>Último grado de estudios:</label>
                <input type="text" class="form-control" placeholder="Estudios" name="ult_grado" id="ult_grado">
              </div>
              <div class="form-group col-sm-6">
                <label>Estudios previos:</label>
                <input type="text" class="form-control" placeholder="Estudios" name="est_prev" id="est_prev">
              </div>
              <div class="form-group col-sm-6">
                <label>* Carrera:</label>
                <select name='carrera' id='carrera' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona carrera" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un módulo al que pertenece</b>">
                </select>
                 </div>
                <div class="form-group col-sm-6">
                <label>* Módulo:</label>
                <select name='curso_d' id='curso_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un módulo" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un módulo al que pertenece</b>">
                </select>
                 </div>
                 <div class="form-group col-sm-12">
                <label>* Grupo:</label>
                <select name='grupo_d' id='grupo_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un grupo" data-validation="required" data-validation-error-msg="<b style='color:red;'>Asigna un grupo</b>">
                </select>
                 </div>

                 <div class="form-group col-sm-6">
                <label>* Plan de estudios:</label>
                <select name='plan' id='plan' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un plan de estudios" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un plan de estudios</b>">
                </select>
                 </div>
                <div class="form-group col-sm-6">
                <label>* Modalidad:</label>
                <select name='academia_d' id='academia_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona modalidad" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una modalidad</b>">
                </select>
                 </div>
                 <div class="form-group col-sm-12">
                <label>* Generación:</label>
                <select name='generacion_d' id='generacion_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona una generación" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una generación</b>">
                </select>
                 </div>
              <div class="form-group col-sm-12"> 
                <label>Observaciones</label>
                <textarea id="observaciones" name="observaciones" class="form-control"></textarea>
              </div>
              <div class="form-group col-sm-8">
              <label for="input" style="color:red;"><i>Los campos marcados con (*) son obligatorios.</i></label>
              </div>
            </div>
            </div>   
            </div>
             </div>

            <div class="modal-footer">
              <button class="btn btn-primary btn-sm">
              <i class="fa fa-play-circle"></i>Registrar</button>
              <button type="reset" class="btn btn-secondary btn-sm">
              <i class="fa fa-eraser"></i></button>
              <button class="btn btn-danger btn-sm" data-dismiss="modal">
              <i class="fa fa-times"></i>Cerrar</button>
                     </form>
      </div>
    </div>
  </div>
</div>

<script>
  $successMsg = $(".alert");
  $.validate({
    form : '#form-alumno',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-alumno","Listado de alumnos");
      $successMsg.show();
      return false; 
    }
  });
</script>