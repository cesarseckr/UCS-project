
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
          if(form=="#form-consulta"){
            limpiar_form_rp();
          }
        }else {
          alerta_error("Error",
            "A ocurrido un error al tratar de registrar");
          console.log("Error: "+data);
        }
      }
    });
  $("#tabla").load(" #tabla", function(){
    tabla("Listado de Consultas");
  }); 
}

/*------- REGISTRO DE PACIENTE--------------*/
function limpiar_form_rp(){
  $('#NombreUsuario').val("");
  $('#nombre_alum').val("");
  $('#TipoUsuario').val("");
  $('#NombreUsuario-Otro').val("");
  $('#EdadUsuario-Otro').val("");
  $('#SexoUsuario-Otro').val("");
  $('#altura_consu').val("");
  $('#peso_consu').val("");
  $('#imc_consu').val("");
  $('#presion_art_consu').val("");
  $('#frec_card_consu').val("");
  $('#frec_resp_consu').val("");
  $('#temp_consu').val("");
  $('#direccion_paciente').val("");
  var seccion_o= document.getElementById("seccion_otro");
  var seccion_al= document.getElementById("seccion_alumno");
  var nombre_u= document.getElementById("NombreUsuario-div");
  var area_direccion= document.getElementById("area_direccion");
  seccion_otro.style.display="none";
  nombre_u.style.display="none";
  seccion_alumno.style.display="none";
  area_direccion.style.display="none";
}

$(document).on('click', '#add_registro_paciente',function(){
  var seccion_o= document.getElementById("seccion_otro");
  var seccion_al= document.getElementById("seccion_alumno");
  var nombre_u= document.getElementById("NombreUsuario-div");
  var area_direccion= document.getElementById("area_direccion");
  seccion_o.style.display="none";
  nombre_u.style.display="none";
  seccion_alumno.style.display="none";
  area_direccion.style.display="none";
  $('#academia_d').prop('disabled', 'disabled');
  $('#generacion_d').prop('disabled', 'disabled');
  $('#nombre_alum').prop('disabled', 'disabled');
  $('#area_direccion').prop('disabled', 'disabled');
  
  //AJAX CARGAR TIPO USUARIO
  $.ajax({
    type: 'POST',
    url:'php/cargar_tipo.php'
  }).done(function(lista){
    $('#TipoUsuario').html(lista)
  }).fail(function(){
    alert('Hubo un error al cargar las estados')
  })

  //CARGAR SELECT PLAN
  $( "#plan" ).ready(function() {  
    $.ajax({
      url:"php/cargar_planesE.php",
      method:"POST",
      dataType: 'json',
      success: function(data){
        var array=Array.isArray(data);
        if(array==true){
          for(var i=0; i < data.length; i++){
            $("#plan").append('<option value="'+data[i].id_plan+'">'+data[i].nombre+'</option>');
          }
          $('#plan').selectpicker('refresh');
        }else{
          console.log("Error: "+data);
        }
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      } 
    }) 
  });
  //CARGAR OTROS SELECT FILTRO ALUMNO
  $(document).on('change', '#plan',function(){
    $('#academia_d').prop('disabled', false);
    if($('#ciclo_d').length){
      var id_plan= $("#plan option:selected").val();
      $.ajax({
        url:"php/cargar_ciclosE.php",
        method:"POST",
        data:{id_plan:id_plan},
        dataType: 'json',
        success: function(data){
          $('#ciclo_d').empty();
          var array=Array.isArray(data);
          if(array==true){
            for(var i=0; i < data.length; i++){
              $("#ciclo_d").append('<option value="'+data[i].id_ciclo+'">'+data[i].nombre+'</option>');
            }
            $('#ciclo_d').selectpicker('refresh');
          }
        },error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
      })
    }

    $(document).on('change', '#academia_d',function(){
      $('#generacion_d').prop('disabled', false);
      if($('#generacion_d').length){
        var id_academia= $("#academia_d option:selected").val();
        $.ajax({
          url:"php/cargar_generacionesE.php",
          method:"POST",
          data:{id_academia:id_academia},
          dataType: 'json',
          success: function(data){
            $('#generacion_d').empty();
            var array=Array.isArray(data);
            if(array==true){
              for(var i=0; i < data.length; i++){
                $("#generacion_d").append('<option value="'+data[i].id_generacion+'">'+data[i].nombre+'</option>');
              }
              $('#generacion_d').selectpicker('refresh');
            }
          },error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
          }
        })
      }
    });

    if($('#academia_d').length){
      var id_plan= $("#plan option:selected").val();
      $.ajax({
        url:"php/cargar_academiasE.php",
        method:"POST",
        data:{id_plan:id_plan},
        dataType: 'json',
        success: function(data){
          $('#academia_d').empty();
          var array=Array.isArray(data);
          if(array==true){
            for(var i=0; i < data.length; i++){
              $("#academia_d").append('<option value="'+data[i].id_academia+'">'+data[i].nombre+'</option>');
            }
            $('#academia_d').selectpicker('refresh');
          }
        },error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
      })
    }

    $(document).on('change', '#generacion_d',function(){
      $('#nombre_alum').prop('disabled', false);
      if($('#nombre_alum').length){
        var id_generacion= $("#generacion_d option:selected").val();
        $.ajax({
          url:"php/cargar_alumnosE.php",
          method:"POST",
          data:{id_generacion:id_generacion},
          dataType: 'json',
          success: function(data){
            $('#nombre_alum').empty();
            var array=Array.isArray(data);
            if(array==true){
              for(var i=0; i < data.length; i++){
                $("#nombre_alum").append('<option value="'+data[i].id_alumno+'">'+data[i].nombre+'</option>');
              }
              $('#nombre_alum').selectpicker('refresh');
            }
          },error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
          }
        })
      }
    });
  });
  //CARGAR NOMBRE DEL ALUMNO
  $(document).on('change', '#nombre_alum',function(){
    $('#fecha_art_consu').html("");
    $('#presion_art_consu').val("");
    $('#frec_card_consu').val("");
    $('#frec_resp_consu').val("");
    $('#temp_consu').val("");
    $('#fecha_smt_consu').html("");
    $('#altura_consu').val("");
    $('#peso_consu').val("");
    $('#imc_consu').val("");
    id_datos=$('#nombre_alum').val();
    tipo='1';
    $.ajax({
      url:"php/signos_vitalesE.php",
      method:"POST",
      data:{id_datos:id_datos,
            tipo:tipo},
      dataType: 'json',
      success:function(data){
        var array=Array.isArray(data);
        if(array==true){
          for(var i=0; i < data.length; i++){
            $('#fecha_art_consu').html(data[i].fecha);
            $('#presion_art_consu').val(data[i].presion_arterial);
            $('#frec_card_consu').val(data[i].f_cardiaca);
            $('#frec_resp_consu').val(data[i].f_respiratoria);
            $('#temp_consu').val(data[i].temp);
          }
        }
      },error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);
      }
    })
    $.ajax({
      url:"php/somatometria.php",
      method:"POST",
      data:{id_datos:id_datos,
            tipo:tipo},
      dataType: 'json',
      success:function(data){
        var array=Array.isArray(data);
        if(array==true){
          for(var i=0; i < data.length; i++){
            $('#fecha_smt_consu').html(data[i].fecha);
            $('#altura_consu').val(data[i].talla);
            $('#peso_consu').val(data[i].peso);
            $('#imc_consu').val(data[i].imc);
          }
        }
      },error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);
      }
    })
  })
  //CARGAR NOMBRE DE DOCENTE O ADMIN
  $(document).on('change', '#NombreUsuario',function(){
    $('#fecha_art_consu').html("");
    $('#presion_art_consu').val("");
    $('#frec_card_consu').val("");
    $('#frec_resp_consu').val("");
    $('#temp_consu').val("");
    $('#fecha_smt_consu').html("");
    $('#altura_consu').val("");
    $('#peso_consu').val("");
    $('#imc_consu').val("");
    id_datos=$('#NombreUsuario').val();
    tipo=$('#TipoUsuario').val();;
    $.ajax({
      url:"php/signos_vitalesE.php",
      method:"POST",
      data:{id_datos:id_datos,
            tipo:tipo},
      dataType: 'json',
      success:function(data){
        var array=Array.isArray(data);
        if(array==true){
          for(var i=0; i < data.length; i++){
            $('#fecha_art_consu').html(data[i].fecha);
            $('#presion_art_consu').val(data[i].presion_arterial);
            $('#frec_card_consu').val(data[i].f_cardiaca);
            $('#frec_resp_consu').val(data[i].f_respiratoria);
            $('#temp_consu').val(data[i].temp);
          }
        }
      },error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);
      }
    })
    $.ajax({
      url:"php/somatometria.php",
      method:"POST",
      data:{id_datos:id_datos,
            tipo:tipo},
      dataType: 'json',
      success:function(data){
        var array=Array.isArray(data);
        if(array==true){
          for(var i=0; i < data.length; i++){
            $('#fecha_smt_consu').html(data[i].fecha);
            $('#altura_consu').val(data[i].talla);
            $('#peso_consu').val(data[i].peso);
            $('#imc_consu').val(data[i].imc);
          }
        }
      },error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);
      }
    })
  })
  //CALCULAR IMC EN REGISTRO CONS
  $(document).on('click', '#calcuar_imc',function(){
    var talla = $('#altura_consu').val();
    var peso = $('#peso_consu').val();
    var imc= peso/(talla^2);
    $('#imc_consu').val(imc.toFixed(2));
  });
  //ACTIVAR TIPO DE PACIENTES 
  $('#TipoUsuario').on('change', function(){
    var id = $('#TipoUsuario').val();
    if(id==55){
      seccion_otro.style.display="inline";
      nombre_u.style.display="none";
      seccion_alumno.style.display="none";
      area_direccion.style.display="inline";
    }else if (id==1){
      seccion_otro.style.display="none";
      nombre_u.style.display="none";
      seccion_alumno.style.display="inline";
      area_direccion.style.display="inline";
    }else if (id==2 || id==3){
      seccion_otro.style.display="none";
      nombre_u.style.display="inline";
      seccion_alumno.style.display="none";
      area_direccion.style.display="inline";
    }else{
      seccion_otro.style.display="none";
      nombre_u.style.display="none";
      seccion_alumno.style.display="none";
      area_direccion.style.display="inline";
    }
      $.ajax({
        type: 'POST',
        url:'php/cargar_usuario.php',
        data: {'id': id}
      }).done(function(listas){
        $('#NombreUsuario').html(listas)
        $('#NombreUsuario').selectpicker('refresh');
      })
      .fail(function(){
        alert('Hubo un error al cargar los municipios')
      })        
  })
});
/*------- REGISTRO DE PACIENTE--------------*/

/*------- TOMAR CONSULTA, DISGNOSTICO, ACCIONES ENF-------*/
$(document).on('click', '#btn_diagnostico',function(){
  //DESACTIVAR CAMPO DIAS INCAPACIDAD
  $('#dias_inc').attr('disabled',true);
  //DESACTIVAR CAMPO DIAS INCAPACIDAD-ACCION
  $('#dias_inc_accion').attr('disabled',true);
  //CREAR DIAGNOSTICO
  var id_consulta = $(this).attr('id_consulta');
  var dirigir = $(this).attr('dirigir');
  $('#consulta').val(id_consulta);

  $.ajax({
    url:"php/revisar_id_consulta.php",
    type:"POST",
    data:{id_consulta:id_consulta,
          dirigir:dirigir},
    success: function(data){
      if (data != 0) {
        $.ajax({
          url:"php/buscar_id_consulta.php",
          type:"POST",
          data:{id_consulta:id_consulta,
                dirigir:dirigir},
          success: function(data){
            if(dirigir==1){
              llenar_tabla_med(data);
            }else if(dirigir==2){
              llenar_tabla_mat_accion(data);
            }
            $('#diagnostico').val(data);
          }
        })
      }else{
        $.ajax({
          url:"php/add_id_consulta.php",
          type:"POST",
          data:{id_consulta:id_consulta,
                dirigir:dirigir},
          success: function(data){
            if(dirigir==1){
              llenar_tabla_med(data);
            }else if(dirigir==2){
              llenar_tabla_mat_accion(data);
            }
            $('#diagnostico').val(data);
          }
        })
      }
    }
  })

  //LLENAR CAMPOS DE SOMATOMETRIA, SIGNOS VITALES
  $('#lb_talla').html('Talla: '+$(this).attr('talla')+' m');
  $('#lb_peso').html('Peso: '+$(this).attr('peso')+' kg');
  $('#lb_imc').html('IMC: '+$(this).attr('imc'));
  $('#lb_pres_art').html('Presión Arterial: '+$(this).attr('presion_arterial'));
  $('#lb_frec_card').html('Frecuiencia Cardiaca: '+$(this).attr('f_cardiaca'));
  $('#lb_frec_resp').html('Frecuencia Respiratoria: '+$(this).attr('f_respiratoria'))
  $('#lb_temp').html('Temperatura: '+$(this).attr('temp'));

  //CARGAR SELECT'S DIAGNOSTICO Y SISTEMA
  $.ajax({
    url:"php/cargar_diagnosticos.php",
    method:"POST",
    dataType: 'json',
    success: function(data){
      $('#ins_diagnostico').empty();
      var array=Array.isArray(data);
      if(array==true){
        for(var i=0; i < data.length; i++){
          $("#ins_diagnostico").append('<option value="'+data[i].id_lista_diagnosticos+'">'+data[i].nombre+'</option>');
        }
        $('#ins_diagnostico').selectpicker('refresh');
      }
    },error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
    }
  })
  $.ajax({
    url:"php/cargar_sistemas.php",
    method:"POST",
    dataType: 'json',
    success: function(data){
      $('#ins_sistema').empty();
      var array=Array.isArray(data);
      if(array==true){
        for(var i=0; i < data.length; i++){
          $("#ins_sistema").append('<option value="'+data[i].id_lista_sistemas+'">'+data[i].nombre+'</option>');
        }
        $('#ins_sistema').selectpicker('refresh');
      }
    },error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
    }
  })  
  //AGREGAR NUEVO DIAGNOSTICO
  $(document).on('click', '#agregar_diagnostico_select',function(){
    var diagnostico = $('#nuevo_diagnostico').val();
    $.ajax({
      url:"php/add_diagnostico_selectE.php",
      type:"POST",
      data:{diagnostico:diagnostico},
      success:function(data){
        if (data==1) {
          alerta_correcto("Correcto",
            "Consulta asignada correctamente");
          $.ajax({
            url:"php/cargar_diagnosticos.php",
            method:"POST",
            dataType: 'json',
            success: function(data){
              $('#ins_diagnostico').empty();
              var array=Array.isArray(data);
              if(array==true){
                for(var i=0; i < data.length; i++){
                  $("#ins_diagnostico").append('<option value="'+data[i].id_lista_diagnosticos+'">'+data[i].nombre+'</option>');
                }
                $('#ins_diagnostico').selectpicker('refresh');
              }
            },error: function (jqXHR, textStatus, errorThrown) {
              console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
            }
          })
        }else {
          alerta_error("Error",
            "A ocurrido un error al tratar de registrar este diagnostico");
          console.log("Error: "+data);
        }
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      }
    })
  })
  //AGREGAR NUEVA SECCION
  $(document).on('click', '#agregar_sistema_select',function(){
    var sistema = $('#nuevo_sistema').val();
    $.ajax({
      url:"php/add_sistema_selectE.php",
      type:"POST",
      data:{sistema:sistema},
      success:function(data){
        if (data==1) {
          alerta_correcto("Correcto",
            "Consulta asignada correctamente");
          $.ajax({
            url:"php/cargar_sistemas.php",
            method:"POST",
            dataType: 'json',
            success: function(data){
              $('#ins_sistema').empty();
              var array=Array.isArray(data);
              if(array==true){
                for(var i=0; i < data.length; i++){
                  $("#ins_sistema").append('<option value="'+data[i].id_lista_sistemas+'">'+data[i].nombre+'</option>');
                }
                $('#ins_sistema').selectpicker('refresh');
              }
            },error: function (jqXHR, textStatus, errorThrown) {
              console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
            }
          })
        }else {
          alerta_error("Error",
            "A ocurrido un error al tratar de registrar este sistema");
          console.log("Error: "+data);
        }
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      }
    })
  })
  //CARGAR SELECT MEDICAMENTO-CONSULTA
  $.ajax({
    url:"php/cargar_medicamentos.php",
    method:"POST",
    dataType: 'json',
    success: function(data){
      $('#ins_medicamento').empty();
      var array=Array.isArray(data);
      if(array==true){
        for(var i=0; i < data.length; i++){
          $("#ins_medicamento").append('<option value="'+data[i].id_medicamento+'">'+data[i].sustancia_activa+'</option>');
        }
        $('#ins_medicamento').selectpicker('refresh');
      }
    },error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
    }
  })
  //AGREGAR MEDICAMENTO
  $(document).on('click', '#add_medicamento',function(){
    var tipo_contenido=1;
    var mat_med=$('#ins_medicamento').val();
    var cantidad=$('#ins_med_cantidad').val();    
    var presentacion=$('#ins_med_presentacion').val();
    var tiempo=$('#ins_med_tiempo').val();
    var id_diagnostico = $("#diagnostico").val();

    $.ajax({
          url:"php/add_mat_med.php",
          method:"POST",
          data:{
            tipo_contenido:tipo_contenido, 
            mat_med: mat_med,
            cantidad: cantidad,
            presentacion: presentacion,
            tiempo: tiempo,
            id_diagnostico: id_diagnostico
          },success: function(data){
            llenar_tabla_med(id_diagnostico);
        }
    });
  })
  //LLENAR TABLA MEDICAMENTOS
  function llenar_tabla_med (id_diagnostico){
    $.ajax({
      url:"php/cargar_tabla_med.php",
      type:"POST",
      data:{id_diagnostico:id_diagnostico},
      success: function(data){
        $('#tbody_med').html(data);
      }
    })
  }
  //ELIMINAR MEDICAMENTO DE LA TABLA MEDICAMENTOS
  $(document).on('click','#del_med',function(){
    var id_tratamiento = $(this).attr('id_tratamiento');
    var id_diagnostico = $("#diagnostico").val();
    var tipo_contenido= $(this).attr('tipo_contenido');
    var mat_med= $(this).attr('mat_med');
    var presentacion= $(this).attr('presentacion');
    var tiempo= $(this).attr('tiempo'); 
    var cantidad= $(this).attr('cantidad');
    $.ajax({
          url:"php/del_mat_med.php",
          method:"POST",
          data:{id_tratamiento: id_tratamiento,
                id_diagnostico:id_diagnostico,
                tipo_contenido:tipo_contenido,
                mat_med:mat_med,
                presentacion:presentacion,
                tiempo:tiempo,
                cantidad:cantidad},
          success: function(data){
            llenar_tabla_med(id_diagnostico);
            llenar_tabla_mat(id_diagnostico);
        }
    });
  });
  //SELECCIONAR TIPO INC, DESACTIVAR DIAS INC
  $('#tipo_inc').on('change', function(){
    var tipo_inc=$('#tipo_inc').val();
    if(tipo_inc==1 || tipo_inc==2){
     $('#dias_inc').attr('disabled',false);
    }else{
     $('#dias_inc').attr('disabled',true);
    }
  })

  /*----------------ACCIONES FARMACIA------------*/

  //CARGAR SELECT ACCIÓN
  $.ajax({
    url:"php/cargar_acciones.php",
    method:"POST",
    dataType: 'json',
    success: function(data){
      $('#acciones_enf').empty();
      var array=Array.isArray(data);
      if(array==true){
        for(var i=0; i < data.length; i++){
          $("#acciones_enf").append('<option value="'+data[i].id_lista_accion+'">'+data[i].nombre+'</option>');
        }
        $('#acciones_enf').selectpicker('refresh');
      }
    },error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
    }
  })
  //AGREGAR NUEVO ACCION ENFERMERIA
  $(document).on('click', '#agregar_accion_select',function(){
    var accion = $('#nueva_accion').val();
    $.ajax({
      url:"php/add_accion_selectE.php",
      type:"POST",
      data:{accion:accion},
      success:function(data){
        if (data==1) {
          alerta_correcto("Correcto",
            "Acción asignada correctamente");
          $.ajax({
            url:"php/cargar_acciones.php",
            method:"POST",
            dataType: 'json',
            success: function(data){
              $('#acciones_enf').empty();
              var array=Array.isArray(data);
              if(array==true){
                for(var i=0; i < data.length; i++){
                  $("#acciones_enf").append('<option value="'+data[i].id_lista_accion+'">'+data[i].nombre+'</option>');
                }
                $('#acciones_enf').selectpicker('refresh');
              }
            },error: function (jqXHR, textStatus, errorThrown) {
              console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
            }
          })
        }else {
          alerta_error("Error",
            "A ocurrido un error al tratar de registrar este diagnostico");
          console.log("Error: "+data);
        }
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      }
    })
  })
  //CARGAR SELECT MEDICAMENTO-ACCION
  $.ajax({
    url:"php/cargar_medicamentos.php",
    method:"POST",
    dataType: 'json',
    success: function(data){
      $('#ins_medicamento_accion').empty();
      var array=Array.isArray(data);
      if(array==true){
        for(var i=0; i < data.length; i++){
          $("#ins_medicamento_accion").append('<option value="'+data[i].id_medicamento+'">'+data[i].sustancia_activa+'</option>');
        }
        $('#ins_medicamento_accion').selectpicker('refresh');
      }
    },error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
    }
  })
  //CARGAR SELECT MATERIALES-ACCION
  $.ajax({
    url:"php/cargar_materiales.php",
    method:"POST",
    dataType: 'json',
    success: function(data){
      $('#ins_material_accion').empty();
      var array=Array.isArray(data);
      if(array==true){
        for(var i=0; i < data.length; i++){
          $("#ins_material_accion").append('<option value="'+data[i].id_materialm+'">'+data[i].material+'</option>');
        }
        $('#ins_material_accion').selectpicker('refresh');
      }
    },error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
    }
  })
  //AGREGAR MEDICAMENTO-ACCION
  $(document).on('click', '#add_medicamento_accion',function(){
    var tipo_contenido=1;
    var mat_med=$('#ins_medicamento_accion').val();
    var cantidad=$('#ins_med_cantidad_accion').val();    
    var presentacion=$('#ins_med_presentacion_accion').val();
    var id_accion_enf =$("#diagnostico").val();
    $.ajax({
          url:"php/add_mat_med_accion.php",
          method:"POST",
          data:{
            tipo_contenido:tipo_contenido, 
            mat_med: mat_med,
            cantidad: cantidad,
            presentacion: presentacion,
            id_accion_enf: id_accion_enf
          },success: function(data){
            llenar_tabla_mat_accion(id_accion_enf);
        }
    });
  })
  //AGREGAR MATERIAL-ACCION
  $(document).on('click', '#add_material_accion',function(){
    var tipo_contenido=2;
    var mat_med=$('#ins_material_accion').val();
    var cantidad=$('#ins_mat_cantidad_accion').val();    
    var presentacion=$('#ins_mat_presentacion_accion').val();
    var id_accion_enf =$("#diagnostico").val();
    $.ajax({
          url:"php/add_mat_med_accion.php",
          method:"POST",
          data:{
            tipo_contenido:tipo_contenido, 
            mat_med: mat_med,
            cantidad: cantidad,
            presentacion: presentacion,
            id_accion_enf: id_accion_enf
          },success: function(data){
            llenar_tabla_mat_accion(id_accion_enf);
        }
    });
  })
  //LLENAR TABLA MEDICAMENTOS-MATERIALES-ACCION
  function llenar_tabla_mat_accion (id_accion_enf){
    $.ajax({
      url:"php/cargar_tabla_mat_accion.php",
      type:"POST",
      data:{id_accion_enf:id_accion_enf},
      success: function(data){
        $('#tbody_accion_enf').html(data);
      }
    })
  }
  //ELIMINAR MEDICAMENTO, MATERIA DE LA TABLA MEDICAMENTOS-MATERIALES-ACCION
  $(document).on('click','#del_med_accion',function(){
    var id_accion_mat = $(this).attr('id_accion_mat');
    var id_accion_enf = $("#diagnostico").val();
    var tipo_contenido= $(this).attr('tipo_contenido');
    var mat_med= $(this).attr('mat_med');
    var presentacion= $(this).attr('presentacion');
    var cantidad= $(this).attr('cantidad');
    $.ajax({
          url:"php/del_mat_med_accion.php",
          method:"POST",
          data:{id_accion_mat: id_accion_mat,
                id_accion_enf:id_accion_enf,
                tipo_contenido:tipo_contenido,
                mat_med:mat_med,
                presentacion:presentacion,
                cantidad:cantidad},
          success: function(data){
            llenar_tabla_mat_accion(id_accion_enf);
        }
    });
  });
  //SELECCIONAR TIPO INC-ACCION, DESACTIVAR DIAS INC-ACCION
  $('#tipo_inc_accion').on('change', function(){
    var tipo_inc=$('#tipo_inc_accion').val();
    if(tipo_inc==1 || tipo_inc==2){
     $('#dias_inc_accion').attr('disabled',false);
    }else{
     $('#dias_inc_accion').attr('disabled',true);
    }
  })

});
//CANCELAR CONSULTA
$(document).on('click', '#modificar_consulta',function(){
  var titulo ="Cancelar consulta";
  var mensaje = "¿Esta seguro que desea cancelar la consulta?";
  var mensaje_ok = "Cancelada correctamente";
  var mensaje_no = "No se pudo cancelar";
  var listado = "Listado de consultas";
  var id_m = $(this).attr('id_consulta');
  var ruta = "php/can_consultasE.php";
  alerta_confirmacion(titulo,mensaje,mensaje_ok,mensaje_no,listado,id_m,ruta);
});
//TERMINAR CONSULTA, MODIFICAR TABLA DIAGNOSTICO
$(document).on('click', '#terminar_consulta',function(){
  var id_consulta=$('#consulta').val();
  var id_diagnostico=$('#diagnostico').val();
  var diagnostico=$('#ins_diagnostico').val();
  var sistema=$('#ins_sistema').val();
  var observaciones=$('#ins_obj').val();
  var tipo=$('#tipo_inc').val();
  var tiempo=$('#dias_inc').val();
  Swal.fire({
    title: 'Terminar la Consulta',
    text: '¿Esta seguro que desea terminar esta consulta?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#424964',
    cancelButtonColor: '#d33',
    confirmButtonText: "Si",
    cancelButtonText: "No"
  }).then((result) => {
    if (result.value) {
      $.ajax({
            url:"php/add_diagnosticoE.php",
            method:"POST",
            data:{id_consulta:id_consulta,
              id_diagnostico: id_diagnostico,
              diagnostico:diagnostico, 
              sistema: sistema,
              observaciones: observaciones,
              tipo: tipo,
              tiempo: tiempo,
              /*traslado: traslado*/},
            success: function(data){
              if(data=="1"){
                alerta_correcto("Correcto",
                  "Consulta asignada correctamente"); 
                $( "#tabla" ).load(" #tabla", function() {
                tabla("Listado de Consultas");
                $('#add_diagnostico').modal('hide');
                });
              }else{
                alerta_error("Error","A ocurrido un error al tratar de registrar esta consulta");
                console.log("Error: "+data); 
              }

          }
      })
    }
  })
});
//TERMINAR ACCIÓN DE ENF, MODIFICAR TABLA ACCIONES_ENF
$(document).on('click', '#terminar_accion_enf',function(){
  var id_consulta=$('#consulta').val();
  var id_accion_enf = $("#diagnostico").val();
  var acciones_enf=$('#acciones_enf').val();
  var observaciones=$('#ins_obj_accion').val();
  var tipo=$('#tipo_inc_accion').val();
  var tiempo=$('#dias_inc_accion').val();
  Swal.fire({
    title: 'Terminar Acción de enfermeria',
    text: '¿Esta seguro que desea terminar esta acción?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#424964',
    cancelButtonColor: '#d33',
    confirmButtonText: "Si",
    cancelButtonText: "No"
  }).then((result) => {
    if (result.value) {
      $.ajax({
            url:"php/add_acciones_enfE.php",
            method:"POST",
            data:{id_consulta:id_consulta,
              id_accion_enf: id_accion_enf,
              acciones_enf:acciones_enf,
              observaciones: observaciones,
              tipo: tipo,
              tiempo: tiempo},
            success: function(data){
              if(data=="1"){
                alerta_correcto("Correcto",
                  "Consulta asignada correctamente"); 
                $( "#tabla" ).load(" #tabla", function() {
                tabla("Listado de Consultas");
                $('#add_diagnostico').modal('hide');
                });
              }else{
                alerta_error("Error","A ocurrido un error al tratar de registrar esta consulta");
                console.log("Error: "+data); 
              }

          }
      })
    }
  })
});
/*------- TOMAR CONSULTA, DISGNOSTICO, ACCIONES ENF-------*/

/*------- INVENTARIO MEDICO, MATERIALES-------*/
//CARGAR ID MODIFICAR MED AL FORM
$(document).on('click', '#modificar_medicamento',function(){
  document.getElementById("idMed-m").value = $(this).attr('id_medicamento');
  document.getElementById("marcaMed-m").value = $(this).attr('marca');
  document.getElementById("sact-Med-m").value = $(this).attr('sustancia');
  document.getElementById("mgMed-m").value = $(this).attr('mg');
  document.getElementById("cantidadMed-m").value = $(this).attr('contenido');
  document.getElementById("presentacionMed-m").value = $(this).attr('presentacion');
});
//CARGAR ID MODIFICAR MAT AL FORM
$(document).on('click', '#modificar_material',function(){
  document.getElementById("idmat-m").value = $(this).attr('id_material');
  document.getElementById("marcamat-m").value = $(this).attr('marca');
  document.getElementById("mat-mat-m").value = $(this).attr('material');
  document.getElementById("cantidadmat-m").value = $(this).attr('cantidad');
  document.getElementById("presentacionmat-m").value = $(this).attr('presentacion');
});
//SUMAR MEDICAMENTOS
$(document).on('click', '#sumar_material',function(){
  $('#idmat-sum').val($(this).attr('id_material'));
});
$(document).on('click', '#sumar_mat',function(){
  var id_material =$('#idmat-sum').val();
  var cantidad =$('#cantidadmat-sum').val();
  $.ajax({
    type:'POST',
    url:'php/sum_materialE.php',
    data:{id_material:id_material,
          cantidad:cantidad},
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
});
//SUMAR MATERIALES
$(document).on('click', '#sumar_medicamento',function(){
  $('#idmed-sum').val($(this).attr('id_medicamento'));
});
$(document).on('click', '#sumar_med',function(){
  var id_medicamento =$('#idmed-sum').val();
  var cantidad =$('#cantidadmed-sum').val();
  $.ajax({
    type:'POST',
    url:'php/sum_medicamentoE.php',
    data:{id_medicamento:id_medicamento,
          cantidad:cantidad},
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
});
/*------- INVENTARIO MEDICO, MATERIALES-------*/

/*------- HISTORIAL MEDICO-------*/
$(document).ready(function(){
  var seccion_al= document.getElementById("seccion_alumno_hist");
  var nombre_u= document.getElementById("NombreUsuario-div_hist");
  nombre_u.style.display="none";
  seccion_al.style.display="none";
  $('#academia_d_hist').prop('disabled', 'disabled');
  $('#generacion_d_hist').prop('disabled', 'disabled');
  $('#nombre_alum_hist').prop('disabled', 'disabled');
  $('#area_direccion_hist').prop('disabled', 'disabled');
  
  //AJAX CARGAR TIPO USUARIO
  $.ajax({
    type: 'POST',
    url:'php/cargar_tipo_hist.php'
  }).done(function(lista){
    $('#TipoUsuario_hist').html(lista)
  }).fail(function(){
    alert('Hubo un error al cargar las estados')
  })

  //ACTIVAR TIPO DE PACIENTES 
  $('#TipoUsuario_hist').on('change', function(){
    var id = $('#TipoUsuario_hist').val(); 
    if (id==1){
      nombre_u.style.display="none";
      seccion_al.style.display="inline";
    }else if (id==2 || id==3){
      nombre_u.style.display="inline";
      seccion_al.style.display="none";
    }else{
      nombre_u.style.display="none";
      seccion_al.style.display="none";
    }

    $.ajax({
      type: 'POST',
      url:'php/cargar_usuario.php',
      data: {'id': id}
    }).done(function(listas){
      $('#NombreUsuario_hist').html(listas)
      $('#NombreUsuario_hist').selectpicker('refresh');
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })
  //CARGAR SELECT PLAN
  $( "#plan_hist" ).ready(function() {  
    $.ajax({
      url:"php/cargar_planesE.php",
      method:"POST",
      dataType: 'json',
      success: function(data){
        var array=Array.isArray(data);
        if(array==true){
          for(var i=0; i < data.length; i++){
            $("#plan_hist").append('<option value="'+data[i].id_plan+'">'+data[i].nombre+'</option>');
          }
          $('#plan_hist').selectpicker('refresh');
        }else{
          console.log("Error: "+data);
        }
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      } 
    }) 
  });
  //CARGAR OTROS SELECT FILTRO ALUMNO
  $(document).on('change', '#plan_hist',function(){
    $('#academia_d_hist').prop('disabled', false);
    if($('#ciclo_d_hist').length){
      var id_plan= $("#plan_hist option:selected").val();
      $.ajax({
        url:"php/cargar_ciclosE.php",
        method:"POST",
        data:{id_plan:id_plan},
        dataType: 'json',
        success: function(data){
          $('#ciclo_d_hist').empty();
          var array=Array.isArray(data);
          if(array==true){
            for(var i=0; i < data.length; i++){
              $("#ciclo_d_hist").append('<option value="'+data[i].id_ciclo+'">'+data[i].nombre+'</option>');
            }
            $('#ciclo_d_hist').selectpicker('refresh');
          }
        },error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
      })
    }

    $(document).on('change', '#academia_d_hist',function(){
      $('#generacion_d_hist').prop('disabled', false);
      if($('#generacion_d_hist').length){
        var id_academia= $("#academia_d_hist option:selected").val();
        $.ajax({
          url:"php/cargar_generacionesE.php",
          method:"POST",
          data:{id_academia:id_academia},
          dataType: 'json',
          success: function(data){
            $('#generacion_d_hist').empty();
            var array=Array.isArray(data);
            if(array==true){
              for(var i=0; i < data.length; i++){
                $("#generacion_d_hist").append('<option value="'+data[i].id_generacion+'">'+data[i].nombre+'</option>');
              }
              $('#generacion_d_hist').selectpicker('refresh');
            }
          },error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
          }
        })
      }
    });

    if($('#academia_d_hist').length){
      var id_plan= $("#plan_hist option:selected").val();
      $.ajax({
        url:"php/cargar_academiasE.php",
        method:"POST",
        data:{id_plan:id_plan},
        dataType: 'json',
        success: function(data){
          $('#academia_d_hist').empty();
          var array=Array.isArray(data);
          if(array==true){
            for(var i=0; i < data.length; i++){
              $("#academia_d_hist").append('<option value="'+data[i].id_academia+'">'+data[i].nombre+'</option>');
            }
            $('#academia_d_hist').selectpicker('refresh');
          }
        },error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
      })
    }

    $(document).on('change', '#generacion_d_hist',function(){
      $('#nombre_alum_hist').prop('disabled', false);
      if($('#nombre_alum_hist').length){
        var id_generacion= $("#generacion_d_hist option:selected").val();
        $.ajax({
          url:"php/cargar_alumnosE.php",
          method:"POST",
          data:{id_generacion:id_generacion},
          dataType: 'json',
          success: function(data){
            $('#nombre_alum_hist').empty();
            var array=Array.isArray(data);
            if(array==true){
              for(var i=0; i < data.length; i++){
                $("#nombre_alum_hist").append('<option value="'+data[i].id_alumno+'">'+data[i].nombre+'</option>');
              }
              $('#nombre_alum_hist').selectpicker('refresh');
            }
          },error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
          }
        })
      }
    });
  });
});
//INSERTAR DATOS PACIENTE ADMIN O DOCENTE
$(document).on('change', '#NombreUsuario_hist',function(){
  var tipo = $('#TipoUsuario_hist').val();
  var id_datos =  $('#NombreUsuario_hist').val();
  $.ajax({
    type:'POST',
    url:'php/add_historialE.php',
    data:{'tipo':tipo, 'id_datos':id_datos},
    dataType: "json",
    success: function(data){
      $("#id_historia").val(data.id_historia_medica);
      $("#id_datos").val(data.id_datos);
      $("#fecha").val(data.fecha);
      $("#edo_c").val(data.edo_civil);
      $("#ser_m").val(data.ser_m);
      $("#hos").val(data.hospitalizacion);
      $("#f_motiv").val(data.fecha_motivo_hosp);
      a_nopat(data.id_historia_medica);
      a_pat(data.id_historia_medica);
      a_les(data.id_historia_medica);
      a_gin(data.id_historia_medica);
      a_exm(data.id_historia_medica);
    }
  })
  $.ajax({
    type:'POST',
    url:'php/datos_pacienteE.php',
    data:{'tipo':tipo, 'id_datos':id_datos},
    dataType:"json",
    success: function(data){
      $("#nombre").val(data.nombre_pac);
      $("#edad").val(data.edad_pac);
      $("#sexo").val(data.sexo_pac);
      $("#domicilio").val(data.dom_pac);
      $("#municipio").val(data.mun_pac);
      $("#estado").val(data.edo_pac);
      $("#cp").val(data.cp_pac);
    }
  })
});
//INSERTAR DATOS PACIENTE ALUMNO
$(document).on('change', '#nombre_alum_hist',function(){
  var tipo = $('#TipoUsuario_hist').val();
  var id_datos = $('#nombre_alum_hist').val();
  $.ajax({
    type:'POST',
    url:'php/add_historialE.php',
    data:{'tipo':tipo, 'id_datos':id_datos},
    dataType: "json",
    success: function(data){
      $("#id_historia").val(data.id_historia_medica);
      $("#id_datos").val(data.id_datos);
      $("#fecha").val(data.fecha);
      $("#edo_c").val(data.edo_civil);
      $("#ser_m").val(data.ser_m);
      $("#hos").val(data.hospitalizacion);
      $("#f_motiv").val(data.fecha_motivo_hosp);
      $("#estado_m").val(data.estado_m);
      a_nopat(data.id_historia_medica);
      a_pat(data.id_historia_medica);
      a_les(data.id_historia_medica);
      a_gin(data.id_historia_medica);
      a_exm(data.id_historia_medica);
    }
  })
  $.ajax({
    type:'POST',
    url:'php/datos_pacienteE.php',
    data:{'tipo':tipo, 'id_datos':id_datos},
    dataType:"json",
    success: function(data){
      $("#nombre").val(data.nombre_pac);
      $("#edad").val(data.edad_pac);
      $("#sexo").val(data.sexo_pac);
      $("#domicilio").val(data.dom_pac);
      $("#municipio").val(data.mun_pac);
      $("#estado").val(data.edo_pac);
      $("#cp").val(data.cp_pac);
    }
  })
});
//FUNCIONES LLENAR DATOS HISTORIAL CLINICO
function a_nopat(id_historia){
  $.ajax({
    type:'POST',
    url:'php/a_nopatE.php',
    data:{'id_historia':id_historia},
    dataType:"json",
    success: function(data){
      $("#alcoholismo").val(data.alcoholismo);
      $("#tabaquismo").val(data.tabaquismo);
      $("#alergias").val(data.alergias);
      $("#toxi").val(data.toxicomanias);
      $("#res_med").val(data.medicamentos);
      $("#especificacion").val(data.especificacion);
      $("#cicatrices").val(data.cicatrices);
      $("#tatuajes").val(data.tatuajes);
      $("#amputaciones").val(data.amputaciones);
      $("#id_nopat").val(data.id_nopat);
    },error: function(jqXHR, textStatus, errorThrown){ 
      console.log("Error; "+jqXHR.status+" - "+textStatus+" - "+errorThrown);
    }
  })
}
function a_pat(id_historia){
  $.ajax({
    type:'POST',
    url:'php/a_patE.php',
    data:{'id_historia':id_historia},
    dataType:"json",
    success: function(data){
      $("#hipertension").val(data.hipertension);
      $("#cardiacas").val(data.cardiacas);
      $("#respiratorias").val(data.respiratorias);
      $("#tiroides").val(data.tiroides);
      $("#diabetes").val(data.diabetes);
      $("#digestivas").val(data.digestivas);
      $("#piel_pat").val(data.piel_pat);
      $("#oni").val(data.onicomicosis);
      $("#convulsiones").val(data.convulsiones);          
      $("#transf").val(data.transfusiones);
      $("#renal").val(data.renales);
      $("#id_pat").val(data.id_pat);
    },error: function(jqXHR, textStatus, errorThrown){ 
      console.log("Error; "+jqXHR.status+" - "+textStatus+" - "+errorThrown);
    }
  })}

function a_les(id_historia){
  $.ajax({
    type:'POST',
    url:'php/a_lesE.php',
    data:{'id_historia':id_historia},
    dataType:"json",
    success: function(data){
      $("#esg_c").val(data.esg_cervical);
      $("#esg_t").val(data.esg_tobillo);
      $("#esg_r").val(data.esg_rodilla);
      $("#lux_h").val(data.lux_hombro);
      $("#lux_r").val(data.lux_rodilla);
      $("#lumb").val(data.lumbalgias);
      $("#hernia").val(data.hernia);
      $("#fract").val(data.fracturas);
      $("#otras_ales").val(data.otras);
      $("#id_les").val(data.id_ant_les);
    },error: function(jqXHR, textStatus, errorThrown){ 
      console.log("Error; "+jqXHR.status+" - "+textStatus+" - "+errorThrown);
    }
  })
}
function a_gin(id_historia){
  $.ajax({
    type:'POST',
    url:'php/a_ginE.php',
    data:{'id_historia':id_historia},
    dataType:"json",
    success: function(data){
      $("#id_gin").val(data.id_ant_gin);
      $("#embarazos").val(data.embarazos);
      $("#partos").val(data.partos);
      $("#cesarias").val(data.cesareas);
      $("#abortos").val(data.abortos);
      $("#fum").val(data.fum);
      $("#salpi").val(data.salpingoclasia);
      $("#hister").val(data.histerectomia);
      $("#quistes").val(data.quistes);
      $("#hemorr").val(data.observaciones);
      $("#obs_gin").val(data.quistes);
    },error: function(jqXHR, textStatus, errorThrown){ 
      console.log("Error; "+jqXHR.status+" - "+textStatus+" - "+errorThrown);
    }
  })
}
function a_exm(id_historia){
  $.ajax({
    type:'POST',
    url:'php/a_exmE.php',
    data:{'id_historia':id_historia},
    dataType:"json",
    success: function(data){
      $("#id_examenm").val(data.id_examenm);
      $("#p_art").val(data.presion_arterial);
      $("#f_card").val(data.f_cardiaca);
      $("#f_resp").val(data.f_respiratoria);
      $("#temp").val(data.temp);
      $("#sat").val(data.sat);
      $("#a_der").val(data.auditivo_d);
      $("#a_izq").val(data.auditivo_i);
      $("#gluc").val(data.gluc);
      $("#v_der").val(data.visual_d);
      $("#v_izq").val(data.visual_i);
      $("#pter").val(data.pterigion);
      $("#lentes").val(data.lentes);
      $("#talla").val(data.talla);
      $("#p_cor").val(data.peso);
      $("#imc_exm").val(data.imc);
      $("#clas").val(data.clasificacion);
      $("#car-pul").val(data.cardiopulmonar);
      $("#mus-esq").val(data.musculoesqueletico);
      $("#piel_exmn").val(data.piel_exmn);
      $("#v_perif").val(data.vascular_p);
      $("#digest").val(data.digestivo);
      $("#nerv").val(data.nervioso);
      $("#urinario").val(data.urinario);
      $("#reproductor").val(data.reproductor);
      $("#obs-exm").val(data.observaciones);
    },error: function(jqXHR, textStatus, errorThrown){ 
      console.log("Error; "+jqXHR.status+" - "+textStatus+" - "+errorThrown);
    }
  })
}
function add_exmn(id){
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
            "Datos actualizados correctamente");
        }else {
          alerta_error("Error",
            "A ocurrido un error al tratar de registrar");
          console.log("Error: "+data);
        }
      }
    });
}
//CALCULAR IMC-EXAMEN MED
$(document).on('click', '#calcuar_imc_exm',function(){
  var talla = $('#talla').val();
  var peso = $('#p_cor').val();
  var imc= peso/(talla^2);
  $('#imc_exm').val(imc.toFixed(2));
}); 
/*------- HISTORIAL MEDICO-------*/

/*------- FUNCIONES FARMACIA-------*/
$(document).on('click', '#diagnostico_farmacia',function(){
  
  $('#obs_farm').val($(this).attr('observaciones'));
  var id_diagnostico=$(this).attr('id_diagnostico');
  var id_consulta=$(this).attr('id_consulta');
  $('#id_consulta_farm').val($(this).attr('id_consulta'));


  llenar_tabla_mat_farm(id_diagnostico);

  //CARGAR SELECT MATERIALES-ACCION
  $.ajax({
    url:"php/cargar_materiales.php",
    method:"POST",
    dataType: 'json',
    success: function(data){
      $('#ins_material_farm').empty();
      var array=Array.isArray(data);
      if(array==true){
        for(var i=0; i < data.length; i++){
          $("#ins_material_farm").append('<option value="'+data[i].id_materialm+'">'+data[i].material+'</option>');
        }
        $('#ins_material_farm').selectpicker('refresh');
      }
    },error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
    }
  })
  //AGREGAR MATERIAL-CONSULTA-FARMACIA
  $(document).on('click', '#add_material_farm',function(){
    var tipo_contenido=2;
    var mat_med=$('#ins_material_farm').val();
    var cantidad=$('#ins_mat_cantidad_farm').val();    
    var presentacion=$('#ins_mat_presentacion_farm').val();
    $.ajax({
      url:"php/add_mat_med.php",
      method:"POST",
      data:{
        tipo_contenido:tipo_contenido, 
        mat_med: mat_med,
        cantidad: cantidad,
        presentacion: presentacion,
        id_diagnostico: id_diagnostico
      },success: function(data){
        llenar_tabla_mat_farm(id_diagnostico);
      } 
    });
  })
  //LLENAR TABLA MATERIALES-CONSULTA-FARMACIA
  function llenar_tabla_mat_farm (id_diagnostico){
    $.ajax({
      url:"php/cargar_tabla_mat.php",
      type:"POST",
      data:{id_diagnostico:id_diagnostico},
      success: function(data){
        $('#tbody_farmacia').html(data);
      }
    })
  }
  //ELIMINAR MEDICAMENTO, MATERIA DE LA TABLA MATERIALES-CONSULTA-FARMACIA
  $(document).on('click','#del_med_farm',function(){
    var id_tratamiento = $(this).attr('id_tratamiento');
    var id_diagnostico = $(this).attr('id_diagnostico');
    var tipo_contenido= $(this).attr('tipo_contenido');
    var mat_med= $(this).attr('mat_med');
    var presentacion= $(this).attr('presentacion');
    var cantidad= $(this).attr('cantidad');
    $.ajax({
          url:"php/del_mat_med.php",
          method:"POST",
          data:{id_tratamiento: id_tratamiento,
                id_diagnostico:id_diagnostico,
                tipo_contenido:tipo_contenido,
                mat_med:mat_med,
                presentacion:presentacion,
                cantidad:cantidad},
          success: function(data){
            llenar_tabla_mat_farm(id_diagnostico);
        }
    });
  });
});
//TERMINAR ACCIÓN DE ENF, MODIFICAR TABLA ACCIONES_ENF
$(document).on('click', '#terminar_farm',function(){
  var id_consulta=$('#id_consulta_farm').val();
  Swal.fire({
    title: 'Finalizar el surtido de materiales',
    text: '¿Esta seguro que desea terminar esta acción?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#424964',
    cancelButtonColor: '#d33',
    confirmButtonText: "Si",
    cancelButtonText: "No"
  }).then((result) => {
    if (result.value) {
      $.ajax({
            url:"php/cambiar_surtir_material.php",
            method:"POST",
            data:{id_consulta:id_consulta},
            success: function(data){
              if(data=="1"){
                alerta_correcto("Correcto",
                  "Consulta asignada correctamente"); 
                $( "#tabla" ).load(" #tabla", function() {
                tabla("Listado de materiales surtidos");
                $('#add_diagnostico').modal('hide');
                });
              }else{
                alerta_error("Error","A ocurrido un error al tratar de registrar esta consulta");
                console.log("Error: "+data); 
              }

          }
      })
    }
  })
});
/*------- FUNCIONES FARMACIA-------*/

/*------------ FUNCIONES TRASLADOS ------------*/
$(document).on('click', '#add_registro_traslados',function(){
  var seccion_al= document.getElementById("seccion_alumno_tras");
  var nombre_u= document.getElementById("NombreUsuario-div_tras");
  nombre_u.style.display="none";
  seccion_al.style.display="none";
  $('#academia_d_tras').prop('disabled', 'disabled');
  $('#generacion_d_tras').prop('disabled', 'disabled');
  $('#nombre_alum_tras').prop('disabled', 'disabled');
  $('#area_direccion_tras').prop('disabled', 'disabled');
  //AJAX CARGAR TIPO USUARIO
  $.ajax({
    type: 'POST',
    url:'php/cargar_tipo_hist.php'
  }).done(function(lista){
    $('#TipoUsuario_tras').html(lista)
  }).fail(function(){
    alert('Hubo un error al cargar las estados')
  })
  //ACTIVAR TIPO PARA TRASLADOS
  $('#TipoUsuario_tras').on('change', function(){
    var id = $('#TipoUsuario_tras').val(); 
    if (id==1){
      nombre_u.style.display="none";
      seccion_al.style.display="inline";
    }else if (id==2 || id==3){
      nombre_u.style.display="inline";
      seccion_al.style.display="none";
    }else{
      nombre_u.style.display="none";
      seccion_al.style.display="none";
    }
    $.ajax({
      type: 'POST',
      url:'php/cargar_usuario.php',
      data: {'id': id}
    }).done(function(listas){
      $('#NombreUsuario_tras').html(listas)
      $('#NombreUsuario_tras').selectpicker('refresh');
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })
  //CARGAR SELECT PLAN
  $( "#plan_tras" ).ready(function() {  
    $.ajax({
      url:"php/cargar_planesE.php",
      method:"POST",
      dataType: 'json',
      success: function(data){
        var array=Array.isArray(data);
        if(array==true){
          for(var i=0; i < data.length; i++){
            $("#plan_tras").append('<option value="'+data[i].id_plan+'">'+data[i].nombre+'</option>');
          }
          $('#plan_tras').selectpicker('refresh');
        }else{
          console.log("Error: "+data);
        }
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      } 
    }) 
  });
  //CARGAR OTROS SELECT FILTRO ALUMNO
  $(document).on('change', '#plan_tras',function(){
    $('#academia_d_tras').prop('disabled', false);
    if($('#ciclo_d_tras').length){
      var id_plan= $("#plan_tras option:selected").val();
      $.ajax({
        url:"php/cargar_ciclosE.php",
        method:"POST",
        data:{id_plan:id_plan},
        dataType: 'json',
        success: function(data){
          $('#ciclo_d_tras').empty();
          var array=Array.isArray(data);
          if(array==true){
            for(var i=0; i < data.length; i++){
              $("#ciclo_d_tras").append('<option value="'+data[i].id_ciclo+'">'+data[i].nombre+'</option>');
            }
            $('#ciclo_d_tras').selectpicker('refresh');
          }
        },error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
      })
    }

    $(document).on('change', '#academia_d_tras',function(){
      $('#generacion_d_tras').prop('disabled', false);
      if($('#generacion_d_tras').length){
        var id_academia= $("#academia_d_tras option:selected").val();
        $.ajax({
          url:"php/cargar_generacionesE.php",
          method:"POST",
          data:{id_academia:id_academia},
          dataType: 'json',
          success: function(data){
            $('#generacion_d_tras').empty();
            var array=Array.isArray(data);
            if(array==true){
              for(var i=0; i < data.length; i++){
                $("#generacion_d_tras").append('<option value="'+data[i].id_generacion+'">'+data[i].nombre+'</option>');
              }
              $('#generacion_d_tras').selectpicker('refresh');
            }
          },error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
          }
        })
      }
    });

    if($('#academia_d_tras').length){
      var id_plan= $("#plan_tras option:selected").val();
      $.ajax({
        url:"php/cargar_academiasE.php",
        method:"POST",
        data:{id_plan:id_plan},
        dataType: 'json',
        success: function(data){
          $('#academia_d_tras').empty();
          var array=Array.isArray(data);
          if(array==true){
            for(var i=0; i < data.length; i++){
              $("#academia_d_tras").append('<option value="'+data[i].id_academia+'">'+data[i].nombre+'</option>');
            }
            $('#academia_d_tras').selectpicker('refresh');
          }
        },error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
      })
    }

    $(document).on('change', '#generacion_d_tras',function(){
      $('#nombre_alum_tras').prop('disabled', false);
      if($('#nombre_alum_tras').length){
        var id_generacion= $("#generacion_d_tras option:selected").val();
        $.ajax({
          url:"php/cargar_alumnosE.php",
          method:"POST",
          data:{id_generacion:id_generacion},
          dataType: 'json',
          success: function(data){
            $('#nombre_alum_tras').empty();
            var array=Array.isArray(data);
            if(array==true){
              for(var i=0; i < data.length; i++){
                $("#nombre_alum_tras").append('<option value="'+data[i].id_alumno+'">'+data[i].nombre+'</option>');
              }
              $('#nombre_alum_tras').selectpicker('refresh');
            }
          },error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
          }
        })
      }
    });
  });
  //CARGAR SELECT REFERENCIAS
  $.ajax({
    url:"php/cargar_referidos.php",
    method:"POST",
    dataType: 'json',
    success: function(data){
      $('#referido_tras').empty();
      var array=Array.isArray(data);
      if(array==true){
        for(var i=0; i < data.length; i++){
          $("#referido_tras").append('<option value="'+data[i].id_referido+'">'+data[i].nombre+'</option>');
        }
        $('#referido_tras').selectpicker('refresh');
      }
    },error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
    }
  })
  //AGREGAR NUEVA REFERENCIA
  $(document).on('click', '#agregar_referido_select',function(){
    var referido = $('#nueva_referido').val();
    $.ajax({
      url:"php/add_referidoE.php",
      type:"POST",
      data:{referido:referido},
      success:function(data){
        if (data==1) {
          alerta_correcto("Correcto",
            "Acción asignada correctamente");
          $.ajax({
            url:"php/cargar_referidos.php",
            method:"POST",
            dataType: 'json',
            success: function(data){
              $('#referido_tras').empty();
              var array=Array.isArray(data);
              if(array==true){
                for(var i=0; i < data.length; i++){
                  $("#referido_tras").append('<option value="'+data[i].id_lista_accion+'">'+data[i].nombre+'</option>');
                }
                $('#referido_tras').selectpicker('refresh');
              }
            },error: function (jqXHR, textStatus, errorThrown) {
              console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
            }
          })
        }else {
          alerta_error("Error",
            "A ocurrido un error al tratar de registrar este diagnostico");
          console.log("Error: "+data);
        }
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      }
    })
  })
  //AGREGAR NUEVA REFERENCIA
  $(document).on('click', '#registrar_traslado',function(){
    var tipo = $('#TipoUsuario_tras').val();
    var nom_usuario = $('#NombreUsuario_tras').val();
    var nom_alum = $('#nombre_alum_tras').val();
    var referido = $('#referido_tras').val();
    var razon = $('#razon_tras').val();
    var fecha = $('#fecha_tras').val();
    
    Swal.fire({
      title: 'Finalizar registro de traslado',
      text: '¿Esta seguro que desea terminar esta acción?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#424964',
      cancelButtonColor: '#d33',
      confirmButtonText: "Si",
      cancelButtonText: "No"
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url:"php/add_trasladosE.php",
          method:"POST",
          data:{tipo:tipo,
                nom_usuario:nom_usuario,
                nom_alum:nom_alum,
                referido:referido,
                razon:razon,
                fecha:fecha},
          success: function(data){
            if (data==1) {
              alerta_correcto("Correcto",
                "Consulta asignada correctamente");
              $("#tabla").load(" #tabla", function(){
                tabla("Listado de usuarios");
              });
              $('#add_traslados').modal('toggle'); 
            }else {
              alerta_error("Error",
              "A ocurrido un error al tratar de registrar");
              console.log("Error: "+data);
            }
          },error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
          }
        })
      }
    });

  })
});
/*------------ FUNCIONES TRASLADOS ------------*/

/*------------ FUNCIONES CONTROL T/A ------------*/
$(document).on('click', '#add_registro_traslados',function(){
  $('.selectpicker').val(0);
  $('.selectpicker').selectpicker('render');

  $('#sys_ta').val('');
  $('#dia_ta').val('');
  $('#pulse_ta').val('');

  $(document).on('change', '#TipoUsuario_tras',function(){
    var tipo = $('#TipoUsuario_tras').val();
    var sys = $('#sys_ta').val();
    var dia = $('#dia_ta').val();
    var pulse = $('#pulse_ta').val();
    if(tipo!='1' || tipo!='2' || tipo!='3'){
      $('#sys_ta').prop('disabled', 'disabled');
      $('#dia_ta').prop('disabled', 'disabled');
      $('#pulse_ta').prop('disabled', 'disabled');
      $('#add_c_ta').prop('disabled', 'disabled');
    }
  });
  //DESACTIVAR CAMPOS 
  $('#sys_ta').prop('disabled', 'disabled');
  $('#dia_ta').prop('disabled', 'disabled');
  $('#pulse_ta').prop('disabled', 'disabled');
  $('#add_c_ta').prop('disabled', 'disabled');
  //CHANGE NOMBRE USUARIO
  $(document).on('change', '#NombreUsuario_tras',function(){
    $('#sys_ta').prop('disabled', false);
    $('#dia_ta').prop('disabled', false);
    $('#pulse_ta').prop('disabled', false);
    $('#add_c_ta').prop('disabled', false);
    var tipo = $('#TipoUsuario_tras').val();
    var id_datos=$('#NombreUsuario_tras').val();
    $.ajax({
      url:"php/cargar_id_control_ta.php",
      method:"POST",
      data:{tipo:tipo,
            id_datos:id_datos},
      success: function(data){
        llenar_tabla_ta(data);
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      }
    })
  });
  //CHANGE NOMBRE ALUMNO
  $(document).on('change', '#nombre_alum_tras',function(){
    $('#sys_ta').prop('disabled', false);
    $('#dia_ta').prop('disabled', false);
    $('#pulse_ta').prop('disabled', false);
    $('#add_c_ta').prop('disabled', false);
    var tipo = $('#TipoUsuario_tras').val();
    var id_datos=$('#nombre_alum_tras').val();
    $.ajax({
      url:"php/cargar_id_control_ta.php",
      method:"POST",
      data:{tipo:tipo,
            id_datos:id_datos},
      success: function(data){
        llenar_tabla_ta(data);
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      }
    })
  });
  //REGISTRAR DATOS T/A
  $(document).on('click', '#add_c_ta',function(){
    var tipo = $('#TipoUsuario_tras').val();
    var sys = $('#sys_ta').val();
    var dia = $('#dia_ta').val();
    var pulse = $('#pulse_ta').val();

    if(tipo=='1'){
      var id_datos=$('#nombre_alum_tras').val();
    }else if(tipo=='2' || tipo=='3'){
      var id_datos=$('#NombreUsuario_tras').val();
    }

    $.ajax({
      url:"php/add_control_taE.php",
      method:"POST",
      data:{tipo:tipo,
            id_datos:id_datos,
            sys:sys,
            dia:dia,
            pulse:pulse},
      success: function(data){
        if (data==1) {
          alerta_correcto("Correcto",
            "Consulta asignada correctamente");
          $.ajax({
            url:"php/cargar_id_control_ta.php",
            method:"POST",
            data:{tipo:tipo,
                  id_datos:id_datos},
            success: function(data){
              llenar_tabla_ta(data);
            },error: function (jqXHR, textStatus, errorThrown) {
              console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
            }
          })
          $("#tabla").load(" #tabla", function(){
            tabla("Listado de usuarios");
          }); 
        }else {
          alerta_error("Error",
          "A ocurrido un error al tratar de registrar");
          console.log("Error: "+data);
        }
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
      }
    });
  });

  function llenar_tabla_ta(id_control_ta){
    $.ajax({
      url:"php/cargar_tabla_ta.php",
      type:"POST",
      data:{id_control_ta:id_control_ta},
      success: function(data){
        $('#tbody_control_ta').html(data);
      }
    })
  }

  $(document).on('click', '#del_contenido_ta',function(){
    id_contenido_ta=$(this).attr('id_contenido_ta');
    id_control_ta=$(this).attr('id_control_ta');
    Swal.fire({
      title: 'Eliminar registro de TA',
      text: '¿Esta seguro que desea terminar esta acción?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#424964',
      cancelButtonColor: '#d33',
      confirmButtonText: "Si",
      cancelButtonText: "No"
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url:"php/del_contenido_ta.php",
          type:"POST",
          data:{id_contenido_ta:id_contenido_ta},
          success: function(data){
            llenar_tabla_ta(id_control_ta);
          }
        })
      }
    })
  });

  $(document).on('click', '#registrar_control_ta',function(){
    $('.selectpicker').val(0);
    $('.selectpicker').selectpicker('render');

    $('#sys_ta').val('');
    $('#dia_ta').val('');
    $('#pulse_ta').val('');
    $('#add_control_ta').modal('toggle');
  });

});

$(document).on('click', '#filt_reporte_alumno',function(){
  var fecha_inicio = $('#fecha_ini_f').val();
  var fecha_fin = $('#fecha_fin_f').val();
  $.ajax({
      url:"pdf/lkardex_alumno.php",
      method:"POST",
      data:{fecha_inicio:fecha_inicio,
            fecha_fin:fecha_fin}
  });          
});

/*------------ FUNCIONES CONTROL T/A ------------*/


















