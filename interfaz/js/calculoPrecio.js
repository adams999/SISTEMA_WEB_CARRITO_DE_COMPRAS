var ganancia=document.getElementById("ganancia").value;	//ganancia que gana la empresa por cada producto	
var iva=document.getElementById("iva").value; 				// iva de cada producto



function calPrecio(){
var precCosto = parseFloat(document.getElementById("num1").value);// procerdimiento para sumar el precio costo y que salga en el input 
var precGananc = precCosto * ganancia;
var resulCosto = precGananc + precCosto;
	document.getElementById("num2").value = parseFloat(resulCosto.toFixed(2)).toFixed(2);
var precioBase = document.getElementById("num2").value;


var precioIva = document.getElementById("num2").value;// procedimiento para que calcule el iva en input correspondiente
var resultadoIva = precioIva*iva;
document.getElementById("num3").value = parseFloat(resultadoIva.toFixed(2)).toFixed(2);
var resulIva = document.getElementById("num3").value;


	var pvp;											//CODIGO DE RESULTADO DE PVP
 pvp = parseFloat(precioBase)+parseFloat(resulIva);
 document.getElementById("num4").value = pvp.toFixed(2);



if (document.getElementById("num2").value == 'NaN' ) {
	document.getElementById("num2").value = null; 
	document.getElementById("num3").value = null;
	document.getElementById("num4").value = null;
	alert("ATENCIÓN!! El Precio Costo Debe Emmpezar Por un Número Mayor a 0 No, Se Admiten Letras, Ni Espacios en Blanco!!");
	}

	else if (document.getElementById("num3").value == "NaN" ) {
	document.getElementById("num2").value = null; 
	document.getElementById("num3").value = null;
	document.getElementById("num4").value = null;
	alert("ATENCIÓN!! El Precio Costo Debe Emmpezar Por un Número Mayor a 0 No, Se Admiten Letras, Ni Espacios en Blanco!!");
	}

	else if (document.getElementById("num4").value == "NaN" ) {
	document.getElementById("num2").value = null; 
	document.getElementById("num3").value = null;
	document.getElementById("num4").value = null;
	alert("ATENCIÓN!! El Precio Costo Debe Emmpezar Por un Número Mayor a 0 No, Se Admiten Letras, Ni Espacios en Blanco!!");
	}




//---------------------------------------------------------------------------------//

	else if (document.getElementById("num2").value == "0.00" ) {
	document.getElementById("num2").value = null; 
	document.getElementById("num3").value = null;
	document.getElementById("num4").value = null;
	alert("ATENCIÓN!! El Precio Costo Debe Emmpezar Por un Número Mayor a 0 No, Se Admiten Letras, Ni Espacios en Blanco!!");
	}

	else if (document.getElementById("num3").value == "0.00" ) {
	document.getElementById("num2").value = null; 
	document.getElementById("num3").value = null;
	document.getElementById("num4").value = null;
	alert("ATENCIÓN!! El Precio Costo Debe Emmpezar Por un Número Mayor a 0 No, Se Admiten Letras, Ni Espacios en Blanco!!");
	}

	else if (document.getElementById("num4").value == "0.00" ) {
	document.getElementById("num2").value = null; 
	document.getElementById("num3").value = null;
	document.getElementById("num4").value = null;
	alert("ATENCIÓN!! El Precio Costo Debe Emmpezar Por un Número Mayor a 0 No, Se Admiten Letras, Ni Espacios en Blanco!!");
	}

}




