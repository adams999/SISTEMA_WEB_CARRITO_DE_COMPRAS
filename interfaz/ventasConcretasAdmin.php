<!DOCTYPE html>

<?php //esta es la validacion para el Administrador!!!!
session_start();
if ($_SESSION['id_usuarioA']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}

$nombreAdmin=$_SESSION['nombre'];
        require("conexionBD/conexionBD.php");

        require("include/chartsGrafico.php");
?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ventas Concretadas</title>
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/styleCatalogo.css">
    <link rel="icon" href="img/icono1.ico">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
       google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Meses', 'Bolivares'],
          <?php
            for($x=1;$x<=12;$x=$x+1){   
          ?>
          ['<?php 
            $yearAct = date('Y');

           echo $meses[$x]; 
           ?>',  <?php echo $dinero[$x] ?>],
          <?php } ?>
        ]);

        var options = {
            chart: {
           title: 'Grafico de Ventas Mensuales <?php echo $yearAct ?>' ,
            subtitle: 'Ventas Concretadas <?php $anno ?> Por Mes', titleTextStyle: {color: 'green'}}
         
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));
        chart.draw(data, google.charts.Bar.convertOptions(options));

      }
    </script>
</head>
<body>
    <section class="container-fluid">
        
        <?php include('include/menuAdministrador.php'); ?>

    <article class="row">

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center"><br>
    <div  id="chart_div" style="width: 98%; height: 300px;" align="center"></div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
            <p class="titulo1">
            <a name="ir"></a>
            Ventas Concretadas <i style="color: green" class="glyphicon glyphicon-piggy-bank"></i></p>
        </div>

        <?php 

        $acumulador=0;
        
                //aqui cargo la variable con la cedula correspondiente del usuario logeado en el momento, para poder comparar y traer lo que tengo en la base de datos de apartados y mostralos

        $sql="SELECT * FROM ventas_productos WHERE estatus=10 ORDER BY id_venta_producto DESC";
        /* codigos de paginacion */
        $registros= pg_query($conexion,$sql);
        $num = pg_num_rows($registros);
        $pag = ceil($num / 10);

        @$prodIni=$_GET['ini'];
        @$prodFin=$_GET['fin'];

        echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='right' style='font-size:80%; color:green;'><br><br>
        $num Venta Concretadas. En $pag Páginas. ";

        if (isset($prodIni) and isset($prodFin)) {
         echo "&nbsp;&nbsp;&nbsp;Articulos: $prodIni - $prodFin";
     }
     echo "<br></div>";

     if(isset($_GET['ini'])){
        $ini=$_GET['ini'];
        $fin=$_GET['fin'];
        $sql="SELECT * FROM ventas_productos WHERE estatus=10 ORDER BY id_venta_producto DESC LIMIT 10 offset $ini";
    }else{
        $sql="SELECT * FROM ventas_productos WHERE estatus=10 ORDER BY id_venta_producto DESC LIMIT 10 offset 0";
    }

    $query=pg_query($conexion,$sql);


    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <table class="table table-bordered" align="center">
        <tr class=" btn-primary trTitulo" align="center">
            <td class="titulo" width="5%" align="center">N° <br>Venta</td>
            <td class="titulo" width="17%">Cedula/Contacto Usuario</td>
            <td class="titulo" width="15%">Nombre/Dirección Usuario</td>
            <td class="titulo" width="7%">Nº <br> Apartado</td>
            <td class="titulo" width="15%">Monto <br> Cancelado</td>
            <td class="titulo" width="10%">Referencia</td>
            <td class="titulo" width="18%">Banco</td>
            <td class="titulo" width="8%">Fecha Hora</td>
            <td class="titulo" width="5%">Acción</td>
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


                                $sql5=("SELECT * FROM detalle_apartado where id_apartado='$id_apartado'");

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

                    <tr class="parrafo " align="center">

                        <td class="titulo" width="5%"><br><br><br><br>
                            <b>'.$id_venta_producto.'</b> 
                        </td>

                        <td class="titulo" width="17%"><br><br>
                            <b>CI: </b>';
                                echo $cedula_usuario;
                            echo '<br>
                            <b>Correo: </b>'.$correo_usuario.'<br>
                            <b>Telef1: </b>'.$cod_telef_pers.'-'.$telef_personal.'<br>
                            <b>Telef2: </b>'.$cod_telef_hog.'-'.$telef_hog.'
                        </td>

                        <td class="titulo" width="15%"><br><br>
                            <b>Nombre: </b>'.$nombre_usuario.'<br>'.$apellido_usuario.'<br>
                            <b>Estado: </b>'.$estado.'<br>
                            <b>Ciudad: </b>'.$ciudad.'<br>
                            <b>Dirección: </b>'.$direccion.'
                        </td>

                        <td class="titulo" width="7%"><br>
                            <b>ID:</b><br>'.$id_apartado.'<br><br><br>
                            <b>Cantidad Poductos</b><br>'.$acum_cant_apart.'
                        </td>

                        <td class="titulo" width="15%"><br><br><br><br>
                            <b>BS: </b><b style="color:green;">'.$monto_cancelado.'</b>
                        </td>

                        <td class="titulo" width="10%"><br><br><br><br>
                            <b>'.$numero_referencia.'</b>
                        </td>

                        <td class="titulo" width="18%">
                            <b>Banco Emisor:</b><br>
                            '.$nom_banc_usua.'<br><b>N-</b>'.$num_cuen_usua.'
                            <b>Titular:</b> '.$titu_cuen_usua.'<br><br>

                            <b>Banco Receptor:</b><br>
                            '.$nom_banc_empr.'<br><b>N-</b>'.$num_cuen_empr.'
                            <b>Titular:</b> '.$titu_cuen_empr.'
                        </td>

                        <td class="titulo" width="8%"><br><br><br>
                            '.$fecha_hora_venta.'
                        </td>

                        <td class="titulo" width="5%"><br><br>
                            <a href="descripcionVentaConcreta.php?id='.$id_venta_producto.'&apar='.$id_apartado.'#ir">    
                                <i class="glyphicon glyphicon-eye-open" style="color:orange;" title="Ver Detalles"></i>
                            </a><br><hr>
                            <a href="reporteVentas.php?id='.$id_venta_producto.'&apar='.$id_apartado.'">    
                                <i class="glyphicon glyphicon-save" style="color:blue;" title="Descargar Nota de Venta"></i>
                            </a>
                        </td>
                    </tr> 

                </table>
            </div>';
            $monto_cancelado=str_replace(array(' ','-','.'), '', $monto_cancelado);
            $monto_cancelado=str_replace(array(' ','-',','), '.', $monto_cancelado);
            $acumulador+=$monto_cancelado;
            }}
        }
    }$acumulador=number_format($acumulador,2,",",".");
date_default_timezone_set('America/Caracas');
            $fecha_actual = date('d/m/Y');

        echo "<div align='center'>
        <b>
            Cantidad de Ingresos BS: $acumulador &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Total de Unidad Vendidas:"; echo @$acum_cant_apart; echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hasta la Fecha ".$fecha_actual."<br><br>
        </b>
    </div>";


/* numeros de paginacion  */
echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center" style="color:green"><hr width="75%">Pag.';
for($c=1;$c<=$pag;$c++){
    $ini=$c*10-10;
    $fin=$ini+9;
    echo ' <a href="ventasConcretasAdmin.php?ini='.$ini.'&fin='.$fin.'#ir">'.$c.'</a>&nbsp;&nbsp;';
}
echo '</div>';


?>    
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
    <br><br><a href="listaProductosVendidos.php#ir">
        <button class="btn btn-primary">
            <i class="glyphicon glyphicon-chevron-left"></i>Atras
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
       eliminar=confirm("ADMINISTRADOR  -<?php echo "$nombreAdmin"; ?>- ¿Estas Seguro de Calificar esta Venta con el ID:-<?php echo "$id_venta_producto"; ?>- como Pendiente?");
       if (eliminar)
           //Redireccionamos si das a aceptar
             window.location.href = "modificar/ventaPendiente.php?id="+id; //página web a la que te redirecciona si confirmas la eliminación
             else
          //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
      alert("NO! Se Efectuo Ningùn Cambio")
  }
</script> 

<script language="Javascript">
    function preguntar3(id){
       eliminar=confirm("ADMINISTRADOR  -<?php echo "$nombreAdmin"; ?>- Estas Seguro de que Verificaste el Pago y de que la Venta con el ID:-<?php echo "$id_venta_producto"; ?>- ya se Cancelo y Verifico Correctamente?");
       if (eliminar)
           //Redireccionamos si das a aceptar
             window.location.href = "modificar/ventaVerificada.php?id="+id; //página web a la que te redirecciona si confirmas la eliminación
             else
          //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
      alert("NO! Se Realizó Ningún Cambio!...")
  }
</script> 
</body>
</html>
