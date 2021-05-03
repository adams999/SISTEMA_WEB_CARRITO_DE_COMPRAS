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
    <title>Proveedores Eliminados</title>
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
            Proveedores Eliminados <i class="glyphicon glyphicon-trash"></i></p>
        </div>

        


        <?php 
                //aqui cargo la variable con la cedula correspondiente del usuario logeado en el momento, para poder comparar y traer lo que tengo en la base de datos de apartados y mostralos

        require("conexionBD/conexionBD.php");
        $sql="SELECT * FROM proveedores where estatus=0 ORDER BY id_proveedor ASC";
        /* codigos de paginacion */
        $registros= pg_query($conexion,$sql);
        $num = pg_num_rows($registros);
        $pag = ceil($num / 10);

        @$prodIni=$_GET['ini'];
        @$prodFin=$_GET['fin'];

        echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='center' style='font-size:80%; color:green;'>
        $num Proveedores. En $pag Páginas. ";

        if (isset($prodIni) and isset($prodFin)) {
           echo "&nbsp;&nbsp;&nbsp;Proveedores: $prodIni - $prodFin";
       }
       echo "<br></div>";

       if(isset($_GET['ini'])){
        $ini=$_GET['ini'];
        $fin=$_GET['fin'];
        $sql="SELECT * FROM proveedores where estatus=0 ORDER BY id_proveedor ASC limit 10 offset $ini";
    }else{
        $sql="SELECT * FROM proveedores where estatus=0 ORDER BY id_proveedor ASC limit 10 offset 0";
    }


    $query=pg_query($conexion,$sql);

    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <table class="table table-bordered" align="center">
        <tr class=" btn-primary trTitulo" align="center">
            <td class="titulo" width="3%">ID </td>
            <td class="titulo" width="10%">Registró</td>
            <td class="titulo" width="15%">Proveedor</td>
            <td class="titulo" width="10%">Razón Social</td>
            <td class="titulo" width="20%">Dirección</td>
            <td class="titulo" width="10%">Telefono</td>
            <td class="titulo" width="7%">Distribuye</td>
            <td class="titulo" width="20%">Correo</td>
            <td class="titulo" width="5%">Activar</td>
        </tr>
    </table>
</div>';


if ($num==0) {
    echo "<div align='center'>No Hay Registros!!!</div>";
}

        while($arreglo=pg_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
            $IdProveedor=$arreglo['id_proveedor'];
            $quienRegistro=$arreglo['id_usuario_a'];
            $nombreProveedor=$arreglo['nombre_proveedor'];
            $rif=$arreglo['razon_social_proveedor'];
            $direccionProveedor=$arreglo['direccion_proveedor'];
            $telefProveedor=$arreglo['telef_proveedor'];
            $tipoProducto=$arreglo['tipo_producto'];
            $correoProveedor=$arreglo['correo_proveedor'];
            
            

            $sql2="SELECT * FROM usuario where id_usuario=$quienRegistro";

            $query2=pg_query($conexion,$sql2);

            while ($arreglo1=pg_fetch_array($query2)) {
                $quienRegistroNomb=$arreglo1['nombre_usuario'];
                $quienRegistroApell=$arreglo1['apellido_usuario'];


//aqui muestro la cabecera de la descripcion de la tabla de los apartados
            
//aqui muestro el tr con los apartados correspondientes del usuario logueado
            echo'<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
                <table class="table table-bordered table-hover table-striped" align="center">
                    <tr class="parrafo " align="center">
                        <td class="titulo" width="3%">'.$IdProveedor.' </td>
                        <td class="titulo" width="10%">'.$quienRegistroNomb.' '.$quienRegistroApell.'</td>
                        <td class="titulo" width="15%">'.$nombreProveedor.'</td>
                        <td class="titulo" width="10%">'.$rif.'</td>
                        <td class="titulo" width="20%">'.$direccionProveedor.'</td>
                        <td class="titulo" width="10%">'.$telefProveedor.'</td>
                        <td class="titulo" width="7%">'.$tipoProducto.'</td>
                        <td class="titulo" width="20%">'.$correoProveedor.'</td>
                        <td class="titulo" width="5%">
                            <a onclick="javascript:preguntar(id='.$IdProveedor.')">
                                <i class="glyphicon glyphicon-ok"></i>
                            </a>
                        </td>
                    </tr> 
                </table>
            </div>';
            }
        }

    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center" style="color:green"><hr width="75%">Pag.';
    for($c=1;$c<=$pag;$c++){
        $ini=$c*10-10;
        $fin=$ini+9;
        echo ' <a href="provElimAdmin.php?ini='.$ini.'&fin='.$fin.'#ir">'.$c.'</a>&nbsp;&nbsp;';
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
       eliminar=confirm("¿Realmente Deseas Restaurar El Proveedor Seleccionado?");
       if (eliminar)
           //Redireccionamos si das a aceptar
             window.location.href = "modificar/restaurarProvAdmin.php?id="+id; //página web a la que te redirecciona si confirmas la eliminación
             else
          //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
      alert("NO! Se Restauro Ningún Proveedor...")
  }
</script> 
</body>
</html>
