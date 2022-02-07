$(document).on('change', '#select-categorias',function(){
  var id_categoria=$('#select-categorias').val();
  llenar_tabla_articulos(id_categoria);
});

$(document).ready(function(){
  $.ajax({
      type: 'POST',
      url:'noticias/seleccion_cargar_articulo.php'
    }).done(function(lista){
      $('#select-categorias').html(lista)
    }).fail(function(){
      alert('Hubo un error al cargar las categorias');
  })
  llenar_tabla_articulos(1000);
})

function llenar_tabla_articulos(id_categoria){
  $.ajax({
    url:"noticias/cargar_tabla_noticias.php",
    type:"POST",
    data:{id_categoria:id_categoria},
    success: function(data){
      $('#tbody_articulos').html(data);
    }
  })
}