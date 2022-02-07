<div class="modal fade" id="mod_docentes" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-plus"></i>&nbsp; Modificar datos del Docente
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-row">
            <div class="form-group col-md-12">
            <h3>Informacion General</h3><hr>
            <form id="form-Doc_m" action="php/mod_docentesE.php" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="form-group col-sm-4" style="display:none">
                <label>ID Docentes:</label>
                <input type="text" class="form-control" placeholder="ID:" name="idDoc_m" id="idDoc_m" data-validation-error-msg="<p style='color:#B40431;'>Ingrese Apellido Paterno</p>">
              </div>
              <div class="form-group col-sm-4">
                <label>Apellido Paterno:</label>
                <input type="text" class="form-control" placeholder="Apellido Paterno" name="apaternoDoc_m" id="apaternoDoc_m" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese Apellido Paterno</p>">
              </div>
              <div class="form-group col-sm-4">
                <label>Apellido Materno:</label>
                <input type="text" class="form-control" placeholder="Apellido Materno" name="amaternoDoc_m" id="amaternoDoc_m" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese Apellido Materno</p>">
              </div>
              <div class="form-group col-sm-4">
                <label>Nombre(s):</label>
                <input type="text" class="form-control" placeholder="Nombre(s)" name="nombresDoc_m" id="nombresDoc_m" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese Nombre</p>">
              </div>
             <div class="form-group col-sm-4">
                <label>Sexo:</label>
                <select name="sexoDoc_m" id="sexoDoc_m" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Seleccione sexo</p>">
                  <option selected value="M">Masculino</option>
                  <option value="F">Femenino</option>
                </select>
              </div>
              <div class="form-group col-sm-8">
                <label>F. Nacimiento:</label>
                <input type="date" name="fNacDoc_m"id="fNacDoc_m" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese fecha de Nacimiento</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>Calle y Número:</label>
                <input type="text" class="form-control" placeholder="Calle y Número" name="callenumeroDoc_m" id="callenumeroDoc_m">
              </div>
              <div class="form-group col-sm-6">
                <label>Colonia:</label>
                <input type="text" class="form-control" placeholder="Colonia" name="coloniaDoc_m" id="coloniaDoc_m">
              </div>
              <div class="form-group col-sm-4">
                <label>Estado:</label>
                <select class="form-control" name='estadoDoc_m' id='estadoDoc_m'>
                  <option value="">Seleccione un estado</option>'
                </select>
              </div>
             <div class="form-group col-sm-4">
                <label>Municipio:</label>
                <select name='municipioDoc_m' id='municipioDoc_m' class="form-control">
                  <option value="">Seleccione un municipio</option>'
                </select>
              </div>
              
              <div class="form-group col-sm-4">
                <label>Código Postal:</label>
                <input type="text" class="form-control" placeholder="Código Postal" name="CPDoc_m" id="CPDoc_m">
              </div>
              <div class="form-group col-md-12">
            <h3>Información del Docente</h3><hr>
          </div>
            <div class="form-group col-sm-6"> 
                <label>F. Ingreso</label>
                <input type="date" name="fIngDoc_m" id="fIngDoc_m" class="form-control" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese fecha de ingreso</p>">
              </div>
             <div class="form-group col-sm-6">
                  <label>CURP:</label>
                  <input type="text" class="form-control" placeholder="CURP" name="curpDoc_m" id="curpDoc_m" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>Ingrese CURP</p>">
              </div>
              <div class="form-group col-sm-6">
                  <label>RFC:</label>
                  <input type="text" class="form-control" placeholder="RFC" name="rfcDoc_m" id="rfcDoc_m">
              </div>
              <div class="form-group col-sm-6">
                  <label>Cédula:</label>
                  <input type="text" class="form-control" placeholder="Cédula" name="cedulaDoc_m" id="cedulaDoc_m">
              </div>
              <div class="form-group col-sm-4">
                <label>Telefono:</label>
                <input type="text" class="form-control" placeholder="Telefono" name="telefonoDoc_m" id="telefonoDoc_m">
              </div>
              <div class="form-group col-sm-4">
                <label>Celular:</label>
                <input type="text" class="form-control" placeholder="Celular" name="celularDoc_m" id="celularDoc_m">
              </div>
             <div class="form-group col-sm-4">
                <label>Email:</label>
                <input type="text" class="form-control" placeholder="Email" name="emailDoc_m" id="emailDoc_m">
              </div>
             <div class="form-group col-sm-12"> 
                <label>Academia</label>
                <input type="text" name="academiaDoc_m" id="academiaDoc_m" class="form-control">
              </div>
              <div class="form-group col-sm-12"> 
                <label>Observaciones</label>
                <textarea id="observacionesDoc_m" name="observacionesDoc_m" class="form-control"></textarea>
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
    form : '#form-Doc_m',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-Doc_m");
      $successMsg.show();
      return false; 
    }
  });
</script>