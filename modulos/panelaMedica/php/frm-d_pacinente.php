
  <div class="form-row">
  	<div class="form-group col-6" style="display: none">
	  <label>ID historia</label>
	  <input type="text" class="form-control" name="id_historia" id="id_historia" placeholder="Nombre del paciente">
	</div>
  	<div class="form-group col-6" style="display: none">
	  <label>ID datos</label>
	  <input type="text" class="form-control" name="id_datos" id="id_datos" placeholder="Nombre del paciente">
	</div>
	<div class="form-group col-6">
	  <label>Nombre</label>
	  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del paciente" disabled>
	</div>
	<div class="form-group col-3">
	  <label>Edad</label>
	  <input type="text" class="form-control" name="edad" id="edad" placeholder="Edad del paciente" disabled>
	</div>
	<div class="form-group col-3">
	  <label>Ultima modificacion</label>
	  <input type="text" class="form-control" name="fecha" id="fecha" disabled>
	</div>
  </div>

  <div class="form-row">
	<div class="form-group col-2">
	  <label>Sexo</label>
	  <select class="form-control" name="sexo" id="sexo" disabled="">
	  	<option>Seleccionar</option>
	  	<option value="F">Femenino</option>
	  	<option value="M">Masculino</option>
	  </select>
	</div>
	<div class="form-group col-2">
	  <label>Edo. Cívil</label>
	  <select class="form-control" name="edo_c" id="edo_c" disabled="">
	  	<option>Seleccionar</option>
	  	<option value="1">Soltero</option>
	  	<option value="2">Casado</option>
	  	<option value="3">Union Libre</option>
	  	<option value="4">Divorsiado</option>
	  	<option value="5">Viudo</option>
	  </select>
	</div>
	<div class="form-group col-8">
	  <label>Domicilio</label>
	  <input type="text" class="form-control" name="domicilio" id="domicilio" placeholder="Domicilio" disabled>
	</div>
  </div>

  <div class="form-row">
	<div class="form-group col-4">
	  <label>Municipio</label>
	  <input type="text" class="form-control" name="municipio" id="municipio" placeholder="Municipio" disabled>
	</div>
	<div class="form-group col-4">
	  <label>Estado</label>
	  <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado" disabled>
	</div>
	<div class="form-group col-4">
	  <label>Codigo Postal</label>
	  <input type="text" class="form-control" name="cp" id="cp" placeholder="Codigo Postal" disabled>
	</div>
  </div>

  <div class="form-row">
	<div class="form-group col-4">
	  <label>Corporación de la que proviene</label>
	  <input type="text" class="form-control" name="corporacion" id="corporacion" placeholder="Corporación de la que proviene" disabled>
	</div>
	<div class="form-group col-4">
	  <label>Servicio Medico</label>
	  <select class="form-control" name="ser_m" id="ser_m">
	  	<option>Seleccionar</option>
	  	<option value="1">IMSS</option>
	  	<option value="2">ISSSTELEON</option>
	  	<option value="3">ISSSTE</option>
	  	<option value="4">Municipal</option>
	  	<option value="5">Particular</option>
	  </select>
	</div>
	<div class="form-group col-4">
	  <label>Estado de Aprobación</label>
	  <select class="form-control" name="estado_m" id="estado_m">
	  	<option>Seleccionar</option>
	  	<option value="1">Satisfactorio</option>
	  	<option value="2">N.S.A.R</option>
	  	<option value="3">No Satisfactorio</option>
	  </select>
	</div>
  </div>
