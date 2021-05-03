<?php 
$correo = $_POST['correo'];
$contra = $_POST['contra'];
echo "$correo y $contra";

 /*
if ($correo==null or $contra==null) {
  echo "<script>
        alert('Porfavor Ingresa Tus datos de Usuario para que Puedas Iniciar Session');window.location='../loginUsuario.html';
    </script>";
}

else{
	require("../conexionBD/conexionBD.php");

	if ((($resultado = mysql_query("SELECT * from usuario where correo_usuario='" . $correo . "'"))and($resultado = mysql_query("SELECT * from usuario where contra_usuario='" . $contra . "'")==true))) {
		
		session_start();
		echo "inicio session correctamente";


}*/
 
?>