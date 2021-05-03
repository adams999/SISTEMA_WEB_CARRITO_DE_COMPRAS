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
?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Nuestra Misión</title>
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style1.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="img/icono1.ico">
</head>
<body>
    <section class="container-fluid">
        
        <?php include'include/menuUsuario.php'; ?>

<article class="container-fluid">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
        <br>
        <p class="titulo1">
            Nuestra Misión!
        </p><br>                    
    </div>

    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6 vertical-centered-text" align="justify">
        <p class="parrafo3">
            En <b>REPUESTOS YURAL C.A.</b> Somos una empresa dedicada a atender las necesidades de repuestos y servicios en el mercado Motociclista a través del mejor equipo humano, brindando un excelente servicio de venta y post venta a nuestros clientes. Somos distribuidores de repuestos originales y alternativos de calidad a precios competitivos.
        </p>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 vertical-centered-text">

        <p>
            <img id="imagen" class="imgScriptMision" align="center">
        </p>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <br><br><br><br><br><br><br><br><br> <br>
    </div>


</article>
<?php 
        require("include/piePagina.php");
         ?>
</section>


<script src="../lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>    
<script src="js/scriptMision.js"></script>
</body>
</html>
