<?php
extract($_GET);//qui extraigo el id de la pagina listaProveedores segun el Proveedor q quiera eliminar logicamente

session_start();
if ($_SESSION['id_usuarioA'] and $id) {//si esta loguado como administrador me dejara hacer este proceso si no no realizara este proceso

}else {
    header("Location:../index.php");
}


require("../conexionBD/conexionBD.php");


$estatusDesactivado=0;//el estatus 0 significa eliminado



//aqui cambiare de estatus solo el proveedor que reciba por la variable $id
$sql2 = "UPDATE proveedores SET estatus='$estatusDesactivado' where id_proveedor='$id'";


   $result=pg_query($conexion,$sql2);


//aqui saldra este aviso y saldra que el proveedor esta eliminado "logicamente"
   if ($result ==true) {
   	echo "<script>alert('Has Eliminado El Proveedor Con el ID:  --$id--  Satifactoriamente!!!');
   	window.location='../listaProveedores.php#ir';exit();</script>";
   }


?>