
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
              <label>id_diagnostico</label>
              <INPUT type="text" class="form-control col-9" name="diagnostico" id="diagnostico">  
            </div>
      		  <div class="form-group col-6">
      		    <label>Diagnóstico</label>
              <div class="form-row">
                <SELECT name="ins_diagnostico" id="ins_diagnostico" class="selectpicker form-control col-10" data-live-search="true" data-live-search-normalize="true" title="Seleccione Diagnóstico" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese su Diagnóstico</p>"></SELECT>
                <button class="btn btn-icons btn-dark" data-toggle="modal" data-target="#add_diagnostico_select" data-whatever="@mdo"><i class="fa fa-plus"></i></button>
              </div>
      		  </div>
      		  <div class="form-group col-6">
              <label>Sistema</label>
              <div class="form-row">
                <SELECT name="ins_sistema" id="ins_sistema" class="selectpicker form-control col-10" data-live-search="true" data-live-search-normalize="true" title="Selecciona un Sistema" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese su Diagnóstico</p>"></SELECT>
                <button class="btn btn-icons btn-dark" data-toggle="modal" data-target="#add_sistema_select" data-whatever="@mdo"><i class="fa fa-plus"></i></button>
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-4">
              <label>Medicamento</label>
              <SELECT name="ins_medicamento" id="ins_medicamento" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un Medicamento">
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
              <button type="button" class="btn btn-icons btn-dark" id="add_medicamento"><i class="fa fa-plus"></i></button>
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
              <label>Observaciones</label>
              <textarea class="col-12" rows="3" name="ins_obj" id="ins_obj"></textarea>
            </div>
          </div>

         <form class="form-inline">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Incapacidad:</label>
            <select class="selectpicker custom-select form-control col-6" name="tipo_inc" id="tipo_inc" data-live-search="true" data-live-search-normalize="true" title="Selecciona un Sistema">
              <option selected value="0">Seleccionar</option>
              <option value="1">Interna</option>
              <option value="2">ISSSTELEON</option>
            </select>
            <input type="text" class="form-control col-3" placeholder="dias de incapcaidad" name="dias_inc" id="dias_inc">
         </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary"  id="cancelar_registro_proyectos">Registrar</button>
          <button class="btn btn-primary" id="terminar_consulta">Terminar Consulta</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
 
    </div>
  </div>
  <?php 
    include("php/add_diagnostico_select.php");
    include("php/add_sistema_select.php");
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