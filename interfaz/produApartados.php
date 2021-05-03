<!DOCTYPE html>

<?php //esta es la validacion para los Usuarios!!!!
session_start();
if ($_SESSION['id_usuario']) {
//echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}
require("conexionBD/conexionBD.php");  
$nombreUsuario=$_SESSION['nombre_usuario']; 
$apellidoUsuario=$_SESSION['apellido_usuario'];

?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Productos Apartados</title>
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/styleCatalogo.css">
    <link rel="stylesheet" type="text/css" href="css/styleApartado.css">
    <link rel="icon" href="img/icono1.ico">
</head>
<body>
    <section class="container-fluid">
        
        <?php include'include/menuUsuario.php'; ?>


<?php 
$acumuladorCancelado=0;
$sql3=("SELECT * FROM apartado where id_usuario='{$_SESSION['id_usuario']}' and estatus=2");

//la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
$query3=pg_query($conexion,$sql3);


while($arreglo3=pg_fetch_array($query3)){//este arreglo ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
    $cantApartada2=$arreglo3['estatus'];
    $acumuladorCancelado+=$cantApartada2;
    $acumuladorCancelado=($acumuladorCancelado-1);
}
?>



<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" >

</div>

<article class="row-fluid">

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" align="center">
        <br>
        <p class="titulo1">
        <a name="ir"></a>
        Mis Productos Apartados <i class="glyphicon glyphicon-shopping-cart"></i></p>
        <br>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" align="center"><br><br>
        <a href="misProductosCancelados.php#ir">
            <button class="btn btn-danger" >Mis Compras <i class="glyphicon glyphicon-piggy-bank"></i> 
                <?php
                if ($acumuladorCancelado>0) {
                    echo '&nbsp;<span class="badge">'.$acumuladorCancelado.'</span>';
                } ?>

            </button>
        </a><br>
        
    </div>



    <?php 
    $acumulador=0;
    $acumCant=0;
        //aqui cargo la variable con la cedula correspondiente del usuario logeado en el momento, para poder comparar y traer lo que tengo en la base de datos de apartados y mostralos
    $id_usuario=$_SESSION['id_usuario'];

    require("conexionBD/conexionBD.php");
    $sql="SELECT id_detalle_apartado,id_usuario,id_producto_venta,cantidad_apartada,fecha_hora,id_apartado,precio_unidad, to_char(DATE(fecha_hora)+'3 days'::interval, 'DD/MM/YYYY')  as fecha3dias FROM public.detalle_apartado where id_usuario='$id_usuario' and estatus=1 ORDER BY id_detalle_apartado DESC";


//aqui muestro la cabecera de la descripcion de la tabla de los apartados
echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<table class="table table" align="center">
    <tr class=" btn-primary trTitulo" align="center">
        <td class="titulo" width="10%">ID Detalle Apartado</td>
        <td class="titulo" width="15%">Codigo Producto</td>
        <td class="titulo" width="20%">Imagen del Producto</td>
        <td class="titulo" width="15.5%">Nombre Producto</td>
        <td class="titulo" width="5%">Cant</td>
        <td class="titulo" width="18">Precio</td>
        <td class="titulo" width="12%">Fecha de Apartado</td>
        <td class="titulo" width="5%">Acción</td>
    </tr>
</table>
</div>';


$query=pg_query($conexion,$sql);

while($arreglo=pg_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
    $id_detalle_apartado=$arreglo['id_detalle_apartado'];
    $id_usuario=$arreglo['id_usuario'];
    $id_producto_venta=$arreglo['id_producto_venta'];
    $cantApartada=$arreglo['cantidad_apartada'];
    $dateTime=$arreglo['fecha_hora'];
    $id_apartado=$arreglo['id_apartado'];
    $precioProducto=$arreglo['precio_unidad'];

        $sql2="SELECT * FROM catalogo_venta where id_producto_venta='$id_producto_venta'";

        $query2=pg_query($conexion,$sql2);

        while($arreglo2=pg_fetch_array($query2)){//este arreglo2 ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
            $codProd=$arreglo2['codigo_producto_v'];
            $imagen=$arreglo2['imagen'];
            $nomProd=$arreglo2['nombre_producto_v'];



                $sql5="SELECT * FROM apartado where id_apartado_usuario='$id_apartado' and id_usuario='$id_usuario'";

                $query5=pg_query($conexion,$sql5);

                while($arreglo5=pg_fetch_array($query5)){//este arreglo2 ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
                    $fecha_hora_apartado=$arreglo5['fecha_hora_apartado'];
                    
                
                    
//aqui muestro el tr con los apartados correspondientes del usuario logueado
    echo'   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">';
    date_default_timezone_set('America/Caracas');
    if ($arreglo['fecha3dias'] == date('d/m/Y')) {
        echo "<b style='color:red'>Por favor Cancela este producto ya que hoy es la Fecha Limite!!!</>";
    }
    echo'
    <table class="table table" align="center">
        <tr class="parrafo" align="justify">
            <td class="parrafo" width="10%" align="center"><br><br>'.$id_detalle_apartado.'</td>
            <td class="parrafo" width="15%" align="center"><br><br>
                <a href="descriProd.php?id='.$id_producto_venta.'#ir">
                    <u>'.$codProd.'</u>
                </a>
            </td>
            <td class="parrafo" width="20%">
                <a href="descriProd.php?id='.$id_producto_venta.'#ir">
                    <img src="imagenesRepuestos/'.$imagen.'" class="imgDescrip">
                </a>
            </td>
            <td class="parrafo" width="15%" align="center"><br>'.$nomProd.'</td>
            <td class="parrafo" width="5%" align="center"><br><br>'.$cantApartada.'</td>
            <td class="parrafo" width="17%" align="center">Precio Unitario BS: '.$precioProducto.'<hr>Precio Total BS:'; 

            $precioProducto=str_replace(array(' ','-','.'), '', $precioProducto);
            $precioProducto=str_replace(array(' ','-',','), '.', $precioProducto);

            $multiplica=$precioProducto*$cantApartada;
            

            $multiplica=number_format($multiplica,2,",","."); echo''.$multiplica.'</td>
            <td class="parrafo" width="12%" align="center">'.$dateTime.'<br><hr><a style="color:blue">Fecha Limite</a> <br><a style="color: orange">'.$arreglo['fecha3dias'].'</a></td>
            <td class="parrafo" width="5.5%" align="center"><br><br>

                <a onclick="javascript:preguntar(id='.$id_detalle_apartado.')">
                    <button class="btn-group btn-link">
                        <i class="glyphicon glyphicon-trash" style="color:red;"></i>
                    </button>
                </a>

            </td>
        </tr> 
    </table>
</div>';

$multiplica=str_replace(array(' ','-','.'), '', $multiplica);
$multiplica=str_replace(array(' ','-',','), '.', $multiplica);
$acumulador+=$multiplica;
$acumCant+=$cantApartada;
        }

    }   

}


if (!@$id_apartado) {
    echo "<div align='center' class='col-lg-12 col-md-12 col-sm-12 col-xs-12'><br><br>No Tienes Ningun Producto Apartado!!!<br><br><br><br><br><br></div>";
}

$acumulador=number_format($acumulador,2,",",".");





if (@$id_apartado==true) {
    echo "<div align='center' class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>

    <p>
        <font color='#2C6499' style='font-size:180%;'><hr>
            <b> Cant. Apartada: $acumCant&nbsp;&nbsp;&nbsp; Precio Total a Pagar: Bs. $acumulador<b>
        </font>
    <p>

    </div>";
}




if (@$id_apartado==true) {

    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
</div>';

echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " align="center"><br><br>

<marquee behavior="alternate" align="center">
    <p >
        <label style="color:red;">
                    *TIENES 3 DÍAS PARA CONCRETAR TU COMPRA UNA VEZ APARTADO EL PRODUCTO*
        </label>
    </p>
</marquee>

</div>















<!-- Button trigger modal -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#bancoEmpresaAPagar">
  Cancelar Productos <i class="glyphicon glyphicon-eye-open"></i>
</button><br><br><br><br><br>
</div>';
}
?>







<!-- Modal -->
<div class="modal fade" id="bancoEmpresaAPagar" tabindex="-1" role="dialog" aria-labelledby="bancoEmpresaAPagarTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="bancoEmpresaAPagarTitle" align="center">
            <b style="color: grey">Cancelar a Nuestros Bancos <i class="glyphicon glyphicon-piggy-bank"></i></b>
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class=" modal-body col-lg-12 col-md-12 col-xs-12 col-xs-12">
        <?php 

            $sql8="SELECT * FROM bancos_empresa where estatus=1 ORDER BY nomb_banc_empr asc";

            $query8=pg_query($conexion,$sql8);

            while($arreglo8=pg_fetch_array($query8)){//este arreglo2 ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
                $id_banco_empresa=$arreglo8['id_banco_empresa'];
                $nomb_banc_empr=$arreglo8['nomb_banc_empr'];
                $tipo_cuen_empr=$arreglo8['tipo_cuen_empr'];
                $num_cuen_empr=$arreglo8['num_cuen_empr'];
                $titu_cuen_empr=$arreglo8['titu_cuen_empr'];
                $cedu_cuen_empr=$arreglo8['cedu_cuen_empr'];

                echo '
                        <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                        <h5><b>BANCO: </b>'.$nomb_banc_empr.'</h4>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" align="center">
                        <h5> <b>Tipo Cuenta: </b>'.$tipo_cuen_empr.'</h5>
                        </div>

                        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                        <h5><b>Titular: </b>'.$titu_cuen_empr.'</h4>
                        </div>

                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" align="center">
                        <h5> <b>Cedula: </b>'.$cedu_cuen_empr.'</h5>
                        </div>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
                            <h5 style="font-size:110%"><b>N° Cuenta: </b> '.$num_cuen_empr.'</h5>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <hr>
                        </div>';
            } 





            $sql9="SELECT * FROM empresa ";

            $query9=pg_query($conexion,$sql9);

            while($arreglo9=pg_fetch_array($query9)){//este arreglo2 ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
                $telefono_empresa=$arreglo9['telefono_empresa'];
                $correo_empresa=$arreglo9['correo_empresa'];
            }

            ?>

                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" align="center">
                    <b>Contacto <i class="glyphicon glyphicon-earphone"></i></b>
                    <h5><b>Telefono:</b> <?php echo $telefono_empresa; ?><br><h5>
                    <h5><b>Enviar Capture a:</b> <?php echo $correo_empresa; ?><h5>
                </div>


            <?php
            echo '<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" align="center">
                    <p style="font-size:130%"><br>
                        <b style="color: green;">Cancelar:</b> BS. '.$acumulador.'
                    </p>
                </div>'
        ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <hr>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
            <a><p style="font-size: 10pt" class="has-info">
                <i class="glyphicon glyphicon-info-sign"></i> Por Favor Cancelar Todo el Monto a Un Solo Banco
            </p></a>
        </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerar</button>
        <?php   
        echo'  
            <a href="formularioPagoProducto.php?id='.@$id_apartado.'&monto='.$acumulador.'&acumCant='.$acumCant.'#ir">
                <button type="button" class="btn btn-success">Ya Realizé el Pago <i class="glyphicon glyphicon-ok"></i></button>
            </a>'
        ?>  
        
      </div>
    </div>
  </div>
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
       eliminar=confirm("-<?php echo "$nombreUsuario $apellidoUsuario"; ?>- ¿Deseas Eliminar Este Apartado?");
       if (eliminar)
   //Redireccionamos si das a aceptar
     window.location.href = "modificar/borrarApartadoUser.php?id="+id; //página web a la que te redirecciona si confirmas la eliminación
     else
  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
alert("NO! Has Eliminado Ningún Producto Apartado...")
}
</script> 
</body>
</html>
