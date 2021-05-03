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
    <title>Registro de Proveedores</title>
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
                 Registro de Proveedor</p><br>
            </font>
        </h1>
    </div>


    <div class="container-fluid" align="center">
      <form class="form form-group" action="Registros_sql/registroProveedor.php" method="post">
        <div class="row">

            <div class=" col-lg-2 " ></div>

            <div class=" col-lg-3 col-md-6 col-sm-6 col-xs-12 form-group has-success" align="center">
               <p class="campRegis">
                   <label>
                       Nombre del Proveedor &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingrese Nombre Personal o comercial del Proveedor"></i></a>
                   </label>
               </p>
               <p>
                   <input class="form-control" type="text" placeholder="Ingrese Nombre del Proveedor" required="required" name="nombre_proveedor" autofocus minlength="3" maxlength="100" pattern="[A-Za-z.0-9 ]+" title="Ingresa Solo Letras ya Sean Mayúsculas o Minúsculas Para Poder Registrar al Proveedor"><br><br>
               </p>

               <p class="campRegis">
                   <label>
                       Dirección del Proveedor &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingresa Direccion del Proveedor" ></i></a>
                   </label>
               </p>
               <p>
                   <textarea class="form-control" type="text" placeholder="Ingresa Dirección del Proveedor"  name="direccion_proveedor" required="required" minlength="15" maxlength="250" pattern="[A-Za-z ]+" title="Ingresa Solo Letras ya Sean Mayúsculas o Minúsculas para Proceder a Registrar la Dirección del Proveedor"></textarea><br><br>
               </p>
           </div>

           <div class="col-lg-2 " ></div>


           <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 form-group has-success" align="center">

            <p class="campRegis">
                <label>
                    Razón Social del Proveedor &nbsp; <a href="#"><i class="iconReg glyphicon glyphicon-exclamation-sign pull-right" title="Ingrese Cedula o Rif del Proveedor especificando si es V- o  J-" ></i></a>
                </label >
            </p>
            <p>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                  <input class="form-control" type="text" placeholder="V-/E-/J-" required="required" 
                  name="prefijoCedula" minlength="2" maxlength="2" pattern="[VEJ-]+" id="ceduRif" onKeyUp="rifCedulaBanco()" onclick="rifCedulaBanco()">
                </div>

                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                  <input class="form-control" type="text" placeholder="(Ejem.24819181)" required="required" name="razon_social_proveedor" minlength="6" maxlength="10" pattern="[0-9]+" id="numCeduRif" onKeyUp="rifCedulaBanco()" onclick="rifCedulaBanco()"><br>
              </div>
               <br><br>
           </p>

           <p class="campRegis">
            <label><br>
                Telefono Proveedor &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingresa telefono del Proveedor especificando su codigo de Area " ></i></a>
            </label>
        </p>
        <p>
           <div class="col-lg-5 col-md-4 col-sm-4 col-xs-4" align="center">
                                <select class="form  form-control" name="pref_telef_prov" required minlength="4" maxlength="4" pattern="[0-9]+" placeholder="Selecciona el Prefijo">
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

                            <div class="col-lg-7 col-md-8 col-sm-8 col-xs-8" align="center">
                                <input class="form-control" type="text" minlength="7" maxlength="8" required="required" name="telef_proveedor" pattern="[0-9]+" title="Ingresa Formato Válido de Telefono Ejemplo(0276-3489493)" placeholder="Ingresa el Nùmero de Telefono del Provedor">
                            </div><br><br>
       </p>
     </div>
     <div class="col-lg-offset-3 col-lg-6 col-lg-ofsset-3 col-md-offset-2 col-md-8 col-md-ofsset-2 col-sm-offset-1 col-sm-10 col-sm-ofsset-1 col-xs-12 form-group has-success">
       <p class="campRegis">
        <label>
            Correo Proveedor &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingresa correo de Proveedor completo porfavor" ></i></a>
        </label>
      </p>
      <p>
       <input class="form-control" type="email" placeholder="Ejem.yuralrepuestos@gmail.com" required="required" name="correo_proveedor" id="correoProv" minlength="10" maxlength="100" pattern="[a-z0-9@._-]+" title="Ingresa el Correo en Minúsculas Ejemplo:yuralrepuestos@gmail.com"><br><br>
      </p>
    </div>


  <div class="col-lg-offset-4 col-lg-4 col-lg-ofsset-4 col-md-offset-4 col-md-4 col-md-ofsset-4 col-sm-offset-3 col-sm-6 col-sm-ofsset-3 col-xs-12 form-group has-success" align="center">
    <P class="campRegis">
       <label>
           Tipo de Producto que Distribuye &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Espicificar la categoria de Productos que Distribuye el Proveedor" ></i></a>
       </label>
    </P>
    <p>
       <select class="form form-control" name="tipo_producto" required="">
            <option></option>
           <option>Accesorios</option>
           <option>Baterias</option>
           <option>Cauchos</option>
           <option>Gomas</option>
           <option>Repuestos Varios</option>
       </select><br><br>
    </p>
  </div>




<div class="col-lg-offset-4 col-lg-4 col-lg-offset-4 col-md-12 col-sm-12 col-xs-12 form form-group has-success" align="center">

</div>

<div class="col-lg-2 col-md-1 "></div>

</div>


<div class=" col-lg-2 " ></div>

<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 form-group has-success" align="center">
   <a href="#">
     <br><button class="reg1 btn btn-group" type="submit" value="Registrar" name="Registrar">
     Registrar <i class="glyphicon glyphicon-ok"></i>
 </button>
</a><br><br><br>
</div>
</form>
<div class="col-lg-2 " ></div>

<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 form-group has-success" align="center">
    <a href="indexAdmin.php">
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

<script src="../lib/jquery/jquery-3.1.1.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>    
<script src="js/ScriptImgYural.js"></script>
<script type="text/javascript" src="js/rifCedulaBanco.js"></script>
</body>
</html>