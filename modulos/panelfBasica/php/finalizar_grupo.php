<div class="modal fade" id="finalizar_grupo" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-sign-out-alt"></i>&nbsp; Finalizar grupo
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-row">
            <div class="form-group col-md-12">
             <form id="form-finalizar_grupo" action="php/add_finalizar_grupoE.php" method="post" enctype="multipart/form-data">
             <div class="row">
            <div class="form-group col-sm-4" style="display:none;">
            <input type="text" class="form-control" name="id_grupo_fin" id="id_grupo_fin">
            </div>
               <div class="form-group col-sm-6">
                <label>Grupo actual:</label>
                <input type="text" class="form-control" name="grupo_fin" id="grupo_fin" readonly>
              </div>
              <div class="form-group col-sm-6">
                <label>Módulo actual:</label>
                <input type="text" class="form-control" name="curso_fin" id="curso_fin" readonly>
              </div>
              <div class="form-group col-sm-12">
                <label>Carrera actual:</label>
                <input type="text" class="form-control" name="carrera_fin" id="carrera_fin" readonly>
              </div>
              <div class="form-group col-sm-12">
              Seleccionar alumnos<hr>
              </div>
              <div class="form-group col-sm-12" id="alumnos_finalizar"></div>
              <div class="form-group col-sm-8"><br>
              <label for="input" style="color:red;"><i>Los campos marcados con (*) son obligatorios.</i></label>
              </div>
            </div>
            </div>   
            </div>
             </div>

            <div class="modal-footer">
              <button class="btn btn-primary btn-sm">
              <i class="fa fa-play-circle"></i>Finalizar</button>
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
    form : '#form-finalizar_grupo',
    modules : 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-finalizar_grupo","Listado de grupos");
      $successMsg.show();
      return false; 
    }
  });
</script>