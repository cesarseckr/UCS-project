$(document).ready(function() {
    $(this).attr("title", "SIAA - Universidad de Ciencias de la Seguirdad");
});
var timer=1000;
function recargar (titulo){

   $( "#tabla" ).load(" #tabla", function() {
    tabla(titulo);
        });

        $("#s1").load(" #s1");
        $("#s2").load(" #s2");
        $("#s3").load(" #s3");
        $("#n1").load(" #n1");
        $("#n2").load(" #n2");
        }

function recargarComp (titulo){
    $( "#tabla" ).load(" #tabla", function() {
        tabla(titulo);
        });
        $("#s1").load(" #s1");
        $("#s2").load(" #s2");
        $("#s3").load(" #s3");
        $("#n1").load(" #n1");
        $("#n2").load(" #n2");
        }

function recargar_fotos (){
     d = new Date();
     $("#fp").attr("src", dir_foto+"?"+d.getTime()); 
     $("#fpn").attr("src", dir_foto+"?"+d.getTime());
     $("#fps").attr("src", dir_foto+"?"+d.getTime());     
        }     

  $(document).on("change","#foto", function(){
   alerta_cargando("Cargando","Por favor espere a que se ejecuten los registros");
   var form='#form-foto';
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
       setTimeout('alerta_correcto("Correcto","Fotografía actualizada correctamente");', timer);   
       recargar_fotos();
            }
            else{
        alerta_error("Error","Seleccione una imagén menor a 4MB");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status +" - "+textStatus +" "+errorThrown);   
        }
    }); 
    });

 $(document).on("change","#foto_usr", function(e){
      addImage(e);
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#perfil').attr("src",result);
     }

 $(document).on("change","#foto_usr_m", function(e){
      addImage_m(e);
     });

     function addImage_m(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload_m;
      reader.readAsDataURL(file);
     }
  
     function fileOnload_m(e) {
      var result=e.target.result;
      $('#perfil_m').attr("src",result);
     }


  function add(id,titulo){
   alerta_cargando("Cargando","Por favor espere a que se ejecuten los registros");
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
            if(data==1){
        setTimeout('alerta_correcto("Correcto","Datos registrados correctamente");', timer); 
        recargar(titulo);
            }
            else if(data==2){
        setTimeout('alerta_info("Correcto","Datos registrados correctamente, pero la imagen supera el peso máximo");', timer); 
        recargar(titulo);
            }
            else if(data==3){
        setTimeout('alerta_error("Error","Esta matrícula ya se encuentra asignada a otro alumno");', timer); 
        recargar(titulo);
            }
            else if(data==4){
        setTimeout('alerta_error("Error","Este usuario ya se encuentra asignado");', timer); 
        recargar(titulo);
            }
            else if(data==5){
        setTimeout('alerta_error("Error","Esta clave ya se encuentra asignada a otro registro");', timer); 
        recargar(titulo);
            }
            else if(data==6){
        setTimeout('alerta_error("Error","Esta aula ya se encuentra asignada en estas fechas");', timer); 
           recargar(titulo);
            }
          else if(data==7){
        setTimeout('alerta_error("Error","Has superado el número de archivos permitidos");', timer); 
        recargar(titulo);
            }
            else if(data==8){
        setTimeout('alerta_error("Error","Has superado el peso máximo del archivo de 6MB");', timer); 
        recargar(titulo);
            }
            else if(data==10){
        // UTILIZADO PARA RECARGAR LAS MATERIAS ASIGNADA DE MANERA SINCRÓNICA \\
        var grupo=$("#id_grupo_m").val();
        var curso=$("#id_curso_m").val();
        cargarMateriasComp(grupo, curso);
                    }
         else if(data==11){
        // UTILIZADO PARA RECARGAR LOS ALUMNOS ASIGNADOS DE MANERA SINCRÓNICA \\
        var grupo=$("#id_grupo_av").val();
        cargarAlumnosAvComp(grupo);
                    }
        else if(data==12){
        // UTILIZADO PARA RECARGAR LOS ALUMNOS ASIGNADOS DE MANERA SINCRÓNICA \\
        var grupo=$("#id_grupo_fin").val();
        cargarAlumnosFnComp(grupo);
                    }
        else if(data==20){
        // UTILIZADO PARA RECARGAR EL HORARIO \\
        var id_horario=$("#id_m").val();
        $( "#tabla_horarios" ).load("php/tabla_horarios_asignados.php?recargar=true&id_horario="+id_horario, function() {
        setTimeout('alerta_correcto("Correcto","Datos registrados correctamente");', timer); 
        tabla(titulo);
        });
        recargar(titulo);
            }
        else if(data==21){
        // UTILIZADO PARA DEVOLVER ERROR DE HORARIO \\
       setTimeout('alerta_error("Error","Esta aula ya se encuentra asignada en estas fechas");', timer); 
        recargar(titulo);
            }
            else{
        setTimeout('alerta_error("Error","A ocurrido un error al registrar los datos");', timer);
        console.log("Error: "+data);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
    }); 
    }

  function mod(id,titulo){
   alerta_cargando("Cargando","Por favor espere a que se ejecuten los registros");
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
            if(data==1){
        setTimeout('alerta_correcto("Correcto","Datos actualizados correctamente");', timer); 
        recargar(titulo);
            }
            else if(data==2){
        setTimeout('alerta_info("Correcto","Datos actualizados correctamente, pero la imagen supera el peso máximo");', timer); 
        recargar(titulo);
            }
            else if(data==3){
        setTimeout('alerta_error("Error","Esta matrícula ya se encuentra asignada a otro alumno");', timer); 
        recargar(titulo);
            }
            else if(data==4){
        setTimeout('alerta_error("Error","Este usuario ya se encuentra asignado");', timer); 
        recargar(titulo);
            }
            else if(data==5){
        setTimeout('alerta_error("Error","Esta clave ya se encuentra asignada a otro registro");', timer); 
        recargar(titulo);
            }
            else if(data==6){
        setTimeout('alerta_error("Error","Esta aula ya se encuentra asignada en estas fechas");', timer); 
        recargar(titulo);
            }
            else{
        setTimeout('alerta_error("Error","A ocurrido un error al actualizar los datos");', timer);
        console.log("Error: "+data);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
    }); 
    }

    /*---------------------- Filtros --------------------------*/
   $(document).on('click', '#filtro_alumnos',function(){
   alerta_cargando("Buscando","Espere mientras se realiza la busqueda");
      var fmatricula=escape($("#matricula_f").val());
      var fnombre=escape($("#nombre_f").val());
      var fapaterno=escape($("#apaterno_f").val());
      var famaterno=escape($("#amaterno_f").val());
      var fgrupo=escape($("#grupo_f_d").val());
      var festatus=escape($("#estatus_f").val());
      var fgeneracion=escape($("#generacion_f_d").val());
      var filtro_f=true;
      $("#fdesc").load("php/aplicar_filtro.php?filtro_alumnos="+filtro_f+"&matricula="+fmatricula+"&nombre="+fnombre+"&apaterno="+fapaterno+"&amaterno="+famaterno+"&estatus="+festatus+"&grupo="+fgrupo+"&generacion="+fgeneracion, function() {
      $( "#tabla" ).load(" #tabla", function() {
      tabla("Listado de alumnos");
      setTimeout('alerta_info("Correcto","Busqueda completada");', timer+500);
        });
       });
      });

   $(document).on('click', '#filtro_alumnos_calificaciones',function(){
   alerta_cargando("Buscando","Espere mientras se realiza la busqueda");
      var fmatricula=escape($("#matricula_f").val());
       var fgrupo=escape($("#grupo_f_d").val());
      var filtro_f=true;
      $("#fdesc").load("php/aplicar_filtro.php?filtro_alumnos_calificaciones="+filtro_f+"&fgrupo="+fgrupo, function() {
      $( "#tabla" ).load(" #tabla", function() {
      tabla("Listado de Grupos");
      setTimeout('alerta_info("Correcto","Busqueda completada");', timer+500);
        });
       });
      });

   $(document).on('click', '#filtro_materias',function(){
   alerta_cargando("Buscando","Espere mientras se realiza la busqueda");
      var fequivalencia=escape($("#equivalencia_f").val());
      var fcurso=escape($("#curso_f_d").val());
      var filtro_f=true;
      $("#fdesc").load("php/aplicar_filtro.php?filtro_materias="+filtro_f+"&fequivalencia="+fequivalencia+"&fcurso="+fcurso, function() {
      $( "#tabla" ).load(" #tabla", function() {
      tabla("Listado de materias");
      setTimeout('alerta_info("Correcto","Busqueda completada");', timer+500);
        });
       });
      });

    $(document).on('click', '#filtro_grupos',function(){
   alerta_cargando("Buscando","Espere mientras se realiza la busqueda");
      var fnombre=escape($("#nombre_f").val());
      var fcarrera=escape($("#carrera_f").val());
      var fcurso=escape($("#curso_f_d").val());
      var fciclo=escape($("#ciclo_f_d").val());
      var filtro_f=true;
      $("#fdesc").load("php/aplicar_filtro.php?filtro_grupos="+filtro_f+"&fnombre="+fnombre+"&fcurso="+fcurso+"&fcarrera="+fcarrera+"&fciclo="+fciclo, function() {
      $( "#tabla" ).load(" #tabla", function() {
      tabla("Listado de grupos");
      setTimeout('alerta_info("Correcto","Busqueda completada");', timer+500);
        });
       });
      });

    $(document).on('click', '#filtro_listas',function(){
    alerta_cargando("Buscando","Espere mientras se realiza la busqueda");
      var fdocente=escape($("#docente_f").val());
      var fgrupo=escape($("#grupo_f_d").val());
      var fciclo=escape($("#ciclo_f_d").val());
      var filtro_f=true;
      $("#fdesc").load("php/aplicar_filtro.php?filtro_listas="+filtro_f+"&fdocente="+fdocente+"&fgrupo="+fgrupo+"&fciclo="+fciclo, function() {
      $( "#tabla" ).load(" #tabla", function() {
      tabla("Listado de materias");
      setTimeout('alerta_info("Correcto","Busqueda completada");', timer+500);
        });
       });
      });

     $(document).on('click', '#filtro_calificaciones',function(){
      alerta_cargando("Buscando","Espere mientras se realiza la busqueda");
      var fgrupo=escape($("#grupo_f_d").val());
      var filtro_f=true;
      $("#fdesc").load("php/aplicar_filtro.php?filtro_calificaciones="+filtro_f+"&fgrupo="+fgrupo, function() {
      $( "#tabla" ).load(" #tabla", function() {
      tabla("Listado de calificaciones");
      setTimeout('alerta_info("Correcto","Busqueda completada");', timer+500);
        });
       });
      });

     $(document).on('click', '#filtro_fechas',function(){
      alerta_cargando("Buscando","Espere mientras se realiza la busqueda");
      var ffecha_ini=escape($("#fecha_ini_f").val());
      var ffecha_fin=escape($("#fecha_fin_f").val());
      var filtro_f=true;
      $("#fdesc").load("php/aplicar_filtro.php?filtro_fechas="+filtro_f+"&ffecha_ini="+ffecha_ini+"&ffecha_fin="+ffecha_fin, function() {
      $( "#tabla" ).load(" #tabla", function() {
      tabla("Listado");
      setTimeout('alerta_info("Correcto","Busqueda completada");', timer+500);
        });
       });
      });

    /*---------------------- Cargar datos de modificacion --------------------------*/

   $(document).on('click', 'button[type="reset"]',function(){
    $('.selectpicker').val(0);
    $('.selectpicker').selectpicker('render');
   });

    $(document).on('click', '#abrir_usuario',function(){
      $("#id_datos_m").val($(this).attr('btn-id_datos'));
      $("#id_tipo_m").val($(this).attr('btn-id_tipo'));
      $("#id_usuario_m").val($(this).attr('btn-id_usuario'));
      $("#usuario_m").val($(this).attr('btn-usuario'));
      $("#pass").val($(this).attr('btn-pass'));
      $("#pass_confirmation").val($(this).attr('btn-pass'));
      var id_usuario=$(this).attr('btn-id_usuario');
      cargarArchivos(id_usuario);
      if($(this).attr('btn-estatus')===""){
      $("#estatus_usuario_m").val(1);
      }
      else{
      $("#estatus_usuario_m").val($(this).attr('btn-estatus'));
      }
      $('#estatus_usuario_m').selectpicker('refresh');
      });

      $(document).on('click', '#btn_materias',function(){
      $("#id_m").val($(this).attr('btn-id_materia'));
      $("#equivalencia_m").val($(this).attr('btn-id_equivalencia'));
      $("#clave_m").val($(this).attr('btn-clave'));
      $("#nombre_m").val($(this).attr('btn-nombre'));
      var curso=$(this).attr('btn-id_curso');
      var carrera=$(this).attr('btn-id_carrera');
      $("#creditos_m").val($(this).attr('btn-creditos'));
      $("#horas_t_m").val($(this).attr('btn-horas_semana'));
      $("#estatus_a_m").val($(this).attr('btn-estatus'));

      $('#estatus_a_m').selectpicker('refresh');
      $('#equivalencia_m').selectpicker('refresh');

      seleccionadosCarrera(carrera,curso);
      
      });

            $(document).on('click', '#btn_grupos',function(){
      $("#id_m").val($(this).attr('btn-id_grupo'));
      $("#carrera_m").val($(this).attr('btn-id_carrera'));
      $("#nombre_m").val($(this).attr('btn-nombre'));
      $("#estatus_m").val($(this).attr('btn-estatus'));
      $("#sede_m").val($(this).attr('btn-sede'));
      var curso=$(this).attr('btn-id_curso');
      var carrera=$(this).attr('btn-id_carrera');
      var plan=$(this).attr('btn-id_plan');
      var ciclo=$(this).attr('btn-id_ciclo');
      $("#estatus_a_m").val($(this).attr('btn-estatus'));
      $('#estatus_a_m').selectpicker('refresh');
      $('#sede_m').selectpicker('refresh');
    
      seleccionadosCarrera(carrera,curso);
      seleccionadosCiclo(plan,ciclo);
      
      });

      $(document).on('click', '#btn_materias_grupos',function(){
      $("#id_grupo_m").val($(this).attr('btn-id_grupo'));
      $("#grupo_mat").val($(this).attr('btn-nombre'));
      $("#carrera_mat").val($(this).attr('btn-carrera'));
      $("#id_ciclo_m").val($(this).attr('btn-id_ciclo'));
      $("#id_curso_m").val($(this).attr('btn-id_curso'));
      $("#curso_mat").val($(this).attr('btn-curso'));
      var grupo=$(this).attr('btn-id_grupo');
      var curso=$(this).attr('btn-id_curso');
      cargarMaterias(grupo, curso);  
      });

      $(document).on('click', '#btn_avanzar_alumnos',function(){
      $("#id_grupo_av").val($(this).attr('btn-id_grupo'));
      $("#grupo_av").val($(this).attr('btn-nombre'));
      $("#carrera_av").val($(this).attr('btn-carrera'));
      $("#curso_av").val($(this).attr('btn-curso')); 
      var grupo=$(this).attr('btn-id_grupo');
      cargarAlumnosAv(grupo); 
      });

      $(document).on('click', '#btn_edificios',function(){
      $("#id_m").val($(this).attr('btn-id_edificio'));
      $("#sede_m").val($(this).attr('btn-id_sede'));
      $("#nombres_m").val($(this).attr('btn-nombre'));
      $('#sede_m').selectpicker('refresh');
      $("#estatus_a_m").val($(this).attr('btn-estatus'));
      $('#estatus_a_m').selectpicker('refresh');
      });

       $(document).on('click', '#btn_horas',function(){
      $("#id_m").val($(this).attr('btn-id_hora'));
      $("#hora_in_m").val($(this).attr('btn-hora_in'));
      $("#hora_fin_m").val($(this).attr('btn-hora_fin'));
      $("#estatus_a_m").val($(this).attr('btn-estatus'));
      $('#estatus_a_m').selectpicker('refresh');
      });

      $(document).on('click', '#btn_sedes',function(){
      $("#id_m").val($(this).attr('btn-id_sede'));
      $("#siglas_m").val($(this).attr('btn-siglas'));
      $("#nombres_m").val($(this).attr('btn-nombre'));
      $("#direccion_m").val($(this).attr('btn-direccion'));
      $("#telefono_m").val($(this).attr('btn-telefono'));
      $("#tipo_m").val($(this).attr('btn-tipo'));
      $("#estatus_a_m").val($(this).attr('btn-estatus'));

      var id_estado=$(this).attr('btn-id_estado');
      var id_municipio=$(this).attr('btn-id_municipio');
      
      seleccionados(id_estado,id_municipio);
      $('#estatus_a_m').selectpicker('refresh');
      $('#tipo_m').selectpicker('refresh');
      });

      $(document).on('click', '#btn_finalizar_grupo',function(){
      $("#id_grupo_fin").val($(this).attr('btn-id_grupo'));
      $("#grupo_fin").val($(this).attr('btn-nombre'));
      $("#carrera_fin").val($(this).attr('btn-carrera'));
      $("#curso_fin").val($(this).attr('btn-curso')); 
      var grupo=$(this).attr('btn-id_grupo');
      cargarAlumnosFn(grupo); 
      });

      $(document).on('click', '#btn_periodos',function(){
      $("#id_grupo_per").val($(this).attr('btn-id_grupo'));
      $("#grupo_per").val($(this).attr('btn-nombre'));
      $("#carrera_per").val($(this).attr('btn-carrera'));
      $("#curso_per").val($(this).attr('btn-curso')); 
       $("#fecha_in").val($(this).attr('btn-fecha_in')); 
        $("#fecha_fin").val($(this).attr('btn-fecha_fin'));
        $("#fecha_in_extra").val($(this).attr('btn-fecha_in_extra')); 
        $("#fecha_fin_extra").val($(this).attr('btn-fecha_fin_extra'));
        $("#fecha_in_ad").val($(this).attr('btn-fecha_in_ad')); 
        $("#fecha_fin_ad").val($(this).attr('btn-fecha_fin_ad'));
        $("#observaciones_per").val($(this).attr('btn-observaciones')); 
        $("#periodo").val($(this).attr('btn-id_periodo')); 
        $("#periodo_extra").val($(this).attr('btn-id_periodo_extra')); 
        $("#periodo_ad").val($(this).attr('btn-id_periodo_ad')); 
      });

      $(document).on('click', '#btn_mod_calificaciones',function(){
      $("#id_m").val($(this).attr('btn-id_calificacion'));
      $("#calif").val($(this).attr('btn-calificacion'));
      $("#asistencia").val($(this).attr('btn-faltas'));
      $("#id_grupo").val($(this).attr('btn-id_grupo'));
      $("#materia").val($(this).attr('btn-materia'));
      $("#alumno").val($(this).attr('btn-alumno'));
      });

      $(document).on('click', '#btn_equivalencias',function(){
      $("#id_m").val($(this).attr('btn-id_equivalencia'));
      $("#estatus_a_m").val($(this).attr('btn-estatus'));
      $("#nombres_m").val($(this).attr('btn-nombre'));
      $('#estatus_a_m').selectpicker('refresh');
      });

      $(document).on('click', '#btn_dias',function(){
      $("#id_m").val($(this).attr('btn-id_dia'));
      $("#estatus_a_m").val($(this).attr('btn-estatus'));
      $('#estatus_a_m').selectpicker('refresh');
      });

           $(document).on('click', '#btn_academias',function(){
      $("#id_m").val($(this).attr('btn-id_academia'));
      $("#estatus_a_m").val($(this).attr('btn-estatus'));
      $("#nombres_m").val($(this).attr('btn-nombre'));
      $("#plan_m").val($(this).attr('btn-id_plan'));
      $('#estatus_a_m').selectpicker('refresh');
      $('#plan_m').selectpicker('refresh');
      });

         $(document).on('click', '#btn_carreras',function(){
      $("#id_m").val($(this).attr('btn-id_carrera'));
      $("#clave_m").val($(this).attr('btn-clave'));
      $("#estatus_a_m").val($(this).attr('btn-estatus'));
      $("#nombres_m").val($(this).attr('btn-nombre'));
      $("#academia_m").val($(this).attr('btn-id_academia'));
      $("#tipo_area_m").val($(this).attr('btn-id_tipo'));
      $('#academia_m').selectpicker('refresh');
      $('#estatus_a_m').selectpicker('refresh');
      $('#tipo_area_m').selectpicker('refresh');
      });

         $(document).on('click', '#btn_planes',function(){
      $("#id_m").val($(this).attr('btn-id_plan'));
      $("#clave_m").val($(this).attr('btn-clave'));
      $("#estatus_a_m").val($(this).attr('btn-estatus'));
      $("#nombres_m").val($(this).attr('btn-nombre'));
      $("#per_evaluacion_m").val($(this).attr('btn-per_evaluacion'));
      $("#per_extra_m").val($(this).attr('btn-per_extra'));
      $("#per_especial_m").val($(this).attr('btn-per_especial'));
      $("#calif_m").val($(this).attr('btn-calif_minima'));
      $("#asistencia_m").val($(this).attr('btn-asistencia_minima'));
      $('#estatus_a_m').selectpicker('refresh');
      $('#per_especial_m').selectpicker('refresh');
      $('#per_extra_m').selectpicker('refresh');
      $('#per_evaluacion_m').selectpicker('refresh');
      });

     $(document).on('click', '#btn_ciclos',function(){
      $("#id_m").val($(this).attr('btn-id_ciclo'));
      $("#clave_m").val($(this).attr('btn-clave'));
      $("#estatus_a_m").val($(this).attr('btn-estatus'));
      $("#nombres_m").val($(this).attr('btn-nombre'));
      $("#fecha_inicio_m").val($(this).attr('btn-fecha_inicio'));
      $("#fecha_fin_m").val($(this).attr('btn-fecha_fin'));
      $("#plan_m").val($(this).attr('btn-id_plan'));
      $('#estatus_a_m').selectpicker('refresh');
      $('#plan_m').selectpicker('refresh');
      });

     $(document).on('click', '#btn_generaciones',function(){
      $("#id_m").val($(this).attr('btn-id_generacion'));
      $("#nombres_m").val($(this).attr('btn-nombre'));
      $("#academia_m").val($(this).attr('btn-id_academia'));
      $("#estatus_a_m").val($(this).attr('btn-estatus'));
      $('#estatus_a_m').selectpicker('refresh');
      $('#academia_m').selectpicker('refresh');
      });

     $(document).on('click', '#btn_cursos',function(){
      $("#id_m").val($(this).attr('btn-id_curso'));
      $("#nombres_m").val($(this).attr('btn-nombre'));
      $("#carrera_m").val($(this).attr('btn-id_carrera'));
      $("#estatus_a_m").val($(this).attr('btn-estatus'));
      $('#estatus_a_m').selectpicker('refresh');
      $('#carrera_m').selectpicker('refresh');
      });

    $(document).on('click', '#btn_aulas',function(){
      $("#id_m").val($(this).attr('btn-id_aula'));
      $("#nombres_m").val($(this).attr('btn-nombre'));
      $("#edificio_m").val($(this).attr('btn-id_edificio'));
      $("#capacidad_m").val($(this).attr('btn-capacidad'));
      $("#ideal_m").val($(this).attr('btn-ideal'));
      $("#estatus_a_m").val($(this).attr('btn-estatus'));
      $("#tipo_m").val($(this).attr('btn-tipo'));
      $('#edificio_m').selectpicker('refresh');
      $('#tipo_m').selectpicker('refresh');
      $('#estatus_a_m').selectpicker('refresh');
      });

      $(document).on('click', '#btn_horarios',function(){
      $("#id_m").val($(this).attr('btn-id_horario'));
      $("#aula_m").val($(this).attr('btn-id_aula'));
      $('#aula_m').selectpicker('refresh');

      var grupo=$(this).attr('btn-id_grupo');
      var generacion=$(this).attr('btn-id_generacion');
      var academia=$(this).attr('btn-id_academia');
      var plan=$(this).attr('btn-id_plan');
      var curso=$(this).attr('btn-id_curso');
      var carrera=$(this).attr('btn-id_carrera');
      seleccionadosGrupo(carrera,curso,grupo);
      seleccionadosGeneracion(plan,academia,generacion);
      });

   $(document).on('click', '#modificar_admin',function(){
      $("#id_m").val($(this).attr('btn-id_administrativo'));
      $("#apaterno_m").val($(this).attr('btn-app'));
      $("#amaterno_m").val($(this).attr('btn-apm'));
      $("#nombres_m").val($(this).attr('btn-nombres'));
      $("#sexo_m").val($(this).attr('btn-sexo'));
      $("#fNac_m").val($(this).attr('btn-fechanac'));
      $("#callenumero_m").val($(this).attr('btn-callenumero'));
      $("#colonia_m").val($(this).attr('btn-colonia'));
      $("#CP_m").val($(this).attr('btn-cp'));
      $("#fIng_m").val($(this).attr('btn-fechaing'));
      $("#curp_m").val($(this).attr('btn-curp')); 
      $("#rfc_m").val($(this).attr('btn-rfc'));
      $("#cedula_m").val($(this).attr('btn-cedula'));
      $("#telefono_m").val($(this).attr('btn-telefono'));
      $("#celular_m").val($(this).attr('btn-celular'));
      $("#email_m").val($(this).attr('btn-email'));
      $("#academia_m").val($(this).attr('btn-academia'));
      $("#area_m").val($(this).attr('btn-id_area'));
      $('#area_m').selectpicker('refresh');
      $("#observaciones_m").val($(this).attr('btn-observaciones'));
      var id_estado=$(this).attr('btn-estado');
      var id_municipio=$(this).attr('btn-municipio');
      $('#edo').empty();
      $('#mun').empty();
      $('#llenar').empty();

      if(isNaN($(this).attr('btn-estado'))){
      id_estado=0;
      $("#edo").append("<p>"+$(this).attr('btn-estado')+"</p>");
      }
      if(isNaN($(this).attr('btn-municipio'))){
      id_municipio=0;
      $("#mun").append("<p>"+$(this).attr('btn-municipio')+"</p>");
      $("#llenar").append("<center><p style='color:red;'><i>Este elemento no cuenta con la dirección actualizada al nuevo formato, porfavor seleccione el Estado y Municipio que le corresponde</i></p></center>");      
      }
      seleccionados(id_estado,id_municipio);
   });

  /*---------------------- Cargar datos de modificacion inistradores --------------------------*/
   $(document).on('click', '#modificar_doc',function(){
      $("#id_m").val($(this).attr('btn-id_docente'));
      $("#apaterno_m").val($(this).attr('btn-app'));
      $("#amaterno_m").val($(this).attr('btn-apm'));
      $("#nombres_m").val($(this).attr('btn-nombres'));
      $("#sexo_m").val($(this).attr('btn-sexo'));
      $("#fNac_m").val($(this).attr('btn-fechanac'));
      $("#callenumero_m").val($(this).attr('btn-callenumero'));
      $("#colonia_m").val($(this).attr('btn-colonia'));
      $("#CP_m").val($(this).attr('btn-cp'));
      $("#fIng_m").val($(this).attr('btn-fechaing'));
      $("#curp_m").val($(this).attr('btn-curp')); 
      $("#rfc_m").val($(this).attr('btn-rfc'));
      $("#cedula_m").val($(this).attr('btn-cedula'));
      $("#telefono_m").val($(this).attr('btn-telefono'));
      $("#celular_m").val($(this).attr('btn-celular'));
      $("#email_m").val($(this).attr('btn-email'));
      $("#academia_m").val($(this).attr('btn-academia'));
      $("#estatus_a_m").val($(this).attr('btn-estatus'));
      $("#observaciones_m").val($(this).attr('btn-observaciones'));
      $("#tipo_area_m").val($(this).attr('btn-id_tipo_area'));
      $('#tipo_area_m').selectpicker('refresh');
      $('#estatus_a_m').selectpicker('refresh');
      var id_estado=$(this).attr('btn-estado');
      var id_municipio=$(this).attr('btn-municipio');
      $('#edo').empty();
      $('#mun').empty();
      $('#llenar').empty();

      if(isNaN($(this).attr('btn-estado'))){
      id_estado=0;
      $("#edo").append("<p>"+$(this).attr('btn-estado')+"</p>");
      }
      if(isNaN($(this).attr('btn-municipio'))){
      id_municipio=0;
      $("#mun").append("<p>"+$(this).attr('btn-municipio')+"</p>");
      $("#llenar").append("<center><p style='color:red;'><i>Este elemento no cuenta con la dirección actualizada al nuevo formato, porfavor seleccione el Estado y Municipio que le corresponde</i></p></center>");      
      }
      seleccionados(id_estado,id_municipio);
   }); 

      $(document).on('click', '#modificar_alumno',function(){
      $("#id_m").val($(this).attr('btn-id_alumno'));
      $("#apaterno_m").val($(this).attr('btn-app'));
      $("#amaterno_m").val($(this).attr('btn-apm'));
      $("#nombres_m").val($(this).attr('btn-nombres'));
      $("#sexo_m").val($(this).attr('btn-sexo'));
      $("#fNac_m").val($(this).attr('btn-fechanac'));
      $("#callenumero_m").val($(this).attr('btn-callenumero'));
      $("#colonia_m").val($(this).attr('btn-colonia'));
      $("#CP_m").val($(this).attr('btn-cp'));
      $("#fIng_m").val($(this).attr('btn-fechaing'));
      $("#curp_m").val($(this).attr('btn-curp')); 
      $("#telefono_m").val($(this).attr('btn-telefono'));
      $("#email_m").val($(this).attr('btn-email'));
      $("#estatus_m").val($(this).attr('btn-id_estatus'));
      $("#esc_origen_m").val($(this).attr('btn-id_esc_origen'));
      $("#observaciones_m").val($(this).attr('btn-observaciones'));
      $("#matricula_m").val($(this).attr('btn-matricula'));

      $("#est_prev_m").val($(this).attr('btn-est_prev'));
      $("#ult_grado_m").val($(this).attr('btn-ult_grado'));

      $('#estatus_m').selectpicker('refresh');
      $('#esc_origen_m').selectpicker('refresh');
      $('#grupo_m').selectpicker('refresh');
      $('#generacion_m').selectpicker('refresh');

      var url=$(this).attr('btn-url');
      var id_estado=$(this).attr('btn-estado');
      var id_municipio=$(this).attr('btn-municipio');

      var grupo=$(this).attr('btn-id_grupo');
      var generacion=$(this).attr('btn-id_generacion');
      var academia=$(this).attr('btn-id_academia');
      var plan=$(this).attr('btn-id_plan');
      var curso=$(this).attr('btn-id_curso');
      var carrera=$(this).attr('btn-id_carrera');

      if(url!==""){ 
      $("#act_alumno_m").html('<img id="perfil_m" class="img-thumbnail rounded-circle" src="../../archivos/'+url+'" width="230" alt="Perfil">');
      }
      else{
     $("#act_alumno_m").html('<img id="perfil_m" class="img-thumbnail rounded-circle" src="../../archivos/alumno-generica.png" width="230" alt="Perfil">');    
      }
      $('#edo').empty();
      $('#mun').empty();
      $('#llenar').empty();

      if(isNaN($(this).attr('btn-estado'))){
      id_estado=0;
      $("#edo").append("<p>"+$(this).attr('btn-estado')+"</p>");
      }
      if(isNaN($(this).attr('btn-municipio'))){
      id_municipio=0;
      $("#mun").append("<p>"+$(this).attr('btn-municipio')+"</p>");
      $("#llenar").append("<center><p style='color:red;'><i>Este elemento no cuenta con la dirección actualizada al nuevo formato, porfavor seleccione el Estado y Municipio que le corresponde</i></p></center>");      
      }

      seleccionados(id_estado,id_municipio);
      seleccionadosGrupo(carrera,curso,grupo);
      seleccionadosGeneracion(plan,academia,generacion);
   }); 

    /*---------------------- Carga de todos los catalogos y dependientes --------------------------*/

     function cargarMatDoc(id_grupo){
                $.ajax({
                          url:"php/cargar_mat_docsE.php",
                          method:"POST",
                          data:{id_grupo:id_grupo},
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#mat_doc").append('<option value="'+data[i].id_mat_doc+'" data-subtext="'+data[i].materia+'">'+data[i].nombre+'</option>');
                            }
                            
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
              }

 $( "#docente_f" ).ready(function() {
  var tipo=$("#docente_f").attr('tipo');
                $.ajax({
                          url:"php/cargar_docentesE.php",
                          method:"POST",
                          data:{tipo:tipo},
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#docente_f").append('<option value="'+data[i].id_docente+'">'+data[i].nombre+'</option>');
                            }
                            $('#docente_f').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#dia" ).ready(function() {
  var tipo=$("#dia").attr('tipo');
                $.ajax({
                          url:"php/cargar_diasE.php",
                          method:"POST",
                          data:{tipo:tipo},
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#dia").append('<option value="'+data[i].id_dia+'">'+data[i].nombre+'</option>');
                            }
                            $('#dia').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#hora" ).ready(function() {
  var tipo=$("#hora").attr('tipo');
                $.ajax({
                          url:"php/cargar_horasE.php",
                          method:"POST",
                          data:{tipo:tipo},
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#hora").append('<option value="'+data[i].id_hora+'">'+data[i].nombre+'</option>');
                            }
                            $('#hora').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#aula" ).ready(function() {
  var tipo=$("#aula").attr('tipo');
                $.ajax({
                          url:"php/cargar_aulasE.php",
                          method:"POST",
                          data:{tipo:tipo},
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#aula").append('<option value="'+data[i].id_aula+'">'+data[i].nombre+'</option>');
                            }
                            $('#aula').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#aula_m" ).ready(function() {
  var tipo=$("#aula_m").attr('tipo');
                $.ajax({
                          url:"php/cargar_aulasE.php",
                          method:"POST",
                          data:{tipo:tipo},
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#aula_m").append('<option value="'+data[i].id_aula+'">'+data[i].nombre+'</option>');
                            }
                            $('#aula_m').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

$( "#sede_m" ).ready(function() {
                $.ajax({
                          url:"php/cargar_sedesE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#sede_m").append('<option value="'+data[i].id_sede+'">'+data[i].nombre+'</option>');
                            }
                            $('#sede_m').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

$( "#sede" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_sedesE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#sede").append('<option value="'+data[i].id_sede+'">'+data[i].nombre+'</option>');
                            }
                            $('#sede').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });


$( "#tipo_area_m" ).ready(function() {
                $.ajax({
                          url:"php/cargar_tipo_areasE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#tipo_area_m").append('<option value="'+data[i].id_tipo_area+'">'+data[i].nombre+'</option>');
                            }
                            $('#tipo_area_m').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

$( "#tipo_area" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_tipo_areasE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#tipo_area").append('<option value="'+data[i].id_tipo_area+'">'+data[i].nombre+'</option>');
                            }
                            $('#tipo_area').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

$( "#curso_m" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_cursosE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#curso_m").append('<option value="'+data[i].id_curso+'">'+data[i].nombre+'</option>');
                            }
                            $('#curso_m').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#curso_f" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_cursosE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#curso_f").append('<option value="'+data[i].id_curso+'">'+data[i].nombre+'</option>');
                            }
                            $('#curso_f').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#curso" ).ready(function() {
                $.ajax({
                          url:"php/cargar_cursosE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#curso").append('<option value="'+data[i].id_curso+'">'+data[i].nombre+'</option>');
                            }
               $('#curso').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

$( "#carrera_m" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_carrerasE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#carrera_m").append('<option value="'+data[i].id_carrera+'">'+data[i].nombre+'</option>');
                            }
                            $('#carrera_m').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#carrera_f" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_carrerasE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#carrera_f").append('<option value="'+data[i].id_carrera+'">'+data[i].nombre+'</option>');
                            }
                            $('#carrera_f').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#carrera" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_carrerasE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#carrera").append('<option value="'+data[i].id_carrera+'">'+data[i].nombre+'</option>');
                            }
                            $('#carrera').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

$( "#academia_m" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_academiasE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#academia_m").append('<option value="'+data[i].id_academia+'">'+data[i].nombre+'</option>');
                            }
                            $('#academia_m').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#academia_f" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_academiasE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#academia_f").append('<option value="'+data[i].id_academia+'">'+data[i].nombre+'</option>');
                            }
                            $('#academia_f').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#academia" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_academiasE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#academia").append('<option value="'+data[i].id_academia+'">'+data[i].nombre+'</option>');
                            }
                            $('#academia').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#plan_m" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_planesE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#plan_m").append('<option value="'+data[i].id_plan+'">'+data[i].nombre+'</option>');
                            }
                            $('#plan_m').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#plan_f" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_planesE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#plan_f").append('<option value="'+data[i].id_plan+'">'+data[i].nombre+'</option>');
                            }
                            $('#plan_f').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#plan" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_planesE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#plan").append('<option value="'+data[i].id_plan+'">'+data[i].nombre+'</option>');
                            }
                            $('#plan').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#equivalencia_m" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_equivalenciasE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#equivalencia_m").append('<option value="'+data[i].id_equivalencia+'">'+data[i].nombre+'</option>');
                            }
                            $('#equivalencia_m').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#equivalencia_f" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_equivalenciasE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#equivalencia_f").append('<option value="'+data[i].id_equivalencia+'">'+data[i].nombre+'</option>');
                            }
                            $('#equivalencia_f').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#equivalencia" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_equivalenciasE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#equivalencia").append('<option value="'+data[i].id_equivalencia+'">'+data[i].nombre+'</option>');
                            }
                            $('#equivalencia').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#edificio" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_edificiosE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#edificio").append('<option value="'+data[i].id_edificio+'">'+data[i].nombre+'</option>');
                            }
                            $('#edificio').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

$( "#edificio_m" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_edificiosE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#edificio_m").append('<option value="'+data[i].id_edificio+'">'+data[i].nombre+'</option>');
                            }
                            $('#edificio_m').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

      $( "#generacion_f" ).ready(function() {   
                $.ajax({
                          url:"php/cargar_generacionesE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#generacion_f").append('<option value="'+data[i].id_generacion+'">'+data[i].nombre+'</option>');
                            }
               $('#generacion_f').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
                            });

 $( "#generacion" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_generacionesE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#generacion").append('<option value="'+data[i].id_generacion+'">'+data[i].nombre+'</option>');
                           }
                            $('#generacion').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

  $( "#generacion_m" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_generacionesE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#generacion_m").append('<option value="'+data[i].id_generacion+'">'+data[i].nombre+'</option>');
                            }
                            $('#generacion_m').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });


 $( "#grupo" ).ready(function() {
                $.ajax({
                          url:"php/cargar_gruposE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#grupo").append('<option value="'+data[i].id_grupo+'">'+data[i].nombre+'</option>');
                            }
                            $('#grupo').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#grupo_m" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_gruposE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#grupo_m").append('<option value="'+data[i].id_grupo+'">'+data[i].nombre+'</option>');
                            }
                            $('#grupo_m').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } }) });

 $( "#estatus" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_estatusE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#estatus").append('<option value="'+data[i].id_estatus_alumno+'">'+data[i].nombre+'</option>');
                            }
                            $('#estatus').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
                            });

  $( "#estatus_f" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_estatusE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#estatus_f").append('<option value="'+data[i].id_estatus_alumno+'">'+data[i].nombre+'</option>');
                            }
                            $('#estatus_f').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
                            });

  $( "#esc_origen" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_esc_origenE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#esc_origen").append('<option value="'+data[i].id_escuela_procedencia+'">'+data[i].nombre+'</option>');
                            }
                            $('#esc_origen').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
                            });

 $( "#estatus_m" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_estatusE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#estatus_m").append('<option value="'+data[i].id_estatus_alumno+'">'+data[i].nombre+'</option>');
                            }
                            $('#estatus_m').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
                            });

  $( "#esc_origen_m" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_esc_origenE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#esc_origen_m").append('<option value="'+data[i].id_escuela_procedencia+'">'+data[i].nombre+'</option>');
                            }
                            $('#esc_origen_m').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
                            });


 $( "#area_m" ).ready(function() {
                $.ajax({
                          url:"php/cargar_areasE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#area_m").append('<option value="'+data[i].id_area+'">'+data[i].area+'</option>');
                            }
                             $('#area_m').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
                            });

 $( "#area" ).ready(function() {  
                $.ajax({
                          url:"php/cargar_areasE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#area").append('<option value="'+data[i].id_area+'">'+data[i].area+'</option>');
                            }
                            $('#area').selectpicker('refresh');
                            }
                            else{
                              console.log("Error: "+data);
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
                            });

   function seleccionados(id_estado, id_municipio){
   $('#estado_m').empty();
   $('#estado_m').selectpicker('refresh');
   $('#municipio_m').empty();
   $('#municipio_m').selectpicker('refresh');

                $.ajax({
                          url:"php/cargar_estadosE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
              $("#estado_m").append('<option value="'+data[i].id_estado+'">'+data[i].estado+'</option>');
               }
              $('#estado_m').val(id_estado);
              $('#estado_m').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })

   $.ajax({
                          url:"php/cargar_municipiosE.php",
                          method:"POST",
                          data:{id_estado:id_estado},
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#municipio_m").append('<option value="'+data[i].id_municipio+'">'+data[i].municipio+'</option>');
                            }
               $('#municipio_m').val(id_municipio);
               $('#municipio_m').selectpicker('refresh');
                            }
               else{
               $('#municipio_m').val(id_municipio);
               $('#municipio_m').selectpicker('refresh');
               console.log($('#municipio_m').val()); 
               }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
 }


      $(document).on('change', '#estado_m',function(){
      $('#municipio_m').empty();
      $('#municipio_m').selectpicker('refresh');
    var id_estado= $("#estado_m option:selected").val();
                 $.ajax({
                          url:"php/cargar_municipiosE.php",
                          method:"POST",
                          data:{id_estado:id_estado},
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#municipio_m").append('<option value="'+data[i].id_municipio+'">'+data[i].municipio+'</option>');
                            }
               $('#municipio_m').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
   })
    });

   $( "#estado" ).ready(function() { 
                $.ajax({
                          url:"php/cargar_estadosE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#estado").append('<option value="'+data[i].id_estado+'">'+data[i].estado+'</option>');
                            }
               $('#estado').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
                            });

   $(document).on('change', '#estado',function(){
    var id_estado= $("#estado option:selected").val();
                 $.ajax({
                          url:"php/cargar_municipiosE.php",
                          method:"POST",
                          data:{id_estado:id_estado},
                          dataType: 'json',
                          success: function(data){
               $('#municipio').empty();
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#municipio").append('<option value="'+data[i].id_municipio+'">'+data[i].municipio+'</option>');
                            }
               $('#municipio').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
   })
    });

   $(document).on('change', '#carrera',function(){
   if($('#curso_d').length){
    $('#curso_d').selectpicker('refresh');
    var id_carrera= $("#carrera option:selected").val();
                 $.ajax({
                          url:"php/cargar_cursosE.php",
                          method:"POST",
                          data:{id_carrera:id_carrera},
                          dataType: 'json',
                          success: function(data){
               $('#curso_d').empty();
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {

               $("#curso_d").append('<option value="'+data[i].id_curso+'">'+data[i].nombre+'</option>');
                            }
               $('#curso_d').selectpicker('refresh');
                            }

                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
   })
                 }
    });

      $(document).on('change', '#carrera_f',function(){
   if($('#curso_f_d').length){
    $('#curso_f_d').selectpicker('refresh');
    var id_carrera= $("#carrera_f option:selected").val();
                 $.ajax({
                          url:"php/cargar_cursosE.php",
                          method:"POST",
                          data:{id_carrera:id_carrera},
                          dataType: 'json',
                          success: function(data){
               $('#curso_f_d').empty();
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {

               $("#curso_f_d").append('<option value="'+data[i].id_curso+'">'+data[i].nombre+'</option>');
                            }
               $('#curso_f_d').selectpicker('refresh');
                            }

                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
   })
                 }
    });


      $(document).on('change', '#carrera_m',function(){
   if($('#curso_m_d').length){
    $('#curso_m_d').selectpicker('refresh');
    var id_carrera= $("#carrera_m option:selected").val();
                 $.ajax({
                          url:"php/cargar_cursosE.php",
                          method:"POST",
                          data:{id_carrera:id_carrera},
                          dataType: 'json',
                          success: function(data){
               $('#curso_m_d').empty();
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {

               $("#curso_m_d").append('<option value="'+data[i].id_curso+'">'+data[i].nombre+'</option>');
                            }
               $('#curso_m_d').selectpicker('refresh');
                            }

                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
   })
                 }
    });


      $(document).on('change', '#plan',function(){
   if($('#ciclo_d').length){
    $('#ciclo_d').selectpicker('refresh');
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
                          for(var i=0; i < data.length; i++)
                           {

               $("#ciclo_d").append('<option value="'+data[i].id_ciclo+'">'+data[i].nombre+'</option>');
                            }
               $('#ciclo_d').selectpicker('refresh');
                            }

                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
   })
                 }

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
                          for(var i=0; i < data.length; i++)
                           {

               $("#academia_d").append('<option value="'+data[i].id_academia+'">'+data[i].nombre+'</option>');
                            }
               $('#academia_d').selectpicker('refresh');
                            }

                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
   })
                 }

    });




      $(document).on('change', '#plan_m',function(){
   if($('#ciclo_m_d').length){
    $('#ciclo_m_d').selectpicker('refresh');
    var id_plan= $("#plan_m option:selected").val();
                 $.ajax({
                          url:"php/cargar_ciclosE.php",
                          method:"POST",
                          data:{id_plan:id_plan},
                          dataType: 'json',
                          success: function(data){
               $('#ciclo_m_d').empty();
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {

               $("#ciclo_m_d").append('<option value="'+data[i].id_ciclo+'">'+data[i].nombre+'</option>');
                            }
               $('#ciclo_m_d').selectpicker('refresh');
                            }

                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
   })
                 }

  if($('#academia_m_d').length){
     $('#academia_m_d').selectpicker('refresh');
    var id_plan= $("#plan_m option:selected").val();
                 $.ajax({
                          url:"php/cargar_academiasE.php",
                          method:"POST",
                          data:{id_plan:id_plan},
                          dataType: 'json',
                          success: function(data){
               $('#academia_m_d').empty();
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {

               $("#academia_m_d").append('<option value="'+data[i].id_academia+'">'+data[i].nombre+'</option>');
                            }
               $('#academia_m_d').selectpicker('refresh');
                            }

                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
   })
                 }
    });

      $(document).on('change', '#plan_f',function(){
   if($('#ciclo_f_d').length){
    $('#ciclo_f_d').selectpicker('refresh');
    var id_plan= $("#plan_f option:selected").val();
                 $.ajax({
                          url:"php/cargar_ciclosE.php",
                          method:"POST",
                          data:{id_plan:id_plan},
                          dataType: 'json',
                          success: function(data){
               $('#ciclo_f_d').empty();
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {

               $("#ciclo_f_d").append('<option value="'+data[i].id_ciclo+'">'+data[i].nombre+'</option>');
                            }
               $('#ciclo_f_d').selectpicker('refresh');
                            }

                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
   })
                 }

  if($('#academia_f_d').length){
    var id_plan= $("#plan_f option:selected").val();
                 $.ajax({
                          url:"php/cargar_academiasE.php",
                          method:"POST",
                          data:{id_plan:id_plan},
                          dataType: 'json',
                          success: function(data){
               $('#academia_f_d').empty();
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {

               $("#academia_f_d").append('<option value="'+data[i].id_academia+'">'+data[i].nombre+'</option>');
                            }
               $('#academia_f_d').selectpicker('refresh');
                            }

                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
   })
                 }
    });
      $(document).on('change', '#academia_m_d',function(){
   if($('#generacion_m_d').length){
      $('#generacion_m_d').selectpicker('refresh');
    var id_academia= $("#academia_m_d option:selected").val();
                 $.ajax({
                          url:"php/cargar_generacionesE.php",
                          method:"POST",
                          data:{id_academia:id_academia},
                          dataType: 'json',
                          success: function(data){
               $('#generacion_m_d').empty();
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#generacion_m_d").append('<option value="'+data[i].id_generacion+'">'+data[i].nombre+'</option>');
                            }
               $('#generacion_m_d').selectpicker('refresh');
                            }

                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
   })
                 }
    });

      $(document).on('change', '#curso_m_d',function(){
   if($('#grupo_m_d').length){
    $('#grupo_m_d').selectpicker('refresh');
    var id_curso= $("#curso_m_d option:selected").val();
                 $.ajax({
                          url:"php/cargar_gruposE.php",
                          method:"POST",
                          data:{id_curso:id_curso},
                          dataType: 'json',
                          success: function(data){
               $('#grupo_m_d').empty();
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#grupo_m_d").append('<option value="'+data[i].id_grupo+'">'+data[i].nombre+'</option>');
                            }
               $('#grupo_m_d').selectpicker('refresh');
                            }

                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
   })
                 }
    });

   $(document).on('change', '#curso_d',function(){
   if($('#grupo_d').length){
     $('#grupo_d').selectpicker('refresh');
    var id_curso= $("#curso_d option:selected").val();
                 $.ajax({
                          url:"php/cargar_gruposE.php",
                          method:"POST",
                          data:{id_curso:id_curso},
                          dataType: 'json',
                          success: function(data){
               $('#grupo_d').empty();
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {

               $("#grupo_d").append('<option value="'+data[i].id_grupo+'">'+data[i].nombre+'</option>');
                            }
               $('#grupo_d').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
   })
                 }
    });

      $(document).on('change', '#curso_f_d',function(){
   if($('#grupo_f_d').length){
    $('#grupo_f_d').selectpicker('refresh');
    var id_curso= $("#curso_f_d option:selected").val();
                 $.ajax({
                          url:"php/cargar_gruposE.php",
                          method:"POST",
                          data:{id_curso:id_curso},
                          dataType: 'json',
                          success: function(data){
               $('#grupo_f_d').empty();
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {

               $("#grupo_f_d").append('<option value="'+data[i].id_grupo+'">'+data[i].nombre+'</option>');
                            }
               $('#grupo_f_d').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
   })
                 }
    });

   $(document).on('change', '#academia_d',function(){
   if($('#generacion_d').length){
     $('#generacion_d').selectpicker('refresh');
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
                          for(var i=0; i < data.length; i++)
                           {
               $("#generacion_d").append('<option value="'+data[i].id_generacion+'">'+data[i].nombre+'</option>');
                            }
               $('#generacion_d').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
   })
                 }
    });

      $(document).on('change', '#academia_f_d',function(){
   if($('#generacion_f_d').length){
    $('#generacion_f_d').selectpicker('refresh');
    var id_academia= $("#academia_f_d option:selected").val();
                 $.ajax({
                          url:"php/cargar_generacionesE.php",
                          method:"POST",
                          data:{id_academia:id_academia},
                          dataType: 'json',
                          success: function(data){
               $('#generacion_f_d').empty();
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#generacion_f_d").append('<option value="'+data[i].id_generacion+'">'+data[i].nombre+'</option>');
                            }
               $('#generacion_f_d').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        }
   })
                 }
    });

   function seleccionadosCarrera(id_carrera, id_curso){
   $('#carrera_m').empty();
   $('#carrera_m').selectpicker('refresh');
   $('#curso_m_d').empty();
   $('#curso_m_d').selectpicker('refresh');

                $.ajax({
                          url:"php/cargar_carrerasE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
              $("#carrera_m").append('<option value="'+data[i].id_carrera+'">'+data[i].nombre+'</option>');
               }
              $('#carrera_m').val(id_carrera);
              $('#carrera_m').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })

   $.ajax({
                          url:"php/cargar_cursosE.php",
                          method:"POST",
                          data:{id_carrera:id_carrera},
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#curso_m_d").append('<option value="'+data[i].id_curso+'">'+data[i].nombre+'</option>');
                            }
               $('#curso_m_d').val(id_curso);
               $('#curso_m_d').selectpicker('refresh');
                            }
               else{
               $('#curso_m_d').val(id_curso);
               $('#curso_m_d').selectpicker('refresh');
               console.log($('#curso_m_d').val()); 
               }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
 }

    function seleccionadosCiclo(id_plan, id_ciclo){
   $('#plan_m').empty();
   $('#plan_m').selectpicker('refresh');
   $('#ciclo_m_d').empty();
   $('#ciclo_m_d').selectpicker('refresh');
                $.ajax({
                          url:"php/cargar_planesE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
              $("#plan_m").append('<option value="'+data[i].id_plan+'">'+data[i].nombre+'</option>');
               }
              $('#plan_m').val(id_plan);
              $('#plan_m').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })

   $.ajax({
                          url:"php/cargar_ciclosE.php",
                          method:"POST",
                          data:{id_plan:id_plan},
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#ciclo_m_d").append('<option value="'+data[i].id_ciclo+'">'+data[i].nombre+'</option>');
                            }
               $('#ciclo_m_d').val(id_ciclo);
               $('#ciclo_m_d').selectpicker('refresh');
                            }
               else{
               $('#ciclo_m_d').val(id_ciclo);
               $('#ciclo_m_d').selectpicker('refresh');
               console.log($('#ciclo_m_d').val()); 
               }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
 }

   function seleccionadosGrupo(id_carrera, id_curso, id_grupo){
   $('#carrera_m').empty();
   $('#carrera_m').selectpicker('refresh');
   $('#curso_m_d').empty();
   $('#curso_m_d').selectpicker('refresh');
   $('#grupo_m_d').empty();
   $('#grupo_m_d').selectpicker('refresh');

   $.ajax({
                          url:"php/cargar_carrerasE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
              $("#carrera_m").append('<option value="'+data[i].id_carrera+'">'+data[i].nombre+'</option>');
               }
              $('#carrera_m').val(id_carrera);
              $('#carrera_m').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })

   $.ajax({
                          url:"php/cargar_cursosE.php",
                          method:"POST",
                          data:{id_carrera:id_carrera},
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#curso_m_d").append('<option value="'+data[i].id_curso+'">'+data[i].nombre+'</option>');
                            }
               $('#curso_m_d').val(id_curso);
               $('#curso_m_d').selectpicker('refresh');
                            }
               else{
               $('#curso_m_d').val(id_curso);
               $('#curso_m_d').selectpicker('refresh');
               console.log($('#curso_m_d').val()); 
               }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })

      $.ajax({
                          url:"php/cargar_gruposE.php",
                          method:"POST",
                          data:{id_curso:id_curso},
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#grupo_m_d").append('<option value="'+data[i].id_grupo+'">'+data[i].nombre+'</option>');
                            }
               $('#grupo_m_d').val(id_grupo);
               $('#grupo_m_d').selectpicker('refresh');
                            }
               else{
               $('#grupo_m_d').val(id_grupo);
               $('#grupo_m_d').selectpicker('refresh');
               console.log($('#grupo_m_d').val()); 
               }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
 }

     function seleccionadosGeneracion(id_plan, id_academia, id_generacion){
   $('#plan_m').empty();
   $('#plan_m').selectpicker('refresh');
   $('#academia_m_d').empty();
   $('#academia_m_d').selectpicker('refresh');
   $('#generacion_m_d').empty();
   $('#generacion_m_d').selectpicker('refresh');
                $.ajax({
                          url:"php/cargar_planesE.php",
                          method:"POST",
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
              $("#plan_m").append('<option value="'+data[i].id_plan+'">'+data[i].nombre+'</option>');
               }
              $('#plan_m').val(id_plan);
              $('#plan_m').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })

   $.ajax({
                          url:"php/cargar_academiasE.php",
                          method:"POST",
                          data:{id_plan:id_plan},
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#academia_m_d").append('<option value="'+data[i].id_academia+'">'+data[i].nombre+'</option>');
                            }
               $('#academia_m_d').val(id_academia);
               $('#academia_m_d').selectpicker('refresh');
                            }
               else{
               $('#academia_m_d').val(id_academia);
               $('#academia_m_d').selectpicker('refresh');
               console.log($('#academia_m_d').val()); 
               }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })

      $.ajax({
                          url:"php/cargar_generacionesE.php",
                          method:"POST",
                          data:{id_academia:id_academia},
                          dataType: 'json',
                          success: function(data){
                          var array=Array.isArray(data);
                          if(array==true){
                          for(var i=0; i < data.length; i++)
                           {
               $("#generacion_m_d").append('<option value="'+data[i].id_generacion+'">'+data[i].nombre+'</option>');
                            }
               $('#generacion_m_d').val(id_generacion);
               $('#generacion_m_d').selectpicker('refresh');
                            }
               else{
               $('#generacion_m_d').val(id_generacion);
               $('#generacion_m_d').selectpicker('refresh');
               console.log($('#generacion_m_d').val()); 
               }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
 }

 function cargarMaterias(id_grupo, id_curso){
   $("#materias_grupo").empty();
   var titulo="";
   var contenido="";
   titulo="<div class='input-group col-sm-12'><div class='form-group col-sm-5'><b>Materias</b></div>";
   titulo=titulo+"<div class='form-group col-sm-5'><b>* Docente</b></div>";
   titulo=titulo+"<div class='form-group col-sm-2'><b>Estatus</b></div></div>";
  $("#materias_grupo").append(titulo);       
   $.ajax({
                url:"php/cargar_materias_grupos.php",
                method:"POST",
                data: {id_grupo: id_grupo, id_curso:id_curso},
                dataType: 'json',
                success: function(data){
                var array=Array.isArray(data);
                if(array==true){
                for(var i=0; i < data.length; i++)
                {
  contenido="<div class='input-group col-sm-12'><div class='form-group col-sm-5'>"+data[i].materia+"</div>";
  contenido=contenido+"<div class='form-group col-sm-5'>"+data[i].docente+"</div>";
  contenido=contenido+"<div class='form-group col-sm-2'>"+data[i].estatus+"</div></div>";
  $("#materias_grupo").append(contenido);             
               }
   $('.selectpicker').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
 }

  function cargarMateriasComp(id_grupo, id_curso){
   $("#materias_grupo").empty();
   var titulo="";
   var contenido="";
   titulo="<div class='input-group col-sm-12'><div class='form-group col-sm-5'><b>Materias</b></div>";
   titulo=titulo+"<div class='form-group col-sm-5'><b>* Docente</b></div>";
   titulo=titulo+"<div class='form-group col-sm-2'><b>Estatus</b></div></div>";
  $("#materias_grupo").append(titulo);       
   $.ajax({
                url:"php/cargar_materias_grupos.php",
                method:"POST",
                data: {id_grupo: id_grupo, id_curso:id_curso},
                dataType: 'json',
                success: function(data){
                var array=Array.isArray(data);
                if(array==true){
                for(var i=0; i < data.length; i++)
                {
  contenido="<div class='input-group col-sm-12'><div class='form-group col-sm-5'>"+data[i].materia+"</div>";
  contenido=contenido+"<div class='form-group col-sm-5'>"+data[i].docente+"</div>";
  contenido=contenido+"<div class='form-group col-sm-2'>"+data[i].estatus+"</div></div>";
  $("#materias_grupo").append(contenido);             
               }
   $('.selectpicker').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
      setTimeout('alerta_correcto("Correcto","Datos actualizados correctamente");', timer); 
  recargarComp("Listado de grupos");
 }

  function cargarAlumnosAvComp(id_grupo){
   $("#alumnos_avanzar").empty();
   var titulo="";
   var contenido="";
   titulo="<div class='input-group col-sm-12'><div class='form-group col-sm-1'><b>#</b></div><div class='form-group col-sm-2'><b>Matrícula</b></div>";
   titulo=titulo+"<div class='form-group col-sm-5'><b>Alumno</b></div>";
   titulo=titulo+"<div class='form-group col-sm-2'><b>Estatus</b></div>";
   titulo=titulo+"<div class='form-group col-sm-2'><b>Incluir</b></div></div>";
  $("#alumnos_avanzar").append(titulo);       
   
   titulo="<div class='input-group col-sm-12'><div class='form-group col-sm-8'><input id='todos_text' value='QUITAR SELECCIÓN A TODOS LOS ALUMNOS (SELECCIÓN MANUAL)' type='text' class='form-control' readonly></div>";
   titulo=titulo+"<div class='form-group col-sm-2' id='estatus_check'><span class='btn btn-primary btn-xs'>AUTOMÁTICO</span></div><div class='form-group col-sm-2'><input type='checkbox' checked class='check' id='todos'><label class='check' for='todos'></label></div></div>";
   $("#alumnos_avanzar").append(titulo);
  
  $.ajax({
                url:"php/cargar_alumnos_grupos.php",
                method:"POST",
                data: {id_grupo: id_grupo},
                dataType: 'json',
                success: function(data){
                var array=Array.isArray(data);
                if(array==true){
                for(var i=0; i < data.length; i++)
                {
  contenido="<div class='input-group col-sm-12'><div class='form-group col-sm-1'><input type='text' class='form-control' value='"+(i+1)+"' readonly></div><div class='form-group col-sm-2'>"+data[i].matricula+"</div>";
  contenido=contenido+"<div class='form-group col-sm-5'>"+data[i].nombre+"</div>";
  contenido=contenido+"<div class='form-group col-sm-2'>"+data[i].estatus+"</div>";
  contenido=contenido+"<div class='form-group col-sm-2'>"+data[i].incluir+"</div></div>";
  $("#alumnos_avanzar").append(contenido);             
               }
   $('.selectpicker').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
   setTimeout('alerta_correcto("Correcto","Datos actualizados correctamente");', timer); 
   recargarComp("Listado de Grupos");
 }

   function cargarAlumnosAv(id_grupo){
   $("#alumnos_avanzar").empty();
   var titulo="";
   var contenido="";

   titulo="<div class='input-group col-sm-12'><div class='form-group col-sm-1'><b>#</b></div><div class='form-group col-sm-2'><b>Matrícula</b></div>";
   titulo=titulo+"<div class='form-group col-sm-5'><b>Alumno</b></div>";
   titulo=titulo+"<div class='form-group col-sm-2'><b>Estatus</b></div>";
   titulo=titulo+"<div class='form-group col-sm-2'><b>Incluir</b></div></div>";
 $("#alumnos_avanzar").append(titulo);
   
    titulo="<div class='input-group col-sm-12'><div class='form-group col-sm-8'><input id='todos_text' value='QUITAR SELECCIÓN A TODOS LOS ALUMNOS (SELECCIÓN MANUAL)' type='text' class='form-control' readonly></div>";
 titulo=titulo+"<div class='form-group col-sm-2' id='estatus_check'><span class='btn btn-primary btn-xs'>AUTOMÁTICO</span></div><div class='form-group col-sm-2'><input type='checkbox' checked class='check' id='todos'><label class='check' for='todos'></label></div></div>";
 $("#alumnos_avanzar").append(titulo);
   $.ajax({
                url:"php/cargar_alumnos_grupos.php",
                method:"POST",
                data: {id_grupo: id_grupo},
                dataType: 'json',
                success: function(data){
                var array=Array.isArray(data);
                if(array==true){
                for(var i=0; i < data.length; i++)
                {
  contenido="<div class='input-group col-sm-12'><div class='form-group col-sm-1'><input type='text' class='form-control' value='"+(i+1)+"' readonly></div><div class='form-group col-sm-2'>"+data[i].matricula+"</div>";
  contenido=contenido+"<div class='form-group col-sm-5'>"+data[i].nombre+"</div>";
  contenido=contenido+"<div class='form-group col-sm-2'>"+data[i].estatus+"</div>";
  contenido=contenido+"<div class='form-group col-sm-2'>"+data[i].incluir+"</div></div>";
  $("#alumnos_avanzar").append(contenido);             
               }
   $('.selectpicker').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
 }

   function cargarAlumnosFn(id_grupo){
   $("#alumnos_finalizar").empty();
   var titulo="";
   var contenido="";

   titulo="<div class='input-group col-sm-12'><div class='form-group col-sm-1'><b>#</b></div><div class='form-group col-sm-2'><b>Matrícula</b></div>";
   titulo=titulo+"<div class='form-group col-sm-5'><b>Alumno</b></div>";
   titulo=titulo+"<div class='form-group col-sm-2'><b>Estatus</b></div>";
   titulo=titulo+"<div class='form-group col-sm-2'><b>Incluir</b></div></div>";
 $("#alumnos_finalizar").append(titulo);
   
    titulo="<div class='input-group col-sm-12'><div class='form-group col-sm-8'><input id='todos_text_f' value='QUITAR SELECCIÓN A TODOS LOS ALUMNOS (SELECCIÓN MANUAL)' type='text' class='form-control' readonly></div>";
 titulo=titulo+"<div class='form-group col-sm-2' id='estatus_check_f'><span class='btn btn-primary btn-xs'>AUTOMÁTICO</span></div><div class='form-group col-sm-2'><input type='checkbox' checked class='check' id='todos_f'><label class='check' for='todos_f'></label></div></div>";
 $("#alumnos_finalizar").append(titulo);
   $.ajax({
                url:"php/cargar_alumnos_finalizarE.php",
                method:"POST",
                data: {id_grupo: id_grupo},
                dataType: 'json',
                success: function(data){
                var array=Array.isArray(data);
                if(array==true){
                for(var i=0; i < data.length; i++)
                {
  contenido="<div class='input-group col-sm-12'><div class='form-group col-sm-1'><input type='text' class='form-control' value='"+(i+1)+"' readonly></div><div class='form-group col-sm-2'>"+data[i].matricula+"</div>";
  contenido=contenido+"<div class='form-group col-sm-5'>"+data[i].nombre+"</div>";
  contenido=contenido+"<div class='form-group col-sm-2'>"+data[i].estatus+"</div>";
  contenido=contenido+"<div class='form-group col-sm-2'>"+data[i].incluir+"</div></div>";
  $("#alumnos_finalizar").append(contenido);             
               }
   $('.selectpicker').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
 }

    function cargarAlumnosFnComp(id_grupo){
   $("#alumnos_finalizar").empty();
   var titulo="";
   var contenido="";

   titulo="<div class='input-group col-sm-12'><div class='form-group col-sm-1'><b>#</b></div><div class='form-group col-sm-2'><b>Matrícula</b></div>";
   titulo=titulo+"<div class='form-group col-sm-5'><b>Alumno</b></div>";
   titulo=titulo+"<div class='form-group col-sm-2'><b>Estatus</b></div>";
   titulo=titulo+"<div class='form-group col-sm-2'><b>Incluir</b></div></div>";
 $("#alumnos_finalizar").append(titulo);
   
    titulo="<div class='input-group col-sm-12'><div class='form-group col-sm-8'><input id='todos_text_f' value='QUITAR SELECCIÓN A TODOS LOS ALUMNOS (SELECCIÓN MANUAL)' type='text' class='form-control' readonly></div>";
 titulo=titulo+"<div class='form-group col-sm-2' id='estatus_check_f'><span class='btn btn-primary btn-xs'>AUTOMÁTICO</span></div><div class='form-group col-sm-2'><input type='checkbox' checked class='check' id='todos_f'><label class='check' for='todos_f'></label></div></div>";
 $("#alumnos_finalizar").append(titulo);
   $.ajax({
                url:"php/cargar_alumnos_finalizarE.php",
                method:"POST",
                data: {id_grupo: id_grupo},
                dataType: 'json',
                success: function(data){
                var array=Array.isArray(data);
                if(array==true){
                for(var i=0; i < data.length; i++)
                {
  contenido="<div class='input-group col-sm-12'><div class='form-group col-sm-1'><input type='text' class='form-control' value='"+(i+1)+"' readonly></div><div class='form-group col-sm-2'>"+data[i].matricula+"</div>";
  contenido=contenido+"<div class='form-group col-sm-5'>"+data[i].nombre+"</div>";
  contenido=contenido+"<div class='form-group col-sm-2'>"+data[i].estatus+"</div>";
  contenido=contenido+"<div class='form-group col-sm-2'>"+data[i].incluir+"</div></div>";
  $("#alumnos_finalizar").append(contenido);             
               }
     $('.selectpicker').selectpicker('refresh');
                            }
                            },
                             error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: "+jqXHR.status+" - "+textStatus+" "+errorThrown);   
        } })
      setTimeout('alerta_correcto("Correcto","Datos registrados correctamente");', timer);    
   recargarComp("Listado de Grupos");
 }


$(document).on('click', '#todos',function(){
 $("input:checkbox").prop("checked", $(this).prop("checked"));
 $("#estatus_check").html("<span class='btn btn-secondary btn-xs'>MANUAL</span>");
 if($(this).prop("checked")){
  $('#todos_text').val("QUITAR SELECCIÓN A TODOS LOS ALUMNOS");
  }
  else{  
  $('#todos_text').val("SELECCIONAR A TODOS LOS ALUMNOS");
  }
 });

$(document).on('click', '#todos_f',function(){
 $("input:checkbox").prop("checked", $(this).prop("checked"));
 $("#estatus_check_f").html("<span class='btn btn-secondary btn-xs'>MANUAL</span>");
 if($(this).prop("checked")){
  $('#todos_text_f').val("QUITAR SELECCIÓN A TODOS LOS ALUMNOS");
  }
  else{  
  $('#todos_text_f').val("SELECCIONAR A TODOS LOS ALUMNOS");
  }
 });

 // ----- Secciones de historial disciplinario y faltas -----//
 //Funciones seccion Faltas a la disciplina
$(document).on('click', '#modificar_falta',function(){
  $('#id_falta').val($(this).attr('id_faltas'));
    $('#mod-falta').val($(this).attr('faltas'));
    $('#mod-sancion').val($(this).attr('sancion'));
    $('#mod-primer').val($(this).attr('primer'));
    $('#mod-segunda').val($(this).attr('segunda'));
    $('#mod-tercer').val($(this).attr('tercer'));
    $('#mod-nivel').val($(this).attr('nivel'));
    $('#estatus_a_m').val($(this).attr('estatus'));
    $('#estatus_a_m').selectpicker('refresh');
    $('#mod-nivel').selectpicker('refresh');  
 });
//Funciones seccion Faltas a la disciplina

//Funciones seccion historial disciplinario
$(document).on('click', '#historial_discip',function(){

  $('#id_alumno').val($(this).attr('id_alumno'));
    var id_alumno = $("#id_alumno").val();
    $('#nombre').val($(this).attr('nombre'));
    $('#matricula').val($(this).attr('matricula'));
    $('#curp').val($(this).attr('curp'));
    llenar_tabla_faltas_alumno(id_alumno);
 });

$(document).on('click', '#add_alumno_fdisc',function(){
   alerta_cargando("Cargando","Por favor espere a que se ejecuten los registros");
    var id_falta = $("#load_falta").val();
    var id_alumno = $("#id_alumno").val();
    var observaciones = $("#observaciones").val();
    var fecha = $("#fecha").val();
    $.ajax({
      type:'POST',
      url:'php/add_falta_alumno.php',
      data:{id_falta:id_falta,
          id_alumno:id_alumno,
          fecha:fecha,
          observaciones:observaciones},
      success:function(data){
        if (data==1) {
   setTimeout('alerta_correcto("Correcto","Falta asignada correctamente");', timer);   
      llenar_tabla_faltas_alumno(id_alumno);
          }else {
            alerta_error("Error",
              "A ocurrido un error al tratar de registrar");
            console.log("Error: "+data);
            llenar_tabla_faltas_alumno(id_alumno);
        }
      }
    })
 });

$(document).on('click','#eliminar_falta_historia',function(){
  alerta_cargando("Cargando","Por favor espere a que se ejecuten los registros");
    var id_hist_disc = $(this).attr('id_hist_disc');
    var id_alumno = $("#id_alumno").val();
    $.ajax({
        url:"php/del_faltas_alumno.php",
        method:"POST",
        data:{id_hist_disc: id_hist_disc},
        success: function(data){
          if (data==1) {
   setTimeout('alerta_correcto("Correcto","Falta eliminada correctamente");', timer);   
       
      llenar_tabla_faltas_alumno(id_alumno);
          }else {
            alerta_error("Error",
              "A ocurrido un error al tratar de registrar");
            console.log("Error: "+data);
            llenar_tabla_faltas_alumno(id_alumno);
        }
        }
    });
});

function llenar_tabla_faltas_alumno(id_alumno){
  $.ajax({
      url:"php/cargar_tabla_faltas_alumno.php",
      type:"POST",
      data:{id_alumno:id_alumno},
      success: function(data){
        $('#tbody_alumno_falta').html(data);
      }

    })
}

$('#historial_discip').ready(function(){
  $.ajax({
      type: 'POST',
      url:'php/cargar_faltas.php'
    }).done(function(lista){
      $('#load_falta').html(lista)
    }).fail(function(){
      console.log('Hubo un error al cargar las faltas');
  })
})
//Funciones seccion Historial disciplinario

//Funciones seccion historial permisos
$(document).on('click', '#historial_permisos',function(){
  $('#fecha_inicio').val(moment().format('YYYY-MM-DD')+"T00:00");
  $('#fecha_fin').val(moment().format('YYYY-MM-DD')+"T23:59");
  $('#id_datos').val($(this).attr('id_datos'));
  $('#tipo_datos').val($(this).attr('tipo_datos'));
  var id_datos = $("#id_datos").val();
  var tipo_datos = $("#tipo_datos").val();
  $('#nombre').val($(this).attr('nombre'));
  $('#curp').val($(this).attr('curp'));
  llenar_tabla_permisos(id_datos,tipo_datos);
 });

function llenar_tabla_permisos(id_datos,tipo){
  $.ajax({
      url:"php/cargar_tabla_permisos.php",
      type:"POST",
      data:{id_datos:id_datos,tipo:tipo},
      success: function(data){
        $('#tbody_permisos').html(data);
      }
    })
}

function llenar_tabla_servicio_social(id_alumno){
  $.ajax({
      url:"php/cargar_tabla_ssocial.php",
      type:"POST",
      data:{id_alumno:id_alumno},
      success: function(data){
        $('#tab_ssocial').html(data);
      }

    })
}

$(document).on('click', '#add_permiso',function(){
    alerta_cargando("Cargando","Por favor espere a que se ejecuten los registros");
    var id_datos = $("#id_datos").val();
    var tipo = $("#tipo_datos").val();
    var fecha_inicio = $("#fecha_inicio").val();
    var fecha_fin = $("#fecha_fin").val();
    var causas = $("#causas").val();
    var especificacion = $("#especificacion").val();
    $.ajax({
      type:'POST',
      url:'php/add_permisoE.php',
      data:{id_datos:id_datos,
          tipo:tipo,
          fecha_inicio:fecha_inicio,
          fecha_fin:fecha_fin,
          causas:causas,
          especificacion:especificacion},
      success:function(data){
        if (data==1) {
            alerta_correcto("Correcto",
              "Consulta asignada correctamente");
      llenar_tabla_permisos(id_datos,tipo);
          }else {
            alerta_error("Error",
              "A ocurrido un error al tratar de registrar");
            console.log("Error: "+data);
            llenar_tabla_permisos(id_datos,tipo);
        }
      }
    })
 });

$(document).on('click','#eliminar_permiso',function(){
  alerta_cargando("Cargando","Por favor espere a que se ejecuten los registros");
    var id_permiso = $(this).attr('id_permiso');
    var id_datos = $("#id_datos").val();
    var tipo = $("#tipo_datos").val();
    $.ajax({
        url:"php/del_permisoE.php",
        method:"POST",
        data:{id_permiso: id_permiso},
        success: function(data){
          if (data==1) {
    setTimeout('alerta_correcto("Correcto","Permiso eliminado correctamente");', timer);   
  
            llenar_tabla_permisos(id_datos,tipo);
          }else {
            alerta_error("Error",
              "A ocurrido un error al tratar de registrar");
            console.log("Error: "+data);
            llenar_tabla_permisos(id_datos,tipo);
        }
        }
    });
});

$(document).on('click', '#historial_faltas_permisos',function(){
  $('#id_alumno_falta_perm').val($(this).attr('id_alumno'));
  var id_alumno = escape($("#id_alumno_falta_perm").val());
  $('#nombre_falta_perm').val($(this).attr('nombre'));
  $('#matricula_falta_perm').val($(this).attr('matricula'));
  $('#curp_falta_perm').val($(this).attr('curp'));
  $.ajax({
      url:"php/cargar_tabla_faltas_permisos.php",
      type:"POST",
      data:{id_alumno:id_alumno},
      success: function(data){
        $('#tbody_permiso_falta').html(data);
      }
 });
});

$(document).on('click', '#ssocial',function(){
  $('#id_alumno').val($(this).attr('id_alumno'));
  var id_alumno = escape($("#id_alumno").val());
  $('#nombre').val($(this).attr('nombre'));
  $('#matricula').val($(this).attr('matricula'));
  $('#curp').val($(this).attr('curp'));
  $.ajax({
      url:"php/cargar_tabla_ssocial.php",
      type:"POST",
      data:{id_alumno:id_alumno},
      success: function(data){
        $('#tab_ssocial').html(data);
      }
 });
});

$(document).on('click','#eliminar_servicio_social',function(){
  alerta_cargando("Cargando","Por favor espere a que se ejecuten los registros");
    var id_servicio_social = $(this).attr('id_ssocial');
    var id_alumno = $("#id_alumno").val();
    $.ajax({
        url:"php/del_ssocialE.php",
        method:"POST",
        data:{id_servicio_social: id_servicio_social},
        success: function(data){
          if (data==1) {
    setTimeout('alerta_correcto("Correcto","Servicio social eliminado correctamente");', timer);   
            llenar_tabla_servicio_social(id_alumno);
          }else {
            alerta_error("Error",
              "A ocurrido un error al tratar de registrar");
            console.log("Error: "+data);
            llenar_tabla_servicio_social(id_alumno);
        }
        }
    });
});

$(document).on('click', '#add_servicio_social',function(){
    alerta_cargando("Cargando","Por favor espere a que se ejecuten los registros");
    var id_alumno = $("#id_alumno").val();
    var fecha_inicio = $("#fecha_inicio").val();
    var fecha_fin = $("#fecha_fin").val();
    var detalles = $("#detalles").val();
    var duracion = $("#duracion").val();
    $.ajax({
      type:'POST',
      url:'php/add_ssocialE.php',
      data:{id_alumno:id_alumno,
          fecha_inicio:fecha_inicio,
          fecha_fin:fecha_fin,
          detalles:detalles,
          duracion:duracion},
      success:function(data){
        if (data==1) {
 setTimeout('alerta_correcto("Correcto","Servicio social asignado correctamente");', timer);   
      llenar_tabla_servicio_social(id_alumno);
          }else {
            alerta_error("Error",
              "A ocurrido un error al tratar de registrar");
            console.log("Error: "+data);
            llenar_tabla_servicio_social(id_alumno);
        }
      }
    })
 });
