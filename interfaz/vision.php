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
    <title>Nuestra Visión</title>
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
            Nuestra Visión!
        </p><br>                    
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 vertical-centered-text" align="right">
        <p>
            <img id="imagen" class="imgScriptVision" align="center">
        </p>

    </div>

    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6 vertical-centered-text" align="justify">
        <p class="parrafo3">
            <b> REPUESTOS YURAL C.A.</b> Ser la mejor empresa distribuidora de repuestos automotrices en Venezuela, brindando un excelente servicio en venta y post-venta, generando valor agregado para nuestros clientes y la sociedad.
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
<script src="js/scriptVision.js"></script>
</body>
</html>
