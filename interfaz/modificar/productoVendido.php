<?php 
session_start();//aqui se inicia la session con las variables del usuario logueado
if ($_SESSION['correo_usuarioA']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:../index.php");
}

$nombreAdmin=$_SESSION['nombre'];//aqui cargo el nombre del administrador logeado en 
date_default_timezone_set('America/Caracas');
$fechaHoraApartado = date('Y/m/d H:i');// aqui se guarda la fecha y la hora del apartado en tiempo real para despues cambiar la misma por la fecha en que se califico el producto como apartado

//-------------------------------------------------------------------------------------------//
extract($_GET);
        require("../conexionBD/conexionBd.php");


//---aqui cargo las variables correspondientes al apartado 
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

$estatusVendido=2;//aqui cargo el valor Pagado del apartado correspondiente para despues mostrarlo en la lista de productos vendidos

//------------------update en el apartado y catalogo de producto--------------------------------------//
$sql2 = "UPDATE apartado SET estatus='$estatusVendido', fecha_hora_pago='$fechaHoraApartado' WHERE numero_apartado='$id'";
$result2=mysqli_query($conexion,$sql2);

$sql = "UPDATE catalogo_venta SET productos_vendidos='$cantidadApartada' WHERE codigo_productoV='$codigoProductoApartado'";
$result=mysqli_query($conexion,$sql);

//--------------------el aviso de que se ejecuto el apartado-----------------------------------//

if (isset($result2,$result)){
   // proceso Apartado
   
   echo "<script>alert(' Administrador.  -$nombreAdmin- Has Calificado Como Vendido el Apartado -$id-  del Usuario -$nombreUsuario- CI:-$cedulaUsuario- Producto: $codigoProductoApartado - $nombreProductoApartado');window.location='../listaProductosDeUsuarios.php#ir';exit();</script>";
   
			}else{
				echo "no se puedo hacer el Proceso";
			}



 ?>