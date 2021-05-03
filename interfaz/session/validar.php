<!DOCTYPE html>
<html>
<head>
	<head>
		<meta charset="utf-8">
		<title>SESSION</title>
		<link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="../css/style1.css" rel="stylesheet" type="text/css">
		<link rel="icon" href="../img/icono1.ico">
	</head>
</head>
<body>

</body>
</html>
<?php
session_start();
require("../conexionBD/conexionBD.php");

$username=$_POST['correo'];
$pass=$_POST['contra'];

if (($username==null or $pass==null)or($username==null and $pass==null)) {
	header("Location:../index.php");
}


if (@$_SESSION['id_usuarioA'] or @$_SESSION['id_usuario']) {
	echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12' align='center'>Ya Tienes Una Session Iniciada Por Favor Cierra Sesion Para Poder Loguearte Como Otro Usuario!!</div>";
	echo '<meta http-equiv="refresh" content="2.5;URL=../index.php">';exit();
}

else{ 
	//la variable  $pg viene de connect_db que lo traigo con el require("connect_db.php");
$sql2=pg_query($conexion,"SELECT * FROM usuario WHERE correo_usuario='$username' and bandera='10' and estatus='1'");
if($f2=pg_fetch_assoc($sql2)){
	if($pass===$f2['contra_usuario']){
		$_SESSION['id_usuarioA']=$f2['id_usuario'];
		$_SESSION['cedula_usuarioA']=$f2['cedula_usuario'];
		$_SESSION['nombre']=$f2['nombre_usuario'];
		$_SESSION['apellido']=$f2['apellido_usuario'];
		$_SESSION['correo_usuarioA']=$f2['correo_usuario'];
		$_SESSION['estadoA']=$f2['estado'];
		$_SESSION['ciudadA']=$f2['ciudad'];
		$_SESSION['direccionA']=$f2['direccion'];
		$_SESSION['telef_personalA']=$f2['telef_personal'];
		$_SESSION['telef_hogA']=$f2['telef_hog'];

			//aqui cargo en variables la informacion que obtuvo el array para que en dado caso se Pueda utilizar y mostrar En el Futuro.... ojo la contraseña no se carga en variable independientes...
		$nombreAdmin=$f2['nombre_usuario'];

		echo '<article class="container-fluid">

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
			<br><br><br><br><br>
			<p class="titulo1">
				<i class="glyphicon glyphicon-ok" style="color: green"></i>&nbsp;&nbsp;&nbsp; <b>Administrador:</b> '.$nombreAdmin.' Sesión Iniciada Satisfactoriamente
			</p><br> 

		</div>

		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>

		<div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8 container-fluid form-group has-success alert alert-success bordesRecuperacion" align="center">
			<p class="titulo2"><br>
				Bienvenido a Yural C.A. <img src="../img/logo1.jpg" width=100>
			</p><br>
			<a href="../indexAdmin.php"> <button class="log2 btn btn-group">Adelante</button></a> 
		</div>

		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p></p><br><br><br><br></div>

	</article>


	<meta http-equiv="refresh" content="2.5;URL=../indexAdmin.php">';


//////////////////////////////////////////////////tabla de auditoria//////////////////////////////////////
$logueo_activo=1;
date_default_timezone_set('America/Caracas');
$date_time=date('d/m/Y H:i');
$insertar = "INSERT INTO session (id_usuario, fecha_hora_session, ip_session, permiso_session)

    	 		VALUES

    		('{$_SESSION['id_usuarioA']}', '$date_time', '{$_SERVER['REMOTE_ADDR']}', '$logueo_activo')";



//verificar consulta
pg_query($conexion,$insertar);
exit();

}
else{
	echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';

	echo "<script>location.href='../loginUsuario.php'</script>";
}
}


$sql=pg_query($conexion,"SELECT * FROM usuario WHERE correo_usuario='$username' and bandera='1' and estatus='1'");
if($f=pg_fetch_assoc($sql)){
	if($pass===$f['contra_usuario']){
		$_SESSION['id_usuario']=$f['id_usuario'];
		$_SESSION['cedula_usuario']=$f['cedula_usuario'];
		$_SESSION['nombre_usuario']=$f['nombre_usuario'];
		$_SESSION['apellido_usuario']=$f['apellido_usuario'];
		$_SESSION['correo_usuario']=$f['correo_usuario'];
		$_SESSION['estado']=$f['estado'];
		$_SESSION['ciudad']=$f['ciudad'];
		$_SESSION['direccion']=$f['direccion'];
		$_SESSION['telef_personal']=$f['telef_personal'];
		$_SESSION['telef_hog']=$f['telef_hog'];

		//aqui cargo en variables la informacion que obtuvo el array para que en dado caso se Pueda utilizar y mostrar En el Futuro.... ojo la contraseña no se carga en variable independientes...
		$cedulaUsuario=$f['cedula_usuario'];
		$nombreUsuario=$f['nombre_usuario'];
		$apellidoUsuario=$f['apellido_usuario'];
		$correoUsuario=$f['correo_usuario'];
		$estadoUsuario=$f['estado'];
		$ciudadUsuario=$f['ciudad'];
		$direccionUsuario=$f['direccion'];
		$telefonoUsuario=$f['telef_personal'];
		$telefonoHogarUsuario=$f['telef_hog'];





		echo '<article class="container-fluid">

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
			<br><br><br><br><br>
			<p class="titulo1">
				<i class="glyphicon glyphicon-ok" style="color: green"></i>&nbsp;&nbsp;&nbsp;'.$nombreUsuario.' '.$apellidoUsuario.' Sesion Iniciada Satisfactoriamente!!!
			</p><br>  

		</div>

		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>

		<div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8 container-fluid form-group has-success alert alert-success bordesRecuperacion" align="center">
			<p class="titulo2"><br>
				Bienvenido a Yural C.A. <img src="../img/logo1.jpg" width=100>
			</p><br>
			<a href="../index1.php"> <button class="log2 btn btn-group">Adelante</button></a>  
		</div>

		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p></p><br><br><br><br></div>

	</article>


	<meta http-equiv="refresh" content="2.5;URL=../index1.php">';
		
		//////////////////////////////////////////////////tabla de auditoria//////////////////////////////////////
$logueo_activo=1;
date_default_timezone_set('America/Caracas');
$date_time=date('d/m/Y H:i');
$insertar = "INSERT INTO session (id_usuario, fecha_hora_session, ip_session, permiso_session)

    	 		VALUES

    		('{$_SESSION['id_usuario']}', '$date_time', '{$_SERVER['REMOTE_ADDR']}', '$logueo_activo')";



//verificar consulta
pg_query($conexion,$insertar);
exit();

}else{
	echo '<script>alert("'.$username.' CONTRASEÑA INCORRECTA. Verifica Tu Contraseña o Puedes Recuperarla en la opcion de Olvide Mi Contraseña")</script> ';

	echo "<script>location.href='../loginUsuario.php'</script>";
}



}else{

	echo '<script>alert("ESTE USUARIO NO EXISTE, POR FAVOR REGISTRESE PARA PODER INGRESAR ")</script>';

	echo "<script>location.href='../registroUsuario.php'</script>";	

}
}
?>
</body>
</html>