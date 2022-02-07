<?php 
    session_start();
    include("../../includes/conexion.php");
    $titulo=$_POST['titulo_add_ticket'];
    $descripcion=$_POST['desc_add_ticket'];
    $id_area_envio=$_POST['area_add_ticket'];
    $prioridad=$_POST['prioridad_add_ticket'];
    $estado="1";
    $id_usuario= $_SESSION["id_usuario"];

    $sql="SELECT * FROM usuarios where id_usuario='$id_usuario'";
    $sq= $db->query($sql);
    $rows=$sq->fetchAll();
    foreach ($rows as $row){
        $id_tipo=$row['id_tipo'];
        $id_datos=$row['id_datos'];

        if($id_tipo==3){
            $sql_area="SELECT * FROM administrativos where id_administrativo='$id_datos'";
            $sq_area= $db->query($sql_area);
            $rows_area=$sq_area->fetchAll();
            foreach ($rows_area as $row_area){
                $id_area_origen=$row_area['id_area'];
            } 
        }else{
            $id_area_origen="0";
        }
    }


    require("../../includes/conexioncon.php");
    $fecha=date('Y-m-d', time());
    $hora=date('H:i:s', time());
    $fecha_hora=date('Y-m-d', time())." ".date('H:i:s', time());;

    $consulta = mysqli_query($con,"INSERT INTO tickets(titulo, prioridad, estado, fecha, hora, id_origen, id_tipo_origen, id_area_origen, id_area) VALUES ('$titulo','$prioridad','$estado','$fecha','$hora','$id_usuario','$id_tipo','$id_area_origen','$id_area_envio')");
    if (!$consulta){
            echo "  error" . mysql_error();
        }else{
            $recuperar="SELECT * FROM tickets order by id_tickets desc limit 1";
            $sq_recuperar= $db->query($recuperar);
            $rows_recuperar=$sq_recuperar->fetchAll();
            foreach ($rows_recuperar as $row_recuperar) {
                $id_tickets=$row_recuperar["id_tickets"];
                $insertar_conten = mysqli_query($con,"INSERT INTO contenido_tickets(id_usuario_respuesta,estatus,fecha_hora_origen,mensaje_origen, id_tickets) VALUES ('$id_usuario','1','$fecha_hora','$descripcion','$id_tickets')");
                if (!$consulta){
                    echo "  error" . mysql_error();
                }else{
                    echo"1";
                }
            }  
        }
 ?>