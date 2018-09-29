<?php
    include '../../../Config/conexion.php';
    $opcion=$_REQUEST["opcion"];
    $cambio=$_REQUEST["cambio"];
   // echo '<input type="text" name="esta" value="'.$cambio.'">';
    if($opcion==="cambioModelo"){
        ?>
        <option value="0">Seleccione</option>
        <?php       
        pg_query("BEGIN");
        $resultado=pg_query($conexion, "SELECT  productos.cnombre, productos.cmodelo,  proveedor.eid_proveedor FROM proveedor INNER JOIN productos ON productos.eid_proveedor = proveedor.eid_proveedor where productos.eid_proveedor='".$cambio."' and productos.bestado='t'");
        $nue=pg_num_rows($resultado);
            if($nue>0){
            while ($fila = pg_fetch_array($resultado)) {
            if($fila[0]==$proveedor){
        ?>
        <option selected="" value="<?php echo $fila[1];?>"><?php echo $fila[1];?></option>
        <?php }else{ ?>
        <option value="<?php echo $fila[1];?>"><?php echo $fila[1];?></option>
            <?php }}} ?>
        <?php
    }
    if($opcion==="cambioNombre"){
        pg_query("BEGIN");
        $resultado=pg_query($conexion, "SELECT * from productos where cmodelo='".$cambio."'");
        while ($fila = pg_fetch_array($resultado)) {
        echo '<input type="text" class="form-control has-feedback-left" class="form-control col-md-7 col-xs-12" placeholder="Nombre" name="nombre" id="nombre" disabled value="'.$fila[1].'"> <span class="fa  fa-toggle-right form-control-feedback left" aria-hidden="true"></span>';
        }
    }

?>