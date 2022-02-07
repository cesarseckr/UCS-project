<? session_start();?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <title>UCS Control - Dashboard</title>
  <!-- HEADER -->
   <?php include ("../includes/header.php"); ?>
</head>
<body>
  <? include ("../includes/conexion.php"); ?>
     <? include ("../includes/restricciones_administrativo.php"); ?>
  <div class="container-scroller">
    <!-- PANEL DE NAVEGACIÓN -->

    <? include('menus/navBar.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- BARRA LATERAL -->
      <? include('menus/sideBar.php'); ?>
      <!-- partial --> 
      <div class="main-panel">
         <!-- CONTENIDO PRINCIPAL --> 
        <div class="content-wrapper">
        
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body"><h4 class="card-title"><i class="fa fa-users"></i> TITULO DE LA SECCIÓN</h4><hr>
                  <div class="fluid-container">
                   
    <form role="form">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" data-validation="required"  data-validation-error-msg="<p style='color:#B40431;'>* Ingrese un nombre de usuario correcto</p>">
        </div>
        <div class="form-group">
          <label for="email">Email address:</label>
          <input type="email" class="form-control" id="email" name="email" data-validation="email" data-validation="required" data-validation-error-msg="<p style='color:#B40431;'>* Ingrese un correo valido</p>">
        </div>
        <button type="submit" class="btn btn-default">Ingresar</button>
      </form>

                       <script type="text/javascript">
              $successMsg = $(".alert");
$.validate({
  errorMessageClass: "error",
  onSuccess: function(){
    $successMsg.show();


    return false; //*No borrar - Bloquea el submit nativo lo que permite ejecutar funciones
  }


                               });          
  var comp=0;  
let timerInterval
Swal.fire({
  title: 'Registrando información',
  type:'info',
  html: 'Espera mientras el sistema registra la información',
  showConfirmButton: false,
  onBeforeOpen: () => {
    Swal.showLoading()
setTimeout(hola,1500);
  },
}).then(() => {
if(comp==1){ 
Swal.fire({
  position: 'center',
  type: 'success',
  title: 'Correcto',
   html: 'La información se a registrado correcamente',
  showConfirmButton: false,
  timer: 1500
})
}else {
Swal.fire({
  position: 'center',
  type: 'error',
  title: 'Error',
   html: 'Hubo algún problema registrando tus datos',
  showConfirmButton: false,
  timer: 1500
})

}

})

function hola(){
 comp=1;
 Swal.close();
}

                       </script>
                      

                  </div>
                </div>
              </div>
            </div>
          </div>

        </div> 
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->


  <? include("../includes/footer.php");?>