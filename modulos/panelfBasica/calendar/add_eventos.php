<!-- dayModalMod -->
<div class="modal fade" id="dayModalMod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-calendar-plus"></i>&nbsp; Editar evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-row">
        <h5  id="tituloEvent"></h5>
        <input type="hidden" id="txtId" name="txtId">
          <div class="form-group col-md-12">
            <label>Título:</label>
            <input type="text" id="txtTitulo" class="form-control" placeholder="Titulo del evento">
          </div>

          <div class="form-group col-md-6">
            <label>Fecha de inicio:</label>
            <div class="input-group" data-autoclose="true">
              <input type="datetime-local" name="txtFechaInicio" id="txtFechaInicio" class="form-control">
            </div>
          </div>
          <div class="form-group col-md-6">
            <label>Fecha de fin:</label>
            <div class="input-group" data-autoclose="true">
              <input type="datetime-local" name="txtFechaFin" id="txtFechaFin" class="form-control">
            </div>
          </div>

        <div class="form-group col-md-12">
          <label>Descripción:</label>
          <textarea id="txtDescripcion" class="form-control"></textarea>
        </div>
        <style>
.color1 {
  -webkit-appearance: none;
  padding: 5;
  border: none;
  border-radius: 2px;
  width: 100%;
  height: 30px;
}
.color1::-webkit-color-swatch {
  border: none;
  border-radius: 2px;
  padding: 5;
}
.color1::-webkit-color-swatch-wrapper {
  border: none;
  border-radius: 2px;
  padding: 5;
}
        </style>
        <div class="form-group col-md-6">
          <label>Seleccione un color de fondo:</label><br>
          <input type="color" id="txtColor" value="#ff00ff" class="color1">
        </div>
         <div class="form-group col-md-6">
          <label>Seleccione un color para el texto:</label><br>
          <input type="color" id="txtColorTexto" class="color1">
        </div>
        <div class="form-group col-md-12">
          <label id="txtId_usuario"></label>
        </div>
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnAgregar"><i class="fa fa-play-circle"></i>Agregar</button>
        <button type="button" class="btn btn-primary" id="btnModificar"><i class="fa fa-play-circle"></i>Modificar</button>
        <button type="button" class="btn btn-danger" id="btnBorrar"><i class="fa fa-trash-alt"></i>Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
      </div>
    </div>
  </div>
</div>
<!-- dayModalMod -->