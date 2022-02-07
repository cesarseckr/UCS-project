<div class="modal fade" id="mod_horas" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-edit"></i>&nbsp; Modificar Hora
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-row">
            <div class="form-group col-md-12">
            <form id="form-horas_m" action="php/mod_horasE.php" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="form-group col-sm-4" style="display:none">
                <input type="text" class="form-control" placeholder="ID" name="id_m" id="id_m">
              </div>
              <div class="form-group col-sm-6">
                <label>* Hora de inicio:</label>
                <input type="time" class="form-control" name="hora_in_m" id="hora_in_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese una hora</p>">
                </div>
                <div class="form-group col-sm-6">
                <label>* Hora de fin:</label>
                <input type="time" class="form-control" name="hora_fin_m" id="hora_fin_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese una hora</p>">
                </div>
                <div class="form-group col-sm-6">
                <label>* Estatus:</label>
                <select name='estatus_a_m' id='estatus_a_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona estatus" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un estatus</b>">
                <option value="1">Activado</option>
                <option value="2">Desactivado</option>
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
    form : '#form-horas_m',
    modules: 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      mod("#form-horas_m", "Listado de horas");
      $successMsg.show();
      return false;
    }
  });
</script>