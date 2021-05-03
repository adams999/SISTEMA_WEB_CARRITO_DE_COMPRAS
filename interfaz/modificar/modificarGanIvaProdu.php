<?php 
session_start();
if ($_SESSION['id_usuarioA']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}

// conexion al servidor y seleccion de base de datos
require("../conexionBD/conexionBD.php");


$iva=$_POST['iva'];
$incremento=$_POST['incremento'];


///validar de que los datos esten corectos u no sean 000000,
if ($incremento>=1) {
	echo "<script>alert('El Porcentaje de Aumento es Demasiado Alto!!! MAXIMO DE 99% (0.99) Por Vez.');
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
		$precio_base1=($precio_base*$incremento)+$precio_base;
		$iva_producto=$precio_base1*$iva;
		$pvp=$precio_base1+$iva_producto;



		$precio_base_ok=number_format($precio_base1,2,",",".");
		$iva_producto_ok=number_format($iva_producto,2,",",".");
		$pvp_ok=number_format($pvp,2,",",".");


		//echo "id:$id_producto_venta...precio_base:$precio_base...incremento:$incremento.... preciobase1:.......$precio_base_ok.... iva:$iva...ivaproducto:$iva_producto_ok...pvp:$pvp_ok<br><br>";


$act="UPDATE catalogo_venta SET precio_base='$precio_base_ok', iva_producto='$iva_producto_ok', pvp='$pvp_ok' WHERE id_producto_venta='$id_producto_venta'";

$actIvaProd=pg_query($conexion,$act);

}


if($actIvaProd==true){
$incremento1=substr($incremento, 2);
			 	echo "<script>alert('Aplicastes El Aumento del $incremento1% En Toda la Mercancia Satisfactoriamente!!!!');
				window.location='../indexAdmin.php#ir';
				</script>";
}
	else{
 echo "error en Registro";
}

pg_close($conexion);

 ?>