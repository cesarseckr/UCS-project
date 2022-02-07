<?php 
  include('../../includes/conexion.php');

  $sql="SELECT * FROM faltas_disciplina WHERE estatus=1";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll(); 
  foreach ($rows as $row) {
    $id=$row['id_faltas'];
    $faltas=$row['faltas'];
    $sancion1=$row['sanciones'];
    $sancion2=$row['primer'];
    $sancion3=$row['segundo'];
    $sancion4=$row['tercer'];           
    echo "<option value='".$id."' 
            sancion1='".$sancion1." 
            sancion2='".$sancion2." 
            sancion3='".$sancion3." 
            sancion4='".$sancion4."
            '>".$faltas."
          </option>";
  }
?>