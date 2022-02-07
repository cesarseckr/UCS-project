<div class="modal fade" id="mod-material" tabindex="-1" role="dialog" aria-labelledby="mod-material" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Modificar materiales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="form-mod-mat" action="php/mod_materialesE.php" method="post" enctype="multipart/form-data">
      <div class="form-group" style="display: none;" >
        <label>idmaterial</label>
        <input type="text" class="form-control" name="idmat-m" id="idmat-m" placeholder="Marca">
      </div>
		  <div class="form-group">
		    <label>Marca</label>
		    <input type="text" class="form-control" name="marcamat-m" id="marcamat-m" placeholder="Marca">
		  </div>

		  <div class="form-group">
		    <label >Material</label>
		    <input type="text" class="form-control" name="mat-mat-m" id="mat-mat-m" placeholder="Sustancia Activa">
		  </div>

		  <div class="form-group">
		    <label>Cantidad</label>
		    <input type="text" class="form-control" name="cantidadmat-m" id="cantidadmat-m" placeholder="Cantidad de contenido">
		  </div>

		  <div class="form-group">
		    <label>Presentación</label>
		    <input type="text" class="form-control" name="presentacionmat-m" id="presentacionmat-m" placeholder="Presentación">
		  </div>
		
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-sm">Modificar material</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
  $successMsg = $(".alert");
  $.validate({
    form : '#form-mod-mat',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-mod-mat");
      $successMsg.show();
      return false; 
    }
  });
</script>