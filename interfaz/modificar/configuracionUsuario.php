<?php 
session_start();
if ($_SESSION['id_usuario']) {

}else {
    header("Location:../index.php");
}


require("../conexionBD/conexionBD.php");

//aqui recibo y cargo las variables con la informacion que se envia de la pagina de configuracion de cuenta del Usuario
@$contraseña_antigua=$_POST['contraseña_antigua'];
@$contraseña_nueva=$_POST['contraseña_nueva'];
@$repite_contraseña=$_POST['repite_contraseña'];
@$cod_telef_hog=$_POST['cod_telef_hog'];
@$telefono_hogar=$_POST['telefono_hogar'];
@$pregunta_seguridad=$_POST['pregunta_seguridad'];
@$cod_telef_pers=$_POST['cod_telef_pers'];
@$telefono_personal=$_POST['telefono_personal'];
@$respuesta_seguridad=$_POST['respuesta_seguridad'];



if (@$contraseña_antigua==null) {
 	echo "<script>alert('ATENCIÓN Ingresa Datos Correctos para poder Efectuar el Cambio');window.location='../configUsuarioADMIN.php#ir';exit()</script>";
 }



$id_usuario=$_SESSION['id_usuario'];

				$sql=("SELECT * FROM usuario where id_usuario='$id_usuario'");
    
                //la variable  $mysqli viene de connect_db que lo traigo con el require("conexionBD/conexionBD.php");
                $query=pg_query($conexion,$sql);

                 
        		while($arreglo=pg_fetch_array($query)){//este arreglo ordena la informacion del array correspondiente a los apartados para despues llamar la informacion que se necesite
                   		$contraUsuario=$arreglo['contra_usuario'];
                   		$ceduUsuario=$arreglo['cedula_usuario'];
                    
 }





if ( $contraseña_antigua==null) {
	echo "<script>alert('ATENCIÓN Debes Ingresar Tu Contraseña Actual Para Poder Ejecutar Cualquier Cambio');window.location='../configUsuario.php#ir';exit()</script>";exit();
}

//aqui ago validacion de que si la contraseña antigua es diferente a la que tiene en ese momento el usuario saldra un aviso y cerrara el proceso
elseif ($contraseña_antigua!=null and $contraseña_antigua!=$contraUsuario  ) {
	echo "<script>alert('ATENCIÓN. La Contraseña Actual No Coincide con la Registrada Por Favor Ingresar Contraseña Valida... Para Poder Proceder Con Los Cambios');
			window.location='../configUsuario.php#ir';exit();</script>";exit();
}
//aqui valido de que si la contraseña vieja y la contraseña nueva q se recibe  a travez de formulario son iguales salga un aviso y no me deje seguir con el cambio
			elseif ($contraseña_antigua!=null and $contraseña_nueva!=null and $contraseña_antigua == $contraseña_nueva) {
				echo "<script>alert('ATENCIÓN La Contraseña Nueva no Debe ser Igual a la Ya Establecida!!');window.location='../configUsuario.php#ir';exit()</script>";exit();
			
}
			elseif ($contraseña_nueva != $repite_contraseña) {
				echo "<script>alert('ATENCIÓN La Contraseña Nueva Debes Ingresarla 2 Veces En Los Campos Correspondentes... Y En Este Caso No Coinciden Por Favor Ingresa Contraseña Correcta Para Que Puedan Surgir Los Cambios');window.location='../configUsuario.php#ir';exit()</script>";exit();
}



//si en las dos validacion anteriorees no son activadas se procedera a ejecutar el cambio de clave  pregunta de seguridad, respuesta de seguridad, telefono de hogar y telefono personal
		elseif($contraseña_antigua==$contraUsuario and $contraseña_antigua != $contraseña_nueva and $contraseña_nueva == $repite_contraseña and $contraseña_antigua!=null and $contraseña_nueva!=null and $repite_contraseña!=null ){

	$sql2 = "UPDATE usuario SET contra_usuario='$contraseña_nueva' where id_usuario='$id_usuario'";
   $result=pg_query($conexion,$sql2);
   
//si se pudieron realizar los cambios saldra este aviso y cerrara sesion automaticamente para que no hayan problemas al momento de apartar o otro proceso interno del sistema
   if (isset($result)) {
   	echo "<script>
		alert('ENHORABUENA!!! Cambiastes Tu Contraseña Por Una Nueva Y Se Guardaron Tus Cambios... Por Favor Vuelve a Iniciar Sesion Para que los Cambios se Ejecuten! ');
		window.location='../loginUsuario.php';exit();</script>";

////////////////////////////////////tabla de auditoria//////////////////////////////////////////////////
		$logueo_off=0;
		date_default_timezone_set('America/Caracas');
		$date_time=date('d/m/Y H:i');
		$insertar = "INSERT INTO session (id_usuario, fecha_hora_session, ip_session, permiso_session)
		                VALUES
		            ('{$_SESSION['id_usuario']}', '$date_time', '{$_SERVER['REMOTE_ADDR']}', '$logueo_off')";

		//verificar consulta
		pg_query($conexion,$insertar);
		session_destroy();//aqui destruyo sesion que este logueada en tiempo real
		exit();
   }
}




























//-----------------------------------------------------------------------------------------------//





//aqui comparo de que los restos de losd atos esten llenos para poderlos modificar mientras ingrese la contraseña vieja
if ($contraseña_antigua!=null and $contraseña_antigua==$contraUsuario and $telefono_hogar!=null and $pregunta_seguridad!=null and $telefono_personal!=null and $respuesta_seguridad!=null ) {

	$sql3 = "UPDATE usuario SET cod_telef_pers='$cod_telef_pers', telef_personal='$telefono_personal', cod_telef_hog='$cod_telef_hog', telef_hog='$telefono_hogar', pregunta_seguridad='$pregunta_seguridad', respuesta_seguridad='$respuesta_seguridad' where id_usuario='$id_usuario'";
   $result3=pg_query($conexion,$sql3);
   
//si se pudieron realizar los cambios saldra este aviso y cerrara sesion automaticamente para que no hayan problemas al momento de apartar o otro proceso interno del sistema
   if (isset($result3)) {
   	echo "<script>
		alert('ENHORABUENA!!! Los Cambios Se Ejecutaron Satisfactoriamente!!!');
		window.location='../configUsuario.php';exit();</script>";exit();
   }

}


elseif ($contraseña_antigua==null or $telefono_hogar==null or $pregunta_seguridad==null or $telefono_personal==null or $respuesta_seguridad==null ) {
		echo "<script>
		alert('ATENCIÓN!!! Si Vas a Cambiar Datos Como Telefonos, Pregunta y Respuesta de Seguridad, Debes Ingresar Tu Contraseña Actual en el Campo Correspondiente. Ademas de Completar Dichos Campos. Para Poder Ejecutar Los Cambios.');
		window.location='../configUsuario.php';exit();</script>";exit();
}




 ?>