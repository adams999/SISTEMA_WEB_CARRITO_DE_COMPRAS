<?php 
session_start();
if ($_SESSION['id_usuario']) {

}else {
    header("Location:../index.php");
}
require("../conexionBD/conexionBD.php");

//aqui recibo los datos que paso por el formulario de informacionYural
$nomb_banc_usua=$_POST['nomb_banc_usua'];
$tipo_cuen_usua=$_POST['tipo_cuen_usua'];
$titu_cuen_usua=$_POST['titu_cuen_usua'];
$cedu_cuen_usua=$_POST['cedu_cuen_usua'];
$ceduRif=$_POST['ceduRif'];
$cedu_cuen_usua=$ceduRif.$cedu_cuen_usua;
$num_cuen_usua=$_POST['num_cuen_usua'];
$pref_cuenta=$_POST['pref_cuenta'];
$num_cuen_usua=$pref_cuenta.$num_cuen_usua;
$estatusActivo=1;


/////////////////////////////////////////////////validaciones
	
	if ($nomb_banc_usua==null or $tipo_cuen_usua==null or $titu_cuen_usua==null or $cedu_cuen_usua==null or $num_cuen_usua==null) {
			echo "<script>alert('Por Favor Completa Todos Los Campos De La Tienda Ya Que Son Obligatorios!!');
				window.location='../registrarCuentaUsuario.php';exit();</script>";exit();
	}else{
		//codigo para evitar que se registran el codigo de cuenta bancaria 2 veces
		$valida1="SELECT * FROM bancos_usuario WHERE num_cuen_usua = '$num_cuen_usua'";

		$tot1 = pg_query($conexion,$valida1);
	    $resul1 = pg_num_rows($tot1);
	         
	        if($resul1 >=1){
	            echo "<script>alert('ATENCIÓN: El Número de Cuenta  - $num_cuen_usua -  ya Existe Por Favor ingresar un Número de Cuenta Válido');window.location='../registrarCuentaUsuario.php#ir';exit();</script>";exit();
	    }

	}

////////////////////////////////////////////procesos
			if($resul1<=0){
			//este es el procedimiento para el cambio de datos de la informacion de banco de la usuaesa si pasa la validacion

				$sql2 = "INSERT INTO bancos_usuario (nomb_banc_usua, tipo_cuen_usua, num_cuen_usua, titu_cuen_usua, cedu_cuen_usua, estatus, id_usuario) 
					VALUES 
					 ('$nomb_banc_usua', '$tipo_cuen_usua', '$num_cuen_usua', '$titu_cuen_usua', '$cedu_cuen_usua', '$estatusActivo', '{$_SESSION['id_usuario']}')";
				   
				   $tot2 = pg_query($conexion,$sql2);

					//si se pudieron realizar los cambios saldra este aviso automaticamente
				   if (isset($tot2)) {
				   	echo "<script>alert('ENHORABUERA! Se Registro la Cuenta Bancaria del Titular: $titu_cuen_usua Exitosamente!');
						window.location='../cuentasBancariasUsuario.php#ir';exit();</script>";
				    }
			}
			
pg_close($conexion);
 ?>
