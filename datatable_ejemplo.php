<?php include ("paginas/includes/conexion.php") ?>
<!DOCTYPE html>
<html>
	<head>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
        <script src="Mod_administrativos/funciones_js_mod_admin"></script>
		<link rel="shortcut icon" href="img/favicon.png">

		<meta name="description" content="description">
		<meta name="author" content="Proser Soluciones - Rubén Rios">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/vendor/icon-sets.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
        <link rel="stylesheet" type="text/css" href="datatable/estilo.css"/>
        <link rel="stylesheet" type="text/css" href="datatable/buttons.dataTables.min.css"/>
        <script type="text/javascript" src="datatable/dataTables.js"></script>
        <script type="text/javascript" src="datatable/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="datatable/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="datatable/buttons.flash.min.js"></script>
        <script type="text/javascript" src="datatable/jszip.min.js"></script>
        <script type="text/javascript" src="datatable/pdfmake.min.js"></script>
        <script type="text/javascript" src="datatable/vfs_fonts.js"></script>
        <script type="text/javascript" src="datatable/buttons.html5.min.js"></script>
        <script type="text/javascript" src="datatable/buttons.print.min.js"></script>
<script>

    $(document).ready(function() {
        var nom_arch='Lista de usuarios';
        $('#tabla-1').DataTable( {
            dom: 'Bfrtip',
             buttons: [
                 'copyHtml5',
                 {
                     extend: 'csvHtml5',

                     title:  'Listado de usuarios'
                 },
                 {
                     extend: 'excelHtml5',
                     title:  'Listado de usuarios'
                 },
                 {
                     extend: 'pdfHtml5',
                    // orientation: 'landscape',
                        title:  ''+nom_arch,
                     //download: 'open',
                     pageSize: 'A3',
                     title:  nom_arch,
                     exportOptions: {
                            columns: "thead th:not(.noExport)"
                    },
                    
                 
             }
         ]
    } );
} );
	</script>
<br>
				<table id="tabla-1" class="display nowrap" cellspacing="0" width="100%">
				<thead><tr>
    <th class="noExport">Editar</th>
    <th class="noExport">Documento</th>
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
     $usuario=$row["usuario"];
        $estatus=$row["estatus"];

        //Bloque tipo de usuario
if($tipo==99){
$nombre_tipo="Modo dios";
}
else if($tipo==1){
$nombre_tipo="Administrativo";
}

    //Bloque area admin
if($area_admin==1){
$area_nombre="Control escolar";
}
else if($area_admin==9){
$area_nombre="Administrador";
}
else if($area_admin==0){
$area_nombre="NA";
}

//Bloque estatus
if($estatus==1){
$estatus_act='<span class="btn btn-success btn-xs">Activo</span>';
}
else{
    $estatus_act='<span class="btn btn-danger btn-xs">Baja</span>';
}

$editar='<a href="modificar.php?id_usuario='.$id_usuario.'" target="_blank" class="btn btn-primary btn-xs">Este es un botón para editar</a>';
$archivo='<a href="documento.php?id_usuario='.$id_usuario.'" target="_blank" class="btn btn-info btn-xs">Este es un link de archivo</a>';
     ?>
<tr>
<td><? echo $editar; ?></td>
<td><? echo $archivo; ?></td>
<td><? echo $usuario; ?></td>
<td><? echo $nombre_tipo; ?></td>
<td><? echo $area_nombre; ?></td>
<td><? echo $estatus_act; ?></td></tr>
<?
}
?>
</tbody>
<tfoot>
 <tr>  <th class="noExport">Editar</th>
    <th class="noExport">Documento</th>
                    <th>Usuario</th>
                    <th>Tipo</th>
                    <th>Area</th>
    <th>Estatus</th>
</tr>
    	
</tfoot>
			</table>
