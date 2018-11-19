<table id="datatable-fixed-header" class="table table-striped table-bordered tblDatos">
    <thead>
        <tr>
            <th>N°</th>
            <th>Empleado</th>
            <th>Fecha</th>
            <th>Total Compra</th>
            <th>Ver Mas</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include("../../../Config/conexion.php");
        $query_s= pg_query($conexion, "select * from empleados");
        while($fila=pg_fetch_array($query_s)){
        ?>
                    <tr>
                <td>
                    <?php echo $fila[0]; ?>
                </td>
                <td>
                    <?php echo $fila[1]; ?>
                </td>
                <td>
                    <?php echo date("d/m/Y", strtotime($fila[2])); ?>
                </td>
                <td>$
                    <?php echo $fila[3]; ?>
                </td>
                <td class="text-center">
                    <button class="btn btn-success btn-icon left-icon" data-toggle="modal" data-target="#modalDetalleCompra" onclick="verMas('', '<?php echo $fila[0]; ?>','credito')"> <i class="fa fa-list-ul"></i></button>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>