<?php
extract($_GET);//qui extraigo el id de la pagina catalogo de venta de administrador segun el producto q quiera eliminar logicamente

session_start();
if ($_SESSION['id_usuarioA'] and $id) {//si esta loguado como administrador me dejara hacer este proceso si no no realizara este proceso

}else {
    header("Location:../index.php");
}


require("../conexionBD/conexionBD.php");


$estatusDesactivado=0;//el estatus 0 significa eliminado



//aqui cambiare de estatus solo el proveedor que reciba por la variable $id
$sql2 = "UPDATE catalogo_venta SET estatus='$estatusDesactivado' where id_producto_venta='$id'";


   $result=pg_query($conexion,$sql2);


//aqui saldra este aviso y saldra que el proveedor esta eliminado "logicamente"
   if ($result ==true) {
   	echo "<script>alert('Has Eliminado El Producto Con el ID:  --$id--  Satifactoriamente!!!');
   	window.location='../editarProductosGeneral.php#ir';exit();</script>";
   }
pg_close($conexion);

?>