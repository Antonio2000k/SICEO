                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap tablaDetalle text-center" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                            <th>Abono</th>
                            <th>Total</th>
                            <th>Fecha</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                        include '../../../Config/conexion.php';
                        $mes=$_REQUEST["mes"];
                        $year=$_REQUEST["year"];
                        $tipo=$_REQUEST["tipo"];
                        $rango=$_REQUEST['rango'];
                        $tiempo=$_REQUEST['tiempo'];
                             pg_query("BEGIN");
                        
                        if($tipo==="egreso"){
                            if($rango==='anual'){
                                if($mes<10)
                                    $mes='0'.$mes;
                                $consulta="select sum(c.rabono), sum(rtotal_compra) from pbcompra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-".$mes."'";
                            }
                            if($rango==='mensual')
                                $consulta="select sum(c.rabono), sum(rtotal_compra) from pbcompra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM-DD')='".$year."-".$mes."-".$tiempo."'";
                        }
                        if($tipo==="ingreso"){
                            if($rango==='anual'){
                                if($mes<10)
                                    $mes='0'.$mes;
                                $consulta="SELECT sum(notab.rsaldo),sum(o.rtotal) from pbordenc as o INNER JOIN pcnotab as notab ON notab.eid_ordenc = o.eid_compra where TO_CHAR(o.ffecha,'YYYY-MM')='".$year."-".$mes."'";
                            }
                            if($rango==='mensual')
                                $consulta="SELECT  sum(notab.rsaldo),sum(o.rtotal) from pbordenc as o INNER JOIN pcnotab as notab ON notab.eid_ordenc = o.eid_compra where TO_CHAR(o.ffecha,'YYYY-MM-DD')='".$year."-".$mes."-".$tiempo."'";
                        }
                            //echo '<label>'.$consulta.'</label>';
                            $resultado=pg_query($conexion,$consulta);
                            $nue=pg_num_rows($resultado);
                            if($nue>0){
                            while ($fila = pg_fetch_array($resultado)) {
                                ?>
						  		<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback  text-center">
									<h5><?php echo ucwords(convertirMes($mes))." ".$year;?></h5>
						  		</div>
                                <div align='center'>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label class="control-label"><?php if($tipo==="egreso"){ ?> Egresos Netos:<?php }else if($tipo==="ingreso"){ ?>Ingresos Netos: <?php } ?> </label>
                                    <label class="control-label">    $<?php echo $fila[0];?></label>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <label class="control-label"><?php if($tipo==="egreso"){ ?> Egresos Totales:<?php }else if($tipo==="ingreso"){ ?>Ingresos Totales: <?php } ?> </label>
                                    <label class="control-label">    $<?php echo $fila[1];?></label>
                                    </div><br><br>
                                </div>
                                <?php
                                echo '<br><br><div class="text-center infoCompleto"><strong><h5><i class="fa fa-info-circle"></i> Detalle </strong></h5></div><br>';
                                }
                            }
                        
                        pg_query("BEGIN");
                        if($tipo==="egreso"){
                            if($rango==='anual')
                            $consulta="select sum(c.rabono), c.ffecha_compra, sum(rtotal_compra) from pbcompra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-".$mes."' GROUP BY c.ffecha_compra order by c.ffecha_compra";
                            if($rango==="mensual")
                            $consulta="select c.rabono, c.ffecha_compra, rtotal_compra from pbcompra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM-DD')='".$year."-".$mes."-".$tiempo."' order by c.ffecha_compra";
                        }
                        if($tipo==="ingreso"){
                            if($rango==='anual'){
                                $consulta="SELECT  sum(notab.rsaldo), o.ffecha, sum(o.rtotal) from pbordenc as o INNER JOIN pcnotab as notab ON notab.eid_ordenc = o.eid_compra where TO_CHAR(o.ffecha,'YYYY-MM')='".$year."-".$mes."' group by o.ffecha order by o.ffecha";
                            }
                            if($rango==='mensual')
                                $consulta="SELECT notab.rsaldo, o.ffecha, o.rtotal from pbordenc as o INNER JOIN pcnotab as notab ON notab.eid_ordenc = o.eid_compra where TO_CHAR(o.ffecha,'YYYY-MM-DD')='".$year."-".$mes."-".$tiempo."' order by o.ffecha";
                        }
                        $resultado=pg_query($conexion,$consulta);
                        $nue=pg_num_rows($resultado);
                        if($nue>0){
                        while ($fila = pg_fetch_array($resultado)) {
                                echo '<tr>';
                                echo '<td>$'.$fila[0].'</td>';
                                echo '<td>$'.$fila[2].'</td>';
                                echo '<td>'.date("d/m/Y", strtotime($fila[1])).'</td>';
                                echo '</tr>';
                            }
                        }
                      ?>
                        </tbody>
                    </table>
<?php 

function convertirMes($numero){
	 setlocale(LC_TIME, 'spanish');  
 	$nombre=strftime("%B",mktime(0, 0, 0, $numero, 1, 2000)); 
 	return $nombre;
}

?>
