<div class="modal fade" id="mod_carreras" tabindex="-1" role="dialog" aria-labelledby="mod" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-edit"></i>&nbsp; Modificar Carrera
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
            <form id="form-carreras_m" action="php/mod_carrerasE.php" method="post" enctype="multipart/form-data">
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
                <label>* Modalidad:</label>
                <select name='academia_m' id='academia_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona modalidad" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un Modalidad</b>">
                </select>
                </div>
                <div class="form-group col-sm-6">
                <label>* Tipo de carrera:</label>
                <select name='tipo_area_m' id='tipo_area_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona tipo de carrera" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un tipo de carrera</b>">
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
    form : '#form-carreras_m',
    modules : 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      mod("#form-carreras_m","Listado de carreras");
      $successMsg.show();
      return false; 
    }
  });
</script>