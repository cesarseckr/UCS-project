<div class="modal fade" id="avanzar_alumnos" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-sign-out-alt"></i>&nbsp; Avanzar alumnos a otro grupo
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-row">
            <div class="form-group col-md-12">
             <form id="form-avanzar_alumnos" action="php/add_avanzar_alumnosE.php" method="post" enctype="multipart/form-data">
             <div class="row">
            <div class="form-group col-sm-4" style="display:none;">
            <input type="text" class="form-control" name="id_grupo_av" id="id_grupo_av">
            </div>
               <div class="form-group col-sm-6">
                <label>Grupo actual:</label>
                <input type="text" class="form-control" name="grupo_av" id="grupo_av" readonly>
              </div>
              <div class="form-group col-sm-6">
                <label>Módulo actual:</label>
                <input type="text" class="form-control" name="curso_av" id="curso_av" readonly>
              </div>
              <div class="form-group col-sm-12">
                <label>Carrera actual:</label>
                <input type="text" class="form-control" name="carrera_av" id="carrera_av" readonly>
              </div>
              <div class="form-group col-sm-12">
              Avanzar alumnos<hr>
              </div>
              <div class="form-group col-sm-12" id="alumnos_avanzar"></div>
              <div class="form-group col-sm-12">
                <hr>
              </div>
              <div class="form-group col-sm-6">
                <label>* Nueva carrera:</label>
                <select name='carrera_f' id='carrera' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona carrera" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una carrera</b>">
                </select>
                 </div>
                <div class="form-group col-sm-6">
                <label>* Nuevo módulo:</label>
                <select name='curso_d' id='curso_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un Módulo" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un módulo</b>">
                </select>
                 </div>
                 <div class="form-group col-sm-12">
                <label>* Nuevo grupo:</label>
                <select name='grupo_d' id='grupo_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Todos los grupos" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un grupo</b>">
                </select>
                 </div>
              <div class="form-group col-sm-8"><br>
              <label for="input" style="color:red;"><i>Los campos marcados con (*) son obligatorios.</i></label>
              </div>
            </div>
            </div>   
            </div>
             </div>

            <div class="modal-footer">
              <button class="btn btn-primary btn-sm">
              <i class="fa fa-play-circle"></i>Asignar</button>
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
    form : '#form-avanzar_alumnos',
    modules : 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-avanzar_alumnos","Listado de grupos");
      $successMsg.show();
      return false; 
    }
  });
</script>