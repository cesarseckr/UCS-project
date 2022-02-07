function add(id){
    var form=id;
    var datos = new FormData($(form)[0]);
    var action= $(form).attr("action");
    var enctype= $(form).attr("enctype");
    var method= $(form).attr("method");
      $.ajax({
        url: action,
        enctype: enctype,
        type: method,
        processData: false,
        contentType: false,
        data: datos,
        success: function (data) {
          if (data=="1") {
            alerta_correcto("Correcto",
              "Consulta asignada correctamente");
          }else {
            alerta_error("Error",
              "A ocurrido un error al tratar de registrar");
            console.log("Error: "+data);
          }
        }
      });
    $("#tabla").load(" #tabla", function(){
      tabla("Listado de usuarios");
    });
}

$(document).ready(function(){
	var elemento_id_u= document.getElementById("div_id");
	var elemento_matricula_usuario = document.getElementById("div_matricula");
	var elemento_area_admin = document.getElementById("div_admin");
  document.getElementById("buscador-usuarios").disabled = true;
  document.getElementById("verificar_datos").disabled = true;
	elemento_area_admin.style.display="none";


  $('#tipo').on('change', function(){ 
	 	var tipo_val = $('#tipo').val();
    if (tipo_val=="1" || tipo_val=="2" || tipo_val=="3" || tipo_val=="99" ) {
      document.getElementById("buscador-usuarios").disabled = false;
      document.getElementById("verificar_datos").disabled = false;
    }else{
      document.getElementById("buscador-usuarios").disabled = true;
      document.getElementById("verificar_datos").disabled = true;
    }

    if (tipo_val=="3" || tipo_val=="99") {
	 		elemento_area_admin.style.display="inline";
	 	}else{
	 		elemento_area_admin.style.display="none";
	 	}
	})

	$('#verificar_datos').on('click', function(){
		//obtenemos el texto introducido en el campo
      var tipo_val = $('#tipo').val();
     	var consulta = $("#buscador-usuarios").val();

  	$(document).ready(function(){
    	$("#lista-resultado").html('<center><img src="img/ajax-loader.gif" /></center>'); 
        $.ajax({
          type: "POST",
          url: "php/comprobar-usuarios.php",
          //data: "b="+consulta,
          data: {'consulta': consulta,
                 'tipo_val': tipo_val},
          dataType: "json",
          error: function(){
             alert("error petición ajax");
          },
          success: function(data){
          	$("#lista-resultado").html(data.nombre+" - "+data.matricula);
            	$("#id_u").val(data.id_u);
            	$("#id_datos").val(data.matricula);
            	$("#nombre-usuario").val(data.nombre);
          }
        });
    });                        
	});

  $(document).on('click', '#modificar_usuario',function(){
      $("#mod_id_u").val($(this).attr('btn-id_usuario'));
      $("#mod_area_admin").val($(this).attr('btn-id_tipo'));
      $("#mod_usuario").val($(this).attr('btn-usuario'));
      $("#mod_estatus").val($(this).attr('btn-estatus'));
   });

})