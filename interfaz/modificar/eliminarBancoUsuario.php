<?php

session_start();
if ($_SESSION['id_usuario']) {//si esta loguado como administrador me dejara hacer este proceso si no no realizara este proceso
}else {
    header("Location:../index.php");
}

require("../conexionBD/conexionBD.php");
extract($_GET);//qui extraigo el id para poder hacer el orrado logico


$estatusDesactivado=0;//el estatus 0 significa eliminado


//aqui cambiare de estatus solo el banco de empresa que reciba por la variable $id
$sql2 = "UPDATE bancos_usuario SET estatus='$estatusDesactivado' where id_banco_usuario='$id'";

   $result=pg_query($conexion,$sql2);

//aqui saldra este aviso y saldra que el proveedor esta eliminado "logicamente"
   if ($result==true) {
   	echo "<script>alert('Has Eliminado El Banco Con el ID:  --$id--  Satifactoriamente!!!');
   	window.location='../cuentasBancariasUsuario.php#ir';exit();</script>";
   }

pg_close($conexion);
?>