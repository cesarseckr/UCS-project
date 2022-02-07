<div class="modal fade" id="tomar_consultas" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			   <h2 class="modal-title" id="#tomar_con_enc"><i class="fa fa-plus"></i>&nbsp; Consulta</h2>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-12" style="display: none">
            <label>id_consulta</label>
            <INPUT type="text" class="form-control" id="ins_consulta" placeholder="Consulta">
          </div>
    		  <div class="form-group col-6">
    		    <label>Diagnóstico</label>
    		    <INPUT type="text" class="form-control" id="ins_diagnostico" placeholder="Diagnostico" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese su Diagnóstico</p>">
    		  </div>
    		  <div class="form-group col-6">
            <label>Sistema</label>
            <INPUT type="text" class="form-control" id="ins_sistema" placeholder="Sistema" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese Sistema</p>">
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
          <div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
            <script>
              $(document).ready(function() {
                tabla("Listado de consultas");
              });
            </script>
            <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">  
              <thead>
                <tr>
                  <th class="noExport"></th>
                  <th>Medicamento</th>
                  <th>Cantidad</th>
                  <th>Tiempo</th>
                </tr>
              </thead>
              <tbody>
                <? 
                  $sql="SELECT * FROM tratamientos where tipo_contenido=1";
                  $sq= $db->query($sql);
                  $rows=$sq->fetchAll();
                  foreach ($rows as $row) {
                    $id_tratamiento=$row["id_tratamiento"];
                    $eliminar_med='<button type="button" class="btn btn-danger" id="#del_med">Eliminar</button>';
                    $medicamento=$row["mat_med"];
                    $cantidad=$row["cantidad"]." ".$row["presentacion"];
                    $tiempo=$row["tiempo"];
                    echo"
                      <tr>
                        <td>".$eliminar_med."</th>
                        <td>".$medicamento."</th>
                        <td>".$cantidad."</th>
                        <td>".$tiempo."</th>
                      </tr>
                    ";
                  }
                ?>
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
          <div id="tabla2" class="table-responsive" style="padding-bottom: 15px;">
            <script>
              $(document).ready(function() {
                tabla("Listado de consultas");
              });
            </script>
            <table id="tabla-2" class="table table-bordered" cellspacing="0" width="100%">  
              <thead>
                <tr>
                  <th class="noExport"></th>
                  <th>Medicamento</th>
                  <th>Cantidad</th>
                </tr>
              </thead>
              <tbody>
                <? 
                  $sql="SELECT * FROM tratamientos where tipo_contenido=2";
                  $sq= $db->query($sql);
                  $rows=$sq->fetchAll();
                  foreach ($rows as $row) {
                    $id_tratamiento=$row["id_tratamiento"];
                    $eliminar_med='<button type="button" class="btn btn-danger" id="#del_med">Eliminar</button>';
                    $medicamento=$row["mat_med"];
                    $cantidad=$row["cantidad"]." ".$row["presentacion"];
                    echo"
                      <tr>
                        <td>".$eliminar_med."</th>
                        <td>".$medicamento."</th>
                        <td>".$cantidad."</th>
                      </tr>
                    ";
                  }
                ?>
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
            <textarea class="col-12" rows="3" id="ins_obj"></textarea>
          </div>
        </div>

       <form class="form-inline">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">*Incapacidad:</label>
          <select class="custom-select my-1 mr-sm-2 col-4" id="tipo_inc">
            <option selected value="0">Seleccionar</option>
            <option value="1">Interna</option>
            <option value="2">ISSSTETLON</option>
          </select>
          <input type="text" class="form-control col-3" placeholder="dias de incapcaidad" id="dias_inc">
        </form>

        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Traslado
            </label>
          </div>
        </div>



      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" id="add_cita">Registrar Cita</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>  
    </div>
  </div>
</div>
<script>
         $successMsg = $(".alert");
                $.validate({
                  form : '#tomar_consultas',
              errorMessageClass: "error",
              onSuccess: function(){
             tomar_consultas(); 
          $successMsg.show();
              return false; 
                }
              });
</script>