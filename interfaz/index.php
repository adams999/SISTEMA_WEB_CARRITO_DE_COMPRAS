<!DOCTYPE html>
<?php //esta es la validacion para el Administrador!!!!
session_start();
if (@$_SESSION['correo_usuarioA']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
  header("Location:indexAdmin.php");
}else {
    
}
if (@$_SESSION['correo_usuario']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
  header("Location:index1.php");
}else {
    
}
?>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Repuestos Yural</title>
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style1.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="img/icono1.ico">
</head>
<body>
    <section class="container-fluid">
        <header class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container row" align="justify"> 
                <a href="index.php">
                    <img class="imgPrincipal" src="img/logo3.jpg"> 
                </a>
            </div>

        </header>
        

        <article class="row">
            <div class="col-lg-12">
                <p align="center" class="titulo1"><i class="asterisco glyphicon glyphicon-asterisk"></i> Todo lo que Buscas para tu Moto!!!</p>
            </div>


            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" align="center"><br>
                <br><br>
                <a href="loginUsuario.php">
                    <button class="btn btn-primary ingresa" >
                        INGRESA
                    </button>
                </a>

                <br><br><br><br>
                <a href="registroUsuario.php">
                    <button class="btn btn-warning registrate" >
                        REGISTRATE!
                    </button>
                </a>
            </div>


            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12" align="center">
                
                
                <img id="imagen" class="imgScript" align="center">
                <br><br><br>


            </div>

            

        </article>
        <?php 
            require("include/piePagina.php");
         ?>
</section>


<script src="../lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>  
<script src="js/imgPagPrinc.js"></script>  
</body>
</html>
