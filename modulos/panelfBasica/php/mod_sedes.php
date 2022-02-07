<div class="modal fade" id="mod_sedes" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-edit"></i>&nbsp; Modificar Edificio
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-row">
            <div class="form-group col-md-12">
            <form id="form-sedes_m" action="php/mod_sedesE.php" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="form-group col-sm-4" style="display:none">
                <label>ID inistrativo:</label>
                <input type="text" class="form-control" placeholder="ID" name="id_m" id="id_m">
              </div>
              <div class="form-group col-sm-4">
                <label>* Siglas:</label>
                <input type="text" class="form-control" placeholder="Siglas" name="siglas_m" id="siglas_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Nombre</p>">
                </div>
                <div class="form-group col-sm-8">
                <label>* Nombre:</label>
                <input type="text" class="form-control" placeholder="Nombre" name="nombres_m" id="nombres_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Nombre</p>">
                </div>
                <div class="form-group col-sm-12">
                <label>* Dirección (Calle, Número, Colonia, CP):</label>
                <input type="text" class="form-control" placeholder="Dirección" name="direccion_m" id="direccion_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Dirección</p>">
                </div>
                <div class="form-group col-sm-6">
                <label>* Estado:</label>
                <select name='estado_m' id='estado_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona estado" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un estado</b>">
                </select>
                </div>
                <div class="form-group col-sm-6">
                <label>* Municipio:</label>
                <select name='municipio_m' id='municipio_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona municipio" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un municipio</b>">
                </select>
                </div>
                <div class="form-group col-sm-6">
                <label>* Teléfono:</label>
                <input type="text" class="form-control" placeholder="Teléfono" name="telefono_m" id="telefono_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Nombre</p>">
                </div>
                <div class="form-group col-sm-6">
                <label>* Tipo:</label>
                <select name='tipo_m' id='tipo_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona tipo" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un tipo</b>">
                <option value="1">Interna</option>
                <option value="2">Externa</option>
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
    form : '#form-sedes_m',
    modules: 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      mod("#form-sedes_m", "Listado de sedes");
      $successMsg.show();
      return false;
    }
  });
</script>