<!DOCTYPE html>

<?php //esta es la validacion para los Usuarios!!!!
session_start();
if ($_SESSION['correo_usuario']) {
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
    <title>Repuestos Yural</title>
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <link rel="stylesheet" type="text/css" href="css/styleCatalogo.css">
    <link rel="icon" href="img/icono1.ico">
</head>
<body>
    <section class="container-fluid">
        
    <?php include'include/menuUsuario.php'; ?>














<div class="bs-example" style="padding-top:20px">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>   
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner" align="center">
            <div class="item active">
                <img src="imgCarousel/1.jpg" alt="First Slide" style="color: white;" width="80%">
                <div>
                    <h3>Accesorios</h3>
                    <p>Diferentes Marcas</p>
                </div>
            </div>
            <div class="item">
                <img src="imgCarousel/2.jpg" alt="Second Slide" style="color: white;" width="80%">
                <div>
                    <h3>Cauchos para tu Moto</h3>
                    <p>Varias Medidas</p>
                </div>
            </div>
            <div class="item">
                <img src="imgCarousel/3.jpg" alt="Third Slide" style="color: white;" width="80%">
                <div>
                    <h3>Manten Tu Moto en Buen Estado!</h3>
                    <p>Comunicate Con Nosotros</p>
                </div>
            </div>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
































<article class="row">
    <div class="col-lg-12">
        <p align="center" class="titulo1"><i class="asterisco glyphicon glyphicon-asterisk"></i> Todo lo que Buscas para tu Moto!!!</p>
    </div>


    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12"><br>
        <p align="center" class="titulo2"> Yural C.A. Comprometidos con UD!</p><br>
        <p align="justify" class="parrafo1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; En Repuestos Yural C.A. Somos Una Empresa Dedicada a la Distribución de Repuestos de Motocicletas, Ofreciendo Disponibilidad En Repuestos a Venezolanos, Que Laboran Día Día Con Sus Motos, Es Por Ello Que Hoy En Día Nuestra Empresa Pone En Disposición Gran Parte de Repuestos En Marcas Utilizadas Y Demandadas En El Mercado Venezolano Como: MD, SUZUKI, BERA, EMPIRE KEEWAY, SKYGO.  Además Brindamos una Excelente Calidad de Servicio, Digital y Física a todos Nuestros Usuarios Ya Que Además De Nuestro Sistema Web, También Disponemos del Contacto Físico A través De Nuestra Tienda Física Ubicada En El Estado Táchira, Puedes Ver Todos Nuestros Datos De Contacto A través De la Opción Información De Yural/Contacto y Nuestra Ubicación.... Nuestra Empresa le hace llegar los más Gratos Saludos por Hacer uso de Nuestro Sistema Web.</p>

    </div>


    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12" align="center">

        <br><br>
            <img id="imagen" class="imgScript" align="center"
        <br><br><br>


    </div><hr class="hr1"><br>

    <div align="center" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <a href="#"><p class="titulo2"><b><i class="glyphicon glyphicon-usd"></i> Productos Mas Vendidos</b></p>
        </div>


        <div class="container">


          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br></div>

          <?php 

          echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><hr class="hr2"></div>';
//se mostraran los productos mientras correspondan a la categoria filtrada y que su disponibilidad sea mayor a 0




          require("conexionBD/conexionBD.php");
          $sql3=("SELECT * FROM catalogo_venta WHERE productos_disponibles>'0' and productos_vendidos>='1' and estatus=1 ORDER BY id_producto_venta DESC LIMIT 4");

                //la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
          $query3=pg_query($conexion,$sql3);



                while($arreglo3=pg_fetch_array($query3)){//este arreglo ordena la informacion del array correspondiente para despues llamar la informacion que se necesite

//aqui se muestra la informacion correspondiente para el catalogo como imagen- precio- disponibiidad- y boton para ver la descripcion de cada producto


                    echo '  <div class="container-fluid col-xs-12 col-sm-6 col-md-3 col-lg-3" >
                    <div class="thumbnail div1">
                        <a href="descriProd.php?id='.$arreglo3['id_producto_venta'].'#ir">
                            <img src="imagenesRepuestos/'.$arreglo3['imagen'].'" class="imgCatalog">
                        </a>
                        <div align="center">

                            <a href="descriProd.php?id='.$arreglo3['id_producto_venta'].'#ir">
                                <p class="nomProd ">
                                    '.$arreglo3['nombre_producto_v'].'
                                </p>
                            </a>



                            <p class="PrecProd">Bs:&nbsp; '.$arreglo3['pvp'].'</p>
                            <p>

                                <label class="disponibles">
                                    Disp.:&nbsp; '.$arreglo3['productos_disponibles'].'&nbsp;&nbsp;
                                </label>
                                <a href="descriProd.php?id='.$arreglo3['id_producto_venta'].'#ir">
                                    <button class="btn BotDescrip">Descripción</button>
                                </a>
                            </p>
                        </div>
                    </div><br>
                </div>';   
            }


            echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><hr class="hr2"></div>';
            ?>


        </article>
        
        <?php 
        require("include/piePagina.php");
         ?>
</section>


<script src="../lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>  
<script type="text/javascript" src="js/imgPagPrinc.js"></script>
 
</body>
</html>
