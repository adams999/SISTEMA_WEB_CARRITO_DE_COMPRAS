<?php 
 //esta es la validacion para el Administrador!!!!
	session_start();
	if ($_SESSION['id_usuario']) {
	    //echo "tu nombre es " .$_SESSION['nombre'];
	}else {
		header("Location:index.php");
	}
	$id_banco_usuario_pagar=$_POST['nomb_banc_usua'];
	$id_banco_empresa_recibir=$_POST['nomb_banc_empr'];
	$id_apartado=$_POST['id_apartado'];
	$monto_cancelado=$_POST['monto'];
	@$referencia_pago=$_POST['n-transferencia'];


require("../conexionBD/conexionBd.php");

$sql1="SELECT * FROM bancos_usuario where id_banco_usuario='$id_banco_usuario_pagar' and id_usuario='{$_SESSION['id_usuario']}' and estatus=1";

        $query1=pg_query($conexion,$sql1);
while($arreglo1=pg_fetch_array($query1)){//este arreglo1 ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
            $id_banco_usuario=$arreglo1['id_banco_usuario'];
            $nombre_banco_usuario=$arreglo1['nomb_banc_usua'];
            $numero_cuenta_usuario=$arreglo1['num_cuen_usua'];
            $titular_cuenta_usuario=$arreglo1['titu_cuen_usua'];
}



	$sql2="SELECT * FROM bancos_empresa where id_banco_empresa='$id_banco_empresa_recibir' and estatus=1";

	        $query2=pg_query($conexion,$sql2);
	while($arreglo2=pg_fetch_array($query2)){//este arreglo2 ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
	            $id_banco_empresa=$arreglo2['id_banco_empresa'];
	            $nombre_banco_empresa=$arreglo2['nomb_banc_empr'];
	            $numero_cuenta_empresa=$arreglo2['num_cuen_empr'];
	            $titular_cuenta_empresa=$arreglo2['titu_cuen_empr'];
	}



		$sql3="SELECT * FROM apartado where id_apartado_usuario='$id_apartado' and id_usuario={$_SESSION['id_usuario']} and estatus=1";

		        $query3=pg_query($conexion,$sql3);
				
				while($arreglo3=pg_fetch_array($query3)){//este arreglo3 ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
		            $id_apartado_usuario=$arreglo3['id_apartado_usuario'];
		            $id_usuario_apartado=$arreglo3['id_usuario'];
		            $fecha_hora_apartado=$arreglo3['fecha_hora_apartado'];



		            $sql4="SELECT * FROM detalle_apartado where id_apartado='$id_apartado' and id_usuario={$_SESSION['id_usuario']} and estatus=1";

		        	$query4=pg_query($conexion,$sql4);
						while($arreglo4=pg_fetch_array($query4)){//este arreglo4 ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
			            $id_detalle_apartado=$arreglo4['id_detalle_apartado'];
			            $id_producto_apartado=$arreglo4['id_producto_venta'];
			            $cantidad_apartada=$arreglo4['cantidad_apartada'];
			            $fecha_hora_detalle_apartado=$arreglo4['fecha_hora'];
			            $id_usuario_detalle_apartado=$arreglo4['id_usuario'];


			            	$sql9="SELECT * FROM catalogo_venta where id_producto_venta='$id_producto_apartado' and  estatus=1";

				        	$query9=pg_query($conexion,$sql9);
								while($arreglo9=pg_fetch_array($query9)){//este arreglo9 ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
					      
					            $productos_vendidos=$arreglo9['productos_vendidos'];

						            $cantidad_apartada=$productos_vendidos+$cantidad_apartada;
									$precio_base = $arreglo9['precio_base'];


						            $sql6 = "UPDATE catalogo_venta SET productos_vendidos='$cantidad_apartada' WHERE id_producto_venta='$id_producto_apartado'";
									$result6=pg_query($conexion,$sql6);
								}
							}
						}

date_default_timezone_set('America/Caracas');
$fechaHoraVenta = date('d/m/Y H:i');


$estatusVendido=2;//aqui cargo el valor Pagado del apartado correspondiente para despues mostrarlo en la lista de productos vendidos

//------------------update en el apartado y catalogo de producto--------------------------------------//
$sql4 = "UPDATE apartado SET estatus='$estatusVendido' WHERE id_apartado_usuario='$id_apartado' and id_usuario='{$_SESSION['id_usuario']}'";
$result4=pg_query($conexion,$sql4);

$sql5 = "UPDATE detalle_apartado SET estatus='$estatusVendido' WHERE id_apartado='$id_apartado' and id_usuario='{$_SESSION['id_usuario']}'";
$result5=pg_query($conexion,$sql5);







$sql7 = "SELECT * FROM ganancia_iva LIMIT 1	";
$query7=pg_query($conexion,$sql7);
while($arreglo7=pg_fetch_array($query7)){//este arreglo1 ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
$iva = $arreglo7['iva'];
$ganancia = $arreglo7['ganancia'];
}




$pagoVenta="INSERT INTO ventas_productos (id_apartado, id_banco_usuario, id_banco_empresa, monto_cancelado, fecha_hora_venta, estatus, numero_referencia, id_usuario, iva, ganancia, precio_base) 
					VALUES 
			('$id_apartado', '$id_banco_usuario_pagar', '$id_banco_empresa_recibir', '$monto_cancelado', '$fechaHoraVenta', '$estatusVendido', '$referencia_pago', '{$_SESSION['id_usuario']}', '$iva', '$ganancia', '$precio_base') ";
$result7=pg_query($conexion,$pagoVenta);






//--------------------el aviso de que se ejecuto el apartado-----------------------------------//

if (($result4==true and $result5==true and $result6==true and $result7==true)){
   // proceso Apartado
   echo "<script>alert(' Usuario.  -{$_SESSION['nombre_usuario']}- Has Cancelado el Apartado Nº -$id_apartado- Por Favor espera a que verifiquemos Tu Pago, Una ves Verificado Podras Descargar El Correspondiente Recibo de tu Pago...   GRACIAS POR CONFIAR EN NOSòTROS!');window.location='../misProductosCancelados.php#ir';exit();</script>";
   
			}else{
				echo "no se puedo hacer el Proceso";
			}



 ?>