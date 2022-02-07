<?
  include('../../includes/conexion.php');
  
    $id_alumno=$_POST['id_alumno'];
    $sql="SELECT * FROM servicio_social where id_alumno='$id_alumno'";
    $sq= $db->query($sql);
    $rows=$sq->fetchAll();
    $totales=0;
    foreach ($rows as $row) {
      $id_servicio_social=$row["id_servicio_social"];
      $fecha_inicio=$row["fecha_in"];
      $fecha_fin=$row["fecha_fin"];
      $detalles=$row["detalles"];
      $duracion=$row["duracion"];
      $eliminar='<button class="btn btn-icons btn-danger"
      id="eliminar_servicio_social" 
      id_ssocial="'.$id_servicio_social.'"> <i class="fa fa-times"></i></button>';
      $totales=$totales+$duracion;
      echo "
        <tr>
          <td><center>".$eliminar."</center></td>
          <td>".$duracion." horas</td>
          <td>".date("d-m-Y", strtotime($fecha_inicio))."</td>
          <td>".date("d-m-Y", strtotime($fecha_fin))."</td>
          <td>".$detalles."</td>
        </tr>
      ";
      }
      echo "<tr>
          <td><center>Horas acumuladas</center></td>
          <td colspan='4'>".$totales." horas</td>
        </tr>";

    
?>