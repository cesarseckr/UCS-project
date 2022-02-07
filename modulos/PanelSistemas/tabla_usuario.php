<?php include ("../includes/conexion.php") ?>
<!DOCTYPE html>
<html>
  <head> 


    <script src="../../js/jquery.js" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="../../css/style.css">

    <link rel="stylesheet" href="../../vendors/iconfonts/font-awesome/css/font-awesome.css">   
    <link rel="stylesheet" type="text/css" href="../../js/datatable/datatable.css"/>

    <link rel="stylesheet" type="text/css" href="../../js/datatable/buttons.dataTables.min.css"/>
    
    
    <script type="text/javascript" src="../../js/datatable/jquery.dataTables.min.js"></script>
    
    <script type="text/javascript" src="../../js/datatable/dataTables.buttons.min.js"></script>

    <script type="text/javascript" src="../../js/datatable/buttons.flash.min.js"></script>
    <script type="text/javascript" src="../../js/datatable/jszip.min.js"></script>
    <script type="text/javascript" src="../../js/datatable/pdfmake.min.js"></script>
    <script type="text/javascript" src="../../js/datatable/vfs_fonts.js"></script>
    <script type="text/javascript" src="../../js/datatable/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../../js/datatable/buttons.print.min.js"></script>
     <script type="text/javascript" src="../../js/datatable/colvis.min.js"></script>

    <script>

    $(document).ready(function() {
        var nom_arch='Lista de usuarios';
        $('#tabla-1').DataTable( {
            dom: 'Blfrtip',
             buttons: [
               
               {
                   extend: 'colvis',
                   text: 'Ocultar filas <i class="fa fa-chevron-down"></i>',
                   title:  'Listado de usuarios'
               }, 
               {
                   extend: 'excelHtml5',
                    text: '<i class="fa fa-file-excel-o"></i>',
                   title:  'Listado de usuarios',
                   titleAttr: 'Exportar en EXCEL'
               },
               {
                   extend: 'pdfHtml5',
                    text: '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'Exportar en PDF',
                      title:  ''+nom_arch,
                   //download: 'open',
                   pageSize: 'A3',
                   title:  nom_arch,
                   exportOptions: {
                          columns: "thead th:not(.noExport)"
                  },    
                },
                {
                   extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                   title:  'Listado de usuarios',
                   titleAttr: 'Imprimir'
               }
            ]
        });        
    });

     
</script>
<br>
<table id="tabla-1" class="display nowrap" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="noExport">Editar</th>
      <th>Usuario</th>
      <th>Tipo</th>
      <th>Area</th>
      <th>Estatus</th>
    </tr>
  </thead>
  <tbody>
    <? 
      $sql="SELECT * FROM usuarios";
      $sq= $db->query($sql);
      $rows=$sq->fetchAll();
      foreach ($rows as $row) {
       $id_usuario=$row["id_usuario"];
       $id_datos=$row["id_datos"];
       $tipo=$row["tipo"];
       $area_admin=$row["area_admin"];
       if($tipo==99)
       {
        $sql="SELECT id_area FROM administrativos where id_administrativo='$id_datos'";
        $sq= $db->query($sql);
        $rows=$sq->fetchAll();
        foreach ($rows as $row) {
          $id_area=$row["id_area"];
          $sql="SELECT area FROM areas where id_area='$id_area'";
          $sq= $db->query($sql);
          $rows=$sq->fetchAll();
          foreach ($rows as $row) {
            $area=$row["area"];
          }
         }
       }
       
       $usuario=$row["usuario"];
       $estatus=$row["estatus"];

       //Bloque tipo de usuario
       if($tipo==99){
          $nombre_tipo="Administrador";
       } else 
       if($tipo==1){
          $nombre_tipo="Docente";
       } else 
       if($tipo==2){
          $nombre_tipo="Alumno";
       }

       

       //Bloque estatus
       if($estatus==1){
          $estatus_act='<span class="btn btn-primary btn-xs">Activo</span>';
       }
       else{
          $estatus_act='<span class="btn btn-danger btn-xs">Baja</span>';
       }

       $editar='<a href="formModAdmin.php?id_usuario='.$id_usuario.'" class="btn btn-dark btn-sm">Modificar</a>';
      
    ?>
    <tr>
      <td><center><? echo $editar; ?></center></td>
      <td><? echo $usuario; ?></td>
      <td><? echo $nombre_tipo; ?></td>
      <td><? echo $area; ?></td>
      <td><center><? echo $estatus_act; ?></center></td>
    </tr>
    <? } ?>
  </tbody>
  <tfoot>
    <tr>
      <th class="noExport">Editar</th>
      <th>Usuario</th>
      <th>Tipo</th>
      <th>Area</th>
      <th>Estatus</th>
    </tr>
  </tfoot>
</table>

