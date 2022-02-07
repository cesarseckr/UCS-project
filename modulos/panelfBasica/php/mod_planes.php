<div class="modal fade" id="mod_planes" tabindex="-1" role="dialog" aria-labelledby="mod" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-edit"></i>&nbsp; Modificar plan de estudios
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
            <form id="form-planes_m" action="php/mod_planesE.php" method="post" enctype="multipart/form-data">
              <div class="form-group col-sm-4" style="display:none;">
                <input type="text" class="form-control" name="id_m" id="id_m">
              </div>
              <div class="row">
                            <div class="form-group col-sm-6">
                <label>* Clave:</label>
                <input type="text" class="form-control" placeholder="Clave" name="clave_m" id="clave_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Nombre</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>* Nombre:</label>
                <input type="text" class="form-control" placeholder="Nombre" name="nombres_m" id="nombres_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Nombre</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>* Calificación mínima:</label>
                <input type="number" step="0.1" data-validation-allowing="range[1;10],float" class="form-control" placeholder="Del 1 al 10" name="calif_m" id="calif_m" data-validation="number" data-validation-error-msg="<p style='color:red;'>Ingrese la calificación en el rango requerido</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>* Asistencia mínima:</label>
                <input type="number" data-validation-allowing="range[1;100]" class="form-control" placeholder="Máximo 100%" name="asistencia_m" id="asistencia_m" data-validation="number" data-validation-error-msg="<p style='color:red;'>Ingrese la asistencia en el % requerido</p>">
              </div>
              <div class="form-group col-sm-4">
                <label>* Período ordinario:</label>
                <select name='per_evaluacion_m' id='per_evaluacion_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona estatus" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un estatus</b>">
                <option value="1">Activado</option>
                <option value="2">Desactivado</option>
                </select>
                 </div>
                 <div class="form-group col-sm-4">
                <label>* Período extraordinario:</label>
                <select name='per_extra_m' id='per_extra_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona estatus" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un estatus</b>">
                <option value="1">Activado</option>
                <option value="2">Desactivado</option>
                </select>
                 </div>
                 <div class="form-group col-sm-4">
                <label>* Período especial:</label>
                <select name='per_especial_m' id='per_especial_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona estatus" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un estatus</b>">
                <option value="1">Activado</option>
                <option value="2">Desactivado</option>
                </select>
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
    form : '#form-planes_m',
    modules : 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      mod("#form-planes_m","Listado de planes");
      $successMsg.show();
      return false; 
    }
  });
</script>