<!-- dayModalMod -->
<div class="modal fade" id="dayModalMod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5  id="tituloEvent"></h5>
        <input type="hidden" id="txtId" name="txtId">
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Titulo:</label>
            <input type="text" id="txtTitulo" class="form-control" placeholder="Titulo del evento">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Inicio:</label>
            <div class="input-group" data-autoclose="true">
              <input type="datetime-local" name="txtFechaInicio" id="txtFechaInicio" class="form-control">
            </div>
          </div>
          <div class="form-group col-md-12">
            <label>Fin:</label>
            <div class="input-group" data-autoclose="true">
              <input type="datetime-local" name="txtFechaFin" id="txtFechaFin" class="form-control">
            </div>
          </div>
        </div>

        <div class="form-group col-md-12">
          <label>Descripcion:</label>
          <textarea id="txtDescripcion" class="form-control"></textarea>
        </div>

        <div class="form-group col-md-12">
          <label>Color de fondo:</label>
          <input type="color" id="txtColor" class="form-control">
        </div>

        <div class="form-group col-md-12">
          <label>Color de texto:</label>
          <input type="color" id="txtColorTexto" class="form-control">
        </div>
        
        <div class="form-group col-md-12">
          <label id="txtId_usuario"></label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnAgregar">Agregar</button>
        <button type="button" class="btn btn-success" id="btnModificar">Modificar</button>
        <button type="button" class="btn btn-danger" id="btnBorrar">Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- dayModalMod -->