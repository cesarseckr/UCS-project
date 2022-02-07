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
            <div class="form-group col-md-12" style="display: none">
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
            <div class="form-group col-md-6">
              <label>Titulo*:</label>
              <input name="titulo_mod_archivos" id="titulo_mod_archivos" class="form-control" data-validation="required" data-validation-error-msg="<b style = 'color:red;'> Inserte un Titulo </b>">
            </div>
            <div class="form-group col-sm-6">
                <label>* Categoria:</label>
                <select name='categoria_archivo_m' id='categoria_archivo_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un módulo" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una categoria</b>">
                <option value="1">Reglamentación</option>
                <option value="2">Curriculares</option>
                <option value="4">Políticas y formatos</option>
                <option value="3">Otros</option>
                </select>
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
              <input class="check" type="checkbox" name="todos_mod_archivos" id="todos_mod_archivos">
              <label for="todos_mod_archivos" class="check"></label> 
            </div>&nbsp; Todos
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox"class="check" name="alumnos_mod_archivos" id="alumnos_mod_archivos">
              <label for="alumnos_mod_archivos" class="check"></label>
            </div>&nbsp; Alumnos
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="check" name="docentes_mod_archivos" id="docentes_mod_archivos">
              <label for="docentes_mod_archivos" class="check"></label>
            </div>&nbsp; Docentes
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="check" name="1_mod_archivos" id="1_mod_archivos">
              <label for="1_mod_archivos" class="check"></label>
            </div>&nbsp; Control Escolar
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="check" name="2_mod_archivos" id="2_mod_archivos">
              <label for="2_mod_archivos" class="check"></label>
            </div>&nbsp; Formación básica
          </div>
          
          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="check" name="3_mod_archivos" id="3_mod_archivos">
              <label for="3_mod_archivos" class="check"></label>
            </div>&nbsp; Médica
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="check" name="4_mod_archivos" id="4_mod_archivos">
              <label for="4_mod_archivos" class="check"></label>
            </div>&nbsp; Especialización
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="check" name="5_mod_archivos" id="5_mod_archivos">
              <label for="5_mod_archivos" class="check"></label>
            </div>&nbsp; Control Interno
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="check" name="6_mod_archivos" id="6_mod_archivos">
              <label for="6_mod_archivos" class="check"></label>
            </div>&nbsp; Comunicación e imagen institucional
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="check" name="7_mod_archivos" id="7_mod_archivos">
              <label for="7_mod_archivos" class="check"></label>
            </div>&nbsp; Comandancia y disciplina
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="check" name="9_mod_archivos" id="9_mod_archivos">
              <label for="9_mod_archivos" class="check"></label>
            </div>&nbsp; Sistema
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="check" name="10_mod_archivos" id="10_mod_archivos">
              <label for="10_mod_archivos" class="check"></label>
            </div>&nbsp; Dirección de profesionalización
          </div>

          <div class="form-row">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="check" name="99_mod_archivos" id="99_mod_archivos">
              <label for="99_mod_archivos" class="check"></label>
            </div>&nbsp; Administración General
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