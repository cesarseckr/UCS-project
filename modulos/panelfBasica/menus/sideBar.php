<nav class="sidebar sidebar-offcanvas noprint" id="sidebar">
        <ul class="nav">
           <li class="nav-item d-lg-none">
            <a class="nav-link" data-toggle="collapse" href="#cuenta" aria-expanded="false" aria-controls="cuenta">
              <i class="menu-icon fa fa-user"></i>
              <span class="menu-title">Mi cuenta (<? echo $usuario; ?>)</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="cuenta">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item">
                 <a class="nav-link" href="perfil.php"> 
                  <i class="fa fa-user-circle"></i>&nbsp; Mi perfil </a>
                </li>
                <li class="nav-item">
                 <a class="nav-link" href="documentacion.php"> 
                  <i class="fa fa-book"></i>&nbsp; Documentación </a>
                </li>
                 <li class="nav-item">
                 <a class="nav-link" href="salir.php"> 
                  <i class="fa fa-sign-out-alt"></i>&nbsp; Salir </a>
                </li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
            <img id="fps" class="img-md mx-auto rounded-circle" src="<? echo $dir_foto; ?>" alt="Perfil">
                
                <div class="text-wrapper">
                  <p class="profile-name"><br>
                    <? 
                      $rest = substr($nbre."<br>".$ap." ".$am, 0, 50);
                          $contar=strlen($rest);
                          if($contar>=50){
                          $rest= $rest."...";
                    }
                    echo $rest;
                     ?> 
                  </p>
                    <span class="status-indicator online"></span>
                    <small class="designation text-muted">
                      En línea
                    </small>
                </div>
              </div>
            </div>
          </li>
 <li class="nav-item"><div class="nav-link">
              <a href="index.php" class="btn btn-dark btn-block btn-rounded"><i class="fa fa-tachometer-alt"></i> Dashboard &nbsp;
              </a></div>
 </li>
 <li class="nav-item">
            <a class="nav-link" href="alumnos.php">
              <i class="menu-icon fa fa-user-graduate"></i>
              <span id="s1" class="menu-title">Alumnos</span> <span class="badge badge-primary "> <? echo number_format($totales_al); ?> </span>
            </a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="docentes.php">
              <i class="menu-icon fa fa-chalkboard-teacher"></i>
              <span id="s2" class="menu-title">Docentes</span> <span class="badge badge-primary "> <? echo number_format($totales_d); ?> </span>
            </a>
          </li>

              <li class="nav-item">
            <a class="nav-link" href="calendario.php">
              <i class="menu-icon fa fa-calendar-alt"></i>
              <span class="menu-title">Calendario</span></a>
          </li> 

           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#horarios" aria-expanded="false" aria-controls="horarios">
              <i class="menu-icon fa fa-city"></i>
              <span class="menu-title">Institución</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="horarios">
              <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="sedes.php">
              <i class="fa fa-archway"></i>
              <span class="menu-title">&nbsp; Sedes</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="edificios.php">
              <i class="fa fa-building"></i>
              <span class="menu-title">&nbsp; Edificios</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aulas.php">
              <i class="fa fa-door-open"></i>
              <span class="menu-title">&nbsp; Catalogo de Aulas</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dias.php">
              <i class="fa fa-calendar-plus"></i>
              <span class="menu-title">&nbsp; Catalogo de Días</span></a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="horas.php">
              <i class="fa fa-clock"></i>
              <span class="menu-title">&nbsp; Catalogo de Horas</span></a>
          </li> 
           <li class="nav-item">
            <a class="nav-link" href="horarios.php"> <i class="fa fa-user-clock"></i>&nbsp; Asignación de horarios</a>
          </li> 
              </ul>
            </div>
          </li>

            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#control" aria-expanded="false" aria-controls="control">
              <i class="menu-icon fa fa-user-friends"></i>
              <span class="menu-title">Control de personal</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="control">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
            <a class="nav-link" href="faltas.php">
              <i class="fa fa-list-ol"></i>
              <span class="menu-title">&nbsp; Catálogo de Faltas</span></a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="disciplinario.php">
              <i class="fa fa-user-times"></i>
              <span class="menu-title">&nbsp; Faltas</span></a>
          </li> 
           <li class="nav-item">
            <a class="nav-link" href="permisosa.php"> <i class="fa fa-user-check"></i>&nbsp; Permisos de Alumno</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="permisosd.php"> <i class="fa fa-user-check"></i>&nbsp; Permisos de Docente</a>
          </li> 
           <li class="nav-item">
            <a class="nav-link" href="ssocial.php"> <i class="fa fa-user-cog"></i>&nbsp; Servicio social</a>
          </li> 
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#cursos" aria-expanded="false" aria-controls="cursos">
              <i class="menu-icon fa fa-school"></i>
              <span class="menu-title">Escolar</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="cursos">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="planes.php"> <i class="fa fa-book"></i>&nbsp; Planes de estudio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="ciclos.php"> <i class="fa fa-calendar-week"></i>&nbsp; Ciclos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="academias.php"> <i class="fa fa-location-arrow"></i>&nbsp; Modalidades</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="generaciones.php"> <i class="fa fa-project-diagram"></i>&nbsp; Escalones/Generaciones</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="carreras.php"> <i class="fa fa-certificate"></i>&nbsp; Carreras</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="cursos.php"> <i class="fa fa-list-ol"></i>&nbsp; Módulos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="equivalencias.php"> <i class="fa fa-bezier-curve"></i>&nbsp; Equivalencias</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="materias.php"> <i class="fa fa-list"></i>&nbsp; Materias</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="grupos.php"> <i class="fa fa-users"></i>&nbsp; Grupos</a>
                </li>
              </ul>
            </div>
          </li>

           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#documentos" aria-expanded="false" aria-controls="documentos">
              <i class="menu-icon fa fa-envelope-open-text"></i>
              <span class="menu-title"> Reportes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="documentos">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="reporte_listado_asistencia.php"> <i class="fa fa-list-ol"></i>&nbsp; Listas de asistencias</a>
                </li>
               <li class="nav-item">
                  <a class="nav-link" href="reporte_calificaciones_grupo.php"> <i class="fa fa-check-double"></i>&nbsp; Calificaciones por grupo</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="reporte_calificaciones_alumno.php"><i class="fa fa-check-double"></i>&nbsp; Calificaciones por alumno</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="reporte_alumno.php"> <i class="far fa-id-card"></i>&nbsp; Kardex de alumno</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="reporte_alumno.php"> <i class="fa fa-id-card"></i>&nbsp; Kardex de docente</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="reporte_faltas.php"> <i class="fa fa-list-ol"></i>&nbsp; Faltas a la disciplina</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="reporte_permisos_alumno.php"> <i class="fa fa-list-ol"></i>&nbsp; Permisos de alumnos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="reporte_permisos_docente.php"> <i class="fa fa-list-ol"></i>&nbsp; Permisos de docentes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="reporte_servicio.php"> <i class="fa fa-list-ol"></i>&nbsp; Servicio Social</a>
                </li>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tickets" aria-expanded="false" aria-controls="tickets">
              <i class="menu-icon fa fa-ticket-alt"></i>
              <span class="menu-title">Tickets</span> 
              <span class="badge badge-danger" id="notificacion_ticket_side"></span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tickets">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="tickets_enviados.php"><i class="fas fa-sign-out-alt"></i>&nbsp; Enviados</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="tickets_recibidos.php"><i class="fas fa-sign-in-alt"></i>&nbsp; Recibidos</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="noticias.php">
              <i class="menu-icon far fa-newspaper"></i>
              <span class="menu-title">Noticias</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="archivos_up.php">
              <i class="menu-icon fa fa-file-alt"></i>
              <span class="menu-title">Archivos</span>
            </a>
          </li>
          
          <li class="nav-item">
            <div class="col-12"><center><hr><img src="../../images/logo-ucs.png" width="230">
              <hr></div>
          </li>
        </ul>
      </nav>