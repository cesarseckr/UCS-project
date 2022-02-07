<div class="modal fade" id="add_ciclos" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-plus"></i>&nbsp; Nuevo Ciclo
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
            <form id="form-ciclos" action="php/add_ciclosE.php" method="post" enctype="multipart/form-data">
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
                <label>* Fecha de inicio:</label>
                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese una fecha</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>* Fecha de fin:</label>
                <input type="date" class="form-control" placeholder="Nombre" name="fecha_fin" id="fecha_fin" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese una fecha</p>">
              </div>
                <div class="form-group col-sm-6">
                <label>* Plan de estudios:</label>
                <select name='plan' id='plan' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona plan de estudios" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un plan de estudios</b>">
                </select>
                 </div>
              <div class="form-group col-sm-4">
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
    form : '#form-ciclos',
    modules : 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-ciclos","Listado de ciclos");
      $successMsg.show();
      return false; 
    }
  });
</script>