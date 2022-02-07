<div class="modal fade" id="add_periodos" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-edit"></i>&nbsp; Editar Período de evaluaciones
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
            <form id="form-periodos" action="php/add_periodosE.php" method="post" enctype="multipart/form-data">
            <div class="form-group col-sm-4" style="display:none;">
                <input type="text" class="form-control" name="id_grupo_per" id="id_grupo_per">
                <input type="text" class="form-control" name="periodo" id="periodo">
                <input type="text" class="form-control" name="periodo_extra" id="periodo_extra">
                <input type="text" class="form-control" name="periodo_ad" id="periodo_ad">
              </div>
              <div class="row">

              <div class="form-group col-sm-6">
                <label>Grupo:</label>
                <input type="text" class="form-control" name="grupo_per" id="grupo_per" readonly>
              </div>
              <div class="form-group col-sm-6">
                <label>Módulo:</label>
                <input type="text" class="form-control" name="curso_per" id="curso_per" readonly>
              </div>
              <div class="form-group col-sm-12">
                <label>Carrera:</label>
                <input type="text" class="form-control" name="carrera_per" id="carrera_per" readonly>
              </div>
              <div class="form-group col-sm-12">
                <h5>Asignar períodos de evaluación</h5>
                <hr>
              </div>
              <div class="form-group col-sm-12">Periodo regular</div>
              <div class="form-group col-sm-6">
                <label>* Fecha de inicio (Regular):</label>
                <input type="datetime-local" class="form-control" name="fecha_in" id="fecha_in" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingresa una fecha</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>* Fecha de fin (Regular):</label>
                <input type="datetime-local" class="form-control" name="fecha_fin" id="fecha_fin" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingresa una fecha</p>">
              </div>
              <div class="form-group col-sm-12">Periodo extraordinario</div>
              <div class="form-group col-sm-6">
                <label>Fecha de inicio (Extraordinario):</label>
                <input type="datetime-local" class="form-control" name="fecha_in_extra" id="fecha_in_extra">
              </div>
              <div class="form-group col-sm-6">
                <label>Fecha de fin (Extraordinario):</label>
                <input type="datetime-local" class="form-control" name="fecha_fin_extra" id="fecha_fin_extra">
              </div>
              <div class="form-group col-sm-12">Periodo adicional</div>
              <div class="form-group col-sm-6">
                <label>Fecha de inicio (Adicional):</label>
                <input type="datetime-local" class="form-control" name="fecha_in_ad" id="fecha_in_ad">
              </div>
              <div class="form-group col-sm-6">
                <label>Fecha de fin (Adicional):</label>
                <input type="datetime-local" class="form-control" name="fecha_fin_ad" id="fecha_fin_ad">
              </div>

              <div class="form-group col-sm-12"><hr> 
                <label>Observaciones</label>
                <textarea id="observaciones_per" name="observaciones_per" class="form-control"></textarea>
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
    form : '#form-periodos',
    modules : 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-periodos","Listado de periodos");
      $successMsg.show();
      return false; 
    }
  });
</script>