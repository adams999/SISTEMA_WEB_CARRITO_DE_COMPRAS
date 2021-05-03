function rif(){

	if (document.getElementById("numRif").value>=100000000) {
		document.getElementById("riff").value='J-';
	}

	if (document.getElementById("numRif").value<=99999999) {
		document.getElementById("riff").value='';
	}
	
}