<?php 
  require("../../includes/conexioncon.php");

  $id_hist_disc = $_POST['id_hist_disc'];
  
  $consulta = mysqli_query($con,"DELETE FROM historial_disciplinario WHERE id_hist_disc='$id_hist_disc'");

  if (!$consulta){
    echo "error al registrar en la base de datos" . mysql_error();
  }else{
     echo "1";
  }

?>