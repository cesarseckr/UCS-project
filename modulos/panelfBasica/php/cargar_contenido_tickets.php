<?php 
  include('../../includes/conexion.php');
  session_start();
  $id_tickets=$_POST['id_tickets'];
  $id_usuario= $_SESSION["id_usuario"];

  $sql="SELECT * FROM contenido_tickets WHERE id_tickets='$id_tickets'";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll();
  
  foreach ($rows as $row) {
    $mensaje=utf8_encode($row['mensaje_origen']);
    $fecha=date("d-m-Y h:iA", strtotime($row['fecha_hora_origen']));
    $id_usuario_respuesta =$row['id_usuario_respuesta'];

    $sql_usuario="SELECT * FROM usuarios where id_usuario='$id_usuario_respuesta'";
    $sq_usuario = $db->query($sql_usuario);
    $rows_usuario= $sq_usuario->fetchAll();
    foreach ($rows_usuario as $row_usuario) {
      $id_tipo_respuesta=$row_usuario['id_tipo'];
      $id_datos_respuesta=$row_usuario['id_datos'];
    }

    if ($id_tipo_respuesta==1) {
      $tipo='Alumno';
      $sql_tipo_datos="SELECT * FROM alumnos where id_alumno='$id_datos_respuesta'";
      $sq_tipo_datos=$db->query($sql_tipo_datos);
      $rows_tipo_datos=$sq_tipo_datos->fetchAll();
      foreach ($rows_tipo_datos as $row_tipo_datos) {
        $nombre=utf8_encode($row_tipo_datos['nombres']." ".$row_tipo_datos['apaterno']." ".$row_tipo_datos['amaterno']);
      }
    }elseif ($id_tipo_respuesta==2) {
      $tipo='Docente';
      $sql_tipo_datos="SELECT * FROM docentes where id_docente='$id_datos_respuesta'";
      $sq_tipo_datos=$db->query($sql_tipo_datos);
      $rows_tipo_datos=$sq_tipo_datos->fetchAll();
      foreach ($rows_tipo_datos as $row_tipo_datos) {
        $nombre=utf8_encode($row_tipo_datos['nombres']." ".$row_tipo_datos['apaterno']." ".$row_tipo_datos['amaterno']);
      }
    }elseif ($id_tipo_respuesta==3) {
      $sql_tipo_datos="SELECT * FROM administrativos where id_administrativo='$id_datos_respuesta'";
      $sq_tipo_datos=$db->query($sql_tipo_datos);
      $rows_tipo_datos=$sq_tipo_datos->fetchAll();
      foreach ($rows_tipo_datos as $row_tipo_datos) {
        $nombre=utf8_encode($row_tipo_datos['nombres']." ".$row_tipo_datos['apaterno']." ".$row_tipo_datos['amaterno']);
        $id_area=$row_tipo_datos['id_area'];
        $sql_area_datos="SELECT * FROM areas where id_area='$id_area'";
        $sq_area_datos=$db->query($sql_area_datos);
        $rows_area_datos=$sq_area_datos->fetchAll();
        foreach ($rows_area_datos as $row_area_datos) {
          $tipo=utf8_encode($row_area_datos['area']);
        }
      }
    }elseif ($id_tipo_respuesta==99) {
      $tipo='Master';
      $nombre='Master';
      
    }

    if ($id_usuario_respuesta==$id_usuario) {
      echo '<div class="form-row">
              <div class="form-group col-md-3"></div>
              <div class="form-group col-md-9  ticket-envio" >
            ';
      echo '<h5 style="margin: 0px; color:#424964; text-align:right">'.$nombre.'</h5>
            <p style="margin: 0px; padding: 2px; color: #92A5BD; text-align:right">'.$tipo.'</p>
            <hr style="margin: 0px; padding: 2px">
            <p class="texto-ticket-envio" style="border-radius:5px; color: white; background-color: #92A5BD; padding:8px; margin: 0px; font-size: 10pt;">
              '.$mensaje.'
            </p>
            <p style="margin: 0px; font-size: 7pt; text-align: center; color:#92A5BD;">'.$fecha.'</p>
            </div>
            </div>';
      }else{
      echo '<div class="form-row">
            <div class="form-group col-md-9  ticket-respuesta">
            ';
      echo '<h5 style="margin: 0px; color:#424964; ">'.$nombre.'</h5>
            <p style="margin: 0px; padding: 2px; color: #92A5BD">'.$tipo.'</p>
            <hr style="margin: 0px; padding: 2px">
            <p class="texto-ticket-respuesta" style="border-radius:5px; color: #424964; background-color: #BAD3DD; padding:8px; margin: 0px; font-size: 10pt;">
              '.$mensaje.'
            </p>
            <p style="margin: 0px; font-size: 7pt; text-align: center; color:#92A5BD;">'.$fecha.'</p>
            </div>
            <div class="form-group col-md-3"></div>
            </div>';
    }
  }  
    
?>