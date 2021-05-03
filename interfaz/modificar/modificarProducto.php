<?php

session_start();
if ($_SESSION['id_usuarioA']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:../index.php");
}


// conexion al servidor y seleccion de base de datos
require("../conexionBD/conexionBD.php");


$cambiarImagen=$_FILES['cambiarImagen']['name'];//procedimiento para poder guardar las ruta de la imagen en la base de datos 
$ruta = $_FILES["cambiarImagen"]["tmp_name"];
$destino = "../imagenesRepuestos/".$cambiarImagen;
@copy($ruta,$destino);




$id_producto_venta=$_POST['id_producto_venta'];
$codigoProductoV=$_POST['codigoProductoV'];
$cambiarNombre=$_POST['cambiarNombre'];
$cambiarMarca=$_POST['cambiarMarca'];
$cambiarTipoU=$_POST['cambiarTipoU'];
$cambiarDisponibilidad=$_POST['cambiarDisponibilidad'];
$cambiarDescripcion=$_POST['cambiarDescripcion'];
$precioCosto=$_POST['precioCosto'];
@$precioCosto=number_format($precioCosto,2,",",".");

@$cambiarPrecioBase=$_POST['cambiarPrecioBase'];//le doy formato a los precios
@$cambiarPrecioBase=number_format($cambiarPrecioBase,2,",",".");



@$cambiarIva=$_POST['cambiarIva'];
@$cambiarIva=number_format($cambiarIva,2,",",".");



@$cambiarPvp=$_POST['cambiarPvp'];
@$cambiarPvp=number_format($cambiarPvp,2,",",".");




$usuarioAdmin=$_SESSION['id_usuarioA'];//aqui cargo la variable del administrador actualmente registrado para saber quien modifico el producto posteriormente



//aqui comparo de que si algun campo es nullo me salga este aviso y me redireccione
if ($id_producto_venta==null or $codigoProductoV==null or $cambiarNombre==null or $cambiarMarca==null or $cambiarTipoU==null or $cambiarDisponibilidad==null or $cambiarDescripcion==null or $cambiarPrecioBase==null or $cambiarIva==null or $cambiarPvp==null or $cambiarPrecioBase=='0,00' or $cambiarIva=='0,00' or $cambiarPvp=='0,00' or $cambiarPrecioBase=='NaN' or $cambiarIva=='NaN' or $cambiarPvp=='NaN' or $cambiarPvp==null){
	
echo "<script>
          alert('ATENCIÓN!!! Debes Ingresar Todos Los Datos Referentes a la Descripción Del Producto a Modificar Para Poder Proceder Con Los Cambios.');
         	window.location='../modProdADMIN.php?id=$codigoProductoV#ir';exit();
    </script>";exit();
}



if ($cambiarImagen!=null) {
	
	$sql3 = "UPDATE catalogo_venta SET imagen='$cambiarImagen', id_usuario_a='$usuarioAdmin' where codigo_producto_v='$codigoProductoV'";

   $result3=pg_query($conexion,$sql3);

   if ($result3==true) {
   	echo "<script>alert('ENHORABUENA!!   Administrador: -$usuarioAdmin- Has Cambiado La Imagen Del Producto Con el Codigo: $codigoProductoV.   El Nombre Es: $cambiarNombre.   Marca: $cambiarMarca.   Con Su Descripción Correspondiente.');
   	window.location='../modProdADMIN.php?id=$id_producto_venta#ir';exit();</script>";
   }
}




if ($precioCosto==null and $codigoProductoV!=null and $cambiarNombre!=null and $cambiarMarca!=null and $cambiarTipoU!=null and $cambiarDisponibilidad!=null and $cambiarDescripcion!=null and $cambiarPrecioBase!=null and $cambiarIva!=null and $cambiarPvp!=null) {
	
	$sql2 = "UPDATE catalogo_venta SET nombre_producto_v='$cambiarNombre', id_usuario_a='$usuarioAdmin', marca='$cambiarMarca', descripcion='$cambiarDescripcion', tipo_unidad='$cambiarTipoU',  productos_disponibles='$cambiarDisponibilidad' where codigo_producto_v='$codigoProductoV'";

   $result=pg_query($conexion,$sql2);

//aqui saldra este aviso y saldra que el proveedor esta eliminado "logicamente"
   if ($result==true) {
   	echo "<script>alert('ENHORABUENA!!   Administrador: -$usuarioAdmin- Has Cambiado El Producto Con el Codigo: $codigoProductoV.   El Nombre Es: $cambiarNombre.   Marca: $cambiarMarca.   Tipo U.: $cambiarTipoU.   Disponibilidad: $cambiarDisponibilidad.   Descripción: $cambiarDescripcion.   LOS PRECIOS NO SUFRIERON CAMBIOS....');
   	window.location='../modProdADMIN.php?id=$id_producto_venta#ir';exit();</script>";
   }
}

if ($precioCosto!=null and $codigoProductoV!=null and $cambiarNombre!=null and $cambiarMarca!=null and $cambiarTipoU!=null and $cambiarDisponibilidad!=null and $cambiarDescripcion!=null and $cambiarPrecioBase!=null and $cambiarIva!=null and $cambiarPvp!=null) {
  
  $sql5 = "UPDATE catalogo_venta SET nombre_producto_v='$cambiarNombre', id_usuario_a='$usuarioAdmin', marca='$cambiarMarca', descripcion='$cambiarDescripcion', tipo_unidad='$cambiarTipoU',  productos_disponibles='$cambiarDisponibilidad', precio_base='$cambiarPrecioBase', iva_producto='$cambiarIva', pvp='$cambiarPvp', precio_costo='$precioCosto' where codigo_producto_v='$codigoProductoV'";

   $result5=pg_query($conexion,$sql5);

//aqui saldra este aviso y saldra que el proveedor esta eliminado "logicamente"
   if ( @$result5==true) {
    echo "<script>alert('ENHORABUENA!!   Administrador: -$usuarioAdmin- Has Cambiado El Producto Con el Codigo: $codigoProductoV.   El Nombre Es: $cambiarNombre.   Marca: $cambiarMarca.   Tipo U.: $cambiarTipoU.   Disponibilidad: $cambiarDisponibilidad.   Descripción: $cambiarDescripcion.    Precio Base: $cambiarPrecioBase.   IVA: $cambiarIva.   PVP: $cambiarPvp.');
    window.location='../modProdADMIN.php?id=$id_producto_venta#ir';exit();</script>";
   }
}

pg_close($conexion);
?>