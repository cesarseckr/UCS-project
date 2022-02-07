/*require("../../includes/conexioncon.php");
      $consulta = mysqli_query($con,"UPDATE historial_disciplinario SET reincidencias='$numero_reincidencias', sanciones='$tipo_sanciones'
       WHERE id_hist_disc='$id_hist_disc'");

      if (!$consulta){
        echo "error".mysql_error($consulta);
      }else{
        $sql_n="SELECT * FROM historial_disciplinario where id_alumno=$id_alumno";
        $sq_n= $db->query($sql_n);
        $rows_n=$sq_n->fetchAll();
        foreach ($rows_n as $row_n) {
          $reincidencias=utf8_encode($row_n["reincidencias"]);
          $sanciones=utf8_encode($row_n["sanciones"]);
        }*/ 