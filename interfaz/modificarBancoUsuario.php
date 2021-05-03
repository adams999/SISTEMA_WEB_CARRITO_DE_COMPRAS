	<!DOCTYPE html>
	<?php //esta es la validacion para el Administrador!!!!
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
	    <title>Modificar Banco Usuario</title>
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

	    <?php 

	    extract($_GET);
	    require("conexionBD/conexionBd.php");

	    $sql="SELECT * FROM bancos_usuario WHERE id_banco_usuario = '$id'";
	    //la variable  $conexion viene de connect_db que lo traigo con el require("connect_db.php");
	    $ressql=pg_query($conexion,$sql);
	        while ($row=pg_fetch_array ($ressql)){//aqui cargo las variables correspondientes al array del banco empresa
	            $nomb_banc_usua=$row['nomb_banc_usua'];
	            $tipo_cuen_usua=$row['tipo_cuen_usua'];
	            $num_cuen_usua=$row['num_cuen_usua'];
	            $titu_cuen_usua=$row['titu_cuen_usua'];
	            $cedu_cuen_usua=$row['cedu_cuen_usua'];
	        }

	        ?>         



	        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
	            <br>
	            <p class="titulo1">
	            <a name="ir"></a>
	            Modificar Banco:&nbsp; <?php echo $id; ?></p>
	            <br><br>
	        </div>

	        <div class="row">

	            <div class=" col-lg-2 " ></div>
	            <form class="form form-group" <?php echo 'action="modificar/modificarBancoUsuario.php?id='.$id.'"' ?> method="post">
	                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 form-group has-success" align="center">
	                 <p class="campRegis">
	                     <label>
	                         Nombre Banco &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right." title="Nombre del Banco" ></i></a>
	                     </label>
	                 </p>
	                 <p>
	                     <select class="form-control" type="text" placeholder="Selecciona un Banco para Proceder con el Registro" required="required" name="nomb_banc_usua" minlength="6" maxlength="100" pattern="[A-Za-z]+" autofocus onKeyUp="validaBanco()" id="banco" onclick="validaBanco()">

	                     	<option onKeyUp="validaBanco()" id="banco" onclick="validaBanco()">
								<?php 
		                     		if (@$nomb_banc_usua) {
		                     			echo $nomb_banc_usua;
		                     		}
		                     	 ?>
	                     	</option>
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
	                     <select class="form-control" type="text" placeholder="Selecciona elTipo de Cuenta" required="required" name="tipo_cuen_usua" minlength="6" maxlength="9" pattern="[A-Za-z]+">
	                     	<?php 
	                     		if (@$tipo_cuen_usua) {
	                     			echo '<option>'.$tipo_cuen_usua.'</option>';
	                     		}
	                     	 ?>
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
	                        Titular de Cuenta &nbsp; <a href="#"><i class="iconReg glyphicon glyphicon-exclamation-sign pull-right" title="Modifica El Titular de la Cuenta" ></i></a>
	                    </label >
	                </p>
	                <p>
	                 <input class="form-control" type="text" placeholder="Modifica el Nombre del Titular" required="required" name="titu_cuen_usua" value="<?php echo $titu_cuen_usua; ?>" minlength="10" maxlength="100" pattern="[a-zA-Z ]+"><br><br>
	             </p>

	             <p class="campRegis">
	                <label>
	                    Cedula/Rif Titular &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Modifica la Cedula Del Titular Por Favor Notificar si es V- O E-" ></i></a>
	                </label>
	            </p>
	            <p>
	             	<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
	            		<input class="form-control" type="text" placeholder="V-/E-/J-" required="required" name="ceduRif" minlength="2" maxlength="2" pattern="[VEJ-]+" id="ceduRif" onKeyUp="rifCedulaBanco()" onclick="rifCedulaBanco()" value="<?php echo substr($cedu_cuen_usua,0,2) ?>">
	            	</div>

		            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
		             	<input class="form-control" type="text" placeholder="(Ejem.24819181)" required="required" name="cedu_cuen_usua" minlength="6" maxlength="10" pattern="[0-9]+" id="numCeduRif" onKeyUp="rifCedulaBanco()" onclick="rifCedulaBanco()" value="<?php echo substr($cedu_cuen_usua, 2); ?>"><br>
		         	</div>
	         </p>
	     </p>

	 </div>

	 <div class="col-lg-offset-4 col-lg-4 col-lg-offset-4 col-md-12 col-sm-12 col-xs-12 form-group has-success" align="center"">

	    <p class="campRegis">
	                     <label>
	                         Número de Cuenta &nbsp; <a href="#"><i class="glyphicon glyphicon-exclamation-sign pull-right" title="Modifica Numero de Cuenta De la Empresa"></i></a>
	                     </label>
	                 </p>
	                 <p>
	                 	<div class="col-lg-3 col-md-2 col-sm-2 col-xs-6">
	                 		<input class="form-control" type="text" placeholder="Ingresa Número de Cuenta de Empresa"  name="pref_cuenta" required="required" minlength="4" maxlength="4" pattern="[0-9]+" onKeyUp="validaBanco()" id="cuenta" value="<?php echo substr($num_cuen_usua,0,4) ?>">
	                 	</div>
	                 	<div class="col-lg-9 col-md-10 col-sm-10 col-xs-6">
	                     	<input class="form-control" type="text" placeholder="Ingresa Número de Cuenta de Empresa"  name="num_cuen_usua" required="required" value="<?php echo substr($num_cuen_usua, 4); ?>" minlength="16" maxlength="16" pattern="[0-9]+"><br>
	                 	</div>
	                 </p>

	</div>




	<div class="col-lg-offset-4 col-lg-4 col-lg-offset-4 col-md-12 col-sm-12 col-xs-12 form form-group has-success" align="center">

	</div>

	<div class="col-lg-2 col-md-1 "></div>

	</div>




	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group has-success" align="center">
	 <a href="#">
	   <button class="reg1 btn btn-group" type="submit" value="Registrar" name="Registrar" onclick="rifCedulaBanco()" onclick="validaBanco()" onkeyup="validaBanco()" onkeyup="rifCedulaBanco()" action="validaBanco()">
	     Modificar <i class="glyphicon glyphicon-ok"></i>
	 </button>
	</a><br><br><br>
	</div>
	</form>

	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group has-success" align="center">
	 <a href="cuentasBancariasUsuario.php#ir">
	   <button class="btn btn-info">
	    <i class="glyphicon glyphicon-circle-arrow-left"></i> Regresar 
	 </button>
	</a><br><br><br>
	</div>



	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-group has-success" align="center">
		 <?php 
		 	echo '<a onClick="javascript:preguntar(id='.$id.')">
				<button class="reg2 btn btn-group" type="submit" value="Registrar" name="Registrar">
				    Eliminar Banco <i class="glyphicon glyphicon-trash"></i>
				</button>
			</a>'; 
		?>
		<br><br><br>
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
	<script language="Javascript">
	    function preguntar(id){
	     eliminar=confirm("¿Deseas Eliminar El Banco Con el ID: <?php echo "$id"; ?> Perteneciente a: <?php echo "$nomb_banc_usua"; ?> ?");
	     if (eliminar)
	           //Redireccionamos si das a aceptar
	             window.location.href = "modificar/eliminarBancoUsuario.php?id="+id; //página web a la que te redirecciona si confirmas la eliminación
	             else
	          //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
	      alert("NO! Has Eliminado El Banco Actual...")
	  }
	</script> 
	</body>
	</html>
