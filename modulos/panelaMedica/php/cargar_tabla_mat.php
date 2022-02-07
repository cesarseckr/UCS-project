<?php 
  include('../../includes/conexion.php');
  $id_diagnostico = $_POST['id_diagnostico'];
  $sql="SELECT * FROM tratamientos where tipo_contenido=2 AND id_diagnostico = '$id_diagnostico'";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll(); 
  foreach ($rows as $row) {
    $id_tratamiento=$row["id_tratamiento"];
    $id_diagnostico=$row["id_diagnostico"];
    $tipo_contenido=$row["tipo_contenido"];
    $mat_med=$row["mat_med"];
    $presentacion=$row["presentacion"];
    $cantidad=$row["cantidad"];

    $eliminar_mat='<button type="button" class="btn btn-danger" id="del_med_farm" id_tratamiento="'.$id_tratamiento.'"
      id_tratamiento="'.$id_tratamiento.'"
      id_diagnostico="'.$id_diagnostico.'"
      tipo_contenido="'.$tipo_contenido.'"
      mat_med="'.$mat_med.'"
      presentacion="'.$presentacion.'"
      cantidad="'.$cantidad.'" 
      >Eliminar</button>';

    $mat_med=$row["mat_med"];
    $cantidad=$row["cantidad"]." ".$row["presentacion"];
    $sql="SELECT * FROM material_medico where id_materialm='$mat_med'";
      $sq = $db->query($sql);
      $rows= $sq->fetchAll(); 
      foreach ($rows as $row) { 
        $medicamento=$row["material"];
      }       
    echo"
      <tr>
        <td>".$eliminar_mat."</th>
        <td>".$medicamento."</th>
        <td>".$cantidad."</th>
      </tr>";
  }
?>