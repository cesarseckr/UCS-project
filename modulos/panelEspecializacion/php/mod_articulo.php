<div class="modal fade" id="modal_mod_articulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="menu-icon mdi mdi-message-draw"></i>&nbsp; Modificar Artículo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-modarticulo" action="php/mod_articuloE.php" method="post" enctype="multipart/form-data"> 

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>ID:</label>
              <input name="id_mod_articulo" id="id_mod_articulo" class="form-control">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Titulo:</label>
              <input name="titulo_mod_articulo" id="titulo_mod_articulo" class="form-control" data-validation="required" data-validation-error-msg="<b style = 'color:red;'> Inserte un Titulo </b>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Descripcion:</label>
              <textarea name="desc_mod_articulo" id="desc_mod_articulo" class="form-control"></textarea>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Contenido:</label>
              <textarea name="contenido_mod_articulo" id="contenido_mod_articulo" class="form-control" rows="7"></textarea data-validation="required" data-validation-error-msg="<b style = 'color:red;'> Inserte un contenido </b>" >
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Imagen:</label>
              <br>
              <input type="file" name="img_mod_articulo" id="img_mod_articulo" accept="image/png, image/jpeg, image/jpg"> 
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Estatus:</label>
              <select name="estatus_mod_articulo" id="estatus_mod_articulo" class="form-control">
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
              </select> 
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Categoria:</label>
              <select name="categoria_mod_articulo" id="categoria_mod_articulo" class="form-control" data-validation="required" data-validation-error-msg="<b style = 'color:red;'> Seleccione una categoria </b> ">
              </select> 
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-primary btn-sm">
              <i class="fas fa-pen-square"></i>
              Modificar
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
    form : '#form-modarticulo',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-modarticulo","Tabla articulos");
      $successMsg.show();
      return false; 
    }
  });
</script>
<!-- dayModalMod -->