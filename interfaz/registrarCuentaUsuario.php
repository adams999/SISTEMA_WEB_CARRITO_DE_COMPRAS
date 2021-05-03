	<!DOCTYPE html>
	<?php //esta es la validacion para el usuario!!!!
	session_start();
	if ($_SESSION['id_usuario']) {
	    //echo "tu nombre es " .$_SESSION['nombre'];
	}else {
	    header("Location:index.php");
	}
	?>

	<html lang="es">
	<head>
	    <meta charset="utf-8">
	    <title>Registrar Banco Usuario</title>
	    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	    <link href="css/style1.css" rel="stylesheet" type="text/css">
	    <link rel="stylesheet" type="text/css" href="css/styleCatalogo.css">
	    <link rel="icon" href="img/icono1.ico">
	</head>
	<body>
	    <section class="container-fluid">

	        <?php include('include/menuUsuario.php'); ?>

	<article class="row">

	</article>
        
	        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
	            <br>
	            <p class="titulo1">
	            	<a name="ir"></a>
	            	Registrar Nuevo Banco Personal
	        	</p>
	            <br><br>
	        </div>

	        <div class="row">

	            <div class="col-lg-2"></div>
	            <form class="form form-group" action="Registros_sql/registroBancoUsuario.php" method="post">
	                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 form-group has-success" align="center">
	                 <p class="campRegis">
	                     <label>
	                         Nombre Banco &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Nombre del Banco" ></i></a>
	                     </label>
	                 </p>
	                 <p>
						<select class="form-control" type="text" placeholder="Selecciona un Banco para Proceder con el Registro" required="required" name="nomb_banc_usua" minlength="6" maxlength="100" pattern="[A-Za-z]+" autofocus onKeyUp="validaBanco()" id="banco" onclick="validaBanco()">
							<option></option>
	                     	<option>100% BANCO</option>
	                     	<option>BANCO ACTIVO BANCO COMERCIAL, C.A.</option>
	                     	<option>BANCO AGRICOLA</option>
	                     	<option>BANCO BANESCO</option>
	                     	<option>BANCO BICENTENARIO</option>
	                     	<option>BANCO CARONI, C.A. BANCO UNIVERSAL</option>
	                     	<option>BANCO CENTRAL DE VENEZUELA</option>
	                     	<option>BANCO DE VENEZUELA, S.A.I.C.A.</option>
	                     	<option>BANCO DEL CARIBE, C.A.</option>
	                     	<option>BANCO DEL TESORO</option>
	                     	<option>BANCO EXTERIOR</option>
	                     	<option>BANCO MERCANTIL, C.A.</option>
	                     	<option>BANCO NACIONAL DE CREDITO</option>
	                     	<option>BANCO OCCIDENTAL DE DESCUENTO (BOD)</option>
	                     	<option>BANCO PROVINCIAL BBVA</option>
	                     	<option>BANCRECER, S.A. BANCO DE DESARROLLO</option>
	                     	<option>BANFANB</option>
	                     	<option>BANPLUS BANCO COMERCIAL, C.A.</option>
	                     	<option>CITIBANK</option>
	                     	<option>DELSUR BANCO UNIVERSAL</option>
	                     	<option>FONDO COMUN</option>
	                     	<option>SOFITASA</option>
	                     </select><br><br>
	                 </p>



	                 <p class="campRegis">
	                     <label>
	                         Tipo de Cuenta &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Selecciona el Tipo de Cuenta"></i></a>
	                     </label>
	                 </p>
	                 <p>
	                     <select class="form-control" type="text" placeholder="Selecciona el Tipo de Cuenta" required="required" name="tipo_cuen_usua" minlength="6" maxlength="9" pattern="[A-Za-z]+">
	                     	<option></option>
	                     	<option>Ahorro</option>
	                     	<option>Corriente</option>
	                     </select>
	                     <br>
	                 </p>
	             </div>


	             <div class="col-lg-2 " ></div>


	             <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 form-group has-success" align="center">
	                <p class="campRegis">
	                    <label>
	                        Titular de Cuenta &nbsp; <a href="#"><i class="iconReg glyphicon glyphicon-exclamation-sign pull-right" title="Registra El Titular de la Cuenta" ></i></a>
	                    </label >
	                </p>
	                <p>
	                 <input class="form-control" type="text" placeholder="Ingresa el Nombre del Titular" required="required" name="titu_cuen_usua" minlength="10" maxlength="100" pattern="[a-zA-Z ]+"><br><br>
	             </p>

	             <p class="campRegis">
	                <label>
	                    Cedula/Rif Titular &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingresa el Rif o Cedula del Titular " la Cedula Del Titular Por Favor Notificar si es V- O E-" ></i></a>
	                </label>
	            </p>
	            <p>
	             	<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
	            		<input class="form-control" type="text" placeholder="V-/E-/J-" required="required" name="ceduRif" minlength="2" maxlength="2" pattern="[VEJ-]+" id="ceduRif" onKeyUp="rifCedulaBanco()" onclick="rifCedulaBanco()">
	            	</div>

		            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
		             	<input class="form-control" type="text" placeholder="(Ejem.24819181)" required="required" name="cedu_cuen_usua" minlength="6" maxlength="10" pattern="[0-9]+" id="numCeduRif" onKeyUp="rifCedulaBanco()" onclick="rifCedulaBanco()"><br>
		         	</div>
	         </p>
	     </p>

	 </div>

	 <div class="col-lg-offset-4 col-lg-4 col-lg-offset-4 col-md-12 col-sm-12 col-xs-12 form-group has-success" align="center"">

	    <p class="campRegis">
	                     <label>
	                         Número de Cuenta &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Ingresa Numero de Cuenta De la EMpresa"></i></a>
	                     </label>
	                 </p>
	                 
	                     <div class="col-lg-3 col-md-2 col-sm-2 col-xs-6">
	                 		<input class="form-control" type="text" placeholder="Ingresa Número de Cuenta de Usuario"  name="pref_cuenta" required="required" minlength="4" maxlength="4" pattern="[0-9]+" onKeyUp="validaBanco()" id="cuenta">
	                 	</div>
	                 	<div class="col-lg-9 col-md-10 col-sm-10 col-xs-6">
	                     	<input class="form-control" type="text" placeholder="Ingresa Número de Cuenta de Usuario"  name="num_cuen_usua" required="required" minlength="16" maxlength="16" pattern="[0-9]+"><br>
	                 	</div>
	                 

	</div>




	<div class="col-lg-offset-4 col-lg-4 col-lg-offset-4 col-md-12 col-sm-12 col-xs-12 form form-group has-success" align="center">

	</div>

	<div class="col-lg-2 col-md-1 "></div>

	</div>


	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group has-success" align="center">
	 <a href="#">
	   <button class="reg1 btn btn-group" type="submit" value="Registrar" name="Registrar" onclick="rifCedulaBanco()" onclick="validaBanco()" onkeyup="validaBanco()" onkeyup="rifCedulaBanco()" action="validaBanco()">
	     Registrar <i class="glyphicon glyphicon-ok"></i>
	 </button>
	</a><br><br><br>
	</div>
	</form>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group has-success" align="center">
	 <a href="cuentasBancariasUsuario.php#ir">
	   <button class="btn btn-info">
	    <i class="glyphicon glyphicon-circle-arrow-left"></i> Regresar
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
	<script type="text/javascript" src="js/validarBanco.js"></script>
	<script type="text/javascript" src="js/rifCedulaBanco.js"></script>
	</body>
	</html>
