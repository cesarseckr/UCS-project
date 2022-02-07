<div class="modal fade" id="mod_usuarios" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-plus"></i>&nbsp; Modificar Usuario
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-md-12">
            <form id="form-mod-user" action="php/add_usuariosE.php" method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <div id="div_id">
                    <label for="input" disabled>ID</label>
                    <input  class="form-control" name="mod_id_u" id="mod_id_u" placeholder="ID" disablΩd>
                    <br>
                  </div>
                  <div id="div_matricula">
                    <label for="input" disabled>Id Datos</label>
                    <input  class="form-control" name="mod_id_datos" id="mod_id_datos" placeholder=" Matricula" disabled>
                  </div>
                  <br>
                  <label for="input" disabled>Nombre</label>
                  <input  class="form-control" id="mod_nombre-usuario"  placeholder="Nombre - matricula" disabled>
                  <br>
                  <div id="div_admin">
                    <label for="input">Area de administración</label>
                    <select name="mod_area_admin" id="mod_area_admin" class="form-control">
                      <option value="1" selected>Control Escolar</option>
                      <option value="2">Formación Básica</option>
                      <option value="3">Área Médica</option>
                      <option value="4">Especialización</option>
                      <option value="5">Control Interno</option>
                      <option value="6">Comunicación e Imagen</option>
                      <option value="7">Comandancia y disciplina</option>
                      <option value="8">Compras</option>
                      <option value="9">Sistemas</option>
                      <option value="10">Dirección</option>
                    </select>
                  </div>
                  <br>
                  <label for="input" class="required">Usuario</label>
                  <input  class="form-control" name="mod_usuario" id="mod_usuario" placeholder="Usuario">
                  <br>
                  <label for="inputPassword4" class="required">Contraseña</label>
                  <input type="password" class="form-control" name="mod_pass" id="mod_pass" placeholder="Password">
                  <br>
                  <label for="input">Estatus</label>
                  <select  name="mod_estatus" id="mod_estatus" class="form-control">
                    <option value="1" selected>Activo</option>
                    <option value="2">Inactivo</option>
                  </select>
                </div>
              </div>

              <button class="btn btn-primary btn-sm">
                <i class="fa fa-play-circle"></i>Registrar
              </button>
              <button type="reset" class="btn btn-secondary btn-sm">
                <i class="fa fa-eraser"></i>
              </button>
              <button class="btn btn-danger btn-sm" data-dismiss="modal">
                <i class="fa fa-times"></i>Cerrar
              </button>
            </form>
          </div>   
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  $successMsg = $(".alert");
  $.validate({
    form : '#form-mod-user',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-user");
      $successMsg.show();
      return false; 
    }
  });
</script>