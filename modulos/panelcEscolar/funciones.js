$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: 'estados.php'
  }).done(function(lista_cat){
    $('#estado').html(lista_cat)
  }).fail(function(){
    alert('Hubo un error al cargar las estados')
  })

  $('#estado').on('change', function(){
    var id = $('#estado').val()
    $.ajax({
      type: 'POST',
      url: 'municipios.php',
      data: {'id': id}
    }).done(function(listas_ser){
      $('#municipio').html(listas_ser)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

  $.ajax({
    type: 'POST',
    url: 'grupo.php'
  }).done(function(lista_cat){
    $('#grupo').html(lista_cat)
  }).fail(function(){
    alert('Hubo un error al cargar los grupos')
  })

  $.ajax({
    type: 'POST',
    url: 'estatus.php'
  }).done(function(lista_cat){
    $('#estatus').html(lista_cat)
  }).fail(function(){
    alert('Hubo un error al cargar el estatus')
  })

  $.ajax({
    type: 'POST',
    url: 'generacion.php'
  }).done(function(lista_cat){
    $('#generacion').html(lista_cat)
  }).fail(function(){
    alert('Hubo un error al cargar el estatus')
  })

  $('#Inscribir').on('click',function(){
  	var apaterno= $("#apaterno").val();
  	var amaterno= $("#amaterno").val();
  	var nombres= $("#nombres").val();
  	var sexo= $("#sexo").val();
  	var fNac= $('#fNac').val();
  	var CURP= $("#curp").val();
  	var telefono= $("#telefono").val();
  	var email= $("#email").val();
  	var callenumero= $("#calle-numero").val();
  	var colonia= $("#colonia").val();
  	var estado= $("#estado").val();
    var estado2 = $("#estado").data("estado");
  	var municipio= $("#municipio").val();
  	var CP= $("#CP").val();
  	var fIns= $("#fIns").val();
  	var grupo= $("#grupo").val();
  	var estatus= $("#estatus").val();
  	var generacion= $("#generacion").val();
  	var eProced= $("#eProced").val();
  	var uGrado= $("#uGrado").val();
  	var ePrev= $("#ePrev").val();
  	var observaciones= $("#observaciones").val();

  	/*alert("APELLIDO PATERNO: "+apaterno+ 
  		  "\nAPELLIDO MATERNO: "+amaterno+
  		  "\nNombres: "+nombres+
  		  "\nSexo: "+sexo+
  		  "\nFecha Nacimiento: "+fNac+
        "\nCURP: "+CURP+
  		  "\ntelefono: "+telefono+
  		  "\nemail: "+email+
  		  "\ncalle-numero: "+callenumero+
  		  "\ncolonia: "+colonia+
  		  "\nestado: "+estado+
        "\nestado2: "+estado2+
  		  "\nmunicipio: "+municipio+
  		  "\nCP: "+CP+
  		  "\nfIns: "+fIns+
  		  "\ngrupo: "+grupo+
  		  "\nestatus: "+estatus+
  		  "\ngeneracion: "+generacion+
  		  "\neProced: "+eProced+
  		  "\nuGrado: "+uGrado+
  		  "\nePrev: "+ePrev+
  		  "\nobservaciones: "+observaciones);*/

    $.ajax({
      url:"insertarAlumnos.php",
      method:"POST",
      data:{
        'apaterno' : apaterno,
        'amaterno' : amaterno,
        'nombres' : nombres,
        'sexo' : sexo,
        'fNac' : fNac,
        'CURP' : CURP,
        'telefono' : telefono,
        'email' : email,
        'callenumero' : callenumero,
        'colonia' : colonia,
        'estado' : estado,
        'estado2' : estado2,
        'municipio': municipio,
        'CP' : CP,
        'fIns' : fIns,
        'grupo' : grupo,
        'estatus' : estatus,
        'generacion' : generacion,
        'eProced': eProced,
        'uGrado': uGrado,
        'ePrev': ePrev,
        'observaciones' : observaciones
      },
      success:function(data){
        alert(data);
      }

    })
  })

})