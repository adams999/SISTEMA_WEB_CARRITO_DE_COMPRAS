
function calCodigoVenta(){
var codigoOrig = parseInt(document.getElementById("codigo1").value);//procedimiento para generar codigos aleatorios en codigo venta cliente
var codigoVenta  = (codigoOrig * Math.floor((Math.random() * 847) + 1));
var codigoventa2 = codigoVenta + Math.random(1-500);
var letra = document.getElementById("letra").value;

if (document.getElementById("letra").value == document.getElementById("1").value) {			//validacion para que cada codigo de venta al cliente empieze con las iniciales de cada categoria correspondiente
	letra = "ACC";
}
	else if (document.getElementById("letra").value == document.getElementById("2").value) {
		letra = "CAR";
	}
		else if (document.getElementById("letra").value == document.getElementById("3").value) {
			letra = "CHA";
		}
			else if (document.getElementById("letra").value == document.getElementById("4").value) {
				letra = "ELE";
			}
				else if (document.getElementById("letra").value == document.getElementById("5").value) {
					letra = "FRE";
				}
					else if (document.getElementById("letra").value == document.getElementById("6").value) {
						letra = "MOT";
					}
						else if (document.getElementById("letra").value == document.getElementById("7").value) {
							letra = "SUS";
						}
							else if (document.getElementById("letra").value == document.getElementById("8").value) {
								letra = "TRA";
							}

document.getElementById("codigo2").value = (letra+parseInt(codigoventa2));		//salida de datos al formulario(Genera codigo a cada producto)


if (document.getElementById("codigo2").value == "ACCNaN") {					//validacion para que el codigo del producto de venta no sea (NaN) Y PROVOQUE ERRORES EN EL SISTEMA 
	document.getElementById("codigo2").value = null;
	alert("El Código del Producto debe Empezar por un Número Para Evitar Errores con el Codigo Producto Venta");
}
	else if (document.getElementById("codigo2").value == "CARNaN") {
		document.getElementById("codigo2").value = null;
		alert("El Código del Producto debe Empezar por un Número Para Evitar Errores con el Codigo Producto Venta");
	}
		else if (document.getElementById("codigo2").value == "CHANaN") {
			document.getElementById("codigo2").value = null;
			alert("El Código del Producto debe Empezar por un Número Para Evitar Errores con el Codigo Producto Venta");
		}
			else if (document.getElementById("codigo2").value == "ELENaN") {
				document.getElementById("codigo2").value = null;
				alert("El Código del Producto debe Empezar por un Número Para Evitar Errores con el Codigo Producto Venta");
			}
				else if (document.getElementById("codigo2").value == "FRENaN") {
					document.getElementById("codigo2").value = null;
					alert("El Código del Producto debe Empezar por un Número Para Evitar Errores con el Codigo Producto Venta");
				}
					else if (document.getElementById("codigo2").value == "MOTNaN") {
						document.getElementById("codigo2").value = null;
						alert("El Código del Producto debe Empezar por un Número Para Evitar Errores con el Codigo Producto Venta");
					}
						else if (document.getElementById("codigo2").value == "SUSNaN") {
							document.getElementById("codigo2").value = null;
							alert("El Código del Producto debe Empezar por un Número Para Evitar Errores con el Codigo Producto Venta");
						}
							else if (document.getElementById("codigo2").value == "TRANaN") {
								document.getElementById("codigo2").value = null;
								alert("El Código del Producto debe Empezar por un Número Para Evitar Errores con el Codigo Producto Venta");
							}


							else if (document.getElementById("codigo2").value == "ACC0") {
								document.getElementById("codigo2").value = null;
								alert("El Código del Producto debe Empezar por un Número Mayor a 0 Para no Repetir el Codigo Producto Venta");
								}

							else if (document.getElementById("codigo2").value == "CAR0") {
								document.getElementById("codigo2").value = null;
								alert("El Código del Producto debe Empezar por un Número Mayor a 0 Para no Repetir el Codigo Producto Venta");
							}

							else if (document.getElementById("codigo2").value == "CHA0") {
								document.getElementById("codigo2").value = null;
								alert("El Código del Producto debe Empezar por un Número Mayor a 0 Para no Repetir el Codigo Producto Venta");
							}

							else if (document.getElementById("codigo2").value == "ELE0") {
								document.getElementById("codigo2").value = null;
								alert("El Código del Producto debe Empezar por un Número Mayor a 0 Para no Repetir el Codigo Producto Venta");
							}

							else if (document.getElementById("codigo2").value == "FRE0") {
								document.getElementById("codigo2").value = null;
								alert("El Código del Producto debe Empezar por un Número Mayor a 0 Para no Repetir el Codigo Producto Venta");
							}

							else if (document.getElementById("codigo2").value == "MOT0") {
								document.getElementById("codigo2").value = null;
								alert("El Código del Producto debe Empezar por un Número Mayor a 0 Para no Repetir el Codigo Producto Venta");
							}

							else if (document.getElementById("codigo2").value == "SUS0") {
								document.getElementById("codigo2").value = null;
								alert("El Código del Producto debe Empezar por un Número Mayor a 0 Para no Repetir el Codigo Producto Venta");
							}

							else if (document.getElementById("codigo2").value == "TRA0") {
								document.getElementById("codigo2").value = null;
								alert("El Código del Producto debe Empezar por un Número Mayor a 0 Para no Repetir el Codigo Producto Venta");
							}
							else if (document.getElementById("codigo2").value == "NaN") {
								document.getElementById("codigo2").value = null;
								alert("Por Favor Selecciona una Categoria Para Poder Generar Codigo Venta");
							}
							else if (document.getElementById("codigo2").value == parseInt(document.getElementById("codigo2").value)) {
								document.getElementById("codigo2").value = null;
								alert("Por Favor Selecciona una Categoria Para Poder Generar Codigo Venta");
							}





}

