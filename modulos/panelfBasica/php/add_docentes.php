<div class="modal fade" id="add_Docentes" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-plus"></i>&nbsp; Nuevo Docente
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
            <h3>Informacion General</h3><hr>
            <form id="form-doc" action="php/add_docentesE.php" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="form-group col-sm-4">
                <label>* Apellido Paterno:</label>
                <input type="text" class="form-control" placeholder="Apellido Paterno" name="apaterno" id="apaterno" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Apellido Paterno</p>">
              </div>
              <div class="form-group col-sm-4">
                <label>* Apellido Materno:</label>
                <input type="text" class="form-control" placeholder="Apellido Materno" name="amaterno" id="amaterno" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Apellido Materno</p>">
              </div>
              <div class="form-group col-sm-4">
                <label>* Nombre(s):</label>
                <input type="text" class="form-control" placeholder="Nombre(s)" name="nombres" id="nombres" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Nombre</p>">
              </div>
             <div class="form-group col-sm-4">
                <label>Sexo:</label>
                <select name="sexo" id="sexo" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccione sexo</p>">
                  <option selected value="M">Masculino</option>
                  <option value="F">Femenino</option>
                </select>
              </div>
              <div class="form-group col-sm-4">
                <label>* Fecha de nacimiento:</label>
                <input type="date" name="fNac"id="fNac" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese fecha de Nacimiento</p>">
              </div>
              <div class="form-group col-sm-4">
                <label>Código Postal:</label>
                <input type="number" class="form-control" placeholder="Código Postal" name="CP" id="CP">
              </div>
              <div class="form-group col-sm-6">
                <label>Calle y Número:</label>
                <input type="text" class="form-control" placeholder="Calle y Número" name="callenumero" id="callenumero">
              </div>
              <div class="form-group col-sm-6">
                <label>Colonia:</label>
                <input type="text" class="form-control" placeholder="Colonia" name="colonia" id="colonia">
              </div>
              <div class="form-group col-sm-6">
                <label>* Estado:</label>
                <select name='estado' id='estado' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona Estado" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una Estado</b>">
                </select>
              </div>
             <div class="form-group col-sm-6">
                <label>* Municipio:</label>
                <select name='municipio' id='municipio' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona Municipio" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una Municipio</b>">
                </select>
              </div>
            
              <div class="form-group col-md-12">
            <h3>Información del Docente</h3><hr>
          </div>
            <div class="form-group col-sm-6"> 
                <label>* F. Ingreso</label>
                <input type="date" name="fIng" id="fIng" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese fecha de ingreso</p>">
              </div>
             <div class="form-group col-sm-6">
                  <label>* CURP:</label>
                  <input type="text" class="form-control" placeholder="CURP" name="curp" id="curp" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese CURP</p>">
              </div>
              <div class="form-group col-sm-6">
                  <label>RFC:</label>
                  <input type="text" class="form-control" placeholder="RFC" name="rfc" id="rfc">
              </div>
              <div class="form-group col-sm-6">
                  <label>Cédula:</label>
                  <input type="text" class="form-control" placeholder="Cédula" name="cedula" id="cedula">
              </div>
              <div class="form-group col-sm-4">
                <label>Telefono:</label>
                <input type="text" class="form-control" placeholder="Telefono" name="telefono" id="telefono">
              </div>
              <div class="form-group col-sm-4">
                <label>Celular:</label>
                <input type="text" class="form-control" placeholder="Celular" name="celular" id="celular">
              </div>
             <div class="form-group col-sm-4">
                <label>* Email:</label>
                <input type="email" class="form-control" placeholder="email@dominio.com" name="email" id="email" data-validation="email" data-validation-error-msg="<p style='color:red;'>Ingrese un email correcto</p>">
              </div>
             <div class="form-group col-sm-6"> 
                <label>Academia</label>
                <input type="text" name="academia" id="academia" class="form-control">
              </div>
              <div class="form-group col-sm-6">
                <label>* Estatus:</label>
                <select name='estatus_a' id='estatus_a' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona estatus" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un estatus</b>">
                <option value="1">Activado</option>
                <option value="2">Desactivado</option>
                </select>
                 </div>
                <div class="form-group col-sm-6">
                <label>* Tipo de docente:</label>
                <select name='tipo_area' id='tipo_area' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona tipo de docente" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un tipo de docente</b>">
                </select>
                 </div>

              <div class="form-group col-sm-12"> 
                <label>Observaciones</label>
                <textarea id="observaciones" name="observaciones" class="form-control"></textarea>
              </div>
              <div class="form-group col-sm-8">
                  <label for="input" style="color:red;"><i>Los campos marcados con (*) son obligatorios.</i></label>
                  </div>
            </div>
            </div>   
            </div>
             </div>

            <div class="modal-footer">
              <button class="btn btn-primary btn-sm">
              <i class="fa fa-play-circle"></i>Registrar</button>
              <button type="reset" class="btn btn-secondary btn-sm">
              <i class="fa fa-eraser"></i></button>
              <button class="btn btn-danger btn-sm" data-dismiss="modal">
              <i class="fa fa-times"></i>Cerrar</button>
                     </form>
      </div>
    </div>
  </div>
</div>

<script>
  $successMsg = $(".alert");
  $.validate({
    form : '#form-doc',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-doc","Listado de Docentes");
      $successMsg.show();
      return false; 
    }
  });
</script>