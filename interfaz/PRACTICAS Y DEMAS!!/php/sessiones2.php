<?php
$usuario="pepe";
$pass ="1234";
$_SESSION ['nombre']="pepe";
$_SESSION ['contra']="1234";

if($_SESSION['nombre']==$usuario && $_SESSION['contra']==$pass){
	echo"<p style='color:green'>las variables son correctas </p>";
	}
	else {
	echo "<p style='color:red'> error </p>";
}
?>
