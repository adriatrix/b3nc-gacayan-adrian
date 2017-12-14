function changeBackgroundColor() {
	var newColor = document.getElementById("newBackgroundColor").value;
	// console.log(newColor);

	switch (newColor) {
		case "red":
			document.getElementById("mainWrapper").style.backgroundColor = "red";
			document.getElementById("theMessage").innerHTML = "Your new background color is red!!!";
			break;
		case "orange":
			document.getElementById("mainWrapper").style.backgroundColor = "orange";
			document.getElementById("theMessage").innerHTML = "Your new background color is orange!!!";
			break;
		case "yellow":
			document.getElementById("mainWrapper").style.backgroundColor = "yellow";
			document.getElementById("theMessage").innerHTML = "Your new background color is yellow!!!";
			document.getElementById("mainHeader").style.color = "black";
			document.getElementById("theMessage").style.color = "black";
			break;
		case "green":
			document.getElementById("mainWrapper").style.backgroundColor = "green";
			document.getElementById("theMessage").innerHTML = "Your new background color is green!!!";
			break;
		case "blue":
			document.getElementById("mainWrapper").style.backgroundColor = "blue";
			document.getElementById("theMessage").innerHTML = "Your new background color is blue!!!";
			document.getElementById("theMessage").style.color = "white";
			break;
		case "indigo":
			document.getElementById("mainWrapper").style.backgroundColor = "indigo";
			document.getElementById("theMessage").innerHTML = "Your new background color is indigo!!!";
			break;
		case "violet":
			document.getElementById("mainWrapper").style.backgroundColor = "violet";
			document.getElementById("theMessage").innerHTML = "Your new background color is violet!!!";
			break;
		default:
		document.getElementById("mainWrapper").style.backgroundColor = "white";
		document.getElementById("theMessage").innerHTML = "Select a new background color.";
		document.getElementById("mainHeader").style.color = "black";
		break;

	}

	document.getElementById("mainHeader").style.color = "white";
}
