<?
  include('../../includes/conexion.php');
  
    $id_alumno=$_POST['id_alumno'];
    $sql="SELECT * FROM historial_disciplinario where id_alumno=$id_alumno";

    $sq= $db->query($sql);
    $rows=$sq->fetchAll();

    foreach ($rows as $row) {
      $id_hist_disc=$row["id_hist_disc"];
      $id_falta=$row["id_falta"];
      $fecha=$row["fecha"];
      $reincidencias=$row["reincidencias"];
      $sanciones=$row["sanciones"];
      $observaciones=$row["observaciones"];

      $sql_falta="SELECT * FROM faltas_disciplina where id_faltas=$id_falta";
      $sq_falta= $db->query($sql_falta);
      $rows_falta=$sq_falta->fetchAll();
      foreach ($rows_falta as $row_falta) {
        $falta=$row_falta["faltas"];
      } 

      echo "
        <tr>
          <td>".date("d-m-Y", strtotime($fecha))."</td>
          <td>".$falta."</td>
          <td>".$reincidencias."</td>
          <td>".$sanciones."</td>
          <td>".$observaciones."</td>
        </tr>
      ";
    
  }
?>