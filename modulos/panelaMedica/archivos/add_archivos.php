<div class="modal fade" id="modal_subir_archivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fas fa-file-upload"></i>&nbsp; Subir nuevo archivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-addarchivos" action="archivos/add_archivosE.php" method="post" enctype="multipart/form-data"> 

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Titulo*:</label>
              <input name="titulo_add_archivos" id="titulo_add_archivos" class="form-control" data-validation="required" data-validation-error-msg="<b style = 'color:red;'> Inserte un Titulo </b>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Archivo*:</label>
              <br>
              <input type="file" name="arch_add_archivos" id="arch_add_archivos"> 
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="todos_add_archivos" id="todos_add_archivos">
              <label class="custom-control-label" for="todos_add_archivos">Todos</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="alumnos_add_archivos" id="alumnos_add_archivos">
              <label class="custom-control-label" for="alumnos_add_archivos">Alumnos</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="docentes_add_archivos" id="docentes_add_archivos">
              <label class="custom-control-label" for="docentes_add_archivos">Docentes</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="1_add_archivos" id="1_add_archivos">
              <label class="custom-control-label" for="1_add_archivos">Control Escolar</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="2_add_archivos" id="2_add_archivos">
              <label class="custom-control-label" for="2_add_archivos">Formación básica</label>
            </div>
          </div>
          
          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="3_add_archivos" id="3_add_archivos">
              <label class="custom-control-label" for="3_add_archivos">Médica</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="4_add_archivos" id="4_add_archivos">
              <label class="custom-control-label" for="4_add_archivos">Especialización</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="5_add_archivos" id="5_add_archivos">
              <label class="custom-control-label" for="5_add_archivos">Control Interno</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="6_add_archivos" id="6_add_archivos">
              <label class="custom-control-label" for="6_add_archivos">Comunicación e imagen institucional</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="7_add_archivos" id="7_add_archivos">
              <label class="custom-control-label" for="7_add_archivos">Comandancia y disciplina</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="9_add_archivos" id="9_add_archivos">
              <label class="custom-control-label" for="9_add_archivos">Sistema</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="10_add_archivos" id="10_add_archivos">
              <label class="custom-control-label" for="10_add_archivos">Dirección de profesionalización</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="99_add_archivos" id="99_add_archivos">
              <label class="custom-control-label" for="99_add_archivos">Administracion General</label>
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-primary btn-sm">
              <i class="fas fa-save"></i>
              Guardar
            </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $successMsg = $(".alert");
  $.validate({
    form : '#form-addarchivos',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-addarchivos");
      $successMsg.show();
      return false; 
    }
  });
</script>
<!-- dayModalMod -->