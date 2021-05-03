<?php
session_start();
if ($_SESSION['id_usuarioA']) {//si esta loguado como administrador me dejara hacer este proceso si no no realizara este proceso
}else {
    header("Location:../index.php");
}

require("../conexionBD/conexionBD.php");
extract($_GET);//qui extraigo el id de la pagina listaComentarios segun el Producto q quiera eliminar logicamente


$estatusDesactivado=0;//el estatus 0 significa eliminado

//aqui cambiare de estatus solo el comentario que reciba por la variable $id
$sql2 = "UPDATE opiniones SET estatus='$estatusDesactivado' where id_opinion='$id'";

   $result=pg_query($conexion,$sql2);

//aqui saldra este aviso y saldra que el Comentario esta eliminado "logicamente"
   if ($result==true) {
   	echo "<script>alert('Has Eliminado El Comentario con ID: $id Satisfactoriamente!!!');
   	window.location='../listaComentarios.php#ir';exit();</script>";
   }

pg_close($conexion);
?>