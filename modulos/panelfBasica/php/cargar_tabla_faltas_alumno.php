<?
  include('../../includes/conexion.php');
  
    $id_alumno=$_POST['id_alumno'];
    $sql="SELECT * FROM historial_disciplinario where id_alumno=$id_alumno";
    echo $sql;
    $sq= $db->query($sql);
    $rows=$sq->fetchAll();
    $cont=0;
    foreach ($rows as $row) {
      $id_hist_disc=$row["id_hist_disc"];
      $id_falta=$row["id_falta"];
      $fecha=$row["fecha"];
      $reincidencias=$row["reincidencias"];
      $sanciones=$row["sanciones"];
      $observaciones=$row["observaciones"];
      $eliminar='<button class="btn btn-icons btn-danger"
      id="eliminar_falta_historia" 
      id_hist_disc="'.$id_hist_disc.'"><i class="fa fa-times"></i></button>';
      $comp=0;
      $sql="SELECT * FROM cartas_compromiso where id_hist_disc=$id_hist_disc";
    $sq= $db->query($sql);
    $rows=$sq->fetchAll();
    foreach ($rows as $row) {
    $comp=1;
    $ruta=$row["ruta"];
    $id_cartas_compromiso=$row['id_cartas_compromiso'];
    $url_carta="<p><a href='../../archivos/".$ruta."' target='_blank'><i class='fa fa-file-alt'></i> Carta compromiso</a> <a id='eliminar_carta_compromiso' id_cartas_compromiso='".$id_cartas_compromiso."' ruta='".$ruta."' href='#tabla-faltas-1' style='color:red;'><small>(Eliminar)</small></a></p>";
    }
    if($comp==1){
      $carta=$url_carta;
    }
    else{
      $cont++;
      $carta='<form id="form-carta'.$cont.'" action="archivos/add_carta_compromisoE.php" method="post" enctype="multipart/form-data"><input name="id_hist_disc'.$cont.'" id="id_hist_disc'.$cont.'" value="'.$id_hist_disc.'" style="display:none;">
          <input type="file" id="add_carta'.$cont.'" name="add_carta'.$cont.'" style="display:none;" class="inputfile inputfile-1" onChange="add_cartas('.$cont.');">
          <label for="add_carta'.$cont.'"><i class="fa fa-file-alt"></i><span> Agregar&hellip;</span></label></form>';
    }
      $sql_falta="SELECT * FROM faltas_disciplina where id_faltas=$id_falta";
      $sq_falta= $db->query($sql_falta);
      $rows_falta=$sq_falta->fetchAll();
      foreach ($rows_falta as $row_falta) {
        $falta=$row_falta["faltas"];
      } 

      echo "
        <tr>
          <td><center>".$eliminar."</center></td>
          <td>".$carta."</td>
          <td>".date("d-m-Y", strtotime($fecha))."</td>
          <td>".$falta."</td>
          <td>".$reincidencias."</td>
          <td>".$sanciones."</td>
          <td>".$observaciones."</td>
        </tr>
      ";
    
  }
?>