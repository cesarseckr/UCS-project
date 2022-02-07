<div class="modal fade" id="add_horarios" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-plus"></i>&nbsp; Nueva Horario
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
            <form id="form-horarios" action="php/add_horariosE.php" method="post" enctype="multipart/form-data">
              <div class="row">
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
                <label>* Aula:</label>
                <select name='aula' id='aula' tipo="1" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona una aula" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una aula</b>">
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
    form : '#form-horarios',
    modules : 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-horarios","Listado de horarios");
      $successMsg.show();
      return false; 
    }
  });
</script>