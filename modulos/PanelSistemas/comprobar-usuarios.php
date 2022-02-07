<?php
      $user = $_POST['b'];

      if(!empty($user)) {
            comprobar($user);
      }
       
      function comprobar($b) {
      	include("../includes/conexion.php");
          $sql="SELECT id_alumno, concat(nombres,' ', apaterno,' ',amaterno) as Nombre, matricula FROM alumnos WHERE matricula='$b' or curp='$b'"; 
     	    $comp=0; 
          $sq = $db->query($sql); 
          $rows= $sq->fetchAll();
      foreach ($rows as $row) { 
  	     $comp=1; 
         $id=$row["id_alumno"];
  	     $nombre=$row["Nombre"]; 
          $matricula=$row["matricula"]; 
  		  
        }
             
            if($comp == 0){
                  $arreglo= array('id_u' => "0",
                      'nombre' => "Error clave incorrectar, ingrese una clave valida",
                      'matricula' => "Error clave incorrectar, ingrese una clave valida");
                  echo json_encode($arreglo);
             echo $arreglo[0];
            }else{
              
                $arreglo= array('id_u' => $id,
                      'nombre' => $nombre,
                      'matricula' => $matricula);
             echo json_encode($arreglo);
            }
      }     
?>