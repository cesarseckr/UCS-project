<div class="modal fade" id="mod_administrativos" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-plus"></i>&nbsp; Modificar Administrativo
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-row">
            <div class="form-group col-md-12">
            <h3>Informacion General</h3><hr>
            <form id="form-adm_m" action="php/mod_administrativosE.php" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="form-group col-sm-4" style="display:none">
                <label>ID Administrativo:</label>
                <input type="text" class="form-control" placeholder="ID" name="idAdm_m" id="idAdm_m"data-validation-error-msg="<p style='color:#B40431;'>Ingrese Apellido Paterno</p>">
              </div>
              <div class="form-group col-sm-4">
                <label>Apellido Paterno:</label>
                <input type="text" class="form-control" placeholder="Apellido Paterno" name="apaternoAdm_m" id="apaternoAdm_m" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese Apellido Paterno</p>">
              </div>
              <div class="form-group col-sm-4">
                <label>Apellido Materno:</label>
                <input type="text" class="form-control" placeholder="Apellido Materno" name="amaternoAdm_m" id="amaternoAdm_m" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese Apellido Materno</p>">
              </div>
              <div class="form-group col-sm-4">
                <label>Nombre(s):</label>
                <input type="text" class="form-control" placeholder="Nombre(s)" name="nombresAdm_m" id="nombresAdm_m" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese Nombre</p>">
              </div>
             <div class="form-group col-sm-4">
                <label>Sexo:</label>
                <select name="sexoAdm_m" id="sexoAdm_m" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Seleccione sexo</p>">
                  <option selected value="M">Masculino</option>
                  <option value="F">Femenino</option>
                </select>
              </div>
              <div class="form-group col-sm-8">
                <label>F. Nacimiento:</label>
                <input type="date" name="fNacAdm_m" id="fNacAdm_m" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese fecha de Nacimiento</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>Calle y Número:</label>
                <input type="text" class="form-control" placeholder="Calle y Número" name="callenumeroAdm_m" id="callenumeroAdm_m">
              </div>
              <div class="form-group col-sm-6">
                <label>Colonia:</label>
                <input type="text" class="form-control" placeholder="Colonia" name="coloniaAdm_m" id="coloniaAdm_m">
              </div>
              <div class="form-group col-sm-4">
                <label>Estado:</label>
                <select class="form-control" name='estadoAdm_m' id='estadoAdm_m'>
                  <option value="">Seleccione un estado</option>'
                </select>
              </div>
              <div class="form-group col-sm-4">
                <label>Municipio:</label>
                <select name='municipioAdm_m' id='municipioAdm_m' class="form-control">
                  <option value="">Seleccione un municipio</option>'
                </select>
              </div>
              <div class="form-group col-sm-4">
                <label>Código Postal:</label>
                <input type="text" class="form-control" placeholder="Código Postal" name="CPAdm_m" id="CPAdm_m">
              </div>
              <div class="form-group col-md-12">
              <h3>Informacion del Administrativo</h3><hr>
          </div>
            <div class="form-group col-sm-6"> 
                <label>F. Ingreso</label>
                <input type="date" name="fIngAdm_m" id="fIngAdm_m" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese fecha de ingreso</p>">
              </div>
             <div class="form-group col-sm-6">
                  <label>CURP:</label>
                  <input type="text" class="form-control" placeholder="CURP" name="curpAdm_m" id="curpAdm_m" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese CURP</p>">
              </div>
              <div class="form-group col-sm-6">
                  <label>RFC:</label>
                  <input type="text" class="form-control" placeholder="RFC" name="rfcAdm_m" id="rfcAdm_m">
              </div>
              <div class="form-group col-sm-6">
                  <label>Cédula:</label>
                  <input type="text" class="form-control" placeholder="Cédula" name="cedulaAdm_m" id="cedulaAdm_m">
              </div>
              <div class="form-group col-sm-4">
                <label>Telefono:</label>
                <input type="text" class="form-control" placeholder="Telefono" name="telefonoAdm_m" id="telefonoAdm_m">
              </div>
              <div class="form-group col-sm-4">
                <label>Celular:</label>
                <input type="text" class="form-control" placeholder="Celular" name="celularAdm_m" id="celularAdm_m">
              </div>
             <div class="form-group col-sm-4">
                <label>Email:</label>
                <input type="text" class="form-control" placeholder="Email" name="emailAdm_m" id="emailAdm_m">
              </div>
             <div class="form-group col-sm-12"> 
                <label>Academia</label>
                <input type="text" name="academiaAdm_m" id="academiaAdm_m" class="form-control">
              </div>
             <div class="form-group col-sm-12">
                <label>Area:</label>
                <select class="form-control" name='areaAdm_m' id='areaAdm_m'>
                  <option value="">Seleccione un Area</option>
                </select>
              </div>
              <div class="form-group col-sm-12"> 
                <label>Observaciones</label>
                <textarea id="observacionesAdm_m" name="observacionesAdm_m" class="form-control"></textarea>
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
    form : '#form-adm_m',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-adm_m");
      $successMsg.show();
      return false; 
    }
  });
</script>
