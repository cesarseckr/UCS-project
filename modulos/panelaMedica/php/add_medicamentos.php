<div class="modal fade" id="add-medicamento" tabindex="-1" role="dialog" aria-labelledby="add-medicamento" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Añadir Medicamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="form-med" action="php/add_medicamentosE.php" method="post" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Marca</label>
		    <input type="text" class="form-control" name="marcaMed" id="marcaMed" placeholder="Marca">
		  </div>

		  <div class="form-group">
		    <label for="exampleInputEmail1">Sustancia Activa</label>
		    <input type="text" class="form-control" name="sact-Med" id="sact-Med" placeholder="Sustancia Activa">
		  </div>

		  <div class="form-group">
		    <label for="exampleInputEmail1">Unidad de medida</label>
		    <input type="text" class="form-control" name="mgMed" id="mgMed" placeholder="Ingrese unidad de medida">
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
    form : '#form-med',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-med");
      $successMsg.show();
      return false; 
    }
  });
</script>