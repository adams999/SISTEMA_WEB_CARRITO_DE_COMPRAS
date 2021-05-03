<!DOCTYPE html>

<?php //esta es la validacion para los Usuarios!!!!
session_start();
if ($_SESSION['id_usuario']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}
require("conexionBD/conexionBD.php");
$acumulador=0;  
$cedula=$_SESSION['cedula_usuario'];
$sql=("SELECT * FROM apartado where cedula_usuario='$cedula' and estatus=1");

//la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
@$query=pg_query($conexion,$sql);


while(@$arreglo=pg_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
    $cantApartada=$arreglo['cantidad_apartada'];
    $acumulador+=$cantApartada;
}




$qq=("SELECT * FROM empresa");

//la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
@$ww=pg_query($conexion,$qq);


while(@$aaa=pg_fetch_array($ww)){//este aaa ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
    $correo_empresa=$aaa['correo_empresa'];
}
?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Contacta Con Nosotros</title>
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style1.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="img/icono1.ico">
</head>
<body>
    <section class="container-fluid">
       
       <?php include'include/menuUsuario.php'; ?>

<article class="container-fluid">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">

        <p class="titulo1">
            Contacta con nosotros a traves de:
        </p>                    
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 vertical-centered-text " align="right">
        <br><br>
        <p style="color: #3B5998;font-size: 14pt"><b>FACEBOOK &nbsp; </b> </p>
        <a href="http://www.facebook.com/yuralrepuestos"  target="_blank">
            <img src="icon/facebook.png" style="border-radius: 15px; width:110px">
        </a>

    </div>

    <div class="col-lg-9 col-md-8 col-sm-6 col-xs-6 vertical-centered-text ">

        <p class="parrafo2">
            <a href="http://www.facebook.com/yuralrepuestos" class="parrafo2"  target="_blank">
                <b> YURAL C.A.</b> Para que estes mas informado de las actividades de la empresa y promosiones de la misma!   Presiona Aqui!! y Siguenos!
            </a>
        </p>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 vertical-centered-text " align="right">

        <p style="color: #C8C827;font-size: 14pt"><b>MERCADO &nbsp; LIBRE &nbsp; </b> </p>
        <a href="http://perfil.mercadolibre.com.ve/REPUESTOSYURAL"  target="_blank">
            <img src="icon/mercadolibre.png" style="border-radius: 15px; width:110px" >
        </a>

    </div>

    <div class="col-lg-9 col-md-8 col-sm-6 col-xs-6 vertical-centered-text">

        <p class="parrafo2">
            <a href="http://perfil.mercadolibre.com.ve/REPUESTOSYURAL" class="parrafo2"  target="_blank">
                <b>REPUESTOS YURAL C.A.</b> Puedes ver nuestros productos a travez de nuestro catalogo en MERCADO LIBRE. Aqui!!!
            </a>
        </p>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 vertical-centered-text " align="right">

        <p style="color: #C11E1E;font-size: 14pt"><b>GMAIL &nbsp;</b> </p>
        <a href="mailto:yuralrepuestos@gmail.com"  target="_blank">
            <img src="icon/gmail.png" style="border-radius: 15px; width:110px">
        </a>

    </div>

    <div class="col-lg-9 col-md-8 col-sm-6 col-xs-6 vertical-centered-text">

        <p class="parrafo2">
            <a href="mailto:yuralrepuestos@gmail.com" class="parrafo2"  target="_blank">
                Además puedes escribirnos a traves de nuestro correo <b><?php echo "$correo_empresa"; ?></b> para poder atender tus inquietudes...
            </a>
        </p>
    </div>





</article>
<?php 
        require("include/piePagina.php");
         ?>
</section>


<script src="../lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>    
<script src="js/ScriptImgYural.js"></script>
</body>
</html>
