<?php
extract($_GET);
session_start();
if ($_SESSION['id_usuarioA'] and $id) {//si esta loguado como administrador me dejara hacer este proceso si no no realizara este proceso
}else {
    header("Location:../index.php");
}

require("../conexionBD/conexionBD.php");
//qui extraigo el id para poder hacer el orrado logico


$estatusActivo=1;//el estatus 0 significa eliminado


//aqui cambiare de estatus solo el banco de empresa que reciba por la variable $id
$sql2 = "UPDATE usuario SET estatus='$estatusActivo' where id_usuario='$id'";

   $result=pg_query($conexion,$sql2);

//aqui saldra este aviso y saldra que el proveedor esta eliminado "logicamente"
   if ($result==true) {
   	echo "<script>alert('Has Reestablecido El Usuario Con el ID:  --$id--  Satifactoriamente!!!');
   	window.location='../listaUsuDesac.php#ir';exit();</script>";
   }

pg_close($conexion);
?>