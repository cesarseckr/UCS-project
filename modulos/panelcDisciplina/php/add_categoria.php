<div class="modal fade" id="modal_add_categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="menu-icon fa fa-th-list"></i>&nbsp; Nuevo Categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-addcategoria" action="php/add_categoriaE.php" method="post" enctype="multipart/form-data"> 

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Categoría:</label>
              <input name="categoria_add" id="categoria_add" class="form-control">
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
    form : '#form-addcategoria',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-addcategoria");
      $successMsg.show();
      return false; 
    }
  });
</script>
<!-- dayModalMod -->