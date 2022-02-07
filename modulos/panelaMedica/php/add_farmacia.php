
<div class="modal fade" id="add_farmacia" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			   <h2 class="modal-title" id="#tomar_con_enc"><i class="menu-icon fas fa-first-aid"></i>&nbsp; Farmacia</h2>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-12" style="display: none">
              <label>id_consulta</label>
              <INPUT type="text" class="form-control" name="id_consulta_farm" id="id_consulta_farm">
            </div>
            <div class="form-group col-12">
              <label>Observaciones</label>
              <textarea class="col-12" rows="3" name="obs_farm" id="obs_farm" disabled></textarea>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-6">
              <label>Material</label>
              <SELECT name="ins_material_farm" id="ins_material_farm" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un Material">
              </SELECT>
            </div>
            <div class="form-group col-2">
              <label>Cantidad</label>
              <INPUT type="text" class="form-control" id="ins_mat_cantidad_farm" placeholder="Cantidad" >
            </div>
            <div class="form-group col-2">
              <label>Presentación</label>
              <INPUT type="text" class="form-control" id="ins_mat_presentacion_farm" placeholder="Presentación">
            </div>
            <div class="form-group col-2">
              <br>
              <button type="button" class="btn btn-dark col-2" id="add_material_farm"><i class="fa fa-plus"></i></button>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-12">
              <center><h5>Materiales</h5></center>
            </div>
            <div id="tablaMedicamento" class="table-responsive" style="padding-bottom: 15px;">
              <table id="tabla-med-1" class="table table-bordered" cellspacing="0" width="100%">  
                <thead>
                  <tr>
                    <th class="noExport"></th>
                    <th>Material</th>
                    <th>Cantidad</th>
                  </tr>
                </thead>
                <tbody id="tbody_farmacia">
                  
                </tbody>
                <tfoot>
                  <tr>
                    <th class="noExport"></th>
                    <th>Material</th>
                    <th>Cantidad</th>
                  </tr>
                </tfoot>  
              </table>    
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" id="terminar_farm">Finalizar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
 
    </div>
  </div>
  <?php 
    include("php/add_accion_select.php");
  ?>
</div>

<script>
  $successMsg = $(".alert");
  $.validate({
    form : '#add_diagnostico',
    errorMessageClass: "error",
    onSuccess: function(){
      add_diagnostico(); 
      $successMsg.show();
      return false; 
    }
  });
</script>