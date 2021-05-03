
    <!DOCTYPE html>

    <?php //esta es la validacion para el Administrador!!!!
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
        <title>Información de Yural</title>
        <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/style1.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/styleCatalogo.css">
        <link rel="icon" href="img/icono1.ico">
    </head>
    <body>
        <section class="container-fluid">
            
            <?php include('include/menuAdministrador.php'); ?>
        
        <?php

        require("conexionBD/conexionBD.php");


        $sql=("SELECT * FROM empresa");
        
                    //la variable  $mysqli viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
        $query=pg_query($conexion,$sql);


            while($arreglo=pg_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente a los datos de la empresa para despues llamar la informacion que se necesite
                $rifEmpresa=$arreglo['rif_empresa'];
                $nombreEmpresa=$arreglo['nombre_empresa'];
                $direccionEmpresa=$arreglo['direccion_empresa'];
                $telefEmpresa=$arreglo['telefono_empresa'];
                $correoEmpresa=$arreglo['correo_empresa'];
            }

            ?>        


    <article class="row">


                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p align="center" class="titulo1">Informacion De Yural C.A.</p><br><br>
                        <div class="col-lg-2"></div>

                        <form class="form form-group" action="modificar/modificarEmpresa.php" method="post">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 form-group has-success" align="center">
                             <p class="campRegis">
                                 <label>
                                     RIF EMPRESA
                                 </label>
                             </p>
                             <p>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                        <input class="form-control" type="text" placeholder="Ejem:J-" required="required" name="prefRif" minlength="2" maxlength="2" pattern="[VEJ-]+" id="riff" value="<?php echo substr($rifEmpresa,0,2); ?>" onKeyUp="rif()">
                    </div>

                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                        <input class="form-control" type="text" placeholder="(Ejem.24819181)" required="required" name="rifEmpresa" minlength="8" maxlength="10" pattern="[0-9]+" id="numRif" onKeyUp="rif()" value="<?php echo substr($rifEmpresa, 2); ?>"><br>
                    </div>
                             </p>



                             <p class="campRegis">
                                 <label>
                                     DIRECCIÓN 
                                 </label>
                             </p>
                             <p>
                                 <textarea class="form-control" required="required" type="text" name="direccionEmpresa" rows="5" minlength="10" maxlength="250" pattern="[A-Za-z0-9-. ]+" title="Ingresa Una Dirección Con Formato Común no se Admiten Caracteres Especiales"><?php if(@$direccionEmpresa==true) {echo $direccionEmpresa;}?></textarea>
                                 <br>
                             </p>

                         </div>

                         <div class="col-lg-2"></div>             


                         <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 form-group has-success" align="center">

                            <p class="campRegis">
                                <label>
                                    NOMBRE EMPRESA 
                                </label >
                            </p>
                            <p>
                             <input class="form-control" type="text" required="required" minlength="10" maxlength="100" name="nombreEmpresa" pattern="[A-Za-z. ]+" title="Ingresa El Nombre de la Empresa"
                                
                                <?php echo 'value="'.@$nombreEmpresa.'"'?>

                             maxlength="50"><br><br><br>
                         </p>

                         <p class="campRegis">
                            <label>
                                TELEFONO EMPRESA 
                            </label>
                        </p>
                        <p>
                            <div class="col-lg-5 col-md-4 col-sm-4 col-xs-4" align="center">
                                <select class="form  form-control" name="cod_telef_empr" required minlength="4" maxlength="4" pattern="[0-9]+">
                                      <option><?php echo $telefEmpresa1=substr($telefEmpresa,0,4) ?></option>
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
                                <input class="form-control" type="text" minlength="7" maxlength="12" required="required" name="telefonoEmpresa" pattern="[0-9]+" title="Ingresa Formato Válido de Telefono Ejemplo(0276-3489493)" value="<?php echo substr($telefEmpresa, 5); ?>">
                            </div>


                         <br><br><br>
                     </p>

             </div>

             <div class="col-lg-2"></div>



             

             <div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-md-offset-2 col-md-8 col-md-offset-2 col-sm-offset-1 col-sm-10 col-md-offset-1 col-xs-12 form-group has-success" align="center">
                 <p class="campRegis">
                    <label>
                        CORREO EMPRESA 
                    </label>
                </p>
                <p>
                 <input class="form-control" type="email" name="correoEmpresa" required="required" minlength="15" maxlength="50" pattern="[a-z0-9.@_-]+" title="Por Favor Ingresa Tu Correo Para Proceder Con El Registro"

                    <?php echo 'value="'.@$correoEmpresa.'"'?>

                 >
                 <br>
             </p>
             <br>
         </div>

         


        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group has-success" align="center">
             <a href="#">
                <button class="reg1 btn btn-group" type="submit" value="Registrar" name="Registrar" onclick="rif()" onkeyup="rif()">
                 Modificar <i class="glyphicon glyphicon-ok"></i>
                </button>
            </a><br><br><br>
        </div>
    </form>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p align="center" class="titulo1">Bancos De Empresa</p> <a name="ir"></a>
    </div>



    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center"> 
        <?php 

                $sql2="SELECT * FROM bancos_empresa where estatus=1 ORDER BY id_banco_empresa ASC";
                /* codigos de paginacion */
                $registros= pg_query($conexion,$sql2);
                $num = pg_num_rows($registros);
                $pag = ceil($num / 10);

                @$bancoIni=$_GET['ini'];
                @$bancoFin=$_GET['fin'];

                echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='center' style='font-size:80%; color:green;'>
                $num Bancos. En $pag Páginas. ";

                if (isset($bancoIni) and isset($bancoFin)) {
                 echo "&nbsp;&nbsp;&nbsp;Bancos: $bancoIni - $bancoFin";
             }
             echo "<br></div>";

            if(isset($_GET['ini'])){
                $ini=$_GET['ini'];
                $fin=$_GET['fin'];
                $sql2="SELECT * FROM bancos_empresa where estatus=1 ORDER BY id_banco_empresa ASC limit 10 offset $ini";
            }else{
                $sql2="SELECT * FROM bancos_empresa where estatus=1 ORDER BY id_banco_empresa ASC limit 10 offset 0";
            }

            $query2=pg_query($conexion,$sql2);

        //aqui muestro la cabecera de la descripcion de la tabla de los bancos de empresa
            echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table class="table table-bordered" align="center">
                <tr class=" btn-primary trTitulo" align="center">
                    <td class="titulo" width="5%">ID </td>
                    <td class="titulo" width="30%">Banco</td>
                    <td class="titulo" width="15%">Tipo C.</td>
                    <td class="titulo" width="20%">Num. Cuenta.</td>
                    <td class="titulo" width="15%">Titular Cuenta</td>
                    <td class="titulo" width="10%">Cedula/Rif</td>
                    <td class="titulo" width="5%">Editar</td>
                </tr>
            </table>
        </div>';


            while($arreglo2=pg_fetch_assoc($query2)){//este arreglo ordena la informacion del array correspondiente a los bancos de empresa para despues llamar la informacion que se necesite
                $id_banco_empresa=$arreglo2['id_banco_empresa'];
                $banco_empresa=$arreglo2['nomb_banc_empr'];
                $tipo_cuenta=$arreglo2['tipo_cuen_empr'];
                $num_cuenta=$arreglo2['num_cuen_empr'];
                $titular_cuenta_banco=$arreglo2['titu_cuen_empr'];
                $cedula_titular_cuenta_empresa=$arreglo2['cedu_cuen_empr'];


        //aqui muestro el tr con los datos de las cuentas del banco
                echo'<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
                <table class="table table-bordered table-hover table-striped" align="center">

                    <tr class="parrafo " align="center">
                        <td class="titulo" width="5%">'.$id_banco_empresa.' </td>
                        <td class="titulo" width="30%">'.$banco_empresa.'</td>
                        <td class="titulo" width="15%">'.$tipo_cuenta.'</td>
                        <td class="titulo" width="20%">'.$num_cuenta.'</td>
                        <td class="titulo" width="15%">'.$titular_cuenta_banco.'</td>
                        <td class="titulo" width="10%">'.$cedula_titular_cuenta_empresa.'</td>
                        <td class="titulo" width="5%"> <a href="ModificarBancoEmpresa.php?id='.$id_banco_empresa.'#ir">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                        </td>
                    </tr> 

                </table>
            </div>';
        }

        if ($num<=0) {
            echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='center'>
            No se Encontraron Registros en Bancos de Empresa
        </div>";
        }
        
        echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
                <a href="registroBancoEmpresa.php#ir"><br>
                    <button class="btn btn-success">
                        Agregar Banco Empresa <i class="glyphicon glyphicon-folder-open"></i>
                    </button>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
                <a href="bancoEmpresaEliminados.php#ir"><br>
                    <button class="btn btn-danger">
                        Bancos Eliminados <i class="glyphicon glyphicon-trash"></i>
                    </button>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group has-success" align="center">
            <a href="indexAdmin.php"><br>
                <button class="reg2 btn btn-group" type="submit" value="Registrar" name="Registrar">
                 <i class="glyphicon glyphicon-circle-arrow-left"></i> Regresar
                </button>
            </a>
            <br><br><br>
            </div>
        </div>';


        echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center" style="color:green"><hr width="75%">Pag.';

        for($c=1;$c<=$pag;$c++){
            $ini=$c*10-10;
            $fin=$ini+9;
            echo ' <a href="informacionYural.php?ini='.$ini.'&fin='.$fin.'#ir">'.$c.'</a>&nbsp;&nbsp;';
        }
        echo '</div>';
        ?>          
    </div>
    
        
    


    </article>

            <?php 
                require("include/piePagina.php");
            ?>
    </section>


    <script src="../lib/jquery/jquery-3.1.1.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>    
    <script type="text/javascript" src="js/rif.js"></script>
    </body>
    </html>
