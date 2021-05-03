<?php 
extract($_GET);

session_start();//aqui se inicia la session con las variables del usuario logueado
if ($_SESSION['id_usuario'] and $id) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:../index.php");
}

$nombreUsuario=$_SESSION['nombre_usuario'];//aqui cargo el nombre del administrador logeado en 
$apellidoUsuario=$_SESSION['apellido_usuario'];

//-------------------------------------------------------------------------------------------//

        require("../conexionBD/conexionBd.php");










/////////////////////aqui extraigo  los datos de la tabla de detalle de apartados con el id correspondiente al usuario
                $sql6="SELECT * FROM detalle_apartado WHERE id_detalle_apartado = '$id' and id_usuario='{$_SESSION['id_usuario']}' and estatus=1";
            
                $query6=pg_query($conexion,$sql6);

                while ($row6= pg_fetch_array ($query6)){
                  $id_detalle_apartado=$row6['id_detalle_apartado'];
                  $id_apartado=$row6['id_apartado'];
                  $id_producto_venta=$row6['id_producto_venta'];
                  $cantidadApartada=$row6['cantidad_apartada'];
                  $fecha_hora_detalle=$row6['fecha_hora'];
                }




//---aqui cargo las variables correspondientes al apartado y 
        $sql="SELECT * FROM apartado WHERE id_apartado_usuario = '$id_apartado' and id_usuario='{$_SESSION['id_usuario']}'";
    //la variable  $conexion viene de connect_db que lo traigo con el require("connect_db.php");
        $query=pg_query($conexion,$sql);

        while ($row= pg_fetch_array ($query)){
          $id_usuario=$row['id_usuario'];
        }




/////////////////////////////////aqui extraigo el valor de cantidad disponible del producto------------
            $sql5="SELECT * FROM catalogo_venta WHERE id_producto_venta = '$id_producto_venta'";
        //la variable  $conexion viene de connect_db que lo traigo con el require("connect_db.php");
            $query5=pg_query($conexion,$sql5);

            while ($row5= pg_fetch_array ($query5)){
              $productos_disponibles=$row5['productos_disponibles'];
            }
            


$estatusDesactivado=0;//aqui cargo el valor dedesactivado del apartado correspondiente para despues Eliminarlo Logicamente
















////////////////////validaciones
$valida1="SELECT * FROM detalle_apartado WHERE id_usuario ='{$_SESSION['id_usuario']}' and estatus=1";

  $tot1 = pg_query($conexion,$valida1);
  $resul1 = pg_num_rows($tot1);

    $valida2="SELECT * FROM apartado WHERE id_apartado_usuario = '$id_apartado' and id_usuario ='{$_SESSION['id_usuario']}' and estatus=1";

      $tot2 = pg_query($conexion,$valida2);
      $resul2 = pg_num_rows($tot2);
           











//////////si hayregistro en apartado activo y registro en detalle producto activo se procede a desactivar ambos

if($resul1>=2){
          /////////cambiar estatus de detalle de apartado a 0 
          $sql3 = "UPDATE detalle_apartado SET estatus='$estatusDesactivado' WHERE id_apartado='$id_apartado' and id_usuario='{$_SESSION['id_usuario']}' and id_detalle_apartado='$id'";
          $result3=pg_query($conexion,$sql3);


          //codigo para modificar la cantidad del producto Disponible
          $productos_disponiblesAct=$productos_disponibles+$cantidadApartada;
             $sql1 = "UPDATE catalogo_venta SET productos_disponibles='$productos_disponiblesAct' WHERE id_producto_venta='$id_producto_venta'";
             $result=pg_query($conexion,$sql1);


          //--------------------el aviso de que se ejecuto el apartado-----------------------------------//

          if ($result==true and $result3==true){
             // proceso Apartado

             echo "<script>alert('usuario -$nombreUsuario $apellidoUsuario - Has Eliminado El Apartado del Producto Con el ID:  --$id--  Satifactoriamente!!!');
              window.location='../produApartados.php#ir';exit();</script>";exit();
                }else{
                  echo "no se puedo hacer el Proceso";
                }
      }















      if($resul1==1 and $resul2==1){
          //------------------update en el apartado y catalogo de producto--------------------------------------//
          $sql2 = "UPDATE apartado SET estatus='$estatusDesactivado' WHERE id_apartado_usuario='$id_apartado' and id_usuario='{$_SESSION['id_usuario']}' and estatus='1'";
          $result2=pg_query($conexion,$sql2);


          /////////cambiar estatus de detalle de apartado a 0 
          $sql3 = "UPDATE detalle_apartado SET estatus='$estatusDesactivado' WHERE id_detalle_apartado='$id' and id_usuario='{$_SESSION['id_usuario']}' and id_producto_venta='$id_producto_venta'";
          $result3=pg_query($conexion,$sql3);


          //codigo para modificar la cantidad del producto Disponible
          $productos_disponiblesAct=$productos_disponibles+$cantidadApartada;
             $sql1 = "UPDATE catalogo_venta SET productos_disponibles='$productos_disponiblesAct' WHERE id_producto_venta='$id_producto_venta'";
             $result=pg_query($conexion,$sql1);


          //--------------------el aviso de que se ejecuto el apartado-----------------------------------//

          if ($result==true and $result2==true and $result3==true){
             // proceso Apartado

             echo "<script>alert('usuario -$nombreUsuario $apellidoUsuario - Has Eliminado ElApartado del Producto Con el ID:  --$id--  Satifactoriamente!!!');
              window.location='../produApartados.php#ir';exit();</script>";
                }else{
                  echo "no se puedo hacer el Proceso";
                }
      }
























/*
//------------------update en el apartado y catalogo de producto--------------------------------------//
$sql2 = "UPDATE apartado SET estatus='$estatusDesactivado' WHERE id_apartado_usuario='$id'";
$result2=pg_query($conexion,$sql2);


//codigo para modificar la cantidad del producto Disponible

$productos_disponiblesAct=$productos_disponibles+$cantidadApartada;
   $sql1 = "UPDATE catalogo_venta SET productos_disponibles='$productos_disponiblesAct' WHERE id_producto_venta='$codigoProductoApartado'";
   $result=pg_query($conexion,$sql1);


//--------------------el aviso de que se ejecuto el apartado-----------------------------------//

if ($result==true or $result2==true){
   // proceso Apartado

   echo "<script>alert('usuario -$nombreUsuario $apellidoUsuario - Has Eliminado El Producto Con el ID:  --$id--  Satifactoriamente!!!');
    window.location='../produApartados.php#ir';exit();</script>";
			}else{
				echo "no se puedo hacer el Proceso";
			}

*/
pg_close($conexion);
 ?>