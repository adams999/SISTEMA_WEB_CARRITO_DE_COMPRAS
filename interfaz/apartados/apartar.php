<?php 
session_start();//aqui se inicia la session con las variables del usuario logueado
if ($_SESSION['id_usuario']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:../index.php");
}
//---------------aqui se cargan las variables del usuario logueado actualmente-------------------------//
extract($_GET);
        require("../conexionBD/conexionBd.php");

		$cantidadApartada=$_GET['cantidad'];//aqui cargo la cantidad de producto a apartar por parte del cliente

		//aqui cargo todas la informacion del usuario logueado para despues hacer procesos
		$id_usuario=$_SESSION['id_usuario'];

//---aqui cargo las variables correspondientes al producto y valido de que la cantidad a apartar sea valida--//
        $sql="SELECT * FROM catalogo_venta WHERE id_producto_venta = '$id' and estatus=1";
    //la variable  $conexion viene de connect_db que lo traigo con el require("connect_db.php");
        $query=pg_query($conexion,$sql);

        while ($row= pg_fetch_array ($query)){//aqui cargo las variables correspondientes al array del producto
                $cod_prod=$row['codigo_producto_v'];
                $nom_prod=$row['nombre_producto_v'];
                $categoria=$row['categoria'];
                $marca=$row['marca'];
                $descripcion=$row['descripcion'];
                $imagen=$row['imagen'];
                $tipo_unidad=$row['tipo_unidad'];
                $productos_vendidos=$row['productos_vendidos'];
                $productos_disponibles=$row['productos_disponibles'];
                $precBase=$row['precio_base'];
                $ivaProd=$row['iva_producto'];
                $pvp=$row['pvp'];
                $num_comentario=$row['numero_comentario'];
            
						if ($cantidadApartada > $productos_disponibles) {
						        echo "<script>alert('-{$_SESSION['nombre_usuario']} {$_SESSION['apellido_usuario']}-  La Cantidad a Apartar NO! debe Ser Mayor a la Disponible!! ');window.location='../descriProd.php?id=$id#ir';exit();</script>";exit();
						}
						elseif ($cantidadApartada <= 0) {
							echo "<script>alert('-{$_SESSION['nombre_usuario']} {$_SESSION['apellido_usuario']}-  La Cantidad a Apartar NO! debe Ser 0 o Negativa ');window.location='../descriProd.php?id=$id#ir';exit()</script>";exit();
						}

		}

$pvp1=$pvp;


//esta variable contiene la cantidad del producto Disponible del Producto despues de haberlo apartado
        $cantidadApartadaRes=($productos_disponibles-$cantidadApartada);

        $pvp=str_replace(array(' ','-','.'), '', $pvp);//quitar a lo que recibe esta variable lo que es , y .
        $pvp=round($pvp);//aqui se redondea lo q retorna el $pvp  para poderlo posteriormente multiplicar
        $precioProductoTotal = ($cantidadApartada*$pvp);//en esta variable contiene el total del precio a apartar (cantidad apartada * pvp)

        $precioProductoTotal=number_format($precioProductoTotal,2,",",".");//aqui se le vuelve a dar formato al precio con decimales y puntos de miles para popder despues guardarlo en la base de datos
        date_default_timezone_set('America/Caracas');
        $fechaHoraApartado = date('d/m/Y H:i');// aqui se guarda la fecha y la hora del apartado en tiempo real
        $estatusActivo=1;







//validacion para limitar la cantidad de productos al usuario
        $query5=("SELECT sum(cantidad_apartada) FROM detalle_apartado where id_usuario='{$_SESSION['id_usuario']}' and estatus=1");
        $result5=pg_query($conexion,$query5);
        

        while($arreglo=pg_fetch_array($result5)){
            if(($arreglo['sum']+$cantidadApartada)>5){
                $cantPosApart = 5-$arreglo['sum'];
                echo "<script>alert('ATENCIÓN!!  -{$_SESSION['nombre_usuario']} {$_SESSION['apellido_usuario']}- Solo Puedes Apartar 5 productos como Máximo. Puedes Apartar {$cantPosApart} Articulos màs!');
                window.location='../descriProd.php?id=$id#ir';exit();</script>";
                exit();
            } 
        }




















/////validar que exista un registro activo en la tabla de apartados
$valida1="SELECT * FROM apartado WHERE estatus=1 and id_usuario ='{$_SESSION['id_usuario']}'";

$tot1 = pg_query($conexion,$valida1);

$resul1 = pg_num_rows($tot1);


///////////validar que exista un registro activo en la tabla de detalle de apartado
$valida3="SELECT * FROM detalle_apartado WHERE estatus=1 and id_usuario ='{$_SESSION['id_usuario']}'";

$tot3 = pg_query($conexion,$valida3);

$resul3 = pg_num_rows($tot3);
































/////////////aqui valido de que no exista ni un apartado activo ni un producto en detalle_partado activo y asi poder proceder a crear un registro nuevo en la tabla de apartado y detalle venta

if ($resul1>=1) {
                        $sql1 = "UPDATE catalogo_venta SET productos_disponibles='$cantidadApartadaRes' WHERE id_producto_venta='$id'";
                       $result2=pg_query($conexion,$sql1);


///////////////aqui extraigo el id del apartado para relacionarlo en el id del detalle apartado

                    $valida2="SELECT * FROM apartado WHERE estatus=1 and id_usuario ='{$_SESSION['id_usuario']}' ORDER BY id_apartado_usuario DESC LIMIT 1";

                    $query2 = pg_query($conexion,$valida2);

                    while ($row2= pg_fetch_array ($query2)){//aqui cargo las variables correspondientes al array del producto
                    $id_apartado1=$row2['id_apartado_usuario'];
                    }

                       ////aqui ingreso el detalle del apartado
                        if ($result2==true) {
                        
                            $detalle_apartado1 ="INSERT INTO detalle_apartado (id_apartado, id_producto_venta, cantidad_apartada, fecha_hora, estatus, id_usuario, precio_unidad)

                                    VALUES

                                ('$id_apartado1', '$id', '$cantidadApartada', '$fechaHoraApartado', '$estatusActivo', '{$_SESSION['id_usuario']}', '$pvp1')";

                            $result3=pg_query($conexion,$detalle_apartado1);
                        }
                       

                    //---------------------------------el aviso de que se ejecuto el apartado-----------------------------------//

                    if (isset($result3)){
                       // proceso formulario
                       
                       echo "<script>alert('Apartado Satisfactoriamente!!! -{$_SESSION['nombre_usuario']} {$_SESSION['apellido_usuario']}- Has Apartado Cant:$cantidadApartada  Por el Producto: $nom_prod Debes Cancelar un Total de Bs:$precioProductoTotal Tienes un Maximo de 3 Días Habiles para proceder Con tu Pago');
                        window.location='../produApartados.php';exit();</script>";
                       
                    }
                        else{
                              echo "no se puedo hacer el apartado";
                            }
                }















































/////////////////////////////////aqui valido que en la tabla de apartados este con estatus 0 para poder agregar otro producto apartado si no se ha pagado el apartadao actual
            if ($resul1==0) {
                    $apartado1 = "INSERT INTO apartado (id_usuario, fecha_hora_apartado, estatus)

                                    VALUES

                                ('$id_usuario', '$fechaHoraApartado', '$estatusActivo')";
                        

                    @$result1=pg_query($conexion,$apartado1);

                    //codigo para modificar la cantidad del producto Disponible
                    if ($result1==true) {
                        $sql1 = "UPDATE catalogo_venta SET productos_disponibles='$cantidadApartadaRes' WHERE id_producto_venta='$id'";
                       $result2=pg_query($conexion,$sql1);


///////////////aqui extraigo el id del apartado para relacionarlo en el id del detalle apartado

                    $valida2="SELECT * FROM apartado WHERE estatus=1 and id_usuario ='{$_SESSION['id_usuario']}' ORDER BY id_apartado_usuario DESC LIMIT 1";

                    $query2 = pg_query($conexion,$valida2);

                    while ($row2= pg_fetch_array ($query2)){//aqui cargo las variables correspondientes al array del producto
                    $id_apartado1=$row2['id_apartado_usuario'];
                    }

                    $sql7 = "SELECT * FROM ganancia_iva LIMIT 1	";
                    $query7=pg_query($conexion,$sql7);
                    while($arreglo7=pg_fetch_array($query7)){//este arreglo1 ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
                    $iva = $arreglo7['iva'];
                    $ganancia = $arreglo7['ganancia'];
                    }

                       ////aqui ingreso el detalle del apartado
                        if ($result2==true) {
                        
                            $detalle_apartado1 ="INSERT INTO detalle_apartado (id_apartado, id_producto_venta, cantidad_apartada, fecha_hora, estatus, id_usuario, precio_unidad, precio_base, iva, ganancia)

                                    VALUES

                                ('$id_apartado1', '$id', '$cantidadApartada', '$fechaHoraApartado', '$estatusActivo', '{$_SESSION['id_usuario']}', '$pvp1', '$precBase','$iva', '$ganancia')";

                            $result3=pg_query($conexion,$detalle_apartado1);
                        }
                       

                    //---------------------------------el aviso de que se ejecuto el apartado-----------------------------------//

                    if (isset($result3)){
                       // proceso formulario
                       
                       echo "<script>alert('Apartado Satisfactoriamente!!! -{$_SESSION['nombre_usuario']} {$_SESSION['apellido_usuario']}- Has Apartado Cant:$cantidadApartada  Por el Producto: $nom_prod Debes Cancelar un Total de Bs:$precioProductoTotal Tienes un Maximo de 3 Días Habiles para proceder Con tu Pago');
                        window.location='../produApartados.php';exit();</script>";
                       
                    }
                        else{
                              echo "no se puedo hacer el apartado";
                            }
                }
            }









































//////////////////////////////////////proceso para identificafr si hay algun producto en la tabla detalle de apartado y poder saber si no para crear otro apartado  e ingresar un nuevo registro en la tabla detalle apartado
                














    

    /*
//----------------validacion y foermateo de variables para los procesos posteriores-----------------------//

//aqui se comprueba de que el numero este en el rango disponible y no sea o para poder ejecutar las modificaciones del producto y generar el apartado de la base de datos
        if ($cantidadApartada>0 and $cantidadApartada <= $productos_disponibles) {


        //---------------------------update en el producto y guardar apartado--------------------------------------//




           $apartado = "INSERT INTO apartado (id_usuario, id_producto_venta, cantidad_apartada, precio_total_pagar, fecha_hora_apartado, estatus)

            	 		VALUES

            		('$id_usuario', '$id', '$cantidadApartada', '$precioProductoTotal', '$fechaHoraApartado', '$estatusActivo')";

        $result2=pg_query($conexion,$apartado);

        //codigo para modificar la cantidad del producto Disponible
        if ($result2==true) {
            $sql1 = "UPDATE catalogo_venta  SET productos_disponibles='$cantidadApartadaRes' WHERE id_producto_venta='$id'";
           $result=pg_query($conexion,$sql1);
        }
           

        //---------------------------------el aviso de que se ejecuto el apartado-----------------------------------//

        if (isset($result)){
           // proceso formulario
           
           echo "<script>alert('Apartado Satisfactoriamente!!! -{$_SESSION['nombre_usuario']} {$_SESSION['apellido_usuario']}- Has Apartado Cant:$cantidadApartada  Por el Producto: $nom_prod Debes Cancelar un Total de Bs:$precioProductoTotal Tienes un Maximo de 3 Días Habiles para proceder Con tu Pago');
            window.location='../produApartados.php';exit();</script>";
           
        			}else{
        				echo "no se puedo hacer el apartado";
        			}

        		
         
          }*/
pg_close($conexion);
 ?>