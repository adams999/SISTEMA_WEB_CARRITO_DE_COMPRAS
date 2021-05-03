<!DOCTYPE html>

<?php //esta es la validacion para el Administrador!!!!
session_start();
if ($_SESSION['id_usuarioA']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}
?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Productos Eliminados</title>
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/styleCatalogo.css">
    <link rel="icon" href="img/icono1.ico">
</head>
<body>
    <section class="container-fluid">
        
        <?php include('include/menuAdministrador.php'); ?>

    <article class="container">
     <div align="center" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p class="titulo1Catalogo">
            <a name="ir"></a>
            Productos Eliminados <i class="glyphicon glyphicon-trash"></i>
        </p>
    </div>

    


    <?php 

    
//se mostraran los productos mientras correspondan a la categoria filtrada y que su disponibilidad sea mayor a 0
    require("conexionBD/conexionBD.php");
    $sql="SELECT * FROM catalogo_venta where estatus=0 ORDER BY nombre_producto_v ASC";
    /* codigos de paginacion */
    $registros= pg_query($conexion,$sql);
    $num = pg_num_rows($registros);
    $pag = ceil($num / 10);

    @$prodIni=$_GET['ini'];
    @$prodFin=$_GET['fin'];

    echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='center' style='font-size:80%; color:green;'>
    $num Productos. En $pag Páginas. ";

    if (isset($prodIni) and isset($prodFin)) {
     echo "&nbsp;&nbsp;&nbsp;Articulos: $prodIni - $prodFin";
 }
 echo "</div>";
 echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><hr class="hr2"></div>';

 if(isset($_GET['ini'])){
    $ini=$_GET['ini'];
    $fin=$_GET['fin'];
    $sql="SELECT * FROM catalogo_venta where estatus=0 ORDER BY nombre_producto_v ASC LIMIT 10 offset $ini";
}else{
    $sql="SELECT * FROM catalogo_venta where estatus=0 ORDER BY nombre_producto_v ASC LIMIT 10 offset 0";
}


if ($num==0) {
    echo "<div align='center'><p><br><br><br><br>No Hay Productos Eliminados!!!</p></div>";
}

$query=pg_query($conexion,$sql);
	 while($arreglo=pg_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente para despues llamar la informacion que se necesite

//aqui se muestra la informacion correspondiente para el catalogo como imagen- precio- disponibiidad- y boton para ver la descripcion de cada producto
       echo '  <div class="container-fluid col-xs-12 col-sm-6 col-md-3 col-lg-3" >
       <div class="thumbnail div1">

        <img src="imagenesRepuestos/'.$arreglo['imagen'].'" class="imgCatalog">

        <div align="center">


            <p class="nomProd ">
                '.$arreglo['nombre_producto_v'].'
            </p>




            <p class="PrecProd">Bs:&nbsp; '.$arreglo['pvp'].'</p>
            <p>

                <label class="disponibles">
                    Disp.:&nbsp; '.$arreglo['productos_disponibles'].'&nbsp;&nbsp;&nbsp;
                </label>
                <a href="modificar/restaurarProducto.php?id='.$arreglo['codigo_producto_v'].'"">
                    <button class="btn BotDescrip">
                        Activar <i class="glyphicon glyphicon-ok"></i>
                    </button>
                </a>&nbsp;&nbsp;&nbsp;

            </p>
        </div>
    </div><br>
</div>';     
}
echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><hr class="hr2"></div>';

echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center" style="color:green">Pag.';
for($c=1;$c<=$pag;$c++){
    $ini=$c*10-10;
    $fin=$ini+9;
    echo ' <a href="produElimAdmin.php?ini='.$ini.'&fin='.$fin.'#ir">'.$c.'</a>&nbsp;&nbsp;';
}
echo '</div>';

pg_close($conexion);
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
