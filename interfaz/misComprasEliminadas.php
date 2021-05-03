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

?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Mis Compras Rechazadas</title>
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/styleCatalogo.css">
    <link rel="icon" href="img/icono1.ico">
</head>
<body>
    <section class="container-fluid">
        
        <?php include'include/menuUsuario.php'; ?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
            <p class="titulo1" style="color: #C70039">
            <a name="ir"></a>
            Mis Compras Rechazadas<i class="glyphicon glyphicon-remove-circle "></i></p>
        </div>

        <?php 

        $acumulador=0;
        
                //aqui cargo la variable con la cedula correspondiente del usuario logeado en el momento, para poder comparar y traer lo que tengo en la base de datos de apartados y mostralos

        require("conexionBD/conexionBD.php");
        $sql="SELECT * FROM ventas_productos WHERE estatus=0 and id_usuario='{$_SESSION['id_usuario']}' ORDER BY id_venta_producto DESC";
        /* codigos de paginacion */
        $registros= pg_query($conexion,$sql);
        $num = pg_num_rows($registros);
        $pag = ceil($num / 10);

        @$prodIni=$_GET['ini'];
        @$prodFin=$_GET['fin'];

        echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='right' style='font-size:80%; color:green;'><br><br>
        $num Compras Rechazadas. En $pag Páginas. ";

        if (isset($prodIni) and isset($prodFin)) {
         echo "&nbsp;&nbsp;&nbsp;Compras Rechazadas: $prodIni - $prodFin";
     }
     echo "<br></div>";

     if(isset($_GET['ini'])){
        $ini=$_GET['ini'];
        $fin=$_GET['fin'];
        $sql="SELECT * FROM ventas_productos WHERE estatus=0 and id_usuario='{$_SESSION['id_usuario']}' ORDER BY id_venta_producto DESC LIMIT 10 offset $ini";
    }else{
        $sql="SELECT * FROM ventas_productos WHERE estatus=0 and id_usuario='{$_SESSION['id_usuario']}' ORDER BY id_venta_producto DESC LIMIT 10 offset 0";
    }

    $query=pg_query($conexion,$sql);


    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <table class="table table-bordered" align="center">
        <tr class=" btn-primary trTitulo" align="center">
            <td class="titulo" width="10%" align="center">N° <br>Compra</td>
            <td class="titulo" width="10%">Nº <br> Apartado</td>
            <td class="titulo" width="20%">Monto <br> Cancelado</td>
            <td class="titulo" width="15%">Referencia</td>
            <td class="titulo" width="30%">Banco</td>
            <td class="titulo" width="10%">Fecha Hora<br>Compra</td>
            <td class="titulo" width="5%">Ver</td>
        </tr>
    </table>
</div>';

if ($num==0 or $num==null) {
    echo "<div align='center' style='color:red; font-size:20px;'>No Hay Ventas Registradas.<br><br><br></div>";
}

        while($arreglo=pg_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
            $id_venta_producto=$arreglo['id_venta_producto'];
            $id_apartado=$arreglo['id_apartado'];
            $id_banco_usuario=$arreglo['id_banco_usuario'];
            $id_banco_empresa=$arreglo['id_banco_empresa'];
            $monto_cancelado=$arreglo['monto_cancelado'];
            $fecha_hora_venta=$arreglo['fecha_hora_venta'];
            $numero_referencia=$arreglo['numero_referencia'];
            $id_usuario=$arreglo['id_usuario'];
            $estatus_venta=$arreglo['estatus'];





                    $sql3=("SELECT * FROM bancos_usuario where id_banco_usuario='$id_banco_usuario'");

                //la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
                    $query3=pg_query($conexion,$sql3);

        //con este array cargo los datos personales del usuario para despues mostrar la informacion del mismo 

                    while($arreglo3=pg_fetch_array($query3)){
                        $nom_banc_usua=$arreglo3['nomb_banc_usua'];
                        $num_cuen_usua=$arreglo3['num_cuen_usua'];
                        $titu_cuen_usua=$arreglo3['titu_cuen_usua'];
                        $cedu_cuen_usua=$arreglo3['cedu_cuen_usua'];




                            $sql4=("SELECT * FROM bancos_empresa where id_banco_empresa='$id_banco_empresa'");

                //la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
                            $query4=pg_query($conexion,$sql4);

                //con este array cargo los datos personales del usuario para despues mostrar la informacion del mismo 

                            while($arreglo4=pg_fetch_array($query4)){
                                $nom_banc_empr=$arreglo4['nomb_banc_empr'];
                                $num_cuen_empr=$arreglo4['num_cuen_empr'];
                                $titu_cuen_empr=$arreglo4['titu_cuen_empr'];
                                $cedu_cuen_empr=$arreglo4['cedu_cuen_empr'];


                                $sql5=("SELECT * FROM detalle_apartado where id_apartado='$id_apartado' and id_usuario='{$_SESSION['id_usuario']}'");

                //la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
                                $query5=pg_query($conexion,$sql5);

                    //con este array cargo los datos personales del usuario para despues mostrar la informacion del mismo 
                                $acum_cant_apart=0;
                                while($arreglo5=pg_fetch_array($query5)){
                                    $cantidad_apartada=$arreglo5['cantidad_apartada'];
                                    @$acum_cant_apart+=$cantidad_apartada;
                                    }


//aqui muestro el tr con los apartados correspondientes del usuario logueado
                echo'   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
                <table class="table table-bordered table-hover table-striped" align="center">

                <tr class="table-info parrafo" align="center">

                        <td class="titulo table-info" width="10%"><br><br>
                            <b>'.$id_venta_producto.'</b>
                            <br><br><br><i class="glyphicon glyphicon-remove-circle" style="color:red;"></i>
                        </td>

                        <td class="titulo table-info" width="10%"><br>
                            <b>ID:</b><br>'.$id_apartado.'<br><br><br>
                            <b>Cantidad Poductos</b><br>'.$acum_cant_apart.'
                        </td>

                        <td class="titulo table-info" width="20%"><br><br><br><br>
                            <b>BS: </b><b style="color:green;">'.$monto_cancelado.'</b>
                        </td>

                        <td class="titulo table-info" width="15%"><br><br><br><br>
                            <b>'.$numero_referencia.'</b>
                        </td>

                        <td class="titulo table-info" width="30%">
                            <b>Banco Emisor:</b><br>
                            '.$nom_banc_usua.'<br><b>N-</b>'.$num_cuen_usua.'<br>
                            <b>Titular:</b> '.$titu_cuen_usua.'<br><br>

                            <b>Banco Receptor:</b><br>
                            '.$nom_banc_empr.'<br><b>N-</b>'.$num_cuen_empr.'<br>
                            <b>Titular:</b> '.$titu_cuen_empr.'
                        </td>

                        <td class="titulo table-info" width="10%"><br><br><br>
                            '.$fecha_hora_venta.'
                        </td>

                        <td class="titulo table-info" width="5%"><br><br><br><br>
                            <a href="detalleDeMiCompraEliminada.php?id='.$id_venta_producto.'&apar='.$id_apartado.'#ir">    
                                <i class="glyphicon glyphicon-eye-open" title="Ver Detalles"></i>
                            </a>';

                        echo '</td>
                    </tr>
        
                </table>
            </div>';
            $monto_cancelado=str_replace(array(' ','-','.'), '', $monto_cancelado);
            $acumulador+=$monto_cancelado;
            }
        }
    }$acumulador=number_format($acumulador,2,",",".");
date_default_timezone_set('America/Caracas');
            $fecha_actual = date('d/m/Y');

        echo "<div align='center'>
        <b>
             BS: $acumulador &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Total de Unidades: "; echo @$acum_cant_apart; echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br><br>
        </b>
    </div>";


/* numeros de paginacion  */
echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center" style="color:green"><hr width="75%">Pag.';
for($c=1;$c<=$pag;$c++){
    $ini=$c*10-10;
    $fin=$ini+9;
    echo ' <a href="misComprasEliminadas.php?ini='.$ini.'&fin='.$fin.'#ir">'.$c.'</a>&nbsp;&nbsp;';
}
echo '</div>';


?>    
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
    <br><br><a href="misProductosCancelados.php#ir">
        <button class="btn btn-primary">
            <i class="glyphicon glyphicon-chevron-left"></i>Atras
        </button><br><br><br>
    </a>
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
