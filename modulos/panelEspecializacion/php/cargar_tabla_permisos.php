<?
  include('../../includes/conexion.php');
  
    $id_datos=$_POST['id_datos'];
    $tipo=$_POST['tipo'];
    $sql="SELECT * FROM permisos where id_datos=$id_datos and tipo=$tipo";
    $sq= $db->query($sql);
    $rows=$sq->fetchAll();
    foreach ($rows as $row) {
      $id_permiso=$row["id_permiso"];
      $fecha_inicio=$row["fecha_inicio"];
      $fecha_fin=$row["fecha_fin"];
      $causas=$row["causas"];
      $especificacion=$row["especificacion"];
      $id_datos=$row["id_datos"];

          if($causas == 1){
      $causas="Consulta servicio Isssteleon";
    }else if($causas == 2){
      $causas="Consulta servicio Médico";
    }else if($causas == 3){
      $causas="Trámites de titulación";
    }else if($causas == 4){
      $causas="Trámites personales";
    }else if($causas == 5){
      $causas="Causas de fuerza mayor";
    }else if($causas == 6){
      $causas="Otros";
    }

      $eliminar='<button class="btn btn-icons btn-danger"
      id="eliminar_permiso" 
      id_permiso="'.$id_permiso.'"> <i class="fa fa-minus"></i></button>';
      
      echo "
        <tr>
          <td><center>".$eliminar."</center></td>
          <td>".$fecha_inicio."</td>
          <td>".$fecha_fin."</td>
          <td>".$causas."</td>
          <td>".$especificacion."</td>
        </tr>
      ";
      } 
?>