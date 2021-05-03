<?php 
extract($_GET);

session_start();//aqui se inicia la session con las variables del usuario logueado
if ($_SESSION['id_usuarioA'] and $id) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:../index.php");
}

$estatusVendido=10;
//-------------------------------------------------------------------------------------------//

        require("../conexionBD/conexionBd.php");


$sql2=("SELECT * FROM ventas_productos where id_venta_producto='$id'");

//la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
$query2=pg_query($conexion,$sql2);

//con este array cargo los datos personales del usuario para despues mostrar la informacion del mismo 

while($arreglo2=pg_fetch_array($query2)){
      $id_apartado=$arreglo2['id_apartado'];
}









          /////////cambiar estatus de detalle de apartado a 0 
          $sql3 = "UPDATE ventas_productos SET estatus='$estatusVendido' WHERE id_venta_producto='$id'";
          $result3=pg_query($conexion,$sql3);


          //codigo para modificar la cantidad del producto Disponible
             $sql1 = "UPDATE apartado SET estatus='$estatusVendido' WHERE id_apartado_usuario='$id_apartado'";
             $result=pg_query($conexion,$sql1);


              ///
             $sql4 = "UPDATE detalle_apartado SET estatus='$estatusVendido' WHERE id_apartado='$id_apartado'";
             $result4=pg_query($conexion,$sql4);


          //--------------------el aviso de que se ejecuto el apartado-----------------------------------//

          if ($result==true and $result3==true and $result4){
             // proceso Apartado

             echo "<script>alert('Administrador {$_SESSION['nombre']} {$_SESSION['apellido']} Has Calificado La Venta Con el ID:  --$id-- como Concretada Satifactoriamente!!!');
              window.location='../ventasConcretasAdmin.php#ir';exit();</script>";exit();
                }else{
                  echo "no se puedo hacer el Proceso";
                }
      

pg_close($conexion);
 ?>