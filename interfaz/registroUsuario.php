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
  <title>Repuestos Yural Registro de Usuario</title>
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
          <p class="titulo1"><img style " width:120px; height:100px;"  src="img/icono1.ico"> Registro de Usuario</p><br>
        </font>
      </h1>
    </div>
    <div class="container-fluid" align="center">
      <form class="form form-group" method="post" action="Registros_sql/registroUsuario.php">
        <div class="row">

          <div class=" col-lg-2 " ></div>

          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 form-group has-success" align="center">
           <p class="campRegis">
             <label>
               Nombre &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right." title="Ingresa ambos Nombres Porfavor" ></i></a>
             </label>
           </p>
           <p>
             <input name="nombre_usuario" class="form-control" type="text" placeholder="Ingresa tu Nombre" required="required" id="alerta" onChange="efectoAlerta()" autofocus minlength="3" maxlength="50" pattern="[A-Za-z ]+" title="Ingresa Solo Letras ya Sean Mayúsculas o Minúsculas"><br>
           </p>

           <p class="campRegis">
              <label>
                Cedula/Rif &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Por Favor Ingresa solo Nùmeros . " ></i></a>
              </label>
            </p>
            <p>
             <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                  <input class="form-control" type="text" placeholder="V-/E-/J-" required="required" 
                  name="prefijoCedula" minlength="2" maxlength="2" pattern="[VEJ-]+" id="ceduRif" onKeyUp="rifCedulaBanco()" onclick="rifCedulaBanco()">
                </div>

                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                  <input class="form-control" type="text" placeholder="(Ejem.24819181)" required="required" name="cedula_usuario" minlength="6" maxlength="10" pattern="[0-9]+" id="numCeduRif" onKeyUp="rifCedulaBanco()" onclick="rifCedulaBanco()"><br>
              </div><br>
           </p>

           <p class="campRegis">
            <label>
              Selecciona tu Estado &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Por favor Selecciona el Estado donde te Ubicas." ></i></a>
            </label>
          </p>

          <p>
            <select name="conti" class="form-control" onChange="ponPaises(this.form)" required="required">

              <option selected>Elige Tu Estado...</option>
              <option>Amazonas</option>
              <option>Anzoátegui</option>
              <option>Apure</option>
              <option>Aragua</option>
              <option>Barinas</option>
              <option>Bolívar</option>
              <option>Carabobo</option>
              <option>Cojedes</option>
              <option>Delta Amacuro</option>
              <option>Falcón</option>
              <option>Distrito Capital</option>
              <option>Guárico</option>
              <option>Lara</option>
              <option>Mérida</option>
              <option>Miranda</option>
              <option>Monagas</option>
              <option>Nueva Esparta</option>
              <option>Portuguesa</option>
              <option>Sucre</option>
              <option>Táchira</option>
              <option>Trujillo</option>
              <option>Vargas</option>
              <option>Yaracuy</option>
              <option>Zulia</option>
            </select>
          </p><br>


          <p class="campRegis">
           <label>
             Direccion de Hogar &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingresa direccion de tu Hogar para poder realizar envios de productos a tu vivienda." ></i></a>
           </label>
         </p>
         <p>
           <input name="direccion" class="form-control" type="text" placeholder="Direccion de Hogar" required="required" minlength="25" maxlength="250" pattern="[0-9- A-Za-z .-]+" title="Ingresa tu Direccion Para Posteriormente Realizar Envios... No se Admiten Signos"><br>
         </p>
         <P class="campRegis">
           <label>
             Telefono Personal &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Especifica tu numero celular ingresando el codigo de Telefono, luego un guion ( - ). Seguidamente tu Telefono." ></i></a>
           </label>
         </P>
         <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
           <select class="form  form-control" name="cod_telef_pers">
             <option></option>
             <option>0416</option>
             <option>0426</option>
             <option>0414</option>
             <option>0424</option>
             <option>0412</option>
           </select>
         </div>
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
         <p>
           <input name="telef_personal" class="form-control" type="charset" placeholder="Telf. Celular" required="required" minlength="7" maxlength="7" pattern="[0-9]+" title="Solo Números Por Favor."><br>
         </p>
        </div>
       </div>

       <div class="col-lg-2 " ></div>
       

       <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 form-group has-success" align="center">
        <p class="campRegis">
          <label>
            Apellido &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingresa ambos Apellidos Porfavor." ></i></a>
          </label>
        </p>
        <p>
         <input name="apellido_usuario" class="form-control" type="charset" placeholder="Ingresa tu Apellido" required="required" minlength="3" maxlength="50" pattern="[A-Za-z ]+" title="Ingresa Solo Letras ya Sean Mayúsculas o Minúsculas">
         <br>
       </p>
       <p class="campRegis">
        <label>
          Contraseña &nbsp; <a href="#"><i class="iconReg glyphicon glyphicon-exclamation-sign pull-right" title="Tu Contraseña debe de tener obligatoriamente numeros, y letras con un Total de 8 Caracteres minimo." ></i></a>
        </label >
      </p>
      <p>
       <input name="contra_usuario" class="form-control" type="password" placeholder="********" required="required" minlength="8" maxlength="35" pattern="[A-Za-z0-9.-_*/,+#$ ]+" title="Solo Números y letras Solo Se Admiten Algunos de Estos Signos (.+-*/,$# )"><br>
     </p>

     <p class="campRegis">
      <label>
        Selecciona tu Ciudad &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Por favor Selecciona la ciudad donde te Ubicas." ></i></a>
      </label>
    </p>
    <p>
      <select name="pais" class="form-control"  onChange="ponCiudad(this.form)" required="required">
        <option>Selecciona Primero Tu Estado...</option>
      </select>
    </p><br>
    
    <p class="campRegis">
      <label>
        Correo Electronico &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingresa tu correo especificando y despues del @ el servicio si es Gmail, Hotmail, Yahoo u otro." ></i></a>
      </label>
    </p>
    <p>
      <input name="correo_usuario" class="form-control" type="email" placeholder="Ejemplo@correo.com" required="required" minlength="15" maxlength="50" pattern="[a-z0-9.@_-]+" title="Por Favor Ingresa Tu Correo Para Proceder Con El Registro"><br>
    </p>

   <p class="campRegis">
    <label>
      Telefono de Hogar &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Especifica tu telefono de Habitacion ingresando el codigo de Telefono, luego un guion ( - ). Seguidamente tu N° Telefono" ></i></a>
    </label>
  </p>
    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
          <select class="form  form-control" name="cod_telef_hog">
              <option></option>
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
          </select>
    </div>

    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
      <p>
       <input name="telef_hog" class="form-control" type="text" placeholder="Telf. Casa" required="required" minlength="7" maxlength="7" pattern="[0-9]+" title="Solo Números Por Favor.">
     </p>
   </div>
</div>

<div class="col-lg-2 col-md-1 "></div>

</div>


<div class=" col-lg-2 " ></div>

<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 form-group has-success" align="center">
 <a href="#">
   <br><button class="reg1 btn btn-group" type="submit" value="Registrar" name="Registrar">
   Registrar
 </button>
</a><br><br><br>
</div>
</form>
<div class="col-lg-2 " ></div>

<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 form-group has-success" align="center">
  <a href="index.php">
    <button class="reg2 btn btn-group" type="btn" value="Cancelar" name="Cancelar">
      Cancelar Registro
    </button>
  </a><br><br><br>
</div>

<section>

<?php 
        require("include/piePagina.php");
         ?>
         
</section>

<script src="../lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>    
<script src="js/estadoRegis.js"></script>
<script src="js/ScriptImgYural.js"></script>
<script type="text/javascript" src="js/rifCedulaBanco.js"></script>
</body>
</html>