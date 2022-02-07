<?
session_start();
if(isset($_GET['filtro_alumnos'])){ 
$_SESSION['filtro']=$_GET['filtro_alumnos'];
$_SESSION['fmatricula']=$_GET['matricula'];
$_SESSION['fnombre']=$_GET['nombre'];
$_SESSION['fapaterno']=$_GET['apaterno'];
$_SESSION['famaterno']=$_GET['amaterno'];
$_SESSION['fgrupo']=$_GET['grupo'];
$_SESSION['fgeneracion']=$_GET['generacion'];
$_SESSION['festatus']=$_GET['estatus'];
}

if(isset($_GET['filtro_listas'])){ 
$_SESSION['filtro']=$_GET['filtro_listas'];
$_SESSION['fgrupo']=$_GET['fgrupo'];
$_SESSION['fdocente']=$_GET['fdocente'];
$_SESSION['fciclo']=$_GET['fciclo'];
}

if(isset($_GET['filtro_materias'])){ 
$_SESSION['filtro']=$_GET['filtro_materias'];
$_SESSION['fequivalencia']=$_GET['fequivalencia'];
$_SESSION['fcurso']=$_GET['fcurso'];
}

if(isset($_GET['filtro_grupos'])){ 
$_SESSION['filtro']=$_GET['filtro_grupos'];
$_SESSION['fnombre']=$_GET['fnombre'];
$_SESSION['fcurso']=$_GET['fcurso'];
$_SESSION['fciclo']=$_GET['fciclo'];
$_SESSION['fcarrera']=$_GET['fcarrera'];
}

if(isset($_GET['filtro_calificaciones'])){ 
$_SESSION['filtro']=$_GET['filtro_grupos'];
$_SESSION['fgrupo']=$_GET['fgrupo'];
}

if(isset($_GET['filtro_fechas'])){ 
$_SESSION['filtro']=$_GET['filtro_fechas'];
$_SESSION['ffecha_ini']=$_GET['ffecha_ini'];
$_SESSION['ffecha_fin']=$_GET['ffecha_fin'];
}

if(isset($_GET['filtro_alumnos_calificaciones'])){ 
$_SESSION['filtro']=$_GET['filtro_alumnos_calificaciones'];
$_SESSION['fgrupo']=$_GET['fgrupo'];
}

?>
<small><b>Filtros aplicados </b></small>