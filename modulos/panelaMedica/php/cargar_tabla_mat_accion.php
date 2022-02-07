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

    $eliminar_med='<button type="button" class="btn btn-danger" id="del_med_accion" id_accion_mat="'.$id_accion_mat.'"
      id_accion_enf="'.$id_accion_enf.'"
      tipo_contenido="'.$tipo_contenido.'"
      mat_med="'.$mat_med.'"
      presentacion="'.$presentacion.'"
      cantidad="'.$cantidad.'" 
    >Eliminar</button>';
    $cantidad=$row["cantidad"]." ".$row["presentacion"];
    
    if($tipo_contenido==1){
      $sql_med="SELECT * FROM medicamentos where id_medicamento='$mat_med'";
      $sq_med = $db->query($sql_med);
      $rows_med= $sq_med->fetchAll(); 
      foreach ($rows_med as $row_med){ 
        $medicamento=$row_med["sustancia_activa"];
      }
    }else if($tipo_contenido==2){
      $sql_med="SELECT * FROM material_medico where id_materialm='$mat_med'";
      $sq_med = $db->query($sql_med);
      $rows_med= $sq_med->fetchAll(); 
      foreach ($rows_med as $row_med){ 
        $medicamento=$row_med["material"];
      }
    }

    echo"
      <tr>
        <td>".$eliminar_med."</th>
        <td>".$medicamento."</th>
        <td>".$cantidad."</th>
    </tr>";
  }
?>