<?php 
session_start();
if ($_SESSION['correo_usuarioA']) {

}else {
    header("Location:../index.php");
}
require("../conexionBD/conexionBD.php");

//aqui recibo los datos que paso por el formulario de informacionYural
$nomb_banc_empr=$_POST['nomb_banc_empr'];
$tipo_cuen_empr=$_POST['tipo_cuen_empr'];
$titu_cuen_empr=$_POST['titu_cuen_empr'];
$cedu_cuen_empr=$_POST['cedu_cuen_empr'];
$ceduRif=$_POST['ceduRif'];
$cedu_cuen_empr=$ceduRif.$cedu_cuen_empr;
$num_cuen_empr=$_POST['num_cuen_empr'];
$pref_cuenta=$_POST['pref_cuenta'];
$num_cuen_empr=$pref_cuenta.$num_cuen_empr;
$estatusActivo=1;


/////////////////////////////////////////////////validaciones
	
	if ($nomb_banc_empr==null or $tipo_cuen_empr==null or $titu_cuen_empr==null or $cedu_cuen_empr==null or $num_cuen_empr==null) {
			echo "<script>alert('Por Favor Completa Todos Los Campos De La Tienda Ya Que Son Obligatorios!!');
				window.location='../registroBancoEmpresa.php';exit();</script>";exit();
	}else{
		//codigo para evitar que se registran el codigo de cuenta bancaria 2 veces
		$valida1="SELECT * FROM bancos_empresa WHERE num_cuen_empr = '$num_cuen_empr'";

		$tot1 = pg_query($conexion,$valida1);
	    $resul1 = pg_num_rows($tot1);
	         
	        if($resul1 >=1){
	            echo "<script>alert('ATENCIÓN: El Número de Cuenta  - $num_cuen_empr -  ya Existe Por Favor ingresar un Número de Cuenta Válido');window.location='../registroBancoEmpresa.php#ir';exit();</script>";exit();
	    }

	}

////////////////////////////////////////////procesos
			if($resul1<=0){
			//este es el procedimiento para el cambio de datos de la informacion de banco de la empresa si pasa la validacion

				$sql2 = "INSERT INTO bancos_empresa (nomb_banc_empr, tipo_cuen_empr, num_cuen_empr, titu_cuen_empr, cedu_cuen_empr, estatus) 
					VALUES 
					 ('$nomb_banc_empr', '$tipo_cuen_empr', '$num_cuen_empr', '$titu_cuen_empr', '$cedu_cuen_empr', '$estatusActivo')";
				   
				   $tot2 = pg_query($conexion,$sql2);

					//si se pudieron realizar los cambios saldra este aviso automaticamente
				   if (isset($tot2)) {
				   	echo "<script>alert('ENHORABUERA! Se Registro la Cuenta Bancaria del Titular: $titu_cuen_empr Exitosamente!');
						window.location='../informacionYural.php#ir';exit();</script>";
				    }
			}
			
pg_close($conexion);
 ?>
