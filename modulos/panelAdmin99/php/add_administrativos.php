<div class="modal fade" id="add_administrativos" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-plus"></i>&nbsp; Nuevo Administrativo
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
            <h3>Informacion General</h3><hr>
            <form id="form-adm" action="php/add_administrativosE.php" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="form-group col-sm-4">
                <label>Apellido Paterno:</label>
                <input type="text" class="form-control" placeholder="Apellido Paterno" name="apaternoAdm" id="apaternoAdm" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese Apellido Paterno</p>">
              </div>
              <div class="form-group col-sm-4">
                <label>Apellido Materno:</label>
                <input type="text" class="form-control" placeholder="Apellido Materno" name="amaternoAdm" id="amaternoAdm" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese Apellido Materno</p>">
              </div>
              <div class="form-group col-sm-4">
                <label>Nombre(s):</label>
                <input type="text" class="form-control" placeholder="Nombre(s)" name="nombresAdm" id="nombresAdm" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese Nombre</p>">
              </div>
             <div class="form-group col-sm-4">
                <label>Sexo:</label>
                <select name="sexoAdm" id="sexoAdm" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Seleccione sexo</p>">
                  <option selected value="M">Masculino</option>
                  <option value="F">Femenino</option>
                </select>
              </div>
              <div class="form-group col-sm-8">
                <label>F. Nacimiento:</label>
                <input type="date" name="fNacAdm"id="fNacAdm" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese fecha de Nacimiento</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>Calle y Número:</label>
                <input type="text" class="form-control" placeholder="Calle y Número" name="callenumeroAdm" id="callenumeroAdm">
              </div>
              <div class="form-group col-sm-6">
                <label>Colonia:</label>
                <input type="text" class="form-control" placeholder="Colonia" name="coloniaAdm" id="coloniaAdm">
              </div>
              <div class="form-group col-sm-4">
                <label>Estado:</label>
                <select class="form-control" name='estadoAdm' id='estadoAdm'>
                  <option value="">Seleccione un estado</option>'
                </select>
              </div>
             <div class="form-group col-sm-4">
                <label>Municipio:</label>
                <select name='municipioAdm' id='municipioAdm' class="form-control">
                  <option value="">Seleccione un municipio</option>'
                </select>
              </div>
              
              <div class="form-group col-sm-4">
                <label>Código Postal:</label>
                <input type="text" class="form-control" placeholder="Código Postal" name="CPAdm" id="CPAdm">
              </div>
              <div class="form-group col-md-12">
            <h3>Informacion del Administrativo</h3><hr>
          </div>
            <div class="form-group col-sm-6"> 
                <label>F. Ingreso</label>
                <input type="date" name="fIngAdm" id="fIngAdm" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese fecha de ingreso</p>">
              </div>
             <div class="form-group col-sm-6">
                  <label>CURP:</label>
                  <input type="text" class="form-control" placeholder="CURP" name="curpAdm" id="curpAdm" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese CURP</p>">
              </div>
              <div class="form-group col-sm-6">
                  <label>RFC:</label>
                  <input type="text" class="form-control" placeholder="RFC" name="rfcAdm" id="rfcAdm">
              </div>
              <div class="form-group col-sm-6">
                  <label>Cédula:</label>
                  <input type="text" class="form-control" placeholder="Cédula" name="cedulaAdm" id="cedulaAdm">
              </div>
              <div class="form-group col-sm-4">
                <label>Telefono:</label>
                <input type="text" class="form-control" placeholder="Telefono" name="telefonoAdm" id="telefonoAdm">
              </div>
              <div class="form-group col-sm-4">
                <label>Celular:</label>
                <input type="text" class="form-control" placeholder="Celular" name="celularAdm" id="celularAdm">
              </div>
             <div class="form-group col-sm-4">
                <label>Email:</label>
                <input type="text" class="form-control" placeholder="Email" name="emailAdm" id="emailAdm">
              </div>
             <div class="form-group col-sm-12"> 
                <label>Academia</label>
                <input type="text" name="academiaAdm" id="academiaAdm" class="form-control">
              </div>
             <div class="form-group col-sm-12">
                <label>Area:</label>
                <select class="form-control" name='areaAdm' id='areaAdm'>
                  <option value="">Seleccione un Area</option>
                </select>
              </div>
              <div class="form-group col-sm-12"> 
                <label>Observaciones</label>
                <textarea id="observacionesAdm" name="observacionesAdm" class="form-control"></textarea>
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
    form : '#form-adm',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-adm");
      $successMsg.show();
      return false; 
    }
  });
</script>