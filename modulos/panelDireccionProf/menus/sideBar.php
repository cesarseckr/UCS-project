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
            <a class="nav-link" href="articulos.php">
              <i class="menu-icon mdi mdi-message-draw"></i>
              <span class="menu-title">Artículos</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#categorias" aria-expanded="false" aria-controls="tickets">
              <i class="menu-icon fa fa-th-list"></i>
              <span class="menu-title">Categorías</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="categorias">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="nueva_categoria.php"><i class="fas fa-plus-circle"></i>&nbsp; Nueva Categoría</a>
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
            <a class="nav-link" data-toggle="collapse" href="#tickets" aria-expanded="false" aria-controls="tickets">
              <i class="menu-icon mdi mdi-ticket"></i>
              <span class="menu-title">Tickets</span> <span class="badge badge-danger ">5</span>
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
            <div class="col-12"><center><hr><img src="../../images/logo-ucs.png" width="230">
              <hr></div>
          </li>

        </ul>
      </nav>