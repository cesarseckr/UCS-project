<div class="modal fade" id="modal_mod_archivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fas fa-file-upload"></i>&nbsp; Modificar archivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-modarchivos" action="archivos/mod_archivosE.php" method="post" enctype="multipart/form-data">

           <div class="form-row">
            <div class="form-group col-md-12">
              <label>Ruta:</label>
              <input name="ruta_mod_archivos" id="ruta_mod_archivos" class="form-control">
            </div>
          </div> 

           <div class="form-row" style="display: none">
            <div class="form-group col-md-12">
              <label>ID:</label>
              <input name="id_archivo_mod_archivos" id="id_archivo_mod_archivos" class="form-control">
            </div>
          </div> 

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Titulo*:</label>
              <input name="titulo_mod_archivos" id="titulo_mod_archivos" class="form-control" data-validation="required" data-validation-error-msg="<b style = 'color:red;'> Inserte un Titulo </b>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Archivo*:</label>
              <br>
              <input type="file" name="arch_mod_archivos" id="arch_mod_archivos"> 
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="todos_mod_archivos" id="todos_mod_archivos">
              <label class="custom-control-label" for="todos_mod_archivos">Todos</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="alumnos_mod_archivos" id="alumnos_mod_archivos">
              <label class="custom-control-label" for="alumnos_mod_archivos">Alumnos</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="docentes_mod_archivos" id="docentes_mod_archivos">
              <label class="custom-control-label" for="docentes_mod_archivos">Docentes</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="1_mod_archivos" id="1_mod_archivos">
              <label class="custom-control-label" for="1_mod_archivos">Control Escolar</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="2_mod_archivos" id="2_mod_archivos">
              <label class="custom-control-label" for="2_mod_archivos">Formación básica</label>
            </div>
          </div>
          
          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="3_mod_archivos" id="3_mod_archivos">
              <label class="custom-control-label" for="3_mod_archivos">Médica</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="4_mod_archivos" id="4_mod_archivos">
              <label class="custom-control-label" for="4_mod_archivos">Especialización</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="5_mod_archivos" id="5_mod_archivos">
              <label class="custom-control-label" for="5_mod_archivos">Control Interno</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="6_mod_archivos" id="6_mod_archivos">
              <label class="custom-control-label" for="6_mod_archivos">Comunicación e imagen institucional</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="7_mod_archivos" id="7_mod_archivos">
              <label class="custom-control-label" for="7_mod_archivos">Comandancia y disciplina</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="9_mod_archivos" id="9_mod_archivos">
              <label class="custom-control-label" for="9_mod_archivos">Sistemas</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="10_mod_archivos" id="10_mod_archivos">
              <label class="custom-control-label" for="10_mod_archivos">Dirección de profesionalización</label>
            </div>
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="99_mod_archivos" id="99_mod_archivos">
              <label class="custom-control-label" for="99_mod_archivos">Administracion General</label>
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
    form : '#form-modarchivos',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-modarchivos");
      $successMsg.show();
      return false; 
    }
  });
</script>
<!-- dayModalMod -->