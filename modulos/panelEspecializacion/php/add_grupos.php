<div class="modal fade" id="add_grupos" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-plus"></i>&nbsp; Añadir Grupo
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
            <form id="form-grupos" action="php/add_gruposE.php" method="post" enctype="multipart/form-data">
              <div class="row">
               <div class="form-group col-sm-12">
                <label>* Nombre del grupo:</label>
                <input type="text" class="form-control" placeholder="Nombre de la grupo" name="nombre" id="nombre" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese un nombre para la grupo</p>">
              </div>
               <div class="form-group col-sm-6">
                <label>* Carrera:</label>
                <select name='carrera' id='carrera' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona carrera" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una carrera al que pertenece</b>">
                </select>
                 </div>
              <div class="form-group col-sm-6">
                <label>* Módulo:</label>
                <select name='curso_d' id='curso_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un módulo" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un módulo al que pertenece</b>">
                </select>
                 </div>

                 <div class="form-group col-sm-6">
                <label>* Plan de estudios:</label>
                <select name='plan' id='plan' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un plan de estudios" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un plan de estudios</b>">
                </select>
                 </div>
              <div class="form-group col-sm-6">
                <label>* Ciclo:</label>
                <select name='ciclo_d' id='ciclo_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un ciclo" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un ciclo</b>">
                </select>
                 </div>
                  <div class="form-group col-sm-6">
                <label>* Sede:</label>
                <select name='sede' id='sede' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona sede" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una sede</b>">
                </select>
                 </div>
              <div class="form-group col-sm-6">
                <label>* Estatus:</label>
                <select name='estatus_a' id='estatus_a' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona estatus" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un estatus</b>">
                <option value="1">Activado</option>
                <option value="2">Desactivado</option>
                <option value="3">Finalizado</option>
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
    form : '#form-grupos',
    modules : 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-grupos","Listado de grupos");
      $successMsg.show();
      return false; 
    }
  });
</script>