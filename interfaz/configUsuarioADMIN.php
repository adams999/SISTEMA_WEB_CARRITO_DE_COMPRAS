<!DOCTYPE html>

<?php //esta es la validacion para los Usuarios!!!!
session_start();
if ($_SESSION['id_usuarioA']) {
    //echo "tu nombre es " .$_SESSION['nombre'];
}else {
  header("Location:index.php");
}


require("conexionBD/conexionBD.php");
$acumulador=0;  
$cedula=$_SESSION['id_usuarioA'];
$sql=("SELECT * FROM apartado where cedula_usuario='$cedula' and estatus=1");

//la variable  $mysqli viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
@$query=mysqli_query($conexion,$sql);


while(@$arreglo=mysqli_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
  $cantApartada=$arreglo['cantidad_apartada'];
  $acumulador+=$cantApartada;
}
?>

<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Mi Cuenta</title>
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/style1.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/styleCatalogo.css">
  <link rel="stylesheet" type="text/css" href="css/styleApartado.css">
  <link rel="icon" href="img/icono1.ico">
</head>
<body>
  <section class="container-fluid">
   
   <?php include'include/menuAdministrador.php'; ?>


<?php 
                //aqui cargo la variable con la cedula correspondiente del usuario logeado en el momento, para poder comparar y traer lo que tengo en la base de datos de apartados y mostralos
$id_usuarioA=$_SESSION['id_usuarioA'];

require("conexionBD/conexionBD.php");
$sql=("SELECT * FROM usuario where id_usuario='$id_usuarioA'");

                //la variable  $mysqli viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
$query=pg_query($conexion,$sql);


        while($arreglo=pg_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente a 

          $ceduUsuario=$arreglo['cedula_usuario'];
          $nombreUsuario=$arreglo['nombre_usuario'];
          $apellidoUsuario=$arreglo['apellido_usuario'];
          $correoUsuario=$arreglo['correo_usuario'];
          $estadoUsuario=$arreglo['estado'];
          $ciudadUsuario=$arreglo['ciudad'];
          $direccionUsuario=$arreglo['direccion'];
          $cod_telef_pers=$arreglo['cod_telef_pers'];
          $telefPersonal=$arreglo['telef_personal'];
          $cod_telef_hog=$arreglo['cod_telef_hog'];
          $telefonoHogar=$arreglo['telef_hog'];
          $preguntaSeguridad=$arreglo['pregunta_seguridad'];
          $respuestaSeguridad=$arreglo['respuesta_seguridad'];
        }

        ?>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
          <p class="titulo1">Mi Información Personal</p>
          <br>
        </div>


        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
          <p class="campRegis">
            <label>
             Cédula: &nbsp;
           </label>
           <label style="color: black">
            <?php echo "$ceduUsuario";?>.
          </label>
        </p>
      </div>

      <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="center">
          <p class="campRegis">
            <label>
             Nombre: &nbsp;
           </label>
           <label style="color: black">
            <?php echo $nombreUsuario?>
          </label>

        </p>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="center">
        <p class="campRegis">
          <label>
           Apellido: &nbsp;
         </label>
         <label style="color: black">
          <?php echo $apellidoUsuario?>
        </label>

      </p>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="center">
      <p class="campRegis">
        <label>
         Estado: &nbsp;
       </label>
       <label style="color: black">
        <?php echo $estadoUsuario?>
      </label>

    </p>
  </div>


  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="center">
    <p class="campRegis">
      <label>
       Ciudad: &nbsp;
     </label>
     <label style="color: black">
      <?php echo $ciudadUsuario?>
    </label>

  </p>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="center">
  <p class="campRegis">
    <label>
     Dirección: &nbsp;
   </label>
   <label style="color: black">
    <?php echo $direccionUsuario?>
  </label>

</p>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" align="center">
  <p class="campRegis">
    <label>
     Correo Electronico: &nbsp;
   </label>
   <label style="color: black">
    <?php echo $correoUsuario?>
  </label>

</p>
</div>

</div>



<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center"><hr>
  <h1>
    <font>
      <p class="titulo1"><img style=" width:80px; height:60px;"  src="img/icono1.ico"> 
      <a name="ir"></a>
      Actualizar Mis Datos</p><br>
    </font>
  </h1>
</div>
<div class="container-fluid" align="center">


  <form class="form form-group" method="post" action="modificar/configuracionADMIN.php">
    <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">

      <div class=" col-lg-1 " ></div>

      <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6 form-group has-success" align="center">
       <p class="campRegis">
         <label>
           * Contraseña Actual &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right." title="Contraseña Antigua" ></i></a>
         </label>
       </p>
       <p>
         <input name="contraseña_antigua" class="form-control" type="password" placeholder="Contraseña Antigua" required="required" minlength="8" maxlength="35" pattern="[A-Za-z0-9.-_*/,+#$ ]+" title="Solo Números y letras Solo Se Admiten Algunos de Estos Signos (.+-*/,$# )"><br>
       </p>
       <p class="campRegis">
         <label>
           Telefono Hogar &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingresa tu correo especificando y despues del @ el servicio si es Gmail, Hotmail, Yahoo u otro."></i></a>
         </label>
       </p>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <p>
         <select class="form form-control has-success" name="cod_telef_hog" required>
          <?php if ($cod_telef_hog) {
            echo "<option>$cod_telef_hog</option>";
          } ?>
              <option>0212</option>
              <option>0234</option>
              <option>0235</option>
              <option>0238</option>
              <option>0239</option>
              <option>0240</option>
              <option>0241</option>
              <option>0242</option>
              <option>0243</option>
              <option>0244</option>
              <option>0245</option>
              <option>0246</option>
              <option>0247</option>
              <option>0248</option>
              <option>0249</option>
              <option>0251</option>
              <option>0252</option>
              <option>0253</option>
              <option>0254</option>
              <option>0255</option>
              <option>0256</option>
              <option>0257</option>
              <option>0258</option>
              <option>0259</option>
              <option>0261</option>
              <option>0262</option>
              <option>0263</option>
              <option>0264</option>
              <option>0265</option>
              <option>0266</option>
              <option>0267</option>
              <option>0268</option>
              <option>0269</option>
              <option>0271</option>
              <option>0272</option>
              <option>0273</option>
              <option>0274</option>
              <option>0275</option>
              <option>0276</option>
              <option>0277</option>
              <option>0278</option>
              <option>0279</option>
              <option>0281</option>
              <option>0282</option>
              <option>0283</option>
              <option>0284</option>
              <option>0285</option>
              <option>0286</option>
              <option>0287</option>
              <option>0288</option>
              <option>0289</option>
              <option>0291</option>
              <option>0292</option>
              <option>0293</option>
              <option>0294</option>
              <option>0295</option>
         </select><br>
        </p>
      </div>

      <div class="col-lg-8 col-md-8 col-sm-8 col-sm-8">
       <p>
         <input name="telefono_hogar" class="form-control" type="charset" value="<?php echo $telefonoHogar?>" required minlength="7" maxlength="7" pattern="[0-9]+" title="Solo Números Por Favor."><br>
       </p>
      </div>

       <p class="campRegis">
        <label>
         Selecciona Tu Pregunta De Seguridad &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Elige una de las preguntas de seguridad para que puedas recuperar tu contraseña posteriormente" ></i></a>
       </label>
     </p>

     <p class="campRegis">
      <select class="form-control" name="pregunta_seguridad">
        <?php 
          if ($preguntaSeguridad!=null) {
            echo '<option>'.$preguntaSeguridad.'</option>';
              }
         ?>
        <option>Donde Nacistes?</option>
        <option>Cual fue tu mejor amigo de la infancia?</option>
        <option>Lugar de nacimiento de la Madre?</option>
        <option>Ocupación del Abuelo?</option>
      </select>

    </p>
    <?php 
    if ($preguntaSeguridad!=null) {
     echo '<label style="color: #002771">Pregunta de Seguridad Actual: </label>   '.$preguntaSeguridad.'' ;
   }

   ?>
 </div>



 <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6 form-group has-success" align="center">



  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <p class="campRegis">
      <label>
        Contraseña Nueva &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Contraseña Nueva" ></i></a>
      </label>
    </p>
    <p>
     <input name="contraseña_nueva" class="form-control" type="password" placeholder="Contraseña Nueva"  minlength="8" maxlength="35" pattern="[A-Za-z0-9.-_*/,+#$ ]+" title="Solo Números y letras Solo Se Admiten Algunos de Estos Signos (.+-*/,$# )">
     <br>
   </p>
 </div>

 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
  <p class="campRegis">
    <label>
      Repite Contraseña &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Repite la Contraseña Nueva" minlength="8" maxlength="35" pattern="[A-Za-z0-9.-_*/,+#$ ]+" title="Solo Números y letras Solo Se Admiten Algunos de Estos Signos (.+-*/,$# )"></i></a>
    </label>
  </p>
  <p>
   <input name="repite_contraseña" class="form-control" type="password" placeholder="Repite Tu Contraseña Nueva Aqui">
   <br>
 </p>
</div>

<p class="campRegis">
  <label>
    Telefono Personal &nbsp; <a href="#"><i class="iconReg glyphicon glyphicon-exclamation-sign pull-right" title="Tu Contraseña debe de tener obligatoriamente numeros, y letras con un Total de 8 Caracteres minimo." ></i></a>
  </label >
</p>


  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
    <p>
     <select class="form form-control has-success" name="cod_telef_pers" required name="cod_telef_pers">
       <?php if ($cod_telef_pers) {
            echo "<option>$cod_telef_pers</option>";
          } ?>
       <option>0416</option>
       <option>0426</option>
       <option>0414</option>
       <option>0424</option>
       <option>0412</option>
     </select><br>
    </p>
  </div>
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
    <p>
     <input name="telefono_personal" class="form-control" type="charset" value="<?php echo $telefPersonal?>" required minlength="7" maxlength="7" pattern="[0-9]+" title="Solo Números Por Favor."><br>
    </p>
  </div>

<p class="campRegis">
  <label>
    Respuesta de Seguridad &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Porfavor Responde la Pregunta de Seguridad Aqui!" ></i></a>
  </label>
</p>
<p>
  <input type="text" name="respuesta_seguridad" class="form-control" placeholder="'Responde Aqui la Respuesta'" value="<?php echo "$respuestaSeguridad" ?>" maxlength="50" required>
</p>              
</div>   



<?php 
if ($preguntaSeguridad==null or $respuestaSeguridad==null) {
  echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
  <p style="color: red">* ATENCIÓN!! ES IMPORTANTE QUE CONFIGURES UNA PREGUNTA Y RESPUESTA DE SEGURIDAD, YA QUE EN CASO DE OLVIDAR TU CONTRASEÑA PODRAS RECUPERARLA A TRAVES DE ESTA OPCIÓN *</p><br>
</div>';
}
?>




<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group has-success" align="center">
 <a href="#">
   <br>
   <button class="reg1 btn btn-group" type="submit" value="Registrar" name="Registrar">
     Realizar Cambio
   </button>
 </a><br>
</div>


</form>






<div class="col-lg-12 col-md-12 colsm-12 col-xs-12"> <br><br></div>

<section>                
  <?php 
        require("include/piePagina.php");
         ?>
</section>

<script src="../lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>    
<script src="js/estadoRegis.js"></script>
<script src="js/ScriptImgYural.js"></script>

</body>
</html>