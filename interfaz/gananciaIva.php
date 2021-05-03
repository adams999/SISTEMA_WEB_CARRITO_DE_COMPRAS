<!DOCTYPE html>

<?php
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
    <title>Ganancia / Iva</title>
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style1.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="img/icono1.ico">
</head>
<body>
    <section class="container-fluid">
        
        <?php include('include/menuAdministrador.php'); ?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
        <h1>
            <font>
                <p class="titulo1"><img style " width:120px; height:100px;" src="img/icono1.ico">
                <a name="ir"></a>
                 Establece El Porcentaje de Ganancia e Iva para Tus Productos</p><br>
            </font>
        </h1>
    </div>

<?php 

// conexion al servidor y seleccion de base de datos
require("conexionBD/conexionBD.php");


$sql="SELECT * FROM ganancia_iva";
$query=pg_query($conexion,$sql);
while($arreglo=pg_fetch_array($query)){

        @$ganancia=$arreglo['ganancia'];
        @$iva=$arreglo['iva'];
      }

 ?>

    <div class="container-fluid" align="center">
      <form class="form form-group" action="Registros_sql/registroGananciaIva.php" method="post">
        <div class="row">



      <div class="col-lg-offset-1 col-lg-4 col-lg-offset-1 col-md-offset-1 col-md-5 col-md-offset-1 col-sm-6 col-xs-12 form-group has-warning">
              <p class="campRegis">
                   <label>
                       Porcentaje (%) de Ganancia &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingresa el Porcentaje de Ganancia "></i></a>
                   </label>
              </p>
              
                   <input class="form-control" type="text" placeholder="Ingrese el Porcentaje de Ganancia" required="required" name="porc_ganan" autofocus minlength="4" maxlength="4" pattern="[0-9.]+" title="Ingresa solo Números y un . para Poder Calcular el Porcentaje de Ganacia de los Productos Correctamente" <?php echo 'value="'.@$ganancia.'"'; ?> >
              
              <div class="alert alert-info">
                <strong>Atenciòn! </strong> Si la Ganancia es de 40% Ingresa El Valor de Esta Manera (0.40). Por Favor.
              </div>
      </div>

      <div class="col-lg-offset-1 col-lg-4 col-lg-offset-1 col-md-offset-1 col-md-5 col-md-offset-1 col-sm-6 col-xs-12 form-group has-warning">
              <p class="campRegis">
                   <label>
                       IVA &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingrese el Iva a Calcular"></i></a>
                   </label>
              </p>
              
                   <input class="form-control" type="text" placeholder="Ingrese Nombre del Proveedor" required="required" name="iva" autofocus minlength="4" maxlength="4" pattern="[0-9.]+" title="Ingresa Solo Números y un . para Poder Calcular el Iva de los Productos Correctamente" <?php echo 'value="'.@$iva.'"'; ?> >
              
              <div class="alert alert-info">
                <strong>Atenciòn! </strong> Si el Iva es 12%. Por Favor Ingresa el Valor del Iva de Esta Manera (0.12).
              </div>
      </div>
            
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group has-success" align="center">
          <a href="#"><br>
            <button class="reg1 btn btn-group" type="submit" value="Registrar" name="Registrar">
              Ok <i class="glyphicon glyphicon-ok"></i>
            </button>
          </a><br><br><br>
        </div>
      </form>




<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <hr>
</div>



<form action="modificar/modificarGanIvaProdu.php" method="post" class="form form-group">
      <div class="col-lg-offset-4 col-lg-4 col-lg-offset-4 form form-group">
        <label>
          Aumento Precios Mercancia <a href="#"> <i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingrese el Valor para Aumentar los Precios de Toda la Mercancia"></i></a>
        </label>
        <input class="form form-control" type="text" name="incremento" required pattern="[0-9.]+" minlength="4" maxlength="4" title="Ingresa solo Nùmeros para Proceder con los Cambios" placeholder="Ejem. 0.12">
        <div class="alert alert-success">
          <strong>Atenciòn! </strong> Para Aumentar Precios. Ingresa Con Este Formato:<br>
                  Aumento: Ejem.(20% Ingresa 0.20)<br>
                  Aumento: Ejem.(99% Ingresa 0.99)<br>
        </div>
      </div>

      <div class="col-lg-offset-2 col-lg-3 col-md-6 col-sm-6 col-xs-6 form-group has-success" align="center">
          <a href=""><br>
            <button class=" btn btn-group btn-success" type="btn" value="Cancelar" name="Cancelar">
              <i class="glyphicon glyphicon-ok"></i> Aplicar
          </button>
      </a><br><br><br>
      </div>




      <input class="form-control" type="hidden" placeholder="Ingrese el Porcentaje de Ganancia" required="required" name="porc_ganan" autofocus minlength="3" maxlength="4" pattern="[0-9.]+" title="Ingresa solo Números y un . para Poder Calcular el Porcentaje de Ganacia de los Productos Correctamente" <?php echo 'value="'.@$ganancia.'"'; ?> >
      
      <input class="form-control" type="hidden" placeholder="Ingrese Nombre del Proveedor" required="required" name="iva" autofocus minlength="3" maxlength="4" pattern="[0-9.]+" title="Ingresa Solo Números y un . para Poder Calcular el Iva de los Productos Correctamente" <?php echo 'value="'.@$iva.'"'; ?> >
</form>







      <div class="col-lg-offset-2 col-lg-3 col-md-6 col-sm-6 col-xs-6 form-group has-success" align="center">
          <a href="indexAdmin.php"><br>
            <button class="reg2 btn btn-group" type="btn" value="Cancelar" name="Cancelar">
              <i class="glyphicon glyphicon-circle-arrow-left"></i> Regresar
          </button>
      </a><br><br><br>
      </div>


      <div class="col-lg-2 col-md-1 "></div>


      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><hr><hr></div>

      <section>
        <?php 
          require("include/piePagina.php");
        ?>
      </section>
      </div>
    </div>


<script src="../lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>    
<script src="js/ScriptImgYural.js"></script>

</body>
</html>