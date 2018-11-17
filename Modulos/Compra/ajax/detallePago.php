<input type="hidden" name="idCompra" id="idCompra" value="<?php echo $_REQUEST['idd'];?>"/>
<?php
include '../../../Config/conexion.php';
    $idCompra=$_REQUEST['idd'];
    pg_query("BEGIN");
    $resultado=pg_query($conexion, "SELECT compra.ecuotas, compra.eperiodo, compra.rabono,compra.rtotal_compra FROM compra  where compra.eid_compra=$idCompra");
    $nue=pg_num_rows($resultado);
    if($nue>0){
    while ($fila = pg_fetch_array($resultado)) {
        echo '<div class="text-center infoCompleto"><strong><h5><i class="fa fa-info-circle"></i> Detalle Credito</strong></h5></div>';
        ?>
        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
        <label class="control-label col-md-5 col-sm-5 col-xs-12">Cuotas: </label>
        <label class="control-label col-md-7 col-sm-7 col-xs-12"><?php echo $fila[0];?></label>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
        <label class="control-label col-md-5 col-sm-5 col-xs-12">Periodo: </label>
        <label class="control-label col-md-7 col-sm-7 col-xs-12"><?php echo $fila[1];?> (dias)</label>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
        <label class="control-label col-md-5 col-sm-5 col-xs-12">Abonado: </label>
        <label class="control-label col-md-7 col-sm-7 col-xs-12">$ <?php echo $fila[2];?></label>
        </div> 
        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback text-center">
        <label class="control-label col-md-7 col-sm-7 col-xs-12 text-right">Saldo pendiente: </label>
        <label class="control-label col-md-5 col-sm-5 col-xs-12 text-left">$ <?php echo $fila[3]-$fila[2];?></label>
        <input type="hidden" name="idCompra" id="saldoPendiente" value="<?php echo $fila[3]-$fila[2] ?>" />
        </div><br><br>
        <?php
        }
    }
?>
<div class="item form-group">
    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
        <label class="control-label col-md-12 col-sm-12 col-xs-12"> Saldo a abonar* </label>
    </div>
    <div class="col-md-8 col-sm-12 col-xs-12 form-group has-feedback">
        <div class="col-md-12 col-sm-9 col-xs-12">
            <input type="number" class="form-control has-feedback-left" id="abono" class="form-control col-md-7 col-xs-12" name="abono" autocomplete="off" min="0" onkeypress="return soloNumeros(event,'punto')" onkeyup="return saldoRestante();"> <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span> </div>
    </div>
</div>
                   
                   <br><br>
<div class="item form-group">
    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
        <label class="control-label col-md-12 col-sm-12 col-xs-12"> Saldo Restante </label>
    </div>
    <div class="col-md-8 col-sm-12 col-xs-12 form-group has-feedback">
        <div class="col-md-12 col-sm-9 col-xs-12">
            <input type="text" class="form-control has-feedback-left" id="abonoRestante" class="form-control col-md-7 col-xs-12" name="abonoRestante" disabled> <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span> </div>
    </div>
</div>      
                   
                    
                   
                  
                 
                <br><br><br><br><br><br><br><br><br><br>