<?php
session_start();
if ($_SESSION['id_usuarioA']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}

// conexion al servidor y seleccion de base de datos
require("../conexionBD/conexionBD.php");


$ganancia=$_POST['porc_ganan'];
$iva=$_POST['iva'];

///validar de que los datos esten corectos u no sean 000000,
if ($ganancia=='0.00' or $iva=='0.00' or $ganancia>=1 or $iva>=1) {
	echo "<script>alert('Ingresa Datos Vàlidos!!!');
				window.location='../gananciaIva.php#ir';
				</script>";exit();
}



$sql6=("SELECT * FROM catalogo_venta order by id_producto_venta asc");

	//la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
$query6=pg_query($conexion,$sql6);

	//con este array cargo los datos personales del usuario para despues mostrar la informacion del mismo 
while($arreglo6=pg_fetch_array($query6)){
	$id_producto_venta=$arreglo6['id_producto_venta'];
	$precio_base=$arreglo6['precio_base'];
	



// aqui le quito comas y puntos a los precios
$precio_base=str_replace(array(' ','-','.',',00'), '', $precio_base);
$iva_producto=$precio_base*$iva;
$pvp=$precio_base+$iva_producto;



$precio_base_ok=number_format($precio_base,2,",",".");
$iva_producto_ok=number_format($iva_producto,2,",",".");
$pvp_ok=number_format($pvp,2,",",".");


$act="UPDATE catalogo_venta SET precio_base='$precio_base_ok', iva_producto='$iva_producto_ok', pvp='$pvp_ok' WHERE id_producto_venta='$id_producto_venta'";

$actIvaProd=pg_query($conexion,$act);
}




$insertar = "UPDATE ganancia_iva SET ganancia='$ganancia', iva='$iva'";;

//verificar consulta
$resultado = pg_query($conexion,$insertar);
if($resultado==true and $actIvaProd==true){
			 	echo "<script>alert('El Porcentaje de Ganancia e Iva Fueron Modificados Corectamente, En todos Los Productos Surgieron los Cambios del Cambio del Iva Satisfactoriamente!!!!. Si Necesitas que se Apliquen los Cambios del Porcentaje de Ganancia En Todos los Productos Aplica el Aumento.');
				window.location='../indexAdmin.php#ir';
				</script>";
}
	else{
 echo "error en Registro";
}



?>