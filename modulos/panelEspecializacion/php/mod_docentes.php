<div class="modal fade" id="mod_docentes" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-edit"></i>&nbsp; Modificar datos del Docente
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-row">
            <div class="form-group col-md-12">
            <h3>Informacion General</h3><hr>
             <form id="form-doc_m" action="php/mod_docentesE.php" method="post" enctype="multipart/form-data">
             <div class="row">
             <div class="form-group col-sm-4" style="display:none;">
                <label>ID inistrativo:</label>
                <input type="text" class="form-control" placeholder="ID" name="id_m" id="id_m"data-validation-error-msg="<p style='color:red;'>Ingrese Apellido Paterno</p>">
              </div>
              <div class="form-group col-sm-4">
                <label>Apellido Paterno:</label>
                <input type="text" class="form-control" placeholder="Apellido Paterno" name="apaterno_m" id="apaterno_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Apellido Paterno</p>">
              </div>
              <div class="form-group col-sm-4">
                <label>Apellido Materno:</label>
                <input type="text" class="form-control" placeholder="Apellido Materno" name="amaterno_m" id="amaterno_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Apellido Materno</p>">
              </div>
              <div class="form-group col-sm-4">
                <label>Nombre(s):</label>
                <input type="text" class="form-control" placeholder="Nombre(s)" name="nombres_m" id="nombres_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese Nombre</p>">
              </div>
             <div class="form-group col-sm-4">
                <label>Sexo:</label>
                <select name="sexo_m" id="sexo_m" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:red;'>Seleccione sexo</p>">
                  <option selected value="M">Masculino</option>
                  <option value="F">Femenino</option>
                </select>
              </div>
              <div class="form-group col-sm-4">
                <label>F. Nacimiento:</label>
                <input type="date" name="fNac_m" id="fNac_m" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese fecha de Nacimiento</p>">
              </div>
              <div class="form-group col-sm-4">
                <label>Código Postal:</label>
                <input type="text" class="form-control" placeholder="Código Postal" name="CP_m" id="CP_m">
              </div>
              <div class="form-group col-sm-6">
                <label>Calle y Número:</label>
                <input type="text" class="form-control" placeholder="Calle y Número" name="callenumero_m" id="callenumero_m">
              </div>
              <div class="form-group col-sm-6">
                <label>Colonia:</label>
                <input type="text" class="form-control" placeholder="Colonia" name="colonia_m" id="colonia_m">
              </div>
              <div class="form-group col-sm-6">
                <label>* Estado:</label>
                <select name='estado_m' id='estado_m' title="Selecciona Estado" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una Estado</b>">
                </select>
              </div>
             <div class="form-group col-sm-6">
                <label>* Municipio:</label>
                <select name='municipio_m' id='municipio_m' title="Selecciona Municipio" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una Municipio</b>">
                </select>
              </div>
              <div class="form-group col-sm-6" id="edo"></div>
                <div class="form-group col-sm-6" id="mun"></div>
              <div class="form-group col-sm-12" id="llenar"></div>
              
              <div class="form-group col-md-12">
              <h3>Información del Docente</h3><hr>
          </div>
            <div class="form-group col-sm-6"> 
                <label>F. Ingreso</label>
                <input type="date" name="fIng_m" id="fIng_m" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese fecha de ingreso</p>">
              </div>
             <div class="form-group col-sm-6">
                  <label>CURP:</label>
                  <input type="text" class="form-control" placeholder="CURP" name="curp_m" id="curp_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese CURP</p>">
              </div>
              <div class="form-group col-sm-6">
                  <label>RFC:</label>
                  <input type="text" class="form-control" placeholder="RFC" name="rfc_m" id="rfc_m">
              </div>
              <div class="form-group col-sm-6">
                  <label>Cédula:</label>
                  <input type="text" class="form-control" placeholder="Cédula" name="cedula_m" id="cedula_m">
              </div>
              <div class="form-group col-sm-4">
                <label>Telefono:</label>
                <input type="text" class="form-control" placeholder="Telefono" name="telefono_m" id="telefono_m">
              </div>
              <div class="form-group col-sm-4">
                <label>Celular:</label>
                <input type="text" class="form-control" placeholder="Celular" name="celular_m" id="celular_m">
              </div>
             <div class="form-group col-sm-4">
                <label>Email:</label>
                <input type="email" class="form-control" placeholder="Email" name="email_m" id="email_m">
              </div>
             <div class="form-group col-sm-6"> 
                <label>Academia</label>
                <input type="text" name="academia_m" id="academia_m" class="form-control">
              </div>
              <div class="form-group col-sm-6">
                <label>* Estatus:</label>
                <select name='estatus_a_m' id='estatus_a_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona estatus" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un estatus</b>">
                <option value="1">Activado</option>
                <option value="2">Desactivado</option>
                </select>
                 </div>
                 <div class="form-group col-sm-6">
                <label>* Tipo de docente:</label>
                <select name='tipo_area_m' id='tipo_area_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona tipo de docente" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un tipo de docente</b>">
                </select>
                 </div>
              <div class="form-group col-sm-12"> 
                <label>Observaciones</label>
                <textarea id="observaciones_m" name="observaciones_m" class="form-control"></textarea>
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
              <i class="fa fa-play-circle"></i>Modificar</button>
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
    form : '#form-doc_m',
    errorMessageClass: "error",
    onSuccess: function(){
      mod("#form-doc_m","Listado de Docentes");
      $successMsg.show();
      return false; 
    }
  });
</script>