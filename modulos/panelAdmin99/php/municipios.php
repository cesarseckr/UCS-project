<?php 
include('../../includes/conexion.php');
  $id = $_POST['id'];
  $sql="SELECT * FROM municipios where id_estado=$id";
  $sq = $db->query($sql);
  $rows= $sq->fetchAll();

  $mun_con=$_SESSION['mun_con'];
  if($mun_con!=""){ 
 echo '<option value="'.$mun_con.'">'.$mun_con.'</option>'; 

}
else{  
  echo '<option value="">Seleccione un municipio</option>';
}
  foreach ($rows as $row) {
    $id=$row['id_municipio'];
    $municipio= $row['municipio'];          
    echo "<option value='".$id."'>".$municipio."</option>";
  }
  // $_SESSION['mun_con']=null;
?>