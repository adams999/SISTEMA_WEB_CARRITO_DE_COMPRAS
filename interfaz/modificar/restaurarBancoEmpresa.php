<?php
session_start();
if ($_SESSION['id_usuario_a']) {//si esta loguado como administrador me dejara hacer este proceso si no no realizara este proceso

}else {
    header("Location:../index.php");
}


require("../conexionBD/conexionBD.php");
extract($_GET);//qui extraigo el id de la pagina listado de proveedores eliminados de administrador segun el proveedor q quiera restaurar logicamente


$estatusActivado=1;//el estatus 0 significa eliminado y 1 activado


//aqui cambiare de estatus solo el proveedor que reciba por la variable $id
$sql2 = "UPDATE bancos_empresa SET estatus='$estatusActivado' where id_banco_empresa='$id'";


   $result=pg_query($conexion,$sql2);


//aqui saldra este aviso y saldra que el proveedor esta eliminado "logicamente"
   if ($result ==true) {
   	echo "<script>alert('Has Restaurado El Banco Con el ID:  --$id--  Satifactoriamente!!!');
   	window.location='../informacionYural.php#ir';exit();</script>";
   }

pg_close($conexion);
?>