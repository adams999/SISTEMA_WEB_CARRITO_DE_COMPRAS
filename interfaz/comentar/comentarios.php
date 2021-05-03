<?php 
session_start();
if ($_SESSION['correo_usuario']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:../index.php");
}

$id=$_GET['id'];


$cedulaUsuario=$_SESSION['cedula_usuario'];
$nombreUsuario=$_SESSION['nombre_usuario'];
$apellidoUsuario=$_SESSION['apellido_usuario'];
$correoUsuario=$_SESSION['correo_usuario'];
$estatusActivo=1;

$comentario=$_GET['comentario'];


date_default_timezone_set('America/Caracas');
$fechaHoraComentario = date('d/m/Y H:i');

extract($_GET);




// conexion al servidor y seleccion de base de datos
require("../conexionBD/conexionBD.php");



$sql3=("SELECT * FROM catalogo_venta where codigo_productoV='$id' and productos_vendidos>0");
$query3=mysqli_query($conexion,$sql3);




//aqui cambiare de estatus solo el proveedor que reciba por la variable $id
$sql2 = "UPDATE catalogo_venta SET num_comentario='$id' where codigo_productoV='$id'";
$result=mysqli_query($conexion,$sql2);




$insertar = "INSERT INTO comentarios (num_comentario, cedula_usuario, nombre_usuario, apellido_usuario, correo_usuario, comentario, fecha_hora_comentario, estatus)
    	 		VALUES
    ('$id', '$cedulaUsuario', '$nombreUsuario', '$apellidoUsuario', '$correoUsuario', '$comentario', '$fechaHoraComentario', '$estatusActivo')";
$resultado = mysqli_query($conexion,$insertar);



//aqui saldra este aviso y saldra que el proveedor esta eliminado "logicamente"
   if ($resultado and $result and $query3) {
   	echo "<script>alert('Has Comentado Satisfactoriamente... Gracias Por Tu Comentario Es de Gran Importancia Para Nosotros. ');
	window.location='../descriProd.php?id=$id#ir';
   	</script>";
   }else{
   	echo "error al comentar!!";
   }
mysqli_close($conexion);
 ?>