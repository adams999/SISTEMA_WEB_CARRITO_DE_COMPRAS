	<!DOCTYPE html>
	<?php //esta es la validacion para el Administrador!!!!
	session_start();extract($_GET);
	if ($_SESSION['id_usuario'] and $_GET) {
	    //echo "tu nombre es " .$_SESSION['nombre'];
	}else {
		header("Location:index.php");
	}
	?>

	<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Cancelar Productos</title>
		<link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="css/style1.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="css/styleCatalogo.css">
		<link rel="icon" href="img/icono1.ico">
	</head>
	<body>
		<section class="container-fluid">

			<?php include('include/menuUsuario.php'); ?>
		</section>
			<article class="row">

			</article>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
				<br>
				<p class="titulo1">
					<a name="ir"></a>
					Cancelar mìs Productos Apartados <br>
					ID Apartado Nº - <?php echo $id; ?>
				</p>
				<br><br>
			</div>

			<div class="row">


			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
				<h3 style="font-family: verdana; color: green; font-size: 180%;">Mi Banco</h3>
			</div>


			<?php 
				require("conexionBD/conexionBd.php");

				$qwe="SELECT * FROM apartado WHERE id_apartado_usuario='$id' and estatus='1'";

					$ewq = pg_query($conexion,$qwe);
				    $ttt = pg_num_rows($ewq);

				    if ($ttt!=1) {?>
				    	<script>window.location='misProductosCancelados.php#ir';</script>;
				    	<?php exit();
				    }



				$valida1="SELECT * FROM bancos_usuario WHERE estatus='1'";

					$tot1 = pg_query($conexion,$valida1);
				    $resul1 = pg_num_rows($tot1);
				         
					if($resul1 >=1){

			
		$sql2="SELECT * FROM bancos_usuario where id_usuario='{$_SESSION['id_usuario']}' and estatus='1'";

        $query2=pg_query($conexion,$sql2);

				        	echo '
									
										<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2 col-md-12 colxs-12 form-group has-success" align="center">
										<form class="form form-group" action="pago/pagoUsuario.php" method="post">
											<p>
												<select class="form-control" type="text" placeholder="Selecciona un Banco para Proceder con el pago" required="required" name="nomb_banc_usua" minlength="6" maxlength="100" pattern="[A-Za-z]+">
													<option></option>';

			while($arreglo2=pg_fetch_array($query2)){//este arreglo2 ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
            $id_banco_usuario=$arreglo2['id_banco_usuario'];
            $nombre_banco_usuario=$arreglo2['nomb_banc_usua'];
            $numero_cuenta_usuario=$arreglo2['num_cuen_usua'];
            $titular_cuenta_usuario=$arreglo2['titu_cuen_usua'];


            									if(@$id_banco_usuario){
            										echo '
													<option value="'.$id_banco_usuario.'">'.$nombre_banco_usuario.' - '.$numero_cuenta_usuario.' - '.$titular_cuenta_usuario.'</option>';
            									}
													
			}
											echo '</select><br>
											</p>
										</div>';
						


				        }if(!@$id_banco_usuario){
				        	echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='center'><br><br>
				        		<h4>ATENCIÒN!!!<br>No tenes Ningùn Banco Registrado, <br>  Para poder Realizar el Pago Por Favor Registra Tu Banco Para Que Puedas Cancelar Productos <a href='cuentasBancariasUsuario.php'>'Registra Tu Banco Aqui!'</a> </h4>
				        	<br><br></div><div></div>";
				        }
			 ?>





					
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
					<h3 style="font-family: verdana; color: green; font-size: 180%;">Seleccionar Banco Empresa a Pagar</h3>
				</div>
			<?php 

				$valida1="SELECT * FROM bancos_empresa WHERE estatus=1";

					$tot1 = pg_query($conexion,$valida1);
				    $resul1 = pg_num_rows($tot1);
				         
			if($resul1 >=1){

			
		$sql3="SELECT * FROM bancos_empresa where estatus=1";

        $query3=pg_query($conexion,$sql3);

				        	echo '
										<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2 col-md-12 col-xs-12 form-group has-success" align="center">
											<p>
												<select class="form-control" type="text" placeholder="Selecciona un Banco para Proceder con el pago" required="required" name="nomb_banc_empr" minlength="6" maxlength="100" pattern="[A-Za-z]+">
													<option></option>';

			while($arreglo3=pg_fetch_array($query3)){//este arreglo2 ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
            $id_banco_empresa=$arreglo3['id_banco_empresa'];
            $nombre_banco_empresa=$arreglo3['nomb_banc_empr'];
            $numero_cuenta_empresa=$arreglo3['num_cuen_empr'];
            $titular_cuenta_empresa=$arreglo3['titu_cuen_empr'];

													echo '
													<option value="'.$id_banco_empresa.'">'.$nombre_banco_empresa.' - '.$numero_cuenta_empresa.' - '.$titular_cuenta_empresa.'</option>';
			}
												echo '</select><br><br>
											</p>
										</div>';
						

				        }else{
				        	echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='center'><br><br>
				        		<h4>Actualmente No Hay Ningun Banco Empresa Registrado para poder Realizar el Pago.<br><br>
				        		 Por Favor Comunicate con Nosotros A Traves del 0276-3489493</h4>
				        	<br><br><br><br></div>";
				        }
			 ?>







			 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group has-success" align="center">
			 	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" align="center">
			 		<label style="font-size: 150%">Total de Productos a Cancelar:</label><br> <?php echo '<h3 style="color:green; font-size:180%;">Cantidad: '.$acumCant.'</h3>'; ?><br><br><br>
			 		<input type="hidden" name="monto" value="<?php echo "$monto" ?>">
			 	</div>

			 	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" align="center">
			 		<label style="font-size: 150%;">Monto a Cancelar:</label><br> <?php echo '<h3 style="color:green; font-size:180%;">Bs: '.$monto.'</h3>'; ?><br><br><br>
			 		<input type="hidden" name="monto" value="<?php echo "$monto" ?>">
			 	</div>

			 	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 form-group has-success" align="center">
			 		<label style="color: red; font-size: 110%">Número de Referencia de Transaccion Bancaria:<br><br></label>
						<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2 col-md-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 form-group has-success" align="center">
			 				<input class="form form-control has-success" type="text" name="n-transferencia" required="required" autofcus minlength="6" maxlength="20" pattern="[0-9]+"><br><br><br>
						</div>
			 	</div>
				<input type="hidden" name="id_apartado" value=<?php echo "$id" ?>>

			 </div>












			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group has-success" align="center">
				<a href="#">
					<button class="reg1 btn btn-group" type="submit" value="Registrar" name="Registrar">
						Pagar <i class="glyphicon glyphicon-usd"></i>
					</button>
				</a><br><br><br>
			</div>
		</form>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group has-success" align="center">
			<a href="produApartados.php#ir">
				<button class="btn btn-danger">
					<i class="glyphicon glyphicon-eye-open"></i> Ver Productos a Cancelar
				</button>
			</a><br><br><br>
		</div>


	</article>
	<section>
		<?php 
		require("include/piePagina.php");
		?>
	</section>


	<script src="../lib/jquery/jquery-3.1.1.min.js"></script>
	<script src="../lib/bootstrap/js/bootstrap.min.js"></script>  
	<script src="js/imgPagPrinc.js"></script>  
</body>
</html>
