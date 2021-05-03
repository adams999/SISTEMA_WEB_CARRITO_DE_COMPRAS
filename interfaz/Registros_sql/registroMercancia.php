<?php

session_start();
if ($_SESSION['correo_usuarioA']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:../index.php");
}


// conexion al servidor y seleccion de base de datos
require("../conexionBD/conexionBD.php");


// leer las variables del formulario
$numero_pedido = $_POST["numero_pedido"];
$nombre_proveedor = $_POST["nombre_proveedor"];
			///////////aqui recibo el nombre del proveedor y a su ves busco el id para poder hacr el registro de la mercancia
			$sql6="SELECT * FROM proveedores where nombre_proveedor='$nombre_proveedor' and estatus=1";

                $query6=pg_query($conexion,$sql6);
                while($arreglo6=pg_fetch_array($query6)){

                  @$idProveedor=$arreglo6['id_proveedor'];
}
$id_proveedor=$idProveedor;

$nombre_producto = $_POST["nombre_producto"];
$precio_costo =$_POST["precio_costo"];           $precio_costo = number_format($precio_costo,2,",",".");//formatear numero con milesimas y decimales
$codigo_productoV = $_POST["codigo_productoV"];
$descripcion = $_POST["descripcion"];
$tipo_unidad = $_POST["tipo_unidad"];
$iva_producto = $_POST["iva_producto"];          $iva_producto = number_format($iva_producto,2,",",".");
$categoria = $_POST["categoria"];
$codigo_producto = $_POST["codigo_producto"];
$cantidad_producto =$_POST["cantidad_producto"];
$nombre_productoV=$nombre_producto;
$fecha_pedido =$_POST["fecha_pedido"];
$marca = $_POST["marca"];
$imagen = $_FILES["imagen"]["name"];
$ruta = $_FILES["imagen"]["tmp_name"];
$destino = "../imagenesRepuestos/".$imagen;
copy($ruta,$destino);


$precio_base = $_POST["precio_base"];              $precio_base = number_format($precio_base,2,",",".");
$pvp = $_POST["pvp"];                              $pvp= number_format($pvp,2,",",".");
$id_usuarioA = $_SESSION['id_usuarioA']; 
$productos_disponibles = $cantidad_producto;
$productos_vendidos="0";
date_default_timezone_set('America/Caracas');
$fecha_pedido2 = date("Y/m/d"); 
$estatusActivado=1;


/* VALIDACION PARA QUE LOS CAMPOS DEL FORMULARIO NO SE ENVIEN VACIOS Y NO REGISTRE ALGUN CAMPO NECESARIO */
    if ($numero_pedido==null or $id_proveedor==null or $nombre_producto==null or $precio_costo==null or $codigo_productoV==null  or $codigo_productoV=='ACC0' or $codigo_productoV=='CAR0' or $codigo_productoV=='CHA0' or $codigo_productoV=='ELE0' or $codigo_productoV=='FRE0' or $codigo_productoV=='MOT0' or $codigo_productoV=='SUS0' or $codigo_productoV=='TRA0' or $descripcion==null or $tipo_unidad==null or $tipo_unidad=='Selecciona El Tipo De Unidad' or $iva_producto==null or $categoria==null or $codigo_producto==null or $cantidad_producto==null or $fecha_pedido==null or $marca==null or $imagen==null  or $precio_base==null or $pvp==null or $productos_disponibles==null ) {
        echo "<script>
            alert('Por Favor Completa todos los campos. Para Realizar el Registro de la Mercancia.');
            window.location='../registroMercancia.php#ir';exit();
        </script>";   exit();
	}

 	else{//codigo para evitar que se registran ID PROVEEDOR,CODIGO PRODUCTO, CODIGO PRODUCTO VENTA 2 veces.
		$valida1 = "SELECT * FROM proveedores WHERE id_proveedor ='$id_proveedor' and estatus=1" ;
      	$valida2 = "SELECT * FROM pedidos WHERE codigo_producto = '$codigo_producto'";
        $valida3 = "SELECT * FROM catalogo_venta WHERE codigo_producto_v = '$codigo_productoV'";
        
        $tot1 = pg_query($conexion,$valida1);
        $tot2 = pg_query($conexion,$valida2);
        $tot3 = pg_query($conexion,$valida3);
       

         $resul1 = pg_num_rows($tot1);
         $resul2 = pg_num_rows($tot2);
         $resul3 = pg_num_rows($tot3);
        

            if($resul1 != true){			//si id de proveedor no existe saldra este aviso
               echo "<script>alert('ATENCION!: Debe Ingresar un ID de Proveedor que ya Este Registrado o este Activo. Si no esta Registrado Por Favor Registralo');window.location='../registroMercancia.php#ir';</script>";
            }

	            elseif($resul2 >= 1){		//si codigo de producto ya esta esta registrado en mysql saldra este aviso
	                echo "<script>alert('ATENCION!: Codigo de Producto  - $codigo_producto -  ya Registrado. Por Favor Verificar Datos');window.location='../registroMercancia.php';</script>"; 
	                echo "<script>header(location='../registroMercancia.php#ir')</script>";  
	            }

		            elseif($resul3 >= 1){		//si codigo de producto venta ya esta esta registrado en mysql saldra este aviso
		                echo "<script>alert('ATENCION!: Codigo de Venta al Publico  - $codigo_productoV -  ya Registrado. Por Favor Verificar Datos');window.location='../registroMercancia.php#ir';</script>";
					}



            else{
				// sentencia sql para las dos tablas de base de datos
		    	$insertar = "INSERT INTO pedidos 
		    		(numero_pedido, id_usuario_a, id_proveedor, codigo_producto, nombre_producto, cantidad_producto, precio_costo, fecha_pedido) 
		        VALUES 
		        	('$numero_pedido', '$id_usuarioA', '$id_proveedor', '$codigo_producto', '$nombre_producto', '$cantidad_producto', '$precio_costo', '$fecha_pedido')"; 

		    	$insertar1 =  "INSERT INTO catalogo_venta 
		    		(codigo_producto_v, nombre_producto_v, id_usuario_a, categoria, marca, descripcion, imagen, tipo_unidad, productos_vendidos, productos_disponibles, precio_base, iva_producto, pvp, numero_pedido, estatus, precio_costo)
		            VALUES
		        ('$codigo_productoV', '$nombre_productoV', '$id_usuarioA', '$categoria', '$marca', '$descripcion', '$destino', '$tipo_unidad', '$productos_vendidos', '$productos_disponibles', '$precio_base', '$iva_producto', '$pvp', '$numero_pedido', '$estatusActivado', '$precio_costo')";
				}

	}
//verificar que los datos esten ingresados
$resultado = pg_query($conexion,$insertar);

if($resultado){
	echo "<script>alert('Registro de Mercancia Exitosa!!!');
	window.location='../registroMercancia.php#ir';
	</script>";

		$resultado1 = pg_query($conexion,$insertar1);
			if($resultado1){
				echo "<script>alert('Registro de Mercancia Exitosa!!!'); window.location='../registroMercancia.php#ir';
					</script>";
			}	
		}

//saldra este aviso si alguna conexion de este archivo php esta mal
 else{
 echo pg_error($conexion);
 echo "error en archivo php";
}

//cerrar la conexion
pg_close($conexion);

?>