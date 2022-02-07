<?php 
  require("../../includes/conexioncon.php");
  $id_historia= $_POST["id_historia"];
  $ser_m= $_POST["ser_m"];
  $hosp= $_POST["hos"];
  $f_motiv= $_POST["f_motiv"];
  $estado_m= $_POST["estado_m"];


  $consulta_hm = mysqli_query($con,"UPDATE historias_medicas SET servicio_medico='$ser_m',hospitalizacion='$hosp',fecha_motivo_hosp='$f_motiv',estado='$estado_m' WHERE id_historia_medica='$id_historia'");

  $id_pat = $_POST["id_pat"];
  $hipertension = $_POST["hipertension"];
  $cardiacas = $_POST["cardiacas"];
  $respiratorias = $_POST["respiratorias"];
  $tiroides = $_POST["tiroides"];
  $diabetes = $_POST["diabetes"];
  $digestivas = $_POST["digestivas"];
  $piel = $_POST["piel_pat"];
  $oni = $_POST["oni"];
  $convulsiones = $_POST["convulsiones"];
  $transf = $_POST["transf"];
  $renal = $_POST["renal"];

  $consulta_pa = mysqli_query($con,"UPDATE antecedentes_patologicos SET hipertension='$hipertension',cardiacas='$cardiacas',respiratorias='$respiratorias',tiroides='$tiroides',diabetes='$diabetes',digestivas='$digestivas',piel='$piel',onicomicosis='$oni',convulsiones='$convulsiones',transfusiones='$transf',renales='$renal' WHERE id_pat='$id_pat'");

  $id_nopat = $_POST["id_nopat"];
  $alcoholismo = $_POST["alcoholismo"];
  $tabaquismo = $_POST["tabaquismo"];
  $alergias = $_POST["alergias"];
  $toxi = $_POST["toxi"];
  $res_med = $_POST["res_med"];
  $especificacion = $_POST["especificacion"];
  $cicatrices = $_POST["cicatrices"];
  $tatuajes = $_POST["tatuajes"];
  $amputaciones = $_POST["amputaciones"];

  $consulta_np = mysqli_query($con,"UPDATE antecedentes_nopatologicos SET alcoholismo='$alcoholismo',tabaquismo='$tabaquismo',alergias='$alergias',toxicomanias='$toxi',medicamentos='$res_med',especificacion='$especificacion',cicatrices='$cicatrices',tatuajes='$tatuajes',amputaciones='$amputaciones' WHERE id_nopat='$id_nopat'");

  $id_gin = $_POST["id_gin"];
  $embarazos = $_POST["embarazos"];
  $partos = $_POST["partos"];
  $cesarias = $_POST["cesarias"];
  $abortos = $_POST["abortos"];
  $fum = $_POST["fum"];
  $salpi = $_POST["salpi"];
  $hister = $_POST["hister"];
  $quistes = $_POST["quistes"];
  $Hemorr = $_POST["hemorr"];
  $obs_gin = $_POST["obs_gin"];

  $consulta_gn = mysqli_query($con,"UPDATE antecedentes_ginecologicos SET embarazos='$embarazos',partos='$partos',cesareas='$cesarias',abortos='$abortos',fum='$fum',salpingoclasia='$salpi',histerectomia='$hister',quistes='$quistes',hemorragias='$Hemorr',observaciones='$obs_gin' WHERE id_ant_gin='$id_gin'");

  $id_les = $_POST["id_les"];
  $esg_c = $_POST["esg_c"];
  $esg_t = $_POST["esg_t"];
  $esg_r = $_POST["esg_r"];
  $lux_h = $_POST["lux_h"];
  $lux_r = $_POST["lux_r"];
  $lumb = $_POST["lumb"];
  $fract = $_POST["fract"];
  $hernia = $_POST["hernia"];
  $otras_ales = $_POST["otras_ales"];
  $obs_gin = $_POST["obs_gin"];

  $consulta_al = mysqli_query($con,"UPDATE antecedentes_lesiones SET esg_cervical='$esg_c',esg_tobillo='$esg_t',esg_rodilla='$esg_r',lux_rodilla='$lux_r',fracturas='$fract',hernia='$hernia',otras='$otras_ales',lux_hombro='$lux_h',lumbalgias='$lumb' WHERE id_ant_les='$id_les'");

  $id_examenm = $_POST["id_examenm"];
  $p_art = $_POST["p_art"];
  $f_card = $_POST["f_card"];
  $f_resp = $_POST["f_resp"];
  $temp = $_POST["temp"];
  $sat = $_POST["sat"];
  $a_der = $_POST["a_der"];
  $a_izq = $_POST["a_izq"];
  $gluc = $_POST["gluc"];
  $v_der = $_POST["v_der"];
  $v_izq = $_POST["v_izq"];
  $pter = $_POST["pter"];
  $lentes = $_POST["lentes"];
  $talla = $_POST["talla"];
  $p_cor = $_POST["p_cor"];
  $imc = $_POST["imc_exm"];
  $clas = $_POST["clas"];
  $car_pul = $_POST["car-pul"];
  $fract = $_POST["fract"];
  $mus_esq = $_POST["mus-esq"];
  $piel_exmn = $_POST["piel_exmn"];
  $v_perif = $_POST["v_perif"];
  $digest = $_POST["digest"];
  $nerv = $_POST["nerv"];
  $urinario = $_POST["urinario"];
  $reproductor=$_POST["reproductor"];
  $exm = $_POST["obs-exm"];

  $consulta_pa = mysqli_query($con,"    UPDATE examen_medico SET presion_arterial='$p_art',f_cardiaca='$f_card',f_respiratoria='$f_resp',temp='$temp',sat='$sat',auditivo_d='$a_der',auditivo_i='$a_izq',gluc='$gluc',visual_d='$v_der',visual_i='$v_izq',pterigion='$pter',lentes='$lentes',talla='$talla',peso='$p_cor',imc='$imc',clasificacion='$clas',cardiopulmonar='$car_pul',musculoesqueletico='$mus_esq',piel_exmn='$piel_exmn',vascular_p='$v_perif',digestivo='$digest',nervioso='$nerv',urinario='$urinario',reproductor='$reproductor',observaciones='$exm' WHERE id_examenm='$id_examenm'");


    
  
     if (!$consulta_hm && !$consulta_pa && !$consulta_np && !$consulta_gn && !$consulta_al && !$consulta_pa){
        echo "error".mysql_error($consulta);
    }else{
        echo"1";
          }
 ?>