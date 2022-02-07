<div class="modal fade" id="add_diagnostico" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			   <h2 class="modal-title" id="#tomar_con_enc"><i class="fa fa-plus"></i>&nbsp; Consultas</h2>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-12" style="display: none;">
              <label>id_consulta</label>
              <INPUT type="text" class="form-control" name="consulta" id="consulta">
            </div>
            <div class="form-group col-12" style="display: none;">
              <label>id_diagnostico</label>
              <INPUT type="text" class="form-control" name="diagnostico" id="diagnostico">
            </div>
      		  <div class="form-group col-6">
      		    <label>Diagnóstico</label>
      		    <INPUT type="text" class="form-control" name="nombre" id="ins_diagnostico" placeholder="Diagnostico" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese su Diagnóstico</p>">
      		  </div>
      		  <div class="form-group col-6">
              <label>Sistema</label>
              <INPUT type="text" class="form-control" name="sistema" id="ins_sistema" placeholder="Sistema" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese Sistema</p>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-4">
              <label>Medicamento</label>
              <SELECT type="text" class="form-control" id="ins_medicamento">
              </SELECT>
            </div>
            <div class="form-group col-2">
              <label>Cantidad</label>
              <INPUT type="text" class="form-control" id="ins_med_cantidad" placeholder="Cantidad" >
            </div>
            <div class="form-group col-2">
              <label>Presentación</label>
              <INPUT type="text" class="form-control" id="ins_med_presentacion" placeholder="Presentación">
            </div>
            <div class="form-group col-2">
              <label>Tiempo</label>
              <INPUT type="text" class="form-control" id="ins_med_tiempo" placeholder="Tiempo">
            </div>
            <div class="form-group col-2">
              <br>
              <button type="button" class="btn btn-dark col-2" id="add_medicamento"><i class="fa fa-plus"></i></button>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-4">
              <label>Material</label>
              <SELECT type="text" class="form-control" id="ins_material">
              </SELECT>
            </div>
            <div class="form-group col-2">
              <label>Cantidad</label>
              <INPUT type="text" class="form-control" id="ins_mat_cantidad" placeholder="Cantidad" >
            </div>
            <div class="form-group col-2">
              <label>Presentación</label>
              <INPUT type="text" class="form-control" id="ins_mat_presentacion" placeholder="Presentación">
            </div>
            <div class="form-group col-2">
            </div>
            <div class="form-group col-2">
              <br>
              <button type="button" class="btn btn-dark col-2" id="add_material"><i class="fa fa-plus"></i></button>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-12">
              <center><h5>Medicamentos</h5></center>
            </div>
            <div id="tablaMedicamento" class="table-responsive" style="padding-bottom: 15px;">
              <table id="tabla-med-1" class="table table-bordered" cellspacing="0" width="100%">  
                <thead>
                  <tr>
                    <th class="noExport"></th>
                    <th>Medicamento</th>
                    <th>Cantidad</th>
                    <th>Tiempo</th>
                  </tr>
                </thead>
                <tbody id="tbody_med">
                  
                </tbody>
                <tfoot>
                  <tr>
                    <th class="noExport"></th>
                    <th>Medicamento</th>
                    <th>Cantidad</th>
                    <th>Tiempo</th>
                  </tr>
                </tfoot>  
              </table>    
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-12">
              <center><h5>Materiales</h5></center>
            </div>
            <div id="tablaMaterial" class="table-responsive" style="padding-bottom: 15px;">
              <table id="tabla-mat-1" class="table table-bordered" cellspacing="0" width="100%">  
                <thead>
                  <tr>
                    <th class="noExport"></th>
                    <th>Medicamento</th>
                    <th>Cantidad</th>
                  </tr>
                </thead>
                <tbody id="tbody_mat">
                  
                </tbody>
                <tfoot>
                  <tr>
                    <th class="noExport"></th>
                    <th>Medicamento</th>
                    <th>Cantidad</th>
                  </tr>
                </tfoot>  
              </table>    
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-12">
              <label>Observaciones</label>
              <textarea class="col-12" rows="3" name="observaciones" id="ins_obj"></textarea>
            </div>
          </div>

           <form class="form-inline">
              <label class="my-1 mr-2" for="inlineFormCustomSelectPref">*Incapacidad:</label>
              <select class="custom-select my-1 mr-sm-2 col-4" name="tipo" id="tipo_inc">
                <option selected value="0">Seleccionar</option>
                <option value="1">Interna</option>
                <option value="2">ISSSTELEON</option>
              </select>
              <input type="text" class="form-control col-3" placeholder="dias de incapcaidad" name="tiempo" id="dias_inc">
           </form>

          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="gridCheck" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                Traslado
              </label>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" id="terminar_consulta">Terminar Consulta</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
 
    </div>
  </div>
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