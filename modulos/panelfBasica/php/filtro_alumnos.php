<form><div class="form-row">
                  <div class="form-group col-sm-12">
                  <hr><b>Busqueda de alumnos</b><br>
                  <small><i>Selecciona uno o varios valores para realizar una busqueda, "Registros máximos mostrados <b>300</b>"</i></small></div>

                  <div class="form-group col-sm-3">
                  <label>Matrícula:</label>
                  <input type="text" class="form-control" placeholder="Matrícula de alumno" name="matricula_f" id="matricula_f">
                  </div>
                  <div class="form-group col-sm-3">
                  <label>Nombre:</label>
                  <input type="text" class="form-control" placeholder="Nombre de alumno" name="nombre_f" id="nombre_f">
                  </div>
                  <div class="form-group col-sm-3">
                  <label>Apellido Paterno:</label>
                  <input type="text" class="form-control" placeholder="Apellido paterno de alumno" name="apaterno_f" id="apaterno_f">
                  </div>
                  <div class="form-group col-sm-3">
                  <label>Apellido Materno:</label>
                  <input type="text" class="form-control" placeholder="Apellido materno de alumno" name="amaterno_f" id="amaterno_f">
                  </div>
                  <div class="form-group col-sm-12">
                <label>Estatus:</label>
                <select name='estatus_f' id='estatus_f' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Todos los estatus">
                </select>
                 </div>
                <div class="form-group col-sm-4">
                <label>Carrera:</label>
                <select name='carrera_f' id='carrera_f' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona carrera">
                </select>
                 </div>
                <div class="form-group col-sm-4">
                <label>Módulo:</label>
                <select name='curso_f_d' id='curso_f_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un Módulo">
                </select>
                 </div>
                 <div class="form-group col-sm-4">
                <label>Grupo:</label>
                <select name='grupo_f_d' id='grupo_f_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Todos los grupos">
                </select>
                 </div>

                 <div class="form-group col-sm-4">
                <label>Plan de estudios:</label>
                <select name='plan_f' id='plan_f' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona un plan de estudios">
                </select>
                 </div>
                <div class="form-group col-sm-4">
                <label>Modalidad:</label>
                <select name='academia_f_d' id='academia_f_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona una modalidad">
                </select>
                 </div>
                 <div class="form-group col-sm-4">
                <label>Generación:</label>
                <select name='generacion_f_d' id='generacion_f_d' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Todas las generaciones">
                </select>
                 </div>
                  <div class="form-group col-sm-6">
                  <button id="filtro_alumnos" type="button" class="btn btn-primary btn-sm">
                  <i class="fa fa-search"></i>Buscar</button>
                  <button type="reset" id="reset_alumnos" class="btn btn-secondary btn-sm">
              <i class="fa fa-eraser"></i></button>
                  </div>
                </form>
                </div>