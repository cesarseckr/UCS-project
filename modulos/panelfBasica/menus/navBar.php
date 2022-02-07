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
<div class="noprint">
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.php">
          <img src="../../images/logo.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.php">
          <img src="../../images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <!-- DATOS DINAMICOS -->
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
              <li class="nav-item">
            <a href="alumnos.php" class="nav-link"><i class="fa fa-user-circle"></i>Alumnos
              <span class="badge badge-dark ml-1"><span id="n1"><? echo number_format($totales_al); ?></span></span>
            </a>
          </li>
          <li class="nav-item">
            <a href="docentes.php" class="nav-link">
              <i class="fa fa-users"></i>Docentes
              <span class="badge badge-dark ml-1"><span id="n2"><? echo number_format($totales_d); ?></span></span>
            </a>    
          </li>
          <li class="nav-item active">
            <a href="index.php" class="nav-link">
              &nbsp;&nbsp;<i class="fa fa-chart-pie"></i></a>
          </li>
                  </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="menu-icon fa fa-ticket-alt"></i>
              <span class="count" id="notificacion_ticket_nav"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <a href="tickets_recibidos.php">
                <div class="dropdown-item">
                  <p class="mb-0 font-weight-normal float-left" id="not_msj">
                  </p>
                  <span class="badge badge-info badge-pill float-right">Ver todos</span>
                </div>
              </a>
            </div>
          </li>
          
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">
       <? 
                      $rest = substr($nbre." ".$ap." ".$am, 0, 50);
                          $contar=strlen($rest);
                          if($contar>=50){
                          $rest= $rest."...";
                    }
                    echo $rest;
                     ?>
                
               </span>
      <img id="fpn" class="img-sm rounded-circle" src="<? echo $dir_foto; ?>" alt="Perfil">
            </a>

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              
              <a class="dropdown-item" href="#">
               <b><i class="fa fa-user-alt"></i> <? echo $usuario; ?> </b>
              </a>
              <a class="dropdown-item" href="perfil.php">
              <i class="fa fa-caret-right"></i> <i class="fa fa-user-circle"></i> Mi perfil
              </a>
              <a class="dropdown-item" href="documentacion.php">
              <i class="fa fa-caret-right"></i>   <i class="fa fa-book"></i> Documentación
              </a>
              <a class="dropdown-item" href="../includes/salir.php">
              <i class="fa fa-caret-right"></i>   <i class="fa fa-sign-out-alt"></i> Salir
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
  </div>