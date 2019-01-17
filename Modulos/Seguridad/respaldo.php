<?php

include("../../Config/conexion.php");
// scrypt for backup and restore postgres database


function dl_file($file){
   if (!is_file($file)) { die("<b>404 File not found!</b>"); }
   $len = filesize($file);
   $filename = basename($file);
   $file_extension = strtolower(substr(strrchr($filename,"."),1));
   $ctype="application/force-download";
   header("Pragma: public");
   header("Expires: 0");
   header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
   header("Cache-Control: public");
   header("Content-Description: File Transfer");
   header("Content-Type: $ctype");
   $header="Content-Disposition: attachment; filename=".$filename.";";
   header($header );
   header("Content-Transfer-Encoding: binary");
   header("Content-Length: ".$len);
   @readfile($file);
   exit;
}



$action  = $_POST["bandera"];
$ficheiro=$_FILES["path"]["name"];
switch ($action) {
    case "Importar Respaldo":
      $dbname = "SiceoDBXP"; //database name
      $dbconn = pg_pconnect("host=localhost port=5432 dbname=$dbname
user=postgres password=root"); //connectionstring
      if (!$dbconn) {
        echo "Can't connect.\n";
        exit;
      }
      $back = fopen($ficheiro,"r");
      $contents = fread($back, filesize($ficheiro));
      $res = pg_query(utf8_encode($contents));
     // echo "Upload Ok";

   echo "<script language='javascript'>";

  //  echo "alertaExito();";////////////////////////////////////////////////////aqui
    echo "alertaExito();";
   // echo "alert('base restaurada')";
    echo "</script>";
      fclose($back);
  break;
  case "Exportar Respaldo":
  $dbname = "SiceoDBXP"; //database name
  $dbconn = pg_pconnect("host=localhost port=5432 dbname=$dbname
user=postgres password=root"); //connectionstring
  if (!$dbconn) {
    echo "Can't connect.\n";
  exit;
  }
  $back = fopen("$dbname.sql","w");
  $res = pg_query(" select relname as tablename
                    from pg_class where relkind in ('r')
                    and relname not like 'pg_%' and relname not like
'sql_%' order by tablename");

 $res9 = pg_query(" select relname as tablename
                    from pg_class where relkind in ('r')
                    and relname not like 'pg_%' and relname not like
'sql_%' order by tablename");

  $str="";
  while($row = pg_fetch_row($res))
  {
    $table = $row[0];
    $str .= "\n--\n";
    $str .= "-- Estrutura da tabela '$table'";
    $str .= "\n--\n";
    $str .= "\nTRUNCATE $table CASCADE;";
  //  $str .= "\nCREATE TABLE $table (";

 //$res2 =pg_query("");
 /*   $res2 = pg_query("
    SELECT  attnum,attname , typname , atttypmod-4 , attnotnull
,atthasdef ,adsrc AS def
    FROM pg_attribute, pg_class, pg_type, pg_attrdef WHERE
pg_class.oid=attrelid
    AND pg_type.oid=atttypid AND attnum>0 AND pg_class.oid=adrelid AND
adnum=attnum
    AND atthasdef='t' AND lower(relname)='$table' UNION
    SELECT attnum,attname , typname , atttypmod-4 , attnotnull ,
atthasdef ,'' AS def
    FROM pg_attribute, pg_class, pg_type WHERE pg_class.oid=attrelid
    AND pg_type.oid=atttypid AND attnum>0 AND atthasdef='f' AND
lower(relname)='$table' ");        */


/* while($r = pg_fetch_row($res2
    {
    $str .= "\n" . $r[1]. " " . $r[2];
     if ($r[2]=="varchar")
    {
    $str .= "(".$r[3] .")";
    }
    if ($r[4]=="t")
    {
    $str .= " NOT NULL";
    }
    if ($r[5]=="t")
    {
    $str .= " DEFAULT ".$r[6];
    }
    $str .= ",";
    }

  */
 //   $str=rtrim($str, ",");
 //   $str .= "\n);\n";
 //   $str .= "\n--\n";
 //   $str .= "-- Creating data for '$table'";
 //   $str .= "\n--\n\n";


 /*   $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;
      $str .= "\n";
    }
  */
    ///////////////////////////////

     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
  /*  $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " .
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n"; */
    }
  }
  //////////////////////////////////////////////////
   while($row9 = pg_fetch_row($res9))
  {
    $table = $row9[0];
    $str .= "\n--\n";
    $str .= "-- Estrutura da tabela '$table'";
    $str .= "\n--\n";
 //   $str .= "\nTRUNCATE $table CASCADE;";
  //  $str .= "\nCREATE TABLE $table (";

 //$res2 =pg_query("");
 /*   $res2 = pg_query("
    SELECT  attnum,attname , typname , atttypmod-4 , attnotnull
,atthasdef ,adsrc AS def
    FROM pg_attribute, pg_class, pg_type, pg_attrdef WHERE
pg_class.oid=attrelid
    AND pg_type.oid=atttypid AND attnum>0 AND pg_class.oid=adrelid AND
adnum=attnum
    AND atthasdef='t' AND lower(relname)='$table' UNION
    SELECT attnum,attname , typname , atttypmod-4 , attnotnull ,
atthasdef ,'' AS def
    FROM pg_attribute, pg_class, pg_type WHERE pg_class.oid=attrelid
    AND pg_type.oid=atttypid AND attnum>0 AND atthasdef='f' AND
lower(relname)='$table' ");        */


/* while($r = pg_fetch_row($res2
    {
    $str .= "\n" . $r[1]. " " . $r[2];
     if ($r[2]=="varchar")
    {
    $str .= "(".$r[3] .")";
    }
    if ($r[4]=="t")
    {
    $str .= " NOT NULL";
    }
    if ($r[5]=="t")
    {
    $str .= " DEFAULT ".$r[6];
    }
    $str .= ",";
    }

  */
 //   $str=rtrim($str, ",");
 //   $str .= "\n);\n";
 //   $str .= "\n--\n";
 //   $str .= "-- Creating data for '$table'";
 //   $str .= "\n--\n\n";


    $res3 = pg_query("SELECT * FROM $table");
    while($r = pg_fetch_row($res3))
    {
      $sql = "INSERT INTO $table VALUES ('";
      $sql .= utf8_decode(implode("','",$r));
      $sql .= "');";
      $str = str_replace("''","NULL",$str);
      $str .= $sql;
      $str .= "\n";
    }
    ///////////////////////////////

     $res1 = pg_query("SELECT pg_index.indisprimary,
            pg_catalog.pg_get_indexdef(pg_index.indexrelid)
        FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
            pg_catalog.pg_index AS pg_index
        WHERE c.relname = '$table'
            AND c.oid = pg_index.indrelid
            AND pg_index.indexrelid = c2.oid
            AND pg_index.indisprimary");
    while($r = pg_fetch_row($res1))
    {
    $str .= "\n\n--\n";
    $str .= "-- Creating index for '$table'";
    $str .= "\n--\n\n";
    $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
    $t = str_replace("USING btree", "|", $t);
    // Next Line Can be improved!!!
    $t = str_replace("ON", "|", $t);
    $Temparray = explode("|", $t);
  /*  $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " .
$Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n"; */
    }
  }



  $res = pg_query(" SELECT
  cl.relname AS tabela,ct.conname,
   pg_get_constraintdef(ct.oid)
   FROM pg_catalog.pg_attribute a
   JOIN pg_catalog.pg_class cl ON (a.attrelid = cl.oid AND cl.relkind = 'r')
   JOIN pg_catalog.pg_namespace n ON (n.oid = cl.relnamespace)
   JOIN pg_catalog.pg_constraint ct ON (a.attrelid = ct.conrelid AND
   ct.confrelid != 0 AND ct.conkey[1] = a.attnum)
   JOIN pg_catalog.pg_class clf ON (ct.confrelid = clf.oid AND
clf.relkind = 'r')
   JOIN pg_catalog.pg_namespace nf ON (nf.oid = clf.relnamespace)
   JOIN pg_catalog.pg_attribute af ON (af.attrelid = ct.confrelid AND
   af.attnum = ct.confkey[1]) order by cl.relname ");

  /*
  while($row = pg_fetch_row($res))
  {
    $str .= "\n\n--\n";
    $str .= "-- Creating relacionships for '".$row[0]."'";
    $str .= "\n--\n\n";
    $str .= "ALTER TABLE ONLY ".$row[0] . " ADD CONSTRAINT " . $row[1] .
" " . $row[2] . ";";
  }
*/

///////////////////////////////

  fwrite($back,$str);
  fclose($back);
  dl_file("$dbname.sql");
  break;
}

?>


























<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../../images/title.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SICEO | BACK UP </title>

    <?php
      include "../../ComponentesForm/estilos.php";
    ?>
    <script language="javascript">
         
            function alertaError(titulo, texto, tipo) {
                sweetAlert(titulo, texto, tipo);
            }
            function alertaExito(titulo, texto, tipo) {
                swal('Informacion', 'Restauracion Exitosa', 'success');


            }




        </script>

        <script>  
  
  
function validar(){
  
   var fileInput = document.getElementById('path');
      var filePath = fileInput.value;
      var allowedExtensions = /(.sql)$/i;
  
  if(document.contact.path.value=='' ){
    
    
}else{

    if(!allowedExtensions.exec(filePath)){
      
    //  alert('error, tipo de archivo invalido, solo archivos .sql');
    
     fileInput.value = '';
        return false;
    
    }else{      
        //para validar que haya un archivo
      
            document.getElementById('bandera').value="Importar Respaldo";
          
    document.contact.submit();
    alertaExito();
    }
    
    
    }
}
  
  
function exportar(){
        
document.getElementById('bandera').value="Exportar Respaldo";
    document.contact.submit();
} 
  
  </script>

  </head>

  <body class="nav-md">
        <!--Aqui va inicio la barra arriba-->
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        
                        <div class="clearfix">
                        </div>

                        <?php
                        include "../../ComponentesForm/menu.php";
                        ?>
                        
                    </div>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                 <div >
                     <img  align="left" src="../../images/backup.png" width="120" height="120">
                        <h1 class="col-xs-12 col-sm-8 col-md-10" align="center">
                          Respaldo De Informacion
                        </h1>
                      </img>
                  </div>
                  <div align="center">
                      <h4 style="font-size: medium;" class="col-xs-12 col-sm-8 col-md-10 " >
                        Bienvenido en esta sección puede hacer un respaldo de toda la informacion en el sistema y tambien restaurarla.
                        
                      </h4>
                  </div>
                  
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="" data-example-id="togglable-tabs" role="tabpanel">
                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                       
                        
                    </ul>
                    <!-- Formulario para registar cliente -->
                 <div class="tab-content" id="myTabContent">
                    <div aria-labelledby="home-tab" class="tab-pane fade active in" id="tab_content1" role="tabpanel">
                      <div class="x_content">
                        
                         <div class="x_content">
                            <form id="contact" name="contact" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                              <input type="hidden" id="bandera" name="bandera">
                             
                              

                              <div class="form-group " style="margin-top:20px !important;">
                                <input type="file" name="path" id="path" style="width:400px" class="btn btn-primary" />
                              </div>

                            <div class="form-group " style="margin-top:20px !important;">
                              <input type="button"  value="Importar Respaldo" class="btn btn-success" name="actionButton" id="actionButton"  onclick="validar()"> 
                              <input type="button"  value="Exportar Respaldo" class="btn btn-info" name="actionButton" id="actionButton" onclick="exportar()">
                            </div>

                            <div class="form-group " style="margin-top:20px !important;">
                              
                            </div>

                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                    
                </div>  
              </div>
            </div>
          </div>

        </div>                
      </div>
    </div>
  </div>
</div>
</div>
        
        <!-- /page content -->
     
        
        <footer>
            <?php
              include "../../ComponentesForm/footer.php";
             ?>
        </footer>
      </div>
                <!--Aqui va fin el contenido-->
     </div>
  </div>

        <?php
          include "../../ComponentesForm/scripts.php";
        ?>
        
    </body>
</html>