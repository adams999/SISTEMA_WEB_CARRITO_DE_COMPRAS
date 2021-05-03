<!DOCTYPE html>

<?php //esta es la validacion para el Administrador!!!!
session_start();
if ($_SESSION['id_usuarioA']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}
?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Administrar Usuarios</title>
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
            Usuarios Eliminados <i class="glyphicon glyphicon-remove"></i></p>
        </div>



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
            <form method="POST" action="busquedaUsuarioActivos.php#ir"> 
                <p style="margin-top: 2px; position: relative; color: #C50000">
                    <strong style="font-family: verdana">Ingresa Cedula o Nombre de Usuario</strong> 

                    <input style="font-family: arial; color: green" type="text" name="buscar" size="20" required="required" placeholder="Busca el Usuario Aqui!">

                    <button class="btn btn-success" type="submit">
                        Buscar 
                    </button> 
                </p>
            </form>
        </div>


        <?php 
                //aqui cargo la variable con la cedula correspondiente del usuario logeado en el momento, para poder comparar y traer lo que tengo en la base de datos de apartados y mostralos

        require("conexionBD/conexionBD.php");
        $sql="SELECT * FROM usuario where estatus=0 ORDER BY cedula_usuario desc";
        /* codigos de paginacion */
        $registros= pg_query($conexion,$sql);
        $num = pg_num_rows($registros);
        $pag = ceil($num / 10);

        @$prodIni=$_GET['ini'];
        @$prodFin=$_GET['fin'];

        echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='center' style='font-size:80%; color:green;'>
        $num    Usuarios Activos. En $pag Páginas. ";

        if (isset($prodIni) and isset($prodFin)) {
           echo "&nbsp;&nbsp;&nbsp;Registros: $prodIni - $prodFin";
       }
       echo "<br></div>";

       if(isset($_GET['ini'])){
        $ini=$_GET['ini'];
        $fin=$_GET['fin'];
        $sql="SELECT * FROM usuario where estatus=0 ORDER BY cedula_usuario desc limit 10 offset $ini";
    }else{
        $sql="SELECT * FROM usuario where estatus=0 ORDER BY cedula_usuario desc limit 10 offset 0";
    }


    $query=pg_query($conexion,$sql);

    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <table class="table table-bordered" align="center">
        <tr class=" btn-primary trTitulo" align="center">
            <td class="titulo" width="3%">ID </td>
            <td class="titulo" width="10%">CI</td>
            <td class="titulo" width="15%">Nombre Apellido</td>
            <td class="titulo" width="15%">Correo</td>
            <td class="titulo" width="15%">Dirección</td>
            <td class="titulo" width="10%">Telefono</td>
            <td class="titulo" width="10%">Registro de Session</td>
            <td class="titulo" width="5%">Activar</td>
        </tr>
    </table>
</div>';


if ($num==0) {
    echo "<div align='center'>No Hay Registros!!!</div>";
}

       while($arreglo=pg_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
            $idUsuario=$arreglo['id_usuario'];
            $ciUsuario=$arreglo['cedula_usuario'];
            $nombreUsuario=$arreglo['nombre_usuario'];
            $apellidoUsuario=$arreglo['apellido_usuario'];
            $correoUsuario=$arreglo['correo_usuario'];
            $estado=$arreglo['estado'];
            $ciudad=$arreglo['ciudad'];
            $direccion=$arreglo['direccion'];
            $codTelefPers=$arreglo['cod_telef_pers'];
            $telefPersonal=$arreglo['telef_personal'];
            $codTelefHog=$arreglo['cod_telef_hog'];
            $telefHogar=$arreglo['telef_hog'];
            $bandera=$arreglo['bandera'];
            $estatus=$arreglo['estatus'];

//aqui muestro el tr con los apartados correspondientes del usuario logueado
            echo'<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
                <table class="table table-bordered table-hover table-striped" align="center">
                    <tr class="parrafo " align="center">
                        <td class="titulo" width="3%"><br>'.$idUsuario.'</td>
                        <td class="titulo" width="10%">';

                                                        if ($ciUsuario>=70000000) {
                                                           echo'<br><b>E-</b> '.$ciUsuario.'';
                                                          }
                                                          else{
                                                            echo'<br><b>V-</b> '.$ciUsuario.'';
                                                          }

                                                        echo'</td>
                        <td class="titulo" width="15%">'.$nombreUsuario.' <br>'.$apellidoUsuario.'';

                                                        if ($bandera==10) {
                                                            echo "<br><b>(Administrador)</b>";
                                                        }
                                                    echo '</td>
    
                        <td class="titulo" width="15%"><br>'.$correoUsuario.'</td>
                        <td class="titulo" width="15%">'.$estado.' <br>'.$ciudad.' <br>'.$direccion.'</td>
                        <td class="titulo" width="10%"><b>'.$codTelefHog.'</b>-'.$telefHogar.' <br><br> <b>'.$codTelefPers.'</b>-'.$telefPersonal.'</td>
                        <td class="titulo" width="10%">
                            <a href="registroSession.php?id='.$idUsuario.'&nombre='.$nombreUsuario.'&cedula='.$ciUsuario.'#ir">
                                <br><i class="glyphicon glyphicon-list" style="color:green;"></i>
                            </a>
                        </td>
                        <td class="titulo" width="5%">
                            <a onclick="javascript:preguntar(id='.$idUsuario.')">
                                <br><i class="glyphicon glyphicon-ok" style="color:blue;"></i>
                            </a>
                        </td>
                    </tr> 
                </table>
            </div>';
            }
        

    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center" style="color:green"><hr width="75%">Pag.';
    for($c=1;$c<=$pag;$c++){
        $ini=$c*10-10;
        $fin=$ini+9;
        echo ' <a href="listaUsuDesac.php?ini='.$ini.'&fin='.$fin.'#ir">'.$c.'</a>&nbsp;&nbsp;';
    }
    echo '</div>';
    ?>           
    



    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 has-success" align="center">
        <a href="indexAdmin.php#ir"><br>
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

<script language="Javascript">
    function preguntar(id){
       eliminar=confirm("¿Realmente Deseas Activar El Usuario Seleccionado?");
       if (eliminar)
           //Redireccionamos si das a aceptar
             window.location.href = "modificar/activarUsuario.php?id="+id; //página web a la que te redirecciona si confirmas la eliminación
             else
          //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
      alert("NO! Se Activo Ningun Usuario...")
  }
</script> 
</body>
</html>
