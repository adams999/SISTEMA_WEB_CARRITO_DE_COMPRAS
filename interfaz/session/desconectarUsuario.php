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
	<title>sessionTeminada</title>
    <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/style1.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="../img/icono1.ico">
</head>
<body>
<?php 
$nombreUsuario=$_SESSION['nombre_usuario'];
$apellidoUsuario=$_SESSION['apellido_usuario'];

require("../conexionBD/conexionBD.php");


if($_SESSION['id_usuario']){	//proceso para que un usuario Comun se desconecte de su session
	
        //////////////////////////////////////////////////tabla de auditoria//////////////////////////////////////
        $logueo_off=0;
        date_default_timezone_set('America/Caracas');
        $date_time=date('d/m/Y H:i');
        $insertar = "INSERT INTO session (id_usuario, fecha_hora_session, ip_session, permiso_session)

                        VALUES

                    ('{$_SESSION['id_usuario']}', '$date_time', '{$_SERVER['REMOTE_ADDR']}', '$logueo_off')";



        //verificar consulta
        pg_query($conexion,$insertar);



	echo '<article class="container-fluid">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
            <br><br><br><br><br>
                <p class="titulo1">
                    <i class="glyphicon glyphicon-ok" style="color: green"></i>&nbsp;&nbsp;&nbsp;'.$nombreUsuario.' '.$apellidoUsuario.' Sesión Terminada
                </p><br>                    
            </div>

                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>

            <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8 container-fluid form-group has-success alert alert-success bordesRecuperacion" align="center">
                <p class="titulo2"><br>
                    Te Esperamos Pronto! <img src="../img/logo1.jpg" width=100>
                </p><br>
                
            </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                    
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><p></p><br><br><br><br></div>

        </article>


        <meta http-equiv="refresh" content="2.5;URL=../index.php">';

    session_destroy();
}


else{
	header("location:../index1.php");
}

pg_close($conexion);
?>

</body>
</html>