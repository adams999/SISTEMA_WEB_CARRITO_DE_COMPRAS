<!DOCTYPE html>

<?php //esta es la validacion para el Administrador!!!!
session_start(); extract($_GET);
if ($_SESSION['id_usuarioA'] and $_GET) {
//echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}
?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Modificar Producto</title>
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/styleDescriProd.css">
    <link rel="icon" href="img/icono1.ico">
</head>
<body>
    <section class="container-fluid">
        
        <?php include('include/menuAdministrador.php'); ?>

    <?php
   
    require("conexionBD/conexionBd.php");

    $sql="SELECT * FROM catalogo_venta WHERE id_producto_venta = '$id'";
//la variable  $conexion viene de connect_db que lo traigo con el require("connect_db.php");
    $ressql=pg_query($conexion,$sql);
    while ($row=pg_fetch_array ($ressql)){//aqui cargo las variables correspondientes al array del producto
        $cod_prod=$row['codigo_producto_v'];
        $nom_prod=$row['nombre_producto_v'];
        $usuarioA=$row['id_usuario_a'];
        $categoria=$row['categoria'];
        $marca=$row['marca'];
        $descripcion=$row['descripcion'];
        $imagen=$row['imagen'];
        $tipo_unidad=$row['tipo_unidad'];
        $productos_vendidos=$row['productos_vendidos'];
        $productos_disponibles=$row['productos_disponibles'];
        $precBase=$row['precio_base'];
        $ivaProd=$row['iva_producto'];
        $pvp=$row['pvp'];
    }



$sql="SELECT * FROM usuario WHERE id_usuario = '$usuarioA'";
//la variable  $conexion viene de connect_db que lo traigo con el require("connect_db.php");
    $ressql=pg_query($conexion,$sql);
    while ($row=pg_fetch_array ($ressql)){//aqui cargo las variables correspondientes al array del usuario
        $nombre_usuario_a=$row['nombre_usuario'];

    }




    $sql="SELECT * FROM ganancia_iva";
//la variable  $conexion viene de connect_db que lo traigo con el require("connect_db.php");
    $resql=pg_query($conexion,$sql);
    while ($row9=pg_fetch_array ($resql)){//aqui cargo las variables correspondientes al array del producto
        $ganancia=$row9['ganancia'];
        $iva=$row9['iva'];
    }

    ?>

    <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
        <p class="textLog" >
            <img class="logoDescrip" src="img/logo1.jpg">
            <a name="ir"></a>
            <u>Modificar el Producto de la Categoria:</u>&nbsp;&nbsp;"<?php echo"$categoria";?>"
        </p>

        <article class="container" style="background: #F4FAFF;margin-top: 20px">



<input type="hidden" name="ganancia" id="ganancia" onKeyUp="calPrecio()" <?php echo 'value="'.$ganancia.'"'; ?>">
<input type="hidden" name="iva" id="iva" onKeyUp="calPrecio()" <?php echo 'value="'.$iva.'"'; ?>">

 

            <form class="form-group" action="modificar/modificarProducto.php" method="post" enctype="multipart/form-data">
                <div class="row-fluid " >

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 contenedorImgDescrip" >
                     <?php 
                     echo '<img class="imgDescrip " src="imagenesRepuestos/'.$imagen.'">';
                     ?> 

                     <label class="labelTitulo3">Cambiar Imagen Por:<br></label>
                     <p>
                        <input type="file" name="cambiarImagen" class="form-control">
                    </p>
                </div>

<input type="hidden" name="id_producto_venta" <?php echo 'value="'.$id.'"'; ?>>

            </div>

            <div class=" col-lg-6  col-md-6  col-sm-6 col-xs-12 ">

                <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
                    <h1><p style="font-size: 16pt;color: red;font-weight: bolder">Nombre Del Producto:</p></h1>

                    <p class="has-success" align="center">
                        <input type="text" required="required" name="cambiarNombre" value="<?php echo "$nom_prod";?>" class="form-control" align="center" autofocus minlength="5" maxlength="32" pattern="[A-Za-z 0-9]+">
                    </p>
                    <br>
                </div>

                <div class=" col-lg-offset-6 col-md-offset-6 col-sm-offset-6 col-xs-offset-12">
                    <br>
                </div>

                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 div1" align="center">
                    <label class="labelTitulo">Código:</label>
                    <p class="descrip">
                        <input type="text" value="<?php echo"$cod_prod"?>" class="form-control" readonly="readonly" style="width: 150px" name="codigoProductoV" required >    

                    </p>
                </div>

                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 div1" align="center">
                    <label class="labelTitulo">Marca</label>
                    <p class="descrip">
                        <input type="text" name="cambiarMarca" required="required" value="<?php echo"$marca";?>" class="form-control"  style="width: 150px" minlength="5" maxlength="15" pattern="[A-Za-z 0-9]+">
                    </p>
                </div>

                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 div1" align="center">
                    <label class="labelTitulo">Tipo U.</label>
                    <p class="descrip">
                        <select name="cambiarTipoU" class="form-control">
                            <option><?php echo "$tipo_unidad"; ?></option>
                            <option>Unidad</option>
                            <option>Par</option>
                            <option>Kit</option>
                        </select>
                    </p>
                </div>

                <div class=" col-lg-offset-6 col-md-offset-6 col-sm-offset-6 col-xs-offset-12">
                    <br>
                </div>

                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 div2" align="center"><br>
                    <label class="labelTitulo2">Disponibles</label>
                    <p class="descrip">
                        <input type="number" name="cambiarDisponibilidad" value="<?php echo"$productos_disponibles";?>" class="form-control" required="required" style="width: 75px" maxlength="10">
                    </p>
                </div>

                <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-12 div2" align="center">
                    <label class="labelTitulo2">Descripción</label>

                    <textarea class="form-control" type="text" name="cambiarDescripcion" required="required" maxlength="100" minlength="5" maxlength="250" pattern="[A-Za-z 0-9]+"><?php echo$descripcion?></textarea>

                </div>

                <div class=" col-lg-offset-6 col-md-offset-6 col-sm-offset-6 col-xs-offset-12">
                    <br>
                </div>


                <div class=" col-lg-12 col-md-12col-sm-12 col-xs-12 div1" align="center" style="margin-top: 15px">
                    <label class="labelTitulo2">Precio Costo</label>
                    <p class="descrip" align="center">
                        <input type="number" class="form-control" style="width: 150px;" align="center" id="num1" onKeyUp="calPrecio()" name="precioCosto" maxlength="20" pattern="[0-9]+">

                    </p>
                </div>


                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 div3" align="center">
                    <label class="labelTitulo3">Precio Base</label>
                    <p class="descrip">
                        <input type="text" name="cambiarPrecioBase" value="<?php echo"$precBase";?>" class="form-control" required="required" style="width: 90%" id="num2" onKeyUp="calPrecio()" readonly="readonly">
                    </p>
                </div>

                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 div3" align="center">
                    <label class="labelTitulo3">Iva <?php echo $iva=str_replace(array(' ','-','0.'), '', $iva); ?>%</label>
                    <p class="descrip">
                        <input type="text" name="cambiarIva" value="<?php echo"$ivaProd";?>" class="form-control" required="required" style="width: 90%" id="num3" onKeyUp="calPrecio()" readonly="readonly">
                    </p>
                </div>

                <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 div4" align="center">
                    <label class="labelTitulo3">PVP</label>
                    <p class="precio">
                        <input type="text" name="cambiarPvp" value="<?php echo"$pvp";?>" class="form-control" required="required" style="width: 90%;font-size: 15pt" id="num4" onKeyUp="calPrecio()" readonly="readonly">
                    </p>
                </div>   
            </div>                                

            <div class=" col-lg-6  col-md-6  col-sm-6 pull-right " align="center">


                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
                 <a href="#">
                   <button class="btn btn-group descripApartar" type="submit">
                    Editar&nbsp;&nbsp;   <i class="glyphicon glyphicon-pencil"></i>
                </button>     
            </a>
            <input type="hidden" name="id" value="<?=$cod_prod?>">
        </a>
    </div>

</div> 
</form>


<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="pull-left">
    <b><?php echo "Ultima Modificación Hecha Por:</b>  -$nombre_usuario_a-"; ?>  
</div>

</article>
<div class="row row-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
    <p class="nombreYural"><img src="icon/iconYural.jpg" class="imgYural">&nbsp;&nbsp;Repuestos Yural</p><a name="abajo"></a>
</div>

<hr class="hr1">



<article class="container" style="background: #FAF7FF;margin-top: 20px">
    <?php  


    echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'align='justify'>
    <p class='estyleComent' align='justify'>
        <a name='abajo'></a>
        Opiniones:</p><br>
    </div>";


    @$sql4="SELECT * FROM opiniones WHERE id_producto_venta = '$id' and estatus=1 ORDER BY fecha_hora_opinion DESC";

    @$registros= pg_query($conexion,$sql4);
    @$num = pg_num_rows($registros);
    @$pag = ceil($num / 8);

    @$prodIni=$_GET['ini'];
    @$prodFin=$_GET['fin'];

    echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='center' style='font-size:80%; color:green;'>
    $num Opiniones. En $pag Páginas. ";

    if (isset($prodIni) and isset($prodFin)) {
       echo "&nbsp;&nbsp;&nbsp;Opiniones: $prodIni - $prodFin";
   }
   echo "<br></div>";

   if(isset($_GET['ini'])){
    $ini=$_GET['ini'];
    $fin=$_GET['fin'];
    $sql4="SELECT * FROM opiniones WHERE id_producto_venta = '$id' and estatus=1 ORDER BY fecha_hora_opinion DESC LIMIT 8 offset $ini";
}
else{
    $sql4="SELECT * FROM opiniones WHERE id_producto_venta = '$id' and estatus=1 ORDER BY fecha_hora_opinion DESC LIMIT 8 offset 0";
}


if ($num==0) {
    echo "<div align='center'><p><br><br><br><br>No Hay opiniones!!!</p></div>";
}


@$ressql4=pg_query($conexion,$sql4);
    while (@$row3=pg_fetch_array ($ressql4)){//aqui cargo las variables correspondientes al array del producto
        $idComentario=$row3['id_opinion'];
        $id_usuario=$row3['id_usuario'];
        $comentario=$row3['opinion_usuario'];
        $fechaHoraComentario=$row3['fecha_hora_opinion'];

        $sql5="SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";

//la variable  $conexion viene de connect_db que lo traigo con el require("connect_db.php");
        $ressql5=pg_query($conexion,$sql5);
    while ($row5=pg_fetch_array ($ressql5)){//aqui cargo las variables correspondientes al array del producto
        $telefPersonal=$row5['telef_personal'];
        $telefHogar=$row5['telef_hog'];
        $cod_telef_pers=$row5['cod_telef_pers'];
        $cod_telef_hog=$row5['cod_telef_hog'];
        $nombreUsuario=$row5['nombre_usuario'];
        $apellidoUsuario=$row5['apellido_usuario'];
        $correoUsuario=$row5['correo_usuario'];

        echo "
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 divComentario ' align='justify'>

                <label class='nombreComentario'>
                    Usuario: <i>$nombreUsuario $apellidoUsuario</i>
                    &nbsp;&nbsp;&nbsp; 
                    <b>Correo: </b><i>$correoUsuario</i>&nbsp;&nbsp;&nbsp;
                    <b>Teléfono Personal: </b><i>$cod_telef_pers-$telefPersonal </i>&nbsp;&nbsp;&nbsp;
                    <b>Teléfono Hogar: </b><i>$cod_telef_hog-$telefHogar</i>
                </label>
                <p>
                    <b class='titComen'>Comentario:</b> <z class='Comentario'>$comentario</z>
                </p>
                <label class='nombreComentario'>
                    <p>
                        <b>Fecha/Hora: </b><i>$fechaHoraComentario</i>
                    </p>
                </label> 
        
        </div>

        <hr style='color:green; border:1px; border-style:solid; border-color:green; width:90%'>";
    }
}

echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center" style="color:green">
<hr class="hr2">Pag.';
for($c=1;$c<=$pag;$c++){
    $ini=$c*8-8;
    $fin=$ini+7;
    echo ' <a href="modProdADMIN.php?ini='.$ini.'&fin='.$fin.'&id='.$id.'#abajo">'.$c.'</a>&nbsp;&nbsp;';
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
<script src="js/calculoPrecio.js"></script>


</body>
</html>
