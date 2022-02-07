<div class="modal fade" id="modal_add_faltas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar falta disciplinaria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-md-12">
          <form id="form-addfalta" action="php/add_faltaE.php" method="post" enctype="multipart/form-data"> 
          <div class="row">
          <div class="form-group col-md-12">
              <label>* Describe la nueva falta:</label>
              <input type="text" name="falta" id="falta" class="form-control" placeholder="Descripción de la falta" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese una Descripción</p>">
          </div>
          <div class="form-group col-md-6">
              <label>* Sanción inicial:</label>
                <input name="sancion" id="sancion" class="form-control" placeholder="Sanción inicial" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese una sanción</p>">
          </div>

          <div class="form-group col-md-6">
              <label>Sanción por 1er reincidencia:</label>
                <input name="primer" id="primer" class="form-control" placeholder="Sanción">
            </div>
          <div class="form-group col-md-6">
            <label>Sanción por 2da reincidencia:</label>
            <input name="sugunda" id="sugunda" class="form-control" placeholder="Sanción">
          </div>

          <div class="form-group col-md-6">
            <label>Sanción por 3er reincidencia:</label>
           <input name="tercer" id="tercer" class="form-control" placeholder="Sanción">
          </div>

          <div class="form-group col-md-6">
            <label>* Nivel de falta:</label>
           <select name="nivel" id="nivel" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un nivel de falta" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un nivel de falta</b>">
             <option value="1">LEVE</option>
             <option value="2">GRAVE</option>
             <option value="3">MUY GRAVE</option>
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
    form : '#form-addfalta',
    modules : 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-addfalta","Listado de faltas");
      $successMsg.show();
      return false; 
    }
  });
</script>
<!-- dayModalMod -->