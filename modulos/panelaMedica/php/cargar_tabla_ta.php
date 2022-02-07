<?php 
  include('../../includes/conexion.php');
  $id_control_ta = $_POST['id_control_ta'];
  $sql="SELECT * FROM contenido_ta where id_control_ta='$id_control_ta'";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll(); 
  foreach ($rows as $row) {
    $id_control_ta=$row["id_control_ta"];
    $id_contenido_ta=$row["id_contenido_ta"];
    $sys=$row["sys"]." mmHg";
    $dia=$row["dia"]." mmHg";
    $pulse=$row["pulse"]." /min";
    $fecha_hora=$row["fecha_hora"];

    $eliminar_ta='<button type="button" class="btn btn-danger" id="del_contenido_ta" id_control_ta="'.$id_control_ta.'" id_contenido_ta="'.$id_contenido_ta.'"
      >Eliminar</button>';

    echo"
      <tr>
        <td>".$eliminar_ta."</th>
        <td>".$sys."</th>
        <td>".$dia."</th>
        <td>".$pulse."</th>
        <td>".$fecha_hora."</th>
      </tr>";
  }
?>