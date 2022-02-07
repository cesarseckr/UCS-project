<?php 
  include('../../includes/conexion.php');
  $id = $_POST['id'];

  if ($id==2) {
    $sql="SELECT * FROM docentes order by apaterno";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    echo '<option value="">Seleccione Paciente</option>';
    foreach ($rows as $row) {
      $id=$row['id_docente'];
      $curp=$row['curp'];
      $nombres= $row['apaterno']." ".$row['amaterno']." ".$row['nombres'];          
      echo "<option value='".$id."'>".$nombres."-".$curp."</option>";
    }
  }else if ($id==3) {
    $sql="SELECT * FROM administrativos order by apaterno";
    $sq = $db->query($sql);
    $rows= $sq->fetchAll(); 
    echo '<option value="">Seleccione Paciente</option>';
    foreach ($rows as $row) {
      $id=$row['id_administrativo'];
      $curp=$row['curp'];
      $nombres= $row['apaterno']." ".$row['amaterno']." ".$row['nombres'];          
      echo "<option value='".$id."'>".$nombres."-".$curp."</option>";
    }
  }
?>