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
    <title>Detalle Apartado</title>
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
                <i class="glyphicon glyphicon-shopping-cart"></i> Detalle Apartado ID: <?php echo "$id"; ?> 
            </p>
        </div>

        <?php 
        
                //aqui cargo la variable con la cedula correspondiente del usuario logeado en el momento, para poder comparar y traer lo que tengo en la base de datos de apartados y mostralos

        require("conexionBD/conexionBD.php");
        $sql="SELECT * FROM apartado WHERE id_apartado_usuario='$id'";
        /* codigos de paginacion */
    $query=pg_query($conexion,$sql);

        while($arreglo=pg_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
            $fecha_hora_apartado=$arreglo['fecha_hora_apartado'];
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
            <?php echo $cedula_usuario ?>
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
    <br><br><br><h2 style="color: green">Detalle Productos Apartados <i style="color: black" class="glyphicon glyphicon-hand-down"></i></h2>
</div>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <table class="table table-bordered" align="center">
        <tr class=" btn-primary trTitulo" align="center">
            <td class="titulo" width="10%" align="center">ID Detalle<br>Apartado</td>
            <td class="titulo" width="15%">Còdigo Producto</td>
            <td class="titulo" width="15%">Nombre producto</td>
            <td class="titulo" width="20%">Imagen</td>
            <td class="titulo" width="10%">Cantidad</td>
            <td class="titulo" width="15%">Precio</td>
            <td class="titulo" width="10%">Fecha Apartado</td>
            <td class="titulo" width="5%">Eliminar</td>
        </tr>
    </table>
        <p align="right"><b>Fecha Hora Apartado:</b> <?php echo $fecha_hora_apartado; ?></p>

</div>


<?php 
$acumulador=0;
$acumCant=0;
$acumuladorTot=0;
$acumuladorAfuera=0;
$acumuladorAfuera1=0;
                                $sql5=("SELECT id_detalle_apartado,id_usuario,id_producto_venta,cantidad_apartada,fecha_hora,id_apartado,precio_unidad, to_char(DATE(fecha_hora)+'3 days'::interval, 'DD/MM/YYYY')  as fecha3dias FROM public.detalle_apartado where id_apartado='$id' and estatus=1 order by id_detalle_apartado asc");

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
                echo'   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center"> ';
                
                date_default_timezone_set('America/Caracas');
                if ($arreglo5['fecha3dias'] == date('d/m/Y')) {
                    echo "<b style='color:red'>Hoy es la Fecha Limite!!!</>";
                }
                
                echo'<table class="table table-bordered table-hover table-striped" align="center">

                    <tr class="parrafo " align="center">

                        <td class="titulo" width="10%"><br><br><br>
                            <b>'.$id_detalle_apartado.'</b> 
                        </td>

                        <td class="titulo" width="15%"><br><br><br>
                            <a href="modProdADMIN.php?id='.$id_producto_venta.'">
                                <b>'.$codigo_producto_v.'</b>
                            </a>
                        </td>

                        <td class="titulo" width="15%"><br><br><br>
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

                        <td class="titulo" width="10%"><br><br><br>
                            <b>'.$tipo_unidad.': </b><b style="color:green;">'.$cantidad_apartada.'</b>
                        </td>

                        <td class="titulo" width="15%"><br>
                            <b>Precio Unitario <br>BS.</b>'.$precio_unidad.'<br><br>
                            ';


            $precio_unidad=str_replace(array(' ','-','.'), '', $precio_unidad);
            $precio_unidad= str_replace(array(' ','-',','), '.', $precio_unidad);
            $multiplica=$precio_unidad*$cantidad_apartada;
            $multiplica=number_format($multiplica,2,",",".");


                        echo'<b>Precio Total:<br>BS.</b>
                            '.$multiplica.'
                        </td>

                        <td class="titulo" width="10%"><br>
                            <b style="color:blue">'.$fecha_hora.'</b><hr>
                            <b>Fecha Limite</b>
                            <b style="color:orange">'.$arreglo5['fecha3dias'].'</b>
                        </td>

                        <td class="titulo" width="5%"><br><br><br>
                            <a onclick="javascript:preguntar(id='.$id_detalle_apartado.')"">
                                <i class="glyphicon glyphicon-remove-circle" style="color:red"></i>
                            </a>
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
            
        }
    }

$acumuladorAfuera1+=$acumuladorAfuera;
$acumuladorAfuera1=number_format($acumuladorAfuera1,2,",",".");



if (@$acumuladorAfuera1==true) {
    echo "<div align='center' class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>

    <p>
        <font color='#2C6499' style='font-size:180%;'><hr>
            <b> Cantidad de Articulos: $acumCant &nbsp;&nbsp;&nbsp; Total Bs. $acumuladorAfuera1 <b>
        </font>
    <p>

    </div>";
}
?>           

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center"><br><br>
    <a href="listaProductosDeUsuarios.php#ir">
        <button class="btn btn-primary">
            <i class="glyphicon glyphicon-chevron-left"> </i>Atras
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
    function preguntar(id){
       eliminar=confirm("ADMINISTRADOR  -<?php echo "$nombreAdmin"; ?>- ¿Estas Seguro de Eliminar y Restaurar todos los productos de Este Apartado?");
       if (eliminar)
           //Redireccionamos si das a aceptar
             window.location.href = "modificar/eliminarApartadoAdmin.php?id="+id; //página web a la que te redirecciona si confirmas la eliminación
             else
          //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
      alert("NO! Eliminaste El Apartado")
  }
</script>
</body>
</html>
