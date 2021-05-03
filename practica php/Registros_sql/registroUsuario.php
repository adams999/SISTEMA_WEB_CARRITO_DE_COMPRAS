
<?php
// conexion al servidor y seleccion de base de datos
$conexion = mysqli_connect("127.0.0.1", "root","adams24819181","yural");

// leer las variables del formulario
$nombre_usuario = $_POST["nombre_usuario"];
$correo_usuario = $_POST["correo_usuario"];
$estado = $_POST["conti"];
$direccion =$_POST["direccion"];
$telef_personal = $_POST["telef_personal"];
$apellido_usuario = $_POST["apellido_usuario"];
$contraseña_usuario = $_POST["contraseña_usuario"];
$ciudad = $_POST["pais"];
$cedula_usuario = $_POST["cedula_usuario"];
$telef_hog = $_POST["telef_hog"];

// sentencia sql
$insertar = "INSERT INTO usuario 
		
		(nombre_usuario, correo_usuario, estado, direccion, telef_personal, apellido_usuario, contraseña_usuario, ciudad, cedula_usuario, telef_hog)

		VALUES

		('$nombre_usuario', '$correo_usuario', '$estado', '$direccion', '$telef_personal', '$apellido_usuario', '$contraseña_usuario', '$ciudad', '$cedula_usuario', '$telef_hog')";
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
