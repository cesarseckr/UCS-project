<div class="modal fade" id="modal_historial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-user-times"></i>&nbsp; Modificar faltas disciplinaria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      <div class="form-row">
      <div class="form-group col-md-12">
        <div class="form-group col-md-12" style="display:none;">
              <label>ID Alumno:</label>
        <input name="id_alumno" id="id_alumno" class="form-control">            </div>
        <div class="row">
        <div class="form-group col-md-12">
              <label>Nombre:</label>
              <input name="nombre" id="nombre" class="form-control" disabled="">
        </div>
        <div class="form-group col-md-6">
              <label>Matricula:</label>
              <input name="matricula" id="matricula" class="form-control" disabled="">
            </div>
          <div class="form-group col-md-6">
              <label>CURP:</label>
              <input name="curp" id="curp" class="form-control" disabled="">
            </div>
          <div class="form-group col-md-12">         
              <label>* Agregar falta disciplinaria:</label>
              <select name="load_falta" id="load_falta" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona una falta disciplinaria" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una falta</b>"></select>
            </div>
            <div class="form-group col-md-12">         
              <label>* Fecha:</label>
              <input type="date" name="fecha" id="fecha" class="form-control" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una fecha</b>">
            </div>
            <div class="form-group col-md-12">
              <label>Observaciones:</label>
              <TEXTAREA name="observaciones" id="observaciones" class="form-control"></TEXTAREA>
            </div>
            <div class="form-group col-md-2">
              <button type="button" class="btn btn-dark" id="add_alumno_fdisc"><i class="fa fa-plus"></i> Añadir Falta </button>
            </div>
          
          <div id="tabla_faltas_alumno" class="table-responsive" style="padding: 15px;">
            <table id="tabla-faltas-1" class="table table-bordered">
              <thead>
                <tr>
                  <th class="noExport">Eliminar</th>
                  <th>Carta compromiso</th>
                  <th>Fecha</th>
                  <th>Faltas</th>
                  <th>Reincidencias</th>
                  <th>Sanciones</th>
                  <th>Observaciones</th>
                </tr>
              </thead>
              <tbody id="tbody_alumno_falta">
              </tbody>
            </table>
          </div> 
          </div> 
          </div> 
          </div> 
          <div class="modal-footer">
            <button class="btn btn-danger btn-sm" data-dismiss="modal">
              <i class="fa fa-times"></i>Cerrar</button>
          </div>
      </div>
    </div>
  </div>
</div>
<script>
  $successMsg = $(".alert");
  $.validate({
    form : '#form-modfalta',
    errorMessageClass: "error",
    onSuccess: function(){
      mod("#form-modfalta","Listado de faltas");
      $successMsg.show();
      return false; 
    }
  });
</script>
<!-- dayModalMod -->