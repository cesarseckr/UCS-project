<?php session_start();
  
  include('../../includes/conexion.php');

  if(isset($_POST['id_grupo']) and isset($_POST['id_curso'])){
     $id_grupo=$_POST['id_grupo'];
     $id_curso=$_POST['id_curso'];
  $sql="SELECT id_materia,nombre FROM materia WHERE id_curso=$id_curso";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $i=0;
      foreach ($rows as $row) {
      $id_materia=$row["id_materia"];
      $materia=$row["nombre"];
      $id_asignacion=null;
      $sql="SELECT id_docente FROM materias_asignacion WHERE id_grupo='$id_grupo' and id_materia='$id_materia'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
      $id_asignacion=$row['id_docente'];
      }

      $mat='<input type="text" value="'.$id_materia.'" name="mat-'.$i.'" id="mat-'.$i.'" style="display:none;"><input type="text" class="form-control" value="'.$materia.'" readonly>';
      $select='<select name="doc-'.$i.'" id="doc-'.$i.'" class="selectpicker form-control" data-live-search="true" data-live-search-normalize="true" title="Asigna un docente" data-validation="required" data-validation-error-msg="<b style="color:red;">Asigna un docente</b>">';
      $option="";
      $sql="SELECT id_docente, concat(nombres,' ',apaterno,' ',amaterno) as nombre FROM docentes";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      $comp=0;
      foreach ($rows as $row) {
      $id_docente=$row["id_docente"];
      $docente_nombre=$row["nombre"];

      if($id_asignacion==$id_docente){
      $option=$option."<option value='".$id_docente."' selected>".$docente_nombre."</option>";
      }
    else{
      $option=$option."<option value='".$id_docente."'>".$docente_nombre."</option>";
    }
    }
    $select=$select." ".$option."</select>";

    if($id_asignacion!=null){ 
      $estatus_t="<center><span class='btn btn-success btn-sm'>Asignada</span></center>";
    } else{
      $estatus_t="<center><span class='btn btn-warning btn-sm'>Libre</span></center>";
    }

      $areas[$i]["materia"]=$mat;
      $areas[$i]["docente"]=$select; 
      $areas[$i]["estatus"]=$estatus_t;
        $i++;
      }

     $valores= json_encode($areas);
     echo $valores;
   }
?>