<?php
      $user = $_POST['consulta'];
      $tipo = $_POST['tipo_val'];




      if(!empty($user)) {
          if ($tipo=="1") {
            comprobar_Docentes($user);
          }else
          if ($tipo=="2") {
            comprobar_Alumnos($user);
          }else
          if ($tipo=="3" || $tipo=="99") {
            comprobar_Administrativos($user);
          }
      }
       
      function comprobar_Docentes($b) {
        include("../../includes/conexion.php");
        $sql="SELECT id_docente, concat(nombres,' ', apaterno,' ',amaterno) as Nombre, curp FROM docentes WHERE curp='$b'"; 
        $comp=0; 
        $sq = $db->query($sql); 
        $rows= $sq->fetchAll();
        foreach ($rows as $row) { 
          $comp=1; 
          $id=$row["id_docente"];
          $nombre=$row["Nombre"]; 
          $matricula=$row["curp"];  
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

      function comprobar_Alumnos($b) {
        include("../../includes/conexion.php");
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

      function comprobar_Administrativos($b) {
      	include("../../includes/conexion.php");
        $sql="SELECT id_administrativo, concat(nombres,' ', apaterno,' ',amaterno) as Nombre, curp FROM administrativos WHERE curp='$b'"; 
        $comp=0; 
        $sq = $db->query($sql); 
        $rows= $sq->fetchAll();
        foreach ($rows as $row) { 
          $comp=1; 
          $id=$row["id_administrativo"];
          $nombre=$row["Nombre"]; 
          $matricula=$row["curp"];  
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