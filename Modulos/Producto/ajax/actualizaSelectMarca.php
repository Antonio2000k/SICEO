<?php
    include '../../../Config/conexion.php';
   // echo '<input type="text" name="esta" value="'.$cambio.'">';
        ?>
        <option value="0">Seleccione</option>
        <?php       
        pg_query("BEGIN");
        $resultado=pg_query($conexion, "select * from pamarca");
        $nue=pg_num_rows($resultado);
            if($nue>0){
            while ($fila = pg_fetch_array($resultado)) {
            if($fila[0]==$marca){
        ?>
            <option selected="" value="<?php echo $fila[0]?>">
                <?php echo $fila[1]?>
            </option>
            <?php }else{ ?>
                <option value="<?php echo $fila[0]?>">
                    <?php echo $fila[1]?>
                </option>
                <?php }}} ?>
