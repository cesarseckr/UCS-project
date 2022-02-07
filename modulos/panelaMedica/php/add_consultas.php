<div class="modal fade" id="add_consultas" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h5 class="modal-title"><i class="menu-icon fas fa-notes-medical"></i>&nbsp; Nuevo Paciente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-consulta" action="php/registro_pacienteE.php" method="post" enctype="multipart/form-data">
    		  <div class="form-group">
    		    <label>Tipo</label>
    		    <SELECT type="text" class="form-control" name="TipoUsuario" id="TipoUsuario" placeholder="Tipo de Paciente" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Selecciona un tipo de paciente</p>">
    		    </SELECT>
    		  </div>
          
          <div id="seccion_alumno">
            <div class="form-row">
              <div class="form-group col-4">
                <label>Plan de estudios</label>
                <select name='plan' id='plan' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un plan de estudios" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccione un plan de estudios</p>"></select>
              </div>
               <div class="form-group col-4" >
                <label>Modalidad</label>
                <select name='academia_d' id='academia_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona modalidad" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccione una modalidad</p>"></select>
              </div>
              <div class="form-group col-4">
                <label>Escalón o Generación</label>
                <select name='generacion_d' id='generacion_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona una generación" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccione una generación</p>"></select>
              </div>
              <div class="form-group col-12">
                <label>Nombre</label>
                <select name='nombre_alum' id='nombre_alum' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un Alumno" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccione un Alumno</p>"></select>
              </div>
            </div>
          </div>

          <div id="seccion_otro">
            <div class="form-group">
              <label>Nombre de paciente</label>
              <input type="text" class="form-control" name="NombreUsuario-Otro" id="NombreUsuario-Otro" title="Insertar el nombre del paciente" data-validation="required" data-validation-error-msg="<p style='color:red;'>Insertar el nombre del paciente</p>">
            </div>
            <div class="form-group">
              <label>Edad del paciente</label>
              <input type="text" class="form-control" name="EdadUsuario-Otro" id="EdadUsuario-Otro" placeholder="Edad del Paciente" itle="Insertar edad del paciente" data-validation="required" data-validation-error-msg="<p style='color:red;'>Insertar edad del paciente</p>">
            </div>
            <div class="form-group">
              <label>Sexo</label>
              <SELECT name="SexoUsuario-Otro" id="SexoUsuario-Otro" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Seleccionar sexo del paciente" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccionar sexo del paciente</p>">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
              </SELECT>
            </div>
          </div>
    		  <div class="form-group" id="NombreUsuario-div">
    		    <label>Nombre de paciente</label>
    		    <SELECT name="NombreUsuario" id="NombreUsuario" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un paciente" data-validation="required" data-validation-error-msg="<p style='color:red;'>Selecciona un paciente</p>">
    		    </SELECT>
            <br>
            <br>
    		  </div>

          <div id="area_direccion">
            <div class="form-group">
              <label>Dirigir</label>
              <SELECT name="direccion_paciente" id="direccion_paciente" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Seleccione una opción para dirigir al paciente" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccione una opción para dirigir al paciente</p>">
                <option value="1">Consulta</option>
                <option value="2">Acciónes de Enfermería</option>
              </SELECT>
            </div>
          </div>

          <div class="row">
            <div class="col-3">
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="btn btn-dark btn-rounded" id="v-pills-vacio-tab" data-toggle="pill" href="#vacio" role="tab" aria-controls="vacio" aria-selected="true"  style="display: none"><i class="menu-icon fas fa-heartbeat"></i>vacio</a>
                <br>  
                <a class="btn btn-dark btn-rounded" id="v-pills-home-tab" data-toggle="pill" href="#signos_vitales" role="tab" aria-controls="signos_vitales" aria-selected="true"><i class="menu-icon fas fa-file-medical-alt"></i>Signos Vitales</a>
                <br>  
                <a class="btn btn-dark btn-rounded" id="v-pills-profile-tab" data-toggle="pill" href="#somatometria" role="tab" aria-controls="somatometria" aria-selected="false"><i class="menu-icon fas fa-weight"></i>Somatometria</a>
              </div>
            </div>
            <div class="col-1"></div>
            <div class="col-8">
              <div class="tab-content" id="v-pills-tabContent">
                
                <div class="tab-pane fade show active" id="vacio" role="tabpanel" aria-labelledby="v-pills-vacio-tab">
                </div>

                <div class="tab-pane fade show" id="signos_vitales" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  <div class="form-group">
                    <label>Fecha</label>
                    <label type="text" class="form-control col-5" name="fecha_art_consu" id="fecha_art_consu">
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Presion arterial</label>
                    <input type="text" class="form-control col-5" name="presion_art_consu" id="presion_art_consu">
                  </div>
                  <div class="form-group">
                    <label>Frec. Cardiaca</label>
                    <input type="text" class="form-control col-5" name="frec_card_consu" id="frec_card_consu">
                  </div>
                  <div class="form-group">
                    <label>Frec. Respiratoria</label>
                    <input type="text" class="form-control col-5" name="frec_resp_consu" id="frec_resp_consu">
                  </div>
                  <div class="form-group">
                    <label>TEMP</label>
                    <input type="text" class="form-control col-5" name="temp_consu" id="temp_consu">
                  </div>
                </div>

                <div class="tab-pane fade" id="somatometria" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                  <div class="form-group">
                    <label>Fecha</label>
                    <div class="form-row">
                      <label type="text" class="form-control col-5" name="fecha_smt_consu" id="fecha_smt_consu">
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Altura</label>
                    <div class="form-row">
                      <input type="text" placeholder="metros" class="form-control col-5" name="altura_consu" id="altura_consu">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Peso</label>
                    <div class="form-row">
                      <input type="text" placeholder="kilogramos" class="form-control col-5" name="peso_consu" id="peso_consu">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>IMC</label>
                    <div class="form-row">
                      <input type="text" placeholder="IMC" class="form-control col-5" name="imc_consu" id="imc_consu">
                      <button type="button" class="col-3 btn btn-dark" id="calcuar_imc">Calcular IMC</button>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        
          <div class="modal-footer">
            <button class="btn btn-dark btn-sm">
              <i class="fa fa-play-circle"></i>Registrar
            </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $successMsg = $(".alert");
  $.validate({
    form : '#form-consulta',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-consulta");
      $successMsg.show();
      return false; 
    }
  });
</script>