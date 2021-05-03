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
  <title>Recupera Contraseña</title>
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/style1.css" rel="stylesheet" type="text/css">
  <link rel="icon" href="img/icono1.ico">
</head>
<body>
  <section class="container-fluid">
    <header class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row" align="justify"> 
        <a href="index.php">
          <img class="imgPrincipal" id="imagenInicio"> 
        </a>
      </div>

    </header>

    <article class="row-fluid">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
        <h1>
          <font><a name="ir"></a>
          <p class="titulo1"> Recupera tu Contraseña &nbsp; <img src="icon/iconYural.jpg" width="100px" height="80px"> </p><br>
          </font>
        </h1>
      </div>


      <div class=" col-lg-2 " ></div>


      <form class="form-group" action="session/recuperaContra.php" method="post">

        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 form-group has-success alert alert-info bordesRecuperacion" align="center">
         <label class="tituloRecuperacion">
          <img src="icon/IconAlerta.png" class="iconRecuperar"> &nbsp; Ingresa tu Correo Electronico
        </label>
        <p align="justify" class="parrafoRecuperacion">
          <br>&nbsp; Ingresa el Correo electronico que ingresastes al momento de registrarte en nuestra pagina. Para A traves de el Poder Ayudarte a Recuperar tu Contraseña.
        </p><br>
        <p>Mi Correo Electronico:</p>
        <input name="correo_usuario" class="form-control" type="email" placeholder="Ejemplo@correo.com" required="required" minlength="15" maxlength="50" pattern="[A-Za-z0-9.@_-]+" title="Por Favor Ingresa Tu Correo Para Proceder Con La Recuperacion de Contraseña" autofocus><br><br>

        <p>Selecciona Tu Pregunta de Seguridad</p>
        <select class="form-control" name="pregunta_seguridad" required="required">
          <option>Donde Nacistes?</option>
          <option>Cual fue tu mejor amigo de la infancia?</option>
          <option>Lugar de nacimiento de la Madre?</option>
          <option>Ocupación del Abuelo?</option>
        </select><br><br>

        <p>Respuesta de Seguridad</p>
        <input class="form-control" type="text" name="respuesta" required="required" placeholder="Responde la Pregunta Aqui" maxlength="50"><br>

        <button class="btn btn-group recupeContra1">
          Recuperar Contraseña
        </button>
      </div>

    </form>


    <div class="col-lg-2 col-md-1 "></div>



    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 form-group has-success alert alert-success bordesRecuperacion" align="center" >
      <label class="tituloRecuperacion">
       <img src="icon/Registro.png" class="iconRecuperar"> &nbsp; Si no te has Registrado Hazlo!!!
     </label>
     <br>
     <p align="justify" class="parrafoRecuperacion">
       <br>&nbsp; Te puedes registrar a traves del boton inferior recuerda que es obligatorio una contraseña segura, al igual es necesario que especifiques la ubicacion de tu vivienda para poder realizar envios de forma mucho mas rapida y sin contratiempos!!! 
     </p><br>

     <a href="registroUsuario.php">
       <button class="btn btn-group recupeContra2">
        Registrate!!!
      </button>
    </a></div><br><br><br><br><br><br><br>
  </div>



  <div class="col-lg-2 " ></div>


  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <p>
      <br><br>
    </p>
  </div>

</article>            

        <?php 
          require("include/piePagina.php");
        ?>
</section>


<script src="../lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script> 
<script src="js/ScriptImgYural.js"></script>   
</body>
</html>