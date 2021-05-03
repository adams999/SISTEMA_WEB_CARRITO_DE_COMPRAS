<?php
//conexion base de datos yural
$user = "postgres";
$password = "adams24819181";
$dbname = "yural";
$port = "5432";
$host = "localhost";

$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());

?>