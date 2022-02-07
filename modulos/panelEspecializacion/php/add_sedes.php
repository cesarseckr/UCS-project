<div class="modal fade" id="add_sedes" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-plus"></i>&nbsp; Nueva Sede
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
            <form id="form-sedes" action="php/add_sedesE.php" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="form-group col-sm-4">
                <label>* Siglas:</label>
                <input type="text" class="form-control" placeholder="Siglas" name="siglas" id="siglas" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Nombre</p>">
                </div>
                <div class="form-group col-sm-8">
                <label>* Nombre:</label>
                <input type="text" class="form-control" placeholder="Nombre" name="nombres" id="nombres" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Nombre</p>">
                </div>
                <div class="form-group col-sm-12">
                <label>* Dirección (Calle, Número, Colonia, CP):</label>
                <input type="text" class="form-control" placeholder="Dirección" name="direccion" id="direccion" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Dirección</p>">
                </div>
                <div class="form-group col-sm-6">
                <label>* Estado:</label>
                <select name='estado' id='estado' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona estado" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un estado</b>">
                </select>
                </div>
                <div class="form-group col-sm-6">
                <label>* Municipio:</label>
                <select name='municipio' id='municipio' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona municipio" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un municipio</b>">
                </select>
                </div>
                <div class="form-group col-sm-6">
                <label>* Teléfono:</label>
                <input type="text" class="form-control" placeholder="Teléfono" name="telefono" id="telefono" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Nombre</p>">
                </div>
                 <div class="form-group col-sm-6">
                <label>* Tipo:</label>
                <select name='tipo' id='tipo' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona tipo" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un tipo</b>">
                <option value="1">Interna</option>
                <option value="2">Externa</option>
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
    form : '#form-sedes',
    modules : 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-sedes","Listado de sedes");
      $successMsg.show();
      return false; 
    }
  });
</script>