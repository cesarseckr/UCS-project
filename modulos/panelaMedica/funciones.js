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
          limpiar_form_rp();
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

$(document).ready(function(){
  notificacion_ticket();
})

function notificacion_ticket(){
  $.ajax({
    url: 'tickets/notificacion_ticket.php',
    success: function (data) {
      var msj="Tienes";
      var msj2="tickets pendientes";
      if (data!="") {
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

  /*---------------------- FUNCIONES DE DIAGNOSTICO --------------------------*/
  $(document).on('click', '#btn_diagnostico',function(){

    $(document).on('click', '#add_medicamento_accion',function(){
    var tipo_contenido=1;
    var mat_med=$('#ins_medicamento_accion').val();
    var cantidad=$('#ins_med_cantidad_accion').val();    
    var presentacion=$('#ins_med_presentacion_accion').val();
    var id_accion_enf = $("#diagnostico").val();

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


  $(document).on('click','#add_material_accion',function(){
    var tipo_contenido=2;
    var mat_med=$('#ins_material_accion').val();
    var cantidad=$('#ins_mat_cantidad_accion').val();    
    var presentacion=$('#ins_mat_presentacion_accion').val();
    var id_accion_enf = $("#diagnostico").val();

    $.ajax({
          url:"php/add_mat_med_accion.php",
          method:"POST",
          data:{
            tipo_contenido:tipo_contenido, 
            mat_med: mat_med,
            cantidad: cantidad,
            presentacion: presentacion,
            id_accion_enf: id_accion_enf
          },
          success: function(data){
            llenar_tabla_mat_accion(id_accion_enf);
        }
    });
  });

  function llenar_tabla_mat_accion (id_accion_enf){
    $.ajax({
      url:"php/cargar_tabla_med_accion.php",
      type:"POST",
      data:{id_accion_enf:id_accion_enf},
      success: function(data){
        $('#tbody_accion_enf').html(data);
      }

    })
  }

    $('#lb_talla').html('Talla: '+$(this).attr('talla')+' m');
    $('#lb_peso').html('Peso: '+$(this).attr('peso')+' kg');
    $('#lb_imc').html('IMC: '+$(this).attr('imc'));
    $('#lb_pres_art').html('Presión Arterial: '+$(this).attr('presion_arterial'));
    $('#lb_frec_card').html('Frecuiencia Cardiaca: '+$(this).attr('f_cardiaca'));
    $('#lb_frec_resp').html('Frecuencia Respiratoria: '+$(this).attr('f_respiratoria'))
    $('#lb_temp').html('Temperatura: '+$(this).attr('temp'));

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

    $.ajax({
      type: 'POST',
      url:'php/cargar_materiales.php'
    }).done(function(lista){
      $('#ins_material').html(lista)
    }).fail(function(){
      alert('Hubo un error al cargar los materiales')
    })

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
              llenar_tabla_med(data);
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
              llenar_tabla_med(data);
              $('#diagnostico').val(data);
            }
          })
        }
      }
    })
  })

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

  function llenar_tabla_accion_enf (id_diagnostico){
    $.ajax({
      url:"php/cargar_tabla_accion_enf.php",
      type:"POST",
      data:{id_diagnostico:id_diagnostico},
      success: function(data){
        $('#tbody_accion_enf').html(data);
      }

    })
  }

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

  function llenar_tabla_mat (id_diagnostico){
      $.ajax({
      url:"php/cargar_tabla_mat.php",
      type:"POST",
      data:{id_diagnostico:id_diagnostico},
      success: function(data){
        $('#tbody_mat').html(data);;
      }
    })  
  }
  /*---------------------- FUNCIONES DE DIAGNOSTICO --------------------------*/

 /*---------------------- FUNCIONES REGISTRO PACIENTE --------------------------*/  
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

  $(document).on('click', '#calcuar_imc',function(){
    var talla = $('#altura_consu').val();
    var peso = $('#peso_consu').val();
    var imc= peso/(talla^2);
    $('#imc_consu').val(imc.toFixed(2));
  });  
  
  $.ajax({
    type: 'POST',
    url:'php/cargar_tipo.php'
  }).done(function(lista){
    $('#TipoUsuario').html(lista)
  }).fail(function(){
    alert('Hubo un error al cargar las estados')
  })

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
 /*---------------------- FUNCIONES REGISTRO PACIENTE --------------------------*/

$(document).ready(function(){

/*---------------------- INSERTAR 1 --------------------------*/
	$('#insrtMed').on('click',function(){
		var cantidad = $("#cantidadMed").val();
		var unidad = $("#unidadMed").val();
		var marca = $("#marcaMed").val();
		var sustancia = $("#sact-Med").val();
		var presentacion = $("#presentacionMed").val();
		var mg = $("#mgMed").val();
		var uc = $("#cantidadcontMed").val();
		/*alert("Cantidad: "+cantidad+ 
  		  "\nUnidad: "+unidad+
  		  "\nMarca: "+marca+
  		  "\nSustancia: "+sustancia+
  		  "\nPresentacion: "+presentacion+
          "\nMG: "+mg+
  		  "\nUC: "+uc);*/

	  	$.ajax({
	      url:"php/insertarMedicamento.php",
	      method:"POST",
	      data:{
	        'cantidad' : cantidad,
	        'unidad' : unidad,
	        'marca' : marca,
	        'sustancia' : sustancia,
	        'presentacion' : presentacion,
	        'mg' : mg,
	        'uc' : uc
	      },
	      success:function(data){
	        alert(data);
	        window.location='index.php'
	      }
		})
	 })

 


/*---------------------- INSERTAR MEDICAMENTOS --------------------------*/

/*---------------------- INSERTAR MATERIALES --------------------------*/
	$('#insrtMat').on('click',function(){
		var cantidadMat = $("#cantidadMat").val();
		var unidadMat = $("#unidadMat").val();
		var marcaMat = $("#marcaMat").val();
		var materialMat = $("#materialMat").val();
		var presentacionMat = $("#presentacionMat").val();
		var partidaMat = $("#partidaMat").val();

		/*alert("Cantidad: "+cantidad+ 
  		  "\nUnidad: "+unidad+
  		  "\nMarca: "+marca+
  		  "\nSustancia: "+sustancia+
  		  "\nPresentacion: "+presentacion+
          "\nMG: "+mg+
  		  "\nUC: "+uc);*/

	  	$.ajax({
	      url:"php/insertarMateriales.php",
	      method:"POST",
	      data:{
	        'cantidad' : cantidadMat,
	        'unidad' : unidadMat,
	        'marca' : marcaMat,
	        'material' : materialMat,
	        'presentacion' : presentacionMat,
	        'partida' : partidaMat
	      },
	      success:function(data){
	        alert(data);
	        window.location='index.php'
	      }
		    })
	   })


/*---------------------- INSERTAR MATERIALES --------------------------*/

})


$(document).ready(function () {
   $('#dias_inc').attr('disabled',true);
   var id_consulta="";
   var id_diagnostico="";
 /*---------------------- Cargar datos validartor eliminar --------------------------*/
 $(document).on('click', '#modificar_medicamento',function(){
    document.getElementById("idMed-m").value = $(this).attr('id_medicamento');
    document.getElementById("marcaMed-m").value = $(this).attr('marca');
    document.getElementById("sact-Med-m").value = $(this).attr('sustancia');
    document.getElementById("mgMed-m").value = $(this).attr('mg');
    document.getElementById("cantidadMed-m").value = $(this).attr('contenido');
    document.getElementById("presentacionMed-m").value = $(this).attr('presentacion');
 }); 

 $(document).on('click', '#modificar_material',function(){
    document.getElementById("idmat-m").value = $(this).attr('id_material');
    document.getElementById("marcamat-m").value = $(this).attr('marca');
    document.getElementById("mat-mat-m").value = $(this).attr('material');
    document.getElementById("cantidadmat-m").value = $(this).attr('cantidad');
    document.getElementById("presentacionmat-m").value = $(this).attr('presentacion');
 }); 

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

  /*---------------------- eliminar consultas --------------------------*/
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

  $(document).on('click', '#tomar_consultas',function(){
    var id_c = $(this).attr('id_consulta');
    $('#ins_consulta').val(id_c);
  });

  $('#tipo_inc').on('change', function(){
    var tipo_inc=$('#tipo_inc').val();
    if(tipo_inc==1 || tipo_inc==2){
     $('#dias_inc').attr('disabled',false);
    }else{
     $('#dias_inc').attr('disabled',true);
    }
  })

  $(document).on('click', '#terminar_consulta',function(){
    var id_consulta=$('#consulta').val();
    var id_diagnostico=$('#diagnostico').val();
    var diagnostico=$('#ins_diagnostico').val();
    var sistema=$('#ins_sistema').val();
    var observaciones=$('#ins_obj').val();
    var tipo=$('#tipo_inc').val();
    var tiempo=$('#dias_inc').val();
    /*var gridCheck=$('#gridCheck:checked').val();
    if (gridCheck=="on") {
      var traslado=1;
    }else{
      var traslado =0;
    }*/
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


  $(document).on('click','#add_material',function(){
    var tipo_contenido=2;
    var mat_med=$('#ins_material').val();
    var cantidad=$('#ins_mat_cantidad').val();    
    var presentacion=$('#ins_mat_presentacion').val();
    var tiempo="No Aplica";
    var id_diagnostico = $("#diagnostico").val();

    $.ajax({
          url:"php/add_mat_med.php",
          method:"POST",
          data:{
            tipo_contenido:tipo_contenido, 
            mat_med: mat_med,
            cantidad: cantidad,
            presentacion: presentacion,
            tiempo:tiempo,
            id_diagnostico: id_diagnostico
          },
          success: function(data){
            llenar_tabla_mat(id_diagnostico);
        }
    });
  });

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

  $.ajax({
      type: 'POST',
      url:'php/cargar_tipo.php'
    }).done(function(lista){
      $('#tipo_usr_hist').html(lista)
    }).fail(function(){
      alert('Hubo un error al cargar los tipos de usuario')
    })

  $('#tipo_usr_hist').on('change', function(){
      var id = $('#tipo_usr_hist').val();
        $.ajax({
          type: 'POST',
          url:'php/cargar_usuario.php',
          data: {'id': id}
        }).done(function(listas){
          $('#nombre_usr_hist').html(listas)
        })
        .fail(function(){
          alert('Hubo un error al cargar los municipios')
        })        
    })

  $('#nombre_usr_hist').on('change',function(){
    var tipo = $('#tipo_usr_hist').val();
    var id_datos = $('#nombre_usr_hist').val();
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
  })

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
      })
    }

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
          $("#imc").val(data.imc);
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
  
});


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

$(document).on('click', '#calcuar_imc_exm',function(){
    var talla = $('#talla').val();
    var peso = $('#p_cor').val();
    var imc= peso/(talla^2);
    $('#imc_exm').val(imc.toFixed(2));
  }); 
