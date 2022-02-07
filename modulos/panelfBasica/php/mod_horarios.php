<div class="modal fade" id="mod_horarios" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-edit"></i>&nbsp; Modificar Horario
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-row">
            <div class="form-group col-md-12">
            <form id="form-horarios_m" action="php/mod_horariosE.php" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="form-group col-sm-4" style="display:none">
                <input type="text" class="form-control" placeholder="ID" name="id_m" id="id_m">
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
                <label>* Aula:</label>
                <select name='aula_m' id='aula_m' tipo="1" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona una aula" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una aula</b>">
                </select>
                 </div>
              <div class="form-group col-sm-8">
              <label for="input" style="color:red;"><i>Los campos marcados con (*) son obligatorios.</i></label>
              </div>
            </div>
            </div>   
            </div>
             </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-sm">
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
    form : '#form-horarios_m',
    modules: 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      mod("#form-horarios_m", "Listado de horarios");
      $successMsg.show();
      return false;
    }
  });
</script>