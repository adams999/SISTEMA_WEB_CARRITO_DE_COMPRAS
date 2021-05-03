<!DOCTYPE html>

<?php //esta es la validacion para el Administrador!!!!
session_start();
if ($_SESSION['correo_usuarioA']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}
?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Bancos Empresa Eliminados</title>
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
            Bancos de Empresa Eliminados <i class="glyphicon glyphicon-trash" style="color:red"></i></p>
        </div>

        


        <?php 
                //aqui cargo la variable con la cedula correspondiente del usuario logeado en el momento, para poder comparar y traer lo que tengo en la base de datos de apartados y mostralos

        require("conexionBD/conexionBD.php");
        $sql="SELECT * FROM bancos_empresa where estatus=0 ORDER BY id_banco_empresa ASC";
        /* codigos de paginacion */
        $registros= pg_query($conexion,$sql);
        $num = pg_num_rows($registros);
        $pag = ceil($num / 10);

        @$prodIni=$_GET['ini'];
        @$prodFin=$_GET['fin'];

        echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='center' style='font-size:80%; color:green;'>
        $num Bancos. En $pag Páginas. ";

        if (isset($prodIni) and isset($prodFin)) {
           echo "&nbsp;&nbsp;&nbsp;Bancos: $prodIni - $prodFin";
       }
       echo "<br></div>";

       if(isset($_GET['ini'])){
        $ini=$_GET['ini'];
        $fin=$_GET['fin'];
        $sql="SELECT * FROM bancos_empresa where estatus=0 ORDER BY id_banco_empresa ASC limit 10 offset $ini";
    }else{
        $sql="SELECT * FROM bancos_empresa where estatus=0 ORDER BY id_banco_empresa ASC limit 10 offset 0";
    }

    $query=pg_query($conexion,$sql);



    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <table class="table table-bordered" align="center">
            <tr class=" btn-primary trTitulo" align="center">
                <td class="titulo" width="5%">ID </td>
                <td class="titulo" width="30%">Banco</td>
                <td class="titulo" width="15%">Tipo C.</td>
                <td class="titulo" width="20%">Num. Cuenta.</td>
                <td class="titulo" width="15%">Titular Cuenta</td>
                <td class="titulo" width="10%">Cedula/Rif</td>
                <td class="titulo" width="5%">Activar</td>
            </tr>
        </table>
</div>';



        while($arreglo2=pg_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
            $id_banco_empresa=$arreglo2['id_banco_empresa'];
            $banco_empresa=$arreglo2['nomb_banc_empr'];
            $tipo_cuenta=$arreglo2['tipo_cuen_empr'];
            $num_cuenta=$arreglo2['num_cuen_empr'];
            $titular_cuenta_banco=$arreglo2['titu_cuen_empr'];
            $cedula_titular_cuenta_empresa=$arreglo2['cedu_cuen_empr'];

//aqui muestro la cabecera de la descripcion de la tabla de los apartados
            
            
//aqui muestro el tr con los apartados correspondientes del usuario logueado
        echo'<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
                <table class="table table-bordered table-hover table-striped" align="center">
                    <tr class="parrafo " align="center">
                        <td class="titulo" width="5%">'.$id_banco_empresa.' </td>
                        <td class="titulo" width="30%">'.$banco_empresa.'</td>
                        <td class="titulo" width="15%">'.$tipo_cuenta.'</td>
                        <td class="titulo" width="20%">'.$num_cuenta.'</td>
                        <td class="titulo" width="15%">'.$titular_cuenta_banco.'</td>
                        <td class="titulo" width="10%">'.$cedula_titular_cuenta_empresa.'</td>
                        <td class="titulo" width="5%">
                            <a onClick="javascript:preguntar(id='.$id_banco_empresa.')">
                                <i class="glyphicon glyphicon-ok" style="color:green"></i>
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
        echo ' <a href="bancoEmpresaEliminados.php?ini='.$ini.'&fin='.$fin.'#ir">'.$c.'</a>&nbsp;&nbsp;';
    }
    echo '</div>';


    ?>           
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" align="center">
        <a href="informacionYural.php#ir">
            <button class="btn btn-primary">
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
       eliminar=confirm("¿Realmente Deseas Activar El Banco con el id: <?php echo "$id_banco_empresa"?> Seleccionado?");
       if (eliminar)
           //Redireccionamos si das a aceptar
             window.location.href = "modificar/restaurarBancoEmpresa.php?id="+id; //página web a la que te redirecciona si confirmas la eliminación
             else
          //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
      alert("NO! Se Activo el Banco con id:<?php echo "$id_banco_empresa"?>...")
  }
</script> 
</body>
</html>
