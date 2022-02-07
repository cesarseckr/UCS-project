<? session_start();
  include("../includes/conexion.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Primera Sesión</title>
  <?php include ("../includes/header.php"); ?>
</head>
<body>
  <div class="container">
    <div class="form-row">
      <div class="col-md-6 mb-6">
        <label for="validationCustom01">Matricula</label>
        <input type="text" class="form-control" id="Matricula" placeholder="Matricula" value="<?php echo($_SESSION['matricula']); ?>" disabled>
        <input type="text" class="form-control" id="id" placeholder="Matricula" value="<?php echo($_SESSION['id_usuario']); ?>" 
        disabled>
      </div>


      <div class="col-md-6 mb-6">
        <label for="validationCustom02">CURP</label>
        <input type="text" class="form-control" id="curp" value="<?php echo($_SESSION['curp']); ?>" placeholder="CURP" disabled>
      </div>
      <div class="col-md-12 mb-12">
        <label for="validationCustom02">Nombre</label>
        <input type="text" class="form-control" value="<?php echo($_SESSION['nombre']); ?>" id="nombre" placeholder="Nombre" disabled>
      </div>
      <h1>Cambia tu contraseña</h1>
      <div class="col-md-12 mb-12">
        <label for="validationCustom02">Nueva contraseña</label>
        <input type="password" class="form-control" id="Nuevo_pass" placeholder="Password">
      </div>
      <div class="col-md-12 mb-12">
        <label for="validationCustom02">Confirmar nueva contraseña</label>
        <input type="password" class="form-control" id="confirama-pass" placeholder="Password">
      </div>
  </div>
  <br>
  <button class="btn btn-primary" type="button" id="mod_pass">Modifiar</button>
      
   <? include("../includes/footer.php");?>
  </div>

</body>
</html>