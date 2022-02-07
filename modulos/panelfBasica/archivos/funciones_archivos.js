  function add_cartas(conta){
   alerta_cargando("Cargando","Por favor espere a que se ejecuten los registros");
   var form='#form-carta'+conta;
   var id_alumno = $("#id_alumno").val();
   $(form).append("<input name='conta' value='"+conta+"' style='visibility:hidden;'>");
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
            if(data==1){
       setTimeout('alerta_correcto("Correcto","Carta compromiso asignada correctamente");', timer);   
       llenar_tabla_faltas_alumno(id_alumno);
            }
            else{
        alerta_error("Error","Seleccione un archivo menor a 6MB");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status +" - "+textStatus +" "+errorThrown);   
        }
    });
    }

$(document).on('click', '#todos_add_archivos',function(){ 
  $('input:checkbox').prop("checked", $(this).prop("checked"));
});

$(document).on('click', '#todos_mod_archivos',function(){ 
  $('input:checkbox').prop("checked", $(this).prop("checked"));
});

$(document).on('click', '#del_archivos',function(){ 
  var id_archivo = $(this).attr('id_archivo');
  var ruta = $(this).attr('ruta');
  $.ajax({
    type:'POST',
    url:'archivos/del_archivosE.php',
    data:{id_archivo:id_archivo, ruta:ruta},
    success:function(data){
      if (data==1) {
          alerta_correcto("Correcto",
            "Archivo eliminado correctamente");
          $("#tabla").load(" #tabla", function(){
            tabla("Listado de archivos");
          });
        }else {
          alerta_error("Error",
            "A ocurrido un error al tratar de eliminar");
          console.log("Error: "+data);
          $("#tabla").load(" #tabla", function(){
            tabla("Listado de archivos");
          });
      }
    }
  })
});

$(document).on('click', '#mod_archivos',function(){ 
  $('#id_archivo_mod_archivos').val($(this).attr('id_archivo'));
  $('#titulo_mod_archivos').val($(this).attr('titulo'));
  $('#categoria_archivo_m').val($(this).attr('tipo'));
  $('#categoria_archivo_m').selectpicker("refresh");
  $('#ruta_mod_archivos').val($(this).attr('ruta'));
  $('input:checkbox').prop("checked", false);
  var checked_1 = $(this).attr('checked_1');
  var checked_2 = $(this).attr('checked_2');
  var checked_3 = $(this).attr('checked_3');
  var checked_4 = $(this).attr('checked_4');
  var checked_5 = $(this).attr('checked_5');
  var checked_6 = $(this).attr('checked_6');
  var checked_7 = $(this).attr('checked_7');
  var checked_9 = $(this).attr('checked_9');
  var checked_10 = $(this).attr('checked_10');
  var checked_99 = $(this).attr('checked_99');
  var checked_alumno = $(this).attr('checked_alumno');
  var checked_docente = $(this).attr('checked_docente');

  if(checked_1=='1'){
    $('#1_mod_archivos').prop("checked",true);
  }
  if(checked_2=='1'){
    $('#2_mod_archivos').prop("checked",true);
  }
  if(checked_2=='1'){
    $('#2_mod_archivos').prop("checked",true);
  }
  if(checked_3=='1'){
    $('#3_mod_archivos').prop("checked",true);
  }
  if(checked_4=='1'){
    $('#4_mod_archivos').prop("checked",true);
  }
  if(checked_5=='1'){
    $('#5_mod_archivos').prop("checked",true);
  }
  if(checked_6=='1'){
    $('#6_mod_archivos').prop("checked",true);
  }
  if(checked_7=='1'){
    $('#7_mod_archivos').prop("checked",true);
  }
  if(checked_9=='1'){
    $('#9_mod_archivos').prop("checked",true);
  }
  if(checked_10=='1'){
    $('#10_mod_archivos').prop("checked",true);
  }
  if(checked_99=='1'){
    $('#99_mod_archivos').prop("checked",true);
  }
  if(checked_alumno=='1'){
    $('#alumnos_mod_archivos').prop("checked",true);
  }
  if(checked_docente=='1'){
    $('#docentes_mod_archivos').prop("checked",true);
  }
});


$(document).on('click','#eliminar_archivo_usuario',function(){
  alerta_cargando("Cargando","Por favor espere a que se ejecuten los registros");
    var id_archivo_usuario = $(this).attr('id_archivo_usuario');
    var ruta = $(this).attr('ruta');
    $.ajax({
        url:"archivos/del_archivo_usuarioE.php",
        method:"POST",
        data:{id_archivo_usuario:id_archivo_usuario, ruta:ruta},
        success: function(data){
          if (data==1) {
     $( "#tabla" ).load(" #tabla", function() {
        setTimeout('alerta_correcto("Correcto","Archivo eliminado correctamente");', timer); 
         tabla(titulo);
        });
          }else {
            alerta_error("Error",
              "A ocurrido un error al tratar de registrar");
            console.log("Error: "+data);
        }
        }
    });
});

$(document).on('click','#eliminar_archivo_usr',function(){
  var id_usuario=$("#id_usuario_m").val();
  alerta_cargando("Cargando","Por favor espere a que se ejecuten los registros");
    var id_archivo_usuario = $(this).attr('id_archivo_usuario');
    var ruta = $(this).attr('ruta');
    $.ajax({
        url:"archivos/del_archivo_usuarioE.php",
        method:"POST",
        data:{id_archivo_usuario:id_archivo_usuario, ruta:ruta},
        success: function(data){
          if (data==1) {
        setTimeout('alerta_correcto("Correcto","Archivo eliminado correctamente");', timer);
        cargarArchivos(id_usuario);
          }else {
            alerta_error("Error",
              "A ocurrido un error al tratar de registrar");
            console.log("Error: "+data);
        }
        }
    });
});

$(document).on('click','#eliminar_carta_compromiso',function(){
   var id_alumno = $("#id_alumno").val();
  alerta_cargando("Cargando","Por favor espere a que se ejecuten los registros");
    var id_cartas_compromiso = $(this).attr('id_cartas_compromiso');
    var ruta = $(this).attr('ruta');
    $.ajax({
        url:"archivos/del_cartas_compromisoE.php",
        method:"POST",
        data:{id_cartas_compromiso:id_cartas_compromiso, ruta:ruta},
        success: function(data){
          if (data==1) {
        setTimeout('alerta_correcto("Correcto","Archivo eliminado correctamente");', timer);
        llenar_tabla_faltas_alumno(id_alumno);
          }else {
            alerta_error("Error",
              "A ocurrido un error al tratar de registrar");
            console.log("Error: "+data);
        }
        }
    });
});

function cargarArchivos(id_usuario){
  $.ajax({
      url:"archivos/cargar_archivo_usuario.php",
      type:"POST",
      data:{id_usuario:id_usuario},
      success: function(data){
        $('#archivos_usr').html(data);
      }
 });
}