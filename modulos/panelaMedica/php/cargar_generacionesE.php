<?php session_start();
  
  include('../../includes/conexion.php');
if(isset($_POST['id_academia'])){
  $id_academia=$_POST['id_academia'];
  $sql="SELECT * FROM generacion WHERE estatus=1 and id_academia='$id_academia' ORDER BY id_generacion DESC";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_generacion"]=utf8_encode($row["id_generacion"]);
        $areas[$i]["nombre"]=utf8_encode($row["nombre"]);
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;
   }
   else{
$sql="SELECT * FROM generacion WHERE estatus=1 ORDER BY id_generacion DESC";
        $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
        $areas[$i]["id_generacion"]=utf8_encode($row["id_generacion"]);
        $areas[$i]["nombre"]=utf8_encode($row["nombre"]);
        $i++;
      }
     $valores= json_encode($areas);
     echo $valores;    
   }
?>