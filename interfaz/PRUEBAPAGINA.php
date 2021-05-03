<?php
//conexion con la Base de Datos
require ('conexionBD/conexionBD.php');

//consulta sql
$sql="SELECT * FROM catalogo_venta ORDER BY nombre_productoV";

$registros= mysqli_query($conexion,$sql);
$num = mysqli_num_rows($registros);
$pag = ceil($num / 3);

echo "Hay $num noticias registradas.<br> Repartidas en $pag páginas";

if(isset($_GET['ini'])){
	$ini=$_GET['ini'];
	$fin=$_GET['fin'];
	$sql="SELECT * FROM catalogo_venta ORDER BY nombre_productoV  LIMIT $ini,3";
}else{
	$sql="SELECT * FROM catalogo_venta ORDER BY nombre_productoV  LIMIT 0,3";
}

$registros=mysqli_query($conexion,$sql);

while($linea=mysqli_fetch_array($registros)){
	echo "<div id='textocont'>";
	echo "<h1>$linea[nombre_productoV]</h1>";
	echo "<img  align='right' src='../imagenes/news.png'>";
	echo "<p class='noticias'>$linea[categoria]</p>";
	echo "<hr>";
	echo "<p id='fecha'>Publicado el:  $linea[descripcion]</p>";
	echo "</div>"; 
}

for($c=1;$c<=$pag;$c++){
	$ini=$c*3-3;
	$fin=$ini+2;
	echo "<a href='PRUEBAPAGINA.php?ini=$ini&fin=$fin'>$c</a>&nbsp;";
}
?>