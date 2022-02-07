	<script type="">
		//AGREGANDO DATOS
		

		$(document).ready(function(){
			var elemento_id_u= document.getElementById("div_id");
			var elemento_matricula_usuario = document.getElementById("div_matricula");
	 		var elemento_area_admin = document.getElementById("div_admin");
	 		/*elemento_id_u.style.display= "none";
	 		elemento_matricula_usuario.style.display= "none";
	 		elemento_area_admin.style.display= "none";*/

	 		 $('#tipo').on('change', function(){ 
	 		 	var tipo_val = $('#tipo').val();
	 		 	if (tipo_val=="99") {
	 		 		elemento_area_admin.style.display="inline";
	 		 	}else{
	 		 		elemento_area_admin.style.display="none";
	 		 	}
	 		 })

		    $(document).on("click","#insertar_admin", 
		      function(){
 		      	  var matricula =$("#matricula-usuario").val();
		          var id_datos= $("#id_u").val();
		          var tipo=$("#tipo").val();
		          var area_admin=$("#area_admin").val();
		          var usuario=$("#usuario").val().trim();
		          var pass=$("#pass").val().trim();
		          var estatus=$("#estatus").val();

		          if(id_u == 0){
		          	alert("La clave no es correcta, ingrese una clave valida");
		          }else{
			          if (usuario.length == 0) {
					      	alert("Ingrese un usuario");
					    }else if(pass.length == 0){
					    	alert("Ingrese una contraseña+");
					    }else{
					    	$.ajax({
			              url:"panelAdmin9/insertar_datos.php",
			              method:"POST",
			              data:{id_datos:id_datos, 
			                    tipo: tipo,
			                    area_admin: area_admin,
			                    usuario: usuario,
			                    pass: pass,
			                    estatus: estatus},
			              success: function(data){
			                  alert(data);
			                  if(data=="Usuario registrado"){ 
			                  recargar();
			                  }
			              } 

			          		})
					    }
				  }

		          

		          function recargar(){
		          	location.reload(); 
		          }

		      })
		})

		 function verificarDatos(){
	         //obtenemos el texto introducido en el campo
	         consulta = $("#buscador-usuarios").val();	
	      	  $(document).ready(function(){
	      	    $("#lista-resultado").html('<center><img src="panelAdmin9/img/ajax-loader.gif" /></center>'); 
	                 $.ajax({
	                      type: "POST",
	                      url: "panelAdmin9/comprobar-usuarios.php",
	                      data: "b="+consulta,
	                      dataType: "json",
	                      error: function(){
	                            alert("error petición ajax");
	                      	},
	                      success: function(data){
	                      $("#lista-resultado").html(data.nombre+" - "+data.matricula);
	                      $("#id_u").val(data.id_u);
	                      $("#matricula-usuario").val(data.matricula);
	                      $("#nombre-usuario").val(data.nombre);
	                      	}
	                  });
	            });
	                        
		}
		//AGREGANDO DATOS 

	</script>
	<div class="container">
		<p>
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Añadir Administrativo</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<form id="formulario" >
					  <div class="form-row">
					    <div class="form-group col-md-12">
					    	<div class="input-group">
	                          <input type="text" class="form-control" id="buscador-usuarios">
	                         
	                          <div class="input-group-append">
		                          <div class="input-group-append">
								    <button class="btn btn-outline-secondary" type="button" onclick="verificarDatos()"><i class="fa fa-search"></i></button>
								  </div>
	                          </div>
	                          <div class="col-md-12">
	                           <div id="lista-resultado"></div>
	                    	  </div>	
	                    	</div>
						     <br>
						      <div id="div_id">
						      	<label for="input" disabled>ID</label>
						      	<input  class="form-control" id="id_u" placeholder="ID" disabled>
						      	<br>
						      </div>
						      <div id="div_matricula">
						      	<label for="input" disabled>Matricula</label>
						      	<input  class="form-control" id="matricula-usuario" placeholder=" Matricula" disabled>
						      	<br>
						      </div>
						      <label for="input" disabled>Nombre</label>
						      <input  class="form-control" id="nombre-usuario" placeholder="Nombre - matricula" disabled>
						      <br>
						      <label for="input">Tipo</label>
						      <select id="tipo" class="form-control">
						        <option value="1" selected>Docente</option>
						        <option value="2">Alumno</option>
						        <option value="99">Administrativo</option>
						      </select>
						      <div id="div_admin">
						      	  <br>
							      <label for="input">Area de administración</label>
							      <select id="area_admin" class="form-control">
							        <option value="1" selected>Control Escolar</option>
							        <option value="2">Formación Básica</option>
							        <option value="3">Área Médica</option>
							        <option value="4">Especialización</option>
							        <option value="5">Control Interno</option>
							        <option value="6">Comunicación e Imagen</option>
							        <option value="7">Comandancia y disciplina</option>
							        <option value="8">Compras</option>
							        <option value="9">Sistemas</option>
							        <option value="10">Dirección</option>
							      </select>
							      </div>
						      <br>
						      <label for="input" class="required">Usuario</label>
						      <input  class="form-control" id="usuario" placeholder="Usuario">
						      <br>
						      <label for="inputPassword4" class="required">Contraseña</label>
						      <input type="password" class="form-control" id="pass" placeholder="Password">
						      <br>
						      <label for="input">Estatus</label>
						      <select  id="estatus" class="form-control">
						        <option value="1" selected>Activo</option>
						        <option value="2">Inactivo</option>
						      </select>
					    </div>
					  </div> 
					</form>

			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary" id="insertar_admin">Registro</button>
			      </div>
			    </div>
			  </div>
			</div>
		</p>
	</div>