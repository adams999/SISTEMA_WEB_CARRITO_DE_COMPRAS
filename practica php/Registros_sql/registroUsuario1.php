<html>
<body>

<?php
// process form
$link = mysql_connect("127.0.0.1", "root" ,"adams24819181");
mysql_select_db("yural",$db);
$sql = "INSERT INTO usuario (nombre_usu, correo_usu, conti, direccion_usu, telefono_usu, apellido_usu, contraseña_usu, pais, cedula_usu, telefono_hogar_usu) " +
  "VALUES ('$nombre_usuario', '$correo_usuario', '$estado', '$direccion', '$telef_personal', '$apellido_usuario', '$contraseña_usuario', '$ciudad', '$cedula_usuario', '$telef_hog')";
$result = mysql_query($sql);
echo "¡Gracias! Hemos recibido sus datos.\n";

</body>
</html>
