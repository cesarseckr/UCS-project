<?php session_start();
  
  include('../../includes/conexion.php');

  if(isset($_POST['id_grupo'])){
     $id_grupo=$_POST['id_grupo'];
  $sql="SELECT * FROM alumnos WHERE id_grupo=$id_grupo ORDER BY apaterno ASC";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
      $id_alumno=$row["id_alumno"];
      $alumno= $row["apaterno"]." ".$row["amaterno"]." ".$row["nombres"];
      $estatus=$row["id_estatus"];
      $matricula='<input type="text" class="form-control" value="'.$row["matricula"].'" readonly>';
      
      $sql="SELECT * FROM estatus_alumnos WHERE id_estatus_alumno=$estatus";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
      $nombre_estatus=$row["nombre"];
      }

      $alu='<input type="text" value="'.$id_alumno.'" name="alu_f-'.$i.'" id="alu_f-'.$i.'" style="display:none;"><input type="text" class="form-control" value="'.$alumno.'" readonly>';
      if($estatus==2){
      $incluir='<input type="checkbox" checked class="check" name="alu_f_check-'.$i.'" id="alu_f_check-'.$i.'"><label for="alu_f_check-'.$i.'" class="check"></label>';
      }
      else{
      $incluir='<input type="checkbox" class="check" name="alu_f_check-'.$i.'" id="alu_f_check-'.$i.'"><label for="alu_f_check-'.$i.'" class="check"></label>'; 
      }
      
    if($estatus==2){ 
      $estatus_t="<span class='btn btn-success btn-xs'>".$nombre_estatus."</span>";
    } else{
      $estatus_t="<span class='btn btn-warning btn-xs'>".$nombre_estatus."</span>";
    }

      $areas[$i]["nombre"]=$alu;
      $areas[$i]["matricula"]=$matricula; 
      $areas[$i]["estatus"]=$estatus_t;
      $areas[$i]["incluir"]=$incluir;
        $i++;
      }

     $valores= json_encode($areas);
     echo $valores;
   }
?>