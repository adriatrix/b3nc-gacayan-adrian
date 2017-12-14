function identifyThis() {
	var num = parseInt(document.getElementById("numberInput").value);
	// console.log(num);
	if (num % 2 == 0) {
		document.getElementById("theMessage").innerHTML = "It is an even number";
		document.getElementById("mainWrapper").style.backgroundColor = "indigo";
	} else {
		document.getElementById("theMessage").innerHTML = "It is a odd number";
		document.getElementById("mainWrapper").style.backgroundColor = "teal";
	}

	document.getElementById("mainHeader").style.color = "white";
}
