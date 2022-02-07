<div class="modal fade" id="add_usuarios" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-plus"></i>&nbsp; Nuevo Usuario
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-md-12">
            <form id="form-user" action="php/add_usuariosE.php" method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-group col-md-12">
                  
                  <div class="input-group">
                    <select name="tipo" id="tipo" class="form-control">
                      <option value="0" selected>Selecciona tipo de usuario</option>
                      <option value="1">Docente</option>
                      <option value="2">Alumno</option>
                      <option value="3">Administrativo</option>
                    </select>
                  </div>
                  <br>
                  <div class="input-group" id="buscador">
                    <input type="text" class="form-control" id="buscador-usuarios">      
                      <div class="input-group-append">
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="button" id="verificar_datos"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                      <div class="col-md-12">
                          <div id="lista-resultado"></div>
                      </div>  
                  </div>
                  <br>
                  
                  <div id="div_id">
                    <label for="input" disabled>ID</label>
                    <input  class="form-control" name="id_u" id="id_u" placeholder="ID" disabled>
                    <br>
                  </div>
                  <div id="div_matricula">
                    <label for="input" disabled>Id Datos</label>
                    <input  class="form-control" name="id_datos" id="id_datos" placeholder=" Matricula" disabled>
                  </div>
                  <br>
                  <label for="input" disabled>Nombre</label>
                  <input  class="form-control" id="nombre-usuario" id="nombre-usuario" placeholder="Nombre - matricula" disabled>
                  <br>
                  <div id="div_admin">
                    <label for="input">Area de administración</label>
                    <select name="area_admin" id="area_admin" class="form-control">
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
                  <input  class="form-control" name="usuario" id="usuario" placeholder="Usuario">
                  <br>
                  <label for="inputPassword4" class="required">Contraseña</label>
                  <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                  <br>
                  <label for="input">Estatus</label>
                  <select  name="estatus" id="estatus" class="form-control">
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
    form : '#form-user',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-user");
      $successMsg.show();
      return false; 
    }
  });
</script>