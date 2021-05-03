<?php 

session_start();
if ($_SESSION['id_usuario']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:../index.php");
}



$estatusActivo=1;
$opinion=$_POST['opinion'];
$id_compra=$_POST['id_compra'];
$id_producto_venta=$_POST['id_producto_venta'];



date_default_timezone_set('America/Caracas');
$fecha_hora_opinion= date('d/m/Y H:i');




// conexion al servidor y seleccion de base de datos
require("../conexionBD/conexionBD.php");


$insertar = "INSERT INTO opiniones (opinion_usuario, id_usuario, fecha_hora_opinion, id_venta_producto, estatus, id_producto_venta)
    	 		VALUES
    ('$opinion', '{$_SESSION['id_usuario']}', '$fecha_hora_opinion', '$id_compra', '$estatusActivo', '$id_producto_venta')";
$resultado = pg_query($conexion,$insertar);



//aqui saldra este aviso y saldra que el proveedor esta eliminado "logicamente"
   if ($resultado) {
   	echo "<script>alert('Has Opinado Satisfactoriamente... Gracias Por Tu Opiniòn Es de Gran Importancia Para Nosotros. ');
	window.location='../descriProd.php?id=$id_producto_venta#ir';
   	</script>";
   }else{
   	echo "error al comentar!!";
   }
pg_close($conexion);
 ?>