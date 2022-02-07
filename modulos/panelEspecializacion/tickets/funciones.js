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

$(document).ready(function(){
  notificacion_ticket();
})

function notificacion_ticket(){
  $.ajax({
    url: 'tickets/notificacion_ticket.php',
    success: function (data) {
      if (data!="") {
        var msj="Tienes";
        var msj2="tickets pendientes";
        $('#notificacion_ticket_side').html(data);
        $('#notificacion_ticket_nav').html(data);
        $('#notificacion_ticket_btn').html(data);
        $('#not_msj').html(msj+" "+data+" "+msj2);
      }else {
        alerta_error("Error",
          "A ocurrido un error al tratar de registrar");
        console.log("Error: "+data);
      }
    }
  });
}

//Funciones Tickets (NO COLOCAR AUN)
$('#nuevo_ticket').ready(function(){
  $.ajax({
      type: 'POST',
      url:'tickets/cargar_areas.php'
    }).done(function(lista){
      $('#area_add_ticket').html(lista)
    }).fail(function(){
      alert('Hubo un error al cargar las fatas');
  })
  notificacion_ticket();
})

$('#ver_ticket').ready(function(){

  $.ajax({
      type: 'POST',
      url:'tickets/cargar_areas.php'
    }).done(function(lista){
      $('#area_mod_ticket').html(lista)
    }).fail(function(){
      alert('Hubo un error al cargar las fatas');
  })
  $("#historial_chat").animate({scrollTop: $("#historial_chat").height()},1000);
  notificacion_ticket();
})

$(document).on('click','#responder_ticket',function(){
  var id_tickets = $('#id_mod_ticket').val();
  var mensaje= $('#origen_mensaje_ticket').val();
  if (mensaje === "") {

  }else{
    $.ajax({
      url:"tickets/responder_ticketE.php",
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
  $("#historial_chat").animate({scrollTop: $("#historial_chat").height()},1000);
  notificacion_ticket();
  $("#tabla").load(" #tabla", function(){
    tabla("Listado de usuarios");
  });
})

  $(document).on('click', '#ver_ticket',function(){
    $('#id_mod_ticket').val($(this).attr('id_tickets'));
    $('#titulo_mod_ticket').val($(this).attr('titulo'));
    $('#area_mod_ticket').val($(this).attr('id_area'));
    $('#prioridad_mod_ticket').val($(this).attr('prioridad'));
    $('#estado_mod_ticket').val($(this).attr('estado'));
    var id_tickets= $(this).attr('id_tickets');
    if($(this).attr('estado')==2 || $(this).attr('estado')==3){ 
    $('#cerrar_ticket').prop("disabled",true);
    $('#responder_ticket').prop("disabled",true);
    $('#origen_mensaje_ticket').prop("disabled",true);
    }
    else{
    $('#cerrar_ticket').prop("disabled",false);
    $('#responder_ticket').prop("disabled",false);
    $('#origen_mensaje_ticket').prop("disabled",false);
    }
    cargar_mensajes_tickets(id_tickets);
    notificacion_ticket();
  });

  function cargar_mensajes_tickets(id_tickets){
    $.ajax({
        type: 'POST',
        url:'tickets/cargar_contenido_tickets.php',
        data:{id_tickets:id_tickets}
      }).done(function(lista){
        $('#historial_chat').html(lista);
      }).fail(function(){
        alert('Hubo un error al cargar las fatas');
    })
    notificacion_ticket();
  }

  $(document).on('click', '#cerrar_ticket',function(){
    var id_tickets = $('#id_mod_ticket').val();
    Swal.fire({
      title: "Cerrar Ticket",
      text: "¿Esta seguro que desea finalizar este ticket?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#424964',
      cancelButtonColor: '#d33',
      confirmButtonText: "Confirmar",
      cancelButtonText: "Cancelar"
    }).then((result) => {
      if (result.value) {
        $ .ajax({
          url:"tickets/cerrar_ticketE.php",
          type:"POST",
          data:{id_tickets:id_tickets},
          success: function(data){
            if (data==1) {
              alerta_correcto("Correcto",
              "Consulta asignada correctamente");
              $("#tabla").load(" #tabla", function(){
                tabla("Listado de Tickets");
              });
            }else {
              alerta_error("Error",
                  "A ocurrido un error al tratar de registrar");
              console.log("Error: "+data);
              $("#tabla").load(" #tabla", function(){
                tabla("Listado de Tickets");
              });
            }
          }
        })
      }
    })
  });
//Funciones Tickets (NO COLOCAR AUN)