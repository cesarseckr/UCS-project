<div class="modal fade" id="mod_aulas" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-edit"></i>&nbsp; Modificar Aula
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-row">
            <div class="form-group col-md-12">
            <form id="form-aulas_m" action="php/mod_aulasE.php" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="form-group col-sm-4" style="display:none">
                <label>ID inistrativo:</label>
                <input type="text" class="form-control" placeholder="ID" name="id_m" id="id_m">
              </div>
              <div class="form-group col-sm-6">
                <label>* Nombre:</label>
                <input type="text" class="form-control" placeholder="Nombre" name="nombres_m" id="nombres_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Nombre</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>* Edificio:</label>
                <select name='edificio_m' id='edificio_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona Edificio" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un edificio</b>">
                </select>
              </div>
              <div class="form-group col-sm-6">
                <label>Capacidad:</label>
                <input type="number" class="form-control" placeholder="Capacidad" name="capacidad_m" id="capacidad_m">
              </div>
              <div class="form-group col-sm-6">
                <label>Capacidad recomendad:</label>
                <input type="number" class="form-control" placeholder="Capacidad recomendada" name="ideal_m" id="ideal_m">
              </div>
              <div class="form-group col-sm-6">
                <label>* Tipo:</label>
                <select name='tipo_m' id='tipo_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona tipo" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un tipo</b>">
                <option value="1">Aula</option>
                <option value="2">Otros</option>
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
    form : '#form-aulas_m',
    modules: 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      mod("#form-aulas_m", "Listado de aulas");
      $successMsg.show();
      return false;
    }
  });
</script>