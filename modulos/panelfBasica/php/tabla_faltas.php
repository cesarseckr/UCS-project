
<div id="tabla" class="table-responsive" style="padding-bottom: 15px;">
  <script>
    $(document).ready(function() {
      tabla("Listado de faltas a la disciplina");
    });
  </script>
  <table id="tabla-1" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="noExport">Editar</th>
        <th>Faltas</th>
        <th>Sanciones</th>
        <th>1° Re</th>
        <th>2° Re</th>
        <th>3° Re</th>
        <th>Nivel de Falta</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
      <? 
        $sql="SELECT * FROM faltas_disciplina";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
         $id_faltas=$row["id_faltas"];
         $faltas=$row["faltas"];
         $sanciones=$row["sanciones"];
         $primer=$row["primer"];
         $segundo=$row["segundo"];
         $tercer=$row["tercer"];
         $nivel_falta=$row["nivel_falta"];
         $estatus=$row["estatus"];
         $modificar='<button class="btn btn-dark btn-sm"
           id="modificar_falta" 
           id_faltas="'.$id_faltas.'"
           faltas="'.$faltas.'"
           sancion="'.$sanciones.'"
           primer="'.$primer.'"
           segunda="'.$segundo.'"
           tercer="'.$tercer.'"
           nivel="'.$nivel_falta.'"
           estatus="'.$estatus.'"
           data-toggle="modal"
           data-target="#modal_mod-faltas"
           data-whatever="@mdo"> <i class="fa fa-edit"></i> Modificar</button>';

         if ($nivel_falta==1) {
           $nivel_falta="<span class='btn btn-success btn-sm'>Leve</span>";
         }elseif ($nivel_falta==2) {
           $nivel_falta="<span class='btn btn-warning btn-sm'>Grave</span>";
         }elseif ($nivel_falta==3) {
           $nivel_falta="<span class='btn btn-danger btn-sm'>Muy grave</span>";
         }


             if($estatus==1){ 
      $estatus_t="<center><span class='btn btn-success btn-sm'>Activo</span></center>";
    } else{
      $estatus_t="<center><span class='btn btn-danger btn-sm'>Desactivado</span></center>";
    }

         echo "
                <tr>
                <td><center>".$modificar."</center></td>
                <td>".$faltas."</td>
                <td>".$sanciones."</td>
                <td>".$primer."</td>
                <td>".$segundo."</td>
                <td>".$tercer."</td>
                <td>".$nivel_falta."</td>
                <td>".$estatus_t."</td>
                </tr>
              ";
        } 
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th class="noExport">Editar</th>
        <th>Faltas</th>
        <th>Sanciones</th>
        <th>1° Re</th>
        <th>2° Re</th>
        <th>3° Re</th>
        <th>Nivel de Falta</th>
        <th>Estatus</th>
      </tr>
    </tfoot>
  </table>
</div>  
