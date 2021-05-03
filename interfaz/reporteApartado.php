<?php //esta es la validacion para los Usuarios!!!!
session_start();
if ($_SESSION['id_usuarioA']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}

ob_start();//esta funcion cargo todo lo que me mostrara el llamado de los productos apartados para despues guardarlo en pdf y se pueda generar el archivo

$nombreUsuario=$_SESSION['nombre_usuario'];
$apellidoUsuario=$_SESSION['apellido_usuario'];
date_default_timezone_set('America/Caracas');
 $FechaHoraReporte= date('d/m/Y H:i');

?>

<html>
	<head>
	 	<meta charset="utf-8">
	 	<link rel="stylesheet" type="text/css" href="css/estiloReporte.css">
	 	<link rel="icon" href="img/icono1.ico">
	 	<title>Apartados <?php echo $nombreUsuario; ?></title>
	</head>
<body>


	 
<?php 
extract($_GET);
require("conexionBD/conexionBD.php");


$sql2=("SELECT * FROM empresa ");

//la variable  $mysqli viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
$query2=mysqli_query($conexion,$sql2);

								                 
while($arreglo2=mysqli_fetch_array($query2)){
								        	
$rifEmpresa=$arreglo2['rif_empresa'];
$nombreEmpresa=$arreglo2['nombre_empresa'];
$direccionEmpresa=$arreglo2['direccion_empresa'];
$telefonoEmpresa=$arreglo2['telefono_empresa'];
$correoEmpresa=$arreglo2['correo_empresa'];
$cuenta1=$arreglo2['cuenta_1'];
$cuenta2=$arreglo2['cuenta_2'];

}
//aqui muestro los datos de la empresa
echo "
		<p class='TituloReporte' align='center'>
			<img src='img/logo1.jpg' width='80px'> 
			$nombreEmpresa &nbsp;&nbsp;&nbsp; Rif: $rifEmpresa.</p>

<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
	<p align='center' class='Empresa'>
		<b class='tituloDescrip'>Direccion:</b> $direccionEmpresa
	</p>
	<p align='center' class='Empresa'>
		<b class='tituloDescrip'>Telefono:</b> $telefonoEmpresa&nbsp;&nbsp;&nbsp; <b class='tituloDescrip'>Email:</b> $correoEmpresa
	</p><br>
	<p align='center' class='Empresa'>
		<b class='tituloDescrip'>Cuenta 1:</b> $cuenta1
	</p>
	<p align='center' class='Empresa'>
		<b class='tituloDescrip'>Cuenta 2:</b> $cuenta2
	</p><br>
	<p class='TituloReporte' align='center'>
		Nota De Apartado</p>

		
	<p align='center' class='Empresa'><b class='tituloDescrip'><br><br><br><br>
		Apartado Por:</b>$nombreUsuario $apellidoUsuario <b class='tituloDescrip'> CI:</b>$id 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 	<b class='tituloDescrip'>Generado El Día:</b> $FechaHoraReporte
	</p>
</div>";

 
//emcabezado de la descripcion de los apartados
echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="table tableReporte" align="center">
                <tr class=" btn-primary trTitulo" align="center">
                    <td class="titulo" width="50">
                    	N°<br>Apartado
                    </td>
                    <td class="titulo" width="70">Cod Producto</td>
                    <td class="titulo" width="175">Nombre Producto</td>
                    <td class="titulo" width="85">Fecha Apartado</td>
                    <td class="titulo" width="40">Cant</td>
                    <td class="titulo" width="80">Precio Total BS.</td>
                </tr>
            </table>
        </div>';

$sql=("SELECT * FROM apartado where cedula_usuario='$id' and estatus=1 ORDER BY nombre_producto ASC");
		    
//la variable  $mysqli viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
$query=mysqli_query($conexion,$sql);

$acumulador=0;	
$acumuladorCant=0;	                 
while($arreglo=mysqli_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
$numApartado=$arreglo['numero_apartado'];
$cedulaUsuario=$arreglo['cedula_usuario'];
$nomUsuario=$arreglo['nombre_usuario'];
$codProd=$arreglo['codigo_productoV'];
$imagen=$arreglo['imagen'];
$nomProd=$arreglo['nombre_producto'];
$cantApartada=$arreglo['cantidad_apartada'];
$precioTotal=$arreglo['precio_prod_total'];
$dateTime=$arreglo['fecha_hora_apartado'];


//aqui muestro el tr con los apartados correspondientes del usuario logueado
echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
			<table class="table table" align="center">
			    <tr class="parrafo" align="justify">
			        <td width="50" align="center">'.$numApartado.'</td>
			        <td width="70" align="center">'.$codProd.'</td>   
			        <td width="175" align="center">'.$nomProd.'</td>
			        <td width="85" align="center">'.$dateTime.'</td>
			        <td width="40" align="center">'.$cantApartada.'</td>
			        <td width="80" align="center">BS: '.$precioTotal.'</td>
			    </tr> 
			</table>
		</div>';
$precioTotal=str_replace(array(' ','-','.'), '', $precioTotal);
$acumulador+=$precioTotal;
$acumuladorCant+=$cantApartada;
}$acumulador=number_format($acumulador,2,",",".");


echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
			<table class="table table" align="center">
			    <tr class="parrafo" align="justify">
			        <td width="357" class="parrafoInterno" align="center">Gracias Por su Tiempo.<br> Puedes Imprimir Este Reporte Como Constancia de Apartado. <br> Por Favor  Comunicarse Con Nosotros A Traves Nuestros Datos<br> Ubicados en Esta Planilla</td>
			        <td width="50" class="totCant" align="center"><b>Cant: '.$acumuladorCant.'<br>Total:  </b></td>
			        <td width="100" align="center"><b>BS.:'.$acumulador.'</b></td>   
			    </tr> 
			</table>
		</div>';
?>
	 </body>
</html>





<?php
    require_once('../lib/dompdf/autoload.inc.php');
    use Dompdf\Dompdf;

    $dompdf=new Dompdf();
    $dompdf->set_option('defaultFont','arial');

    $dompdf->loadHtml(ob_get_clean());
    //'a4' just a test of paper size...
    $dompdf->setPaper('carta','portrait');

    $dompdf->render();
    $pdf=$dompdf->output();
    $filename="ApartadoYural.".$id; 
    $dompdf->stream($filename); 
?>











