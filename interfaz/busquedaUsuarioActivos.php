<!DOCTYPE html>

<?php //esta es la validacion para los Usuarios!!!!
session_start();
if ($_SESSION['id_usuarioA']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
    header("Location:index.php");
}
require("conexionBD/conexionBD.php");

$nombreAdmin=$_SESSION['nombre'];

?>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>-ADMIN- Busqueda Usuarios</title>
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <link rel="stylesheet" type="text/css" href="css/styleCatalogo.css">
    <link rel="icon" href="img/icono1.ico">
</head>
<body>
    <section class="container-fluid">
        
        <?php include('include/menuAdministrador.php'); ?>

    <article class="">





        <?php 
$buscar=$_POST['buscar'];//aqui recibo la palabra clave para hacer el buscador 

//esta es la sentencia para poder ejecutar y mostrar el buscador el operador ~* es para que no sea sensible a mayusculas y a minusculas
$result=("SELECT * FROM usuario WHERE cedula_usuario ~* '$buscar' or nombre_usuario ~* '$buscar' or apellido_usuario ~* '$buscar' and estatus=1"); 

$query=pg_query($conexion,$result);

echo '<div align="center" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<p class="titulo1Catalogo">
    <i class="glyphicon glyphicon-search"></i> Resultados de: &nbsp;&nbsp;'.$buscar.'
</p>
</div>';?>


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

echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><hr class="hr2"></div>';




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
            <td class="titulo" width="5%">Desac- Activar</td>
        </tr>
    </table>
</div>';

$cantidad=pg_num_rows($query);
if ($cantidad==0)
{
    echo "<h1 align='center'> No se Encontro Ningún Resultado! </h1> \n";
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
                        <td class="titulo" width="5%">';

                        if ($estatus==1) {
                            echo '<a onclick="javascript:preguntar(id='.$idUsuario.')">
                                <br><i class="glyphicon glyphicon-share" style="color:red;"></i>
                            </a>';
                        }if ($estatus==0) {
                            echo '<a onclick="javascript:preguntar2(id='.$idUsuario.')">
                                <br><i class="glyphicon glyphicon-ok" style="color:blue;"></i>
                            </a>';
                        }
                            
                        echo'</td>
                    </tr> 
                </table>
            </div>';
            }

    echo '</div>';
    ?>           
    



    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 has-success" align="center">
        <a href="listaUsuSesionEstatus.php#ir"><br>
            <button class="btn btn-info">
                <i class="glyphicon glyphicon-circle-arrow-left"></i> Regresar 
            </button><br><br><br>
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
       eliminar=confirm("¿Realmente Deseas Desactivar El Usuario Seleccionado?");
       if (eliminar)
           //Redireccionamos si das a aceptar
             window.location.href = "modificar/desactivarUsuario.php?id="+id; //página web a la que te redirecciona si confirmas la eliminación
             else
          //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
      alert("NO! Se Desactivo Ningun Usuario...")
  }
</script> 

<script language="Javascript">
    function preguntar2(id){
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
