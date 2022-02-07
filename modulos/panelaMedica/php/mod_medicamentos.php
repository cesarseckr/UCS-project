<div class="modal fade" id="mod-medicamento" tabindex="-1" role="dialog" aria-labelledby="mod-medicamento" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Modificar Medicamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="form-mod-med" action="php/mod_medicamentosE.php" method="post" enctype="multipart/form-data">
      <div class="form-group" style ="display: none;">
        <label>idMedicamento</label>
        <input type="text" class="form-control" name="idMed-m" id="idMed-m" placeholder="Marca">
      </div>
		  <div class="form-group">
		    <label>Marca</label>
		    <input type="text" class="form-control" name="marcaMed-m" id="marcaMed-m" placeholder="Marca">
		  </div>

		  <div class="form-group">
		    <label >Sustancia Activa</label>
		    <input type="text" class="form-control" name="sact-Med-m" id="sact-Med-m" placeholder="Sustancia Activa">
		  </div>

		  <div class="form-group">
		    <label>Unidad de medida</label>
		    <input type="text" class="form-control" name="mgMed-m" id="mgMed-m" placeholder="Ingrese unidad de medida">
		  </div>

		  <div class="form-group">
		    <label>Cantidad</label>
		    <input type="text" class="form-control" name="cantidadMed-m" id="cantidadMed-m" placeholder="Cantidad de contenido">
		  </div>

		  <div class="form-group">
		    <label>Presentación</label>
		    <input type="text" class="form-control" name="presentacionMed-m" id="presentacionMed-m" placeholder="Presentación">
		  </div>
		
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-sm">Modificar medicamento</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
  $successMsg = $(".alert");
  $.validate({
    form : '#form-mod-med',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-mod-med");
      $successMsg.show();
      return false; 
    }
  });
</script>