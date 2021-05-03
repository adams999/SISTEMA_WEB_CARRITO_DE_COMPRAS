<?php 
extract($_GET);


session_start();
if ($_SESSION['correo_usuarioA'] and $id) {

}else {
    header("Location:../index.php");
}
    

require("../conexionBD/conexionBD.php");



//aqui recibo los datos que paso por el formulario de modificarProveedores

$id_usuario_admin=$_SESSION['id_usuarioA'];//aqui almaceno el nombre del administrador logueado para despues almacenar el nombre del mismo y saber quien fue el que modifico el proveedor
$nombre_proveedor=$_POST['nombre_proveedor'];
$direccion_proveedor=$_POST['direccion_proveedor'];
$razon_social_proveedor=$_POST['razon_social_proveedor'];
$ceduRif=$_POST['ceduRif'];
$razon_social_proveedor=$ceduRif.$razon_social_proveedor;
$telef_proveedor=$_POST['telef_proveedor'];
$pref_telef_prov=$_POST['pref_telef_prov'];
$telef_proveedor=$pref_telef_prov.'-'.$telef_proveedor;
$correo_proveedor=$_POST['correo_proveedor'];
$tipo_producto=$_POST['tipo_producto'];


//aqui ago la comparacion y validacion si el correo del proveedor ya exuste no me deje guardar Elmismo correo Otra ves ni la misma razon social

$valida1="SELECT * FROM proveedores WHERE razon_social_proveedor='$razon_social_proveedor' and id_proveedor !='$id'";

$valida2="SELECT * FROM proveedores WHERE correo_proveedor='$correo_proveedor' and id_proveedor!='$id'";

$valida3="SELECT * FROM proveedores WHERE nombre_proveedor='$nombre_proveedor' and id_proveedor!='$id'";

$tot1 = pg_query($conexion,$valida1);
$tot2 = pg_query($conexion,$valida2);
$tot3 = pg_query($conexion,$valida3);

$resul1 = pg_num_rows($tot1);
$resul2 = pg_num_rows($tot2);
$resul3 = pg_num_rows($tot3);


if ($resul1>=1) {
    echo "<script>alert('ATENCIÓN!: La Razón Social $razon_social_proveedor Ya se Encuentra Registrada Por Favor Verifique Datos');
            window.location='../modificarProveedor.php?id=$id#ir';exit()</script>";exit();
}



//aviso de q el correo ya esta resgistrado y no me dejara modificar ningun dato
if($resul2>=1){
        echo "<script>alert('ATENCIÓN!: El Correo de Proveedor -$correo_proveedor- se Encuentra Existente Porfavor Verifique Datos');
            window.location='../modificarProveedor.php?id=$id#ir';exit()</script>";exit();
        }

if($resul3>=1){
        echo "<script>alert('ATENCIÓN!: El Nombre del Proveedor -$nombre_proveedor- se Encuentra Existente Porfavor Verifique Datos');
            window.location='../modificarProveedor.php?id=$id#ir';exit()</script>";exit();
        }



//si la validacion de ariiba no se ejecuta se porcedera a realizar los cambios en el proveedor
else{

$sql2 = "UPDATE proveedores SET id_usuario_a='$id_usuario_admin', nombre_proveedor='$nombre_proveedor', razon_social_proveedor='$razon_social_proveedor', direccion_proveedor='$direccion_proveedor', telef_proveedor='$telef_proveedor', tipo_producto='$tipo_producto', correo_proveedor='$correo_proveedor' where id_proveedor='$id'";


   $result=pg_query($conexion,$sql2);
   

//si se pudieron realizar los cambios saldra este aviso automaticamente
   if (isset($result)) {
   	echo "<script>alert('ENHORABUERA!!!  Has Modificado el Proveedor del id:  -$id-  SATISFACTORIAMENTE   Su Nombre Es:  -$nombre_proveedor-  Dirección:  -$direccion_proveedor-  Razón Social:  -$razon_social_proveedor-  Telefono Proveedor:  -$telef_proveedor-  Correo Proveedor:  -$correo_proveedor-  Y el Tipo de Producto que Distribuye es:  -$tipo_producto-');
			window.location='../listaProveedores.php#ir';exit();</script>";

            }
 }

pg_close($conexion);
 ?>