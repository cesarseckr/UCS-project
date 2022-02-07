<?php 
  include('../../includes/conexion.php');
  $id_diagnostico = $_POST['id_diagnostico'];
  $sql="SELECT * FROM tratamientos where tipo_contenido=1 AND id_diagnostico = '$id_diagnostico'";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll(); 
  foreach ($rows as $row) {
    $id_tratamiento=$row["id_tratamiento"];
    $id_diagnostico=$row["id_diagnostico"];
    $tipo_contenido=$row["tipo_contenido"];
    $mat_med=$row["mat_med"];
    $presentacion=$row["presentacion"];
    $tiempo=$row["tiempo"];
    $cantidad=$row["cantidad"];

    $eliminar_med='<button type="button" class="btn btn-danger" id="del_med" id_tratamiento="'.$id_tratamiento.'"
      id_diagnostico="'.$id_diagnostico.'"
      tipo_contenido="'.$tipo_contenido.'"
      mat_med="'.$mat_med.'"
      presentacion="'.$presentacion.'"
      tiempo="'.$tiempo.'"
      cantidad="'.$cantidad.'" 
    >Eliminar</button>';

    $tipo_contenido=$row["tipo_contenido"];
    $mat_med=$row["mat_med"];
    $cantidad=$row["cantidad"]." ".$row["presentacion"];
    $tiempo=$row["tiempo"]; 
      $sql="SELECT * FROM medicamentos where id_medicamento='$mat_med'";
      $sq = $db->query($sql);
      $rows= $sq->fetchAll(); 
      foreach ($rows as $row) { 
        $medicamento=$row["sustancia_activa"];
      }     
    echo"
      <tr>
        <td>".$eliminar_med."</th>
        <td>".$medicamento."</th>
        <td>".$cantidad."</th>
        <td>".$tiempo."</th>
    </tr>";
  }
?>