<div class="modal fade" id="modal_historial_disc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-history"></i>&nbsp; Historial Disciplinario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="form-row">
        <div class="form-group col-md-12">
                    <div class="row">
            <div class="form-group col-md-12" style="display: none">
              <label>ID Alumno:</label>
              <input name="id_alumno_falta_perm" id="id_alumno_falta_perm" class="form-control">
            </div>
            <div class="form-group col-md-12">
              <label>Nombre:</label>
              <input name="nombre_falta_perm" id="nombre_falta_perm" class="form-control" disabled="">
            </div>
            <div class="form-group col-md-6">
              <label>Matricula:</label>
              <input name="matricula_falta_perm" id="matricula_falta_perm" class="form-control" disabled="">
            </div>
            <div class="form-group col-md-6">
              <label>CURP:</label>
              <input name="curp_falta_perm" id="curp_falta_perm" class="form-control" disabled="">
            </div>
          
          <div id="tabla_faltas_alumno" class="table-responsive" style="padding-bottom: 15px;">
            <table id="tabla-faltas-1" class="table table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Faltas</th>
                  <th>Reincidencias</th>
                  <th>Sanciones</th>
                  <th>Observaciones</th>
                </tr>
              </thead>
              <tbody id="tbody_permiso_falta">      
              </tbody>
            </table>
          </div> 
           </div> 
            </div> 
             </div> 
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
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
      add("#form-modfalta");
      $successMsg.show();
      return false; 
    }
  });
</script>
<!-- dayModalMod -->