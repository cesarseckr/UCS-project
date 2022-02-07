<div class="modal fade" id="modal_add_tickets" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="menu-icon mdi mdi-ticket"></i>&nbsp; Nuevo Ticket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-addticket" action="tickets/add_ticketE.php" method="post" enctype="multipart/form-data"> 

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Titulo:</label>
              <input name="titulo_add_ticket" id="titulo_add_ticket" class="form-control">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Descripcion:</label>
              <textarea name="desc_add_ticket" id="desc_add_ticket" class="form-control"></textarea>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Area:</label>
              <select name="area_add_ticket" id="area_add_ticket" class="form-control">
              </select> 
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Prioridad:</label>
              <select name="prioridad_add_ticket" id="prioridad_add_ticket" class="form-control">
                <option>Seleccionar Prioridad</option>
                <option value="1">Baja</option>
                <option value="2">Media</option>
                <option value="3">Alta</option>
              </select> 
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-primary btn-sm">
              <i class="fas fa-sign-out-alt"></i>
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
    form : '#form-addticket',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-addticket");
      $successMsg.show();
      return false; 
    }
  });
</script>
<!-- dayModalMod -->