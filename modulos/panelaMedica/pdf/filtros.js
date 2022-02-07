$(document).on('click', '#filtro_fechas',function(){
  var ffecha_ini=escape($("#fecha_ini_f").val());
  var ffecha_fin=escape($("#fecha_fin_f").val());
  var filtro_f=true;
  $("#fdesc").load("pdf/aplicar_filtro.php?filtro_fechas="+filtro_f+"&ffecha_ini="+ffecha_ini+"&ffecha_fin="+ffecha_fin, function() {
    $( "#tabla" ).load(" #tabla", function() {
      tabla("Listado");
      setTimeout('alerta_info("Correcto","Busqueda completada");', 500);
    });
  });
});