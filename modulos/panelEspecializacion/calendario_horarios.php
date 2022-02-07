<? session_start();?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <!-- HEADER -->
   <?php include ("../includes/header.php"); ?>
</head>
<body>
    <? include ("../includes/conexion.php"); ?>
  <? include ("restricciones.php"); ?>
  <!-- PANEL DE NAVEGACIÓN -->
  <div class="container-scroller">
    <? include('menus/navBar.php'); ?>
    <!-- BARRA LATERAL -->
    <div class="container-fluid page-body-wrapper">
      <? include('menus/sideBar.php'); ?>
      <div class="main-panel">
        <!-- CONTENIDO PRINCIPAL -->  
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title noprint">
                    <i class="fa fa-user-clock"></i> Calendario de horarios
                  <hr>
                  </h4>
                  
<?
if(isset($_POST['id_horario'])){ 
$id_horario=$_POST['id_horario'];
$id_generacion=$_POST['id_generacion'];
$id_grupo=$_POST['id_grupo'];
$id_aula=$_POST['id_aula'];
$_SESSION['id_horario']=$id_horario;

      $sql="SELECT * FROM generacion WHERE id_generacion='$id_generacion'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
      $generacion=$row['nombre'];
      }

      $sql="SELECT * FROM grupo WHERE id_grupo='$id_grupo'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
      $grupo=$row['nombre'];
      $id_ciclo=$row['id_ciclo'];
      $id_curso=$row['id_curso'];
      }

      $sql="SELECT * FROM curso WHERE id_curso='$id_curso'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
      $curso=$row['nombre'];
      }

      $sql="SELECT * FROM ciclo where id_ciclo='$id_ciclo'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $rowe) {
        $fecha="Del ".date("d-m-Y",strtotime($rowe["fecha_inicio"]))." al ".date("d-m-Y",strtotime($rowe["fecha_fin"]));
      }

      $sql="SELECT * FROM aulas WHERE id_aula='$id_aula'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
      $aula=$row['nombre'];
      $id_edificio=$row['id_edificio'];
      }

      $sql="SELECT * FROM edificios WHERE id_edificio='$id_edificio'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
      $edificio=$row['nombre'];
      }

?>
<script type="text/javascript">
  cargarMatDoc("<? echo $id_grupo; ?>");
</script>
		<form id="form-horarios" action="php/add_horarios_asignacionE.php" method="post" enctype="multipart/form-data">
		<div style="display:none">
        <input type="text" value="<? echo $id_horario; ?>" name="id_m" id="id_m">
        <input type="text" value="<? echo $id_grupo; ?>" name="id_grupo" id="id_grupo">
        <input type="text" value="<? echo $id_ciclo; ?>" name="id_ciclo" id="id_ciclo">
        </div>
        <div class="form-row">
        <div class="form-group col-md-12">
        <div class="row">
		    <div class="form-group col-sm-6 noprint">
        <label>Selecciona una materia y docente:</label>
        <select name='mat_doc' id='mat_doc' data-show-subtext="true" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona materia y docente" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una materia y docente</b>">
          <option data-subtext="Hora de comida" value="c">COMIDA</option>
        </select>
        </div>
        <div class="form-group col-sm-3 noprint">
        <label>Hora:</label>
        <select name='hora' id='hora' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona Hora del día" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione una hora</b>">
        </select>
        </div>
        <div class="form-group col-sm-3 noprint">
        <label>Día:</label>
        <select name='dia' id='dia' class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Selecciona Día" data-validation="required" data-validation-error-msg="<b style='color:red;'>Seleccione un día</b>">
        </select>
        </div>
        <div class="form-group col-sm-6 noprint">
        <label>* Aula externa (Otra):</label>
        <select name='aula' id='aula' tipo="2" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Ninguna aula adicional">
        </select>
        </div>
        <div class="form-group col-sm-12 noprint">
        <button class="btn btn-primary btn-sm">
        <i class="fa fa-play"></i>Asignar</button>
        <button type="reset" id="reset_grupos" class="btn btn-secondary btn-sm">
        <i class="fa fa-eraser"></i></button>
        <button type="button" id="imp_calendario" class="btn btn-dark btn-sm btn-rounded" onclick="javascript:window.print();">
        <i class="fa fa-print"></i> Imprimir</button>
        </form>
        </div>
        <script type="text/javascript">
        $(document).ready(function() {
          $('*[media="screen"],*[media="print"]').attr('media', '');
       });
        </script>
        <style type="text/css">
          @media print 
          { 
          @page {
          size: landscape;
          margin: 0mm;
          margin-top:-20mm;
          }
          .noprint {display:none;}
          }
          table {
            table-layout: fixed !important;
          }
          td, th {
            white-space: normal !important;
            padding: 1px !important;
            padding-left: 5px !important;
            padding-bottom: 0px !important;
            height: 5px !important;
          }
        </style>
        
<div class="form-group col-sm-3"><center><img src="../../images/logonl.png" width="120"></center></div>
<div class="form-group col-sm-6"><center><? echo "<h4><b>HORARIO DE ACTIVIDADES</b></h4>"; echo "<h5><b>".$generacion."</b></h5>"; echo "<h6>".$fecha."</h6>"; echo "<h5>".$grupo." ".$curso." - <b>".$aula." / ".$edificio."</b></h5>"; ?></center></div>
<div class="form-group col-sm-3"><center><img src="../../images/logo-ucs.png" width="160"></center></div>
</div>
<? include("php/tabla_horarios_asignados.php"); ?>
                  </div>
                  </div>
               
<script>
  $successMsg = $(".alert");
  $.validate({
    form : '#form-horarios',
    modules : 'security',
    errorMessageClass: "error",
    onSuccess: function(){
      add("#form-horarios","Listado de horarios");
      $successMsg.show();
      return false; 
    } });
</script>

<?
}
?>
                </div>
              </div>
            </div>
          </div>
        </div>        

<? include("../includes/footer.php");?>