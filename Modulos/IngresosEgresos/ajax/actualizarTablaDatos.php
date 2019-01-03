<table id="datatable-fixed-header" class="table table-striped table-bordered tblDatos">
   <?php 
        include("../../../Config/conexion.php");
       //echo '<label>'.$tipo.'</label>';
        $tipo=$_REQUEST['tipo'];
        $year=$_REQUEST['year'];
        $rango=$_REQUEST['rango'];
        $mes=$_REQUEST['mes'];
    if($rango==="anual"){
    ?>   
    <thead>
        <tr class="text-center">
          <th hidden>Numero Mes</th>
           <th>Mes</th>
            <th><?php if($tipo==="egreso"){ ?> Egreso Neto<?php }else if($tipo==="ingreso"){ ?>Ingreso Neto <?php } ?> </th>
            <th><?php if($tipo==="egreso"){ ?> Egreso Total<?php }else if($tipo==="ingreso"){ ?>Ingreso Total <?php } ?> </th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php        
        pg_query("BEGIN");
        for($i=1 ; $i<=12 ; $i++){
            if($i<10)
                $mes='0'.$i;
            else
                $mes=$i;
        if($tipo==="egreso")
            $consulta="select sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-".$mes."'";
        else if($tipo==="ingreso")
            $consulta="SELECT sum(notab.rsaldo),sum(o.rtotal) from ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM') ='".$year."-".$mes."'";
        $resultado=pg_fetch_array(pg_query($conexion,$consulta));
        ?>
            <tr class="text-center">
                <td hidden><?php echo $i;?></td>
                <th><?php  echo ucwords(nombremes($i));?></th>
                <td><?php if($resultado[0]===null)
                                echo '$0.00';
                            else
                               echo '$'.$resultado[0];        
                    ?>
                </td>
               <td><?php if($resultado[1]===null)
                                echo '$ 0.00';
                            else
                                echo '$'.$resultado[1];        
                    ?>
                </td>
                <?php if($resultado[1]===null){
                echo '<td class="text-center"><button class="btn btn-success btn-icon left-icon" disabled> <i class="fa fa-list-ul"></i></button></td>';
                    }
                  else{
                ?>
                <td class="text-center"><button class="btn btn-success btn-icon left-icon" data-toggle="modal" data-target="#modalDetalleCompra" onclick="verMas('','<?php echo $i;?>','<?php echo $tipo; ?>','anual','')"> <i class="fa fa-list-ul"></i></button></td>
               <?php } ?>                          
            </tr>
            <?php } ?>
    </tbody>
    <?php
    } if($rango==='mensual'){
    ?>
    <thead>
        <tr class="text-center">
           <th>Fecha</th>
            <th><?php if($tipo==="egreso"){ ?> Egreso Neto<?php }else if($tipo==="ingreso"){ ?>Ingreso Neto <?php } ?> </th>
            <th><?php if($tipo==="egreso"){ ?> Egreso Total<?php }else if($tipo==="ingreso"){ ?>Ingreso Total <?php } ?> </th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php        
        pg_query("BEGIN");
        $numero = cal_days_in_month(CAL_GREGORIAN, $mes, $year); // 31
        //echo '<label>'.$conexion.'</label>';
        //echo '<label>'.$numero.'</label>';
        if($mes<=9)
            $mes='0'.$mes;
        for($i=1 ; $i<=$numero ; $i++){
            if($i<10)
                $dia='0'.$i;
            else
                $dia=$i;
        if($tipo==="egreso")
            $consulta="select sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM-DD')='".$year."-".$mes."-".$dia."'";
        if($tipo==="ingreso")
            $consulta="SELECT  sum(notab.rsaldo),sum(o.rtotal) from ordenc as o INNER JOIN notab ON notab.eid_ordenc = o.eid_compra WHERE TO_CHAR(o.ffecha,'YYYY-MM-DD') ='".$year."-".$mes."-".$dia."'";
        $resultado=pg_fetch_array(pg_query($conexion,$consulta));
        ?>
            <tr class="text-center">
                <th><?php  echo $dia.'/'.$mes.'/'.$year; ?></th>
                <td><?php if($resultado[0]===null)
                                echo '$ 0.00';
                            else
                               echo '$'.$resultado[0];        
                    ?>
                </td>
               <td><?php if($resultado[1]===null)
                                echo '$ 0.00';
                            else
                                echo '$'.$resultado[1];        
                    ?>
                </td>
                <?php if($resultado[1]===null){
                echo '<td class="text-center"><button class="btn btn-success btn-icon left-icon" disabled> <i class="fa fa-list-ul"></i></button></td>';
                    }
                  else{
                ?>
                <td class="text-center"><button class="btn btn-success btn-icon left-icon" data-toggle="modal" data-target="#modalDetalleCompra" onclick="verMas('','<?php echo $mes; ?>','<?php echo $tipo; ?>','mensual','<?php echo $dia; ?>')"> <i class="fa fa-list-ul"></i></button></td>
               <?php } ?>                          
            </tr>
            <?php } ?>
    </tbody>
    <?php } ?>
    
</table>
<?php
    function nombremes($mes){
        setlocale(LC_TIME, 'spanish');  
        $nombre=strftime("%B",mktime(0, 0, 0, $mes, 1, 2000)); 
        return $nombre;
    } 
?>
