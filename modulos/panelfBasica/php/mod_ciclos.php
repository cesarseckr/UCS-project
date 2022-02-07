<div class="modal fade" id="mod_ciclos" tabindex="-1" role="dialog" aria-labelledby="mod" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-edit"></i>&nbsp; Modificar Ciclos
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
            <form id="form-ciclos_m" action="php/mod_ciclosE.php" method="post" enctype="multipart/form-data">
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
                <label>* Fecha de inicio:</label>
                <input type="date" class="form-control" name="fecha_inicio_m" id="fecha_inicio_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese una fecha</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>* Fecha de fin:</label>
                <input type="date" class="form-control" placeholder="Nombre" name="fecha_fin_m" id="fecha_fin_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese una fecha</p>">
              </div>
                <div class="form-group col-sm-6">
                <label>* Plan de estudios:</label>
                <select name='plan_m' id='plan_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona plan de estudios" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un plan de estudios</b>">
                </select>
                 </div>
              <div class="form-group col-sm-4">
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
    form : '#form-ciclos_m',
    modules : 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      mod("#form-ciclos_m","Listado de ciclos");
      $successMsg.show();
      return false; 
    }
  });
</script>