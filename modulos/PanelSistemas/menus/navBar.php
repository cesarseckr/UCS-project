<?
// TOTALES
$sql="SELECT count(id_alumno) as conta FROM alumnos";
                $sq = $db->query($sql);
        $rows= $sq->fetchAll(); 
          foreach ($rows as $row) {
          
            $totales_al=$row['conta'];
          }

$sql="SELECT count(id_docente) as conta FROM docentes";
                $sq = $db->query($sql);
        $rows= $sq->fetchAll(); 
          foreach ($rows as $row) {
          
            $totales_d=$row['conta'];
          }

          $sql="SELECT count(id_administrativo) as conta FROM administrativos";
                $sq = $db->query($sql);
        $rows= $sq->fetchAll(); 
          foreach ($rows as $row) {
          
            $totales_ad=$row['conta'];
          }
?>
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
          <img src="../../images/logo.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="../../images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item">
            <a href="#" class="nav-link"><i class="mdi mdi-account-box"></i>Alumnos
              <span class="badge badge-dark ml-1"><? echo number_format($totales_al); ?></span>
            </a>
          </li>

<?  ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="mdi mdi-account-multiple"></i>Docentes
              <span class="badge badge-dark ml-1"><? echo number_format($totales_d); ?></span>
            </a>    
          </li>
          <li class="nav-item active">
            <a href="#" class="nav-link">
              &nbsp;&nbsp;<i class="mdi mdi-elevation-rise"></i></a>
          </li>
          
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
              <span class="count">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item" href="#">
                <p class="mb-0 font-weight-normal float-left">Tienes 4  notificaciones
                <span class="badge badge-pill badge-info float-right">Ver todas</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item" href="#">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-check mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Calificaciones acentadas<br> Ernesto Reyes</h6>
                  <p class="font-weight-light small-text">
                    30/11/2018 4:30 PM
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>

            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-commenting"></i>
              <span class="count">9+</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">Tienes 12 tickets pendientes
                </p>
                <span class="badge badge-info badge-pill float-right">Ver todos</span>
              </div>
            
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="../../images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark"> Rodrigo Gutierrez
                    <span class="float-right font-weight-light small-text">29/11/2018 3:17 PM</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    Información importante
                  </p>
                </div>
              </a>
            </div>
          </li>
          
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">
                <? if($tipo==99)
              {
                 $rest = substr("Administrador General (Control Total)", 0, 40);
                            echo $rest;
                          $contar=strlen($rest);
                          if($contar>=40){
                          echo "...";
                } }
               else {
                      $rest = substr($nombre, 0, 40);
                            echo $rest;
                          $contar=strlen($rest);
                          if($contar>=40){
                          echo "...";
                          }
                } ?> 
               </span>
              <img class="img-sm rounded-circle" src="../../images/faces/face11.jpg" alt="Profile image">
            </a>

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              
              <a class="dropdown-item mt-2" href="#">
                    <i class="mdi mdi-settings"></i> Configuración
              </a>
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-lock"></i> Cambiar contraseña
              </a>
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-help-circle"></i> Ayuda
              </a>
              <a class="dropdown-item" href="../includes/salir.php">
                <i class="mdi mdi-logout"></i> Salir
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>