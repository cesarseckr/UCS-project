<div class="modal fade" id="add_referido" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			   <h2 class="modal-title"><i class="menu-icon fas fa-ambulance"></i>&nbsp; Agregar referencia</h2>
         <button type="button" class="close" id="close_referido" aria-label="Close">
          <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-12">
            <label>Nombre de la referencia</label>
            <INPUT type="text" class="form-control" name="nueva_referido" id="nueva_referido">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" id="agregar_referido_select">Agregar</button>
          <button type="button" class="btn btn-secondary" id="cancelar_referido" >Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).on('click', '#cancelar_referido',function(){
    $('#add_referido').modal('toggle'); 
  })

  $(document).on('click', '#close_referido',function(){
    $('#add_referido').modal('toggle'); 
  })
  
</script>