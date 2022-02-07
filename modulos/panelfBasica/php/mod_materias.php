<div class="modal fade" id="mod_materias" tabindex="-1" role="dialog" aria-labelledby="mod" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-edit"></i>&nbsp; Modificar materia
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
            <form id="form-materias_m" action="php/mod_materiasE.php" method="post" enctype="multipart/form-data">
              <div class="form-group col-sm-4" style="display:none;">
                <input type="text" class="form-control" name="id_m" id="id_m">
              </div>
              <div class="row">
              <div class="form-group col-sm-12">
                <label>* Seleccione equivalencia:</label>
                <select name='equivalencia_m' id='equivalencia_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona equivalencia para esta materia" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una equivalencia</b>">
                </select>
              </div>
              <div class="form-group col-sm-12">
                <label>* Clave:</label>
                <input type="text" class="form-control" placeholder="Clave" name="clave_m" id="clave_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese una clave</p>">
              </div>
               <div class="form-group col-sm-12">
                <label>* Nombre de la materia:</label>
                <input type="text" class="form-control" placeholder="Nombre de la materia" name="nombre_m" id="nombre_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese un nombre para la materia</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>* Carrera:</label>
                <select name='carrera_m' id='carrera_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona carrera" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un módulo al que pertenece</b>">
                </select>
                 </div>
              <div class="form-group col-sm-6">
                <label>* Módulo:</label>
                <select name='curso_m_d' id='curso_m_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un módulo" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un módulo al que pertenece</b>">
                </select>
                 </div>
                <div class="form-group col-sm-6">
                <label>* Créditos:</label>
                <input type="number" step="0.01" class="form-control" placeholder="Total de créditos" name="creditos_m" id="creditos_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese los créditos</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>* Horas totales:</label>
                <input type="number" class="form-control" placeholder="Total de horas de teoria" name="horas_t_m" id="horas_t_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese número de horas</p>">
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
    form : '#form-materias_m',
    modules : 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      mod("#form-materias_m","Listado de materias");
      $successMsg.show();
      return false; 
    }
  });
</script>