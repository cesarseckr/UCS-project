<div class="modal fade" id="add-materiales" tabindex="-1" role="dialog" aria-labelledby="add-materiales" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Añadir Materiales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="form-mat" action="php/add_materialesE.php" method="post" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Marca</label>
		    <input type="text" class="form-control" name="marcaMed" id="marcaMed" placeholder="Marca">
		  </div>

		  <div class="form-group">
		    <label for="exampleInputEmail1">Material</label>
		    <input type="text" class="form-control" name="material" id="material" placeholder="Material">
		  </div>

		  <div class="form-group">
		    <label for="exampleInputEmail1">Cantidad</label>
		    <input type="text" class="form-control" name="cantidadMed" id="cantidadMed" placeholder="Cantidad de contenido">
		  </div>

		  <div class="form-group">
		    <label for="exampleInputEmail1">Presentación</label>
		    <input type="text" class="form-control" name="presentacionMed" id="presentacionMed" placeholder="Presentación">
		  </div>
		
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-sm">Registrar medicamento</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
  $successMsg = $(".alert");
  $.validate({
    form : '#form-mat',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-mat");
      $successMsg.show();
      return false; 
    }
  });
</script>