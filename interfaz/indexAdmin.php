
<!DOCTYPE html>

<?php //esta es la validacion para el Administrador!!!!
session_start();
if ($_SESSION['id_usuarioA']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}
require("conexionBD/conexionBD.php");



$acumulador=0;  
$sql=("SELECT * FROM apartado where estatus=1");

//la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
@$query=pg_query($conexion,$sql);


while(@$arreglo=pg_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
    $estatus2=$arreglo['estatus'];
    
    $acumulador+=$estatus2;
}



$acumuladorVenta=0;  
$sql1=("SELECT * FROM ventas_productos where estatus=2");

//la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
@$query1=pg_query($conexion,$sql1);
while(@$arreglo1=pg_fetch_array($query1)){//este arreglo ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
    $cantidadPaga=$arreglo1['estatus'];
    $cantidadPaga=($cantidadPaga-1);
    $acumuladorVenta+=$cantidadPaga;
}


$acumuladorComentario=0;  
$sql4=("SELECT * FROM opiniones where estatus=1");

//la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
@$query4=pg_query($conexion,$sql4);


while(@$arreglo4=pg_fetch_array($query4)){//este arreglo ordena la informacion del array correspondiente a los comentarios para despues llamar la informacion que se necesite
    $cantComenario=$arreglo4['estatus'];
    $acumuladorComentario+=$cantComenario;
}


$acumProvElim=0;  
$sql5=("SELECT * FROM proveedores where estatus=0");

//la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
@$query5=pg_query($conexion,$sql5);

while(@$arreglo4=pg_fetch_array($query5)){//este arreglo ordena la informacion del array correspondiente a los proveedores para despues llamar la informacion que se necesite
    $cantElim=@$arreglo5['estatus'];
    $acumProvElim+=($cantElim+1);
}


$acumElimProd=0;  
$sql5=("SELECT * FROM catalogo_venta where estatus=0");

//la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
@$query5=pg_query($conexion,$sql5);

while(@$arreglo4=pg_fetch_array($query5)){//este arreglo ordena la informacion del array correspondiente a los proveedores para despues llamar la informacion que se necesite
    $cantElimProd=@$arreglo5['estatus'];
    $acumElimProd+=($cantElimProd+1);
}

?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>-ADMIN- Repuestos Yural</title>
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/styleCatalogo.css">
    <link rel="icon" href="img/icono1.ico">
</head>
<body>
    <section class="container-fluid">
        
        <?php include('include/menuAdministrador.php'); ?>

    <article class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p align="center" class="titulo1">BIENVENIDO ADMINISTRADOR "<?php echo $_SESSION['nombre']; echo" "; echo $_SESSION['apellido']; ?>" <br>Aqui Podras Administrar Yural!!</p><br><br>
        </div>


        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="center"><br>
            <br><br><br>
            <img id="imagen" class="imgScriptAdmin" align="center">

        </div>


        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" align="center">
            <br>
            <a href="registroProveedor.php#ir">
                <button class="btn btn-primary" style="font-size: 12pt">
                    Registrar Proveedor  <i class="glyphicon glyphicon-plus-sign"></i>
                </button>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" align="center">
            <br>
            <a href="registroMercancia.php#ir">
                <button class="btn btn-primary" style="font-size: 12pt">
                    Registrar Mercancia  <i class="glyphicon glyphicon-plus-sign"></i>
                </button>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" align="center">
            <br>
            <a href="listaProveedores.php#ir">
                <button class="btn btn-info" style="font-size: 12pt">
                    Todos Los Proveedores  <i class="glyphicon glyphicon-globe"></i>
                </button>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" align="center">
            <br>
            <a href="editarProductosGeneral.php#ir">
                <button class="btn btn-info" style="font-size: 12pt">
                    Editar Productos  <i class="glyphicon glyphicon-globe"></i>
                </button>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" align="center">
            <br>
            <a href="provElimAdmin.php#ir">
                <button class="btn btn-danger" style="font-size: 12pt">
                    Proveedores Eliminados  <i class="glyphicon glyphicon-trash"></i>
                    <?php
                    if ($acumProvElim>0) {
                        echo '&nbsp;<span class="badge badge-warning" style="color:blue; background:#EAF2F8;">'.$acumProvElim.'</span>';
                    } ?>
                </button>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" align="center">
            <br>
            <a href="produElimAdmin.php#ir">
                <button class="btn btn-danger" style="font-size: 12pt">
                    Productos Eliminados  <i class="glyphicon glyphicon-trash"></i>
                    <?php
                    if ($acumElimProd>0) {
                        echo '&nbsp;<span class="badge badge-warning" style="color:blue; background:#EAF2F8;">'.$acumElimProd.'</span>';
                    } ?>
                </button>
            </a>
        </div>



        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" align="center">
            <br><br><br><br><a href="listaProductosDeUsuarios.php#ir">
            <button class="btn btn-warning" style="font-size: 12pt">
                 <i class="glyphicon glyphicon-shopping-cart"> </i> Apartados Por Usuarios
                <?php
                if ($acumulador>0) {
                    echo '&nbsp;<span class="badge badge-warning" style="color:blue; background:#EAECEE;">'.$acumulador.'</span>';
                } ?>

            </button>
        </a>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" align="center">
        <br><br><a href="listaProductosVendidos.php#ir">
        <button class="btn btn-warning" style="font-size: 12pt">
            <i class="glyphicon glyphicon-usd"></i> Ventas 
            <?php
            if ($acumuladorVenta>0) {
                echo '&nbsp;<span class="badge badge-warning" style="color:blue; background:#EAF2F8;">'.$acumuladorVenta.'</span>';
            } ?>
        </button>
    </a>

    <br><br><a href="ventasEliminadas.php#ir">
        <button class="btn btn-danger" style="font-size: 12pt">
             <i class="glyphicon glyphicon-folder-close"></i> Ventas Eliminadas
        </button>
    </a>
</div>



<div class="col-lg-offset-6 col-lg-6 col-md-offset-6 col-md-6 col-sm-offset-6 col-sm-6 col-xs-12" align="center">
    <a href="listaComentarios.php#ir">
        <button class="btn btn-danger" style="font-size: 12pt">
            Opiniones De Usuarios <i class="glyphicon glyphicon-comment"></i>
            <?php
            if ($acumuladorComentario>0) {
                echo '&nbsp;<span class="badge badge-warning" style="color:blue; background:#EAF2F8;">'.$acumuladorComentario.'</span>';
            } ?>
        </button>
    </a><hr>
</div>



<div class="col-lg-offset-6 col-lg-6 col-md-offset-6 col-md-6 col-sm-offset-6 col-sm-6 col-xs-12" align="center">
    <div class=" col-lg-6  col-md-6  col-sm-6 col-xs-12" align="center">
        <a href="listaUsuSesionEstatus.php#ir">
            <button class="btn btn-primary" style="font-size: 12pt">
                Administrar Usuarios <i class="glyphicon glyphicon-user"></i>
            </button>
        </a>
    </div>
    <div class=" col-lg-6  col-md-6  col-sm-6 col-xs-12" align="center">
        <a href="listaUsuDesac.php#ir">
            <button class="btn btn-danger" style="font-size: 12pt">
                Usuarios Eliminados <i class="glyphicon glyphicon-trash"></i>
            </button>
        </a>
    </div>
    
</div>




<div class="col-lg-offset-6 col-lg-6 col-md-offset-6 col-md-6 col-sm-offset-6 col-sm-6 col-xs-12" align="center"><hr>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" align="center">
        
        <a href="listaPedidos.php#ir">
            <button class="btn btn-success" style="font-size: 12pt">
                Nuestros Pedidos  <i class="glyphicon glyphicon-menu-hamburger"></i>
            </button>
        </a>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" align="center">
        <a href="informacionYural.php#ir">
            <button class="btn btn-success" style="font-size: 12pt">
                Información De Yural C.A. <i class="glyphicon glyphicon-eye-open"></i>
            </button>
        </a>
    </div>
</div>

<div class="col-lg-offset-6 col-md-offset-6 col-sm-offset-6 col-lg-6 col-md-6 col-sm-6 col-xs-12" align="center"><br><br>
    <a href="gananciaIva.php#ir" >
        <button class="btn btn-primary" style="font-size: 12pt">
            Ganancia / Iva <i class="glyphicon glyphicon-usd"></i>
        </button>
    </a>
</div>

</article>
<?php 
        require("include/piePagina.php");
         ?>
</section>


<script src="../lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>  
<script src="js/imgPagPrinc.js"></script>  
</body>
</html>
