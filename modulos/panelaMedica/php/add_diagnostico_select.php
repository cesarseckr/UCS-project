<div class="modal fade" id="add_diagnostico_select" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			   <h2 class="modal-title"><i class="fa fa-plus"></i>&nbsp; Agregar nuevo diagnóstico</h2>
         <button type="button" class="close" id="close_diagnostico" aria-label="Close">
          <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-12">
            <label>Nombre del Diagnóstico</label>
            <INPUT type="text" class="form-control" name="nuevo_diagnostico" id="nuevo_diagnostico">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" id="agregar_diagnostico_select">Agregar</button>
          <button type="button" class="btn btn-secondary" id="cancelar_diagnostico" >Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).on('click', '#cancelar_diagnostico',function(){
    $('#add_diagnostico_select').modal('toggle'); 
  })

  $(document).on('click', '#close_diagnostico',function(){
    $('#add_diagnostico_select').modal('toggle'); 
  })
  
</script>