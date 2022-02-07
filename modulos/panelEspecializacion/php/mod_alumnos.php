<div class="modal fade" id="mod_alumno" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-edit"></i>&nbsp; Modificar datos del Alumno
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-row">
            <div class="form-group col-md-12">
            <h3>Información General</h3><hr>
             <form id="form-alumno_m" action="php/mod_alumnosE.php" method="post" enctype="multipart/form-data">
             <div class="row">
             <div class="form-group col-sm-4" style="display:none;">
                <label>ID alumno:</label>
                <input type="text" class="form-control" name="id_m" id="id_m">
              </div>
              <div class="form-group col-sm-5">
                <center>
              <div id="act_alumno_m">
              <img id="perfil_m" class="img-thumbnail rounded-circle" src="../../archivos/alumno-generica.png" width="230" alt="fotografía de alumno">
              </div>
              <br>
              <input type="file" id="foto_usr_m" name="foto_usr_m" style="display:none;" class="inputfile inputfile-1" accept="image/png, image/jpeg, image/jpg">
          <label for="foto_usr_m"><big><i class="fa fa-camera"></i> <span>Cambiar fotografía&hellip;</span></big></label>
            </center>
              </div>
              <div class="form-group col-sm-7">
               <div class="form-group col-sm-12">
                <label>* Apellido Paterno:</label>
                <input type="text" class="form-control" placeholder="Apellido Paterno" name="apaterno_m" id="apaterno_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Apellido Paterno</p>">
              </div>
              <div class="form-group col-sm-12">
                <label>* Apellido Materno:</label>
                <input type="text" class="form-control" placeholder="Apellido Materno" name="amaterno_m" id="amaterno_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Apellido Materno</p>">
              </div>
              <div class="form-group col-sm-12">
                <label>* Nombre(s):</label>
                <input type="text" class="form-control" placeholder="Nombre(s)" name="nombres_m" id="nombres_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Nombre</p>">
              </div>
             <div class="form-group col-sm-12">
                <label>Sexo:</label>
                <select name="sexo_m" id="sexo_m" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccione sexo</p>">
                  <option selected value="M">Masculino</option>
                  <option value="F">Femenino</option>
                </select>
              </div>
              <div class="form-group col-sm-12">
                <label>* Fecha de nacimiento:</label>
                <input type="date" name="fNac_m" id="fNac_m" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese fecha de Nacimiento</p>">
              </div>
              </div>
              <div class="form-group col-sm-12">
                            <center><small><i>
            <b>Importante:</b> Formatos soportados <b>(JPG, PNG, GIF)</b>, las imágenes no deben de superar <b>1024 Kb</b></i></small></center>
              <hr>
            </div>
              
              <div class="form-group col-sm-4">
                <label>Código Postal:</label>
                <input type="number" class="form-control" placeholder="Código Postal" name="CP_m" id="CP_m">
              </div>
              <div class="form-group col-sm-8">
                <label>Calle y Número:</label>
                <input type="text" class="form-control" placeholder="Calle y Número" name="callenumero_m" id="callenumero_m">
              </div>
              <div class="form-group col-sm-6">
                <label>Colonia:</label>
                <input type="text" class="form-control" placeholder="Colonia" name="colonia_m" id="colonia_m">
              </div>
               <div class="form-group col-sm-6">
                  <label>* CURP:</label>
                  <input type="text" class="form-control" placeholder="CURP" name="curp_m" id="curp_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese CURP</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>Telefono:</label>
                <input type="text" class="form-control" placeholder="Telefono" name="telefono_m" id="telefono_m">
              </div>
             <div class="form-group col-sm-6">
                <label>* Email:</label>
                <input type="email" class="form-control" placeholder="email@dominio.com" name="email_m" id="email_m" data-validation="email" data-validation-error-msg="<p style='color:red;'>Ingrese un email correcto</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>* Estado:</label>
                <select name='estado_m' id='estado_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona Estado" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una Estado</b>">
                </select>
              </div>
             <div class="form-group col-sm-6">
                <label>* Municipio:</label>
                <select name='municipio_m' id='municipio_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona Municipio" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una Municipio</b>">
                </select>
              </div>
            
              <div class="form-group col-md-12">
            <h3>Información Academica</h3><hr>
          </div>
                        <div class="form-group col-sm-6">
                <label>* Matricula:</label>
                <input type="text" class="form-control" placeholder="Matricula" name="matricula_m" id="matricula_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese una matricula</p>">
              </div>
            <div class="form-group col-sm-6"> 
                <label>* Fecha de Ingreso</label>
                <input type="date" name="fIng_m" id="fIng_m" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese fecha de ingreso</p>">
              </div>
              
              <div class="form-group col-sm-6">
                <label>* Estatus:</label>
                <select name='estatus_m' id='estatus_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona Estatus" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una Estatus</b>">
                </select>
              </div>
              <div class="form-group col-sm-6">
                <label>* Escuela de origen:</label>
                <select name='esc_origen_m' id='esc_origen_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona una Escuela de origen" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una Escuela de origen</b>">
                </select>
              </div>
              <div class="form-group col-sm-6">
                <label>Último grado de estudios:</label>
                <input type="text" class="form-control" placeholder="Estudios" name="ult_grado_m" id="ult_grado_m">
              </div>
              <div class="form-group col-sm-6">
                <label>Estudios previos:</label>
                <input type="text" class="form-control" placeholder="Estudios" name="est_prev_m" id="est_prev_m">
              </div>
              <div class="form-group col-sm-6">
                <label>* Carrera:</label>
                <select name='carrera_m' id='carrera_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona carrera" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un módulo al que pertenece</b>">
                </select>
                 </div>
                <div class="form-group col-sm-6">
                <label>* Módulo:</label>
                <select name='curso_m_d' id='curso_m_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un módulo" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un módulo al que pertenece</b>">
                </select>
                 </div>
                 <div class="form-group col-sm-12">
                <label>* Grupo:</label>
                <select name='grupo_m_d' id='grupo_m_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un grupo" data-validation="required" data-validation-error-msg="<b style='color:red;'>Asigna un grupo</b>">
                </select>
                 </div>

                 <div class="form-group col-sm-6">
                <label>* Plan de estudios:</label>
                <select name='plan_m' id='plan_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un plan de estudios" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un plan de estudios</b>">
                </select>
                 </div>
                <div class="form-group col-sm-6">
                <label>* Modalidad:</label>
                <select name='academia_m_d' id='academia_m_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona modalidad" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una modalidad</b>">
                </select>
                 </div>
                 <div class="form-group col-sm-12">
                <label>* Generación:</label>
                <select name='generacion_m_d' id='generacion_m_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona una generación" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una generación</b>">
                </select>
                 </div>
              <div class="form-group col-sm-12"> 
                <label>Observaciones</label>
                <textarea id="observaciones_m" name="observaciones_m" class="form-control"></textarea>
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
              <i class="fa fa-play-circle"></i>Modificar</button>
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
    form : '#form-alumno_m',
    errorMessageClass: "error",
    onSuccess: function(){
      mod("#form-alumno_m","Listado de alumnos");
      $successMsg.show();
      return false; 
    }
  });
</script>