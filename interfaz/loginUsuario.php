<!DOCTYPE html>
<?php //esta es la validacion para el Administrador!!!!
session_start();
if (@$_SESSION['id_usuarioA']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
  header("Location:indexAdmin.php");
}else {

}
if (@$_SESSION['id_uuario']) {
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
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row" align="justify"> 
        <a href="index.php">
          <img class="imgPrincipal" id="imagenInicio"> 
        </a>
      </div>

    </header>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
      <h1>
        <font>
          <p class="titulo1"> Ingresa a Yural C.A. &nbsp; <img src="icon/iconYural.jpg" width="100px" height="80px"> </p><br>
        </font>
      </h1>
    </div>


    <div class="container-fluid" align="center">
      <form class="form form-group" action="session/validar.php" method="post">

        <div class=" col-lg-3 " ></div>


        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 form-group has-success bordes" align="center">
          <p class="parrafoLogin">
            <label>
              Correo Electronico
            </label>
          </p>
          <p>
            <input class="form-control" type="email" name="correo" required="required" placeholder="ejemplo@correo.com" title="Correo con el cual te registraste en Yural C.A." minlength="15" maxlength="50" pattern="[A-Za-z0-9.@_-]+" title="Por Favor Ingresa Tu Correo Para Proceder Con El Inicio de Session">
          </p><br>

        </div>


        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 form-group has-success bordes" align="center">
          <p class="parrafoLogin">
            <label>
              Contraseña
            </label>
          </p>
          <p>
            <input class="form-control" type="password" name="contra" placeholder="*********" minlength="8" maxlength="35" pattern="[A-Za-z0-9.-_*/,+#$ ]+" title="Solo Números y letras Solo Se Admiten Algunos de Estos Signos (.+-*/,$# )">
          </p><br>

        </div>


        <div class="col-lg-3 col-md-1 "></div>

      </div>    




      <div class="form-group col-xs-12 col-md-12 col-sm-12 col-lg-12" align="center" >

        <div class=" col-lg-3 " ></div>



        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 form-group has-success" align="center">
          <p>
            <button class="log1 btn btn-group" type="sumbit" value="logSis">
              <i class="glyphicon glyphicon glyphicon-ok"></i> Ingresar
            </button>
          </p><br><br><br><br>
        </div>
      </form>

      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 form-group has-success" align="center">
       <p>
        <a href='recuperaContra.php#ir'>
          <button class="log2 btn btn-group">
           <i class="glyphicon glyphicon glyphicon-sunglasses"></i> Olvide mi Contraseña
         </button>
       </a>
     </p><br><br><br><br><br><br><br><br><br><br><br>
   </div>


   <div class="col-lg-3 col-md-1 "></div>
 </div>


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