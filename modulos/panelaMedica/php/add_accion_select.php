<div class="modal fade" id="add_accion_select" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			   <h2 class="modal-title"><i class="fa fa-plus"></i>&nbsp; Agregar nueva acción de Enfermería</h2>
         <button type="button" class="close" id="close_accion" aria-label="Close">
          <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-12">
            <label>Nombre del Acción</label>
            <INPUT type="text" class="form-control" name="nueva_accion" id="nueva_accion">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" id="agregar_accion_select">Agregar</button>
          <button type="button" class="btn btn-secondary" id="cancelar_accion" >Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).on('click', '#cancelar_accion',function(){
    $('#add_accion_select').modal('toggle'); 
  })

  $(document).on('click', '#close_accion',function(){
    $('#add_accion_select').modal('toggle'); 
  })
  
</script>