<!DOCTYPE html>

<?php //esta es la validacion para los Usuarios!!!!
session_start();
if ($_SESSION['correo_usuarioA']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}
require("conexionBD/conexionBD.php");

$nombreAdmin=$_SESSION['nombre'];

?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>-ADMIN- Busqueda</title>
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <link rel="stylesheet" type="text/css" href="css/styleCatalogo.css">
    <link rel="icon" href="img/icono1.ico">
</head>
<body>
    <section class="container-fluid">
        
        <?php include('include/menuAdministrador.php'); ?>

    <article class="container">





        <?php 
$buscar=$_POST['buscar'];//aqui recibo la palabra clave para hacer el buscador 

if ($buscar==null or $buscar==' ' or $buscar=='.' or $buscar=='@' or $buscar==',' or $buscar==';' or $buscar=='-' or $buscar=='_' or $buscar=='{' or $buscar=='}') {
    echo "<script>alert('-$nombreAdmin- Por Favor Ingresa Datos Válidos Para Proceder Con la Búsqueda.');
    window.location='indexAdmin.php';exit();</script>";exit();
}


require("conexionBD/conexionBD.php");


//esta es la sentencia para poder ejecutar y mostrar el buscador el operador ~* es para que no sea sensible a mayusculas y a minusculas
$result=("SELECT * FROM catalogo_venta WHERE nombre_producto_v ~* '$buscar' or marca ~* '$buscar' or descripcion ~* '$buscar' and estatus=1 ORDER BY nombre_producto_v ASC"); 

$query=pg_query($conexion,$result);




echo '<div align="center" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<p class="titulo1Catalogo">
    <i class="glyphicon glyphicon-search"></i> Resultados de: &nbsp;&nbsp;&nbsp;'.$buscar.'
</p>
</div>';

echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><hr class="hr2"></div>';


$cantidad=pg_num_rows($query);
if ($cantidad==0)
{
    echo "<h1 align='center'> No se Encontro Ningún Resultado! </h1> \n";
}


                 while($arreglo=pg_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente para despues llamar la informacion que se necesite

//aqui se muestra la informacion correspondiente para el catalogo como imagen- precio- disponibiidad- y boton para ver la descripcion de cada producto


                    echo '  <div class="container-fluid col-xs-12 col-sm-6 col-md-3 col-lg-3" >
                    <div class="thumbnail div1">
                        <a href="modProdADMIN.php?id='.$arreglo['id_producto_venta'].'#ir">
                            <img src="imagenesRepuestos/'.$arreglo['imagen'].'" class="imgCatalog">
                        </a>
                        <div align="center">

                            <a href="modProdADMIN.php?id='.$arreglo['id_producto_venta'].'#ir">
                                <p class="nomProd ">
                                    '.$arreglo['nombre_producto_v'].'
                                </p>
                            </a>



                            <p class="PrecProd">Bs:&nbsp; '.$arreglo['pvp'].'</p>
                            <p>

                                <label class="disponibles">
                                    Disp.:&nbsp; '.$arreglo['productos_disponibles'].'&nbsp;&nbsp;&nbsp;
                                </label>
                                <a href="modProdADMIN.php?id='.$arreglo['id_producto_venta'].'#ir">
                                    <button class="btn BotDescrip">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </button>
                                </a>&nbsp;&nbsp;&nbsp;

                                <a href="modificar/borrarProducto.php?id='.$arreglo['id_producto_venta'].'">
                                    <button class="btn btn-link" style="color:red;">
                                        <i class="glyphicon glyphicon-trash "></i>
                                    </button>
                                </a>
                            </p>
                        </div>
                    </div><br>
                </div>';     
            }


            if ($query==null) {
               echo "no se encontraron resultados";
           }
           echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><hr class="hr2"></div>';


           ?>



           <br><br><br><br>


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
