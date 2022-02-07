<div class="modal fade" id="add_ssocial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-calendar-check"></i>&nbsp; Historial de Servicio Social</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
      <div class="form-group col-md-12">
      <div class="row">    
            <div class="form-group col-md-12" style="display: none">
              <label>ID Alumno:</label>
              <input name="id_alumno" id="id_alumno" class="form-control">
            </div>
            <div class="form-group col-md-12">
              <label>Nombre:</label>
              <input name="nombre" id="nombre" class="form-control" disabled="">
            </div>
            <div class="form-group col-md-6">
              <label>Matricula:</label>
              <input name="matricula" id="matricula" class="form-control" disabled="">
            </div>
            <div class="form-group col-md-6">
              <label>CURP:</label>
              <input name="curp" id="curp" class="form-control" disabled="">
            </div>
            <div class="form-group col-md-4">
              <label>Duración:</label>
              <input type="number" placeholder="Horas" name="duracion" id="duracion" class="form-control"></select>
            </div>
            <div class="form-group col-md-4">
              <label>Fecha y hora de inicio:</label>
              <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" class="form-control"></select>
            </div>
            <div class="form-group col-md-4">
              <label>Fecha y hora de fin:</label>
              <input type="datetime-local" name="fecha_fin" id="fecha_fin" class="form-control"></select>
            </div>
            <div class="form-group col-md-12">
              <label>Detalles:</label>
              <TEXTAREA name="detalles" id="detalles" class="form-control"></TEXTAREA>
            </div>
            <div class="form-group col-md-2">
              <button type="button" class="btn btn-dark" id="add_servicio_social"><i class="fa fa-plus"></i> Agregar </button>
            </div>
          <div id="tabla_ssocial" class="table-responsive" style="padding: 15px;">
            <table id="tabla-ssocial-1" class="table table-bordered" cellspacing="0" width="100%">
              <thead class="thead-dark">
                <tr>
                  <th class="noExport">Eliminar</th>
                  <th>Duración</th>
                  <th>Fecha Inicio</th>
                  <th>Fecha Fin</th>
                  <th>Detalles</th>
                </tr>
              </thead>
              <tbody id="tab_ssocial">
              </tbody>
            </table>
          </div> 
          </div> 
          </div> 
          </div> 
          <div class="modal-footer">
            <button class="btn btn-danger btn-sm" data-dismiss="modal">
              <i class="fa fa-times"></i>Cerrar</button>
          </div>
      </div>
    </div>
  </div>
</div>