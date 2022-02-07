  <div id="fdesc">
  <small><b>Ningún filtro aplicado</b> realiza una busqueda para encontrar más datos - Mostrando últimos <b>300</b> registros (<b>Filtros aplicables:</b> Curso, Equivalencia)</small>
  </div>
 <div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de materias");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Editar</th>
        <th>Clave</th>
        <th>Nombre</th>
        <th>Equivalencia</th>
        <th>Carrera</th>
        <th>Módulo</th>
        <th>Créditos</th>
        <th>H. semana</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
      if(isset($_SESSION['filtro'])){
      $fequivalencia=$_SESSION['fequivalencia'];
      $fcurso=$_SESSION['fcurso'];
      if($fequivalencia!=""){
      $fequivalencia="and id_equivalencia=".$fequivalencia;
      }
      if($fcurso!=""){
      $fcurso="and id_curso=".$fcurso;
      }
      $_SESSION['fequivalencia']=null;
      $_SESSION['filtro']=null;
      $_SESSION['fcurso']=null;
      }
      
      $sql="SELECT * FROM materia WHERE id_materia<>0 ".$fcurso." ".$fequivalencia." ORDER BY id_materia DESC LIMIT 300";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_materia=$row["id_materia"];
         $id_equivalencia=$row["id_equivalencia"];
         $id_curso=$row["id_curso"];
         $clave=$row["clave"];
         $nombre=$row["nombre"];
         $creditos=$row["creditos"];
         $horas_semana=$row["horas_semana"];
         $estatus=$row["estatus"];

         $sql="SELECT * FROM equivalencia where id_equivalencia='$id_equivalencia'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $nombre_equivalencia=$row["nombre"];
          }

         $sql="SELECT * FROM curso where id_curso='$id_curso'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $nombre_curso=$row["nombre"];
         $id_carrera=$row["id_carrera"];
          
         $sql="SELECT * FROM carrera where id_carrera='$id_carrera'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $clave_carrera=$row["clave"];
         $nombre_carrera=$row["nombre"];
          }

          }

         $editar='<button id="btn_materias" type="button" class="btn btn-dark btn-block btn-sm" data-toggle="modal" data-target="#mod_materias" data-whatever="@mdo"
            btn-id_materia="'.$id_materia.'"
            btn-id_equivalencia="'.$id_equivalencia.'"
            btn-id_curso="'.$id_curso.'"
            btn-id_carrera="'.$id_carrera.'"
            btn-clave="'.$clave.'"
            btn-nombre="'.$nombre.'"
            btn-creditos="'.$creditos.'"
            btn-horas_semana="'.$horas_semana.'"
            btn-estatus="'.$estatus.'"
         ><i class="fa fa-edit"></i> Editar</button>';

    if($estatus==1){ 
      $estatus_t="<center><span class='btn btn-success btn-sm'>Activo</span></center>";
    } else{
      $estatus_t="<center><span class='btn btn-danger btn-sm'>Desactivado</span></center>";
    }
      ?>
      <tr>
        <td><center><? echo $editar; ?></center></td>
        <td><? echo $clave; ?></td>
        <td><? echo $nombre; ?></td>
        <td><? echo $nombre_equivalencia; ?></td>
        <td><? echo $clave_carrera." - ".$nombre_carrera; ?></td>
        <td><? echo $nombre_curso; ?></td>
        <td><? echo $creditos; ?></td>
        <td><? echo $horas_semana; ?></td>
        <td><? echo $estatus_t; ?></td>  
      </tr>
      <? 
      }
     ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Editar</th>
        <th>Clave</th>
        <th>Nombre</th>
        <th>Equivalencia</th>
        <th>Carrera</th>
        <th>Módulo</th>
        <th>Créditos</th>
        <th>H. semana</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>