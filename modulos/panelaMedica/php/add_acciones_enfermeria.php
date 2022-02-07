
<div class="modal fade" id="add_diagnostico" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			   <h2 class="modal-title" id="#tomar_con_enc"><i class="menu-icon fas fa-laptop-medical"></i>&nbsp; Acciones de Enfermería</h2>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="row col-12">
            <div class="form-group col-6" >
              <h5>Somatometria</h5>
              <label id="lb_talla"></label>
              <br>
              <label id="lb_peso"></label>
              <br>
              <label id="lb_imc"></label>
              <br>
            </div>
            <div class="form-group col-6" >
              <h5>Signos Vitales</h5>
              <label id="lb_pres_art"></label>
              <br>
              <label id="lb_frec_card"></label>
              <br>
              <label id="lb_frec_resp"></label>
              <br>
              <label id="lb_temp"></label>
            </div>
            </div>
            <div class="form-group col-12" style="display: none">
              <label>id_consulta</label>
              <INPUT type="text" class="form-control" name="consulta" id="consulta">
            </div>
            <div class="form-group col-12" style="display: none">
              <label>id_accion_enf</label>
              <INPUT type="text" class="form-control" name="diagnostico" id="diagnostico">  
            </div>
      		  <div class="form-group col-12">
      		    <label>Acciones de Enfermería</label>
              <div class="form-row">
                <SELECT name="acciones_enf" id="acciones_enf" class="selectpicker form-control col-10" data-live-search="true" data-live-search-normalize="true" title="Seleccione una acción" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Seleccione Acción</p>">
                </SELECT>
                <button class="btn btn-icons btn-dark" data-toggle="modal" data-target="#add_accion_select" data-whatever="@mdo"><i class="fa fa-plus"></i></button>
              </div>
      		  </div>
          </div>

          <div class="form-row">
            <div class="form-group col-6">
              <label>Medicamento</label>
              <SELECT name="ins_medicamento_accion" id="ins_medicamento_accion" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un Medicamento">
              </SELECT>
            </div>
            <div class="form-group col-2">
              <label>Cantidad</label>
              <INPUT type="text" class="form-control" id="ins_med_cantidad_accion" placeholder="Cantidad" >
            </div>
            <div class="form-group col-2">
              <label>Presentación</label>
              <INPUT type="text" class="form-control" id="ins_med_presentacion_accion" placeholder="Presentación">
            </div>
            <div class="form-group col-2">
              <br>
              <button type="button" class="btn btn-icons btn-dark" id="add_medicamento_accion"><i class="fa fa-plus"></i></button>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-6">
              <label>Material</label>
              <SELECT name="ins_material_accion" id="ins_material_accion" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un Material">
              </SELECT>
            </div>
            <div class="form-group col-2">
              <label>Cantidad</label>
              <INPUT type="text" class="form-control" id="ins_mat_cantidad_accion" placeholder="Cantidad" >
            </div>
            <div class="form-group col-2">
              <label>Presentación</label>
              <INPUT type="text" class="form-control" id="ins_mat_presentacion_accion" placeholder="Presentación">
            </div>
            <div class="form-group col-2">
              <br>
              <button type="button" class="btn btn-dark col-2" id="add_material_accion"><i class="fa fa-plus"></i></button>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-12">
              <center><h5>Material y Medicamento utilizado</h5></center>
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
                <tbody id="tbody_accion_enf">
                  
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

          <div class="form-row">
            <div class="form-group col-12">
              <label>Observaciones</label>
              <textarea class="form-control col-12" rows="3" name="ins_obj_accion" id="ins_obj_accion"></textarea>
            </div>
          </div>

         <form class="form-inline">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Incapacidad:</label>
            <select class="selectpicker custom-select form-control col-6" name="tipo_inc_accion" id="tipo_inc_accion" data-live-search="true" data-live-search-normalize="true" title="Selecciona un Sistema">
              <option selected value="0">Seleccionar</option>
              <option value="1">Interna</option>
              <option value="2">ISSSTELEON</option>
            </select>
            <input type="text" class="form-control col-3" placeholder="dias de incapcaidad" name="dias_inc_accion" id="dias_inc_accion">
         </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" id="terminar_accion_enf">Finalizar</button>
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