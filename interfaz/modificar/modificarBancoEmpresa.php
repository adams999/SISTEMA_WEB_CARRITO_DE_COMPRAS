<?php 

session_start();
if ($_SESSION['correo_usuarioA']) {

}else {
    header("Location:../index.php");
}
require("../conexionBD/conexionBD.php");

extract($_GET);//aqui extraigo el id del banco para poder modificar en base a el

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


 


/////////////////////////////////////////////////validaciones
	
	if ($nomb_banc_empr==null or $tipo_cuen_empr==null or $titu_cuen_empr==null or $cedu_cuen_empr==null or $num_cuen_empr==null) {
			echo "<script>alert('POR FAVOR Completa Todos Los Campos del Banco para proceder con el Registro!!');
				window.location='../ModificarBancoEmpresa.php?id=$id';exit();</script>";exit();
	}else{
		//codigo para evitar que se registran el codigo de cuenta bancaria 2 veces
		$valida1="SELECT * FROM bancos_empresa WHERE num_cuen_empr = '$num_cuen_empr' and id_banco_empresa !='$id'";

		$tot1 = pg_query($conexion,$valida1);
	    $resul1 = pg_num_rows($tot1);
	         
	        if($resul1 >=1){
	            echo "<script>alert('ATENCIÓN: El Número de Cuenta  - $num_cuen_empr -  ya Existe Por Favor ingresar un numero de cuenta Válido');window.location='../ModificarBancoEmpresa.php?id=$id#ir';exit();</script>";exit();
	    }

	}


////////////////////////////////////////////procesos
			if($resul1<=0){
			//este es el procedimiento para el cambio de datos de la informacion de banco de la empresa si pasa la validacion

				
				$sql2 = "UPDATE bancos_empresa SET nomb_banc_empr='$nomb_banc_empr', tipo_cuen_empr='$tipo_cuen_empr', titu_cuen_empr='$titu_cuen_empr', cedu_cuen_empr='$cedu_cuen_empr', num_cuen_empr='$num_cuen_empr' WHERE id_banco_empresa='$id' ";
				   
				   $tot2 = pg_query($conexion,$sql2);

					//si se pudieron realizar los cambios saldra este aviso automaticamente
				   if (isset($tot2)) {
				   	echo "<script>alert('ENHORABUERA!!! Has Modificado Los Datos Del Banco Empresa con el id -$id-');
						window.location='../informacionYural.php#ir';exit();</script>";
				    }

			}
			
pg_close($conexion);
 ?>
