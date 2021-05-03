<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
	
</head>
<body>

	<?php
		require("conexionBD/conexionBD.php");
		$sqlApart=("SELECT * FROM detalle_apartado where id_usuario='{$_SESSION['id_usuario']}' and estatus=1");

		//la variable  $pg viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
		@$queryApart=pg_query($conexion,$sqlApart);
		
		$acumulador=0;
		while(@$arregloApart=pg_fetch_array($queryApart)){//este arreglo ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
		    $cantApartada=$arregloApart['cantidad_apartada'];
		    $acumulador+=$cantApartada;
		}
	?>

	<header class="row">
	            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 container" align="justify"> 
                <a href="index1.php">
                    <img class="imgPrincipal" src="img/logo3.jpg"> 
                </a>
            </div>

            <div class=" col-lg-1 col-md-1 col-sm-1 col-xs-1 btn-vertical row" align="justify">
                <a href="session/desconectarUsuario.php" title="Cerrar Seccion">
                    <button type="button" class="b1 btn btn-group" value="Salir">
                        <img src="icon/salida.png" class="botonIcon"><br>Salir
                    </button>
                </a>
            </div>

	         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
	            <ul class="nav nav-tabs" >
	            	<li class=" active menuPrinc">
	                    <a href="index1.php" class="menuPrinc">
	                        <img src="img/logoG.jpg" style="padding: -30px; margin: -10px; width: 50px">&nbsp;&nbsp; Inicio
	                    </a>
	                </li>
	                <li >
	                    <a href="catalogoVentas.php" class="dropdown-toggle menuPrinc" data-toggle="dropdown">
	                     <img src="icon/catalogoDeRepuestos.png" class="menuPrincImg">&nbsp; Catalogo de Repuestos
	                     <i class="caret menuOption"></i>
	                 </a>
	                 <ul class="dropdown-menu">
	                   <li class="menu1">
	                      <a href="catalogoVentasACC.php#ir" class="menu2">
	                        <div class=" col-xs-3 col-sm-3 col-md-3 col-lg-3" >
	                            <img class="menu3" src="icon/accesorios.png">
	                        </div>
	                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 row-fluid">
	                           <p>
	                              <i class="menu4" >
	                                  Accesorios para 
	                                  <br>  Motociclistas
	                              </i>
	                          </p>
	                      </div>
	                  </a>
	              </li>

	              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
	                  <li class="divider"></li>
	              </div>

	              <li class="menu1" >
	                <a href="catalogoVentasCAR.php#ir" class="menu2">
	                    <img class="menu3" src="icon/carenaje.png">
	                    <i class="menu4 " >
	                      &nbsp; Carenaje
	                  </i>
	              </a>
	          </li>

	          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
	             <li class="divider"></li>
	         </div>

	         <li class="menu1">
	            <a href="catalogoVentasCHA.php#ir" class="menu2">
	               <img class="menu3" src="icon/chasis.png">
	               <i class="menu4">
	                &nbsp; Chasis
	            </i>
	        </a>
	    </li>

	    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
	     <li class="divider"></li>
	 </div>

	 <li class="menu1">
	    <a href="catalogoVentasELE.php#ir" class="menu2">
	        <img class="menu3" src="icon/electrico.png">
	        <i class="menu4">
	          &nbsp; Eléctrico
	      </i>
	  </a>
	</li>

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
	 <li class="divider"></li>
	</div>

	<li class="menu1">
	    <a href="catalogoVentasFRE.php#ir" class="menu2">
	        <img class="menu3" src="icon/frenos.png">
	        <i class="menu4">
	         &nbsp; Frenos
	     </i>
	 </a>
	</li>

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
	 <li class="divider"></li>
	</div>

	<li class="menu1">
	    <a href="catalogoVentasMOT.php#ir" class="menu2">
	        <img class="menu3" src="icon/motor.png">
	        <i class="menu4">
	          &nbsp; Motor
	      </i>
	  </a>
	</li>

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
	 <li class="divider"></li>
	</div>

	<li class="menu1">
	    <a href="catalogoVentasSUS.php#ir" class="menu2">
	        <img class="menu3" src="icon/suspension.png" >
	        <i class="menu4">
	          &nbsp; Suspensión
	      </i>
	  </a>
	</li>

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
	 <li class="divider"></li>
	</div>

	<li class="menu1">
	    <a href="catalogoVentasTRA.php#ir" class="menu2">
	        <img class="menu3" src="icon/traccion.png">
	        <i class="menu4">
	          &nbsp; Tracción
	      </i>
	  </a>
	</li>

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
	 <li class="divider"></li>
	</div>

	</ul>
	</li>
	<li>
	    <a href="#" class="drowpdown-toggle menuPrinc" data-toggle="dropdown">
	     <img src="icon/info.png" class="menuPrincImg">&nbsp; Informacion de Yural C.A <i class="caret menuOption"></i>  
	 </a>

	 <ul class="dropdown-menu">
	    <li class="menu1">
	        <a href="nuestraUbicacion.php#ir" class="menu2">
	           <img class="menu3" src="icon/nuestraUbicacion.png">
	           <i class="menu4">
	              &nbsp; Nuestra Ubicación/Contacto
	          </i>
	      </a>
	  </li>

	  <li class="divider"></li>

	  <li class="menu1">
	    <a href="contacto.php#ir" class="menu2">
	       <img class="menu3" src="icon/contacto.png">
	       <i class="menu4">
	         &nbsp; Encuentranos En
	     </i>
	 </a>
	</li>

	<li class="divider"></li>

	<li class="menu1">
	    <a href="mision.php#ir" class="menu2">
	       <img class="menu3" src="icon/mision.png">
	       <i class="menu4">
	         &nbsp; Misión
	     </i>
	 </a>
	</li>

	<li class="divider"></li>

	<li class="menu1">
	   <a href="vision.php#ir" class="menu2">
	      <img class="menu3" src="icon/vision.png">
	      <i class="menu4">
	        &nbsp; Visión
	    </i>
	</a>
	</li>

	<li class="divider"></li>

	</ul>
	</li>
	<li>
	    <a href="#" class="drowpdown-toggle menuPrinc" data-toggle="dropdown">
	     <img src="icon/miCuenta.png" class="menuPrincImg">&nbsp; <?php echo @$_SESSION['nombre_usuario']; ?>
	     <?php
	     if (@$acumulador>0) {
	        echo '&nbsp;<span class="badge" style="color:white; background:orange;">'.@$acumulador.'</span>';
	    } ?>


	    <i class="caret menuOption"></i>
	</a>
	<ul class="dropdown-menu">
	    
	

	<li class="menu1">
	    <a href="cuentasBancariasUsuario.php#ir" class="menu2">
	       <img class="menu3" src="icon/database-1.png">
	       <i class="menu4">
	          &nbsp; Mis Cuentas Bancarias
	      </i>
	  </a>
	</li>

		<li class="divider"></li>

	    <li class="menu1">
	        <a href="produApartados.php#ir" class="menu2">
	           <img class="menu3" src="icon/produApartados.png">
	           <i class="menu4">
	              &nbsp; Productos Apartados 
	              <?php
	              if (@$acumulador>0) {
	                echo '&nbsp;<span class="badge" style="color:white; background:orange;">'.@$acumulador.'</span>';
	            } ?>
		        </i>
		    </a>
		</li>

		<li class="divider"></li>

	    <li class="menu1">
	        <a href="misProductosCancelados.php#ir" class="menu2">
	           <img class="menu3" src="icon/list.png">
	           <i class="menu4">
	              &nbsp; Mis Compras 
		        </i>
		    </a>
		</li>

	<li class="divider"></li>

	<li class="menu1">
	    <a href="configUsuario.php#ir" class="menu2">
	       <img class="menu3" src="icon/configCuenta.png">
	       <i class="menu4">
	          &nbsp; Configuración de Cuenta
	      </i>
	  </a>
	</li>

	<li class="divider"></li>

	<li class="menu1">
	    <a href="session/desconectarUsuario.php#ir" class="menu2">
	       <img class="menu3" src="icon/salida.png">
	       <i class="menu4">
	          &nbsp; Salir
	      </i>
	  </a>
	</li>

	<li class="divider"></li>
	</ul>
	</li>
	<li class="pull-right ">
	    <ul>
	        <form method="POST" action="catalogoVentas.php#ir"> 
	            <p style="margin-top: 2px; position: relative; color: #C50000">
	                <strong style="font-family: verdana">Busca Tu Repuesto!</strong> 

	                <input style="font-family: arial; color: green" type="text" name="buscar" size="20" required="required" placeholder="Busca Tu Repuesto Aqui!!">


	                <button class="btn btn-success" type="submit">
	                    Buscar 
	                </button> 
	            </p>
	        </form> 
	        <ul>

	        </li>
	    </ul>
	</div>
	</header>
	<script src="js/ScriptImgYural.js"></script>
</body>
</html>