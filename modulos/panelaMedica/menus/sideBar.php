<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
           <li class="nav-item d-lg-none">
            <a class="nav-link" data-toggle="collapse" href="#cuenta" aria-expanded="false" aria-controls="cuenta">
              <i class="menu-icon mdi mdi-account"></i>
              <span class="menu-title">Mi cuenta (<? echo $usuario; ?>)</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="cuenta">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item">
                 <a class="nav-link" href="perfil.php"> 
                  <i class="mdi mdi-account-circle"></i>&nbsp; Mi perfil </a>
                </li>

                                <li class="nav-item">
                 <a class="nav-link" href="ayuda.php"> 
                  <i class="mdi mdi-help-circle"></i>&nbsp; Ayuda </a>
                </li>

                                <li class="nav-item">
                 <a class="nav-link" href="salir.php"> 
                  <i class="mdi mdi-logout"></i>&nbsp; Salir </a>
                </li>
                
              </ul>
            </div>
          </li>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item nav-profile">
              <div class="nav-link">
                <div class="user-wrapper">

                   <img class="img-md mx-auto rounded-circle" src="<? echo "../../archivos/".$url_img.""; ?>" alt="Perfil">
                  
                  <div class="text-wrapper">
                    <p class="profile-name"><br>
                      <? 
                        $rest = substr($nbre."<br>".$ap." ".$am, 0, 50);
                              echo $rest;
                            $contar=strlen($rest);
                            if($contar>=50){
                            echo "...";
                      } ?> 
                    </p>
                      <span class="status-indicator online"></span>
                      <small class="designation text-muted">
                        En línea
                      </small>
                    
                  </div>
                </div>
                <a href="index.php" class="btn btn-dark btn-block"><i class="fa fa-home"></i> Panel de inicio 
                </a>
              </div>
            </li>
            <div id="menu-sidebar">
              <li class="nav-item">
                 <a class="nav-link"href="consultas.php">
                  <i class="menu-icon fas fa-user-md"></i>
                  <span class="menu-title">Consultas</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#enfermeria" aria-expanded="false" aria-controls="tickets">
                  <i class="menu-icon fas fa-clinic-medical"></i>
                  <span class="menu-title">Enfermería</span> 
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="enfermeria">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="registro_paciente.php"><i class="menu-icon fas fa-notes-medical"></i>&nbsp; Registro de paciente</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="acciones_enfermeria.php"><i class="menu-icon fas fa-laptop-medical"></i>&nbsp; Acciones</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="farmacia.php"><i class="menu-icon fas fa-first-aid"></i>&nbsp; Farmacia</a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="nav-item">
                 <a class="nav-link"href="historia-clinica.php">
                  <i class="menu-icon fa fa-calendar"></i>
                  <span class="menu-title">Hitoria Clinica</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="inventario-medicamentos.php">
                  <i class="menu-icon fas fa-tablets"></i>
                  <span class="menu-title">Inventario medicamentos</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="inventario-materiales.php">
                  <i class="menu-icon fas fa-syringe"></i>
                  <span class="menu-title">Inventario materiales</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="traslados.php">
                  <i class="menu-icon fas fa-ambulance"></i>
                  <span class="menu-title">Traslados</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="control_ta.php">
                  <i class="menu-icon fas fa-heartbeat"></i>
                  <span class="menu-title">Control T/A</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#reportes" aria-expanded="false" aria-controls="tickets">
                  <i class="menu-icon fa fa-envelope-open-text"></i>
                  <span class="menu-title">Reportes</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="reportes">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="reportes_citas.php"><i class="menu-icon fa fa-file-pdf"></i>&nbsp; Citas Medicas</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="reporte_morbilidad.php"><i class="menu-icon fa fa-file-pdf"></i>&nbsp; Morb. por diagnóstico</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="reporte_morbilidad_si.php"><i class="menu-icon fa fa-file-pdf"></i>&nbsp; Morb. por sistema</a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#tickets" aria-expanded="false" aria-controls="tickets">
                  <i class="menu-icon mdi mdi-ticket"></i>
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
                  <i class="menu-icon mdi mdi-newspaper"></i>
                  <span class="menu-title">Noticias</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#archivos" aria-expanded="false" aria-controls="tickets">
                  <i class="menu-icon mdi mdi-file-outline"></i>
                  <span class="menu-title">Archivos</span> 
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="archivos">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="archivos_up.php"><i class="fas fa-file-upload"></i>&nbsp; Subir</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="archivos_down.php"><i class="fas fa-file-download"></i>&nbsp; Descargar</a>
                    </li>
                  </ul>
                </div>
              </li>

          <li class="nav-item">
            <div class="col-12"><center><hr><img src="../../images/logo-ucs.png" width="230">
              <hr></div>
          </li>

        </ul>
      </nav>