<?php
session_start();
$_SESSION['usuario']='pepito';
echo $_SESSION ['usuario'];
$_SESSION['contraseña']='12345';
echo $_SESSION ['contraseña'];
?>
