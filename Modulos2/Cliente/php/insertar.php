
<?php
require_once "../../../Config/conexion.php";
function cortar2($palabra){
    $parte = explode(" ",$palabra); 

    return $parte[0];
      }
if(isset($_REQUEST["bandera"])){
$baccion=$_REQUEST["baccion"];
$bandera=$_REQUEST["bandera"];
$idexpediente= cortar2($_REQUEST["idexpediente"]);
$fechaA= date("d-m-Y"); 

//datos de antecedentes medicos
$antmcdm = $_REQUEST["dm"];
$antmcha = $_REQUEST["ha"];
$antmccyte =$_REQUEST["cyt"];
$antmtiroides =$_REQUEST["tiroides"];
$antmcotros =$_REQUEST["otros"];

//datos de antecedentes oculares
$antoglaucomap = $_REQUEST["glaucomap"];
$antoglaucomaf = $_REQUEST["glaucomaf"];
$antocataratap =$_REQUEST["cataratap"];
$antocatarataf =$_REQUEST["catarataf"];
$antocdoctor =$_REQUEST["drp"];
$antocotro = $_REQUEST["otro"];
$antooperad = $_REQUEST["op"];

//datos de lensometria
$lesfojoderecho = floatval($_REQUEST["esflend"]);
$lesfojoizquierdo = floatval($_REQUEST["esfleni"]);
$lcilojoderecho = floatval($_REQUEST["cillend"]);
$lcilojoizquierdo = floatval($_REQUEST["cilleni"]);
$lejeojoderecho = floatval($_REQUEST["ejelend"]);
$lejeojoizquierdo = floatval($_REQUEST["ejeleni"]);
$ladicojoderecho = floatval($_REQUEST["adiccionlend"]);
$ladicojoizquierdo = floatval($_REQUEST["adiccionleni"]);
$lprisojoderecho = floatval($_REQUEST["prismalend"]);
$lprisojodizquierdo = floatval($_REQUEST["prismaleni"]);
$lcbojoderecho = floatval($_REQUEST["cblend"]);
$lcbojoizquierdo = floatval($_REQUEST["cbleni"]);
$lavlejojoderecho = floatval($_REQUEST["avlejlend"]);
$lavlejojoizquierdo = floatval($_REQUEST["avlejleni"]);
$lavcerojoderecho = floatval($_REQUEST["avcelend"]);
$lavcerojoizquierdo = floatval($_REQUEST["avceleni"]);
$ldescripcion = $_REQUEST["descriplenso"];

//datos de refraccion
$ravsclojoderecho = floatval($_REQUEST["avsclred"]);
$ravsclojoizquierdo = floatval($_REQUEST["avsclrei"]);
$ravsccojoderecho = floatval($_REQUEST["avsccred"]);
$ravsccojoizquierdo = floatval($_REQUEST["avsccrei"]);

$resfojoderecho = floatval($_REQUEST["esfred"]);
$resfojoizquierdo = floatval($_REQUEST["esfrei"]);
$rcilojoderecho = floatval($_REQUEST["cilred"]);
$rcilojoizquierdo = floatval($_REQUEST["cilrei"]);
$rejeojoderecho = floatval($_REQUEST["ejered"]);
$rejeojoizquierdo = floatval($_REQUEST["ejerei"]);
$radicojoderecho = floatval($_REQUEST["adiccionred"]);
$radicojoizquierdo = floatval($_REQUEST["adiccionrei"]);
$rprisojoderecho = floatval($_REQUEST["prismared"]);
$rprisojodizquierdo = floatval($_REQUEST["prismarei"]);
$rcbojoderecho = floatval($_REQUEST["cbred"]);
$rcbojoizquierdo = floatval($_REQUEST["cbrei"]);
$ravlejojoderecho = floatval($_REQUEST["avlejred"]);
$ravlejojoizquierdo = floatval($_REQUEST["avlejrei"]);
$ravcerojoderecho = floatval($_REQUEST["avcered"]);
$ravcerojoizquierdo = floatval($_REQUEST["avcerei"]);
$rdescripcion = $_REQUEST["descriprefrac"];


//datos de medidas
$rdnpojoderecho = floatval($_REQUEST["dnpde"]);
$rdnpojoizquierdo = floatval($_REQUEST["dnpiz"]);
$rdip = floatval($_REQUEST["dip"]);
$raltpupilar = floatval($_REQUEST["altpupi"]);
$raltoblea = floatval($_REQUEST["altoblea"]);
$cexamino = cortar($_REQUEST["examino"]);
$cobservacion = $_REQUEST["observacion"];


  if($bandera=='add'){
      pg_query("BEGIN");

      $query_s1=pg_query($conexion,"select count(*) from antecedente_medico ");
        while ($fila = pg_fetch_array($query_s1)) {
            $idantm=$fila[0];                                 
            $idantm++ ;
        }

      $result1=pg_query($conexion,"INSERT INTO  antecedente_medico (eid_antecedente_medico, cdm, cha, ccyt, ctiroides, cotros)  VALUES ($idantm, '$antmcdm', '$antmcha', '$antmccyte', '$antmtiroides', '$antmcotros') ");

      $query_s2=pg_query($conexion,"select count(*) from antecedente_ocular ");
        while ($fila = pg_fetch_array($query_s2)) {
            $idanto=$fila[0];                                 
            $idanto++ ;
        }
      
      $ressult2= pg_query($conexion,"INSERT INTO antecedente_ocular (eid_antecedente_ocular, cglaucomap, cglaucomaf, ccataratap, ccatarataf, cdoctor, cotro, coperadod) VALUES ($idanto, '$antoglaucomap', '$antoglaucomaf', '$antocataratap', '$antocatarataf', '$antocdoctor', '$antocotro', '$antooperad')");

      $query_s3=pg_query($conexion,"select count(*) from lensometria ");
        while ($fila = pg_fetch_array($query_s3)) {
            $idlen=$fila[0];                                 
            $idlen++ ;
        }
      $ressult3= pg_query($conexion,"INSERT INTO lensometria (eid_lensometria, resfera_ojoderecho, 
        resfera_ojoizquierdo, rcilindro_ojoderecho, rcilindro_ojoizquierdo, reje_ojoderecho, reje_ojoizquierdo, 
        radiccion_ojoderecho, radiccion_ojoizquierdo, rprisma_ojoderecho, rprisma_ojodizquierdo, rcb_ojoderecho,
         rcb_ojoizquierdo, rav_lej_ojoderecho, rav_lej_ojoizquierdo, rav_cer_ojoderecho, rav_cer_ojoizquierdo, 
         cdescripcion)  VALUES ($idlen, $lesfojoderecho, $lesfojoizquierdo, $lcilojoderecho, $lcilojoizquierdo, 
        $lejeojoderecho, $lejeojoizquierdo, $ladicojoderecho, $ladicojoizquierdo, $lprisojoderecho, 
        $lprisojodizquierdo, $lcbojoderecho, $lcbojoizquierdo, $lavlejojoderecho, $lavlejojoizquierdo, 
        $lavcerojoderecho, $lavcerojoizquierdo, '$ldescripcion')");

      $query_s4=pg_query($conexion,"select count(*) from refraccion ");
        while ($fila = pg_fetch_array($query_s4)) {
            $idref=$fila[0];                                 
            $idref++ ;
        }
      $ressult4= pg_query($conexion,"INSERT INTO refraccion (eid_refraccion, ravscl_ojoderecho, ravscl_ojoizquierdo,
       ravscc_ojoderecho, ravscc_ojoizquierdo, resfera_ojoderecho, resfera_ojoizquierdo, rcilindro_ojoderecho,
       rcilindro_ojoizquierdo, reje_ojoderecho, reje_ojoizquierdo, radiccion_ojoderecho, radiccion_ojoizquierdo,
       rprisma_ojoderecho, rprisma_ojoizquierdo, rcb_ojoderecho, rcb_ojoizquierdo, ravlej_ojoderecho,
       ravlej_ojoizquierdo, ravcer_ojoderecho, ravcer_ojoizquierdo, cdescripcion) VALUES ($idref, $ravsclojoderecho, 
       $ravsclojoizquierdo, $ravsccojoderecho, $ravsccojoizquierdo, $resfojoderecho, $resfojoizquierdo,
       $rcilojoderecho , $rcilojoizquierdo, $rejeojoderecho, $rejeojoizquierdo, $radicojoderecho, 
       $radicojoizquierdo, $rprisojoderecho, $rprisojodizquierdo, $rcbojoderecho, $rcbojoizquierdo, $ravlejojoderecho,
        $ravlejojoizquierdo, $ravcerojoderecho, $ravcerojoizquierdo, '$rdescripcion')");

      $query_s5=pg_query($conexion,"select count(*) from medidas ");
        while ($fila = pg_fetch_array($query_s5)) {
            $idmed=$fila[0];                                 
            $idmed++ ;
        }
      $ressult5= pg_query($conexion,"INSERT INTO medidas (eid_medidas, rdnp_ojoderecho, rdnp_ojoizquierdo, rdip, ralt_pupilar, ralt_oblea, cexamino, cobservacion) VALUES ($idmed, $rdnpojoderecho, $rdnpojoizquierdo, $rdip,
       $raltpupilar, $raltoblea, '$cexamino', '$cobservacion')");
        
      $query_s6=pg_query($conexion,"select count(*) from examen ");
        while ($fila = pg_fetch_array($query_s6)) {
            $idexam=$fila[0];                                 
            $idexam++ ;
        }    
      $ressult6= pg_query($conexion,"INSERT INTO examen (eid_examen, cobservaciones, eid_antecedente_medico, eid_antecedente_ocular, eid_lensometria, eid_refraccion, eid_medidas, ffecha, cid_empleado, cid_expediente)  VALUES ($idexam, '$cobservacion', $idantm, $idanto, $idlen, $idref, $idmed, '$fechaA', '$cexamino',  '$idexpediente')");
            

              if(!$result1 || !$ressult2 || !$ressult3 || !$ressult4 || !$ressult5 || !$ressult6){
                pg_query("rollback");
                echo "<script type='text/javascript'>";
                  echo pg_result_error($conexion);
                  echo "alertaSweet('Error','Datos no almacenados', 'error');";
                   echo "no";
                  echo "document.getElementById('bandera').value='';";
                  echo "document.getElementById('baccion').value='';";
                echo "</script>";
              }else{
                pg_query("commit");
                  echo "<script type='text/javascript'>";
                      echo "alertaSweet('Informacion','Datos Almacenados', 'success');";
                    //echo "location.href=('expediente.php?id='+'".$caccion."');";
                      echo "setTimeout (function llamarPagina(){
                                        location.href=('expediente.php?id='+'".$idexpediente."');
                                     }, 2000);";
                                     echo "si";
                      echo "document.getElementById('bandera').value='';";
                      echo "document.getElementById('baccion').value='';";
                
                  echo "</script>";   
              }
        
  }
     
}


?>