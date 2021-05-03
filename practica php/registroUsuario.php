
<?php
// conexion al servidor y seleccion de base de datos
$conexion = mysqli_connect("localhost", "root","adams24819181","prueba");

// leer las variables del formulario
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];

// sentencia sql
$insertar = "INSERT INTO usuario 
		
		(nombre, apellido)

		VALUES

		('$nombre, '$apellido')";
//verificar consulta
$resultado = mysqli_query($conexion,$insertar);
if($resultado)
{
 echo "Cliente guardado...<br/>";
 echo "<a href='../index.html'>Regresar</a>";
}else{
 echo mysqli_error($conexion);
}
//cerrar la conexion
mysqli_close($conexion);
?> 
