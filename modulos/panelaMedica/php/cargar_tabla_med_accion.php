<?php 
  include('../../includes/conexion.php');
  $id_accion_enf = $_POST['id_accion_enf'];
  $sql="SELECT * FROM acciones_materiales where id_accion_enf = '$id_accion_enf'";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll(); 
  foreach ($rows as $row) {
    $id_accion_mat=$row["id_accion_mat"];
    $id_accion_enf=$row["id_accion_enf"];
    $tipo_contenido=$row["tipo_contenido"];
    $mat_med=$row["mat_med"];
    $presentacion=$row["presentacion"];
    $cantidad=$row["cantidad"];

    $eliminar_med='<button type="button" class="btn btn-danger" id="del_med" id_accion_mat="'.$id_accion_mat.'"
      id_accion_enf="'.$id_accion_enf.'"
      tipo_contenido="'.$tipo_contenido.'"
      mat_med="'.$mat_med.'"
      presentacion="'.$presentacion.'"
      cantidad="'.$cantidad.'" 
    >Eliminar</button>';

    $cantidad=$row["cantidad"]." ".$row["presentacion"]; 
      $sql="SELECT * FROM medicamentos where id_medicamento='$mat_med'";
      $sq = $db->query($sql);
      $rows= $sq->fetchAll(); 
      foreach ($rows as $row){ 
        $medicamento=$row["sustancia_activa"];
      }     
    echo"
      <tr>
        <td>".$eliminar_med."</th>
        <td>".$medicamento."</th>
        <td>".$cantidad."</th>
    </tr>";
  }
?>