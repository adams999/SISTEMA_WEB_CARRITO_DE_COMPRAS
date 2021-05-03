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
    $rif_empresa=$aaa['rif_empresa'];
    $nombre_empresa=$aaa['nombre_empresa'];
    $direccion_empresa=$aaa['direccion_empresa'];
    $telefono_empresa=$aaa['telefono_empresa'];
    $correo_empresa=$aaa['correo_empresa'];
    $nombre_empresa=$aaa['nombre_empresa'];
}
?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Nuestra Ubicación</title>
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style1.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="img/icono1.ico">
</head>
<body>
    <section class="container-fluid">
        
        <?php include'include/menuUsuario.php'; ?>

<article class="container-fluid">

<p class="titulo1" align="center"><img src="img/icono1.ico" width="80px"> &nbsp; Nuestra Ubicación &nbsp; <img src="icon/nuestraUbicacion.png"></p>

    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 container container-fluid"><br><br><br>
        <p class="titulo2" align="center">Ubica Nuestra Tienda Comercial AQUI!!!<br><br></p>
        <p align="center" class="parrafUbicacion">
            <b><?php echo "$nombre_empresa      $rif_empresa"; ?></b>
        </p><br>
        <p align="center" class="parrafUbicacion">
            <b>Dirección:</b> <?php echo "$direccion_empresa"; ?><br><br><br>
            <b>Horario de Atención al Cliente</b><br><br>
            <b>Días:</b> <i>Lunes a Viernes:</i><br>
            <b>Horario:</b> 9:00am. a 12:30pm.  -&nbsp;  2:00pm. a 5:30pm.<br>
            <b>Días:</b> <i>Sabados:</i><br>
            <b>Hora:</b> 9:00am a 1:00pm.
        </p><br><br>
        <p align="center" class="parrafUbicacion">
            <b>Telefono: </b><?php echo $telefono_empresa; ?> <b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Correo: </b><?php echo "$correo_empresa"; ?>
        </p>
    </div>

    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 container container-fluid" align="center"><br><br><br>
        <p class="titulo2" align="center">Mapa de Nuestra Ubicación<br><br></p>
        <p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1703.8230562460476!2d-72.22748080670219!3d7.759963358960144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1ses!2sve!4v1479240992755" width="450" height="350" frameborder="3" style="border:3; border-radius: 3px; border-color: #0089C5; margin: 10px" allowfullscreen></iframe>
        </p>
    </div>




</article>
<?php 
        require("include/piePagina.php");
         ?>
</section>


<script src="../lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>  
</body>
</html>
