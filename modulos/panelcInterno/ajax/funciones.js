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
          if (data==1) {
            alerta_correcto("Correcto",
              "Consulta asignada correctamente");
            $("#tabla").load(" #tabla", function(){
              tabla("Listado de usuarios");
            });
          }else {
            alerta_error("Error",
              "A ocurrido un error al tratar de registrar");
            console.log("Error: "+data);
          }
        }
      });
}

$(document).on('click', '#del_categoria',function(){
    var id_categoria =$(this).attr('id_categoria');
    $.ajax({
      type:'POST',
      url:'php/del_categoriaE.php',
      data:{id_categoria:id_categoria},
      success:function(data){
        if (data==1) {
            alerta_correcto("Correcto",
              "Consulta asignada correctamente");
            $("#tabla").load(" #tabla", function(){
              tabla("Listado de usuarios");
            });
          }else {
            alerta_error("Error",
              "A ocurrido un error al tratar de registrar");
            console.log("Error: "+data);
            $("#tabla").load(" #tabla", function(){
              tabla("Listado de usuarios");
            });
        }
      }
    })
 });

$(document).on('click', '#mod_categoria',function(){
    $('#id_categoria_mod').val($(this).attr('id_categoria'));
    $('#categoria_mod').val($(this).attr('categoria'));
 });

$('#nuevo_articulo').ready(function(){
  $.ajax({
      type: 'POST',
      url:'php/cargar_articulo.php'
    }).done(function(lista){
      $('#categoria_add_articulo').html(lista)
    }).fail(function(){
      alert('Hubo un error al cargar las categorias');
  })
})

$(document).ready(function(){
  $.ajax({
      type: 'POST',
      url:'php/cargar_articulo.php'
    }).done(function(lista){
      $('#categoria_mod_articulo').html(lista)
    }).fail(function(){
      alert('Hubo un error al cargar las categorias');
  })

  llenar_tabla_articulos(1000);
})

$(document).ready(function(){
  $.ajax({
      type: 'POST',
      url:'php/seleccion_cargar_articulo.php'
    }).done(function(lista){
      $('#select-categorias').html(lista)
    }).fail(function(){
      alert('Hubo un error al cargar las categorias');
  })
})

$(document).on('click', '#mod_articulo',function(){
    $('#id_mod_articulo').val($(this).attr('id_articulo'));
    $('#titulo_mod_articulo').val($(this).attr('titulo'));
    $('#desc_mod_articulo').val($(this).attr('descripcion'));
    $('#contenido_mod_articulo').val($(this).attr('contenido'));
    $('#estatus_mod_articulo').val($(this).attr('estatus'));
    $('#categoria_mod_articulo').val($(this).attr('id_categoria'));
 });

$(document).on('change', '#select-categorias',function(){
  var id_categoria=$('#select-categorias').val();
  llenar_tabla_articulos(id_categoria);
});

function llenar_tabla_articulos(id_categoria){
  $.ajax({
    url:"php/cargar_tabla_noticias.php",
    type:"POST",
    data:{id_categoria:id_categoria},
    success: function(data){
      $('#tbody_articulos').html(data);
    }
  })
}




/*	$(document).ready(function(){
	  function limpiarForm(){		
			$('#tituloEvent').html('');
			$('#txtId').val('');
			$('#txtTitulo').val('');
			$('#txtDescripcion').val('');
			$('#txtColor').val('');
			$('#txtHoraInicio').val('');
			$('#txtHoraFin').val('');
			$('#txtFechaFin').val('');
		}	

      $('#CalendarioWeb').fullCalendar({
        header:{
          left:'today,prev,next',
          center:'title',
          right:'month, basicWeek, basicDay, agendaWeek'
        },
        dayClick: function(date,jsEvent,view){
			var btnAgregar = document.getElementById("btnAgregar");
	 			btnAgregar.style.display= "inline";
	 		var btnModificar = document.getElementById("btnModificar");
	 			btnModificar.style.display= "none";
	 		var btnBorrar = document.getElementById("btnBorrar");
	 			btnBorrar.style.display= "none";
	 		var txtId_usuario = document.getElementById("txtId_usuario");
	 			txtId_usuario.style.display= "none";
			limpiarForm();
			$('#txtFechaInicio').val(date.format()+"T00:00");
			$('#txtFechaFin').val(date.format()+"T23:59");
			$('#dayModalMod').modal();

		},events:'http://localhost/ucs/modulos/panelfBasica/php/add_eventosE.php',
		eventClick: function(calEvent,jsEvent,view){
			var btnAgregar = document.getElementById("btnAgregar");
				btnAgregar.style.display= "none";
			var btnModificar = document.getElementById("btnModificar");
				btnModificar.style.display= "inline";
			var btnBorrar = document.getElementById("btnBorrar");
				btnBorrar.style.display= "inline";
			var txtId_usuario = document.getElementById("txtId_usuario");
	 			txtId_usuario.style.display= "inline";

			$('#tituloEvent').html(calEvent.title);

			$('#txtId').val(calEvent.id_eventos);
			$('#txtTitulo').val(calEvent.title);
			$('#txtDescripcion').val(calEvent.descripcion);
			$('#txtColor').val(calEvent.color);
			var responsable=calEvent.id_encargado;
			$.ajax({
				type:'POST',
				url:'php/nombre_usuario.php',
				data:{'responsable':responsable},
				success:function(data){
					$('#txtId_usuario').html("Por "+data);	
				}
			});
			var startf=calEvent.start.format("YYYY-MM-DD");
			var startH=calEvent.start.format("HH:mm");
			var startC=startf+"T"+startH;
			$('#txtFechaInicio').val(startC);

			var endf=calEvent.end.format("YYYY-MM-DD");
			var endH=calEvent.end.format("HH:mm");
			var endC=endf+"T"+endH;
			$('#txtFechaFin').val(endC);
			
			$('#dayModalMod').modal(); 
		},editable:true,
		eventDrop:function(calEvent){
			$('#txtId').val(calEvent.id_eventos);
			$('#txtTitulo').val(calEvent.title);
			$('#txtDescripcion').val(calEvent.descripcion);
			$('#txtColor').val(calEvent.color);

			var startf=calEvent.start.format("YYYY-MM-DD");
			var startH=calEvent.start.format("HH:mm");
			var startC=startf+"T"+startH;
			$('#txtFechaInicio').val(startC);

			var endf=calEvent.end.format("YYYY-MM-DD");
			var endH=calEvent.end.format("HH:mm");
			var endC=endf+"T"+endH;
			$('#txtFechaFin').val(endC);
			
			RecolectarDatosGUI();
			EnviarInformacion('modificar',NuevoEvento,true);
		}
      });
      var NuevoEvento;
		$('#btnAgregar').click(function(){
			RecolectarDatosGUI();
			EnviarInformacion('agregar',NuevoEvento);
		});

		$('#btnBorrar').click(function(){
			RecolectarDatosGUI();
			EnviarInformacion('eliminar',NuevoEvento);
		});

		$('#btnModificar').click(function(){
			RecolectarDatosGUI();
			EnviarInformacion('modificar',NuevoEvento);
		});

		function RecolectarDatosGUI(){
			NuevoEvento={
				id:$('#txtId').val(),
				title:$('#txtTitulo').val(),
				start:$('#txtFechaInicio').val(),
				color:$('#txtColor').val(),
				descripcion:$('#txtDescripcion').val(),
				textColor:"#ffffff",
				end:$('#txtFechaFin').val()
			};
			console.log(NuevoEvento);
		}

		function EnviarInformacion(accion,objEvento,modal){
			$.ajax({
				type:'POST',
				url:'php/add_eventosE.php?accion='+accion,
				data:objEvento,
				success:function(data){
					$('#CalendarioWeb').fullCalendar('refetchEvents');
					if (!modal) {
						$('#dayModalMod').modal('toggle');
					}
					console.log("Error: "+data);	
				}
			});
		}
    });

$(document).on('click', '#modificar_falta',function(){
	$('#id_falta').val($(this).attr('id_faltas'));
    $('#mod-falta').val($(this).attr('faltas'));
    $('#mod-sancion').val($(this).attr('sancion'));
    $('#mod-primer').val($(this).attr('primer'));
    $('#mod-segunda').val($(this).attr('segunda'));
    $('#mod-tercer').val($(this).attr('tercer'));
    $('#mod-nivel').val($(this).attr('nivel'));
    $('#mod-estatus').val($(this).attr('estatus'));   
 });

$(document).on('click', '#historial_discip',function(){
	$('#id_alumno').val($(this).attr('id_alumno'));
    var id_alumno = escape($("#id_alumno").val());
    $('#nombre').val($(this).attr('nombre'));
    $('#matricula').val($(this).attr('matricula'));
    $('#curp').val($(this).attr('curp'));
    llenar_tabla_faltas_alumno(id_alumno);
 });

$(document).on('click', '#add_alumno_fdisc',function(){
    var id_falta = $("#load_falta").val();
    var id_alumno = $("#id_alumno").val();
    var observaciones = $("#observaciones").val();
    $.ajax({
    	type:'POST',
    	url:'php/add_falta_alumno.php',
    	data:{id_falta:id_falta,
    		  id_alumno:id_alumno,
    		  observaciones:observaciones},
    	success:function(data){
    	  if (data==1) {
            alerta_correcto("Correcto",
              "Consulta asignada correctamente");
			llenar_tabla_faltas_alumno(id_alumno);
          }else {
            alerta_error("Error",
              "A ocurrido un error al tratar de registrar");
            console.log("Error: "+data);
            llenar_tabla_faltas_alumno(id_alumno);
    	  }
    	}
    })
 });

$(document).on('click','#eliminar_falta_historia',function(){
    var id_hist_disc = $(this).attr('id_hist_disc');
    var id_alumno = $("#id_alumno").val();
    $.ajax({
        url:"php/del_faltas_alumno.php",
        method:"POST",
        data:{id_hist_disc: id_hist_disc},
        success: function(data){
          if (data==1) {
            alerta_correcto("Correcto",
              "Consulta asignada correctamente");
			llenar_tabla_faltas_alumno(id_alumno);
          }else {
            alerta_error("Error",
              "A ocurrido un error al tratar de registrar");
            console.log("Error: "+data);
            llenar_tabla_faltas_alumno(id_alumno);
    	  }
        }
    });
});

function llenar_tabla_faltas_alumno(id_alumno){
	$.ajax({
      url:"php/cargar_tabla_faltas_alumno.php",
      type:"POST",
      data:{id_alumno:id_alumno},
      success: function(data){
        $('#tbody_alumno_falta').html(data);
      }

    })
}

$('#historial_discip').ready(function(){
	$.ajax({
      type: 'POST',
      url:'php/cargar_faltas.php'
    }).done(function(lista){
      $('#load_falta').html(lista)
    }).fail(function(){
      alert('Hubo un error al cargar las fatas');
	})
})

$(document).on('click', '#historial_permisos',function(){
	$('#fecha_inicio_perm').val(moment().format('YYYY-MM-DD')+"T00:00");
	$('#fecha_fin_perm').val(moment().format('YYYY-MM-DD')+"T23:59");
	$('#id_alumno_perm').val($(this).attr('id_alumno'));
  var id_alumno = escape($("#id_alumno_perm").val());
  $('#nombre_perm').val($(this).attr('nombre'));
  $('#matricula_perm').val($(this).attr('matricula'));
  $('#curp_perm').val($(this).attr('curp'));
  llenar_tabla_permisos_alumno(id_alumno);
 });

function llenar_tabla_permisos_alumno(id_alumno){
	$.ajax({
      url:"php/cargar_tabla_permisos_alumno.php",
      type:"POST",
      data:{id_alumno:id_alumno},
      success: function(data){
        $('#tbody_alumno_permisos').html(data);
      }

    })
}

$(document).on('click', '#add_permiso_alumno',function(){
    var id_alumno = $("#id_alumno_perm").val();
    var fecha_inicio_perm = $("#fecha_inicio_perm").val();
    var fecha_fin_perm = $("#fecha_fin_perm").val();
    var razon = $("#razon").val();
    $.ajax({
    	type:'POST',
    	url:'php/add_permiso_alumno.php',
    	data:{id_alumno:id_alumno,
    		  fecha_inicio_perm:fecha_inicio_perm,
    		  fecha_fin_perm:fecha_fin_perm,
    		  razon:razon},
    	success:function(data){
    	  if (data==1) {
            alerta_correcto("Correcto",
              "Consulta asignada correctamente");
			llenar_tabla_permisos_alumno(id_alumno);
          }else {
            alerta_error("Error",
              "A ocurrido un error al tratar de registrar");
            console.log("Error: "+data);
            llenar_tabla_permisos_alumno(id_alumno);
    	  }
    	}
    })
 });

$(document).on('click','#eliminar_permiso_alumno',function(){
    var id_permiso = $(this).attr('id_permiso');
    var id_alumno = $("#id_alumno_perm").val();
    $.ajax({
        url:"php/del_permiso_alumno.php",
        method:"POST",
        data:{id_permiso: id_permiso},
        success: function(data){
          if (data==1) {
            alerta_correcto("Correcto",
              "Consulta asignada correctamente");
			      llenar_tabla_permisos_alumno(id_alumno);
          }else {
            alerta_error("Error",
              "A ocurrido un error al tratar de registrar");
            console.log("Error: "+data);
            llenar_tabla_permisos_alumno(id_alumno);
    	  }
        }
    });
});

$(document).on('click', '#historial_faltas_permisos',function(){
  $('#id_alumno_falta_perm').val($(this).attr('id_alumno'));
  var id_alumno = escape($("#id_alumno_falta_perm").val());
  $('#nombre_falta_perm').val($(this).attr('nombre'));
  $('#matricula_falta_perm').val($(this).attr('matricula'));
  $('#curp_falta_perm').val($(this).attr('curp'));
  $.ajax({
      url:"php/cargar_tabla_faltas_permisos.php",
      type:"POST",
      data:{id_alumno:id_alumno},
      success: function(data){
        $('#tbody_permiso_falta').html(data);
      }
 });
});

$('#nuevo_ticket').ready(function(){
  $.ajax({
      type: 'POST',
      url:'php/cargar_areas.php'
    }).done(function(lista){
      $('#area_add_ticket').html(lista)
    }).fail(function(){
      alert('Hubo un error al cargar las fatas');
  })
})

$('#ver_ticket').ready(function(){
  $.ajax({
      type: 'POST',
      url:'php/cargar_areas.php'
    }).done(function(lista){
      $('#area_mod_ticket').html(lista)
    }).fail(function(){
      alert('Hubo un error al cargar las fatas');
  })
})



$(document).on('click','#responder_ticket',function(){
  var id_tickets = $('#id_mod_ticket').val();
  var mensaje= $('#origen_mensaje_ticket').val();
  if (mensaje === "") {

  }else{
    $.ajax({
      url:"php/responder_ticketE.php",
      type:"POST",
      data:{id_tickets:id_tickets,
            mensaje:mensaje},
      success: function(data){
        if (data==1) {
          cargar_mensajes_tickets(id_tickets);
          $('#origen_mensaje_ticket').val('');
        }else {
          alerta_error("Error",
              "A ocurrido un error al tratar de registrar");
          console.log("Error: "+data);
        }
      }
    });

  }
})

  $(document).on('click', '#ver_ticket',function(){
    $('#id_mod_ticket').val($(this).attr('id_tickets'));
    $('#titulo_mod_ticket').val($(this).attr('titulo'));
    $('#area_mod_ticket').val($(this).attr('id_area'));
    $('#prioridad_mod_ticket').val($(this).attr('prioridad'));
    $('#estado_mod_ticket').val($(this).attr('estado'));
    var id_tickets= $(this).attr('id_tickets');
    cargar_mensajes_tickets(id_tickets);
  });

  function cargar_mensajes_tickets(id_tickets){
    $.ajax({
        type: 'POST',
        url:'php/cargar_contenido_tickets.php',
        data:{id_tickets:id_tickets}
      }).done(function(lista){
        $('#historial_chat').html(lista);
      }).fail(function(){
        alert('Hubo un error al cargar las fatas');
    })
  }*/















