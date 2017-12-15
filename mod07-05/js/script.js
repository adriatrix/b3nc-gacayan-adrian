function generateTable() {
	var num = document.inputForm.num.value;
	var step = parseInt(document.inputForm.step.value);
	// console.log(num);
	// console.log(step);
	var	row = num / step;
	var element = "";
	var boxClass = "";
	var classBox = "";

	// NOTE: calculation of cell height relative to number of rows
	var boxHeight = row / 4;
	boxHeight = Math.round(boxHeight);
	boxHeight = 100 / boxHeight;

	var z = step;

	for (var x = 0; x <= (row/4); x++) {
		for (var y = 0; y < 4; y++) {
			if (z <= num) {
				if ((x % 2 == 0) && (y % 2 == 0)) {
					boxClass = "black";
				}

				if ((x % 2 == 0) && (y % 2 == 1)) {
					boxClass = "white";
				}

				if ((x % 2 == 1) && (y % 2 == 0)) {
					boxClass = "white";
				}

				if ((x % 2 == 1) && (y % 2 == 1)) {
					boxClass = "black";
				}

				element += "<div class='box " + boxClass + "'><h2>" + z + "</h2></div>";

				z = z + step;
			}
		}

	}

	document.getElementById("mainWrapper").innerHTML = element;
	classBox = document.getElementsByClassName("box"); /* array of elements */

	for (var i = 0; i < classBox.length; i++) {
		classBox[i].style.height = boxHeight + "vh";
		classBox[i].style.lineHeight = boxHeight + "vh";
	}

}
