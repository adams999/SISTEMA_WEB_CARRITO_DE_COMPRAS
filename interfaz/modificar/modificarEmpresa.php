<?php 

session_start();
if ($_SESSION['correo_usuarioA']) {

}else {
    header("Location:../index.php");
}

require("../conexionBD/conexionBD.php");

//aqui recibo los datos que paso por el formulario de informacionYural
$rifEmpresa=$_POST['rifEmpresa'];
$prefRif=$_POST['prefRif'];
$rifEmpresa=$prefRif.$rifEmpresa;
$direccionEmpresa=$_POST['direccionEmpresa'];
$nombreEmpresa=$_POST['nombreEmpresa'];
$telefonoEmpresa=$_POST['telefonoEmpresa'];
$cod_telef_empr=$_POST['cod_telef_empr'];
$telefonoEmpresa=$cod_telef_empr.'-'.$telefonoEmpresa;
$correoEmpresa=$_POST['correoEmpresa'];

//este es el procedimiento para el cambio de datos de la informacion de yural
$valida2="SELECT * FROM empresa";

$tot2 = pg_query($conexion,$valida2);

$resul2 = pg_num_rows($tot2);



if ($rifEmpresa==null or $direccionEmpresa==null or $nombreEmpresa==null or $telefonoEmpresa==null or $correoEmpresa==null) {
	echo "<script>alert('PORF FAVOR Completa Todos Los Campos De La Tienda Ya Que Son Obligatorios!!');
			window.location='../informacionYural.php';exit();</script>";exit();
}

else
{ 
$sql2 = "UPDATE empresa SET rif_empresa='$rifEmpresa', nombre_empresa='$nombreEmpresa', direccion_empresa='$direccionEmpresa', telefono_empresa='$telefonoEmpresa', correo_empresa='$correoEmpresa'";


   $result=pg_query($conexion,$sql2);
   

//si se pudieron realizar los cambios saldra este aviso automaticamente
   if (isset($result)) {
   	echo "<script>alert('ENHORABUERA!!! Has Modificado Los Datos Internos de la Empresa Yural C.A.');
			window.location='../informacionYural.php';exit();</script>";

            }
 
}

 ?>