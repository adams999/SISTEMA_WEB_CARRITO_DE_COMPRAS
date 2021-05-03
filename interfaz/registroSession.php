<!DOCTYPE html>

<?php //esta es la validacion para el Administrador!!!!
extract($_GET);
session_start();
if ($_SESSION['id_usuarioA'] and $id) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}
?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Registro Session Usuario</title>
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
            <b style="color: #1F618D" >Registro Session Usuario </b>

            <?php echo "ID:$id $nombre ";echo $cedula;?></p>
        </div>

        </div>


        <?php 
                //aqui cargo la variable con la cedula correspondiente del usuario logeado en el momento, para poder comparar y traer lo que tengo en la base de datos de apartados y mostralos

        require("conexionBD/conexionBD.php");
        $sql="SELECT * FROM session where id_usuario='$id' ORDER BY id_session desc ";
        /* codigos de paginacion */
        $registros= pg_query($conexion,$sql);
        $num = pg_num_rows($registros);
        $pag = ceil($num / 10);

        @$prodIni=$_GET['ini'];
        @$prodFin=$_GET['fin'];

        echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='center' style='font-size:80%; color:green;'>
        $num    Registros. En $pag Páginas. ";

        if (isset($prodIni) and isset($prodFin)) {
           echo "&nbsp;&nbsp;&nbsp;Registros: $prodIni - $prodFin";
       }
       echo "<br></div>";

       if(isset($_GET['ini'])){
        $ini=$_GET['ini'];
        $fin=$_GET['fin'];
        $sql="SELECT * FROM session where id_usuario='$id' ORDER BY id_session desc limit 10 offset $ini";
    }else{
        $sql="SELECT * FROM session where id_usuario='$id' ORDER BY id_session desc limit 10 offset 0";
    }


    $query=pg_query($conexion,$sql);

    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <table class="table table-bordered" align="center">
        <tr class=" btn-primary trTitulo" align="center">
            <td class="titulo" width="10%">ID </td>
            <td class="titulo" width="30%">Fecha Hora Session</td>
            <td class="titulo" width="30%">IP Session</td>
            <td class="titulo" width="30%">Logueo / Deslogueo</td>
        </tr>
    </table>
</div>';


if ($num==0) {
    echo "<div align='center'>No Hay Registros!!!</div>";
}
            
            while($arreglo=pg_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
            $idSession=$arreglo['id_session'];
            $fechaHora=$arreglo['fecha_hora_session'];
            $ipSession=$arreglo['ip_session'];
            $permiso_session=$arreglo['permiso_session'];

//aqui muestro el tr con los apartados correspondientes del usuario logueado
            echo'<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
                <table class="table table-bordered table-hover table-striped" align="center">
                    <tr class="parrafo " align="center">
                        <td class="titulo" width="10%">'.$idSession.'</td>
                        <td class="titulo" width="30%">'.$fechaHora.'</td>
                        <td class="titulo" width="30%">'.$ipSession.'</td>
                        <td class="titulo" width="30%">';if ($permiso_session==1) {
                                                           echo'<i class="glyphicon glyphicon-log-in" style="color:blue;"></i> Accede ';
                                                          }
                                                          else{
                                                            echo' Desconecta <i class="glyphicon glyphicon-log-out" style="color:red;"> </i>';
                                                          }echo'</td>
                    </tr> 
                </table>
            </div>';
            }
        

    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center" style="color:green"><hr width="75%">Pag.';
    for($c=1;$c<=$pag;$c++){
        $ini=$c*10-10;
        $fin=$ini+9;
        echo ' <a href="registroSession.php?ini='.$ini.'&fin='.$fin.'&id='.$id.'&nombre='.$nombre.'&cedula='.$cedula.'#ir">'.$c.'</a>&nbsp;&nbsp;';
    }
    echo '</div>';
    ?>           
    



    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 has-success" align="center">
        <a href="listaUsuSesionEstatus.php#ir"><br>
            <button class="btn btn-info">
                <i class="glyphicon glyphicon-circle-arrow-left"></i> Regresar 
            </button>
        </a>
    </div>
    

</article>
<section>
<?php 
        require("include/piePagina.php");
         ?>
</section>


<script src="../lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>  
<script src="js/ScriptImgYural.js"></script>  
</body>
</html>
