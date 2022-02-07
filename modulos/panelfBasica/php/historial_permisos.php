<div class="modal fade" id="modal_historial_permisos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-calendar-check"></i>&nbsp; Historial de permisos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
      <div class="form-group col-md-12">
      <div class="row">    
            <div class="form-group col-md-12" style="display: none">
              <input name="id_datos" id="id_datos">
              <input name="tipo_datos" id="tipo_datos">
            </div>
            <div class="form-group col-md-6">
              <label>Nombre:</label>
              <input name="nombre" id="nombre" class="form-control" disabled="">
            </div>
            <div class="form-group col-md-6">
              <label>CURP:</label>
              <input name="curp" id="curp" class="form-control" disabled="">
            </div>
            <div class="form-group col-md-6">
              <label>Fecha y hora de inicio:</label>
              <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" class="form-control"></select>
            </div>
            <div class="form-group col-md-6">
              <label>Fecha y hora de fin:</label>
              <input type="datetime-local" name="fecha_fin" id="fecha_fin" class="form-control"></select>
            </div>
            <div class="form-group col-md-12">
              <label>Causas:</label>
               <select name="causas" id="causas" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona una causa">
                 <option value="1">Consulta servicio Isssteleon</option>
                 <option value="2">Consulta servicio Médico</option>
                 <option value="3">Trámites de titulación</option>
                 <option value="4">Trámites personales</option>
                 <option value="5">Causas de fuerza mayor</option>
                 <option value="6">Otros</option>
               </select> 
            </div>
            <div class="form-group col-md-12">
              <label>Observaciones:</label>
              <TEXTAREA name="especificacion" id="especificacion" class="form-control"></TEXTAREA>
            </div>
            <div class="form-group col-md-2">
              <button type="button" class="btn btn-dark" id="add_permiso"><i class="fa fa-plus"></i> Asignar permiso</button>
            </div>
          <div id="tabla_permisos" class="table-responsive" style="padding: 15px;">
            <table id="tabla-permisos-1" class="table table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="noExport">Eliminar</th>
                  <th>Fecha Inicio</th>
                  <th>Fecha Fin</th>
                  <th>Causa</th>
                  <th>Observaciones</th>
                </tr>
              </thead>
              <tbody id="tbody_permisos">
                
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