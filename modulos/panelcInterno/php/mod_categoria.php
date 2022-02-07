<div class="modal fade" id="modal_mod_categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="menu-icon fa fa-th-list"></i>&nbsp; Modificar Categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-modcategoria" action="php/mod_categoriaE.php" method="post" enctype="multipart/form-data"> 

          <div class="form-row" style="display: none">
            <div class="form-group col-md-12">
              <label>ID Categoría:</label>
              <input name="id_categoria_mod" id="id_categoria_mod" class="form-control">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Categoría:</label>
              <input name="categoria_mod" id="categoria_mod" class="form-control">
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
    form : '#form-modcategoria',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-modcategoria");
      $successMsg.show();
      return false; 
    }
  });
</script>
<!-- dayModalMod -->