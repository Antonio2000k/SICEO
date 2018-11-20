<table id="datatable-fixed-header" class="table table-striped table-bordered tblDatos">
    <thead>
        <tr class="text-center">
          <th hidden>Numero Mes</th>
           <th>Mes</th>
            <th>Egreso Neto</th>
            <th>Egreso Total</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $array = array (0=>'Enero',1=>'Febrero',2=>'Marzo',3=>'Abril',4=>'Mayo',5=>'Junio',6=>'Julio',7=>'Agosto',8=>'Septiembre',9=>'Octubre',10=>'Noviembre',11=>'Diciembre');
        include("../../../Config/conexion.php");
        //echo '<label>'.$conexion.'</label>';
        $tipo=$_REQUEST['tipo'];
        $year=$_REQUEST['year'];
        pg_query("BEGIN");
        for($i=1 ; $i<=12 ; $i++){
            if($i<10)
                $mes='0'.$i;
            else
                $mes=$i;
        $consulta="select sum(c.rabono), sum(rtotal_compra) from compra as c where TO_CHAR(c.ffecha_compra,'YYYY-MM')='".$year."-".$mes."'";
        $resultado=pg_fetch_array(pg_query($conexion,$consulta));
        ?>
            <tr class="text-center">
                <td hidden><?php echo $i;?></td>
                <th><?php  echo $array[($i-1)];?></th>
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
                <td class="text-center"><button class="btn btn-success btn-icon left-icon" data-toggle="modal" data-target="#modalDetalleCompra" onclick="verMas('', '<?php echo $i; ?>','egreso')"> <i class="fa fa-list-ul"></i></button></td>              
            </tr>
            <?php } ?>
    </tbody>
</table>
