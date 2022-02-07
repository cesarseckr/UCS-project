<div class="modal fade" id="modal_ver_tickets" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="menu-icon mdi mdi-ticket"></i>&nbsp;Ticket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>

          <div class="form-row" style="display: none">
            <div class="form-group col-md-12">
              <label>Id Tickets:</label>
              <input name="id_mod_ticket" id="id_mod_ticket" class="form-control" disabled>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Titulo:</label>
              <input name="titulo_mod_ticket" id="titulo_mod_ticket" class="form-control" disabled>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Cambiar Area:</label>
              <select name="area_mod_ticket" id="area_mod_ticket" class="form-control" disabled>
              </select> 
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Cambiar Prioridad:</label>
              <select name="prioridad_mod_ticket" id="prioridad_mod_ticket" class="form-control" disabled>
                <option>Seleccionar Prioridad</option>
                <option value="1">Baja</option>
                <option value="2">Media</option>
                <option value="3">Alta</option>
              </select> 
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Cambiar Estado:</label>
              <select name="estado_mod_ticket" id="estado_mod_ticket" class="form-control" disabled>
                <option>Seleccionar Estado</option>
                <option value="1">Pendiente</option>
                <option value="2">Atendiendo</option>
                <option value="3">Finalizado</option>
              </select> 
            </div>
          </div>

          <div id="historial_chat" class="table-responsive" style="padding-bottom: 15px; height:400px;">
            
          </div>
        </form>  

        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Responder:</label>
            <textarea name="origen_mensaje_ticket" id="origen_mensaje_ticket" class="form-control"></textarea>
            <br>
            <button class="btn btn-primary btn-sm" id="responder_ticket">Responder</button>
          </div>
        </div>

          <hr>
        
        <!--<div class="modal-footer">
          <button class="btn btn-primary btn-sm">
            <i class="fas fa-sign-out-alt"></i>
            Modificar
          </button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar Ventana</button>
        </div>-->
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