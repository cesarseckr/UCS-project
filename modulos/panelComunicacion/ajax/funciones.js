
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


$(document).on('click', '#mod_articulo',function(){
    $('#id_mod_articulo').val($(this).attr('id_articulo'));
    $('#titulo_mod_articulo').val($(this).attr('titulo'));
    $('#desc_mod_articulo').val($(this).attr('descripcion'));
    $('#contenido_mod_articulo').val($(this).attr('contenido'));
    $('#estatus_mod_articulo').val($(this).attr('estatus'));
    $('#categoria_mod_articulo').val($(this).attr('id_categoria'));
 });

