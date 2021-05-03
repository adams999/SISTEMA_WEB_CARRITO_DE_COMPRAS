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
    <title>Nuestros Pedidos</title>
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/styleCatalogo.css">
    <link rel="icon" href="img/icono1.ico">
</head>
<body>
    <section class="container-fluid">
        
        <?php include('include/menuAdministrador.php'); ?>

    <article class="row">


        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
            <p class="titulo1">
                <a name="ir"></a>
                Todos Los Pedidos &nbsp; <i class="glyphicon glyphicon-globe"></i></p>
            </div>


            <?php 

            require("conexionBD/conexionBD.php");

            $sql="SELECT * FROM pedidos ORDER BY numero_pedido, id_pedido DESC ";
            /* codigos de paginacion */
            $registros=pg_query($conexion,$sql);
            $num =pg_num_rows($registros);
            $pag = ceil($num / 10);

            @$prodIni=$_GET['ini'];
            @$prodFin=$_GET['fin'];

            echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='right' style='font-size:80%; color:green;'>
            $num Pedidos. En $pag Páginas. ";

            if (isset($prodIni) and isset($prodFin)) {
             echo "&nbsp;&nbsp;&nbsp;Pedido: $prodIni - $prodFin";
         }
         echo "<br></div>";

         if(isset($_GET['ini'])){
            $ini=$_GET['ini'];
            $fin=$_GET['fin'];
            $sql="SELECT * FROM pedidos ORDER BY numero_pedido, id_pedido DESC  LIMIT 10 offset $ini";
        }else{
            $sql="SELECT * FROM pedidos ORDER BY numero_pedido, id_pedido DESC  LIMIT 10 offset 0";
        }

        $query=pg_query($conexion,$sql);




        echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table class="table table-bordered" align="center">
            <tr class=" btn-primary trTitulo" align="center">
                <td class="titulo" width="3%">ID </td>
                <td class="titulo" width="7%">N° Pedido</td>
                <td class="titulo" width="10%">Registró</td>
                <td class="titulo" width="10%">Proveedor</td>
                <td class="titulo" width="15%">COD Prod</td>
                <td class="titulo" width="30%">Nombre Producto</td>
                <td class="titulo" width="5%">Cant.</td>
                <td class="titulo" width="10%">Costo U.</td>
                <td class="titulo" width="10%">Fecha</td>
                
            </tr>
        </table>
    </div>';



        while($arreglo=pg_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente a los Pedidos para despues llamar la informacion que se necesite
            $idPedido=$arreglo['id_pedido'];
            $numeroPedido=$arreglo['numero_pedido'];
            $idUsuarioA=$arreglo['id_usuario_a'];
            $idProveedor=$arreglo['id_proveedor'];
            $codigoProducto=$arreglo['codigo_producto'];
            $nombreProducto=$arreglo['nombre_producto'];
            $cantidadPedido=$arreglo['cantidad_producto'];
            $precioCosto=$arreglo['precio_costo'];
            $fechaPedido=$arreglo['fecha_pedido'];



            $sql2=("SELECT * FROM proveedores where id_proveedor='$idProveedor'");

                    //la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
            $query2=pg_query($conexion,$sql2);


                    while($arreglo2=pg_fetch_array($query2)){//este arreglo ordena la informacion del array Segun el id de proveedor que envie el primer arreglo paraq despues mostrar el nombre del proveedor segun el id del proveedor
                        $nombreProveedor=$arreglo2['nombre_proveedor'];





//aqui muestro el tr con los PEDIDOS correspondientes 
                        echo'   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
                        <table class="table table-hover table-bordered table-condensed" align="center">
                            <tr class="parrafo info" align="center">
                                <td class="titulo" width="3%">'.$idPedido.' </td>
                                <td class="titulo" width="7%">'.$numeroPedido.'</td>
                                <td class="titulo" width="10%">'.$idUsuarioA.'</td>
                                <td class="titulo" width="10%"><b>ID:</b>&nbsp;&nbsp;&nbsp;'.$idProveedor.'<br>'.$nombreProveedor.'</td>
                                <td class="titulo" width="15%">'.$codigoProducto.'</td>
                                <td class="titulo" width="30%">'.$nombreProducto.'</td>
                                <td class="titulo" width="5%">'.$cantidadPedido.'</td>
                                <td class="titulo" width="10%">'.$precioCosto.'</td>
                                <td class="titulo" width="10%">'.$fechaPedido.'</td>

                            </tr> 

                        </table>
                    </div>';
                }
            }
            echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center" style="color:green"><hr width="75%">Pag.';
            for($c=1;$c<=$pag;$c++){
                $ini=$c*10-10;
                $fin=$ini+9;
                echo ' <a href="listaPedidos.php?ini='.$ini.'&fin='.$fin.'#ir">'.$c.'</a>&nbsp;&nbsp;';
            }
            echo '</div>';

            ?>           



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
