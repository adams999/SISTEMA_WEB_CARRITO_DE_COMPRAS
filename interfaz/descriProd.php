<!DOCTYPE html>

<?php //esta es la validacion para los Usuarios!!!!
session_start();
if ($_SESSION['id_usuario']) {
//echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}
require("conexionBD/conexionBD.php");
?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Descripción Articulo</title>
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/styleDescriProd.css">
    <link rel="icon" href="img/icono1.ico">
</head>
<body>
    <section class="container-fluid">
        
        <?php include'include/menuUsuario.php'; ?>

<?php
extract($_GET);
require("conexionBD/conexionBd.php");

$sql="SELECT * FROM catalogo_venta WHERE id_producto_venta = '$id'";
//la variable  $conexion viene de connect_db que lo traigo con el require("connect_db.php");
$ressql=pg_query($conexion,$sql);
while ($row=pg_fetch_array ($ressql)){//aqui cargo las variables correspondientes al array del producto
    $id_producto_venta=$row['id_producto_venta'];
    $cod_prod=$row['codigo_producto_v'];
    $nom_prod=$row['nombre_producto_v'];
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
    @$numero_comentario=$row['num_comentario'];
}



$ee="SELECT * FROM ganancia_iva";
//la variable  $conexion viene de connect_db que lo traigo con el require("connect_db.php");
$ww=pg_query($conexion,$ee);
while ($qq=pg_fetch_array ($ww)){//aqui cargo las variables correspondientes al array del producto
    $iva=$qq['iva'];
    
}

?>

<div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
    <p class="textLog" >
        <img class="logoDescrip" src="img/logo1.jpg">
        <a name="ir"></a>
         Categoria:
        <?php echo"$categoria";?>
    </p>

    <article class="container" style="background: #F4FAFF;margin-top: 20px">

        <div class="row-fluid " >

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 contenedorImgDescrip" >

                <img class="imgDescrip" src="<?php echo 'imagenesRepuestos/'.$imagen.'';?>"  id="img_01">




            </div>


        </div>

        <div class=" col-lg-6  col-md-6  col-sm-6 col-xs-12 ">

            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
                <h1>
                    <p class="tituloArticulo">
                        <?php echo "$nom_prod";?>
                    </p>
                </h1><br>
            </div>

            <div class=" col-lg-offset-6 col-md-offset-6 col-sm-offset-6 col-xs-offset-12">
                <br>
            </div>

            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 div1" align="center">
                <label class="labelTitulo">Código:</label>
                <p class="descrip"><?php echo"$cod_prod"?></p>
            </div>

            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 div1" align="center">
                <label class="labelTitulo">Marca</label>
                <p class="descrip"><?php echo"$marca";?></p>
            </div>

            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 div1" align="center">
                <label class="labelTitulo">Tipo U.</label>
                <p class="descrip"><?php echo "$tipo_unidad";?></p>
            </div>

            <div class=" col-lg-offset-6 col-md-offset-6 col-sm-offset-6 col-xs-offset-12">
                <br>
            </div>

            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 div2" align="center"><br>
                <label class="labelTitulo2">Disponibles</label>
                <p class="descrip"><?php echo"$productos_disponibles";?></p>
            </div>

            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-12 div2" align="center">
                <label class="labelTitulo2">Descripción.</label>
                <p class="descrip" align="justify"><?php echo"$descripcion";?></p>
            </div>

            <div class=" col-lg-offset-6 col-md-offset-6 col-sm-offset-6 col-xs-offset-12">
                <br>
            </div>

            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 div3" align="center">
                <label class="labelTitulo3">Precio</label>
                <p class="descrip">Bs &nbsp;<?php echo"$precBase";?></p>
            </div>

            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 div3" align="center">
                <label class="labelTitulo3">Iva <?php echo $iva=str_replace(array(' ','-','0.'), '', $iva); ?> %</label>
                <p class="descrip">Bs &nbsp;<?php echo"$ivaProd";?></p>
            </div>

            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 div4" align="center">
                <label class="labelTitulo3">PVP</label>
                <p class="precio" style="font-size: 140%;">Bs &nbsp;<?php echo"$pvp";?></p>
            </div>   
        </div>                                


        <?php 
        if ($productos_disponibles>0) {
            echo '<div class=" col-lg-6  col-md-6  col-sm-6 pull-right " align="center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" align="right">
                    <label class="labelTitulo4">
                        Cant. a Apartar&nbsp;<i class="glyphicon glyphicon-arrow-right"></i>
                    </label>
                </div>

                <form class="form form-group" action="apartados/apartar.php" method="GET">
                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4 has-warning" align="center">
                        <br>
                        <input title="Maximo de 5 Productos a Apartar" type="text" class="cantidadApartada form-control" minlength="1" maxlength="3" required="required" name="cantidad" pattern="[1-5]+">
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" align="center">';

                     echo '<a href="apartados/apartar.php">
                     <button class="btn btn-group descripApartar" type="submit">
                        Apartar&nbsp;&nbsp;   <i class="glyphicon glyphicon-ok"></i>
                    </button>     
                </a></div>';
            }
            ?>
            <input type="hidden" name="id" value="<?=$id_producto_venta?>">
        </a>

    </form>


</div>
</div>  
<?php 
if ($_SESSION['correo_usuario']) {
    echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='center'>
    <p><a href='descriProd.php?id=$id#ir' ><i class='glyphicon glyphicon-alert'></i> Los Precios Pueden Estar Sujetos a Cambios Sin Previo Aviso.</a><p>
    </div>";
}
?>   


</article>

<div class="row row-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
    <p class="nombreYural"><img src="icon/iconYural.jpg" class="imgYural">&nbsp;&nbsp;Repuestos Yural</p>
</div>

<hr class="hr1">



<article class="container" style="background: #FAF7FF;margin-top: 20px">
<a name="comentar"></a>


    <?php 
    require("conexionBD/conexionBD.php");
    $id_usuario=$_SESSION['id_usuario'];




if (@$permiso) {
    ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form class="form form-group" action="opinar/opinarUsua.php" method="POST">
                
                <label>Vamos!!! Opina Sobre Este Producto y Tù Experiencia en Yural C.A. Por Favor:</label>
                
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-8">
                    <textarea class="form-control" rows="3" minlength="20" maxlength="255" placeholder="Que Tal Fue Tù Experiecia con la Compra de este Articulo y con Nosòtros?" name="opinion" required autofocus pattern="[A-Za-z.0-9 ]+" title="No Se Admiten Caracteres Especiales" type="text" ></textarea>
                </div>

                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4" align="center"><br>
                    <button class="btn btn-primary">
                        Opinar <i class="glyphicon glyphicon-thumbs-up"></i>
                    </button>
                </div>
                <input type="hidden" name="id_compra" <?php echo 'value="'.$id_compra.'"'; ?>>
                <input type="hidden" name="id_producto_venta" <?php echo 'value="'.$id.'"'; ?>>
            </form>
    </div>

<?php
}



 
echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'align='center'><br>
<p class='estyleComent' align='center'><i class='glyphicon glyphicon-chevron-down'></i> Opiniones:  </p><br>
</div>";


$sql4="SELECT * FROM opiniones WHERE id_producto_venta = '$id' and estatus=1 ORDER BY id_opinion DESC";

@$registros= pg_query($conexion,$sql4);
@$num = pg_num_rows($registros);
$pag = ceil($num / 8);

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
    $sql="SELECT * FROM opiniones WHERE id_producto_venta = '$id' and estatus=1 ORDER BY id_opinion DESC  LIMIT 8 offset $ini";
}else{
    $sql="SELECT * FROM opiniones WHERE id_producto_venta = '$id' and estatus=1 ORDER BY id_opinion DESC  LIMIT 8 offet 0";
}
/* selector para que baje automaticamente al momento de solicitar ver mas Opiniones */
echo "<a name='abajo'></a>";


@$ressql4=pg_query($conexion,$sql4);
while (@$row3=pg_fetch_array ($ressql4)){//aqui cargo las variables correspondientes al array del producto
    $id_usuario=$row3['id_usuario'];
    $opinion=$row3['opinion_usuario'];
    $fechaHoraOpinion=$row3['fecha_hora_opinion'];



$qq="SELECT * FROM usuario WHERE id_usuario='$id_usuario'";
//la variable  $conexion viene de connect_db que lo traigo con el require("connect_db.php");

    $ww=pg_query($conexion,$qq);
while ($ee=pg_fetch_array ($ww)){//aqui cargo las variables correspondientes al array del producto

    $nombUsuaOpin=$ee['nombre_usuario'];
    $apellUsuaOpin=$ee['apellido_usuario'];





    echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 divComentario' align='justify'>
    <p>
        <b class='titComen'>Comentario:</b> <z class='Comentario'>$opinion</z>
    </p>
    <p>
        <label class='id_usuario'>Usuario:<i class='nombreComentario'> $nombUsuaOpin $apellUsuaOpin </i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            Fecha/Hora:<i class='nombreComentario'> $fechaHoraOpinion</i>
        </label>
    </p>

</div><hr style='color:green; border:1px; border-style:solid; border-color:green; width: 90%'>";
}}


if ($num==0) {
    echo "<div align='center' class='col-lg-12 col-md-12 col-sm-12 col-xs-12' style='color:#227654'><br><br>No Hay Opiniones Pero Tu Puedes Ser El Primero En Comentar!...Animate Y Compra Con Nosòtros!!<br><br><br></div>";
}


echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center" style="color:green">
        Pag.';
        for($c=1;$c<=$pag;$c++){
            $ini=$c*8-8;
            $fin=$ini+7;
            echo ' <a href="descriProd.php?ini='.$ini.'&fin='.$fin.'&id='.$id.'#abajo">'.$c.'</a>&nbsp;&nbsp;';
        }
        echo '</div>';
?>



</article>


<br>
<footer class="row">
    <?php 
        require("include/piePagina.php");
         ?>
</section>


<script src="../lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>  
<script src="js/ScriptImgYural.js"></script>
<script type="text/javascript" src="../lib/efectoLupa/jquery.js"></script>

</body>
</html>
