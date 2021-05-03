<!DOCTYPE html>
<html>
<head>
	<title>resultado</title>
</head>
<body>
<?php
if ($_REQUEST['valor1'] == null && $_REQUEST['valor2'] == null) {
	echo "porfavor ingrese valores para poder realizar el calculo";
}
	if ($_REQUEST['opcion'] == "suma" && $_REQUEST['valor1'] >=1 && $_REQUEST['valor2'] >=1 ) {
	$suma = $_REQUEST['valor1'] + $_REQUEST['valor2'];
	echo "la suma es:".$suma;
}
	else{
		if ($_REQUEST['opcion'] == "resta") {
			$resta = $_REQUEST['valor1'] - $_REQUEST['valor2'];
			echo "la resta es".$resta;
		}
	}
	if ($_REQUEST['opcion'] == "multiplicar") {
		$multiplicar= $_REQUEST['valor1'] * $_REQUEST['valor2'];
		echo "la multiplicacion es".$multiplicar;
	}
		else{
			if ($_REQUEST['valor2'] == 0 && $_REQUEST['opcion'] == "dividir") {
				echo "no se puede dividir entre 0";
			}
				else{
					if ($_REQUEST['opcion']=="dividir") {
						$dividir= $_REQUEST['valor1'] / $_REQUEST['valor2'];
						echo "la division es:".$dividir;
					}
				}
		}
?>

</body>
</html>