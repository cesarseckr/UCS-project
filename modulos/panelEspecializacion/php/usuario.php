<div class="modal fade" id="usuario" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-user-edit"></i>&nbsp; Datos de usuario
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-row">
            <div class="form-group col-md-12">
             <form id="form-usuario_m" action="php/add_usuariosE.php" method="post" enctype="multipart/form-data">
             <div class="row">
            <div class="form-group col-sm-4" style="display:none;">
            <input type="text" class="form-control" name="id_usuario_m" id="id_usuario_m">
            <input type="text" class="form-control" name="id_datos_m" id="id_datos_m">
            <input type="text" class="form-control" name="id_tipo_m" id="id_tipo_m">
            </div>
               <div class="form-group col-sm-6">
                <label>* Usuario:</label>
                <input type="text" class="form-control" placeholder="Nombre de usuario" name="usuario_m" id="usuario_m" data-validation="required" data-validation-error-msg="<p style='color:red;'>Ingrese nombre de usuario</p>">
              </div>
              <div class="form-group col-sm-6">
                <label>* Estatus:</label>
                <select name='estatus_usuario_m' id='estatus_usuario_m' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true">
                  <option value="1">ACTIVO</option>
                  <option value="2">INACTIVO</option>
                </select>
              </div>
              <div class="form-group col-sm-6">
                <label>Contraseña:</label>
                <input type="password" class="form-control" placeholder="Contraseña" name="pass_confirmation" id="pass_confirmation">
              </div>
              <div class="form-group col-sm-6">
                <label>Repetir contraseña:</label>
                <input type="password" class="form-control" placeholder="Repite la contraseña" name="pass" id="pass" data-validation="confirmation"
                data-validation-error-msg="<p style='color:red;'>* La contraseña no coincide</p>">
              </div>
              <div class="form-group col-sm-8">
              <label for="input" style="color:red;"><i>Los campos marcados con (*) son obligatorios.</i></label>
              </div>

              <div class="form-group col-sm-12"><hr>
                <h5><i class="fa fa-book"></i> Archivos del usuario</h5>
                </div>
                <div class="form-group col-sm-12" id="archivos_usr"></div>
            </div>
            </div>   
            </div>
             </div>

            <div class="modal-footer">
              <button class="btn btn-primary btn-sm">
              <i class="fa fa-play-circle"></i>Editar</button>
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
    form : '#form-usuario_m',
    modules : 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      mod("#form-usuario_m","Listado");
      $successMsg.show();
      return false; 
    }
  });
</script>