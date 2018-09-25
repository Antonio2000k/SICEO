<?php
	include("../../Config/conexion.php");
	$query_s= pg_query($conexion, "select
lensometria.eid_lensometria,
lensometria.resfera_ojoderecho,
lensometria.resfera_ojoizquierdo,
lensometria.rcilindro_ojoderecho,
lensometria.rcilindro_ojoizquierdo,
lensometria.reje_ojoderecho,
lensometria.reje_ojoizquierdo,
lensometria.radiccion_ojoderecho,
lensometria.radiccion_ojoizquierdo,
lensometria.rprisma_ojoderecho,
lensometria.rprisma_ojodizquierdo,
lensometria.rcb_ojoderecho,
lensometria.rcb_ojoizquierdo,
lensometria.rav_lej_ojoderecho,
lensometria.rav_lej_ojoizquierdo,
lensometria.rav_cer_ojoderecho,
lensometria.rav_cer_ojoizquierdo,
lensometria.cdescripcion
FROM
lensometria");

while($fila = pg_fetch_array($query_s)){
	
	?>
	<td><?php echo $fila[0]; ?></td> <br>
	<td><?php echo $fila[1]; ?></td> <br>
	<td><?php echo $fila[2]; ?></td> <br>
	<td><?php echo $fila[3]; ?></td> <br>
	<td><?php echo $fila[4]; ?></td> <br>
	<td><?php echo $fila[5]; ?></td> <br>
	<td><?php echo $fila[6]; ?></td> <br>
	<td><?php echo $fila[7]; ?></td> <br>
	<td><?php echo $fila[8]; ?></td> <br>
	<td><?php echo $fila[9]; ?></td> <br>
	<td><?php echo $fila[10]; ?></td> <br>
	<td><?php echo $fila[11]; ?></td> <br> 
	<td><?php echo $fila[12]; ?></td> <br>
	<td><?php echo $fila[13]; ?></td> <br>
	<td><?php echo $fila[14]; ?></td> <br>
	<td><?php echo $fila[15]; ?></td> <br>
	<td><?php echo $fila[16]; ?></td> <br>
	<td><?php echo $fila[17]; ?></td> <br>
	<td><?php echo $fila[18]; ?></td> <br>
	
	<?php
}
?>