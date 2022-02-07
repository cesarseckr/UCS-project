	$(document).ready(function(){
	  function limpiarForm(){	
			$('#tituloEvent').html('');
			$('#txtId').val('');
			$('#txtTitulo').val('');
			$('#txtDescripcion').val('');
			$('#txtColor').val('');
			$('#txtColorTexto').val('');
			$('#txtHoraInicio').val('');
			$('#txtHoraFin').val('');
			$('#txtFechaFin').val('');
		}	

      $('#CalendarioWeb').fullCalendar({
        header:{
          left:'prev,next,today',
          center:'title',
          right:'year, month, agendaWeek, agendaDay, listWeek'
        },
          views: {
    anio: {
      type: 'month',
      duration: { year: 1 },
      buttonText: 'Año'
    }
	},
        events:'calendar/add_eventosE.php',
        editable:true,
        disableResizing: false,
        durationEditable: true,
        dayClick: function(date, jsEvent,view){
			var btnAgregar = document.getElementById("btnAgregar");
	 			btnAgregar.style.display= "inline";
	 		var btnModificar = document.getElementById("btnModificar");
	 			btnModificar.style.display= "none";
	 		var btnBorrar = document.getElementById("btnBorrar");
	 			btnBorrar.style.display= "none";
	 		var txtId_usuario = document.getElementById("txtId_usuario");
	 			txtId_usuario.style.display= "none";

			limpiarForm();
			if (date.hasTime()) {
			$('#txtFechaInicio').val(date.format());
			$('#txtFechaFin').val(date.add(30,'minutes').format());
			$('#dayModalMod').modal();

			}
			else{
			$('#txtFechaInicio').val(date.format()+"T00:00");
			$('#txtFechaFin').val(date.format()+"T23:59");
			$('#dayModalMod').modal();
			}

		},
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
			$('#txtColorTexto').val(calEvent.textColor);
			var responsable=calEvent.id_encargado;
			$.ajax({
				type:'POST',
				url:'calendar/nombre_usuario.php',
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
		},
		eventDrop:function(calEvent){
			$('#txtId').val(calEvent.id_eventos);
			$('#txtTitulo').val(calEvent.title);
			$('#txtDescripcion').val(calEvent.descripcion);
			$('#txtColor').val(calEvent.color);
			$('#txtColorTexto').val(calEvent.textColor);

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
		},
		eventResize:function(calEvent){
		$('#txtId').val(calEvent.id_eventos);
		$('#txtTitulo').val(calEvent.title);
		$('#txtDescripcion').val(calEvent.descripcion);
		$('#txtColor').val(calEvent.color);
		$('#txtColorTexto').val(calEvent.textColor);
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
				textColor:$('#txtColorTexto').val(),
				end:$('#txtFechaFin').val()
			};
			console.log(NuevoEvento);
		}

		function EnviarInformacion(accion,objEvento,modal){
			$.ajax({
				type:'POST',
				url:'calendar/add_eventosE.php?accion='+accion,
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