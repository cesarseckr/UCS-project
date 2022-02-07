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
          tabla("Listado de archivos");
        });
      }else {
        alerta_error("Error",
          "A ocurrido un error al tratar de registrar");
        console.log("Error: "+data);
      }
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
  $.ajax({
    type:'POST',
    url:'archivos/del_archivosE.php',
    data:{id_archivo:id_archivo},
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



