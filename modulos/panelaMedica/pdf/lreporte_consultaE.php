<? 
         
$html= '
    <html> 
        <head> 
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
            <title>Kardex de alumno</title> 
        </head> 
        <STYLE type="text/css">
            body { font: Helvetica, Verdana, Calibri, Arial, Sans-serif; }
             p{ font-size: 10px; }

            .t1{ font-size: 25px; }

            .t2{ font-size: 18px; }

            .t3{ font-size: 13px; }

            .just{ text-align: justify; }

            .derecha {text-align: right}

            .izquierda {text-align: left}

            .tabla2 { width: 700px;
              border: 1px groove;
              background: #DBDBDBD;
              padding: 0px 0px 0px 20px; }

            .tabla{ width: 700px; } 

            td{ padding: 0px 1px 0px 1px; }

            h4{ font-size: 14px; }

            table { border-collapse: collapse; text-align: left; width: 100%; }

            {background: #fff; overflow: hidden; border-radius:25px;}

            table td, table th { padding: 5px 9px;}

            table thead th {font-size: 12px; font-weight: bold; border: 1px solid #424964;}

            .azul {background-color:#424964 !important; color:#FFFFFF !important; font-size: 15px !important; font-weight: bold !important;}

            table thead th:first-child { border: none; }
            
            .titulo td{border: 0px solid #424964; font-weight: normal; }
            td{font-size: 10px;border: 1px solid #424964; font-weight: normal; }

            .pagina{width: 675px; border-radius: 5px 5px 5px 5px; padding: 1em; border: 0px solid #B6A618;}
        </STYLE>
        <body> 
            <center>
                <div class="pagina"> 
                    <table class="titulo">
                        <thead>
                            <tr class="azul">
                                <td>Numero</td>
                                <td>Diagnostico</td>
                                <td>Cantidad</td>
                            </tr>
                        </thead>
                        <tbody>'.
                            include("../../includes/conexion.php");
                            $sql="SELECT * FROM lista_diagnosticos";
                            $sq= $db->query($sql);
                            $rows=$sq->fetchAll();
                            foreach ($rows as $row){
                                $id_lista_diagnosticos=$row["id_lista_diagnosticos"];
                                $count=0;
                                $sql_diagnostico="SELECT * FROM diagnostico";
                                $sq_diagnostico=$db->query($sql_diagnostico);
                                $rows_diagnostico=$sq_diagnostico->fetchAll();
                                foreach ($rows_diagnostico as $row_diagnostico){
                                    $diagnostico=$row_diagnostico["diagnostico"];
                                    if($diagnostico==$id_lista_diagnosticos){
                                        $count=$count+1;
                                    }
                                }.'
                                <td>'.$id_lista_diagnosticos.'</td>
                                <td>'.$id_lista_diagnosticos.'</td>
                                <td>'.$count.'</td>'.
                            }.'                   
                        </tbody>
                    </table>
                    <br>
                </div>
            </center>
        </body> 
    </html>'; 
?>