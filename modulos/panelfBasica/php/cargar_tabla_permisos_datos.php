<?
  include('../../includes/conexion.php');
  
    $id_datos=$_POST['id_datos'];
    $tipo=$_POST['tipo'];

    $sql="SELECT * FROM permisos where id_datos=$id_datos and tipo=$tipo";

    $sq= $db->query($sql);
    $rows=$sq->fetchAll();

    foreach ($rows as $row) {
      $id_permiso=utf8_encode($row["id_permiso"]);
      $fecha_inicio=utf8_encode($row["fecha_inicio"]);
      $fecha_fin=utf8_encode($row["fecha_fin"]);
      $causas=utf8_encode($row["causas"]);
      $especificacion=utf8_encode($row["especificacion"]);
      $id_datos=utf8_encode($row["id_datos"]);
      $eliminar='<button class="btn btn-danger"
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