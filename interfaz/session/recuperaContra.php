<?php 
session_start();

if (isset($_SESSION['id_usuarioA'])) {
 header("Location:../indexAdmin.php");exit();
} elseif (isset($_SESSION['id_usuario'])) {
  header("Location:../index1.php");exit();
}


require("../conexionBD/conexionBD.php");


//aqui paso lo del formulario de recuperacion de contraseña
$emailRecuperar=$_POST['correo_usuario'];
$pregunta_seguridad=$_POST['pregunta_seguridad'];
$respuesta=$_POST['respuesta'];

if ($emailRecuperar==null or $pregunta_seguridad==null or $respuesta==null) {
  header("Location:../recuperaContra.php");exit();
}

//aqui comparo la fila de base de datos y que lo que se envie por el formulario este Registrado en la base de datos
$valida1="SELECT * FROM usuario WHERE correo_usuario = '$emailRecuperar' and pregunta_seguridad='$pregunta_seguridad' and respuesta_seguridad ~* '$respuesta' and estatus='1'";

//aqui cargo la contraseña en un array correspondiente al usuario que solicita recuperar contraseña
$sql=("SELECT * FROM usuario where correo_usuario='$emailRecuperar' ");
	
        //la variable  $mysqli viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
		$query=pg_query($conexion,$sql);

		while($arreglo=pg_fetch_array($query)){
		 $claveUsu=$arreglo['contra_usuario'];
 	}


$tot1 = pg_query($conexion,$valida1);
$resul1 = pg_num_rows($tot1);


//aqui Valido si el resultado de la validacion en =1 entonces Muestra la contraseña Correspondiente
if($resul1 >= 1){
               echo "<script>alert('ATENCIÓN: La Clave del Correo --$emailRecuperar-- es:   - $claveUsu -   Puedes Ingresar a Nuestro Sistema!. Cambiar tu Clave y Pregunta de Seguridad!!!');
               window.location='../loginUsuario.php';</script>";
             
             }
             elseif ($resul1 != 1) {
             	echo "<script>alert('Datos Incorrectos Por Favor Ingrese Datos Validos o Registrate en Nuestro Sistema');
               window.location='../recuperaContra.php';</script>";
             }


pg_close($conexion);
 ?>