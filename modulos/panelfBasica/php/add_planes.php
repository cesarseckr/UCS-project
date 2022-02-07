<div class="modal fade" id="add_planes" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-plus"></i>&nbsp; Nuevo Plan de estudios
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
            <form id="form-planes" action="php/add_planesE.php" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="form-group col-sm-6">
                <label>* Clave:</label>
                <input type="text" class="form-control" placeholder="Clave" name="clave" id="clave" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Nombre</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>* Nombre:</label>
                <input type="text" class="form-control" placeholder="Nombre" name="nombres" id="nombres" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Nombre</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>* Calificación mínima:</label>
                <input type="number" step="0.1" data-validation-allowing="range[1;10],float" class="form-control" placeholder="Del 1 al 10" name="calif" id="calif" data-validation="number" data-validation-error-msg="<p style='color:red;'>Ingrese la calificación en el rango requerido</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>* Asistencia mínima:</label>
                <input type="number" data-validation-allowing="range[1;100]" class="form-control" placeholder="Máximo 100%" name="asistencia" id="asistencia" data-validation="number" data-validation-error-msg="<p style='color:red;'>Ingrese la asistencia en el % requerido</p>">
              </div>
              <div class="form-group col-sm-4">
                <label>* Período ordinario:</label>
                <select name='per_evaluacion' id='per_evaluacion' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona estatus" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un estatus</b>">
                <option value="1">Activado</option>
                <option value="2">Desactivado</option>
                </select>
                 </div>
                 <div class="form-group col-sm-4">
                <label>* Período extraordinario:</label>
                <select name='per_extra' id='per_extra' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona estatus" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un estatus</b>">
                <option value="1">Activado</option>
                <option value="2">Desactivado</option>
                </select>
                 </div>
                 <div class="form-group col-sm-4">
                <label>* Período especial:</label>
                <select name='per_especial' id='per_especial' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona estatus" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un estatus</b>">
                <option value="1">Activado</option>
                <option value="2">Desactivado</option>
                </select>
                 </div>
              <div class="form-group col-sm-6">
                <label>* Estatus:</label>
                <select name='estatus_a' id='estatus_a' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona estatus" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un estatus</b>">
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
    form : '#form-planes',
    modules : 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-planes","Listado de planes");
      $successMsg.show();
      return false; 
    }
  });
</script>