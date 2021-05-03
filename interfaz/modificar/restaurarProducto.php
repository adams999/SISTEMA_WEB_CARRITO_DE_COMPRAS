<?php

session_start();
if ($_SESSION['id_usuarioA']) {//si esta loguado como administrador me dejara hacer este proceso si no no realizara este proceso

}else {
    header("Location:../index.php");
}


require("../conexionBD/conexionBD.php");
extract($_GET);//qui extraigo el id de la pagina catalogo de venta de administrador segun el producto q quiera eliminar logicamente


$estatusActivado=1;//el estatus 0 significa eliminado



//aqui cambiare de estatus solo el proveedor que reciba por la variable $id
$sql2 = "UPDATE catalogo_venta SET estatus='$estatusActivado' where codigo_producto_v='$id'";


   $result=pg_query($conexion,$sql2);


//aqui saldra este aviso y saldra que el proveedor esta eliminado "logicamente"
   if ($result ==true) {
   	echo "<script>alert('Has Restaurado El Producto Con el ID:  --$id--  Satifactoriamente!!!');
   	window.location='../produElimAdmin.php#ir';exit();</script>";
   }

pg_close($conexion);

?>