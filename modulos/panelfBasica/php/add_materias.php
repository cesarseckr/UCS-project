<div class="modal fade" id="add_materias" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-plus"></i>&nbsp; Añadir materia
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
            <form id="form-materias" action="php/add_materiasE.php" method="post" enctype="multipart/form-data">
              <div class="row">
              
              <div class="form-group col-sm-12">
                <label>* Seleccione equivalencia:</label>
                <select name='equivalencia' id='equivalencia' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona equivalencia para esta materia" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una equivalencia</b>">
                </select>
              </div>

              <div class="form-group col-sm-12">
                <label>* Clave:</label>
                <input type="text" class="form-control" placeholder="Clave" name="clave" id="clave" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese una clave</p>">
              </div>
               <div class="form-group col-sm-12">
                <label>* Nombre de la materia:</label>
                <input type="text" class="form-control" placeholder="Nombre de la materia" name="nombre" id="nombre" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese un nombre para la materia</p>">
              </div>
               <div class="form-group col-sm-6">
                <label>* Carrera:</label>
                <select name='carrera' id='carrera' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona carrera" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un módulo al que pertenece</b>">
                </select>
                 </div>
              <div class="form-group col-sm-6">
                <label>* Módulo:</label>
                <select name='curso_d' id='curso_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un módulo" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un módulo al que pertenece</b>">
                </select>
                 </div>
                <div class="form-group col-sm-4">
                <label>* Créditos:</label>
                <input type="number" step="0.01" class="form-control" placeholder="Total de créditos" name="creditos" id="creditos" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese los créditos</p>">
              </div>
            <div class="form-group col-sm-6">
                <label>* Horas totales:</label>
                <input type="number" class="form-control" placeholder="Total de horas de teoria" name="horas_t" id="horas_t" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese número de horas</p>">
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
    form : '#form-materias',
    modules : 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-materias","Listado de materias");
      $successMsg.show();
      return false; 
    }
  });
</script>