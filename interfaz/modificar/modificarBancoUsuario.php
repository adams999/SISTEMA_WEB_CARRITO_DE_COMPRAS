<?php 

session_start();
if ($_SESSION['id_usuario']) {

}else {
    header("Location:../index.php");
}
require("../conexionBD/conexionBD.php");

extract($_GET);//aqui extraigo el id del banco para poder modificar en base a el

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


/////////////////////////////////////////////////validaciones
	
	if ($nomb_banc_usua==null or $tipo_cuen_usua==null or $titu_cuen_usua==null or $cedu_cuen_usua==null or $num_cuen_usua==null) {
			echo "<script>alert('POR FAVOR Completa Todos Los Campos del Banco para proceder con el Registro!!');
				window.location='../modificarBancoUsuario.php?id=$id';exit();</script>";exit();
	}else{
		//codigo para evitar que se registran el codigo de cuenta bancaria 2 veces
		$valida1="SELECT * FROM bancos_usuario WHERE num_cuen_usua = '$num_cuen_usua' and id_banco_usuario !='$id'";

		$tot1 = pg_query($conexion,$valida1);
	    $resul1 = pg_num_rows($tot1);
	         
	        if($resul1 >=1){
	            echo "<script>alert('ATENCIÓN: El Número de Cuenta  - $num_cuen_usua -  ya Existe Por Favor ingresar un numero de cuenta Válido');window.location='../modificarBancoUsuario.php?id=$id#ir';exit();</script>";exit();
	    }

	}


////////////////////////////////////////////procesos
			if($resul1<=0){
			//este es el procedimiento para el cambio de datos de la informacion de banco de la empresa si pasa la validacion

				
				$sql2 = "UPDATE bancos_usuario SET nomb_banc_usua='$nomb_banc_usua', tipo_cuen_usua='$tipo_cuen_usua', titu_cuen_usua='$titu_cuen_usua', cedu_cuen_usua='$cedu_cuen_usua', num_cuen_usua='$num_cuen_usua' WHERE id_banco_usuario='$id' ";
				   
				   $tot2 = pg_query($conexion,$sql2);

					//si se pudieron realizar los cambios saldra este aviso automaticamente
				   if (isset($tot2)) {
				   	echo "<script>alert('ENHORABUERA!!! Has Modificado Los Datos De Tu Banco Personal con el ID -$id-');
						window.location='../cuentasBancariasUsuario.php#ir';exit();</script>";
				    }

			}
			
pg_close($conexion);
 ?>
