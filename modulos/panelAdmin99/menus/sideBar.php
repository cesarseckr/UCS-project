<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
           <li class="nav-item d-sm-none">
            <a class="nav-link" data-toggle="collapse" href="#cuenta" aria-expanded="false" aria-controls="cuenta">
              <i class="menu-icon mdi mdi-account"></i>
              <span class="menu-title">Mi cuenta (<? echo $usuario; ?>)</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="cuenta">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item">
                  <a class="nav-link" href="perfil.php"> 
                    <i class="mdi mdi-account-circle"></i>&nbsp; Mi perfil 
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="ayuda.php"> 
                    <i class="mdi mdi-help-circle"></i>&nbsp; Ayuda 
                  </a>
                </li>
                

                <li class="nav-item">
                  <a class="nav-link" href="salir.php"> 
                    <i class="mdi mdi-logout"></i>&nbsp; Salir 
                  </a>
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
            <li class="nav-item">
              <a class="nav-link" href="panel_docentes.php">
                <i class="menu-icon fa fa-vcard-o"></i>
                <span class="menu-title">Docentes</span> <span class="badge badge-dark "> <? echo number_format($totales_d); ?> </span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="panel_administrativos.php">
              <!--<a class="nav-link" href="#" data-toggle="modal" data-target="#ModNuevoAdm">-->
                <i class="menu-icon fa fa-vcard-o"></i>
                <span class="menu-title">Administrativos</span> <span class="badge badge-dark "> <? echo number_format($totales_ad); ?> </span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="calendario.php">
                <i class="menu-icon fa fa-calendar"></i>
                <span class="menu-title">Calendario</span></a>
            </li>
          </ul>
            
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#cursos" aria-expanded="false" aria-controls="cursos">
              <i class="menu-icon mdi mdi-library-books"></i>
              <span class="menu-title">Cursos</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="cursos">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="#"> <i class="mdi mdi-database"></i>&nbsp; Listado de cursos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> <i class="mdi mdi-database-plus"></i>&nbsp; Nuevo curso</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" href="#"> <i class="mdi mdi-view-headline"></i>&nbsp; Listado de materias</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> <i class="mdi mdi-playlist-plus"></i>&nbsp; Nueva materia</a>
                </li>
                
              </ul>
            </div>
          </li>

  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#calificaciones" aria-expanded="false" aria-controls="calificaciones">
              <i class="menu-icon mdi mdi-pencil-box-outline"></i>
              <span class="menu-title">Evaluaciones</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="calificaciones">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="#"> <i class="mdi mdi-pencil"></i>&nbsp; Asentar calificaciones</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> <i class="mdi mdi-account-minus"></i>&nbsp; Asistencias</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> <i class="mdi mdi-alarm"></i>&nbsp; Prorrogas</a>
                </li>
                
              </ul>
            </div>
          </li>

           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#documentos" aria-expanded="false" aria-controls="documentos">
              <i class="menu-icon mdi  mdi-file-document"></i>
              <span class="menu-title">Documentación</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="documentos">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="#"> <i class="mdi mdi-format-indent-increase"></i>&nbsp; Listas de asistencias</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> <i class="mdi mdi-account-box-outline"></i>&nbsp; Kardex de alumno</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> <i class="mdi mdi-account-box"></i>&nbsp; Kardex de profesor</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> <i class="mdi mdi-account-circle"></i>&nbsp; Certificados o diplomas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> <i class="mdi mdi-check-all"></i>&nbsp; Calificaciones</a>
                </li>

                
                
              </ul>
            </div>
          </li>

            <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Gráficos</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="menu-icon mdi mdi-ticket"></i>
              <span class="menu-title">Tickets</span> <span class="badge badge-danger ">5</span>
            </a>
          </li>


          <li class="nav-item">
            <div class="col-12"><center><hr><img src="../../images/logo-ucs.png" width="230">
              <hr></div>
          </li>

        </ul>
      </nav>