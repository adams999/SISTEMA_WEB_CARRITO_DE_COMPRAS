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
$nombre_proveedor = $_POST["nombre_proveedor"];
$direccion_proveedor = $_POST["direccion_proveedor"];
$razon_social_proveedor =$_POST["razon_social_proveedor"];
$prefCeduRif=$_POST["prefijoCedula"];
$razon_social_proveedor=$prefCeduRif.$razon_social_proveedor;
$telef_proveedor = $_POST["telef_proveedor"];
$pref_telef_prov = $_POST["pref_telef_prov"];
$telef_proveedor=$pref_telef_prov.-$telef_proveedor;
$correo_proveedor = $_POST["correo_proveedor"];
$tipo_producto = $_POST["tipo_producto"];
$id_usuario_a = $_SESSION['id_usuarioA'];
$estatusActivo=1;

//vALIDACION POR PARTE DE PHP PARA QUE TODOS LOS CAMPOS ESTES LLENOS Y SE EJECUTE EL PROCESO DE REGISTRO
if ($nombre_proveedor==null or $direccion_proveedor==null or $razon_social_proveedor==null or $telef_proveedor==null or $correo_proveedor==null or $tipo_producto==null) {
    echo "<script>alert('Por Favor Completa Todos los Campos para Continuar con el Registro');
                   window.location='../registroProveedor.php#ir';</script>";
    }
            $valida1="SELECT * FROM proveedores WHERE nombre_proveedor = '$nombre_proveedor'";
          	$valida2="SELECT * FROM proveedores WHERE correo_proveedor = '$correo_proveedor'";
          	$valida3="SELECT * FROM proveedores WHERE razon_social_proveedor = '$razon_social_proveedor'";      

            $tot1 = pg_query($conexion,$valida1);
            $tot2 = pg_query($conexion,$valida2);
            $tot3 = pg_query($conexion,$valida3);
            
             $resul1 = pg_num_rows($tot1);
             $resul2 = pg_num_rows($tot2);
             $resul3 = pg_num_rows($tot3);
                

                if ($resul1 >=1) {
                  echo "<script>alert('ATENCIÓN!: El Nombre del Proveedor -$nombre_proveedor- Se Encuentra Existente Por Favor Verifique Datos');
                   window.location='../registroProveedor.php#ir';</script>";exit();
                }


                if($resul2 >= 1){
                   echo "<script>alert('ATENCIÓN!: El Correo de Proveedor -$correo_proveedor- Se Encuentra Existente Por Favor Verifique Datos');
                   window.location='../registroProveedor.php#ir';</script>";exit();
                 }   

                if($resul3 >= 1){
                   echo "<script>alert('ATENCIÓN!: Razon Social -$razon_social_proveedor- Se Encuentra Existente Por Favor Verifique Datos');
                   window.location='../registroProveedor.php#ir';</script>";exit();
                 }  
                
                if ($resul2 <= 0 and $resul3 <= 0) {      //SI NO HAY NI 1 O MAS RESULTADOS REPETIDOS SE GUARDAN LOS DATOS EN LA BASE DE DATO Y TABLA CORRESPONDIENTE
    		// sentencia sql
    		$insertar = "INSERT INTO proveedores (id_usuario_a, nombre_proveedor, razon_social_proveedor, direccion_proveedor, telef_proveedor, tipo_producto, correo_proveedor, estatus)

    	 		VALUES

    		('$id_usuario_a', '$nombre_proveedor', '$razon_social_proveedor', '$direccion_proveedor', '$telef_proveedor', '$tipo_producto', '$correo_proveedor', '$estatusActivo')";
    			}
        



//verificar consulta
$resultado = pg_query($conexion,$insertar);
if($resultado){
			 	echo "<script>alert('El Proveedor - $nombre_proveedor - se Registró Satisfactoriamente');
				window.location='../registroProveedor.php#ir';
				</script>";
}
	else{
 echo "error en Registro";
}

//cerrar la conexion
pg_close($conexion);
?>