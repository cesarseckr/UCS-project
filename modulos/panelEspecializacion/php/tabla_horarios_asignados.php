<? 
if(isset($_GET['recargar'])){ 
include("../../includes/conexion.php");
$id_horario=$_GET['id_horario'];
}
       echo '<div id="tabla_horarios">
      <table class="table table-bordered">
      <thead class="thead-dark">
      <tr>
      <th>Horario</th>'; 
      $sql="SELECT * FROM dias WHERE estatus=1";
      $sq= $db->query($sql);
      $rowsd=$sq->fetchAll();
      foreach ($rowsd as $row) {
      $dia=$row['dia'];
      echo "<th>".$dia."</th>";
      }
        
      echo '</tr>
    </thead>
    <tbody>';
        
      $sql="SELECT * FROM horas WHERE estatus=1";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
      $id_hora=$row['id_hora'];
      $asignacion="";
      $hora=date("h:iA",strtotime($row['hora_in']))." - ".date("h:iA",strtotime($row['hora_fin']));
      echo "<tr><td><center><b>".$hora."</b></center></td>";
      $sql="SELECT * FROM dias WHERE estatus=1";
      $sq= $db->query($sql);
      $rowsd=$sq->fetchAll();
      foreach ($rowsd as $row) {
      $asignacion="";
      $id_dia=$row['id_dia'];
      
      $sql="SELECT * FROM horarios_asignacion WHERE id_horario='$id_horario' and id_hora='$id_hora' and id_dia='$id_dia'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
      $id_materia_asignacion=$row['id_materia_asignacion'];
      $aula_as=$row['id_aula'];
      if($id_materia_asignacion==0){
      $asignacion="COMIDA";
      }

      $sql="SELECT * FROM aulas WHERE id_aula='$aula_as'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
      $aula_t="<br>".$row['nombre'];
      }

      $sql="SELECT * FROM materias_asignacion WHERE id_materia_asignacion='$id_materia_asignacion'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
            $materia="";
      $docente="";
      foreach ($rows as $row) {
      $id_materia_asignacion=$row['id_materia_asignacion'];
      $id_docente=$row['id_docente'];
      $id_materia=$row['id_materia'];
      $sql="SELECT * FROM materia WHERE id_materia='$id_materia'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
      $materia=$row['nombre'];
      }
      $sql="SELECT * FROM docentes WHERE id_docente='$id_docente'";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
      $docente=$row['apaterno']." ".$row['amaterno']." ".$row['nombres'];
      }
      $asignacion=$materia."<br>".$docente."<b>".$aula_t."</b>";
      }

      }
      echo "<td><center><p style='font-size:9px;'>".$asignacion."</p></center></td>";
      }
      echo "</tr>";
      }
        
    echo '</tbody>
</table>
</div>';
?>