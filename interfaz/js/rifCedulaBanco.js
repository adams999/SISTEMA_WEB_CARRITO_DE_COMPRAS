function rifCedulaBanco(){

	if (document.getElementById("numCeduRif").value<70000000) {
		document.getElementById("ceduRif").value='V-';
	}
	if (document.getElementById("numCeduRif").value>=70000000 ) {
		document.getElementById("ceduRif").value='E-';
	}
	if (document.getElementById("numCeduRif").value>=100000000) {
		document.getElementById("ceduRif").value='J-';
	}


	
}