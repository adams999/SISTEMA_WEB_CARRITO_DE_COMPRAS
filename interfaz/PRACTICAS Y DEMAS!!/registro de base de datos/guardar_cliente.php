<?php
//conexion al servidor
$conexion=mysql_connect("127.0.0.1","estudiante","estudiante");

//seleccionar la base de datos
$db = mysql_select_db("tienda",$conexion);

//leer las variables del furmulario
$rif= $_POST["rif"];
$nombre = $_POST ["nombre"];
$direccion = $_POST ["direccion"];
$telefono = $_POST ["telefono"];

//sentencia sql
$sql = "insert into usuario (rif,nombre,direccion,telefono)values('$rif','$nombre','$direccion','$telefono');";

$resultado = mysql_query($sql,$conexion);

if($resultado){
	echo "Cliente guardado... <br>";
	echo "<a href='cliente.html'>regresar</a>";
}
else{
	echo mysql_error($conexion);
}

//cerrar coneccion
mysql_close($conexion);
?>
