<div class="modal fade" id="mod_calificaciones" tabindex="-1" role="dialog" aria-labelledby="mod" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-edit"></i>&nbsp; Modificar Calificación
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
            <form id="form-calificaciones_m" action="php/mod_calificacionesE.php" method="post" enctype="multipart/form-data">
              <div class="form-group col-sm-4" style="display:none;">
                <input type="text" class="form-control" name="id_m" id="id_m">
                <input type="text" class="form-control" name="id_grupo" id="id_grupo">
              </div>
              <div class="row">
              <div class="form-group col-sm-6">
                <label>Alumno:</label>
                <input type="text" class="form-control" id="alumno" readonly>
              </div>
              <div class="form-group col-sm-6">
                <label>Materia</label>
                <input type="text" class="form-control" id="materia" readonly>
              </div>
              <div class="form-group col-sm-6">
                <label>* Calificación:</label>
                <input type="number" step="0.1" data-validation-allowing="range[1;10],float" class="form-control" placeholder="Del 1 al 10" name="calif" id="calif" data-validation="number" data-validation-error-msg="<p style='color:red;'>Ingrese la calificación en el rango requerido</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>* Asistencia:</label>
                <input type="number" data-validation-allowing="range[1;100]" class="form-control" placeholder="Máximo 100%" name="asistencia" id="asistencia" data-validation="number" data-validation-error-msg="<p style='color:red;'>Ingrese la asistencia en el % requerido</p>">
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
    form : '#form-calificaciones_m',
    modules : 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      mod("#form-calificaciones_m","Listado de calificaciones");
      $successMsg.show();
      return false; 
    }
  });
</script>