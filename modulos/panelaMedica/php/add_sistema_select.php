<div class="modal fade" id="add_sistema_select" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			   <h2 class="modal-title"><i class="fa fa-plus"></i>&nbsp; Agregar nuevo sistema</h2>
         <button type="button" class="close" id="close_sistema" aria-label="Close">
          <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-12">
            <label>Nombre del Sistema</label>
            <INPUT type="text" class="form-control" name="nuevo_sistema" id="nuevo_sistema">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" id="agregar_sistema_select">Agregar</button>
          <button type="button" class="btn btn-secondary" id="cancelar_sistema">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).on('click', '#cancelar_sistema',function(){
    $('#add_sistema_select').modal('toggle'); 
  })

  $(document).on('click', '#close_sistema',function(){
    $('#add_sistema_select').modal('toggle'); 
  })
  
</script>