<?php //esta es la validacion para el usuario!!!!
session_start();extract($_GET);
if ($_SESSION['id_usuario'] and $_GET) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}

ob_start();//esta funcion cargo todo lo que me mostrara el llamado de los productos apartados para despues guardarlo en pdf y se pueda generar el archivo


date_default_timezone_set('America/Caracas');
$FechaHoraReporte= date('d/m/Y H:i');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Reporte Compra <?php echo $id; ?></title>
    <link rel="icon" href="img/icono1.ico">
    <link rel="stylesheet" type="text/css" href="css/estiloReporte.css">
</head>
<body>
    

        <?php 
        
                //aqui cargo la variable con la cedula correspondiente del usuario logeado en el momento, para poder comparar y traer lo que tengo en la base de datos de apartados y mostralos

        require("conexionBD/conexionBD.php");

$empr1=("SELECT * FROM empresa ");

//la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
$empr2=pg_query($conexion,$empr1);
                                
while($empr3=pg_fetch_array($empr2)){
                                            
$rifEmpresa=$empr3['rif_empresa'];
$nombreEmpresa=$empr3['nombre_empresa'];
$direccionEmpresa=$empr3['direccion_empresa'];
$telefonoEmpresa=$empr3['telefono_empresa'];
$correoEmpresa=$empr3['correo_empresa'];

}





        $sql="SELECT * FROM ventas_productos WHERE id_venta_producto='$id'";
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



           
            <p class="TituloReporte" align="center" style="line-height: 5px">
                <img src='img/logo1.jpg' width='80px'>
                    <?php   
                        echo ''.$nombreEmpresa.' &nbsp;&nbsp;&nbsp; <b>Rif:</b> '.$rifEmpresa.'';
                    ?>
            </p>

            <hr style="line-height: 1px; ;border: dotted; color: black">

            <p style="font-size: 15pt; color: #0F3563; line-height: 5px; font-style: solid;" align="center">
                Recibo de Compra
            </p>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center"> 
            <p style="font-size: 10pt; line-height: 5px">
                <b>Compra ID:</b> <?php echo "$id"; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>Apartado:</b> <?php echo $apar; ?>
            </p>
        </div>






    

















<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
    <h2 style="color: grey; font-size: 12pt; line-height: 5px">
        Usuario:
    </h2>

        <p style="font-size: 10pt; line-height: 5px">
            <b>CI: </b>
                        <?php echo $cedula_usuario;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <b>Nombre: </b> <?php echo $nombre_usuario; ?>  &nbsp;&nbsp;&nbsp; 
            <b>Apellido: </b> <?php echo $apellido_usuario; ?>
        </p>

        <p style="font-size: 10pt; line-height: 5px">
            <b>Telefono Personal:</b> <?php echo ''.$cod_telef_pers.'-'.$telef_personal.'' ; ?> &nbsp;&nbsp;&nbsp; 
            <b>Telefono Fijo:</b> <?php echo ''.$cod_telef_hog.'-'.$telef_hog.'' ; ?> &nbsp;&nbsp;&nbsp; 
            <b>Correo: </b><?php echo $correo_usuario; ?> &nbsp;&nbsp;&nbsp; 
        </p>

        <p style="font-size: 10pt; line-height: 5px">
            <b>Estado:</b> <?php echo ''.$estado.'' ; ?> &nbsp;&nbsp;&nbsp; 
            <b>Ciudad:</b> <?php echo ''.$ciudad.'' ; ?> &nbsp;&nbsp;&nbsp; 
            <b>Direcciòn:</b> <?php echo ''.$direccion.'' ; ?>
        </p>
        <hr style="color: #0F3563; width: 450px; line-height: 3px">





























    <h3 style="color:orange;line-height:5px">Banco Emisor</h3>
    
    <p style="font-size: 10pt; line-height: 5px">
        <b>Nombre del Banco:</b> <?php echo ''.$nom_banc_usua.''; ?> &nbsp;&nbsp;&nbsp; 
        <b>Tipo Cuenta:</b> <?php echo ''.$tipo_cuen_usua.''; ?> <br><br><br>
        <b>Nº Cuenta:</b> <?php echo $num_cuen_usua; ?> &nbsp;&nbsp;&nbsp; 
    </p>

    <p style="font-size: 10pt; line-height: 5px">        
        <b>Titular de Cuenta:</b> <?php echo $titu_cuen_usua; ?> &nbsp;&nbsp;&nbsp; 
        <b>CI: </b> <?php echo $cedu_cuen_usua; ?> &nbsp;&nbsp;&nbsp; 
    </p>  



    <h3 style="color:green; line-height: 5px">Banco Receptor</h3>

    <p style="font-size: 10pt; line-height: 5px">
        <b>Nombre del Banco:</b> <?php echo ''.$nom_banc_empr.''; ?> &nbsp;&nbsp;&nbsp; 
        <b>Tipo Cuenta:</b> <?php echo ''.$tipo_cuen_empr.''; ?> <br><br><br> 
        <b>Nº Cuenta:</b> <?php echo $num_cuen_empr; ?> &nbsp;&nbsp;&nbsp; 
    </p> 

    <p style="font-size: 10pt; line-height: 5px">
        <b>Titular de Cuenta:</b> <?php echo $titu_cuen_empr; ?> &nbsp;&nbsp;&nbsp; 
        <b>CI: </b> <?php echo $cedu_cuen_empr; ?> &nbsp;&nbsp;&nbsp; 
    </p>

    <hr style="color: #0F3563; width: 500px; line-height: 3px">

    <p style="font-size: 12pt; line-height: 5px">
        <b style="color: grey">Nùmero Referencia: </b><i> <?php echo $numero_referencia; ?></i> &nbsp;&nbsp;&nbsp;
        <b style="color: #0F3563">Monto Cancelado: </b> Bs. <?php echo $monto_cancelado; ?>
    </p>
    <p style="line-height: 5px; font-size: 10pt">
        <b style="color: #0F3563">Contacto Yural: </b> <b> Telefono: </b> <?php echo $telefonoEmpresa; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> Correo: </b> <?php echo $correoEmpresa; ?>
    </p>
</div>
































<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <p style="font-size: 8pt; line-height: 5px" align="right">
            <b>Reporte Emitìdo El:</b> <?php echo $FechaHoraReporte; ?> <b>Por:</b> <?php echo "{$_SESSION['nombre_usuario']}"; ?>
    </p>

    <p align="center" style="font-size: 14pt; line-height: 5px">
        <b style="color:#0F3563;">
            Detalle Compra
        </b>
    </p>
    
    <table class="table table-bordered tableReporte" align="center">
        <tr class=" btn-primary trTitulo" align="center">
            <td class="trTitulo" width="50" align="center">ID Detalle</td>
            <td class="trTitulo" width="100">Còdigo Producto</td>
            <td class="trTitulo" width="130">Nombre producto</td>
            <td class="trTitulo" width="50">Cantidad</td>
            <td class="trTitulo" width="120">Precio</td>
            <td class="trTitulo" width="80">Fecha Apartado</td>
        </tr>
    </table>
        <p style="font-size: 7pt; line-height: 5px" align="right">
            <b>Fecha Hora Compra:</b> <?php echo $fecha_hora_venta; ?>
        </p>

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
                <table class="table table-bordered table-hover table-striped" align="center" style="line-height:5px">

                    <tr class="parrafo" align="center" >

                        <td class="parrafoInterno" width="50"><br>
                            <b>'.$id_detalle_apartado.'</b> 
                        </td>

                        <td class="parrafoInterno" width="100"><br>
                                <b>'.$codigo_producto_v.'</b>
                        </td>

                        <td class="parrafoInterno" width="130"><br>
                            <b>'.$nombre_producto_v.'</b>
                        </td>

                        <td class="parrafoInterno" width="50"><br>
                            <b>'.$tipo_unidad.': </b><b>'.$cantidad_apartada.'</b>
                        </td>

                        <td class="parrafoInterno" width="120"><br>
                            <b>Precio Unitario <br>BS.</b>'.$precio_unidad.'
                            ';


            $precio_unidad=str_replace(array(' ','-','.'), '', $precio_unidad);
            $precio_unidad= str_replace(array(' ','-',','), '.', $precio_unidad);
            $multiplica=$precio_unidad*$cantidad_apartada;
            $multiplica=number_format($multiplica,2,",",".");


                        echo'<br><br><b>Precio Total:<br>BS.</b>
                            '.$multiplica.'.<br><br>
                        </td>

                        <td class="parrafoInterno" width="80"><br>
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
$acumuladorAfuera1=number_format($acumuladorAfuera1,2,",",".");;



if (@$acumuladorAfuera1==true) {
    echo "<div align='center' class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>

    <p>
        <font color='#2C6499' style='font-size:80%;'><hr>
            <b> Cantidad de Articulos Comprados: $acumCant &nbsp;&nbsp;&nbsp; Compra Total: Bs. $acumuladorAfuera1 <b>
        </font>
    <p>

    </div>";
}
?>           


   

</body>
</html>






<?php
    require_once('../lib/dompdf/autoload.inc.php');
    use Dompdf\Dompdf;

    $dompdf=new Dompdf();
    $dompdf->set_option('defaultFont','arial');

    $dompdf->loadHtml(ob_get_clean());
    //'a4' just a test of paper size...
    $dompdf->setPaper('carta','portrait');

    $dompdf->render();
    $pdf=$dompdf->output();
    $filename="ReporteCompraConcreta_ID:".$id; 
    $dompdf->stream($filename); 
?>











