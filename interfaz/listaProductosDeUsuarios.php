<!DOCTYPE html>

<?php //esta es la validacion para el Administrador!!!!
session_start();
if ($_SESSION['id_usuarioA']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}

$nombreAdmin=$_SESSION['nombre'];
?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Productos Apartados por Usuarios</title>
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
            Productos Apartados por Usuarios <i class="glyphicon glyphicon-shopping-cart"></i></p>
        </div>

        <?php 

        $acumulador=0;
        
                //aqui cargo la variable con la cedula correspondiente del usuario logeado en el momento, para poder comparar y traer lo que tengo en la base de datos de apartados y mostralos

        require("conexionBD/conexionBD.php");
        $sql="SELECT * FROM apartado WHERE estatus=1 ORDER BY id_apartado_usuario DESC";
        /* codigos de paginacion */
        $registros= pg_query($conexion,$sql);
        $num = pg_num_rows($registros);
        $pag = ceil($num / 10);

        @$prodIni=$_GET['ini'];
        @$prodFin=$_GET['fin'];

        echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='right' style='font-size:80%; color:green;'>
        $num Apartado. En $pag Páginas. ";

        if (isset($prodIni) and isset($prodFin)) {
         echo "&nbsp;&nbsp;&nbsp;Apartado: $prodIni - $prodFin";
     }
     echo "<br></div>";

     if(isset($_GET['ini'])){
        $ini=$_GET['ini'];
        $fin=$_GET['fin'];
        $sql="SELECT * FROM apartado WHERE estatus=1 ORDER BY id_apartado_usuario DESC LIMIT 10 offset $ini";
    }else{
        $sql="SELECT * FROM apartado WHERE estatus=1 ORDER BY id_apartado_usuario DESC LIMIT 10 offset 0";
    }

    $query=pg_query($conexion,$sql);


    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <table class="table table-bordered" align="center">
        <tr class=" btn-primary trTitulo" align="center">
            <td class="titulo" width="10%" align="center">N° <br>Apartado</td>
            <td class="titulo" width="30%">Usuario/Contacto Usuario</td>
            <td class="titulo" width="30%">Nombre/Dirección Usuario</td>
            <td class="titulo" width="15%">Cantidad <br> Productos Apartados</td>
            <td class="titulo" width="10%">Fecha/Hora Apartado</td>
            <td class="titulo" width="5%">Acción</td>
        </tr>
    </table>
</div>';

if ($num==0 or $num==null) {
    echo "<div align='center' style='color:red; font-size:20px;'>No hay Apartados por Usuarios<br><br><br></div>";
}

        while($arreglo=pg_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
        $id_apartado_usuario=$arreglo['id_apartado_usuario'];
        $id_usuario=$arreglo['id_usuario'];
        $fecha_hora_apartado=$arreglo['fecha_hora_apartado'];
        



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




                                $sql5=("SELECT id_detalle_apartado,id_usuario,id_producto_venta,cantidad_apartada,fecha_hora,id_apartado,precio_unidad, to_char(DATE(fecha_hora)+'3 days'::interval, 'DD/MM/YYYY')  as fecha3dias FROM public.detalle_apartado where id_apartado='$id_apartado_usuario'");

                //la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
                                $query5=pg_query($conexion,$sql5);

                    //con este array cargo los datos personales del usuario para despues mostrar la informacion del mismo 
                                $acum_cant_apart=0;
                                $acumuladorPrecioApart=0;
                                while($arreglo5=pg_fetch_array($query5)){
                                    $cantidad_apartada=$arreglo5['cantidad_apartada'];
                                    $precio_unidad=$arreglo5['precio_unidad'];
                                    $precio_unidad=str_replace(array(' ','-','.'), '', $precio_unidad);
                                    $precio_unidad=str_replace(array(' ','-',','), '.', $precio_unidad);
                                    $precioUnidadporCantidad=$precio_unidad*$cantidad_apartada;
                                    @$acum_cant_apart+=$cantidad_apartada;

                                    @$acumuladorPrecioApart+=$precioUnidadporCantidad;
                                    }
                                    $acumuladorPrecioApart=number_format($acumuladorPrecioApart,2,",",".");
                                    date_default_timezone_set('America/Caracas');

//aqui muestro el tr con los apartados correspondientes del usuario logueado
                echo'   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
                <table class="table table-bordered table-hover table-striped" align="center"> ';
                
                                   

                

                    echo'<tr class="parrafo " align="center"';
                    
                    
                    if ($arreglo5['fecha3dias'] == date('d/m/Y')) {
                              echo  "style='background:#aaa'";
                            } 
                    echo'>

                        <td class="titulo" width="10%"><br><br>
                            <b>'.$id_apartado_usuario.'</b> 
                        </td>

                        <td class="titulo" width="30%">
                            <b>CI: </b>';
                             echo $cedula_usuario;
                            echo '<br>
                            <b>Correo: </b>'.$correo_usuario.'<br><br>
                            <b>Telef1: </b>'.$cod_telef_pers.'-'.$telef_personal.'<br>
                            <b>Telef2: </b>'.$cod_telef_hog.'-'.$telef_hog.'
                        </td>

                        <td class="titulo" width="30%">
                            <b>Nombre: </b>'.$nombre_usuario.'<br>
                            <b>Apellido:</b>'.$apellido_usuario.'<br>
                            <b>Estado: </b>'.$estado.'<br>
                            <b>Ciudad: </b>'.$ciudad.'<br>
                            <b>Dirección: </b>'.$direccion.'
                        </td>

                        <td class="titulo" width="15%"><br>
                            <b>Productos: </b>'.$acum_cant_apart.'<br><br>
                            <b>Bs: </b>'.@$acumuladorPrecioApart.'
                        </td>

                        <td class="titulo" width="10%"><br><br>
                            '.$fecha_hora_apartado.'
                        </td>

                        <td class="titulo" width="5%">
                            <a href="descripcionApartado.php?id='.$id_apartado_usuario.'#ir">    
                                <i class="glyphicon glyphicon-eye-open" style="color:orange;" title="Ver Detalles"></i>
                            </a><hr>
                            <a onclick="javascript:preguntar(id='.$id_apartado_usuario.')"">    
                                <i class="glyphicon glyphicon-remove-circle" style="color:Red;" title="Eliminar Apartado"></i>
                            </a>
                        </td>
                    </tr> 

                </table>
            </div>';
            }
        
    }

        echo "<div align='center'>
        <b>
            Total de Productos Apartados: "; echo @$acum_cant_apart; echo"<br><br>
        </b>
    </div>";


/* numeros de paginacion  */
echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center" style="color:green"><hr width="75%">Pag.';
for($c=1;$c<=$pag;$c++){
    $ini=$c*10-10;
    $fin=$ini+9;
    echo ' <a href="listaProductosDeUsuarios.php?ini='.$ini.'&fin='.$fin.'#ir">'.$c.'</a>&nbsp;&nbsp;';
}
echo '</div>';


?>    
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
    <br><br><a href="indexAdmin.php#ir">
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
       eliminar=confirm("ADMINISTRADOR  -<?php echo "$nombreAdmin"; ?>- ¿Estas Seguro de Eliminar y Restaurar Todos los productos de Este Apartado? Despues de Eliminarlo no Hay Vuelta Atras...");
       if (eliminar)
           //Redireccionamos si das a aceptar
             window.location.href = "modificar/borrarApartadoCompletoAdmin.php?id="+id; //página web a la que te redirecciona si confirmas la eliminación
             else
          //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
      alert("NO! Eliminaste El Apartado")
  }
</script> 
</body>
</html>
