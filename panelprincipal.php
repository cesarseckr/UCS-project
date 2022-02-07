<?php 
	session_start();
	if($_SESSION['tipo']==1){ 
	    echo '<meta http-equiv="Refresh" content="0; url=modulos/panelAlumno">';
	}else if($_SESSION['tipo']==2){   
	    echo '<meta http-equiv="Refresh" content="0; url=modulos/panelDocente">'; 
	}else if($_SESSION['tipo']==3){   
	    switch ($_SESSION['id_area']) {
	        case 1:
	          echo '<meta http-equiv="Refresh" content="0; url=modulos/panelcEscolar">';
	          break;
	        case 2:
	          echo '<meta http-equiv="Refresh" content="0; url=modulos/panelfbasica">';
	          break;
	        case 3:
	          echo '<meta http-equiv="Refresh" content="0; url=modulos/panelaMedica">';
	          break;
	        case 4:
	          echo '<meta http-equiv="Refresh" content="0; url=modulos/panelEspecializacion">';
	          break;
	        case 5:
	          echo '<meta http-equiv="Refresh" content="0; url=modulos/panelcInterno">';
	          break;
	        case 6:
	          echo '<meta http-equiv="Refresh" content="0; url=modulos/panelComunicacion">';
	          break;
	        case 7:
	          echo '<meta http-equiv="Refresh" content="0; url=modulos/panelcDisciplina">';
	          break;
	        case 8:
	          echo '<meta http-equiv="Refresh" content="0; url=modulos/panelCompras">';
	          break;
	        case 9:
	          echo '<meta http-equiv="Refresh" content="0; url=modulos/panelSistemas">';
	          break;
	        case 10:
	          echo '<meta http-equiv="Refresh" content="0; url=modulos/panelDireccionProf">';
	          break;
	        case 99:
	          echo '<meta http-equiv="Refresh" content="0; url=modulos/panelAdmin99">';
	          break;
	    }
	
	}


 ?>