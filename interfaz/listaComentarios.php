<!DOCTYPE html>

<?php //esta es la validacion para el Administrador!!!!
session_start();
if ($_SESSION['correo_usuarioA']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}

$nombreAdmin=$_SESSION['nombre'];
?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Todas las Opiniones</title>
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
            Todos Los Comentarios  <i class="glyphicon glyphicon-comment"></i></p>
            
        </div>

        


        <?php
        require("conexionBD/conexionBD.php");
        $sql="SELECT * FROM opiniones where estatus=1";
        /* codigos de paginacion */
        $registros= pg_query($conexion,$sql);
        $num = pg_num_rows($registros);
        $pag = ceil($num / 10);

        @$prodIni=$_GET['ini'];
        @$prodFin=$_GET['fin'];

        echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='right' style='font-size:80%; color:green;'>
        $num Opiniones. En $pag Páginas. ";

        if (isset($prodIni) and isset($prodFin)) {
         echo "&nbsp;&nbsp;&nbsp;opiniones: $prodIni - $prodFin";
     }
     echo "<br></div>";

     if(isset($_GET['ini'])){
        $ini=$_GET['ini'];
        $fin=$_GET['fin'];
        $sql="SELECT * FROM opiniones where estatus=1 ORDER BY id_opinion DESC  LIMIT 10 offset $ini";
    }else{
        $sql="SELECT * FROM opiniones where estatus=1 ORDER BY id_opinion DESC  LIMIT 10 offset 0";
    }

    $query=pg_query($conexion,$sql);


    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <table class="table table-bordered" align="center">
        <tr class=" btn-primary trTitulo" align="center">
            <td class="titulo" width="7%">ID <br>Opinion</td>
            <td class="titulo" width="10%">COD Producto</td>
            <td class="titulo" width="15%">Imagen Producto</td>
            <td class="titulo" width="10%">Informaciòn Producto</td>
            <td class="titulo" width="20%">Correo/Teléfono Usuario</td>
            <td class="titulo" width="20%">Comentario</td>
            <td class="titulo" width="7%">Fecha Comentario</td>
            <td class="titulo" width="7%">Venta</td>
            <td class="titulo" width="4%">Borrar</td>
        </tr>
    </table>
</div>';




        while($arreglo=pg_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente de los comentarios para despues llamar la informacion que se necesite
            $id_opinion_usuario=$arreglo['id_opinion'];
            $opinion_usuario=$arreglo['opinion_usuario'];
            $id_usuario=$arreglo['id_usuario'];
            $fecha_hora_opinion=$arreglo['fecha_hora_opinion'];
            $id_venta_producto=$arreglo['id_venta_producto'];
            $id_producto_venta=$arreglo['id_producto_venta'];
            
            



            $WW=("SELECT * FROM ventas_productos where id_venta_producto='$id_venta_producto' ORDER by id_venta_producto desc");
            
                //la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
            $assa=pg_query($conexion,$WW);

//con este array cargo los datos personales del usuario para despues mostrar la informacion del mismo 

            while($fff=pg_fetch_array($assa)){
                $id_apartado=$fff['id_apartado'];

}





            $sql2=("SELECT * FROM usuario where id_usuario='$id_usuario'");
            
                //la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
            $query2=pg_query($conexion,$sql2);

//con este array cargo los datos personales del usuario para despues mostrar la informacion del mismo 

            while($arreglo2=pg_fetch_array($query2)){
                $correoUsuario=$arreglo2['correo_usuario'];
                $telefPersonalUsuario=$arreglo2['telef_personal'];
                $telefHogarUsuario=$arreglo2['telef_hog'];
                $cod_telef_hog_usua=$arreglo2['cod_telef_hog'];
                $cod_telef_pers_usua=$arreglo2['cod_telef_pers'];
                $cedula_usuario=$arreglo2['cedula_usuario'];
                $nombre_usuario=$arreglo2['nombre_usuario'];
                $apellido_usuario=$arreglo2['apellido_usuario'];


                $sql3=("SELECT * FROM catalogo_venta where id_producto_venta='$id_producto_venta'");
                //la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
                $query3=pg_query($conexion,$sql3);

//con este array cargo los datos del catalogo de ventas para despues mostrar la informacion del mismo 

                while($arreglo3=pg_fetch_array($query3)){
                    $nombreProductoV=$arreglo3['nombre_producto_v'];
                    $marcaProductoV=$arreglo3['marca'];
                    $imagenProductoV=$arreglo3['imagen'];
                    $pvpProductoV=$arreglo3['pvp'];
                    $codigo_producto_v=$arreglo3['codigo_producto_v'];

//aqui muestro el tr los datos correspondientes del producto y comentario
                    echo'   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
                    <table class="table table-bordered table-hover table-striped" align="center">

                        <tr class="parrafo " align="center">

                            <td class="titulo" width="7%"><br><br>
                                <b>'.$id_opinion_usuario.'</b> 
                            </td>

                            <td class="titulo" width="10%">
                                <br><br><b>
                                <a href="modProdAdmin.php?id='.$id_producto_venta.'#abajo">
                                    '.$codigo_producto_v.'
                                </a>
                            </b><br>
                            
                        </td>

                        <td class="titulo" width="15%">
                            <a href="modProdAdmin.php?id='.$id_producto_venta.'#abajo">
                                <img class="imgApartUsu" 
                                style="min-width:100px; 
                                max-width:150px; 
                                min-height:100px; 
                                max-height:150px; 
                                border-color: black;
                                border-style: solid;
                                border:2px;" 
                                src="imagenesRepuestos/'.$imagenProductoV.'">
                            </a>
                        </td>

                        <td class="titulo" width="10%"><br>
                            <b>'.$nombreProductoV.'</b><br><br>
                            <b>Marca: </b>'.$marcaProductoV.'
                        </td>

                        <td class="titulo" width="20%">
                            <b>CI: </b>';
                                echo $cedula_usuario;
                            echo '<br><b>Nombre: </b>'.$nombre_usuario.' '.$apellido_usuario.'<br><br>
                            <b style="font-size:90%">Correo: </b>'.$correoUsuario.'<br>
                            <b>Telef.Pers: </b>'.$cod_telef_pers_usua.'-'.$telefPersonalUsuario.'<br>
                            <b>Telef.Hog: </b>'.$cod_telef_hog_usua.'-'.$telefHogarUsuario.'<br>
                        </td>

                        <td class="titulo" width="20%" >
                            <i style="font-size:95%">'.$opinion_usuario.'</i>
                        </td>

                        <td class="titulo" width="7%"><br><br>
                            '.$fecha_hora_opinion.'
                        </td>

                        <td class="titulo" width="7%"><br><br>
                            <a href="descripcionVentaConcreta.php?id='.$id_venta_producto.'&apar='.$id_apartado.'#ir">  
                                <b>Nª:</b>'.$id_venta_producto.'<br>
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                        </td>

                        <td class="titulo" width="4%"><br><br>
                            <a onclick="javascript:preguntar(id='.$id_opinion_usuario.')">
                                <i class="glyphicon glyphicon-trash" style="color:red;"></i>
                            </a>
                        </td>
                    </tr> 

                </table>
            </div>';
        }
    }
}
/* numeros de paginacion  */
echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center" style="color:green"><hr width="75%">Pag.';
for($c=1;$c<=$pag;$c++){
    $ini=$c*10-10;
    $fin=$ini+9;
    echo ' <a href="listaComentarios.php?ini='.$ini.'&fin='.$fin.'#ir">'.$c.'</a>&nbsp;&nbsp;';
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
       eliminar=confirm("ADMINISTRADOR  -<?php echo "$nombreAdmin"; ?>- ¿Deseas Eliminar El Comentario Del Usuario  Selecionado? Una Vez Realizado no Hay Vuelta Atras!");
       if (eliminar)
           //Redireccionamos si das a aceptar
             window.location.href = "opinar/eliminarOpinion.php?id="+id; //página web a la que te redirecciona si confirmas la eliminación
             else
          //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
      alert("NO! Borrastes Ningún Comentario...")
  }
</script> 
</body>
</html>
