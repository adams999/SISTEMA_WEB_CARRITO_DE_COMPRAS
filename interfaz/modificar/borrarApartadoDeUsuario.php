<?php 
extract($_GET);

session_start();//aqui se inicia la session con las variables del usuario logueado
if ($_SESSION['correo_usuarioA'] and $id) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:../index.php");
}

$nombreAdmin=$_SESSION['nombre'];//aqui cargo el nombre del administrador logeado en 


//-------------------------------------------------------------------------------------------//

        require("../conexionBD/conexionBd.php");


//---aqui cargo las variables correspondientes al apartado y 
        $sql="SELECT * FROM apartado WHERE numero_apartado = '$id'";
    //la variable  $conexion viene de connect_db que lo traigo con el require("connect_db.php");
        $query=mysqli_query($conexion,$sql);

        while ($row= mysqli_fetch_array ($query)){//aqui cargo las variables correspondientes al array del producto apartado a traves del id que envia la lista de productos apartados 

          $numeroApartado=$row['numero_apartado'];
          $cedulaUsuario=$row['cedula_usuario'];
          $nombreUsuario=$row['nombre_usuario'];
          $codigoProductoApartado=$row['codigo_productoV'];
          $nombreProductoApartado=$row['nombre_producto'];
          $cantidadApartada=$row['cantidad_apartada'];

}

$estatusDesactivado=0;//aqui cargo el valor dedesactivado del apartado correspondiente para despues Eliminarlo Logicamente

//------------------update en el apartado y catalogo de producto--------------------------------------//
$sql2 = "UPDATE apartado SET estatus='$estatusDesactivado' WHERE numero_apartado='$id'";
$result2=mysqli_query($conexion,$sql2);


//codigo para modificar la cantidad del producto Disponible
   $sql1 = "UPDATE catalogo_venta  SET productos_disponibles=(productos_disponibles+$cantidadApartada) WHERE codigo_productoV='$codigoProductoApartado'";
   $result=mysqli_query($conexion,$sql1);


//--------------------el aviso de que se ejecuto el apartado-----------------------------------//

if (isset($result,$result2)){
   // proceso Apartado
   
   echo "<script>alert(' Administrador.  -$nombreAdmin- Has Cancelado el Apartado -$id-  del Usuario -$nombreUsuario- CI:-$cedulaUsuario- El Producto: $codigoProductoApartado - $nombreProductoApartado');window.location='../listaProductosDeUsuarios.php#ir';exit();</script>";
   
			}else{
				echo "no se puedo hacer el Proceso";
			}



 ?>