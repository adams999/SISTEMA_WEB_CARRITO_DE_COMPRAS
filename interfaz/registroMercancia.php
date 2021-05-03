<!DOCTYPE html>

<?php
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
  <title>Registro de Mercancia</title>
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/style1.css" rel="stylesheet" type="text/css">
  <link rel="icon" href="img/icono1.ico">
</head>
<body>
  <section class="container-fluid">


    <?php include('include/menuAdministrador.php'); 




// conexion al servidor y seleccion de base de datos
require("conexionBD/conexionBD.php");
    $sql="SELECT * FROM ganancia_iva";

      $query=pg_query($conexion,$sql);

      while($arreglo=pg_fetch_array($query)){

        @$ganancia=$arreglo['ganancia'];
        @$iva=$arreglo['iva'];
      }

    ?>



  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
    <h1>
      <font>
        <p class="titulo1"><img style " width:120px; height:100px;"  src="img/icono1.ico"> 
        <a name="ir"></a>
        Registro de Mercancia Yural C.A.</p><br>
      </font>
    </h1>
  </div>
  <div class="container-fluid" align="center">


    <form class="form form-group" method="post" action="Registros_sql/registroMercancia.php" enctype="multipart/form-data">
      <div class="row">
        <div class=" col-lg-2 " ></div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 form-group has-success" align="center">
         <p class="campRegis">
           <label>
             Número de Pedido/Factura &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right." title="Número de Pedido" ></i></a>
           </label>
         </p>
         <p>
           <input class="form-control" type="text" placeholder="Ejemplo.:0005" required="required" name="numero_pedido" autofocus maxlength="20" pattern="[0-9]+" required><br>
         </p>
         <p class="campRegis">
           <label>
             Proveedor &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Seleccione ID del Proveedor"></i></a>
           </label>
         </p>
         <p>
            <select class="form-control" required="required" name="nombre_proveedor">
              <option></option>
              <?php 

              $sql6="SELECT * FROM proveedores where estatus=1 ORDER BY nombre_proveedor asc";

                $query6=pg_query($conexion,$sql6);

                while($arreglo6=pg_fetch_array($query6)){

                  @$idProveedor=$arreglo6['id_proveedor'];
                  @$nombreProveedor=$arreglo6['nombre_proveedor'];

                  echo '<option>'.$nombreProveedor.'</option>';
                }

               ?>
              </select>
           <br>
         </p>

         <p class="campRegis">
           <label>
             Nombre del Producto &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingrese nombre del Producto " ></i></a>
           </label>
         </p>
         <p>
           <input class="form-control" type="text" placeholder="Ingresa Nombre del Producto a Registrar" required="required" name="nombre_producto" minlength="5" maxlength="32" pattern="[a-zA-Z0-9 -]+"><br>
         </p>
         <P class="campRegis">
           <label>
             Precio Costo Producto&nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingrese el Precio costo del Producto sin IVA" ></i></a>
           </label>
         </P>
         <p>
           <input class="form-control PrecioCosto " type="text" placeholder="Ingresa Precio Costo" required="required" id="num1" onKeyUp="calPrecio()" name="precio_costo" minlength="2" maxlength="100" pattern="[0-9]+"><br>
         </p>
         <P class="campRegis">
           <label>
             Codigo Producto Venta &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingrese el Codigo del Producto que se Mostrara al Cliente"></i></a>
           </label>
         </P>
         <p>
           <input class="form-control inputCodVenta" type="text" placeholder="Codigo de Producto Venta" required="required" name="codigo_productoV" onKeyUp="calCodigoVenta()" id="codigo2" readonly="readonly" minlength="3" maxlength="30" pattern="[A-Z0-9]+"><br>
         </p>
         <P class="campRegis">
           <label>
             Descripción del Producto &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingrese la descripcion del producto" ></i></a>
           </label>
         </P>
         <p>
           <textarea class="form-control" rows="3" cols="8" placeholder="Escribe Aqui la Descripcion del Producto" name="descripcion" maxlength="100" pattern="[a-zA-Z0-9.,- ]+"></textarea><br>
         </p>

         <P class="campRegis">
           <label>
             Tipo de Unidad &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Escriba una letra ejemplo KIT (k) PAR (P) UNIDAD (U)" ></i></a>
           </label>
         </P>
         <p>
           <select class="form-control" required="required" name="tipo_unidad">
             <option></option>
             <option>Unidad</option>
             <option>Par</option>
             <option>Kit</option>
           </select>
           <br>
         </p>
         <P class="campRegis">
           <label>
             IVA del Producto &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Iva del Producto"></i></a>
           </label>
         </P>
         

         <div class="form-group has-success col-lg-4 col-md-4 col-sm-6 col-xs-5">
          <input class="form-control" type="text" readonly required id="iva" onKeyUp="calPrecio()" <?php echo 'value="'.@$iva.'"'; ?>>
         </div>
         

          <div class=" form-group has-success col-lg-8 col-md-8 col-sm-6 col-xs-7">
           <p>
             <input class="form-control inputPrecio" type="number" placeholder="Ingresa Precio Costo" required="required" id="num3" onKeyUp="calPrecio()" readonly="readonly" name="iva_producto" minlength="3" maxlength="50" pattern="[0-9.,]+">
           </p>
         </div>
       </div>

       <div class="col-lg-2 " ></div>
       

       <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 form-group has-success" align="center">
        <p class="campRegis">
          <label>
            Categoria del Articulo &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Selecciona la Categoria prteneciente al Articulo" ></i></a>
          </label>
        </p>
        <p>
         <select class="form-control" name="categoria" required="required" onKeyUp="calCodigoVenta()" id="letra">
          <option></option>
          <option id="1">Accesorios para Motociclistas</option>
          <option id="2">Carenaje</option>
          <option id="3">Chasis</option>
          <option id="4">Eléctrico</option>
          <option id="5">Frenos</option>
          <option id="6">Motor</option>
          <option id="7">Suspensión</option>
          <option id="8">Tracción</option>
        </select>
        <br>
      </p>
      <p class="campRegis">
        <label>
          Código del Producto &nbsp; <a href="#"><i class="iconReg glyphicon glyphicon-exclamation-sign pull-right" title="Ingresa el Codigo del Producto 'Este debe Empezar con un Número'" ></i></a>
        </label >
      </p>
      <p>
       <input class="form-control inputCodProd" type="text" placeholder="Ejemplo.:379HS3E" required="required" name=" codigo_producto" onKeyUp="calCodigoVenta()" id="codigo1" minlength="3" maxlength="20" pattern="[a-zA-Z0-9-]+"><br>
     </p>

     <p class="campRegis">
      <label>
        Cantidad del Producto &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingresa la Cantidad del Producto Pedido" ></i></a>
      </label>
    </p>
    <p>
     <input class="form-control" type="text" placeholder="Ejemplo.:  12" required="required" name="cantidad_producto" minlength="1" maxlength="10" pattern="[0-9]+"><br>
   </p>
   <p class="campRegis">
    <label>
      Fecha del Pedido &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Selecciona la Fecha Cuando se Realizo el Pedido" ></i></a>
    </label>
  </p>
  <p>
   <input class="form-control" type="date" placeholder="dd/mm/aaa" required="required" name="fecha_pedido"><br>
 </p>
 <p class="campRegis">
  <label>
    Marca del Producto &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingrese la marca correspondiente del Producto a Registrar" ></i></a>
  </label>
</p>
<p>
 <input class="form-control" type="text" placeholder="Ejem.:keeway" required="required" name="marca" minlength="3" maxlength="20" pattern="[a-zA-Z0-9 ]+"><br>
</p>
<p class="campRegis">
  <label>
    Imagen del Producto &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Selecciona la Imagen Correspondiente del Producto a Registrar" ></i></a>
  </label>
</p>
<p><br>
 <input type="file" placeholder="imagen del producto" required="required" name="imagen" id="imagen"><br><br><br>
</p> 














<div class="form-group has-success col-lg-4 col-md-4 col-sm-6 col-xs-5">
  <p class="campRegis">
  <label>
    +% &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ganancia del Producto" ></i></a>
  </label>
</p>
    <input class="form-control" type="text" readonly required id="ganancia" onKeyUp="calPrecio()"<?php echo 'value="'.@$ganancia.'"'; ?>>
</div>

<div class="form-group has-success col-lg-8 col-md-8 col-sm-6 col-xs-7">
  <p class="campRegis">
  <label>
    Precio Base &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Precio Base del Producto" ></i></a>
  </label>
</p>

  <p>
   <input class="form-control inputPrecio" type="number" placeholder="Ingresa Precio Costo" required="required" id="num2" onKeyUp="calPrecio()" readonly="readonly" name="precio_base" align="center" minlength="3" maxlength="25" pattern="[0-9.,]+" ><br>
  </p>
</div>
























  <p class="campRegis">
    <label>
      PVP (Precio Venta Público) &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Precio Venta al Público" ></i></a>
    </label>
  </p>
 
  <p>
   <input class="form-control inputPrecio" type="number" placeholder="Ingresa Precio Costo" required="required" id="num4" onKeyUp="calPrecio()" readonly="readonly" name="pvp" align="center" minlength="3" maxlength="25" pattern="[0-9,.]+">
  </p> 


</div>
</div>

<div class="col-lg-offset-2 col-lg-3 col-md-6 col-sm-6 col-xs-6 form-group has-success" align="center">
 <a href="#">
   <br><button class="reg1 btn btn-group" type="submit" value="Registrar" name="Registrar" onClick="calCodigoVenta()">
   Registrar Repuesto
 </button>
</a><br><br><br>
</div>
</form>


<div class="col-lg-offset-2 col-lg-3 col-md-6 col-sm-6 col-xs-6 form-group has-success" align="center">
  <a href="indexAdmin.php">
    <br><button class="reg2 btn btn-group" type="btn" value="Cancelar" name="Cancelar">
    Regresar
  </button>
</a><br><br><br>
</div>
<div class="col-lg-2 col-md-1 "></div>


<section>
<?php 
        require("include/piePagina.php");
         ?>
</section>

<script src="../lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>    
<script src="js/calculoPrecio.js"></script>
<script src="js/calculoCodigoVenta.js"></script>

</body>
</html>