<div class="modal fade" id="modal_add_articulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="menu-icon mdi mdi-message-draw"></i>&nbsp; Nuevo Artículo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-addarticulo" action="php/add_articuloE.php" method="post" enctype="multipart/form-data"> 

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Titulo*:</label>
              <input name="titulo_add_articulo" id="titulo_add_articulo" class="form-control" data-validation="required" data-validation-error-msg="<b style = 'color:red;'> Inserte un Titulo </b>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Descripcion:</label>
              <textarea name="desc_add_articulo" id="desc_add_articulo" class="form-control"></textarea>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Contenido*:</label>
              <textarea name="contenido_add_articulo" id="contenido_add_articulo" class="form-control" rows="7" data-validation="required" data-validation-error-msg="<b style = 'color:red;'> Inserte un contenido </b>"></textarea>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Imagen:</label>
              <br>
              <input type="file" name="img_add_articulo" id="img_add_articulo" accept="image/png, image/jpeg, image/jpg"> 
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Categoria*:</label>
              <select name="categoria_add_articulo" id="categoria_add_articulo" class="form-control" data-validation="required" data-validation-error-msg="<b style = 'color:red;'> Seleccione una categoria </b>">
              </select> 
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-primary btn-sm">
              <i class="fas fa-plus"></i>
              Enviar
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
    form : '#form-addarticulo',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-addarticulo");
      $successMsg.show();
      return false; 
    }
  });
</script>
<!-- dayModalMod -->