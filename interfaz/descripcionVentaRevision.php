<!DOCTYPE html>

<?php //esta es la validacion para el Administrador!!!!
session_start();extract($_GET);
if ($_SESSION['id_usuarioA'] and $_GET) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}

$nombreAdmin=$_SESSION['nombre'];
?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Detalle Ventas en Revisión</title>
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
                <i class="glyphicon glyphicon-shopping-cart"></i> Detalle Venta En Revisión ID: <?php echo "$id"; ?> 
            </p>
            <p>
                <b>Apartado:</b> <?php echo $apar; ?><br><br>
            </p>
        </div>

        <?php 
        
                //aqui cargo la variable con la cedula correspondiente del usuario logeado en el momento, para poder comparar y traer lo que tengo en la base de datos de apartados y mostralos

        require("conexionBD/conexionBD.php");
        $sql="SELECT * FROM ventas_productos WHERE id_venta_producto='$id' and estatus=3";
        /* codigos de paginacion */
    $query=pg_query($conexion,$sql);


    

        while($arreglo=pg_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
            $id_venta_producto=$arreglo['id_venta_producto'];
            $id_apartado=$arreglo['id_apartado'];
            $id_banco_usuario=$arreglo['id_banco_usuario'];
            $id_banco_empresa=$arreglo['id_banco_empresa'];
            $monto_cancelado=$arreglo['monto_cancelado'];
            $fecha_hora_venta=$arreglo['fecha_hora_venta'];
            $numero_referencia=$arreglo['numero_referencia'];
            $id_usuario=$arreglo['id_usuario'];


            $sql2=("SELECT * FROM usuario where id_usuario='$id_usuario'");

                //la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
            $query2=pg_query($conexion,$sql2);

//con este array cargo los datos personales del usuario para despues mostrar la informacion del mismo 

            while($arreglo2=pg_fetch_array($query2)){
                $cedula_usuario=$arreglo2['cedula_usuario'];
                $nombre_usuario=$arreglo2['nombre_usuario'];
                $apellido_usuario=$arreglo2['apellido_usuario'];
                $correo_usuario=$arreglo2['correo_usuario'];
                $estado=$arreglo2['estado'];
                $ciudad=$arreglo2['ciudad'];
                $direccion=$arreglo2['direccion'];
                $cod_telef_pers=$arreglo2['cod_telef_pers'];
                $telef_personal=$arreglo2['telef_personal'];
                $cod_telef_hog=$arreglo2['cod_telef_hog'];
                $telef_hog=$arreglo2['telef_hog'];





                    $sql3=("SELECT * FROM bancos_usuario where id_banco_usuario='$id_banco_usuario'");

                //la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
                    $query3=pg_query($conexion,$sql3);

        //con este array cargo los datos personales del usuario para despues mostrar la informacion del mismo 

                    while($arreglo3=pg_fetch_array($query3)){
                        $nom_banc_usua=$arreglo3['nomb_banc_usua'];
                        $tipo_cuen_usua=$arreglo3['tipo_cuen_usua'];
                        $num_cuen_usua=$arreglo3['num_cuen_usua'];
                        $titu_cuen_usua=$arreglo3['titu_cuen_usua'];
                        $cedu_cuen_usua=$arreglo3['cedu_cuen_usua'];




                            $sql4=("SELECT * FROM bancos_empresa where id_banco_empresa='$id_banco_empresa'");

                //la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
                            $query4=pg_query($conexion,$sql4);

                //con este array cargo los datos personales del usuario para despues mostrar la informacion del mismo 

                            while($arreglo4=pg_fetch_array($query4)){
                                $nom_banc_empr=$arreglo4['nomb_banc_empr'];
                                $tipo_cuen_empr=$arreglo4['tipo_cuen_empr'];
                                $num_cuen_empr=$arreglo4['num_cuen_empr'];
                                $titu_cuen_empr=$arreglo4['titu_cuen_empr'];
                                $cedu_cuen_empr=$arreglo4['cedu_cuen_empr'];



                            $f=("SELECT * FROM apartado where id_apartado_usuario='$id_apartado'");

                //la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
                            $f2=pg_query($conexion,$f);

                //con este array cargo los datos personales del usuario para despues mostrar la informacion del mismo 

                            while($f3=pg_fetch_array($f2)){
                                $fecha_hora_apartado=$f3['fecha_hora_apartado'];
                                }
                                

?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center"><hr>
    <h2 style="color: grey">Usuario:</h2>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <b>Usuario: </b><?php echo $nombre_usuario; ?><br>
        <b>Apellido: </b><?php echo $apellido_usuario; ?><br>
        <b>Telefono Personal:</b> <?php echo ''.$cod_telef_pers.'-'.$telef_personal.'' ; ?><br><br>
        <b>Estado:</b> <?php echo ''.$estado.'' ; ?>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <b>CI: </b>
                        <?php 
                            echo $cedula_usuario;
                        ?>
        <br>
        <b>Correo: </b><?php echo $correo_usuario; ?><br>
        <b>Telefono Fijo:</b> <?php echo ''.$cod_telef_hog.'-'.$telef_hog.'' ; ?><br><br>
        <b>Ciudad:</b> <?php echo ''.$ciudad.'' ; ?>
    </div>
</div>

<div class="col-lg-offset-4 col-lg-4 col-lg-offset-4 col-md-offset-4 col-md-4 col-md-offset-4 col-sm-12 col-xs-12" align="center">
    <b>Direcciòn:</b> <?php echo ''.$direccion.'' ; ?><hr>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" align="center">
        <h3 style="color: orange">Banco Emisor</h3>
        <b>Nombre del Banco:</b> <?php echo ''.$nom_banc_usua.''; ?><br>
        <b>Tipo Cuenta:</b> <?php echo ''.$tipo_cuen_usua.''; ?><br>
        <b>Titular de Cuenta:</b> <?php echo $titu_cuen_usua; ?><br>
        <b>CI: </b> <?php echo $cedu_cuen_usua; ?><br>
        <b>Nº Cuenta:</b> <?php echo $num_cuen_usua; ?><br><br>
        <p style="font-family: arial; font-size: 150%;">
            <b style="color: purple">Monto Cancelado: </b><u>Bs. <?php echo $monto_cancelado; ?></u>
        <p>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" align="center">
        <h3 style="color: green">Banco Receptor</h3>
        <b>Nombre del Banco:</b> <?php echo ''.$nom_banc_empr.''; ?><br>
        <b>Tipo Cuenta:</b> <?php echo ''.$tipo_cuen_empr.''; ?><br>
        <b>Titular de Cuenta:</b> <?php echo $titu_cuen_empr; ?><br>
        <b>CI: </b> <?php echo $cedu_cuen_empr; ?><br>
        <b>Nº Cuenta:</b> <?php echo $num_cuen_empr; ?><br><br>
        <p style="font-family: arial; font-size: 150%;">
            <b style="color: grey">Nùmero Referencia:</b><i> <?php echo $numero_referencia; ?></i>
        </p>
    </div>
</div>



<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
    <br><br><br><h2>Detalle Productos</h2>
</div>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <table class="table table-bordered" align="center">
        <tr class=" btn-primary trTitulo" align="center">
            <td class="titulo" width="10%" align="center">ID Detalle<br>Apartado</td>
            <td class="titulo" width="20%">Còdigo Producto</td>
            <td class="titulo" width="15%">Nombre producto</td>
            <td class="titulo" width="20%">Imagen</td>
            <td class="titulo" width="10%">Cantidad</td>
            <td class="titulo" width="15%">Precio</td>
            <td class="titulo" width="10%">Fecha Apartado</td>
        </tr>
    </table>
        <p align="right"><b>Fecha Hora Venta:</b> <?php echo $fecha_hora_venta; ?></p>

</div>


<?php 
$acumulador=0;
$acumCant=0;
$acumuladorTot=0;
$acumuladorAfuera=0;
$acumuladorAfuera1=0;
                                $sql5=("SELECT * FROM detalle_apartado where id_apartado='$id_apartado'");

                //la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
                                $query5=pg_query($conexion,$sql5);

                    //con este array cargo los datos personales del usuario para despues mostrar la informacion del mismo 
                                
                                while($arreglo5=pg_fetch_array($query5)){
                                    $id_detalle_apartado=$arreglo5['id_detalle_apartado'];
                                    $cantidad_apartada=$arreglo5['cantidad_apartada'];
                                    $id_producto_venta=$arreglo5['id_producto_venta'];
                                    $precio_unidad=$arreglo5['precio_unidad'];
                                    $fecha_hora=$arreglo5['fecha_hora'];




                                    $sql6=("SELECT * FROM catalogo_venta where id_producto_venta='$id_producto_venta'");

                    //la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
                                    $query6=pg_query($conexion,$sql6);

                        //con este array cargo los datos personales del usuario para despues mostrar la informacion del mismo 
                                    while($arreglo6=pg_fetch_array($query6)){
                                        $codigo_producto_v=$arreglo6['codigo_producto_v'];
                                        $nombre_producto_v=$arreglo6['nombre_producto_v'];
                                        $imagen_producto_v=$arreglo6['imagen'];
                                        $tipo_unidad=$arreglo6['tipo_unidad'];
                                        $nombre_producto_v=$arreglo6['nombre_producto_v'];
                                        $imagen_producto_v=$arreglo6['imagen'];





//aqui muestro el tr con los apartados correspondientes del usuario logueado
                echo'   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
                <table class="table table-bordered table-hover table-striped" align="center">

                    <tr class="parrafo " align="center">

                        <td class="titulo" width="10%"><br><br>
                            <b>'.$id_detalle_apartado.'</b> 
                        </td>

                        <td class="titulo" width="20%"><br><br>
                            <a href="modProdADMIN.php?id='.$id_producto_venta.'">
                                <b>'.$codigo_producto_v.'</b>
                            </a>
                        </td>

                        <td class="titulo" width="15%"><br><br>
                            <b>'.$nombre_producto_v.'</b>
                        </td>

                        <td class="titulo" width="20%">
                            <a href="modProdADMIN.php?id='.$id_producto_venta.'">
                                <img src="imagenesRepuestos/'.$imagen_producto_v.'" style="min-width: 50px;
                                                                                            max-width: 150px;
                                                                                            min-height: 50px;
                                                                                            max-height: 150px;
                                                                                            border:1px;
                                                                                            border-color: #003D0E;
                                                                                            border-style: solid;
                                                                                            display:block;
                                                                                            margin:0 auto 0 auto;
                                                                                            border-radius: 2px;">
                            </a>
                        </td>

                        <td class="titulo" width="10%"><br><br>
                            <b>'.$tipo_unidad.': </b><b style="color:green;">'.$cantidad_apartada.'</b>
                        </td>

                        <td class="titulo" width="15%">
                            <b>Precio Unitario <br>BS. </b>'.$precio_unidad.'<br><br>
                            ';


            $precio_unidad=str_replace(array(' ','-','.'), '', $precio_unidad);
            $precio_unidad= str_replace(array(' ','-',','), '.', $precio_unidad);
            $multiplica=$precio_unidad*$cantidad_apartada;
            $multiplica=number_format($multiplica,2,",",".");


                        echo'<b>Precio Total:<br>BS.</b>
                            '.$multiplica.'
                        </td>

                        <td class="titulo" width="10%"><br><br>
                            <b>'.$fecha_hora.'</b>
                        </td>
                    </tr> 

                </table>
            </div>';
$multiplica=str_replace(array(' ','-','.'), '', $multiplica);
$multiplica1=str_replace(array(' ','-',','), '.', $multiplica);

$acumuladorAfuera+=$multiplica1;
$acumulador+=$multiplica1;
$acumCant+=$cantidad_apartada;
            }}
            }}
        }
    }

$acumuladorAfuera1+=$acumuladorAfuera;
$acumuladorAfuera1=number_format($acumuladorAfuera1,2,",",".");



if (@$acumuladorAfuera1==true) {
    echo "<div align='center' class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>

    <p>
        <font color='#2C6499' style='font-size:180%;'><hr>
            <b> Cantidad de Articulos: $acumCant &nbsp;&nbsp;&nbsp;Precio Total Cancelado: Bs. $acumuladorAfuera1 <b>
        </font>
    <p>

    </div>";
}
?>           

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" align="center"><br><br>
    <a href="ventasEnRevisionAdmin.php#ir">
        <button class="btn btn-primary">
            <i class="glyphicon glyphicon-chevron-left"> </i> Atras
        </button>
    </a>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" align="center"><br><br>
    <?php echo  '<a onclick="javascript:preguntar2(id='.$id.')">'?>
        <button class="btn btn-success">
            <i class="glyphicon glyphicon-ok"> </i> Venta Contretada
        </button>
    </a>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" align="center"><br><br>
    <?php echo  '<a onclick="javascript:preguntar3(id='.$id.')">'?>
        <button class="btn btn-danger">
            <i class="glyphicon glyphicon-trash"> </i> Eliminar Venta
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
<script src="js/ScriptImgYural.js"></script>   

<script language="Javascript">
    function preguntar2(id){
       eliminar=confirm("ADMINISTRADOR  -<?php echo "$nombreAdmin"; ?>- Estas Seguro de que Verificaste el Pago y de que la Venta con el ID:-<?php echo "$id_venta_producto"; ?>- ya se Cancelo y Verifico Correctamente?");
       if (eliminar)
           //Redireccionamos si das a aceptar
             window.location.href = "modificar/ventaVerificada.php?id="+id; //página web a la que te redirecciona si confirmas la eliminación
             else
          //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
      alert("NO! Se Realizó Ningún Cambio!...")
  }
</script> 

<script language="Javascript">
    function preguntar3(id){
       eliminar=confirm("ADMINISTRADOR  -<?php echo "$nombreAdmin"; ?>- ¿Realmente Deseas Cancelar/Eliminar la Venta con el ID:-<?php echo "$id_venta_producto"; ?>- del Usuario Selecionado? Una Vez Realizado no Hay Vuelta Atras");
       if (eliminar)
           //Redireccionamos si das a aceptar
             window.location.href = "modificar/borrarVenta.php?id="+id; //página web a la que te redirecciona si confirmas la eliminación
             else
          //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
      alert("NO! Cancelaste Ninguna Venta...")
  }
</script> 
</body>
</html>
