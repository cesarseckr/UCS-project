<div class="modal fade" id="add_traslados" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h5 class="modal-title"><i class="menu-icon fas fa-ambulance"></i>&nbsp; Nuevo Traslado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Tipo</label>
          <SELECT type="text" class="form-control" name="TipoUsuario_tras" id="TipoUsuario_tras" placeholder="Tipo de Paciente" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Selecciona un tipo de paciente</p>">
          </SELECT>
        </div>
        
        <div id="seccion_alumno_tras">
          <div class="form-row">
            <div class="form-group col-4">
              <label>Plan de estudios</label>
              <select name='plan_tras' id='plan_tras' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un plan de estudios" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccione un plan de estudios</p>"></select>
            </div>
             <div class="form-group col-4" >
              <label>Modalidad</label>
              <select name='academia_d_tras' id='academia_d_tras' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona modalidad" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccione una modalidad</p>"></select>
            </div>
            <div class="form-group col-4">
              <label>Escalón o Generación</label>
              <select name='generacion_d_tras' id='generacion_d_tras' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona una generación" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccione una generación</p>"></select>
            </div>
            <div class="form-group col-12">
              <label>Nombre</label>
              <select name='nombre_alum_tras' id='nombre_alum_tras' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un Alumno" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccione un Alumno</p>"></select>
            </div>
          </div>
        </div>

        <div class="form-group" id="NombreUsuario-div_tras">
          <label>Nombre de paciente</label>
          <SELECT name="NombreUsuario_tras" id="NombreUsuario_tras" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un paciente" data-validation="required" data-validation-error-msg="<p style='color:red;'>Selecciona un paciente</p>">
          </SELECT>
          <br>
          <br>
        </div>

        <div class="form-group col-12">
          <label>Referido</label>
          <div class="form-row">
            <SELECT name="referido_tras" id="referido_tras" class="selectpicker form-control col-11" data-live-search="true" data-live-search-normalize="true" title="Seleccionar" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Seleccionar</p>">
            </SELECT>
            <button class="btn btn-icons btn-dark" data-toggle="modal" data-target="#add_referido" data-whatever="@mdo"><i class="fa fa-plus"></i></button>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-12">
            <label>Razón</label>
            <textarea class="form-control col-12" rows="4" name="razon_tras" id="razon_tras"></textarea>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-12">
            <label>Fecha</label>
            <input type="date" class="form-control col-12" rows="4" name="fecha_tras" id="fecha_tras"></input>
          </div>
        </div>
      
        <div class="modal-footer">
          <button type="button" id="registrar_traslado" class="btn btn-dark btn-sm">
            <i class="fa fa-play-circle"></i>Registrar
          </button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
  include("php/add_referido.php");
?>
<script>
  $successMsg = $(".alert");
  $.validate({
    form : '#form-consulta',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-consulta");
      $successMsg.show();
      return false; 
    }
  });
</script>