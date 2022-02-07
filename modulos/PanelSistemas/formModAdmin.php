<!DOCTYPE html>
<html>
<head>
	 <!-- Required meta tags -->
				  <meta charset="utf-8">
				  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				  <title>UCS - Acceder</title>
			  
			  <!-- plugins:css -->
				  <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
				  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
				  <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
			  <!-- endinject -->
			  
			  <!-- plugin css for this page -->
    		  	<link rel="stylesheet" href="../vendors/iconfonts/font-awesome/css/font-awesome.css">
  			  <!-- End plugin css for this page -->
			  
			  <!-- inject:css -->
			  	<link rel="stylesheet" href="../css/style.css">
			  <!-- endinject -->
			  
			  	<link rel="shortcut icon" href="../images/favicon.png" />
			  
			  <!-- boostrap -->
			  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			  <!-- boostrap -->

			  <!-- jquery -->
			  	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
			  <!-- jquery -->

			  <!-- hoja de funciones -->
			  	<script src="panelAdmin9/funciones_js_mod_admin.js"></script>
			  <!-- hoja de funciones -->
			  <script type="text/javascript">
			  		$(document).on("click","#modificar_usuarios", 
		      		function(){
		      		  var id_usuario= $("#id_usuario").val();
		      		  var id_datos= $("#id_datos").val();
			          var area_admin=$("#area_admin").val();
			          var usuario=$("#usuario").val();
			          var pass=$("#pass").val();
			          var estatus=$("#estatus").val();

			        
			          $.ajax({
		              url:"modificar_datos_usuarios.php",
		              method:"POST",
		              data:{id_usuario:id_usuario,
		              		id_datos:id_datos,
		                    area_admin: area_admin,
		                    usuario: usuario,
		                    pass: pass,
		                    estatus: estatus},
		              success: function(data){
		                  alert(data);
		                  window.location='tabla_usuario.php';
		              } 

		          	  })

		      		})
			  </script>
</head>
<body>
	<div class="container">
		<div class="modal-body">

	<?php 
		require("conexioncon.php");
		$id_usuario=$_GET[id_usuario]; 
		$query="SELECT * FROM usuarios WHERE id_usuario='$id_usuario'";

		$consulta = $con-> query($query);

		if($consulta->num_rows >0){
			while($fila = $consulta->fetch_assoc()) { 
				echo "
					<form>
					  <div class='form-row'>
					    <div class='form-group col-md-6'>
					      <input class='form-control' id='id_usuario' value='".$fila["id_usuario"]."' placeholder='Id Datos' style='display:none;'>
					      <label for='input'>Id Datos</label>
					      <input class='form-control' id='id_datos' value='".$fila["id_datos"]."' placeholder='Id Datos'>
					      <br>
					      ";
					      if ($fila["tipo"]==99) {
					      	echo"
					      		<div id='div_admin'>
						      <label for='input'>Area de administración</label>
						      <select id='area_admin' class='form-control' >
						      ";
						      if($fila["area_admin"]==1){
					      		echo"
							        <option value='1' selected>Control Escolar</option>
							        <option value='2'>Formación Básica</option>
							        <option value='3'>Área Médica</option>
							        <option value='4'>Especialización</option>
							        <option value='5'>Control Interno</option>
							        <option value='6'>Comunicación e Imagen</option>
							        <option value='7'>Comandancia y disciplina</option>
							        <option value='8'>Compras</option>
							        <option value='9'>Sistemas</option>
							        <option value='10'>Dirección</option>
							        ";
							   }else if($fila["area_admin"]==2){
							   	echo"
							        <option value='1'>Control Escolar</option>
							        <option value='2' selected>Formación Básica</option>
							        <option value='3'>Área Médica</option>
							        <option value='4'>Especialización</option>
							        <option value='5'>Control Interno</option>
							        <option value='6'>Comunicación e Imagen</option>
							        <option value='7'>Comandancia y disciplina</option>
							        <option value='8'>Compras</option>
							        <option value='9'>Sistemas</option>
							        <option value='10'>Dirección</option>
							        ";
							   }else if($fila["area_admin"]==3){
							   	echo"
							        <option value='1'>Control Escolar</option>
							        <option value='2'>Formación Básica</option>
							        <option value='3'selected>Área Médica</option>
							        <option value='4'>Especialización</option>
							        <option value='5'>Control Interno</option>
							        <option value='6'>Comunicación e Imagen</option>
							        <option value='7'>Comandancia y disciplina</option>
							        <option value='8'>Compras</option>
							        <option value='9'>Sistemas</option>
							        <option value='10'>Dirección</option>
							        ";
							   }else if($fila["area_admin"]==4){
							   	echo"
							        <option value='1'>Control Escolar</option>
							        <option value='2'>Formación Básica</option>
							        <option value='3'>Área Médica</option>
							        <option value='4' selected>Especialización</option>
							        <option value='5'>Control Interno</option>
							        <option value='6'>Comunicación e Imagen</option>
							        <option value='7'>Comandancia y disciplina</option>
							        <option value='8'>Compras</option>
							        <option value='9'>Sistemas</option>
							        <option value='10'>Dirección</option>
							        ";
							   }else if($fila["area_admin"]==5){
							   	echo"
							        <option value='1'>Control Escolar</option>
							        <option value='2'>Formación Básica</option>
							        <option value='3'>Área Médica</option>
							        <option value='4'>Especialización</option>
							        <option value='5' selected>Control Interno</option>
							        <option value='6'>Comunicación e Imagen</option>
							        <option value='7'>Comandancia y disciplina</option>
							        <option value='8'>Compras</option>
							        <option value='9'>Sistemas</option>
							        <option value='10'>Dirección</option>
							        ";
							   }else if($fila["area_admin"]==6){
							   	echo"
							        <option value='1'>Control Escolar</option>
							        <option value='2'>Formación Básica</option>
							        <option value='3'>Área Médica</option>
							        <option value='4'>Especialización</option>
							        <option value='5'>Control Interno</option>
							        <option value='6' selected>Comunicación e Imagen</option>
							        <option value='7'>Comandancia y disciplina</option>
							        <option value='8'>Compras</option>
							        <option value='9'>Sistemas</option>
							        <option value='10'>Dirección</option>
							        ";
							   }else if($fila["area_admin"]==7){
							   	echo"
							        <option value='1'>Control Escolar</option>
							        <option value='2'>Formación Básica</option>
							        <option value='3'>Área Médica</option>
							        <option value='4'>Especialización</option>
							        <option value='5'>Control Interno</option>
							        <option value='6'>Comunicación e Imagen</option>
							        <option value='7' selected>Comandancia y disciplina</option>
							        <option value='8'>Compras</option>
							        <option value='9'>Sistemas</option>
							        <option value='10'>Dirección</option>
							        ";
							   }else if($fila["area_admin"]==8){
							   	echo"
							        <option value='1'>Control Escolar</option>
							        <option value='2'>Formación Básica</option>
							        <option value='3'>Área Médica</option>
							        <option value='4'>Especialización</option>
							        <option value='5'>Control Interno</option>
							        <option value='6'>Comunicación e Imagen</option>
							        <option value='7'>Comandancia y disciplina</option>
							        <option value='8' selected>Compras</option>
							        <option value='9'>Sistemas</option>
							        <option value='10'>Dirección</option>
							        ";
							   }else if($fila["area_admin"]==9){
							   	echo"
							        <option value='1'>Control Escolar</option>
							        <option value='2'>Formación Básica</option>
							        <option value='3'>Área Médica</option>
							        <option value='4'>Especialización</option>
							        <option value='5'>Control Interno</option>
							        <option value='6'>Comunicación e Imagen</option>
							        <option value='7'>Comandancia y disciplina</option>
							        <option value='8'>Compras</option>
							        <option value='9' selected>Sistemas</option>
							        <option value='10'>Dirección</option>
							        ";
							   }else if($fila["area_admin"]==10){
							   	echo"
							        <option value='1'>Control Escolar</option>
							        <option value='2'>Formación Básica</option>
							        <option value='3'>Área Médica</option>
							        <option value='4'>Especialización</option>
							        <option value='5'>Control Interno</option>
							        <option value='6'>Comunicación e Imagen</option>
							        <option value='7'>Comandancia y disciplina</option>
							        <option value='8'>Compras</option>
							        <option value='9'>Sistemas</option>
							        <option value='10' selected>Dirección</option>
							        ";
							   }
							   echo"
							   }
						      </select>
						  </div>
						  <br>
					      	";
					      }
					      echo"
					      <label for='input'>Usuario</label>
					      <input  class='form-control' id='usuario' placeholder='Usuario' value='".$fila["usuario"]."'>
					      <br>
					      <label for='inputPassword4'>Contraseña</label>
					      <input type='password' class='form-control'  id='pass' placeholder='Password' value='".$fila["pass"]."'>
					      <br>
					      <label for='input'>Estatus</label>
					      <select  id='estatus' class='form-control'>
					      ";
					      if($fila["estatus"]==1){
					      	echo"
					        <option value='1' selected>Activo</option>
					        <option value='2'>Inactivo</option>";
					    	}else if($fila["estatus"]==2){
					      	echo"
					        <option value='1'>Activo</option>
					        <option value='2' selected>Inactivo</option>";
					    	}
					    	echo"	
					      </select>
					    </div>
					  </div> 
					</form>

					";
			}
		}
	
	echo"	
      </div>
      <div class='modal-footer'>
		<button type='submit' class='btn btn-primary' id='modificar_usuarios'>Modificar</button>
      </div>";
?>
				
				
		</div>
</body>
</html>