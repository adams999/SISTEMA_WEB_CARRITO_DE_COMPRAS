<?php
session_start();
if ($_SESSION['correo_usuarioA']) {//si esta loguado como administrador me dejara hacer este proceso si no no realizara este proceso
}else {
    header("Location:../index.php");
}

require("../conexionBD/conexionBD.php");
extract($_GET);//qui extraigo el id de la pagina listaComentarios segun el Producto q quiera eliminar logicamente

$sql=("SELECT * FROM comentarios where id='$id' ");
    
                //la variable  $mysqli viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
                $query=mysqli_query($conexion,$sql);

                 
        while($arreglo=mysqli_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente de los comentarios para despues llamar la informacion que se necesite
                    $codProd=$arreglo['num_comentario'];
                    $cedulaUsuario=$arreglo['cedula_usuario'];
                    $comentario=$arreglo['comentario'];
                    $fechaHoraComentario=$arreglo['fecha_hora_comentario'];
                    
                    
$sql2=("SELECT * FROM usuario where cedula_usuario='$cedulaUsuario'");
    
                //la variable  $mysqli viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
                $query2=mysqli_query($conexion,$sql2);

//con este array cargo los datos personales del usuario para despues mostrar la informacion del mismo 

        while($arreglo2=mysqli_fetch_array($query2)){
            $correoUsuario=$arreglo2['correo_usuario'];
            $nombreUsuario=$arreglo2['nombre_usuario'];
            $apellidoUsuario=$arreglo2['apellido_usuario'];
            $estadoUsuario=$arreglo2['estado'];
            $ciudadUsuario=$arreglo2['ciudad'];
            $direccionUsuario=$arreglo2['direccion'];
            $telefPersonalUsuario=$arreglo2['telef_personal'];
            $telefHogarUsuario=$arreglo2['telef_hog'];


$sql3=("SELECT * FROM catalogo_venta where codigo_productoV='$codProd'");
                //la variable  $mysqli viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
                $query3=mysqli_query($conexion,$sql3);

//con este array cargo los datos del catalogo de ventas para despues mostrar la informacion del mismo 

        while($arreglo3=mysqli_fetch_array($query3)){
            $nombreProductoV=$arreglo3['nombre_productoV'];
            $marcaProductoV=$arreglo3['marca'];
        }
    }
}





$estatusDesactivado=0;//el estatus 0 significa eliminado

//aqui cambiare de estatus solo el comentario que reciba por la variable $id
$sql2 = "UPDATE comentarios SET estatus='$estatusDesactivado' where id='$id'";

   $result=mysqli_query($conexion,$sql2);

//aqui saldra este aviso y saldra que el Comentario esta eliminado "logicamente"
   if ($result==true) {
   	echo "<script>alert('Has Eliminado El Comentario; -$comentario- del Producto -$nombreProductoV- COD:$codProd Correspondiente al Usuario: -$nombreUsuario $apellidoUsuario- Satisfactoriamente!!!');
   	window.location='../listaComentarios.php#ir';exit();</script>";
   }


?>