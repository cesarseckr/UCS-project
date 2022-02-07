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
      tabla("Listado de Administrativos");
    });
}

$(document).ready(function(){
    $.ajax({
      type: 'POST',
      url: 'php/estados.php'
    }).done(function(lista_cat){
      $('#estadoAdm').html(lista_cat)
    }).fail(function(){
      alert('Hubo un error al cargar las estados')
    })

    $('#estadoAdm').on('change', function(){
      var id = $('#estadoAdm').val()
      $.ajax({
        type: 'POST',
        url: 'php/municipios.php',
        data: {'id': id}
      }).done(function(listas_ser){
        $('#municipioAdm').html(listas_ser)
      })
      .fail(function(){
        alert('Hubo un error al cargar los municipios')
      })
    })

    $.ajax({
      type: 'POST',
      url: 'php/cargarArea.php'
    }).done(function(lista_cat){
      $('#areaAdm').html(lista_cat)
    }).fail(function(){
      alert('Hubo un error al cargar las areas')
    }) 

    $.ajax({
      type: 'POST',
      url: 'php/estados.php'
    }).done(function(lista_cat){
      $('#estadoAdm_m').html(lista_cat)
    }).fail(function(){
      alert('Hubo un error al cargar las estados')
    })

    $('#estadoAdm_m').on('change', function(){
      var id = $('#estadoAdm_m').val()
      $.ajax({
        type: 'POST',
        url: 'php/municipios.php',
        data: {'id': id}
      }).done(function(listas_ser){
        $('#municipioAdm_m').html(listas_ser)
      })
      .fail(function(){
        alert('Hubo un error al cargar los municipios')
      })
    })

    $.ajax({
      type: 'POST',
      url: 'php/cargarArea.php'
    }).done(function(lista_cat){
      $('#areaAdm_m').html(lista_cat)
    }).fail(function(){
      alert('Hubo un error al cargar las areas')
    }) 


  /*---------------------- Estado, Municipio Docente --------------------------------*/
    $.ajax({
      type: 'POST',
      url: 'php/estados.php'
    }).done(function(lista_cat){
      $('#estadoDoc').html(lista_cat)
    }).fail(function(){
      alert('Hubo un error al cargar las estados')
    })

    $('#estadoDoc').on('change', function(){
      var id = $('#estadoDoc').val()
      $.ajax({
        type: 'POST',
        url: 'php/municipios.php',
        data: {'id': id}
      }).done(function(listas_ser){
        $('#municipioDoc').html(listas_ser)
      })
      .fail(function(){
        alert('Hubo un error al cargar los municipios')
      })
    })

    $.ajax({
      type: 'POST',
      url: 'php/estados.php'
    }).done(function(lista_cat){
      $('#estadoDoc_m').html(lista_cat)
    }).fail(function(){
      alert('Hubo un error al cargar las estados')
    })

    $('#estadoDoc_m').on('change', function(){
      var id = $('#estadoDoc_m').val()
      $.ajax({
        type: 'POST',
        url: 'php/municipios.php',
        data: {'id': id}
      }).done(function(listas_ser){
        $('#municipioDoc_m').html(listas_ser)
      })
      .fail(function(){
        alert('Hubo un error al cargar los municipios')
      })
    })


  /*---------------------- Cargar datos de modificacion Administradores --------------------------*/
   $(document).on('click', '#modificar_Admin',function(){
      $("#idAdm_m").val($(this).attr('btn-id_administrativo'));
      $("#apaternoAdm_m").val($(this).attr('btn-app'));
      $("#amaternoAdm_m").val($(this).attr('btn-apm'));
      $("#nombresAdm_m").val($(this).attr('btn-nombres'));
      $("#sexoAdm_m").val($(this).attr('btn-sexo'));
      $("#fNacAdm_m").val($(this).attr('btn-fechanac'));
      $("#callenumeroAdm_m").val($(this).attr('btn-callenumero'));
      $("#coloniaAdm_m").val($(this).attr('btn-colonia'));
      $("#estadoAdm_m").val($(this).attr('btn-estado'));
      $("#municipioAdm_m").val($(this).attr('btn-municipio'));
      $("#CPAdm_m").val($(this).attr('btn-cp'));
      $("#fIngAdm_m").val($(this).attr('btn-fechaing'));
      $("#curpAdm_m").val($(this).attr('btn-curp')); 
      $("#rfcAdm_m").val($(this).attr('btn-rfc'));
      $("#cedulaAdm_m").val($(this).attr('btn-cedula'));
      $("#telefonoAdm_m").val($(this).attr('btn-telefono'));
      $("#celularAdm_m").val($(this).attr('btn-celular'));
      $("#emailAdm_m").val($(this).attr('btn-email'));
      $("#academiaAdm_m").val($(this).attr('btn-academia'));
      $("#areaAdm_m").val($(this).attr('$id_area'));
      $("#observacionesAdm_m").val($(this).attr('btn-observaciones'));
   });

  /*---------------------- Cargar datos de modificacion Administradores --------------------------*/
   $(document).on('click', '#modificar_Docente',function(){
      $("#idDoc_m").val($(this).attr('btn-id_docente'));
      $("#apaternoDoc_m").val($(this).attr('btn-app'));
      $("#amaternoDoc_m").val($(this).attr('btn-apm'));
      $("#nombresDoc_m").val($(this).attr('btn-nombres'));
      $("#sexoDoc_m").val($(this).attr('btn-sexo'));
      $("#fNacDoc_m").val($(this).attr('btn-fechanac'));
      $("#callenumeroDoc_m").val($(this).attr('btn-callenumero'));
      $("#coloniaDoc_m").val($(this).attr('btn-colonia'));
      $("#estadoDoc_m").val($(this).attr('btn-estado'));
      $("#municipioDoc_m").val($(this).attr('btn-municipio'));
      $("#CPDoc_m").val($(this).attr('btn-cp'));
      $("#fIngDoc_m").val($(this).attr('btn-fechaing'));
      $("#curpDoc_m").val($(this).attr('btn-curp')); 
      $("#rfcDoc_m").val($(this).attr('btn-rfc'));
      $("#cedulaDoc_m").val($(this).attr('btn-cedula'));
      $("#telefonoDoc_m").val($(this).attr('btn-telefono'));
      $("#celularDoc_m").val($(this).attr('btn-celular'));
      $("#emailDoc_m").val($(this).attr('btn-email'));
      $("#academiaDoc_m").val($(this).attr('btn-academia'));
      $("#observacionesDoc_m").val($(this).attr('btn-observaciones'));
   });  



});